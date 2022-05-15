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

    /** Metodo che permette di cancellare il valore di un campo passato come parametro
     * @param $field
     * @param $val
     * @param $Fclass
     * @return mixed
     */
    public static function deleteOne($field, $val, $Fclass) {
        return $Fclass::delete($field, $val);
    }

    /**  Metodo che accerta l'esistenza di un valore di un campo passato come parametro
     * @param $field
     * @param $val
     * @param $Fclass
     * @return mixed
     */
    public static function existOne($field, $val, $Fclass) {
        return $Fclass::exist($field, $val);
    }


    /** Metodo che permette il login di un utente, date le credenziali (email e password)
     * @param $user
     * @param $password
     * @return array|EUser|null
     */
    public static function loadLogin($user, $password) {
        return FUser::loadLogin($user, $password);
    }

    /** Metodo che permette l'aggiornamento del valore di un campo passato per parametro
     * @param $field
     * @param $newvalue
     * @param $pk
     * @param $val
     * @param $Fclass
     * @return mixed
     */
    public static function update($field, $newvalue, $pk, $val, $Fclass) {
        return $Fclass::update($field, $newvalue, $pk, $val);
    }
}
