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
                header('Location: /Livent/User/LoginPage');
            }
            else{
                FSession::addDataSession('requeredPath','/Livent/');
                header('Location: /Livent/User/LoginPage');
            }

            return false;
        }
        else return true;
    }


    public static function login()
    {
        try{
            $view = new VLogin();
            $email = $view->getEmail();
            $password = $view->getPassword();
            if(FDbH::login($email, $password)){
                $user = FDbH::loadOne($email, EUser::class);
                FSession::login($user);
                if(FSession::isSetDataSession('requeredPath'))$url=FSession::getDataSession('requeredPath');
                else $url='/Livent/';
                echo $url;
                header('Location: '.$url);
            }

            else {
                throw new Exception("credential wrong");
            }
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
            if(FDbH::existFile($user,MappingPathFile::nameUserMain()))FDbH::updateFile($user,MappingPathFile::nameUserMain(),$href,'type',2);
            else FDbH::storeFile($user,MappingPathFile::nameUserMain(),$href,'type',2);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato salvato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function loginPage(){
        try{
            $view=new VLogin();
            $view->show();
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
            if(self::callLogin()){
                $view = new VUserProfile();
                $u = FSession::getUserLogged();
                $profileImg=FDbH::loadMultiFile($u,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
                $view->showProfile($u, $profileImg);
            }
            else throw new Exception("user logged don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di profilo non è andata a buon fine");
        }
    }

    public static function userCompetitionPage(){
        try{
            if(self::callLogin()){
                $view = new VUserProfile();
                $key=$view->getMyInput();
                $registration = FDbH::getRegistrationUser(FSession::getUserLogged());
                $competition = array_keys($registration);
                $athletes = array_values($registration);
                $events = FDbH::loadEventByCompetition($competition);
                $view->showCompetition($competition, $athletes, $events);
            }
            else throw new Exception("user logged don't have autorization");

        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di profilo non è andata a buon fine");
        }
    }

}