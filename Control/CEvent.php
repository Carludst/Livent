<?php

require_once '../Foundation/FDbH.php';
require_once '../Entity/EUser.php';
require_once '../Entity/EEvent.php';

class CEvent
{
    public static function insert():void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $name=$_POST['nameevent'];
                $description=$_POST['description'];
                $place=$_POST['place'];
                $organizerEmail=strtolower($_POST['organizer']);
                $public=(bool)$_POST['public'];
                if(filter_var($organizerEmail,FILTER_VALIDATE_EMAIL)!=false){
                    $organizer=FDbH::loadOne($organizerEmail,EUser::class);
                }
                else throw new Exception('invalid e-mail');

                if(isset($_POST['id']) && $_POST['id']!=-1){
                    $event=new EEvent($name,$place,$organizer,$public,$description,(int)$_POST['id']);
                    FDbH::updateOne($event);
                }
                else {
                    $event=new EEvent($name,$place,$organizer,$public,$description);
                    FDbH::store($event);
                }
            }
            catch (Exception $e){
                //RICHIAMA ERRORE
            }
        }
        // else RICHIAMA ERRORE
    }

    public static function delate(){
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            try{
                $id=(int)$_GET['id'];
                FDbH::deleteOne($id,EEvent::class);
            }
            catch(Exception $e){
                //RICHIAMA ERRORE
            }
        }
        // else RICHIAMA ERRORE
    }

    public static function search():array{
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $name=$_POST['nameevent'];
                $organizerEmail=strtolower($_POST['organizer']);
                $place=$_POST['place'];
                $public=(bool)$_POST['public'];
                $startDateFrom=new DateTime($_POST['startDateFrom']);
                $startDateTo=new DateTime($_POST['startDateTo']);
                if(filter_var($organizerEmail,FILTER_VALIDATE_EMAIL)!=false){
                    $organizer=FDbH::loadOne($organizerEmail,EUser::class);
                }
                else throw new Exception('invalid e-mail');
                return FDbH::searchEvent($public,$name,$organizer,$place,$startDateFrom,$startDateTo);
            }

            catch (Exception $e){
                //RICHIAMA ERRORE
                return array();
            }
        }
        else{
            //RICHIAMA ERRORE
            return array();
        }
    }

    public static function show(){
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            try{
                $id=(int)$_GET['id'];
                $event=FDbH::loadOne($id,EEvent::class);
                if($event->getPublic()){
                    //RICHIAMA VIEW
                }
                elseif($event->getUser()->getType()=='organizer'){
                    //RICHIAMA VIEW
                }

            }
            catch(Exception $e){
                //RICHIAMA ERRORE
            }
        }
        // else RICHIAMA ERRORE
    }

    public static function showNewPage(){
        try{
            //VERIFICA LOGIN E TIPO UTENTE
            //RICHIAMA VIEW
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

}