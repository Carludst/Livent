<?php

class MappingPathFile
{
    //DIRECTORY DB
    private static String $dirEventDefault='System/Event';
    private static String $dirUserDefault='System/User';
    private static String $dirHomeMain='System/HomeImg';

    //NAME FILE DB
    private static String $nameEventMain='front';
    private static String $nameUserMain='profile';
    private static String $nameCommentMain='attachedImg';

    //DIRECTORY DB GET METHOD
    public static function dirEventDefault():String{
        return self::$dirEventDefault;
    }

    public static function dirUserDefault():String{
        return self::$dirUserDefault;
    }

    public static function dirHomeMain():String{
        return self::$dirHomeMain;
    }


    //NAME FILE DB METHOD
    public static function nameEventMain():String{
        return self::$nameEventMain;
    }

    public static function nameUserMain():String{
        return self::$nameUserMain;
    }

    public static function nameCommentMain():String{
        return self::$nameCommentMain;
    }

}