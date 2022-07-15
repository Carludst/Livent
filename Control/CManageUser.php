<?php

class CManageUser
{

    private static function authorizer(EUser $user):bool{

        if(FSession::isLogged() && FSession::getUserLogged()->getId()!=$user->getId())throw new Exception("you don't have authorization");
        return self::callLogin();
    }



    public static function callLogin(bool $return=true):bool{
        if(!FSession::isLogged()){
            if($return){
                FSession::addDataSession('requiredPath',CFrontController::getUrl());
                header('Location: /Livent/User/LoginPage/');
            }
            else{
                FSession::addDataSession('requeredPath','/Livent/');
                header('Location: /Livent/User/LoginPage/');
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
                if(FDbH::login($user->getEmail(),$user->getPassword()))FSession::login($user);
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
                $password= $view->getPassword();
                $email=$view->getEmail();
                if($password==$logged->getPassword() && $email==$logged->getEmail()){
                    if(!is_null($view->getPathFile()) && !is_null($view->getTypeFile())){
                        $dir=$view->getPathFile();
                        $type=$view->getTypeFile();
                        if(!FDbH::existFile($logged,MappingPathFile::nameUserMain())){
                            FDbH::storeFile($logged,MappingPathFile::nameUserMain(),$dir,$type,true);
                        }
                        else FDbH::updateFile($logged,MappingPathFile::nameUserMain(),$dir,$type,true);
                    }
                    if(!is_null($view->getNewPassword())&& $view->getNewPassword()==$view->getConfirmPassword() ){
                        $logged->setPassword($view->getNewPassword());
                    }
                    elseif(!is_null($view->getNewPassword())||!is_null($view->getConfirmPassword()))throw new Exception("confirm password don't chack");
                    if(!is_null($view->getUsername())){
                        $logged->setUsername($view->getUsername());
                    }
                    if(!is_null($view->getNewEmail())){
                        $logged->setUsername($view->getUsername());
                    }
                    FDbH::updateOne($logged);
                    FSession::updateUserLogged($logged);
                    header('Location: /Livent/User/ProfilePage/');
                }
                else throw new Exception("wrong credantial");
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dei dati dell'utente non è andato a buon fine , verificare di essersi autentificati");
        }
    }


    public static function delete(){
        try{
            $view=new VDelete();
            $myinput=$view->getMyInput();
            if(is_null($myinput))throw new Exception("myinput don't setted");
            $user=FDbH::loadOne($myinput,EUser::class);
            if($user->getType()!='Administrator'){
                if(FSession::isLogged() && FSession::getUserLogged()->getType()=='Administrator' && $view->getPassword()==FSession::getUserLogged()->getPassword() && $view->getEmail()==FSession::getUserLogged()->getEmail()){
                    FDbH::deleteReference($user->getId(),EUser::class);
                }
                elseif(self::authorizer($user) && $view->getPassword()==FSession::getUserLogged()->getPassword() && $view->getEmail()==FSession::getUserLogged()->getEmail()){
                    FDbH::deleteReference($user->getId(),EUser::class);
                    self::logout();
                }
                else throw new Exception("credential wrong");
            }
            else throw new Exception("administrator can't deleted");
            header('Location: /Livent/');
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione dell'utente non è andato a buon fine");
        }
    }

    public static function deleteAdmin(){
        try{
            if(self::callLogin()){
                $view = new VDeleteUser();
                $id = $view->getMyInput();
                FDbH::deleteOne($id,EUser::class);
                header('Location: /Livent/User/Search/');
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

    public static function updatePage(){
        try{
            if(self::callLogin()){
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
                    $competition=array();
                    $athletes=array();
                    for($i=0;$i<count($registration);$i++){
                        $competition[]=$registration[$i]['competition'];
                        $athletes[]=$registration[$i]['athlete'];
                    }
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

    public static function search()
    {
        try {
            if(FSession::getUserLogged()->getType()=='Administrator'){

                $user=FSession::getUserLogged();
                $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);

                $view = new VDeleteUser();

                $username = $view->getUsername();
                $email = $view->getEmail();

                if($view->getMood()){
                    $mood = 'start';
                }
                else{
                    $mood = 'search';
                }
                $users = FDbH::searchUser($username, $email,NULL,'Administrator');
                $img = FDbH::loadMultiFile($users, MappingPathFile::nameUserMain(), MappingPathFile::dirUserDefault(), MappingPathFile::nameUserMain(), 0.4);
                $view->show($users, $img,$user,$profileImg, $mood);
            }
            else throw new Exception("you don't have authorization");


        }

        catch (Exception $e) {
            CError::store($e, "La ricerca non è andata a buon fine");
        }
    }

    public static function deletePage(){
        try{
            $view=new VDelete();
            $myinput=$view->getMyInput();
            if(is_null($myinput))throw new Exception("myinput don't setted");
            if(CManageUser::callLogin())$logged=FSession::getUserLogged();
            $user=FDbH::loadOne($myinput,EUser::class);
            if(($logged->getType()=='Administrator' || self::authorizer($user) ))
            {
                if($user->getType()=='Organizer')$message="sei sicuro di voler cancellare l' utente ? la cancellazione di un utente organizzatore comporta anche la cancellazione di tutti gli eventi ad esso associati  , i dati non potranno essere recuperati";
                else $message="sei sicuro di voler cancellare l'utente , i dati non potranno essere recuperati";
                $action='/Livent/User/Delete/'.$user->getId().'/';
                $return='/Livent/User/MainPage/'.$user->getId().'/';
                $what='Utente';
                $view->show($action,$what,$return,$message);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di eliminazione del evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

}