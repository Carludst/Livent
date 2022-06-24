<?php

class CManageUser
{

    private static function authorizer(EUser $user):bool{

        if(FSession::isLogged() && FSession::getUserLogged()->getEmail()==$user->getEmail())throw new Exception("you must be an administrator to update an Athlete");
        return self::callLogin();
    }



    public static function callLogin(bool $return=true):bool{
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


    public static function login(EUser $user)
    {
        try{
            if(FDbH::login($user))FSession::login($user);
            else throw new Exception("credential wrong");
        }
        catch (Exception $e){
            CError::store($e," login fallita , verificare di aver inserito le credenziali corrette");
        }
    }


    public static function logout()
    {
        try{
            if(FSession::isLogged()) FSession::logout();
            else throw new Exception("you are not logged");
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! Il logout non è andata a buon fine");
        }
    }


    public static function signin(EUser $user)
    {
        try{
            FDbH::store($user);
            self::login($user);
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La registrazione non è andata a buon fine");
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
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dei dati dell'utente non è andato a buon fine");
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
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione dell'utente non è andato a buon fine");
        }
    }

    public static function setProfileImage(String $href , EUser $user){
        try{
            if(FDbH::existFile($user,'profile'))FDbH::updateFile($user,'profile',$href,'type',2);
            else FDbH::storeFile($user,'profile',$href,'type',2);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato salvato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function loginPage(){
        try{
            VLogin::show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di login non è andata a buon fine");
        }
    }

    public static function signinPage(){
        try{
            VSignin::show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di registrazione utente non è andata a buon fine");
        }
    }

    public static function updatePage(EUser $user){
        try{
            //Richiama   VSignin::show($user);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di aggiornamento dei tuoi dati utente non è andata a buon fine");
        }
    }

    public static function profilePage(){
        try{
            if(self::callLogin()) FDbH::getRegistrationUser(FSession::getUserLogged());
            //Richiama  VProfile::show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di profilo non è andata a buon fine");
        }
    }

}