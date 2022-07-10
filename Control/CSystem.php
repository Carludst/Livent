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

    public static function setHomeImg(){
        try{
            if(self::authorizer()){
                $view=new VSetGraphicPage();
                if(!is_null($view->getNameHomeImg()))$name=$view->getNameHomeImg();
                else throw new Exception("name home image don't seted");
                if(!is_null($view->getPathHomeImg())&&!is_null($view->getTypeHomeImg())){
                    $path=$view->getPathHomeImg();
                    $type=$view->getTypeHomeImg();
                }
                else throw new Exception("home image don't seted");
                if(!FDbH::updateFile(MappingPathFile::dirHomeMain(),$name,$path,$type,true)){
                    FDbH::storeFile(MappingPathFile::dirHomeMain(),$name,$path,$type,true);
                }
                header('Location: /Livent/Graphics/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function deleteHomeImg(){
        try{
            if(self::authorizer()){
                $view=new VSetGraphicPage();
                if(!is_null($view->getNameDelateHomeImg()))$name=$view->getNameDelateHomeImg();
                else $name=null;
                if(FDbH::existFile(MappingPathFile::dirHomeMain(),$name)){
                    FDbH::deleteFile(MappingPathFile::dirHomeMain(),$name);
                }
                else throw new Exception("you want delate a img that don't exist");
                header('Location: /Livent/Graphics/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! non abbiamo potuto eliminare il file verficare di avere le autorizazioni necessarie");
        }

    }

    public static function setDefaultProfileImg(){
        try{
            if(self::authorizer()){
                $view=new VSetGraphicPage();
                if(!is_null($view->getPathProfileImg())&&!is_null($view->getTypeProfileImg())){
                    $path=$view->getPathProfileImg();
                    $type=$view->getTypeProfileImg();
                }
                else throw new Exception("default profile image don't seted");
                if(!FDbH::updateFile(MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),$path,$type,true)){
                    echo ('carla');
                    FDbH::storeFile(MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),$path,$type,true);
                }
                //header('Location: /Livent/Graphics/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function setLogoImg(){
        try{
            if(self::authorizer()){
                $view=new VSetGraphicPage();
                if(!is_null($view->getPathLogoImg())&&!is_null($view->getTypeLogoImg())){
                    $path=$view->getPathLogoImg();
                    $type=$view->getTypeLogoImg();
                }
                else throw new Exception("logo image don't seted");
                if(!FDbH::updateFile(MappingPathFile::dirSystem(),MappingPathFile::nameLogoApp(),$path,$type,true)){
                    FDbH::storeFile(MappingPathFile::dirSystem(),MappingPathFile::nameLogoApp(),$path,$type,true);
                }
                header('Location: /Livent/Graphics/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function setDefaultEventImg(){
        try{
            if(self::authorizer()){
                $view=new VSetGraphicPage();
                if(!is_null($view->getPathEventImg())&&!is_null($view->getTypeEventImg())){
                    $path=$view->getPathEventImg();
                    $type=$view->getTypeEventImg();
                }
                else throw new Exception("event default image don't seted");
                if(!FDbH::updateFile(MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),$path,$type,true)){
                    FDbH::storeFile(MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain(),$path,$type,true);
                }
                header('Location: /Livent/Graphics/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

    public static function showSetGraphicPage(){
        if(self::authorizer()){
            $homeImgName=FDbH::loadDirectory(MappingPathFile::dirHomeMain());
            $homeImg=array();
            for($i=0;$i<count($homeImgName);$i++)$homeImg[]=array('file'=>FDbH::loadFile( MappingPathFile::dirHomeMain(),$homeImgName[$i]),'name'=>$homeImgName[$i]);
            if(FDbH::existFile(MappingPathFile::dirSystem(),MappingPathFile::nameLogoApp())){
                $logo=FDbH::loadFile(MappingPathFile::dirSystem(),MappingPathFile::nameLogoApp());
            }
            else $logo='';
            if(FDbH::existFile(MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain())){
                $defaultEvent=FDbH::loadFile(MappingPathFile::dirEventDefault(),MappingPathFile::nameEventMain());
            }
            else $defaultEvent='';
            if(FDbH::existFile(MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain())){
                $defaultUser=FDbH::loadFile(MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain());
            }
            else $defaultUser='';
            $view=new VSetGraphicPage();
            $view->show($homeImg,$logo,$defaultEvent,$defaultUser);
        }
    }

}