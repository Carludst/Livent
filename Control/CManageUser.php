<?php

class CManageUser
{
    public static function callLogin(bool $return=true){
        if(!FSession::isLogged()){
            if($return){
                FSession::addDataSession('requeredPath',CFrontController::getUrl());
                // header('Location: /Livent/User/login');
            }
            else{
                FSession::addDataSession('requeredPath','Livent\HomePage');
                // header('Location: /Livent/User/login');
            }

            return false;
        }
        else return true;
    }

    private static function authorizer(EUser $user):bool{

        if(FSession::isLogged() && FSession::getUserLogged()->getEmail()==$user->getEmail())throw new Exception("you must be an administrator to update an Athlete");
        return self::callLogin();
    }

    public static function login(EUser $user)
    {
        try{
            if(FDbH::login($user->getEmail(),$user->getPassword()))FSession::login($user);
            else throw new Exception("credential wrong");
        }
        catch (Exception $e){
            CError::storeError($e," login fallita , verificare di aver inserito le credenziali corrette");
        }
    }


    public static function logout()
    {
        try{
            if(FSession::isLogged()) FSession::logout();
            else throw new Exception("you are not logged");
        }
        catch (Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! Il logout non è andata a buon fine");
        }
    }


    public static function signin(EUser $user)
    {
        try{
            FDbH::store($user);
            self::login($user);
        }
        catch (Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La registrazione non è andata a buon fine");
        }
    }

    public static function loginPage(){
        try{
            //Richiama  VLogin::show();
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di login non è andata a buon fine");
        }
    }

    public static function signinPage(){
        try{
            //Richiama  VSignin::show();
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di registrazione utente non è andata a buon fine");
        }
    }

    public static function updatePage(EUser $user){
        try{
            //Richiama  VSignin::show($user);
        }
        catch(Exception $e){
            CError::storeError($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di aggiornamento dei tuoi dati utente non è andata a buon fine");
        }
    }

    public static function update(EUser $user):void
    {
        try{
            if(self::callLogin()){
                FDbH::deleteOne(FSession::getUserLogged()->getEmail(),EUser::class);
                FDbH::store($user);
                self::logout();
                self::callLogin(false);
            }
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(){
        try{
            if(self::callLogin()){
                FDbH::deleteOne(FSession::getUserLogged()->getEmail(),EUser::class);
                self::logout();
                self::callLogin(false);
            }
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

}