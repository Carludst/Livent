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

    public static function searchEvent()
    {
        try{
            $view=new VSearchEvent();
            $name=$view->getName();
            $place=$view->getPlace();
            $startDateFrom=$view->minDate();
            $startDateTo=$view->maxDate();
            $sport=$view->getSport();

            if($view->getMood()){
                $keys=FSession::getChronology(EEvent::class);
                $events=array();
                foreach ($keys as $k=>$v){
                    if(!FDbH::existOne((int)$v,EEvent::class))FSession::popChronology(EEvent::class,$k);
                    else $events[]=FDbH::loadOne($v,EEvent::class);
                }
            }
            else $events=FDbH::searchEvent(NULL,$name,NULL,$place,$startDateFrom,$startDateTo,$sport);

            $eventsImg=FDbH::loadMultiFile($events,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain());
            $view->show($events,$eventsImg);

        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La ricerca degli eventi non è andata a buon fine");
        }
    }

    public static function popEventChronology(){
        $view=new VSearchEvent();
        FSession::popChronology(EEvent::class,$view->getChronologyId());
        header("Location: /Livent/Event/Search/");
    }
}