<?php

class FSession
{
    public static function isLogged():bool
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!is_null($_SESSION['user']))return true;
        else return false;
    }

    public static function login(EUser $user):void
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!is_null($_SESSION['user']))
        {
            $temp = serialize($user);
            $_SESSION['user'] = $temp;
            $_SESSION['user'] = $user;
        }
        else throw new Exception("you can't login if you are just logged");
    }

    public static function logout()
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        session_unset();
        session_destroy();
        setcookie('PHPSESSID', '', time() - 3600);
        header('Location: /Museo/Utente/login');
    }

    public static function getUserLogged():?EUser
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!is_null($_SESSION['user'])){
            return unserialize($_SESSION['user']);
        }
        else return NULL;
    }

    public static function addDataSession(String $key , $data)
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if($key!='user'){
            $_SESSION[$key]=serialize($data);
        }
        else throw new Exception("invalid key for data session , it is just used for login");
    }

    public static function getDataSession(String $key )
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!is_null($_SESSION[$key]))return unserialize($_SESSION[$key]);
        else return NULL;
    }




}