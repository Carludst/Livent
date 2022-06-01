<?php

require_once '../Foundation/FDbH.php';
require_once '../Entity/EAthlete.php';
require_once '../Entity/ECompetition.php';
require_once '../Entity/EUser.php';

class CAthlete
{

    public static function update(EAthlete $athlete):void
    {
        try{
            if(!FDbH::updateOne($athlete))throw new Exception("you can't update an athlete that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function saveNew(EAthlete $athlete):void
    {
        try{
            FDbH::store($athlete);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EAthlete $athlete){
        try{
            FDbH::deleteOne($athlete->getId(),EAthlete::class);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function search(String|Null $name , String|Null $surname , DateTime|Null $birthdateFrom , DateTime|Null $birthdateTo , ?bool $famale , String|Null $team , String|Null $sport):array
    {
        try{
            return FDbH::searchAthlete($name, $surname, $birthdateFrom, $birthdateTo, $famale, $team, $sport);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function show(EAthlete $athlete){
        try{
            //Richiama  VAthlete::show($athlete);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function showNewPage(EAthlete $athlete){
        try{
            //VERIFICA LOGIN E TIPO UTENTE
            //Richiama  VAthlete::showNewPage($athlete);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function addRegistration(ECompetition $competition,EAthlete $athlete, EUser $user){
        try{
            if(!FDbH::addRegistrationCompetition($competition,$athlete,$user))throw new Exception("registration is failed");
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function addResult(ECompetition $competition,EAthlete $athlete, ETime $time){
        try{
            if(!FDbH::addRegistrationCompetition($competition,$athlete,$time))throw new Exception("is failed");
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function getRegistration(ECompetition $competition):array{
        try{
            return FDbH::getRegistrationsCompetition($competition);
        }
        catch(Exception $e){
            return array();
            //RICHIAMA ERRORE
        }
    }

    public static function getResult(ECompetition $competition):array{
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

            if(!array_key_exists($sport, $a)){
                return array();
            }
            elseif (!array_key_exists($NameCompetition, $a[$sport])){
                return array();
            }
            else{
                return $a[$sport[$NameCompetition]];
            }
        }
        catch(Exception $e){
            return array();
            //RICHIAMA ERRORE
        }
    }

}