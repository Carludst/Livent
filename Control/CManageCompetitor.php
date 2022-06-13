<?php

class CManageCompetitor
{

    public static function addRegistration(ECompetition $competition,EAthlete $athlete, EUser $user){
        try{
            if(!FDbH::addRegistrationCompetition($competition,$athlete,$user))throw new Exception("registration is failed");
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function getRegistrationCompetition(ECompetition $competition):array{
        try{
            return FDbH::getRegistrationsCompetition($competition);
        }
        catch(Exception $e){
            return array();
            //RICHIAMA ERRORE
        }
    }


    public static function addResult(ECompetition $competition,EAthlete $athlete, ETime $time){
        try{
            if(!FDbH::addResultCompetition($competition,$athlete,$time))throw new Exception("loading result is failed");
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }



    public static function getResultCompetition(ECompetition $competition):array{
        try{
            return FDbH::getClassificationCompetition($competition);
        }
        catch(Exception $e){
            return array();
            //RICHIAMA ERRORE
        }
    }

    public static function getResultAthlete(EAthlete $athlete, string $sport, string $NameCompetition):array{
        try{
            $a = FDbH::getResultsAthlete($athlete);

            if(!array_key_exists($sport, $a))return array();
            elseif (!array_key_exists($NameCompetition, $a[$sport]))return array();
            else return $a[$sport][$NameCompetition];
        }
        catch(Exception $e){
            return array();
            //RICHIAMA ERRORE
        }
    }

    public static function delate(ECompetition $competition, EAthlete $athlete)
    {
        try{
            if(!FDbH::deleteCompetitor($competition,$athlete))throw new Exception("deletion registration/result is failed");

        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }

    }

    public static function newPageRegistration(?ECompetition $competition , ?EAthlete $athlete){
        try{
            if(!is_null($competition) && !is_null($athlete))$registration=FDbH::getCompetitor($competition,$athlete);
            else $registration=NULL;
            //Richiama  VRegistration::show($registration);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function newPageResult(?ECompetition $competition , ?EAthlete $athlete){
        try{
            if(!is_null($competition) && !is_null($athlete))$result=FDbH::getCompetitor($competition,$athlete);
            else $result=NULL;
            //Richiama  VResult::show($result);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }
}
