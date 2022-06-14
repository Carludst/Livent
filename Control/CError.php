<?php

class CError
{
    public static function storeError(Exception $error, string $message){
        FDbH::storeError($error);
        //richiamare la view
    }

    public static function readError(){
        FDbH::readErrors();
        //richiama la view
    }

    public static function deleteError(){
        FDbH::deleteErrors();
    }

    public static function getFile(){
        header("Location: ".FDbH::returnPathFile());
        header("Content-Type: txt");
    }

}