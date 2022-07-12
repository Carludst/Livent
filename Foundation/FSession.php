<?php

class FSession
{
    public static function isLogged():bool
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(array_key_exists('user',$_SESSION)){
            if(FDbH::existOne(self::getUserLogged()->getId(),EUser::class)) return true;
            else {
                self::logout();
                return false;
            }
        }
        else return false;
    }

    public static function login(EUser $user):void
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!array_key_exists('user',$_SESSION))
        {
            $_SESSION['user'] = serialize($user);
        }
        else throw new Exception("you can't login if you are just logged");
    }

    public static function logout()
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        session_unset();
        session_destroy();
        setcookie('PHPSESSID', '', time() - 3600);
    }

    public static function getChronology(String $class)
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(isset($_SESSION['Chronology_'.$class])){
            return unserialize($_SESSION['Chronology_'.$class]);
        }
        else return array();
    }

    public static function addChronology(String $class , mixed $data)
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(self::isLogged()){
            if(isset($_SESSION['Chronology_'.$class])){
                $array=unserialize($_SESSION['Chronology_'.$class]);
                if(!in_array($data,$array))$array[]=$data;
                $_SESSION['Chronology_'.$class]=serialize($array);
            }
            else $_SESSION['Chronology_'.$class]=serialize(array($data));
        }
    }

    public static function popChronology(String $class,int $index)
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!is_null($_SESSION['Chronology_'.$class])){
            $array=unserialize($_SESSION['Chronology_'.$class]);
            if(isset($array[$index]))array_splice($array,$index,1);
            $_SESSION['Chronology_'.$class]=serialize($array);
        }
        else return array();
    }

    public static function getUserLogged():?EUser
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(!is_null($_SESSION['user'])){
            return unserialize($_SESSION['user']);
        }
        else throw new Exception("you aren't logged");
    }

    public static function updateUserLogged(EUser $user):void
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if($user->getId()==self::getUserLogged()->getId()){
            $_SESSION['user'] = serialize($user);
        }
    }

    public static function addDataSession(String $key ,mixed $data)
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if($key!='user'){
            $_SESSION[$key]=serialize($data);
        }
        else throw new Exception("invalid key for data session , it is just used for login");
    }

    public static function delateDataSession(String $key){
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(array_key_exists($key ,$_SESSION)){
            unset($_SESSION[$key]);
        }
    }

    public static function getAndDeleteDataSassion(String $key):mixed{
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(array_key_exists($key ,$_SESSION)){
            $result=unserialize($_SESSION[$key]);
            unset($_SESSION[$key]);
            return $result;
        }
        else return NULL;
    }

    public static function getDataSession(String $key ):mixed
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(array_key_exists($key ,$_SESSION))return unserialize($_SESSION[$key]);
        else return NULL;
    }

    public static function isSetDataSession(String $key ):bool
    {
        if (session_status() == PHP_SESSION_NONE)session_start();
        if(array_key_exists($key ,$_SESSION))return true;
        else return false;
    }




}