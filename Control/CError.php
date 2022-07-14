<?php

class CError
{
    private static function authorizer():bool{

        if(FSession::isLogged() && (FSession::getUserLogged()->getType()!='Administrator'))throw new Exception("you don't have authorization");
        return CManageUser::callLogin();
    }

    /**
     * @param Exception $error
     * @param string|NULL $message
     * @return void
     */
    public static function store(Exception $error, string $message=NULL){
        $view=new VError();
        FDbH::storeError($error);
        $view->show($message);
    }

    public static function read(){
        try{
            if(self::authorizer()){
                if(FSession::isLogged()){
                    $user=FSession::getUserLogged();
                    $profileImg=FDbH::loadMultiFile($user,MappingPathFile::nameUserMain(),MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),0.2);
                }
                else{
                    $user=null;
                    $profileImg=null;
                }
                $error=FDbH::readErrors();
                $view=new VErrorSystem();
                $view->show($error, $user, $profileImg);
            }
            else throw new Exception("you don't have authorization");
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! non è stato possibile visualizzare la pagina degli errori , verificare di possedere le autorizzazioni necessarie");
        }
    }

    public static function delete(){
        try{
            if(self::authorizer()){
                FDbH::deleteErrors();
                header('Location: /Livent/Error/');
            }
            else throw new Exception("you don't have authorization");
        }
        catch (Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! non è stato possibile visualizzare la pagina degli errori , verificare di possedere le autorizzazioni necessarie");
        }
    }

    public static function getFile(){
        header("Location: ".FDbH::returnErrorPathFile());
        header("Content-Type: txt");
    }

}