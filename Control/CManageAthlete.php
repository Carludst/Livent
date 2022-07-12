<?php

class CManageAthlete
{
    private static function authorizer():bool
    {
        if(FSession::isLogged() && FSession::getUserLogged()->getType()!='Administrator')throw new Exception("you must be an administrator to update an Athlete");
        return CManageUser::callLogin();
    }

    public static function update():void
    {
        try{
            $view=new VNewAthlete();
            $logged=FSession::getUserLogged();
            $myinput=$view->getMyInput();
            $athlete= $view->createAthlete();
            if(is_null($myinput)){
                if(CManageUser::callLogin())FDbH::store($athlete);
            }
            elseif(self::authorizer() && $view->getEmail()==$logged->getEmail() && $view->getPassword()==$logged->getPassword()){
                $athlete->setId($myinput);
                if(!FDbH::updateOne($athlete))throw new Exception("you can't update an athlete that don't exist");
            }
            else throw new Exception("You don't have authorization");
            header('Location: /Livent/');
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! ci sono stati errori con l'aggiornamento dei dati dell' atleta , verificare di possedere le autorizazioni necessarie");
        }
    }

    /*
    public static function create(EAthlete $athlete):void
    {
        $vAthlete=new VNewAthlete();
        $logged=FSession::getUserLogged();
        try{
            if(CManageUser::callLogin() && $vAthlete->getEmail()==$logged->getPassword() && $vAthlete->getPassword()==$logged->getEmail()){
                FDbH::store($athlete);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il salvataggio dei dati dell' Atleta non è andato a buon fine");
        }
    }
    */

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

                if(!is_null($view->getSport())) $sport=$view->getSport();
                else $sport=$athlete->getSport();
                $result = $allResult[$sport] ?? array();
                $view->show($user,$profileImg,$athlete,$result,$sport);
            }
            else throw new Exception("required athlete don't exist");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! la visualizzazione della pagina dell'Atleta non è andata a buon fine");
        }
    }

    public static function newPage(){
        try{
            $view=new VNewAthlete();
            $myinput=$view->getMyInput();
            if(self::authorizer()){
                if(is_null($myinput)) $view->show();

                else{
                    $athlete= FDbH::loadOne($myinput, EAthlete::class);
                    $view->show($athlete);
                }
            }
            else throw new Exception("you don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! la visualizzazione della pagina di crezione/aggiornamento dati dell'Atleta non è andata a buon fine");
        }
    }
}