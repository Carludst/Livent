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
            //RICHIAMA ERRORE
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
            //RICHIAMA ERRORE
        }
    }

    public static function delete(ECompetition $competition){
        try{
            if(self::authorizer($competition)){
                FDbH::deleteOne($competition->getId(),ECompetition::class);
            }
        }
        catch(Exception $e){
                //RICHIAMA ERRORE
        }
    }

    public static function mainPage(ECompetition $competition){
        try{
            //Richiama  view competition
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function newPage(ECompetition $competition){
        try{
            if(self::authorizer($competition)){
                //Richiama  VEvent::showNewPage($competition);
            }
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }
}

