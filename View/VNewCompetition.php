<?php

class VNewCompetition extends View
{
    private static String $template='newCompetition.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(ECompetition|null $competition)
    {
        $assign=$this->assign;
        if($this->getMood())$assign['mood']='true';
        else $assign['mood']='false';
        $assign['competition']=$competition;
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    private function getName():?String{
        if(!empty($_POST['name']))return $_POST['name'];
        else return null;
    }

    private function getDateTime():?DateTime{
        if(!empty($_POST['dateTime']))return $_POST['dateTime'];
        else return null;
    }

    private function getDescription():?String{
        if(!empty($_POST['description']))return $_POST['description'];
        else return null;
    }

    private function getGender():?bool{
        if(!empty($_POST['gender'])){
            if($_POST['gender']=="woman") return true;
            else return false;
        }
        else return null;
    }

    private function getSport():?String{
        if(!empty($_POST['sport']))return $_POST['sport'];
        else return null;
    }

    private function getDistance():?EDistance{
        if(!empty($_POST['dist'])){
            $distance=new EDistance($_POST['dist']);
            $distance->toString($_POST['unit']);
            return $distance;
        }
        else return null;
    }

    public function getEmail():?string{
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword():?string{
        if(!empty($_POST['password']))return $_POST['password'];
        else return null;
    }

    public function createAthlete():EAthlete{
        $name=$this->getName();
        $dateTime=$this->getDateTime();
        $birthdate=$this->getBirthDate();
        $sport=$this->getSport();
        $gender=$this->getGender();
        $distance=$this->getDistance();
        $description=$this->getDescription();
        $athlete= new EAthlete($name,$dateTime,$birthdate,$gender,$distance,$sport,$description);
        return $athlete;
    }

    public function getMood():bool{
        return empty($_GET);
    }

}