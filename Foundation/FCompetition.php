<?php

require_once "Entity/ECompetition.php";
require_once "FDb.php";
require_once "Entity/Etime.php";

class FContact{
    private static array $table = array("competition", "date");
    
    public static function getArrayByObject(ECompetition $competition){
        $name = $competition->getName();
        $date = $competition->getDateTime()->format("y-m-d");
        $time = $competition->getTime();
        $description = $competition->getDescription();
        $gender = $competition->getGender();
        $competitors = $competition->getCompetitors();
        $sport = $competition->getSport();
        $distance = $competition->getDistance();
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $fieldValue=array(
            'name'=>$name,
            'date'=>$date,
            'time'=>$time,
            'description'=>$description,
            'genere'=>$genere,
            'competitors'=>$competitors,
            'sport'=>$sport,
            'distance'=>$distance,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at
        );
        return $fieldValue;
    }

    private static function getObjectByArray(Array $competitions):ECompetition
    {
        $date = new DateTime($competition["date"]);
        $object = new ECompetition($competitions["name"],$competitions[new DateTime($competitions["date"])],$competitions["time"],$competitions["description"],$competitions["gender"],$competitions["competitors"],$competitions["distance"],$created_at["created_at"],$updated_at["updated_at"]);
        return $object;
    }

    private static function whereKey($valueKey):String
    {
        return FDb::where("idcompetition",$valueKey);
    }

    public static function store(ECompetition $competition):void
    {
        $fieldValue = self::getArrayByObject($competition,true);
        FDb::store(self::$table[0], $fieldValue);
    }


    

}
?>