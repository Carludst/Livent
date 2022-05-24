<?php

require_once ('../Foundation/FAthlete.php');
require_once ('../Foundation/FUser.php');
require_once ('../Foundation/FComment.php');
require_once ('../Foundation/FCompetition.php');
require_once ('../Foundation/FContact.php');
require_once ('../Foundation/FEvent.php');

require_once ('../Entity/EAthlete.php');
require_once ('../Entity/EUser.php');
require_once ('../Entity/EComment.php');
require_once ('../Entity/ECompetition.php');
require_once ('../Entity/EContact.php');
require_once ('../Entity/EEvent.php');




class FDbH {

    /** Method : save an object of Entity class into db
     * @param $obj
     */
    public static function store(EAthlete|EUser|EComment|EEvent|ECompetition|EContact $obj , ?int $idEvent=Null) {
        $Eclass = get_class($obj);
        $Fclass = "F".substr($Eclass,1);
        if(is_null($idEvent))$Fclass::store($obj);
        else $Fclass::store($obj,$idEvent);
    }




    /**
     * Method : return the frist object of the result of the query
     * @param $key
     * @param String $Eclass
     * @return EAthlete|EUser|EComment|ECompetition|EContact|EEvent
     */
    public static function loadOne($key,String $Eclass):EAthlete|EUser|EComment|ECompetition|EContact|EEvent {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::loadOne($key);
    }

    /** -Method : return an array of object according with the query result
     * @param $where
     * @param $orderBy
     * @param $ascending
     * @param $Fclass
     * @return mixed
     */
    public static function load(String $Eclass,String $fieldWhere, String $valueWhere,String $opWhere="=",String|Array $orderBy="",bool|Array $ascending=true):Array {

        $Fclass = "F".substr($Eclass,1);
        return $Fclass::load($fieldWhere,$valueWhere,$opWhere, $orderBy, $ascending);
    }

    /** -Method : delate by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function deleteOne($key, String $Eclass):?bool {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::deleteOne($key);
    }

    /**  Method : search in database by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function existOne($key, String $Eclass):?bool {
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::existOne($key);
    }


    /**
     * -Method : update Entity class data by primarykey saved into object passed
     * @param EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj
     * @return bool|null
     */
    public static function updateOne(EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj):?bool
    {
        $Eclass = get_class($obj);
        $Fclass = "F".substr($Eclass,1);
        return $Fclass::updateOne($obj);
    }



    /**
     * @param EAthlete $obj
     * @param String $name
     * @param String $path
     * @param String $type
     * @param int $size
     * @return void
     */
    public static function storeFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath, String $name , String $path , String $type , int $size){
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile;
        }
        FDb::storeFile($path,$pathDB,$name,$type,$size);
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @param String $name
     * @return String
     * @throws Exception
     */
    public static function loadFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , String $name):String
    {
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile;
        }
        $array=FDb::load('file',FDb::multiWhere(array("path","name"),array($pathDB,$name)));
        return $array[0]['file'];
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @param String $name
     * @return bool|null
     * @throws Exception
     */
    public static function delateFile(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath , String $name):?bool
    {
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile;
        }
        return FDb::delate('file',FDb::multiWhere(array("path","name"),array($pathDB,$name)));
    }

    /**
     * @param String|EAthlete|EUser|EComment|ECompetition|array|EEvent $objPath
     * @return array
     * @throws Exception
     */
    public static function loadDirectory(String|EAthlete|EUser|EComment|ECompetition|EContact|EEvent $objPath){
        if(is_string($objPath))$pathDB=$objPath;
        else{
            $Eclass = get_class($objPath);
            $Fclass = "F".substr($Eclass,1);
            $pathDB=$Fclass::getPathFile;
        }
        $resultQ=FDb::exInterrogation(FDb::load('file',FDb::where('path',$pathDB),'name'));
        $result=array();
        foreach ($resultQ as $key=>$value){
            $result[]=$value['name'];
        }
        return $result;
    }


    /** Method : for login of an user
     * @param $user
     * @param $password
     * @return array|EUser|null
     */
    public static function login(String $email,String $password) :?bool{
        return FUser::login($email, $password);
    }

    /**
     * @param EComment $comment
     * @return DateTime
     */
    public static function getDateTimeComment(EComment $comment):DateTime
    {
        return FComment::getDateTime($comment);
    }

    /**
     * -Method : return an array (name copetition key) of array (idevent , time) with the result order by time
     * @param EAthlete $athlete
     * @return array|null
     * @throws Exception
     */
    public static function getResultsAthletete( EAthlete $athlete):Array{
        return FAthlete::getResults($athlete);
    }

    public static function getResultCompetition( ECompetition $competition , EAthlete $athlete):ETime{
        return FCompetition::getResult($competition,$athlete);
    }

    /**
     * @param ECompetition $competition
     * @param EAthlete $athlete
     * @param ETime $time
     * @return bool|null
     */
    public static function addResultCompetition(ECompetition $competition,EAthlete $athlete, ETime $time):?bool{
        return FCompetition::addResult($competition, $athlete, $time);
    }

    /** -Method
     * @param $competition
     * @param $athlete
     * @param $EUser
     * @return mixed
     */
    public static function addRegistrationCompetition(ECompetition $competition,EAthlete $athlete, EUser $user):?bool{
        return FCompetition::addRegistration($competition, $athlete, $user);
    }

    /** -Method
     * @param $competition
     * @param $athlete
     * @return mixed
     */
    public static function deleteCompetitorCompetition(ECompetition $competition, EAthlete $athlete):bool {
        return FCompetition::deleteCompetitor($competition,$athlete);
    }

    /** -Method
     * @param $competition
     * @return mixed
     */
    public static function getClassificationCompetition(ECompetition $competition):Array{
        return FCompetition::getClassification($competition);
    }

    public static function getRegistrationsCompetition(ECompetition $competition):Array{
        return FCompetition::getRegistrations($competition);
    }

    /**
     * @param EEvent $event
     * @return array
     */
    public static function getCompetitions(EEvent $event):Array
    {
        return FEvent::getCompetitions($event);
    }

    /**
     * @param EEvent $event
     * @return array
     */
    public static function getContacts(EEvent $event):Array
    {
        return FEvent::getContacts($event);
    }

    /**
     * @param EEvent $event
     * @return array
     */
    public static function getComments(EEvent $event):Array
    {
        return FEvent::getComments($event);
    }

    /**
     * @param String|null $name
     * @param EUser|null $organizer
     * @param String $place
     * @return array
     */
    public static function searchEvent(?String $name , ?EUser $organizer ,?String $place , ?DateTime $startDateFrom , ?DateTime $startDateTo){
        return FEvent::search($name,$organizer,$place,$startDateFrom,$startDateTo);
    }

    /**
     * @param String|Null $name
     * @param String|Null $surname
     * @param DateTime|Null $birthdateFrom
     * @param DateTime|Null $birthdateTo
     * @param bool|null $famale
     * @param String|Null $team
     * @param String|Null $sport
     * @return array
     */
    public static function searchAthlete(String|Null $name , String|Null $surname , DateTime|Null $birthdateFrom , DateTime|Null $birthdateTo , ?bool $famale , String|Null $team , String|Null $sport ){
        return FAthlete::search($name,$surname,$birthdateFrom,$birthdateTo,$famale,$team,$sport);
    }
}
