<?php

class CManageResult
{

    private static function authorizer(ECompetition $competition ):bool{

        $emailLOgged=FSession::getUserLogged()->getEmail();
        $emailOrganaizerEvent=FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail();

        if(FSession::isLogged() && ($emailLOgged!=$emailOrganaizerEvent))throw new Exception("you must be the organizer of the event");
        return CManageUser::callLogin();
    }



    public static function addResult(){
        try{
            $view=new VResult();
            $key=$view->getMyInput();
            $keyA=$view->getAthleteId();
            $competition= FDbH::loadOne($key, "ECompetition");
            $athlete= FDbH::loadOne($keyA, "EAthlete");
            $time= $view->getTime();
            if(self::authorizer($competition)){
                if(!$competition->addResult($athlete,$time))throw new Exception("loading result is failed");
            }
            else throw new Exception("you don't have authorization");
            header('Location: /Livent/Competition/MainPage/'.$competition->getId().'/');
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'inserimento del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }



    public static function delete()
    {
        try{
            $view = new VDelete();
            $keyCompetition=$view->getMyInputCompetition();
            $keyAthlete=$view->getMyInputAthlete();
            $competition = FDbH::loadOne($keyCompetition, ECompetition::class);
            $athlete = FDbH::loadOne($keyAthlete, EAthlete::class);
            if(self::authorizer($competition) && FSession::getUserLogged()->getEmail()==$view->getEmail() && FSession::getUserLogged()->getPassword()==$view->getPassword()){
                if(!$competition->popResult($athlete))throw new Exception("deletion result is failed");
            }
            else throw new Exception("you don't have authorization");
            header('Location: /Livent/Competition/MainPage/'.$competition->getId().'/');
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }

    }

    public static function newPageResult(){
        try{
            if(FSession::isLogged()){
                $user=FSession::getUserLogged();
                $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
            }
            else{
                $user=null;
                $profileImg=null;
            }
            $view = new VResult();
            $key = $view->getMyInput();
            if(FDbH::existOne((int)$key,ECompetition::class)){
                $competition = FDbH::loadOne($key, ECompetition::class);
                $registrations = $competition->getRegistrations();
                $results = $competition->getClassification();
                $organizer = FDbH::loadEventByCompetition($competition)->getOrganizer();
                $view->show($user, $profileImg, $competition, $registrations, $results, $organizer);
            }
            else throw new Exception("l'evento non esiste");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function deletePage(){
        try{
            $view=new VDelete();
            $myinputC=$view->getMyInputCompetition();
            $myinputA=$view->getMyInputAthlete();
            if(is_null($myinputA)||is_null($myinputC))throw new Exception("myinput don't setted");
            $competition=FDbH::loadOne($myinputC,ECompetition::class);
            $athlete=FDbH::loadOne($myinputA,EAthlete::class);
            if(self::authorizer($competition))
            {
                $message='sei sicuro di voler cancellare il risultato ?  i dati non potranno essere recuperati';
                $action='/Livent/Result/Delete/'.$athlete->getId().'I'.$competition->getId().'/';
                $return='/Livent/Competition/MainPage/'.$competition->getId().'/';
                $what='Risultato';
                $view->show($action,$what,$return,$message);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di eliminazione della registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    /*
    public static function newPage(?ECompetition $competition , ?EAthlete $athlete){
        try{
            if(self::authorizer($competition)){
                if(!FDbH::existRegistration($competition,$athlete))throw new Exception('the athlete is not register to the competition');
                //Richiama  VResult::show($result);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire un risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
    */
}