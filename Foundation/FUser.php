<?php

require_once "Entity/EUser.php";
require_once "FDb.php";

class FUser
{

    private static function getArrayByObject(EUser $user,bool $created_atPut= false):Array
    {
        $username=$user->getUsername();
        $email=$user->getEmail();
        $password=$user->getPassword();

        $fieldValue=array(
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
        );
        return $fieldValue;

    }

    //resturn where clause for take a tuple by primarykey
    private static function whereKey($valueKey):String
    {
        return FDb::where("idathlete",$valueKey);
    }

    /**
     * -Method : store into database the data of EAthlete object
     * @param EUser $user EUser object to store data
     * @return void
     */
    public static function store(EUser $user):void
    {
        $fieldValue=self::getArrayByObject($user,true);
        FDb::store(self::$table[0],$fieldValue);
    }

    /**
     * -Method : return the frist object of the result of the query
     * @param int $key key of the table
     * @return EUser|null null if not found
     * @throws Exception FDb exInterrogation exception
     */
    public static function loadOne(int $key):?EUser{
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
    public static function load(String $where,String|Array $orderBy="",bool|Array $ascending=true):Array{
        $query=FDb::load(self::$table[0],$where);
        $resultQ=FDb::exInterrogation($query,$orderBy,$ascending);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $result[$c]=self::getObjectByArray($v);
        }
        return $result;
    }


}