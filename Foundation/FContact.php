<?php

class FContact{
    private static String $table = "contact";
    
    public static function getArrayByObject(EContact $contact):Array{
        $name = $contact->getName();
        $number = $contact->getPhoneNumber();
        $email = $contact->getEmail();
        //vedere se aggiungere l'attributo evento alla classe EContact per usarlo come chiave

        $updated_at = date('Y-m-d H:i:s');

        $fieldValue=array(
            'name'=>$name,
            'number'=>$number,
            'e-mail'=>$email,
            'updated_at'=>$updated_at,
        );
        return $fieldValue;
    }

    private static function getObjectByArray(Array $contacts):EContact
    {
        $object = new EContact($contacts["name"],$contacts["number"],$contacts["e-mail"],(int)$contacts['idcontact']);
        return $object;
    }

    private static function whereKey(int $key):Array
    {
        return FDb::where('idcontact',$key);
    }

    public static function store( EContact $contact , int $idEvent):void
    {
        $created_at = date('Y-m-d H:i:s');
        $fieldValue = self::getArrayByObject($contact);
        $fieldValue['created_at']=$created_at;
        $fieldValue['idevent']=$idEvent;
        FDb::store(self::$table, $fieldValue);
        $contact->setId((int)FDb::exInterrogation(FDb::opGroupMax(self::$table,'idcontact'))[0]['max']);
    }

    public static function loadOne(int $key):?EContact{
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

    public static function existOne(int $key):bool
    {
        return FDb::exist(FDb::load(self::$table,self::whereKey($key)));
    }

    public static function deleteOne(int $key):bool
    {
        return FDb::delate(self::$table,self::whereKey($key));
    }

    public static function updateOne(EContact $contact):bool
    {
        $key=$contact->getId();
        return FDb::update(self::$table,self::whereKey($key),self::getArrayByObject($contact));
    }

    public static function getPathFile(EContact $contact):String
    {
        return EContact::class."/".$contact->getId();
    }

    public static function search(String|Null $name=NULL , String|Null $email=NULL , String|Null $number=NULL , EEvent|Null $event=NULL)
    {
       $fields=array();
       $values=array();
       $opWhere=array();
       $result=array();
       $orderBy=array();
       $ascending=array();

       if(is_null($name)&& is_null($email) && is_null($number)){
           $resultQ=FDb::exInterrogation(FDb::load(self::$table));
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
           if(!is_null($email)){
               $fields[]='email';
               $values[]=$email.'%';
               $opWhere[]='LIKE';
               $orderBy[]='email';
               $ascending[]=true;
           }
           if(!is_null($number)){
               $fields[]='number';
               $values[]=$number.'%';
               $opWhere[]='LIKE';
               $orderBy[]='number';
               $ascending[]=true;
           }
           if(!is_null($event)){
               $fields[]='idevent';
               $values[]=$event->getId();
               $opWhere[]='=';
           }
           $resultQ=FDb::exInterrogation(FDb::load(self::$table,FDb::multiWhere($fields,$values,'AND',$opWhere)),$orderBy,$ascending);
           foreach ($resultQ as $c=>$v){
               $result[$c]=self::getObjectByArray($v);
           }
           return $result;
       }

    }

}
?>

