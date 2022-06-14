<?php

class CManageAthlete
{

    public static function update(EAthlete $athlete):void
    {
        try{
            if(FSession::isLogged() && FSession::getUserLogged()->getType()!='Administrator')throw new Exception("you must be an administrator to update an Athlete");
            elseif(!FSession::isLogged()){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                CLogin::loginPage();
            }
            elseif(!FDbH::updateOne($athlete))throw new Exception("you can't update an athlete that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function create(EAthlete $athlete):void
    {
        try{
            if(!FSession::isLogged()){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                CLogin::loginPage();
            }
            else FDbH::store($athlete);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EAthlete $athlete){
        try{
            if(FSession::isLogged() && FSession::getUserLogged()->getType()!='Administrator')throw new Exception("you must be an administrator to update an Athlete");
            elseif(!FSession::isLogged()){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                CLogin::loginPage();
            }
            else FDbH::deleteOne($athlete->getId(),EAthlete::class);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }



    public static function mainPage(EAthlete $athlete){
        try{
            //Richiama  VAthlete::show($athlete);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function newPage(EAthlete $athlete){
        try{
            if(!FSession::isLogged()){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                CLogin::loginPage();
            }
            //VERIFICA LOGIN E TIPO UTENTE
            //Richiama  VAthlete::showNewPage($athlete);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

}