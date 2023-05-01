<?php

class FUser
{
    private static array $table=array("user","result","event");

    private static function getArrayByObject(EUser $user):Array
    {
        $username=$user->getUsername();
        $email=$user->getEmail();
        $password=$user->getPassword();
        $type=$user->getType();

        $now=new DateTime();
        $update_at=$now->format("Y-m-d H:i:s");

        $fieldValue=array(
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
            'type'=>$type,
            'updated_at'=>$update_at
        );
        return $fieldValue;

    }

    private static function getObjectByArray(Array $user):EUser
    {
       return new EUser($user['email'],$user['username'],$user['password'],$user['type'],(int)$user['iduser']);
    }

    //resturn where clause for take a tuple by primarykey
    private static function whereKey(int|String $valueKey):Array
    {
        if(is_int($valueKey)||preg_match('/^(\d+)$/',$valueKey)){
            return FDb::where("iduser",$valueKey);
        }
        else return FDb::where("email",$valueKey);
    }

    /**
     * -Method : store into database the data of EUser object
     * @param EUser $user EUser object to store data
     * @return void
     */
    public static function store(EUser $user):void
    {
        $now=new DateTime();
        $created_at=$now->format("Y-m-d H:i:s");

        $fieldValue=self::getArrayByObject($user);
        $fieldValue['created_at']=$created_at;
        FDb::store(self::$table[0],$fieldValue);
        $user->setId((int)FDb::exInterrogation(FDb::opGroupMax(self::$table[0],'iduser'))[0]['max']);
    }

    /**
     * -Method : return the frist object of the result of the query
     * @param int|String $key key of the table
     * @return EUser|null null if not found
     * @throws Exception FDb exInterrogation exception
     */
    public static function loadOne(int|String $key):?EUser{
        $query=FDb::load(self::$table[0],self::whereKey($key));
        $result=FDb::exInterrogation($query);
        if(count($result)==0)  return null;
        $arrayObject=$result[0];
        return self::getObjectByArray($arrayObject);
    }

    public static function loadLastStore():?EUser{
        $id=(int)FDb::exInterrogation(FDb::opGroupMax(self::$table[0],'iduser'))[0]['max'];
        return self::loadOne($id);
    }

    /**
     * -Method : search in database by primarykey
     * @param int $key primarykey value
     * @return bool return true if find correspondence , null if occurs an exception
     */
    public static function existOne(int $key):bool
    {
        return FDb::exist(FDb::load(self::$table[0],self::whereKey($key)));
    }

    /**
     * -Method : delate by primarykey
     * @param int $key primarykey value
     * @return bool return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function deleteOne(int $key): bool
    {
        return FDb::delate(self::$table[0],self::whereKey($key));
    }

    /**
     * @throws Exception
     */
    public static function deleteReference(int $key):bool
    {
        $obj=self::loadOne($key);
        FDbH::deleteDirectory($obj);
        $eventRef=FEvent::load('idorganizer',$key);
        $events=true;
        foreach ($eventRef as $item){
            $bool=FEvent::deleteReference($item->getID());
            $events=$events && $bool;
        }
        $user=self::deleteOne($key);
        return $user && $events  ;
    }

    /**
     * -Method : update EAthlete data by primarykey saved into object passed
     * @param EUser $user  EAthlete data to update
     * @return bool return true if find correspondence , null if occurs an exception , false if not found corrispondence
     */
    public static function updateOne(EUser $user):bool
    {
        return FDb::update(self::$table[0],self::whereKey((String)$user->getId()),self::getArrayByObject($user));
    }

    public static function getRegistration(EUser $user ):Array
    {
        $where=FDb::where('iduser',$user->getId());
        $where['where']=  $where['where'].' AND time IS  NULL';
        $query=FDb::load(self::$table[1],$where);
        $resultQ=FDb::exInterrogation($query);
        $result=array();
        foreach ($resultQ as $c=>$v){
            $competition=FCompetition::loadOne($v["idcompetition"]);
            $athlete=FAthlete::loadOne($v['idathlete']);
            $result[]=array('competition'=>$competition,'athlete'=>$athlete);
        }
        return $result;
    }


    public static function login(String $email, String $password):?bool
    {
        $where=FDb::multiWhere(array('email','password'),array($email, $password));
        return FDb::exist(FDb::load(self::$table[0], $where));
    }

    public static function getPathFile(EUser $user):String
    {
        return EUser::class."/".$user->getId();
    }

    public static function search(String|Null $username=NULL, String|Null $email=NULL , String|Null $type=NULL , String|Null $exceptType=Null)
    {
        $fields = array();
        $values = array();
        $opWhere = array();
        $result = array();
        $orderBy=array();
        $ascending=array();

        if (is_null($username) && is_null($email) && is_null($type) && is_null($exceptType)) {
            $resultQ = FDb::exInterrogation(FDb::load(self::$table[0]));
            foreach ($resultQ as $c => $v) {
                $result[$c] = self::getObjectByArray($v);
            }
            return $result;
        }
        else {
            if(!is_null($username)){
                $fields[] = 'username';
                $values[] = $username . '%';
                $opWhere[] = 'LIKE';
                $orderBy[]='username';
                $ascending[]=true;
            }
            if(!is_null($email)){
                $fields[] = 'email';
                $values[] = $email . '%';
                $opWhere[] = 'LIKE';
                $orderBy[]='email';
                $ascending[]=true;
            }
            if(!is_null($type)){
                $fields[] = 'type';
                $values[] = $type;
                $opWhere[] = '=';
            }
            if(!is_null($exceptType)){
                $fields[] = 'type';
                $values[] = $exceptType;
                $opWhere[] = '<>';
            }

            $resultQ = FDb::exInterrogation(FDb::load(self::$table[0], FDb::multiWhere($fields, $values, 'AND', $opWhere)),$orderBy,$ascending);
            foreach ($resultQ as $c => $v) {
                $result[$c] = self::getObjectByArray($v);
            }
            return $result;
        }
    }

}