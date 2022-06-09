<?php

class FSession
{
    public static function isLogged():bool
    {
        session_start();
        if(!is_null($_SESSION['user']))return true;
        else return false;
    }

    public static function login(EUser $user):void
    {
        if (session_status() == PHP_SESSION_NONE) {
            $temp = serialize($user);
            $_SESSION['user'] = $temp;
            $_SESSION['user']=$user;
        }
        else throw new Exception("you can't login if you are just logged");
    }

    public static function logout()
    {
        if(!session_status() == PHP_SESSION_DISABLED){
            session_unset();
            session_destroy();
            setcookie('PHPSESSID', '', time() - 3600);
            header('Location: /Museo/Utente/login');
        }
        else throw new Exception("you can't make logout if you haven't made login");
    }

    public static function getLogged():?EUser
    {
        if(!session_status() == PHP_SESSION_DISABLED && !is_null($_SESSION['user'])){
            return unserialize($_SESSION['user']);
        }
        else return NULL;
    }

    public static function addDataSession(String $key , $data)
    {
        if(!session_status() == PHP_SESSION_DISABLED && $key!='user'){
            $_SESSION[$key]=serialize($data);
        }
        else throw new Exception("you can't add date if you aren't logged");
    }

    public static function getDataSession(String $key )
    {
        if(!session_status() == PHP_SESSION_DISABLED){
            return $_SESSION[$key];
        }
        else return NULL;
    }




}