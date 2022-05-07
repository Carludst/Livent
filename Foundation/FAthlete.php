<?php
require_once "Entity/EAthlete.php";
require_once "FDb.php";
require_once "Entity/ETime.php";
class FAthlete {
    private static array $table=array("athlete","result");


    private static function getArrayByObject(EAthlete $athlete,bool $created_atPut= false):Array
    {
        $dateTime=new DateTime();
        $name=$athlete->getName();
        $surname=$athlete->getSurname();
        $birthdate=$athlete->getBirthdate();
        $team=$athlete->getTeam();
        $sport=$athlete->getSport();
        if($created_atPut)$created_at=$dateTime->format("Y-m-d h:i:s");
        $update_at=$dateTime->format("Y-m-d h:i:s");

        $fieldValue=array(
            'name'=>$name,
            'surname'=>$surname,
            'birthdate'=>$birthdate,
            'team'=>$team,
            'sport'=>$sport,
            'created_at'=>$created_at,
            'update_at'=>$update_at
        );
        return $fieldValue;

    }

    private static function getObjectByArray(Array $athlete):EAthlete
    {
        $object=new EAthlete($athlete["name"],$athlete["surname"],$athlete["birthdate"],$athlete["team"],$athlete["sport"],(int)$athlete["idathlete"]);
        return $object;
    }

    //resturn where clause for take a tuple by primarykey
    private static function whereKey($valueKey):String
    {
        return FDb::where("idathlete",$valueKey);
    }

    /**
     * -Method : store into database the data of EAthlete object
     * @param EAthlete $athlete EAthlete object to store data
     * @return void
     */
    public static function store(EAthlete $athlete):void
    {
        $fieldValue=self::getArrayByObject($athlete,true);
        FDb::store(self::$table[0],$fieldValue);
    }

    /**
     * -Method : return the frist object of the result of the query
     * @param int $key key of the table
     * @return EAthlete|null null if not found
     * @throws Exception FDb exInterrogation exception
     */
    public static function loadOne(int $key):?EAthlete{
        $query=FDb::load(self::$table[0],self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    /**
     * -Method : return an array of object according with the query result
     * @param String $where where clouse
     * @param String|array $orderBy attribute to sort by
     * @param bool|array $ascending order type (ascending/decreasing)
     * @return array array of object
     * @throws Exception FDb exInterrogation exception
     */
    public static function load(String $where,String|Array $orderBy="",bool|Array $ascending=true):Array{
        $query=FDb::load(self::$table[0],$where);
        $resultQ=FDb::exInterrogation($query,$orderBy,$ascending);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$c]=self::getObjectByArray($v);
        }
        return $result;
    }

    /**
     * -Method : search in database by primarykey
     * @param int $key primarykey value
     * @return bool|null return true if find correspondence , null if occurs an exception
     */
    public static function existOne(int $key):?bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    /**
     * -Method : delate by primarykey
     * @param int $key primarykey value
     * @return bool|null return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function deleteOne(int $key):?bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    /**
     * -Method : update EAthlete data by primarykey saved into object passed
     * @param EAthlete $athlete  EAthlete data to update
     * @return bool|null return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function updateOne(EAthlete $athlete):?bool
    {
        return FDb::update(self::$table[0],self::whereKey((String)$athlete->getId()),self::getArrayByObject($athlete));
    }

    public static function getResults(EAthlete $athlete):?array
    {
        $query=FDb::load(self::$table[1],self::whereKey((String)$athlete->getId()));
        $resultQ=FDb::exInterrogation($query);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$v["namecompetition"]][]=array($v["idevent"],new ETime((float)$v["time"]));
        }
        return $result;
    }




}
