<?php

class CEditEvent
{
    public static function update(EEvent $event):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        try{
            if(!FDbH::updateOne($event))throw new Exception("you can't update an event that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function saveNew(EEvent $event):void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        //if(filter_var($organizerEmail,FILTER_VALIDATE_EMAIL)!=false)
        try{
            FDbH::store($event);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EEvent $event){
        try{
            FDbH::deleteOne($event->getId(),EEvent::class);
        }
        catch(Exception $e){
                //RICHIAMA ERRORE
        }
    }

    public static function search(?bool $public=NULL ,?String $name=NULL , ?EUser $organizer=NULL ,?String $place=NULL  , ?DateTime $startDateFrom=NULL , ?DateTime $startDateTo=NULL):array
    {
        try{
            return FDbH::searchEvent($public,$name,$organizer,$place,$startDateFrom,$startDateTo);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function show(EEvent $event){
        try{
            //Richiama  VEvent::show($event);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function showNewPage(EEvent $event){
        try{
            //VERIFICA LOGIN E TIPO UTENTE
            //Richiama  VEvent::showNewPage($event);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

}