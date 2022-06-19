<?php

class CManageRegistration
{

    private static function authorizer(ECompetition $competition , EAthlete $athlete):bool{

        $emailLOgged=FSession::getUserLogged()->getEmail();
        $emailRegisterBy=$competition->RegisteredBy($athlete)->getEmail();
        $emailOrganaizerEvent=FDbH::loadEventByCompetition($competition)->getOrganizer()->getEmail();

        if(FSession::isLogged() && ($emailLOgged!=$emailRegisterBy && $emailLOgged!=$emailOrganaizerEvent))throw new Exception("you must be the register or the oganizer of the event");
        return CManageUser::callLogin();
    }

    public static function addRegistration(ECompetition $competition,EAthlete $athlete){
        try{
            if(CManageUser::callLogin()){
                if(!$competition->addRegistration($athlete,FSession::getUserLogged()))throw new Exception("registration is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! L'inserimento della registazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


    public static function delateRegistration(ECompetition $competition, EAthlete $athlete)
    {
        try{
            if(self::authorizer($competition,$athlete)){
                if(!$competition->popRegistration($athlete))throw new Exception("deletion registration/result is failed");
            }
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La cancellazione dei risultati/registrazioni non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }

    }


    public static function newPageRegistration(){
        try{
            //Richiama  VRegistration::show($registration);
        }
        catch(Exception $e){
            CError::store($e,"ci scusiamo per il disaggio !!! La visualizazzione della pagina per inserire una nuova registrazione non è andato a buon fine , verificare di possedere le autorizazioni necessarie");
        }
    }


}
