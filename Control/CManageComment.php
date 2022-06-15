<?php

class CManageComment
{
    private static function authorizer(EComment $comment):bool{

        if(FSession::isLogged() && (FSession::getUserLogged()->getEmail()!=$comment->getUser()->getEmail()&& FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you don't have authorization");
        return CManageUser::callLogin();
    }

    public static function update(EComment $comment):void
    {
        try{
            if(self::authorizer($comment)){
                if(!FDbH::updateOne($comment))throw new Exception("you can't update a comment that don't exist");
            }
        }
        catch (Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! L'aggiornamento del commento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function create(EComment $comment,EEvent $event):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        try{
            if(CManageUser::callLogin())FDbH::store($comment,$event->getId());
        }
        catch (Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! L'invio  del commento non è andato a buon fine");
        }
    }

    public static function delete(EComment $comment){
        try{
            if(self::authorizer($comment))FDbH::deleteOne($comment->getId(),EComment::class);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La cancellazione del commento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function mainPage(EEvent $event){
        try{
            if(CManageUser::callLogin()) {
                //VERIFICA LOGIN E TIPO UTENTE
                //Richiama  VComment::mainPage($event);
            }
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina dei commenti non è andato a buon fine");
        }
    }



}