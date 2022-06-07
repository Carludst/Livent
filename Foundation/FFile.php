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
    public static function appendElement(String $text)
    {
        $file=fopen(self::$path,'a');
        if(!self::numberRow()==0)$text="\n\n".$text;
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
            for($i=0;$i++;$i<$row) {
                $result = fgets($file);
            }
            fclose($file);
            return $result;
        }
    }

    /**
     * @param int $index
     * @return String
     * @throws Exception
     */
    public static function getElement(int $index):String
    {
        $result="";
        $i=0;
        $file=fopen(self::$path,'r');
        while(!feof($file)&&$i<$index)
        {
            $line=fgets($file);
            if($line=="")$i=$i+1;
            if($i=$index-1)$result=$result.$line;
        }
        if($i<$index)throw new Exception("element not found");
        return $result;
    }

    /**
     * @return array
     */
    public static function getElements():Array
    {
        $result=array();
        $i=0;
        $file=fopen(self::$path,'r');
        $r="";
        while(!feof($file))
        {
            $line=fgets($file);
            if($line==""){
                $result[]=$r;
                $r="";
            }
            else $r=$r.$line;
        }
        return $result;
    }

    /**
     * @return void
     */
    public static  function delate()
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