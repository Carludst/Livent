<?php

class CManageRegistration
{

    private static function authorizer(ECompetition $competition , EAthlete|NUll $athlete=NULL):bool{
        if(is_null($athlete)  && FDbH::loadEventByCompetition($competition)->getOrganizer()->getId()!=FSession::getUserLogged()->getId())throw new Exception("you must be the oganizer of the event");
        else{
            $emailLOgged=FSession::getUserLogged()->getEmail();
            $emailRegisterBy=$competition->RegisteredBy($athlete)->getEmail();
            $emailOrganaizerEvent=FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail();
            if(FSession::isLogged() && ($emailLOgged!=$emailRegisterBy && $emailLOgged!=$emailOrganaizerEvent))throw new Exception("you must be the register or the oganizer of the event");
        }
        return CManageUser::callLogin();
    }

    public static function addRegistration(){
        try{
            if(CManageUser::callLogin()){
                $view=new VNewRegCompetition();
                $logged=FSession::getUserLogged();
                $key=$view->getMyInput();
                if(is_null($key)) throw new Exception('Competition is not specified');
                $competition= FDbH::loadOne($key, "ECompetition");
                $athlete= FDbH::loadOne($view->getId(), "EAthlete");
                $event=FDbH::loadEventByCompetition($competition);
                if(($logged->getType()=='Organizer' && $event->getOrganizer()->getId()==FSession::getUserLogged()->getId())||(FSession::getUserLogged()->getType()!='Administrator' && FSession::getUserLogged()->getType()!='Organizer')){
                    if($athlete->getName()==$view->getName() && $athlete->getSurname()==$view->getSurname()){
                        if(!FCompetition::addRegistration($competition, $athlete, $logged))throw new Exception("you can't add a registration in a competition that don't exist");
                    }else throw new Exception("nome, cognome e id dell'atleta inseriti non corrispondono, riprovare");
                }else throw new Exception("you haven't the authorization to add a registration");
            }else throw new Exception('you have to be logged to add a registration');
            header('Location: /Livent/Competition/MainPage/'.$competition->getId().'/');
        }catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La registrazione non è andata a buon fine, verificare di possedere le autorizazioni necessarie e di aver inserito i dati corretti");
        }
    }

    /*
    public static function addRegistration(ECompetition $competition,EAthlete $athlete){
        try{
            if(CManageUser::callLogin()){
                if(!$competition->addRegistration($athlete,FSession::getUserLogged()))throw new Exception("registration is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'inserimento della registazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
    */

    public static function deleteRegistration()
    {
        try{
            $view = new VDelete();
            $keyCompetition=$view->getMyInputCompetition();
            $keyAthlete=$view->getMyInputAthlete();
            $competition = FDbH::loadOne($keyCompetition, ECompetition::class);
            $athlete = FDbH::loadOne($keyAthlete, EAthlete::class);
            if(self::authorizer($competition,$athlete) && FSession::getUserLogged()->getEmail()==$view->getEmail() && FSession::getUserLogged()->getPassword()==$view->getPassword()){
                if(!$competition->popRegistration($athlete))throw new Exception("deletion registration/result is failed");
            }
            else throw new Exception("you don't have authorization");
            header('Location: /Livent/Competition/MainPage/'.$competition->getId().'/');
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione della registrazione non è andato a buon fine controllare se non è già associato un risultato , verificare di possedere le autorizazioni necessarie");
        }

    }


    public static function newPageRegistration(){
        try{
            if(CManageUser::callLogin()) {
                $view = new VNewRegCompetition();
                $key = $view->getMyInput();
                if (is_null($key)) throw new Exception('my input not setted');
                $logged = FSession::getUserLogged();
                $competition = FDbH::loadOne($key,ECompetition::class);
                $event = FDbH::loadEventByCompetition($competition);
                if (($logged->getType() == 'Organizer' && $event->getOrganizer()->getId() == FSession::getUserLogged()->getId()) || (FSession::getUserLogged()->getType() != 'Administrator' && FSession::getUserLogged()->getType() != 'Organizer')) {
                    if($competition->getDateTime()>new DateTime()){
                        $view->show($competition);
                    }
                    else throw new Exception("l'evento è terminato");
                } else throw new Exception("you don't have autorization");
            }
            else throw new Exception("you are not logged");

        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire una nuova registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function deletePage(){
        try{
            $view=new VDelete();
            $myinputC=$view->getMyInputCompetition();
            $myinputA=$view->getMyInputAthlete();
            if(is_null($myinputA)||is_null($myinputC))throw new Exception("myinput don't setted");
            if(CManageUser::callLogin())$logged=FSession::getUserLogged();
            $competition=FDbH::loadOne($myinputC,ECompetition::class);
            $athlete=FDbH::loadOne($myinputA,EAthlete::class);
            if(self::authorizer($competition,$athlete))
            {
                $message='sei sicuro di voler cancellare la registrazione ?  i dati non potranno essere recuperati';
                $action='/Livent/Registration/Delete/'.$athlete->getId().'I'.$competition->getId().'/';
                $return='/Livent/Competition/MainPage/'.$competition->getId().'/';
                $what='Registrazione';
                $view->show($action,$what,$return,$message);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di eliminazione della registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


}
