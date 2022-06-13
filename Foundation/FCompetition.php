<?php
require_once "FDb.php";
require_once "FAthlete.php";
require_once "../Entity/ECompetition.php";
require_once "../Entity/ETime.php";
require_once "../Entity/EDistance.php";
require_once "../Entity/EAthlete.php";

class FCompetition {
    private static array $table=array("competitions","result");

    private static function getArrayByObject(ECompetition $competition):Array
    {
        $name=$competition->getName();
        $dateTime=$competition->getDateTime()->format("y-m-d h-i-s");
        $description=$competition->getDescription();
        $gender=$competition->getGender();
        $sport=$competition->getSport();
        $duration=$competition->getDistance()->getValue();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d h:i:s");

        $fieldValue=array(
            'namecompetition'=>$name,
            'datetime'=>$dateTime,
            'description'=>$description,
            'gender'=>$gender,
            'sport'=>$sport,
            'distance'=>$duration,
            'updated_at'=>$update_at
        );
        return $fieldValue;

    }

    private static function getObjectByArray(Array $competition):ECompetition
    {
        $datetime=new DateTime($competition['datetime']);
        $duration=new EDistance((float)$competition["duration"]);
        $object=new ECompetition($competition["namecompetition"],$datetime,$competition["gender"],$competition["sport"],$duration,$competition['description'],$competition["idcompetition"]);
        return $object;
    }

    //return where clause for take a tuple by primarykey
    private static function whereKey(int $key ):Array
    {
        return FDb::where("idcompetition",$key);
    }

    private static function getArrByObjResult(ECompetition $competition,EAthlete $athlete , EUser|ETime $info):Array
    {
        $idCompetition=(String)$competition->getId();
        $idAthlete=(String)$athlete->getId();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d h:i:s");

        if($info::class==EUser::class){
            $email=$info->getEmail();
            return array("idathlete"=>$idAthlete,"idcompetition"=>$idCompetition,"email"=>$email,"updated_at"=>$update_at);
        }
        else{
            $time=(String)$info->getValue();
            return array("idathlete"=>$idAthlete,"idcompetition"=>$idCompetition,"time"=>$time);
        }
    }

    private static function whereResult(ECompetition $competition,EAthlete $athlete):Array
    {
        return FDb::multiWhere(array('idcompetition','idathlete'),array((string)$competition->getId(),(string)$athlete->getId()));
    }

    public static function store(ECompetition $competition,int $idEvent):void
    {
        if(!FEvent::existOne($idEvent))throw new Exception("you can't associate an competition with an event don't saved on DB");
        $now=new DateTime();
        $created_at=$now->format("Y-m-d h:i:s");
        $fieldValue=self::getArrayByObject($competition);

        $fieldValue['created_at']=$created_at;
        $fieldValue['idevent']=$idEvent;

        FDb::store(self::$table[0],$fieldValue);
        $competition->setId((int)FDb::exInterrogation(FDb::opGroupMax(self::$table[0],'idcompetition'))[0]['max']);
    }

    public static function loadOne(int $key):?ECompetition{
        $query=FDb::load(self::$table[0],self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

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

    public static function existOne(int $key):?bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    public static function deleteOne(int $key):?bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    public static function updateOne(ECompetition $competition):?bool
    {
        return FDb::update(self::$table[0],self::whereKey($competition->getId()),self::getArrayByObject($competition));
    }

    public static function addResult(ECompetition $competition,EAthlete $athlete,ETime $time):?bool
    {
        return FDb::update(self::$table[0],self::whereResult($competition,$athlete),self::getArrByObjResult($competition,$athlete,$time));
    }

    public static function addRegistration(ECompetition $competition,EAthlete $athlete,EUser $user): ?bool
    {
        $now=new DateTime();
        $created_at=$now->format("Y-m-d h:i:s");
        $fieldValue=self::getArrByObjResult($competition,$athlete,$user);
        $fieldValue["created_at"]= $created_at;

        return FDb::store(self::$table[1],$fieldValue);
    }

    public static function deleteCompetitor(ECompetition $competition,EAthlete $athlete): bool
    {
        return FDb::delate(self::$table[1],self::whereResult($competition,$athlete));
    }

    public static function getResult(ECompetition $competition,EAthlete $athlete): ?ETime
    {
        $resultQ=FDb::exInterrogation(FDb::load(self::$table[1],self::whereResult($competition,$athlete)));
        if($resultQ[0]["time"]=="NULL")return null;
        else return new ETime($resultQ[0]["time"]);
    }

    /*
     * return the user who register the athlete passed to the competition passed
    public static function getRegisterBy(ECompetition $competition,EAthlete $athlete):EUser
    {

    }
    */

    public static function getClassification(ECompetition $competition): Array
    {
        $where=FDb::multiWhere(array('idcompetition','time','time'),array((String)$competition->getId(),'NULL','0'),"AND",array("=","<>",">"));
        $query=FDb::load(self::$table[1],$where);
        $resultQ=FDb::exInterrogation($query,"time");
        $result=array();
        foreach ($resultQ as $c=>$v){
            $athlete=FAthlete::loadOne((int)$v["idathlete"]);
            $time=new ETime((float)$v["time"]);
            $result[]=array($athlete,$time);
        }
        $where1=FDb::multiWhere(array('idcompetition','time'),array((String)$competition->getId(),'NULL'),"AND",array("=","<>"));
        $query1=FDb::load(self::$table[1],$where1);
        $resultQ1=FDb::exInterrogation($query1);
        foreach ($resultQ1 as $c=>$v){
            $athlete=FAthlete::loadOne((int)$v["idathlete"]);
            $time=new ETime((float)$v["time"]);
            $result[]=array($athlete,$time);
        }
        return $result;
    }


     static function getRegistrations(ECompetition $competition): Array
    {
        $where=FDb::multiWhere(array('idcompetition','time'),array((String)$competition->getId(),'NULL'));
        $query=FDb::load(self::$table[1],$where);
        $resultQ=FDb::exInterrogation($query);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $athlete=FAthlete::loadOne((int)$v["idathlete"]);
            $iscriber=FUser::loadOne((String)$v["email"]);
            $result[]=array($athlete,$iscriber);
        }
        return $result;
    }

    public static function getPathFile(ECompetition $competition):String
    {
        return ECompetition::class."/".$competition->getId();
    }

}