<?php

class CShowHome
{
    public static function HomePage(){
        try{
            //Richiama  VHome::show();
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina home non è andata a buon fine");
        }
    }

}