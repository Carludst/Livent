<?php

class VNewRegCompetition extends View
{

    private static String $template='newRegCompetition.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function getMyInputCompetition(): ?int
    {
        if(isset($GLOBALS['_MYINPUT'])){
            $myinput=explode('I',$GLOBALS['_MYINPUT']);
            return (int)$myinput[1];
        }
        else return NULL;
    }

    public function getMyInputAthlete(): ?int
    {
        if(isset($GLOBALS['_MYINPUT'])){
            $myinput=explode('I',$GLOBALS['_MYINPUT']);
            return (int)$myinput[0];
        }
        else return NULL;
    }

    public function show()
    {
        $this->smarty->display(self::$template);
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
        if(!empty($_POST['password']))return $_POST['password'];
        else return null;
    }

    public function addNewIscription(string $name, string $surname, DateTime $birthdate, bool $famale, string $team = "", string $sport = ""): EAthlete
    {
        $id = self::getId();
        $athlete = new EAthlete($name, $surname, $birthdate, $famale, $team, $sport, $id);
        return $athlete;
    }

}