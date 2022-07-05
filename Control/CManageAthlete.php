<?php

class CManageAthlete
{
    private static function authorizer():bool{

        if(FSession::isLogged() && FSession::getUserLogged()->getType()!='Administrator')throw new Exception("you must be an administrator to update an Athlete");
        return CManageUser::callLogin();
    }

    public static function update(EAthlete $athlete):void
    {//usare l'ogetto della view
        try{
            $vAthlete=new VNewAthlete();
            $myinput=$vAthlete->getMyInput();
            if(is_null($myinput)){
                if(CManageUser::callLogin())FDbH::store($athlete);
            }
            if(self::authorizer()){
                if(!FDbH::updateOne($athlete))throw new Exception("you can't update an athlete that don't exist");
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! ci sono stati errori con l'aggiornamento dei dati dell' atleta , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function create(EAthlete $athlete):void
    {
        try{
            if(CManageUser::callLogin())FDbH::store($athlete);
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il salvataggio dei dati dell' Atleta non è andato a buon fine");
        }
    }

    public static function delete(EAthlete $athlete){
        try{
            if(self::authorizer())FDbH::deleteOne($athlete->getId(),EAthlete::class);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! la cancellazione dei dati dell' atleta non è andata a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }



    public static function mainPage(){
        try{
            $key=(int)$GLOBALS['_MYINPUT'];
            if(FDbH::existOne($key,EAthlete::class))FSession::addChronology(EAthlete::class,$key);
            header("Location: /Livent/Athlete/Search/");//righa da eliminare
            /*
            $a = FDbH::getResultsAthlete($athlete);
            if(!array_key_exists($sport, $a))return array();
            elseif (!array_key_exists($nameCompetition, $a[$sport]))return array();
            else return $a[$sport][$nameCompetition];
            //Richiama  VAthlete::show($athlete);
            */
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! la visualizzazione della pagina dell'Atleta non è andata a buon fine");
        }
    }

    public static function newPage(){
        try{
            $vAthlete=new VNewAthlete();
            $myinput=$vAthlete->getMyInput();
            if(is_null($myinput)){
                if(CManageUser::callLogin()) $vAthlete->show(null);
            }
            elseif(self::authorizer()){
                $athlete= FDbH::loadOne($myinput, EAthlete::class);
                $vAthlete->show($athlete);
            }
            else throw new Exception("you don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! la visualizzazione della pagina di crezione/aggiornamento dati dell'Atleta non è andata a buon fine");
        }
    }

}