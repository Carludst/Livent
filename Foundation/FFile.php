<?php

class FFile
{
    private static String $path="../Utility/Error.txt";

    /**
     * @param String $path
     */
    public function __construct(String $path)
    {
        self::$path=$path;
    }

    /**
     * @return String
     */
    public static function getPath():String
    {
        return self::$path;
    }

    /**
     * @param String $text
     * @return void
     */
    public static function append(String $text)
    {
        $file=fopen(self::$path,'a');
        fwrite($file,$text);
        fclose($file);
    }



    /**
     * @param String $text
     * @return void
     */
    public static function write(String $text)
    {
        $file=fopen(self::$path,'w');
        fwrite($file,$text);
        fclose($file);
    }

    /**
     * @param int|null $row
     * @return String
     */
    public static function read(?int $row=NULL):String
    {
        if(is_null($row))return file(self::$path);
        else{
            $file=fopen(self::$path,'r');
            $result="";
            if($row<0)$row=count(file(self::$path))+1-$row;
            for($i=0;$i<$row;$i++) {
                $result = fgets($file);
            }
            fclose($file);
            return $result;
        }
    }

    /**
     * @return void
     */
    public static  function delete()
    {
        self::write("");
    }

    /**
     * @return int
     */
    public static function numberRow():int
    {
        return count(file(self::$path));

    }

}