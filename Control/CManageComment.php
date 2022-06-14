<?php

class CManageComment
{

    public static function update(EComment $comment):void
    {
        try{
            if(FSession::isLogged() && (FSession::getUserLogged()->getEmail()!=$comment->getUser()->getEmail()&& FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you must be an administrator to update an Athlete");
            elseif(!FSession::isLogged()){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                CLogin::loginPage();
            }
            elseif(!FDbH::updateOne($comment))throw new Exception("you can't update a comment that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function create(EComment $comment,EEvent $event):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        try{
            if(!FSession::isLogged()) {
                FSession::addDataSession('requeredPath', CFrontController::getUrl());
                CLogin::loginPage();
            }
            else FDbH::store($comment,$event->getId());
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EComment $comment){
        try{
            if(FSession::isLogged() && (FSession::getUserLogged()->getEmail()!=$comment->getUser()->getEmail()&& FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you must be an administrator to update an Athlete");
            elseif(!FSession::isLogged()){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                CLogin::loginPage();
            }
            else FDbH::deleteOne($comment->getId(),EComment::class);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function mainPage(EEvent $event){
        try{
            if(!FSession::isLogged()) {
                FSession::addDataSession('requeredPath', CFrontController::getUrl());
                CLogin::loginPage();
            }
            //VERIFICA LOGIN E TIPO UTENTE
            //Richiama  VComment::mainPage($event);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }



}