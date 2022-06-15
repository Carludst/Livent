<?php

class CManageCompetitor
{

    public static function addRegistration(ECompetition $competition,EAthlete $athlete, EUser $user){
        try{
            if(CManageUser::callLogin()){
                if(!FDbH::addRegistrationCompetition($competition,$athlete,$user))throw new Exception("registration is failed");
            }
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! L'inserimento della registazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function getRegistrationCompetition(ECompetition $competition):array{
        try{
            return FDbH::getRegistrationsCompetition($competition);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizazione delle registazioni non è andato a buon fine");
            return array();
        }
    }


    public static function addResult(ECompetition $competition,EAthlete $athlete, ETime $time){
        try{
            if(!FDbH::addResultCompetition($competition,$athlete,$time))throw new Exception("loading result is failed");
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! L'inserimento del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }



    public static function getResultCompetition(ECompetition $competition):array{
        try{
            return FDbH::getClassificationCompetition($competition);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizazione dei risultati non è andato a buon fine");
            return array();
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
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizazione dei risultati non è andato a buon fine");
            return array();
        }
    }

    public static function delate(ECompetition $competition, EAthlete $athlete)
    {
        try{
            if(!FDbH::deleteCompetitor($competition,$athlete))throw new Exception("deletion registration/result is failed");
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La cancellazione dei risultati/registrazioni non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }

    }

    public static function newPageRegistration(?ECompetition $competition , ?EAthlete $athlete){
        try{
            if(!is_null($competition) && !is_null($athlete))$registration=FDbH::getCompetitor($competition,$athlete);
            else $registration=NULL;
            //Richiama  VRegistration::show($registration);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire una nuova registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function newPageResult(?ECompetition $competition , ?EAthlete $athlete){
        try{
            if(!is_null($competition) && !is_null($athlete))$result=FDbH::getCompetitor($competition,$athlete);
            else $result=NULL;
            //Richiama  VResult::show($result);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire un risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
}
