<?php

class CManageAthlete
{
    private static function authorizer():bool{

        if(FSession::isLogged() && FSession::getUserLogged()->getType()!='Administrator')throw new Exception("you must be an administrator to update an Athlete");
        return CManageUser::callLogin();
    }

    public static function update(EAthlete $athlete):void
    {
        try{
            if(self::authorizer()){
                if(!FDbH::updateOne($athlete))throw new Exception("you can't update an athlete that don't exist");
            }
        }
        catch (Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! ci sono stati errori con l'aggiornamento dei dati dell' atleta , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function create(EAthlete $athlete):void
    {
        try{
            if(CManageUser::callLogin())FDbH::store($athlete);
        }
        catch (Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! il salvataggio dei dati dell' Atleta non è andato a buon fine");
        }
    }

    public static function delete(EAthlete $athlete){
        try{
            if(self::authorizer())FDbH::deleteOne($athlete->getId(),EAthlete::class);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! la cancellazione dei dati dell' atleta non è andata a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }



    public static function mainPage(EAthlete $athlete){
        try{
            //Richiama  VAthlete::show($athlete);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! la visualizzazione della pagina dell'Atleta non è andata a buon fine");
        }
    }

    public static function newPage(EAthlete $athlete){
        try{
            if(CManageUser::callLogin()) {
                //Richiama  VAthlete::showNewPage($athlete);
            }
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! la visualizzazione della pagina di crezione/aggiornamento dati dell'Atleta non è andata a buon fine");
        }
    }

}