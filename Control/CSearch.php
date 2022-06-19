<?php

class CSearch
{

    public static function searchPageEvent(){
        try{
            //Richiamare view search;
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di ricerca degli eventi non è andata a buon fine");
        }
    }

    public static function searchPageAthlete(){
        try{
            //Richiamare view search;
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di ricerca degli atleti non è andata a buon fine");
        }
    }

    public static function searchPageCompetition(){
        try{
            //Richiamare view search;
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di ricerca delle competizione non è andata a buon fine");
        }
    }

    public static function searchAthlete(String|Null $name , String|Null $surname , DateTime|Null $birthdateFrom , DateTime|Null $birthdateTo , ?bool $famale , String|Null $team , String|Null $sport):array
    {
        try{
            return FDbH::searchAthlete($name, $surname, $birthdateFrom, $birthdateTo, $famale, $team, $sport);
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La ricerca degli atleti non è andata a buon fine");
            return array();
        }
    }

    public static function searchComment(String|Null $containText=NULL , EUser|NULL $user=NULL):array
    {
        try{
            return FDbH::searchComment($containText,$user);
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La ricerca dei commenti non è andata a buon fine");
            return array();
        }
    }

    public static function searchCompetition(EEvent|NULL $event=NULL,String $name=NULL,?String $gender=NULL ,?String $sport=NULL ,DateTime|Null $dateFrom=NULL , DateTime|Null $dateTo=NULL,?EDistance $distanceFrom=NULL ,?EDistance $distanceTo=NULL):array
    {
        try{
            return FDbH::searchCompetition($event,$name,$gender,$sport,$dateFrom,$dateTo,$distanceFrom,$distanceTo);
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La ricerca delle competizioni non è andata a buon fine");
            return array();
        }
    }

    public static function searchEvent(?bool $public=NULL ,?String $name=NULL , ?EUser $organizer=NULL ,?String $place=NULL  , ?DateTime $startDateFrom=NULL , ?DateTime $startDateTo=NULL):array
    {
        try{
            return FDbH::searchEvent($public,$name,$organizer,$place,$startDateFrom,$startDateTo);
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La ricerca degli eventi non è andata a buon fine");
            return array();
        }
    }
}