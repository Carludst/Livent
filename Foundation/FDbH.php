<?php

require_once ('Foundation/FAthlete.php');
require_once ('Foundation/FUser.php');
require_once ('Foundation/FComment.php');
require_once ('Foundation/FCompetition.php');
require_once ('Foundation/FContact.php');
require_once ('Foundation/FEvent.php');


class FDbH {

    /** Metodo che permette di salvare un oggetto sul db
     * @param $obj
     */
    public static function store($obj) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $Fclass::store($obj);
    }

    /** Method : return the frist object of the result of the query
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function loadOne($key, $Fclass) {
        return $Fclass::loadOne($key);
    }

    /** -Method : return an array of object according with the query result
     * @param $where
     * @param $orderBy
     * @param $ascending
     * @param $Fclass
     * @return mixed
     */
    public static function load($where, $orderBy, $ascending, $Fclass) {
        return $Fclass::load($where, $orderBy, $ascending);
    }

    /** -Method : delate by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function deleteOne($key, $Fclass) {
        return $Fclass::deleteOne($key);
    }

    /**  Method : search in database by primarykey
     * @param $key
     * @param $Fclass
     * @return mixed
     */
    public static function existOne($key, $Fclass) {
        return $Fclass::existOne($key);
    }


    /** Metodo che permette il login di un utente, date le credenziali (email e password)
     * @param $user
     * @param $password
     * @return array|EUser|null
     */
    public static function login($user, $password) :?bool{
        return FUser::login($user, $password);
    }

    /** -Method : update EAthlete data by primarykey saved into object passed
     * @param $Eclass
     * @param $Fclass
     * @return mixed
     */
    public static function updateOne($Eclass, $Fclass) {
        return $Fclass::updateOne($Eclass);
    }

    /** -Method : return an array (name copetition key) of array (idevent , time) with the result order by time
     * @param $atleta
     * @return mixed
     */
    public static function getResults($atleta) {
        return FAthlete::getResults($atleta);
    }

    /** -Method
     * @param $competizione
     * @param $atleta
     * @param $time
     * @return mixed
     */
    public static function addResult($competizione, $atleta, $time) {
        return FCompetition::addResult($competizione, $atleta, $time);
    }

    /** -Method
     * @param $competizione
     * @param $atleta
     * @param $EUser
     * @return mixed
     */
    public static function addRegistration($competizione, $atleta, $EUser) {
        return FCompetition::addRegistration($competizione, $atleta, $EUser);
    }

    /** -Method
     * @param $competizione
     * @param $atleta
     * @return mixed
     */
    public static function deleteRegistration($competizione, $atleta) {
        return FCompetition::deleteRegistration($competizione, $atleta);
    }

    /** -Method
     * @param $competizione
     * @return mixed
     */
    public static function getClassification($competizione) {
        return FCompetition::getClassification($competizione);
    }
}
