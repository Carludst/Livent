<?php

require_once ('../Foundation/FAthlete.php');
require_once ('../Foundation/FUser.php');
require_once ('../Foundation/FComment.php');
require_once ('../Foundation/FCompetition.php');
require_once ('../Foundation/FContact.php');
require_once ('../Foundation/FEvent.php');




class FDbH {

    /** Method : save an object of Entity class into db
     * @param $obj
     */
    public static function store(EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $Fclass::store($obj);
    }


    /**
     * Method : return the frist object of the result of the query
     * @param $key
     * @param String $Eclass
     * @return EAthlete|EUser|EComment|ECompetition|EContact|EEvent
     */
    public static function loadOne($key,String $Eclass):EAthlete|EUser|EComment|ECompetition|EContact|EEvent {
        $Fclass = str_replace("E", "F", $Eclass);
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

        $Fclass = str_replace("E", "F", $Eclass);
        return $Fclass::load($fieldWhere,$valueWhere,$opWhere, $orderBy, $ascending);
    }

    /** -Method : delate by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function deleteOne($key, String $Eclass):?bool {
        $Fclass = str_replace("E", "F", $Eclass);
        return $Fclass::deleteOne($key);
    }

    /**  Method : search in database by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function existOne($key, String $Eclass):?bool {
        $Fclass = str_replace("E", "F", $Eclass);
        return $Fclass::existOne($key);
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
     * -Method : update Entity class data by primarykey saved into object passed
     * @param EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj
     * @return bool|null
     */
    public static function updateOne(EAthlete|EUser|EComment|ECompetition|EContact|EEvent $obj):?bool
    {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        return $Fclass::updateOne($obj);
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
    public static function deleteRegistrationCompetition(ECompetition $competition, EAthlete $athlete):bool {
        return FCompetition::deleteRegistration($competition,$athlete);
    }

    /** -Method
     * @param $competition
     * @return mixed
     */
    public static function getClassificationCompetition(ECompetition $competition):Array{
        return FCompetition::getClassification($competition);
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
}
