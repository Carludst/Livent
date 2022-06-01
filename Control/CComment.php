<?php

class CComment
{
    public static function insert():void
    {
        //VERIFICA LOGIN E TIPO UTENTE
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $idevent=(int)$_POST['idevent'];
                $text=$_POST['text'];
                $emailUser=strtolower($_POST['user']);
                if(filter_var($emailUser,FILTER_VALIDATE_EMAIL)!=false){
                    $user=FDbH::loadOne($emailUser,EUser::class);
                }
                else throw new Exception('invalid e-mail');

                if(isset($_POST['id']) && $_POST['id']!=-1){
                    $comment=new EComment($user,$text,(int)$_POST['id']);
                    FDbH::updateOne($comment);
                }
                else {
                    FDbH::store(new EComment($user,$text));
                }
            }
            catch (Exception $e){
                //RICHIAMA ERRORE
            }
        }
        // else RICHIAMA ERRORE
    }

    public static function delete(){
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            try{
                $id=(int)$_GET['id'];
                FDbH::deleteOne($id,EComment::class);
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
                $containText=$_POST['containtext'];
                $userEmail=strtolower($_POST['organizer']);

                if(filter_var($userEmail,FILTER_VALIDATE_EMAIL)!=false){
                    $user=FDbH::loadOne($userEmail,EUser::class);
                }
                else throw new Exception('invalid e-mail');
                return FDbH::searchComment($containText,$user);
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

}