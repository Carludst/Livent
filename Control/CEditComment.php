<?php

class CEditComment
{

    public static function update(EComment $comment):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        try{
            if(!FDbH::updateOne($comment))throw new Exception("you can't update a comment that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function saveNew(EComment $comment,EEvent $event):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        try{
            FDbH::store($comment,$event->getId());
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EComment $comment){
        try{
            FDbH::deleteOne($comment->getId(),EComment::class);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function search(String|Null $containText=NULL , EUser|NULL $user=NULL):array
    {
        try{
            return FDbH::searchComment($containText,$user);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

}