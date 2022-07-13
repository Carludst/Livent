<?php

class CManageRegistration
{

    private static function authorizer(ECompetition $competition , EAthlete $athlete):bool{

        $emailLOgged=FSession::getUserLogged()->getEmail();
        $emailRegisterBy=$competition->RegisteredBy($athlete)->getEmail();
        $emailOrganaizerEvent=FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail();

        if(FSession::isLogged() && ($emailLOgged!=$emailRegisterBy && $emailLOgged!=$emailOrganaizerEvent))throw new Exception("you must be the register or the oganizer of the event");
        return CManageUser::callLogin();
    }

    public static function addRegistration(){
        try{
            $view=new VNewRegCompetition();
            $logged=FSession::getUserLogged();
            $key=$view->getMyInput();
            $competition= FDbH::loadOne($key, "ECompetition");
            $athlete= FDbH::loadOne($view->getId(), "EAthlete");
            if($athlete->getName()===$view->getName() && $athlete->getSurname()===$view->getSurname()){
                $iscription=$view->addNewIscription($athlete->getName(),$athlete->getSurname(),$athlete->getBirthdate(),$athlete->getFamale(),$athlete->getTeam(),$athlete->getSport());
                if(self::authorizer($competition, $athlete)  && $view->getEmail()==$logged->getEmail() && $view->getPassword()==$logged->getPassword()){
                    if(!FCompetition::addResult($competition, $iscription, "nd"))throw new Exception("you can't update a competition that don't exist");
                }
            }else throw new Exception("nome, cognome e id dell'atleta inseriti non corrispondono, riprovare");
        }catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina relativa alla creazione di una competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
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
            $view = new VCompetition();
            $keyCompetition=$view->getMyInputCompetition();
            $keyAthlete=$view->getMyInputAthlete();
            $competition = FDbH::loadOne($keyCompetition, ECompetition::class);
            $athlete = FDbH::loadOne($keyAthlete, EAthlete::class);
            if(self::authorizer($competition,$athlete)){
                if(!$competition->popRegistration($athlete))throw new Exception("deletion registration/result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione dei risultati/registrazioni non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }

    }


    public static function newPageRegistration(){
        try{
            $view=new VNewRegCompetition();
            $view->show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire una nuova registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


}
