<?php

require_once "../Entity/EUser.php";
require_once "FDb.php";

class FUser
{
    private static array $table=array("user","result");

    private static function getArrayByObject(EUser $user):Array
    {
        $username=$user->getUsername();
        $email=$user->getEmail();
        $password=$user->getPassword();
        $type=$user->getType();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d h:i:s");

        $fieldValue=array(
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
            'type'=>$type,
            'update_at'=>$update_at
        );
        return $fieldValue;

    }

    private static function getObjectByArray(Array $user):EUser
    {
       return new EUser($user['email'],$user['username'],$user['password'],$user['type']);
    }

    //resturn where clause for take a tuple by primarykey
    private static function whereKey($valueKey):Array
    {
        return FDb::where("email",$valueKey);
    }

    /**
     * -Method : store into database the data of EUser object
     * @param EUser $user EUser object to store data
     * @return void
     */
    public static function store(EUser $user):void
    {
        $now=new DateTime();
        $created_at=$now->format("Y-m-d h:i:s");

        $fieldValue=self::getArrayByObject($user);
        $fieldValue['created_at']=$created_at;
        FDb::store(self::$table[0],$fieldValue);
    }

    /**
     * -Method : return the frist object of the result of the query
     * @param string $key key of the table
     * @return EUser|null null if not found
     * @throws Exception FDb exInterrogation exception
     */
    public static function loadOne(string $key):?EUser{
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
     * @param string $key primarykey value
     * @return bool|null return true if find correspondence , null if occurs an exception
     */
    public static function existOne(string $key):?bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    /**
     * -Method : delate by primarykey
     * @param string $key primarykey value
     * @return bool|null return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function deleteOne(string $key):?bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    /**
     * -Method : update EAthlete data by primarykey saved into object passed
     * @param EUser $user  EAthlete data to update
     * @return bool|null return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function updateOne(EUser $user):?bool
    {
        return FDb::update(self::$table[0],self::whereKey((String)$user->getEmail()),self::getArrayByObject($user));
    }

    public static function login(string $email, string $password):?bool
    {
        $where=FDb::multiWhere(array('email','password'),array($email,$password));
        return FDb::exist(FDb::load(self::$table[0], $where));
    }



}