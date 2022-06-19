<?php

class CManageResult
{

    private static function authorizer(ECompetition $competition ):bool{

        $emailLOgged=FSession::getUserLogged()->getEmail();
        $emailOrganaizerEvent=FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail();

        if(FSession::isLogged() && ($emailLOgged!=$emailOrganaizerEvent))throw new Exception("you must be the organizer of the event");
        return CManageUser::callLogin();
    }



    public static function addResult(ECompetition $competition,EAthlete $athlete, ETime $time){
        try{
            if(self::authorizer($competition)){
                if(!$competition->addResult($athlete,$time))throw new Exception("loading result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'inserimento del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


    public static function delate(ECompetition $competition, EAthlete $athlete)
    {
        try{
            if(self::authorizer($competition)){
                if(!$competition->popResult($athlete))throw new Exception("deletion registration/result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione dei risultati/registrazioni non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }

    }


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

}