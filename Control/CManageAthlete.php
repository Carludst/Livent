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
            $view=new VMainAthlete();
            $key=(int)$view->getMyInput();
            if(FDbH::existOne($key,EAthlete::class)){
                FSession::addChronology(EAthlete::class,$key);
                if(FSession::isLogged()){
                    $user=FSession::getUserLogged();
                    $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
                }
                else{
                    $user=null;
                    $profileImg=null;
                }
                $athlete=FDbH::loadOne($key,EAthlete::class);
                $allResult = FDbH::getResultsAthlete($athlete);
                if(!is_null($view->getSport())&& isset($allResult[$view->getSport()]))$result=$allResult[$view->getSport()];
                elseif(isset($allResult[$athlete->getSport()])) $result=$allResult[$athlete->getSport()];
                else $result=null;
                $view->show($user,$profileImg,$athlete,$result);
            }
            else throw new Exception("required athlete don't exist");
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