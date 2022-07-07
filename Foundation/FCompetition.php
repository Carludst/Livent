<?php

class FCompetition {
    private static array $table=array("competitions","result");

    private static function getArrayByObject(ECompetition $competition):Array
    {
        $name=$competition->getName();
        $dateTime=$competition->getDateTime()->format("Y-m-d H:i:s");
        $description=$competition->getDescription();
        $gender=$competition->getGender();
        $sport=$competition->getSport();
        $duration=$competition->getDistance()->getValue();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d H:i:s");

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
        $duration=new EDistance((float)$competition['distance']);
        $object=new ECompetition($competition["namecompetition"],$datetime,$competition["gender"],$competition["sport"],$duration,$competition['description'],$competition["idcompetition"]);
        return $object;
    }

    //return where clause for take a tuple by primarykey
    private static function whereKey(int $key ):Array
    {
        return FDb::where("idcompetition",$key);
    }



    public static function store(ECompetition $competition,int $idEvent):void
    {
        if(!FEvent::existOne($idEvent))throw new Exception("you can't associate an competition with an event don't saved on DB");
        $now=new DateTime();
        $created_at=$now->format("Y-m-d H:i:s");
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

    public static function existOne(int $key):bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    public static function deleteOne(int $key):bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    public static function updateOne(ECompetition $competition):bool
    {
        return FDb::update(self::$table[0],self::whereKey($competition->getId()),self::getArrayByObject($competition));
    }

    public static function search(EEvent|NULL $event=NULL,?String $name=NULL,?String $gender=NULL ,?String $sport=NULL ,DateTime|Null $dateFrom=NULL , DateTime|Null $dateTo=NULL,?EDistance $distanceFrom=NULL ,?EDistance $distanceTo=NULL):Array
    {
        $fields=array();
        $values=array();
        $opWhere=array();
        $result=array();
        $orderBy=array();
        $ascending=array();

        if(is_null($event)&& is_null($name) && is_null($gender) && is_null($sport) && is_null($distanceFrom) && is_null($distanceTo)){
            $resultQ=FDb::exInterrogation(FDb::load(self::$table[0]));
            foreach ($resultQ as $c=>$v){
                $result[$c]=self::getObjectByArray($v);
            }
            return $result;
        }
        else{
            if(!is_null($event)){
                $fields[]='idevent';
                $values[]=$event->getId();
                $opWhere[]='=';
            }
            if(!is_null($dateFrom)){
                $fields[]='datetime';
                $values[]=$dateFrom ->format("y-m-d");
                if(is_null($dateTo)||$dateFrom <$dateTo){
                    $opWhere[]='>=';
                    $orderBy[]='datetime';
                    $ascending[]=true;
                }
                else $opWhere[]='<=';
            }
            if(!is_null($dateTo)){
                $fields[]='datetime';
                $values[]=$dateTo->format("y-m-d");
                if(is_null($dateFrom )||$dateTo>$dateFrom ){
                    $opWhere[]='<=';
                    if(is_null($dateFrom)){
                        $orderBy[]='datetime';
                        $ascending[]=false;
                    }
                }
                else $opWhere[]='>=';
            }
            if(!is_null($name)){
                $fields[]='name';
                $values[]=$name;
                $opWhere[]='=';
                $orderBy[]='name';
                $ascending[]=true;
            }
            if(!is_null($gender)){
                $fields[]='gender';
                $values[]=$gender;
                $opWhere[]='=';
            }
            if(!is_null($distanceFrom)){
                $fields[]='distance';
                $values[]=$distanceFrom->getValue();
                if(is_null($distanceTo)||$distanceFrom<$distanceTo){
                    $opWhere[]='>=';
                    $orderBy[]='distance';
                    $ascending[]=true;
                }
                else $opWhere[]='<=';
            }
            if(!is_null($distanceTo)){
                $fields[]='distance';
                $values[]=$distanceTo->getValue();
                if(is_null($distanceFrom)||$distanceTo>$distanceFrom){
                    $opWhere[]='<=';
                    if(is_null($dateFrom)){
                        $orderBy[]='distance';
                        $ascending[]=false;
                    }
                }
                else $opWhere[]='>=';
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

    public static function getPathFile(ECompetition $competition):String
    {
        return ECompetition::class."/".$competition->getId();
    }




    //Registration-Result



    private static function whereResult(ECompetition $competition,EAthlete $athlete):Array
    {
        return FDb::multiWhere(array('idcompetition','idathlete'),array((string)$competition->getId(),(string)$athlete->getId()));
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

    public static function addResult(ECompetition $competition,EAthlete $athlete,ETime $time): bool
    {
        return FDb::update(self::$table[0],self::whereResult($competition,$athlete),self::getArrByObjResult($competition,$athlete,$time));
    }

    /**
     * @throws Exception
     */
    public static function addRegistration(ECompetition $competition, EAthlete $athlete, EUser $user): bool
    {
        if($athlete->getFamale()&& $competition=='M' || !$athlete->getFamale() && $competition=='F')throw new Exception('sesso non compatibile');
        $now=new DateTime();
        $created_at=$now->format("Y-m-d h:i:s");
        $fieldValue=self::getArrByObjResult($competition,$athlete,$user);
        $fieldValue["created_at"]= $created_at;

        return FDb::store(self::$table[1],$fieldValue);
    }

    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @return bool
     */
    public static function deleteRegistration(ECompetition $competition,EAthlete $athlete): bool
    {
        return FDb::delate(self::$table[1],FDb::multiWhere(array('idcompetition','idathlete','time'),array((string)$competition->getId(),(string)$athlete->getId(),NULL),array('=','=','=')));
    }

    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @return bool
     * @throws Exception
     */
    public static function deleteResult(ECompetition $competition,EAthlete $athlete): bool
    {
        return FDb::delate(self::$table[1],FDb::multiWhere(array('idcompetition','idathlete','time'),array((string)$competition->getId(),(string)$athlete->getId(),NULL),array('=','=','<>')));
    }

    public static function existRegistration(ECompetition $competition,EAthlete $athlete):bool
    {
        return FDb::exist(FDb::load(self::$table[1],self::whereResult($competition,$athlete)));
    }

    /**
     * return the user who register the athlete passed to the competition passed
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @return EUser
     */
    public static function RegisteredBy(ECompetition $competition,EAthlete $athlete):?EUser
    {
        $resultQ=FDb::exInterrogation(FDb::load(self::$table[1],self::whereResult($competition,$athlete),'iduser'));
        if(!empty($resultQ)) return FDbH::loadOne((int)$resultQ[0]['iduser'],EUser::class);
        else return NULL;
    }


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
            $iscriber=FUser::loadOne((int)$v["iduser"]);
            $result[]=array($athlete,$iscriber);
        }
        return $result;
    }



}