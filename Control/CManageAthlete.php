<?php

class CManageAthlete
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

}