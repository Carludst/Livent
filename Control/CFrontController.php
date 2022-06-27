<?php

class CFrontController
{
    private static String $url;
    private static String $method;

    public function __construct()
    {
        self::$url=$_SERVER['REQUEST_URI'];
        self::$method=$_SERVER['REQUEST_METHOD'];
    }


    public static function run(){
        try{
            $url=explode("/",self::$url);
            $url=array_slice($url,1,-1);


            require_once($GLOBALS['defaultPath']."/Utility/routing.php");
            $route=$routing;
            $i=0;
            while (is_array($route) && $i<count($url) && key_exists($url[$i],$route)){
                $route=$route[$url[$i]];
                $i=$i+1;
            }

            while(is_array($route)){
                if(key_exists('',$route))$route=$route[''];
                else throw new Exception('HTTP/1.1 404 Not Found');
            }
            if($i<count($url)-1)throw new Exception('HTTP/1.1 404 Not Found');
            elseif(preg_match('/\(\)$/',$route)){
                if($i==count($url)-1){
                    global $_MYINPUT;
                    $_MYINPUT=$url[-1];
                    $route=substr($route,0,-2);
                }
                else $route=substr($route,0,-2);
            }
            elseif($i==count($url)-1)throw new Exception('HTTP/1.1 404 Not Found');




            $exec=explode("::",$route);
            $controller=$exec[0];
            $method=$exec[1];


            if(class_exists($controller)){
                if(method_exists($controller,$method)){
                    $controller::$method();
                }
                else throw new Exception('HTTP/1.1 405 Method Not Found');
            }
            else throw new Exception('HTTP/1.1 404 Not Found');

        }
        catch (Exception $exception){
            echo($exception->getMessage());
           //if($exception->getMessage()=='HTTP/1.1 404 Not Found') header('HTTP/1.1 404 Not Found');
           //else header('HTTP/1.1 405 Method Not Found');
        }

    }

    /**
     * @return String
     */
    public static function getUrl(): String
    {
        return self::$url;
    }

    /**
     * @return String
     */
    public static function getMethod(): String
    {
        return self::$method;
    }



}