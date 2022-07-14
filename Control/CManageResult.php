<?php

class CManageResult
{

    private static function authorizer(ECompetition $competition ):bool{

        $emailLOgged=FSession::getUserLogged()->getEmail();
        $emailOrganaizerEvent=FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail();

        if(FSession::isLogged() && ($emailLOgged!=$emailOrganaizerEvent))throw new Exception("you must be the organizer of the event");
        return CManageUser::callLogin();
    }



    public static function addResult(ECompetition $competition,EAthlete $athlete, ETime $time){
        try{
            if(self::authorizer($competition)){
                if(!$competition->addResult($athlete,$time))throw new Exception("loading result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'inserimento del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


    public static function delate()
    {
        try{
            $view = new VDelete();
            $keyCompetition=$view->getMyInputCompetition();
            $keyAthlete=$view->getMyInputAthlete();
            $competition = FDbH::loadOne($keyCompetition, ECompetition::class);
            $athlete = FDbH::loadOne($keyAthlete, EAthlete::class);
            if(self::authorizer($competition) && FSession::getUserLogged()->getEmail()==$view->getEmail() && FSession::getUserLogged()->getPassword()==$view->getPassword()){
                if(!$competition->popResult($athlete))throw new Exception("deletion result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione del risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }

    }

    public static function mainPage(){
        if(FSession::isLogged()){
            $user=FSession::getUserLogged();
            $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
        }
        else{
            $user=null;
            $profileImg=null;
        }
        try{
            $view = new VResult();
            $key = (int)$view->getMyInput();
            if(FDbH::existOne($key,ECompetition::class)){
                FSession::addChronology(ECompetition::class,$key);
                $competition = FDbH::loadOne($key, ECompetition::class);
                $name = $competition->getName();
                //$eventImg=FDbH::loadMultiFile($event,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),0.2);
                $athletes = $competition->getRegistrations();
                $startDate = $competition->getDateTime();
                $sport = $competition->getSport();
                $distance = $competition->getDistance();
                $gender = $competition->getGender();
                $description = $competition->getDescription();
                $view->show($user, $profileImg, $name, $athletes , $startDate, $sport ,$distance ,$gender,$description);
            }
            else throw new Exception("l'evento non esiste");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


    public static function deletePage(){
        try{
            $view=new VDelete();
            $myinputC=$view->getMyInputCompetition();
            $myinputA=$view->getMyInputAthlete();
            if(is_null($myinputA)||is_null($myinputC))throw new Exception("myinput don't setted");
            $competition=FDbH::loadOne($myinputC,ECompetition::class);
            $athlete=FDbH::loadOne($myinputA,EAthlete::class);
            if(self::authorizer($competition))
            {
                $message='sei sicuro di voler cancellare la registrazione ?  i dati non potranno essere recuperati';
                $action='/Livent/Result/Delete/'.$athlete->getId().'I'.$competition->getId().'/';
                $return='/Livent/Result/MainPage/'.$competition->getId().'/';
                $what='Risultato';
                $view->show($action,$what,$return,$message);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di eliminazione della registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    /*
    public static function newPage(?ECompetition $competition , ?EAthlete $athlete){
        try{
            if(self::authorizer($competition)){
                if(!FDbH::existRegistration($competition,$athlete))throw new Exception('the athlete is not register to the competition');
                //Richiama  VResult::show($result);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire un risultato non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
    */
}