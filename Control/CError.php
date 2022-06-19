<?php

class CError
{
    public static function store(Exception $error, string $message){
        FDbH::storeError($error);
        //VErrorPage::Show($message);
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