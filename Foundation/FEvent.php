<?php
class FEvent
{
    private static String $table="event";

    private static function getArrayByObject(EEvent $event):Array
    {
        $nome=$event->getName();
        $email=$event->getOrganizer()->getEmail();
        $place=$event->getPlace();
        $description=$event->getDescription();
        $pubilc=$event->getPublic();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d h:i:s");

        $fieldValue=array(
            'namevent'=>$nome,
            'emailorganizer'=>$email,
            'place'=>$place,
            'description'=>$description,
            'public'=>$pubilc,
            'update_at'=>$update_at
        );

        return $fieldValue;
    }

    private static function getObjectByArray(Array $event):EEvent
    {
        $id=$event['idevent'];
        $name=$event['namevent'];
        $organizer=FUser::loadOne($event['emailorganizer']);
        $place=$event['place'];
        $description=$event['description'];
        $pubilc=$event['public'];

        return new EEvent($name,$place,$organizer,$pubilc,$description,$id);
    }

    private static function whereKey(int $key ):Array
    {
        return FDb::where('idevent',$key);
    }


    public static function store(EEvent $event):void
    {
        $dateTime=new DateTime();
        $created_at=$dateTime->format("Y-m-d h:i:s");
        $fieldValue=self::getArrayByObject($event);
        $fieldValue['created_at']=$created_at;
        FDb::store(self::$table,$fieldValue);
    }

    public static function loadOne(int $key):?EEvent
    {
        $query=FDb::load(self::$table,self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function load(String $fieldWhere, String $valueWhere,String $opWhere="=",String|Array $orderBy="",bool|Array $ascending=true):Array{
        $where=FDb::where($fieldWhere,$valueWhere,$opWhere);
        $query=FDb::load(self::$table,$where);
        $resultQ=FDb::exInterrogation($query,$orderBy,$ascending);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$c]=self::getObjectByArray($v);
        }
        return $result;
    }

    public static function existOne(int $key):?bool
    {
        return FDb::exist(FDb::load(self::$table,self::whereKey($key)));
    }

    public static function deleteOne(int $key):?bool
    {
        return FDb::delate(self::$table,self::whereKey($key));
    }

    public static function updateOne(EEvent $event):?bool
    {
        return FDb::update(self::$table,self::whereKey((String)$event->getId()),self::getArrayByObject($event));
    }

    public static function getCompetitions(EEvent $event):Array
    {
       return FCompetition::load(FDb::where('idevent',$event->getId()),'datetime');
    }

    public static function getContacts(EEvent $event):Array
    {
        return FContact::load(FDb::where('idevent',$event->getId()),'namecontact');
    }

    public static function getComments(EEvent $event):Array
    {
        return FComment::load(FDb::where('idevent',$event->getId()),'updated_at');
    }
}