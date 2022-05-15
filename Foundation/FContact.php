<?php

require_once "Entity/EContact.php";
require_once "FDb.php";
require_once "Entity/Etime.php";

class FContact{
    private static array $table = array("contact");
    
    public static function getArrayByObject(EContact $contact){
        $name = $contact->getName();
        $number = $contact->getNumber();
        $email = $contact->getEmail();
        //vedere se aggiungere l'attributo evento alla classe EContact per usarlo come chiave
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $fieldValue=array(
            'name'=>$name,
            'number'=>$number,
            'e-mail'=>$email,
            'nameEvent'=>$nameEvent
        );
        return $fieldValue;
    }

    private static function getObjectByArray(Array $contacts):EContacts
    {
        $object = new ECompetition($contacts["name"],$contacts["number"],$contacts["e-mail"],$contacts["nameEvent"]);
        return $object;
    }

    private static function whereKey($valueKey):String
    {
        return FDb::where("nameEvent",$valueKey);
    }

    public static function store(EContact $contact):void
    {
        $fieldValue = self::getArrayByObject($contact,true);
        FDb::store(self::$table[0], $fieldValue);
    }

    public static function loadOne(int $key):?EContact{
        $query=FDb::load(self::$table[0],self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function load(int $key): Econtact{
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

    public static function updateOne(EContact $contact,String $idEvent):?bool
    {
        return FDb::update(self::$table[0],self::whereKey(array($contact->getName(),$nameEvent)),self::getArrayByObject($contact));
    }

}
?>
