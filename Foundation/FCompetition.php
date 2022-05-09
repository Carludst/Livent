<?php
require_once "FDb.php";
require_once "Entity/ECompetition.php";
require_once "Entity/ETime.php";
require_once "Entity/EDistance.php";

class FCompetition {
    private static array $table=array("competitions","result");

    private static function getArrayByObject(ECompetition $competition,bool $created_atPut= false):Array
    {
        $name=$competition->getName();
        $dateTime=$competition->getDateTime()->format("y-m-d h-i-s");
        $description=$competition->getDescription();
        $gender=$competition->getGender();
        $sport=$competition->getSport();
        $duration=$competition->getDistance()->getValue();

        $now=new DateTime();
        if($created_atPut)$created_at=$now->format("Y-m-d h:i:s");
        $update_at=$now->format("Y-m-d h:i:s");

        $fieldValue=array(
            'namecompetition'=>$name,
            'datetime'=>$dateTime,
            'description'=>$description,
            'gender'=>$gender,
            'sport'=>$sport,
            'duration'=>$duration,
            'update_at'=>$update_at
        );
        if($created_atPut)$fieldValue['created_at']=$created_at;
        return $fieldValue;

    }

    private static function getObjectByArray(Array $competition):ECompetition
    {
        $datetime=new DateTime($competition['datetime']);
        $duration=new EDistance((float)$competition["duration"]);
        $object=new ECompetition($competition["namecompetition"],$datetime,$competition["gender"],$competition["sport"],$duration,$competition['description'],$competition["idcompetition"]);
        return $object;
    }

    //resturn where clause for take a tuple by primarykey
    private static function whereKey(int $key ):String
    {
        return FDb::where("idcompetition",$key);
    }

    public static function store(ECompetition $competition):void
    {
        $fieldValue=self::getArrayByObject($competition,true);
        FDb::store(self::$table[0],$fieldValue);
    }

    public static function loadOne(int $key):?ECompetition{
        $query=FDb::load(self::$table[0],self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function load(String $where,String|Array $orderBy="",bool|Array $ascending=true):Array{
        $query=FDb::load(self::$table[0],$where);
        $resultQ=FDb::exInterrogation($query,$orderBy,$ascending);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$c]=self::getObjectByArray($v);
        }
        return $result;
    }

    public static function existOne(int $key):?bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    public static function deleteOne(int $key):?bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    public static function updateOne(ECompetition $competition,String $idEvent):?bool
    {
        return FDb::update(self::$table[0],self::whereKey(array($competition->getName(),$idEvent)),self::getArrayByObject($competition));
    }
}