<?php

class VNewAthlete extends View
{
    private static String $template='newAthlete.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(EAthlete|null $athlete=NULL)
    {
        $today=new DateTime();
        $assign=$this->assign;
        $assign['athlete']=$athlete;
        $assign['today']=$today->format('Y-m-d');
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    private function getName():?String{
        if(!empty($_POST['name']))return $_POST['name'];
        else return null;
    }

    private function getSurname():?String{
        if(!empty($_POST['surname']))return $_POST['surname'];
        else return null;
    }

    private function getBirthDate():?DateTime{
        if(!empty($_POST['date'])){
            return DateTime::createFromFormat('Y-m-d',$_POST['date']);
        }
        else return null;
    }

    private function getSport():?String{
        if(!empty($_POST['sport']))return $_POST['sport'];
        else return null;
    }

    private function getGender():?bool{
        if(!empty($_POST['gender'])){
            if($_POST['gender']=="woman") return true;
            else return false;
        }
        else return null;
    }

    private function getTeam():?String{
        if(!empty($_POST['team']))return $_POST['team'];
        else return null;
    }

    public function getEmail():?string{
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword():?string{
        if(!empty($_POST['password']))return hash("sha3-256", $_POST['password']);
        else return null;
    }

    public function createAthlete():EAthlete{
        $name=$this->getName();
        $surname=$this->getSurname();
        $birthdate=$this->getBirthDate();
        $sport=$this->getSport();
        $gender=$this->getGender();
        $team=$this->getTeam();
        $athlete= new EAthlete($name, $surname,$birthdate,$gender,$team,$sport);
        return $athlete;
    }



}