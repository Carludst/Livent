<?php

class CManageCompetition
{
    private static function authorizer(ECompetition $competition):bool{

        if(FSession::isLogged() && FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail()!=FSession::getUserLogged()->getEmail()) throw new Exception("only the organizer can update competition");
        return CManageUser::callLogin();
    }

    public static function update():void
    {
        try{
            $vCompetition=new VNewCompetition();
            $logged=FSession::getUserLogged();
            $competition=$vCompetition->createCompetition();
            $myinput=$vCompetition->getMyInput();
            if(is_null($myinput) && FSession::getUserLogged()->getType()=='Organizer'){
                if(CManageUser::callLogin())FDbH::store($competition);
            }
            elseif(self::authorizer($competition) && FSession::getUserLogged()->getType()=='Organizer' && $vCompetition->getEmail()==$logged->getEmail() && $vCompetition->getPassword()==$logged->getPassword()){
                if(!FDbH::updateOne($competition))throw new Exception("you can't update a competition that don't exist");
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dei dati della competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    /*
    public static function create(ECompetition $competition):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        //if(filter_var($organizerEmail,FILTER_VALIDATE_EMAIL)!=false)
        try{
            if(self::authorizer($competition)){
                FDbH::store($competition);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La creazione della competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
    */

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
                //$description = $competition->getDescription();
                $view->show($user, $profileImg, $name, $athletes , $startDate, $sport ,$distance ,$gender);
            }
            else throw new Exception("l'evento non esiste");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function newPage(){
        try{
            $vCompetition=new VNewCompetition();
            $myinput=$vCompetition->getMyInput();
            if(is_null($myinput)){
                if(CManageUser::callLogin() && FSession::getUserLogged()->getType()=='Organizer'){
                    $vCompetition->show(null);
                }
                elseif(FSession::isLogged() && FSession::getUserLogged()->getType()!='Organizer'){
                    throw new Exception("You don't have autorization");
                }
            }
            else{
                $competition= FDbH::loadOne((int)$myinput, ECompetition::class);
                if(self::authorizer($competition)){
                    $vCompetition->show($competition);
                }
                else throw new Exception("you don't have autorization");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina relativa alla creazione di una competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }
}

