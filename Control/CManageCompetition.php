<?php

class CManageCompetition
{
    private static function authorizer(ECompetition|EEvent $competition):bool{

        if($competition::class==ECompetition::class &&FSession::isLogged() && FDbH::loadEventByCompetition($competition)->getOrganizer()->getId()!=FSession::getUserLogged()->getId()) throw new Exception("only the organizer can update competition");
        elseif($competition::class==EEvent::class && FSession::isLogged() && $competition->getOrganizer()->getId()!=FSession::getUserLogged()->getId())throw new Exception("only the organizer can create a new competition");
        else return CManageUser::callLogin();
    }

    public static function update():void
    {
        try{
            $view=new VNewCompetition();
            $logged=FSession::getUserLogged();
            $myinput=$view->getMyInput();
            $competition=$view->createCompetition();
            $competition->setId((int)$myinput);

            if(self::authorizer($competition)  && $view->getEmail()==$logged->getEmail() && $view->getPassword()==$logged->getPassword()){
                if(!FDbH::updateOne($competition))throw new Exception("you can't update a competition that don't exist");
                header('Location: /Livent/Competition/MainPage/'.$myinput.'/');
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dei dati della competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function create():void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        //if(filter_var($organizerEmail,FILTER_VALIDATE_EMAIL)!=false)
        try{
            $view=new VNewCompetition();
            $myinput=$view->getMyInput();
            $logged=FSession::getUserLogged();
            $event=FDbH::loadOne((int)$myinput,EEvent::class);

            if(self::authorizer($event) && $view->getEmail()==$logged->getEmail() && $view->getPassword()==$logged->getPassword()){
                $competition=$view->createCompetition();
                FDbH::store($competition,$event->getId());
                $id=FDbH::loadLastStore(ECompetition::class)->getId();
                header('Location: /Livent/Competition/MainPage/'.$id.'/');
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La creazione della competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function delete(ECompetition $competition){
        try{
            if(self::authorizer($competition)){
                FDbH::deleteOne($competition->getId(),ECompetition::class);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'eliminazione della competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
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
            $view = new VCompetition();
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

    public static function updatePage(){
        try{
            $view=new VNewCompetition();
            $myinput=$view->getMyInput();
            $competition= FDbH::loadOne((int)$myinput, ECompetition::class);
            if(self::authorizer($competition)){
                $view->show($competition);
            }
            else throw new Exception("you don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina relativa alla creazione di una competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function newPage(){
        try{
            $view=new VNewCompetition();
            $myinput=$view->getMyInput();
            $event=FDbH::loadOne((int)$myinput, EEvent::class);
            if(self::authorizer($event)){
                $view->show((int)$myinput);
            }
            else throw new Exception("You don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina relativa alla creazione di una competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function newIscription(){
        try{
            $view=new VCompetition();
            $logged=FSession::getUserLogged();
            $key=$view->getMyInput();
            $competition= FDbH::loadOne($key, "ECompetition");
            $athlete= FDbH::loadOne($view->getId(), "EAthlete");
            $iscription=$view->addNewIscription($athlete->getName(),$athlete->getSurname(),$athlete->getBirthdate(),$athlete->getFamale(),$athlete->getTeam(),$athlete->getSport());
            if(self::authorizer($competition)  && $view->getEmail()==$logged->getEmail() && $view->getPassword()==$logged->getPassword()){
                if(!FCompetition::addResult($competition, $iscription, "nd"))throw new Exception("you can't update a competition that don't exist");
            }
        }catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina relativa alla creazione di una competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function results(){
        try{
            $view=new VCompetition();
            $key=$view->getMyInput();
        }catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina relativa alla creazione di una competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
}

