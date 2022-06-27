<?php

class CShowHome
{
    private static function authorizer():bool{

        if(FSession::isLogged() && (FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you don't have authorization");
        return CManageUser::callLogin();
    }

    public static function HomePage(){
        try{
            if(FSession::isLogged()){
                $user=FSession::getUserLogged();
                if(FDbH::existFile( $user,'profile'))   $profileImg=FDbH::loadFile( $user,'profile',0.2);
                else   $profileImg=FDbH::loadFile('System/User','defaultProfile');
            }
            else{
                $user=null;
                $profileImg=null;
            }

            $homeImgName=FDbH::loadDirectory('System/HomeImg');
            $homeImg=array();
            for($i=0;$i<count($homeImgName);$i++)$homeImg[]=array('file'=>FDbH::loadFile( 'System/HomeImg',$homeImgName[$i]),'name'=>$homeImgName[$i]);
            $eventsFinished=FDbH::searchEvent(false,NULL,NULL,NULL,NULL,new DateTime());
            $eventsOpen=FDbH::searchEvent(true,NULL,NULL,NULL,new DateTime());
            if(count($eventsFinished)>9) $eventsFinished=array_slice($eventsFinished,0,9);
            if(count($eventsOpen)>9) $eventsOpen=array_slice($eventsOpen,0,9);
            $eventsFinishedImg=array();
            $eventsOpenImg=array();
            $default='';
            foreach($eventsFinished as $element){
                if(FDbH::existFile($element, 'front')) $eventsFinishedImg[]=FDbH::loadFile($element, 'front', 0.4);
                elseif(!empty($default))$eventsFinishedImg[]=$default;
                elseif(FDbH::existFile('System/Event', 'front')){
                    $default=FDbH::loadFile('System/Event', 'front', 0.4);
                    $eventsFinishedImg[]=$default;
                }
                else $eventsFinishedImg[]=$default;
            }
            foreach($eventsOpen as $element){
                if(FDbH::existFile($element, 'front')) $eventsOpenImg[]=FDbH::loadFile($element, 'front', 0.4);
                elseif(!empty($default))$eventsOpenImg[]=$default;
                elseif(FDbH::existFile('System/Event', 'front')){
                    $default=FDbH::loadFile('System/Event', 'front', 0.4);
                    $eventsOpenImg[]=$default;
                }
                else $eventsOpenImg[]=$default;
            }


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
                $array=FDbH::loadDirectory('System/HomeImg');
                if(count($array)>0)$name=(int)max($array)+1;
                else $name=0;
                FDbH::storeFile('System/HomeImg',$name,$href,'type',2);
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
                FDbH::updateFile('System/User','defaultProfile',$href,'type',2);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

}