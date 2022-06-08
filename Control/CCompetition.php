<?php

require_once '../Foundation/FDbH.php';
require_once '../Entity/EUser.php';
require_once '../Entity/EEvent.php';

class CCompetition
{
    public static function update(ECompetition $competition):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        try{
            if(!FDbH::updateOne($competition))throw new Exception("you can't update a competition that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function saveNew(ECompetition $competition):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        //if(filter_var($organizerEmail,FILTER_VALIDATE_EMAIL)!=false)
        try{
            FDbH::store($competition);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(ECompetition $competition){
        try{
            FDbH::deleteOne($competition->getId(),ECompetition::class);
        }
        catch(Exception $e){
                //RICHIAMA ERRORE
        }
    }

    public static function search(?String $name=NULL , String|NULL $gender=NULL, String|NULL $sport=NULL, EDistance|Null $distance=NULL):array
    {
        try{
            return FDbH::searchCompetition($name,$gender,$sport,$distance);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function show(ECompetition $competition){
        try{
            //Richiama  view competition
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }
}

