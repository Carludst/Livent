<?php

class VResult extends View
{
    private static String $template='results.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function getName(){
        if(!empty($_POST['name']))return $_POST['name'];
        else return null;
    }

    public function getSurname(){
        if(!empty($_POST['surname']))return $_POST['surname'];
        else return null;
    }

    public function getId(){
        if(!empty($_POST['id']))return $_POST['id'];
        else return null;
    }

    public function getEmail(){
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword(){
        if(!empty($_POST['password']))return hash('sha3-256',$_POST['password']);
        else return null;
    }

    public function getTime(){
        if(!empty($_POST['time']))return $_POST['time'];
        else return null;
    }

    public function addNewResult(string $name, string $surname, DateTime $birthdate, bool $famale, string $team = "", string $sport = ""): EAthlete
    {
        $id = self::getId();
        $athlete = new EAthlete($name, $surname, $birthdate, $famale, $team, $sport, $id);
        return $athlete;
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
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

}