<?php

class CError
{
    public static function store(Exception $error, string $message){
        FDbH::storeError($error);
        FSession::addDataSession('errorMessage',$message);
        header("Location: ".'/Livent/Error/');
    }

    public static function callError(){
        if(FSession::isSetDataSession('errorMessage')){
            $message=FSession::getDataSession('errorMessage');
        }
        else $message='ci scusiamo per il disaggio !!! si è verificato un errore non catalogato';
        $view=new VError();
        $view->show($message);
    }

    public static function read(){
        FDbH::readErrors();
        //richiama la view
    }

    public static function delete(){
        FDbH::deleteErrors();
    }

    public static function getFile(){
        header("Location: ".FDbH::returnErrorPathFile());
        header("Content-Type: txt");
    }

}