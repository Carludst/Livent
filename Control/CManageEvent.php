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
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
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
            CError::store($e,"ci scusiamo per il disaggio !!! La creazione dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function delete(EEvent $event){
        try{
            if(self::authorizer($event)||FSession::getUserLogged()->getType()=='Administator'){
                FDbH::deleteOne($event->getId(),EEvent::class);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function setImageFront(String $href , EEvent $event){
        try{
            if(self::authorizer($event)){
                if(FDbH::existFile($event,MappingPathFile::nameEventMain()))FDbH::updateFile($event,MappingPathFile::nameEventMain(),$href,'type',2);
                else FDbH::storeFile($event,MappingPathFile::nameEventMain(),$href,'type',2);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato salvato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function mainPage(){
        try{
            $key=(int)$GLOBALS['_MYINPUT'];
            if(FDbH::existOne($key,EEvent::class))FSession::addChronology(EEvent::class,$key);
            header("Location: /Livent/Event/Search/");//righa da eliminare

            //Richiama  VEvent::show($event);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function newPage(){
        try{
            $vEvent=new VNewEvent();
            $myinput=$vEvent->getMyInput();
            if(is_null($myinput)){
                if(CManageUser::callLogin() && FSession::getUserLogged()->getType()=='Organizer'){
                    $vEvent->show(null);
                }
                elseif(FSession::isLogged() && FSession::getUserLogged()->getType()!='Organizer'){
                    throw new Exception("You don't have autorization");
                }
            }
            else{
                $event= FDbH::loadOne((int)$myinput, EEvent::class);
                if(self::authorizer($event)){
                    $vEvent->show($event);
                }
                else throw new Exception("you don't have autorization");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina per creare/modificare un evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

}