<?php

class CSearch
{

    public static function searchAthlete()
    {
        try{
            $view=new VSearchAthlete();

            $name=$view->getName();
            $surname=$view->getSurname();
            $birthdateFrom=$view->getMinDate();
            $birthdateTo=$view->getMaxDate();
            $sport=$view->getSport();
            $gender=$view->getGender();
            $team=$view->getTeam();

            if($view->getMood() && FSession::isLogged()){
                $keys=FSession::getChronology(EAthlete::class);
                $athletes=array();
                $mood='cronology';
                foreach ($keys as $k=>$v){
                    if(!FDbH::existOne((int)$v,EAthlete::class))FSession::popChronology(EAthlete::class,$k);
                    else $athletes[]=FDbH::loadOne($v,EAthlete::class);
                }
            }
            elseif($view->getMood()){
                $mood='notlogged';
                $athletes=FDbH::searchAthlete();
            }
            else{
                $mood='notlogged';
                $athletes=FDbH::searchAthlete($name, $surname, $birthdateFrom, $birthdateTo, $gender, $team, $sport);
            }
            if(count($athletes)>100) $athletes=array_slice($athletes,0,100);

            $view->show($athletes,$mood);
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

    public static function searchCompetition()
    {
        try{
            $view=new VSearchCompetition();

            $name=$view->getName();
            $dateFrom=$view->getMinDate();
            $dateTo=$view->getMaxDate();
            $sport=$view->getSport();
            $gender=$view->getGender();
            $distanceFrom=$view->getMinDistance();
            $distanceTo=$view->getMaxDistance();


            if($view->getMood() && FSession::isLogged()){
                $keys=FSession::getChronology(ECompetition::class);
                $competitions=array();
                $mood='cronology';
                foreach ($keys as $k=>$v){
                    if(!FDbH::existOne((int)$v,ECompetition::class))FSession::popChronology(ECompetition::class,$k);
                    else $competitions[]=FDbH::loadOne($v,ECompetition::class);
                }
            }
            elseif($view->getMood()){
                $mood='notlogged';
                $competitions=FDbH::searchCompetition();
            }
            else {
                $mood='search';
                $competitions=FDbH::searchCompetition(NULL,$name,$gender,$sport,$dateFrom,$dateTo,$distanceFrom,$distanceTo);
            }
            if(count($competitions)>100) $athletes=array_slice($competitions,0,100);
            $events=FDbH::loadEventByCompetition($competitions);

            $view->show($competitions,$events,$mood);
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

            if($view->getMood() && FSession::isLogged()){
                $keys=FSession::getChronology(EEvent::class);
                $events=array();
                $mood='cronology';
                foreach ($keys as $k=>$v){
                    if(!FDbH::existOne((int)$v,EEvent::class))FSession::popChronology(EEvent::class,$k);
                    else $events[]=FDbH::loadOne($v,EEvent::class);
                }
            }
            elseif($view->getMood()){
                $mood='notlogged';
                $events=FDbH::searchEvent();
            }
            else{
                $mood='search';
                $events=FDbH::searchEvent(NULL,$name,NULL,$place,$startDateFrom,$startDateTo,$sport);
            }
            if(count($events)>100) $athletes=array_slice($events,0,100);

            $eventsImg=FDbH::loadMultiFile($events,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain());
            $view->show($events,$eventsImg,$mood);

        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La ricerca degli eventi non è andata a buon fine");
        }
    }

    public static function popEventChronology(){
        $view=new VSearchEvent();
        FSession::popChronology(EEvent::class,$view->getMyInput());
        header("Location: /Livent/Event/Search/");
    }

    public static function popAthleteChronology(){
        $view=new VSearchAthlete();
        FSession::popChronology(EAthlete::class,$view->getMyInput());
        header("Location: /Livent/Athlete/Search/");
    }

    public static function popCompetitionChronology(){
        $view=new VSearchCompetition();
        FSession::popChronology(ECompetition::class,$view->getMyInput());
        header("Location: /Livent/Competition/Search/");
    }
}