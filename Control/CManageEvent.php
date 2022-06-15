<?php

class CManageEvent
{
    private static function authorizer(EEvent $event):bool{

        if(FSession::isLogged() && $event->getOrganizer()->getEmail()!=FSession::getUserLogged()->getEmail())throw new Exception("you don'y have autorization");
        return CManageUser::callLogin();
    }
    public static function update(EEvent $event):void
    {
        try{
            if(self::authorizer($event)){
                if(!FDbH::updateOne($event))throw new Exception("you can't update an event that don't exist");
            }
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function create(EEvent $event):void
    {
        try{
            if(self::authorizer($event)){
                FDbH::store($event);
            }
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EEvent $event){
        try{
            if(self::authorizer($event)||FSession::getUserLogged()->getType()=='Administator'){
                FDbH::deleteOne($event->getId(),EEvent::class);
            }
        }
        catch(Exception $e){
                //RICHIAMA ERRORE
        }
    }

    public static function mainPage(EEvent $event){
        try{
            //Richiama  VEvent::show($event);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function newPage(NULL|EEvent $event){
        try{
            if((is_null($event) && FSession::getUserLogged()->getType()=='Organizer')||self::authorizer($event)){
                //Richiama  VEvent::showNewPage($event);
            }
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }


}