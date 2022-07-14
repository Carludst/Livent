<?php
class FEvent
{
    private static Array $table=array("event",'competitions');

    private static function getArrayByObject(EEvent $event):Array
    {
        $nome=$event->getName();
        $iduser=$event->getOrganizer()->getId();
        $place=$event->getPlace();
        $description=$event->getDescription();
        $pubilc=$event->getPublic();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d H:i:s");

        $fieldValue=array(
            'namevent'=>$nome,
            'idorganizer'=>$iduser,
            'place'=>$place,
            'description'=>$description,
            'public'=>$pubilc,
            'updated_at'=>$update_at
        );

        return $fieldValue;
    }

    private static function getObjectByArray(Array $event):EEvent
    {
        $id=$event['idevent'];
        $name=$event['namevent'];
        $organizer=FUser::loadOne((int)$event['idorganizer']);
        $place=$event['place'];
        $description=$event['description'];
        $pubilc=$event['public'];

        return new EEvent($name,$place,$organizer,(bool)$pubilc,$description,$id);
    }

    private static function whereKey(int $key ):Array
    {
        return FDb::where('idevent',$key);
    }


    /**
     * @param EEvent $event
     * @return void
     * @throws Exception
     */
    public static function store(EEvent $event):void
    {
        if(!FUser::existOne($event->getOrganizer()->getId()))throw new Exception("the organizer of the event don't exist on DB");
        $dateTime=new DateTime();
        $created_at=$dateTime->format("Y-m-d H:i:s");
        $fieldValue=self::getArrayByObject($event);
        $fieldValue['created_at']=$created_at;
        FDb::store(self::$table[0],$fieldValue);
        $event->setId((int)FDb::exInterrogation(FDb::opGroupMax(self::$table[0],'idevent'))[0]['max']);
    }

    public static function loadOne(int $key):?EEvent
    {
        $query=FDb::load(self::$table[0],self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function loadLastStore():?EEvent{
        $id=FDb::exInterrogation(FDb::opGroupMax(self::$table[0],'idevent'))[0]['max'];
        return self::loadOne($id);
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

    /**
     * @throws Exception
     */
    public static function deleteReference(int $key):bool
    {
        $competition=FDb::delate(self::$table[1],FDb::where('idevent',$key));
        $event=self::deleteOne($key);
        return $competition && $event ;
    }

    public static function updateOne(EEvent $event):bool
    {
        return FDb::update(self::$table[0],self::whereKey((String)$event->getId()),self::getArrayByObject($event));
    }

    public static function getCompetitions(EEvent $event):Array
    {
       return FCompetition::search($event);
    }

    public static function getContacts(EEvent $event):Array
    {
        return FContact::load('idevent',$event->getId(),"=",'namecontact');
    }

    public static function getComments(EEvent $event):Array
    {
        return FComment::load('idevent',$event->getId(),'=','updated_at');
    }

    public static function loadByCompetition(ECompetition $competition):?EEvent
    {
        if(FDb::exist(FDb::load(self::$table[1],FDb::where('idcompetition',$competition->getId())))) {
            $resultQuery=FDb::exInterrogation(FDb::load(self::$table[1],FDb::where('idcompetition',$competition->getId()),'idevent'));
            $id=(int)$resultQuery[0]['idevent'];
            return self::loadOne($id);
        }
        else return NULL;
    }

    public static function getPathFile(EEvent $event):String
    {
        return $event::class."/".$event->getId();
    }

    public static function search(?bool $public=NULL ,?String $name=NULL , ?EUser $user=NULL ,?String $place=NULL , ?DateTime $startDateFrom=NULL , ?DateTime $startDateTo=NULL , ?String $sport=NULL){
        $fields=array();
        $values=array();
        $opWhere=array();
        $result=array();
        $orderBy=array();
        $ascending=array();

        if(is_null($name) && is_null($user) && is_null($public) && is_null($place) && is_null($startDateFrom)  && is_null($startDateTo) && is_null($sport)){
            $resultQ=FDb::exInterrogation(FDb::load(self::$table[0]));
            foreach ($resultQ as $c=>$v){
                $result[$c]=self::getObjectByArray($v);
            }
            return $result;
        }
        else{
            if(!is_null($name)){
                $fields[]='namevent';
                $values[]=$name.'%';
                $opWhere[]='LIKE ';
            }
            if(!is_null($place)){
                $fields[]='place';
                $values[]=$place.'%';
                $opWhere[]='LIKE ';
                $orderBy[]='place';
                $ascending[]=true;
            }
            if(!is_null($user)){
                $fields[]='idorganizer';
                $values[]=$user->getId();
                $opWhere[]='=';
            }
            if(!is_null($public)){
                $fields[]='public';
                $values[]=$public;
                $opWhere[]='=';
            }
            if(!is_null($startDateFrom)){
                $dateStart=FDb::opGroupMin(self::$table[1].' AS T','T.datetime',' WHERE T.idevent=idevent');
                $fields[]='('.$dateStart['query'].')';
                $values[]=$startDateFrom->format("y-m-d");
                if(is_null($startDateTo)||$startDateFrom<$startDateTo)
                {
                    $opWhere[]='>=';
                }
                else $opWhere[]='<=';
            }
            if(!is_null($startDateTo)){
                $dateStart=FDb::opGroupMin(self::$table[1].' AS T','T.datetime', ' WHERE T.idevent=idevent ');
                $fields[]='('.$dateStart['query'].')';
                $values[]=$startDateTo->format("y-m-d");
                if(is_null($startDateFrom)||$startDateTo>$startDateFrom)
                {
                    $opWhere[]='<=';
                }
                else $opWhere[]='>=';
            }
            if(!is_null($sport)){
                $fields[]='idevent';
                $values[]=FDb::load(self::$table[1].' AS T',FDb::where('T.sport',$sport),'T.idevent');
                $opWhere[]='= any ';
            }
            $resultQ=FDb::exInterrogation(FDb::load(self::$table[0],FDb::multiWhere($fields,$values,'AND',$opWhere)),$orderBy,$ascending);
            foreach ($resultQ as $c=>$v){
                $result[$c]=self::getObjectByArray($v);
            }
            return $result;
        }
    }
}