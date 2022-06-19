<?php

class CShowHome
{
    private static function authorizer():bool{

        if(FSession::isLogged() && (FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you don't have authorization");
        return CManageUser::callLogin();
    }

    public static function HomePage(){
        try{
            //Richiama  VHome::show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina home non è andata a buon fine");
        }
    }

    public static function setIntroImg(String $href){
        try{
            if(self::authorizer()){
                $array=FDbH::loadDirectory('System/HomeImg');
                if(count($array)>0)$name=max($array)+1;
                else $name=0;
                FDbH::storeFile('System/HomeImg',$name,$href,'type',2);
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! il file non è stato allegato , verificare di possedere le autorizazioni necessarie");
        }
    }

}