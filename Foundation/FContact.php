<?php

require_once "../Entity/EContact.php";
require_once "FDb.php";
require_once "../Entity/ETime.php";

class FContact{
    private static array $table = array("contact");
    
    public static function getArrayByObject(EContact $contact,EEvent $event):Array{
        $name = $contact->getName();
        $number = $contact->getPhoneNumber();
        $email = $contact->getEmail();
        $idevent= $event->getId();
        //vedere se aggiungere l'attributo evento alla classe EContact per usarlo come chiave

        $updated_at = date('Y-m-d H:i:s');

        $fieldValue=array(
            'name'=>$name,
            'number'=>$number,
            'e-mail'=>$email,
            'idevent'=>$idevent,
            'updated_at'=>$updated_at,
        );
        return $fieldValue;
    }

    private static function getObjectByArray(Array $contacts):EContact
    {
        $object = new EContact($contacts["name"],$contacts["number"],$contacts["e-mail"]);
        return $object;
    }

    private static function whereKey(Array $key):Array
    {
        $idevent=$key[0];
        $name=$key[1];
        return FDb::multiWhere(array('idevent','name'),array($idevent,$name));
    }

    public static function store(Array $object):void
    {
        $contact=$object[1];
        $event=$object[0];
        $created_at = date('Y-m-d H:i:s');
        $fieldValue = self::getArrayByObject($contact,$event);
        $fieldValue['created_at']=$created_at;
        FDb::store(self::$table, $fieldValue);
    }

    public static function loadOne(Array $key):?EContact{
        $query=FDb::load(self::$table,self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function load(String $fieldWhere, String $valueWhere,String $opWhere="=", String|Array $orderBy="", bool|Array $ascending=true): Array{
        $where=FDb::where($fieldWhere,$valueWhere,$opWhere);
        $query=FDb::load(self::$table,$where);
        $resultQ=FDb::exInterrogation($query,$orderBy,$ascending);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$c]=self::getObjectByArray($v);
        }
        return $result;
    }

    public static function existOne(Array $key):?bool
    {
        return FDb::exist(FDb::load(self::$table,self::whereKey($key)));
    }

    public static function deleteOne(Array $key):?bool
    {
        return FDb::delate(self::$table,self::whereKey($key));
    }

    public static function updateOne(Array $object):?bool
    {
        $contact=$object[1];//secondo elemento dell'array: oggetto contatto
        $event=$object[0];//primo elemento:oggetto evento
        $key=array($event->getId(),$contact->getName());
        return FDb::update(self::$table,self::whereKey($key),self::getArrayByObject($event,$contact));
    }

}
?>
