<?php

class CSearch
{

    public static function searchPageEvent(){
        try{
            //Richiamare view search;
        }
        catch(Exception $e){
            //eccezione(oggetto errore)
        }
    }

    public static function searchPageAthlete(){
        try{
            //Richiamare view search;
        }
        catch(Exception $e){
            //eccezione(oggetto errore)
        }
    }

    public static function searchPageCompetition(){
        try{
            //Richiamare view search;
        }
        catch(Exception $e){
            //eccezione(oggetto errore)
        }
    }

    public static function searchAthlete(String|Null $name , String|Null $surname , DateTime|Null $birthdateFrom , DateTime|Null $birthdateTo , ?bool $famale , String|Null $team , String|Null $sport):array
    {
        try{
            return FDbH::searchAthlete($name, $surname, $birthdateFrom, $birthdateTo, $famale, $team, $sport);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function searchComment(String|Null $containText=NULL , EUser|NULL $user=NULL):array
    {
        try{
            return FDbH::searchComment($containText,$user);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function searchCompetition(?String $name=NULL , String|NULL $gender=NULL, String|NULL $sport=NULL, EDistance|Null $distance=NULL):array
    {
        try{
            return FDbH::searchCompetition($name,$gender,$sport,$distance);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function searchEvent(?bool $public=NULL ,?String $name=NULL , ?EUser $organizer=NULL ,?String $place=NULL  , ?DateTime $startDateFrom=NULL , ?DateTime $startDateTo=NULL):array
    {
        try{
            return FDbH::searchEvent($public,$name,$organizer,$place,$startDateFrom,$startDateTo);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }
}