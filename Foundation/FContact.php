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
            'idEvent'=>$idEvent,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at,
        );
        return $fieldValue;
    }

    private static function getObjectByArray(Array $contacts):EContacts
    {
        $object = new ECompetition($contacts["name"],$contacts["number"],$contacts["e-mail"],$contacts["nameEvent"],$contacts['created_at'],$contact['updated_at']);
        return $object;
    }

    private static function whereKey():String
    {
        return FDb::multiWhere(array('idEvent'=>$idEvent,'name'=>$name));
    }

    public static function store(EContact $contact):void
    {
        $fieldValue = self::getArrayByObject($contact);
        FDb::store(self::$table, $fieldValue);
    }

    public static function loadOne():?EContact{
        $query=FDb::load(self::$table,self::whereKey());
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function load(String $where, String|Array $orderBy="", bool|Array $ascending=true): Econtact{
        $query=FDb::load(self::$table,$where);
        $resultQ=FDb::exInterrogation($query,$orderBy,$ascending);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$c]=self::getObjectByArray($v);
        }
        return $result;
    }

    public static function existOne():?bool
    {
        return FDb::exist(FDb::load(self::$table,self::whereKey()));
    }

    public static function deleteOne():?bool
    {
        return FDb::delate(self::$table,self::whereKey());
    }

    public static function updateOne(EContact $contact,String $idEvent):?bool
    {
        return FDb::update(self::$table,self::whereKey(),self::getArrayByObject($contact));
    }

}
?>
