<?php

class CLogin
{
    public static function login(EUser $user)
    {
        try{
            if(FDbH::existOne($user->getEmail(),EUser::class)){
                $u = FDbH::loadOne($user->getEmail(), EUser::class);

                if($u->getPassword() == $user->getPassword()){
                    FSession::login($user);
                }
                else new Exception("password wrong");
            }

            else new Exception("user don't signin");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }


    public static function logout()
    {
        try{
            if(FSession::isLogged()) FSession::logout();
            else new Exception("you are not logged");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }


    public static function signin(EUser $user)
    {
        try{
            if(FDbH::existOne($user->getEmail(), $user::class)) new Exception("user just exist");

            FDbH::store($user);
            FSession::login($user);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function loginPage(){
        try{
            //Richiama  VLogin::show();
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function signinPage(){
        try{
            //Richiama  VSignin::show();
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

}