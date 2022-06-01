<?php

class CComment
{
    public static function update(EComment $comment):void
    {
        try{
            if(!FDbH::updateOne($comment))throw new Exception("you can't update an comment that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function saveNew(EEvent $comment):void
    {
        try{
            //VERIFICA LOGIN E TIPO UTENTE
            FDbH::store($comment);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete($comment){
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