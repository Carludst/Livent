<?php

class CSystem
{
    private static function authorizer():bool{

        if(FSession::isLogged() && (FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you don't have authorization");
        return CManageUser::callLogin();
    }

    public static function HomePage(){
        try{
            if(FSession::isLogged()){
                $user=FSession::getUserLogged();
                $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
            }
            else{
                $user=null;
                $profileImg=null;
            }

            $homeImgName=FDbH::loadDirectory(MappingPathFile::dirHomeMain());
            $homeImg=array();
            for($i=0;$i<count($homeImgName);$i++)$homeImg[]=array('file'=>FDbH::loadFile( MappingPathFile::dirHomeMain(),$homeImgName[$i]),'name'=>$homeImgName[$i]);

            $eventsFinished=FDbH::searchEvent(true,NULL,NULL,NULL,NULL,new DateTime());
            $eventsOpen=FDbH::searchEvent(true,NULL,NULL,NULL,new DateTime());
            if(count($eventsFinished)>9) $eventsFinished=array_slice($eventsFinished,0,9);
            if(count($eventsOpen)>9) $eventsOpen=array_slice($eventsOpen,0,9);

            $eventsFinishedImg=FDbH::loadMultiFile($eventsFinished,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),0.4);
            $eventsOpenImg=FDbH::loadMultiFile($eventsOpen,MappingPathFile::nameEventMain(),MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),0.4);

            $view=new VHome();
            $view->show($user,$profileImg,$eventsOpen,$eventsFinished,$homeImg,$eventsOpenImg,$eventsFinishedImg);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina home non è andata a buon fine");
        }
    }

    public static function setIntroImg(String $href){
        try{
            if(self::authorizer()){
                $array=FDbH::loadDirectory(MappingPathFile::dirHomeMain());
                if(count($array)>0)$name=(int)max($array)+1;
                else $name=0;
                FDbH::storeFile(MappingPathFile::dirHomeMain(),$name,$href,'type',2);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function setDefaultProfileImg(String $href){
        try{
            if(self::authorizer()){
                //prendi input
                FDbH::updateFile(MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),$href,'type',2);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

}