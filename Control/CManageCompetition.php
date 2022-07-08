<?php

class CManageCompetition
{
    private static function authorizer(ECompetition $competition):bool{

        if(FSession::isLogged() && FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail()!=FSession::getUserLogged()->getEmail())throw new Exception("only the organizer can update competition");
        return CManageUser::callLogin();
    }

    public static function update(ECompetition $competition):void
    {
        try{
            if(self::authorizer($competition)){
                if(!FDbH::updateOne($competition))throw new Exception("you can't update a competition that don't exist");
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dei dati della competizione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

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
        try{
            $key=(int)$GLOBALS['_MYINPUT'];
            if(FDbH::existOne($key,ECompetition::class))FSession::addChronology(ECompetition::class,$key);
            header("Location: /Livent/Competition/Search/");//righa da eliminare
            /*
            $registration=$competition->getRegistrations();
            $result=$competition->getClassification();
            //Richiama  view competition
            */
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina della competizione non è andato a buon fine");
        }
    }

    public static function newPage(ECompetition $competition){
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
                $competition= FDbH::loadOne((int)$myinput, EEvent::class);
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

