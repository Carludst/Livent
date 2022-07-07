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
                if(FSession::isSetDataSession('requeredPath'))$url=FSession::getAndDeleteDataSassion('requeredPath');
                else $url='/Livent/';
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
            if(FSession::isLogged()){
                FSession::logout();
                header('Location: /Livent/');
            }
            else throw new Exception("you are not logged");
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! Il logout non è andata a buon fine");
        }
    }


    public static function signin()
    {
        try{
            $view=new VSignin();
            $user=$view->getUser();
            if(!FDbH::existOne($user->getId(),EUser::class)){
                FDbH::store($user);
                if(FDbH::login($user->getEmail(),$user->getPassword(),false))FSession::login($user);
                else throw new Exception('system signin error');
                header('Location: /Livent/');
            }
            else throw new Exception('user just registered');
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La registrazione non è andata a buon fine , verificare di non aver usato un e-mail già associata ad un utente");
        }
    }


    public static function update():void
    {
        try{
            if(self::callLogin()){
                $view=new VUpdateUser();
                $logged=FSession::getUserLogged();
                $password=hash("sha3-256", $view->getPassword());
                $email=$view->getEmail();
                if($password==$logged->getPassword() && $email==$logged->getEmail()){
                    if(!is_null($view->getPathFile()) && !is_null($view->getTypeFile())){
                        $dir=$view->getPathFile();
                        $type=$view->getTypeFile();
                    }
                    if(!is_null($view->getNewPassword())){
                        $logged->setPassword($view->getNewPassword());
                    }
                    if(!is_null($view->getUsername())){
                        $logged->setUsername($view->getUsername());
                    }
                    FDbH::updateOne($logged);
                    FDbH::storeFile($logged,MappingPathFile::nameUserMain(),$dir,$type);
                    header('Location: /Livent/User/MainPage');
                }
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dei dati dell'utente non è andato a buon fine");
        }
    }

    public static function delete(){
        try{
            if(self::callLogin()){
                FDbH::deleteOne(FSession::getUserLogged()->getId(),EUser::class);
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
            $view=new VSignin();
            $view->show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di registrazione utente non è andata a buon fine");
        }
    }

    public static function updatePage(EUser $user){
        try{
            if(FSession::isLogged()){
                $view=new VUpdateUser();
                $user=FSession::getUserLogged();
                $view->show($user);
            }
            else throw new Exception("you are not logged");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di aggiornamento dei tuoi dati utente non è andata a buon fine");
        }
    }

    public static function profilePage(){
        try{
            if(self::callLogin()){
                $user = FSession::getUserLogged();
                $type = $user->getType();
                if($type == 'Organizer'){
                    $view = new VOrganizerProfile();
                    $event = FDbH::searchEvent(NULL, NULL, $user);
                    $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
                    $eventImg=FDbH::loadMultiFile($event,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),0.2);
                    $view->showProfile($user, $profileImg,$eventImg, $event );
                }
                else{
                    $view = new VUserProfile();
                    $registration = FDbH::getRegistrationUser($user);
                    $competition = array_keys($registration);
                    $athletes = array_values($registration);
                    $events = FDbH::loadEventByCompetition($competition);
                    $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
                    $view->showProfile($user, $profileImg,$competition, $athletes, $events );
                }

            }
            else throw new Exception("user logged don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di profilo non è andata a buon fine");
        }
    }
}