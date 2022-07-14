<?php

class CManageEvent
{
    private static function authorizer(EEvent|String $event='Organizer'):bool{
        if(!is_string($event) && FSession::isLogged() && $event->getOrganizer()->getId()!=FSession::getUserLogged()->getId())throw new Exception("you don'y have autorization");
        elseif(is_string($event) && $event=='Organizer' && FSession::isLogged() && FSession::getUserLogged()->getType()!='Organizer')throw new Exception("you don'y have autorization");
        return CManageUser::callLogin();
    }

    public static function update():void
    {
        try{
            $view=new VNewEvent();
            $logged=FSession::getUserLogged();
            $myinput=$view->getMyInput();
            $event=$view->createEvent($logged);
            $event->setId($myinput);

            if(self::authorizer($event) && $view->getEmail()==$logged->getEmail() && $view->getPassword()==$logged->getPassword()){
                if(!FDbH::updateOne($event))throw new Exception("you can't update an event that don't exist");


                if(!is_null($view->getPathImg())&&!is_null($view->getTypeImg())){
                    $path=$view->getPathImg();
                    $type=$view->getTypeImg();
                    if(FDbH::existFile($event,MappingPathFile::nameEventMain())) {
                        FDbH::updateFile($event,MappingPathFile::nameEventMain(), $path, $type, true);
                    }
                    else FDbH::storeFile($event,MappingPathFile::nameEventMain(),$path,$type,true);
                }
                elseif (!is_null($view->getPathImg())||!is_null($view->getTypeImg())){
                    var_dump($view->getPathImg());
                    var_dump($view->getTypeImg());
                    throw new Exception('file error');
                }

                header('Location: /Livent/Event/MainPage/'.$myinput.'/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'aggiornamento dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


    public static function create():void
    {
        try{
            if(self::authorizer()){
                $view=new VNewEvent();
                $logged=FSession::getUserLogged();
                $event= $view->createEvent($logged);
                if(CManageUser::callLogin())FDbH::store($event);

                if(!is_null($view->getPathImg())&&!is_null($view->getTypeImg())){
                    $path=$view->getPathImg();
                    $type=$view->getTypeImg();
                    if(FDbH::existFile($event,MappingPathFile::nameEventMain()))throw new Exception('exist file assocated');
                    else FDbH::storeFile($event,MappingPathFile::nameEventMain(),$path,$type,true);
                }
                elseif (!is_null($view->getPathImg())||!is_null($view->getTypeImg())) throw new Exception('file error');

                $id=FDbH::loadLastStore(EEvent::class)->getId();
                header('Location: /Livent/Event/MainPage/'.$id.'/');
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La creazione dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function delete(){
        try{
            $view=new VDelete();
            $myinput=$view->getMyInput();
            if(is_null($myinput))throw new Exception("myinput don't setted");
            $event=FDbH::loadOne($myinput,EEvent::class);
            if(self::authorizer($event) && $view->getPassword()==FSession::getUserLogged()->getPassword() && $view->getEmail()==FSession::getUserLogged()->getEmail()){
                FDbH::deleteReference($event->getId(),EEvent::class);
            }
            else throw new Exception("you don't have authorization");
            header('Location: /Livent/');
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
            if(FSession::isLogged()){
                $user=FSession::getUserLogged();
                $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
            }
            else{
                $user=null;
                $profileImg=null;
            }

            $view = new VEvent();
            $key = (int)$view->getMyInput();
            if(FDbH::existOne($key,EEvent::class)){
                FSession::addChronology(EEvent::class,$key);
                $event = FDbH::loadOne($key, EEvent::class);
                if($event->getOrganizer()->getId()==FSession::getUserLogged()->getId())$mood='permit';
                else $mood='noPermit';
                $eventImg=FDbH::loadMultiFile($event,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),0.2);
                $id = $event->getId();
                $competitions = $event->getCompetitions();
                $contacts=$event->getContacts();
                $view->show($event, $eventImg, $user, $profileImg, $competitions,$contacts,$mood);
            }

            else throw new Exception("l'evento non esiste");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina dell' evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function newPage(){
        try{
            if(CManageUser::callLogin() && FSession::getUserLogged()->getType()=='Organizer'){
                $view=new VNewEvent();
                $view->show();
            }
            else throw new Exception("You don't have autorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina per creare un evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function updatePage(){
        try{
            $view=new VNewEvent();
            $myinput=$view->getMyInput();
            $event= FDbH::loadOne((int)$myinput, EEvent::class);
            if(self::authorizer($event)){
                $view->show($event);
            }
            else throw new Exception("you don't have autorization");

        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina per modificare un evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function deletePage(){
        try{
            $view=new VDelete();
            $myinput=$view->getMyInput();
            if(is_null($myinput))throw new Exception("myinput don't setted");
            $logged=FSession::getUserLogged();
            $event=FDbH::loadOne($myinput,EEvent::class);
            if(self::authorizer($event) )
            {
                $message="sei sicuro di voler cancellare l' evento ? la cancellazione del evento comporta anche la cancellazione di tutte le competizioni e le registrazioni , risultati ad esse associate  , i dati non potranno essere recuperati";
                $action='/Livent/Event/Delete/'.$event->getId().'/';
                $return='/Livent/Event/MainPage/'.$event->getId().'/';
                $what='Evento';
                $view->show($action,$what,$return,$message);
            }
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizzazione della pagina di eliminazione del evento non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }

}