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
            $viewcomp=new VCompetition();
            $key=$viewcomp->getMyInput();
            $competition= FDbH::loadOne($key, "ECompetition");
            $athlete= FDbH::loadOne($view->getId(), "EAthlete");
            $time= FDbH::loadOne($view->getTime(), "ETime");
            if(self::authorizer($competition)){
                if(!$competition->addResult($athlete,$time))throw new Exception("loading result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'inserimento del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }



    public static function delate()
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
            header('Location: /Livent/');
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