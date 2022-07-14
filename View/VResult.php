<?php

class VResult extends View
{
    private static String $template='results.tpl';

    public function __construct()
    {
        parent::__construct();
    }



    public function show(?EUser $user , ?String $profileImg, ECompetition $competition, ?Array $registration, ?Array $results, EUser $organizer)
    {
        $assign = $this->assign;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['results']=$results;
        $assign['competition']=$competition;
        $assign['registration']=$registration;
        $assign['organizer']=$organizer;
        $assign['pattern']='^(((([0-9]{1,2}:){1,2}[0-9]{1,2}(\.[0-9]*)?)|([0-9]*((\.|,)[0-9]*)?))|(DNS)|(DNF))$';
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }


    /**
     * @throws Exception
     */
    public function getAthleteId():int{
        if(!empty($_POST["athlete"]))return (int)$_POST["athlete"];
        else throw new Exception();
    }

    public function getEmail(){
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword(){
        if(!empty($_POST['password']))return hash('sha3-256',$_POST['password']);
        else return null;
    }

    /**
     * @throws Exception
     */
    public function getTime(){
        if(!empty($_POST['time']))return new ETime($_POST['time']);
        else throw new Exception();
    }

}