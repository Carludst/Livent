<?php

class FAthlete {
    private static array $table=array("athlete","result");


    private static function getArrayByObject(EAthlete $athlete):Array
    {
        $dateTime=new DateTime();
        $name=$athlete->getName();
        $surname=$athlete->getSurname();
        $birthdate=$athlete->getBirthdate()->format("y-m-d");
        $famale=$athlete->getFamale();
        $team=$athlete->getTeam();
        $sport=$athlete->getSport();
        $update_at=$dateTime->format("Y-m-d H:i:s");

        $fieldValue=array(
            'name'=>$name,
            'surname'=>$surname,
            'birthdate'=>$birthdate,
            'famale'=>$famale,
            'team'=>$team,
            'sport'=>$sport,
            'updated_at'=>$update_at
        );
        return $fieldValue;

    }

    private static function getObjectByArray(Array $athlete):EAthlete
    {
        $birthdate=new DateTime($athlete["birthdate"]);
        $object=new EAthlete($athlete["name"],$athlete["surname"],$birthdate,(bool)$athlete['famale'],$athlete["team"],$athlete["sport"],(int)$athlete["idathlete"]);
        return $object;
    }

    //resturn where clause for take a tuple by primarykey
    private static function whereKey($valueKey):Array
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
        $dateTime=new DateTime();
        $created_at=$dateTime->format("Y-m-d H:i:s");
        $fieldValue=self::getArrayByObject($athlete,true);
        $fieldValue['created_at']=$created_at;
        FDb::store(self::$table[0],$fieldValue);
        $athlete->setId((int)FDb::exInterrogation(FDb::opGroupMax(self::$table[0],'idathlete'))[0]['max']);
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
    public static function load(String $fieldWhere, String $valueWhere,String $opWhere="=",String|Array $orderBy="",bool|Array $ascending=true):Array{
        $where=FDb::where($fieldWhere,$valueWhere,$opWhere);
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
     * @return bool return true if find correspondence , null if occurs an exception
     */
    public static function existOne(int $key): bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    /**
     * -Method : delate by primarykey
     * @param int $key primarykey value
     * @return bool return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function deleteOne(int $key):bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    /**
     * -Method : update EAthlete data by primarykey saved into object passed
     * @param EAthlete $athlete  EAthlete data to update
     * @return bool return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function updateOne(EAthlete $athlete):bool
    {
        return FDb::update(self::$table[0],self::whereKey($athlete->getId()),self::getArrayByObject($athlete));
    }

    /**
     * -Method : return an array (name copetition key) of array (idevent , time) with the result order by time
     * @param EAthlete $athlete athlete who want the result
     * @return array|null return an array (name copetition key) of array (idevent , time) with the result order by time
     * @throws Exception FDb exInterrogation exception
     */
    public static function getResults(EAthlete $athlete):?array
    {
        $where=FDb::multiWhere(array("idathlete","time","time"),array($athlete->getId(),'NULL',0),"AND",array("=","<>",">"));
        $query=FDb::load(self::$table[1],$where);
        $resultQ=FDb::exInterrogation($query,"time");
        $result=array();
        foreach ($resultQ as $c=>$v){
            //righa successiva da modificare
            $competition=FCompetition::loadOne($v["idcompetition"]);
            $result[$competition->getSport()][$competition->getName()][]=array($competition,new ETime((float)$v["time"]));
        }
        $where1=FDb::multiWhere(array('idathlete','time','time'),array((String)$athlete->getId(),'NULL',0),"AND",array("=","<>","<="));
        $query1=FDb::load(self::$table[1],$where);
        $resultQ1=FDb::exInterrogation($query,"time");
        foreach ($resultQ1 as $c=>$v){
            //righa successiva da modificare
            $competition=FCompetition::loadOne($v["idcompetition"]);
            $result[$competition->getSport()][$competition->getName()][]=array($competition,new ETime((float)$v["time"]));
        }

        return $result;
    }

    public static function getPathFile(EAthlete $athlete):String
    {
        return EAthlete::class."/".$athlete->getId();
    }

    public static function search(String|Null $name , String|Null $surname , DateTime|Null $birthdateFrom , DateTime|Null $birthdateTo , ?bool $famale , String|Null $team , String|Null $sport )
    {
       $fields=array();
       $values=array();
       $opWhere=array();
       $result=array();
       $orderBy=array();
       $ascending=array();

       if(is_null($name)&& is_null($surname) && is_null($birthdateFrom) && is_null($birthdateTo) && is_null($famale) && is_null($team) && is_null($sport)){
           $resultQ=FDb::exInterrogation(FDb::load(self::$table[0]));
           foreach ($resultQ as $c=>$v){
               $result[$c]=self::getObjectByArray($v);
           }
           return $result;
       }
       else{
           if(!is_null($name)){
               $fields[]='name';
               $values[]=$name.'%';
               $opWhere[]='LIKE';
               $orderBy[]='name';
               $ascending[]=true;
           }
           if(!is_null($surname)){
               $fields[]='surname';
               $values[]=$surname.'%';
               $opWhere[]='LIKE';
               $orderBy[]='name';
               $ascending[]=true;
           }
           if(!is_null($birthdateFrom)){
               $fields[]='birthdate';
               $values[]=$birthdateFrom->format("y-m-d");
               if(is_null($birthdateTo)||$birthdateFrom<$birthdateTo)
               {
                   $opWhere[]='>=';
                   $orderBy[]='birthdate';
                   $ascending[]=true;
               }
               else $opWhere[]='<=';
           }
           if(!is_null($birthdateTo)){
               $fields[]='birthdate';
               $values[]=$birthdateTo->format("y-m-d");
               if(is_null($birthdateFrom)||$birthdateTo>$birthdateFrom)
               {
                   $opWhere[]='<=';
                   if(is_null($birthdateFrom)){
                       $orderBy[]='birthdate';
                       $ascending[]=false;
                   }
               }
               else $opWhere[]='>=';
           }
           if(!is_null($famale)){
               $fields[]='famale';
               $values[]=$famale;
               $opWhere[]='=';
           }
           if(!is_null($team)){
               $fields[]='team';
               $values[]=$team.'%';
               $opWhere[]='LIKE';
               $orderBy[]='team';
               $ascending[]=true;
           }
           if(!is_null($sport)){
               $fields[]='sport';
               $values[]=$sport;
               $opWhere[]='=';
           }
           $resultQ=FDb::exInterrogation(FDb::load(self::$table[0],FDb::multiWhere($fields,$values,'AND',$opWhere)),$orderBy,$ascending);
           foreach ($resultQ as $c=>$v){
               $result[$c]=self::getObjectByArray($v);
           }
           return $result;
       }

    }







}
