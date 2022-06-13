<?php

class CManageUser
{

    public static function update(EUser $user):void
    {
        try{
            if(!FDbH::updateOne($user))throw new Exception("you can't update an user that don't exist");
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function create(EUser $user):void
    {
        try{
            FDbH::store($user);
        }
        catch (Exception $e){
            //RICHIAMA ERRORE
        }
    }

    public static function delete(EUser $user){
        try{
            FDbH::deleteOne($user->getEmail(),EAthlete::class);
        }
        catch(Exception $e){
            //RICHIAMA ERRORE
        }
    }

}