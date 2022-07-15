<?php

class VSearchAthlete extends View
{
    private static String $template='searchAthlete.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(Array $athletes,String $mood)
    {
        $assign=$this->assign;
        $assign['mood']=$mood;
        $assign['athletes']=$athletes;

        $assign['name']=$this->getName();
        $assign['surname']=$this->getSurname();
        $assign['sport']=$this->getSport();
        $assign['dateMin']=$this->getMinDate();
        $assign['dateMax']=$this->getMaxDate();
        if($this->getGender())$assign['gender']='F';
        elseif(!is_null($this->getGender()))$assign['gender']='M';
        else $assign['gender']='';
        $assign['team']=$this->getTeam();


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);

    }

    public function getMood():bool{
        return empty($_GET);
    }



    public function getName():?String{
        if(!empty($_GET['name']))return $_GET['name'];
        else return null;
    }

    public function getSurname ():?String{
        if(!empty($_GET['surname']))return $_GET['surname'];
        else return null;
    }

    public function getMinDate():?DateTime{
        if(!empty($_GET['dateMin'])){
            return DateTime::createFromFormat('Y-m-d',$_GET['dateMin']);
        }
        else return null;
    }

    public function getMaxDate():?DateTime{
        if(!empty($_GET['dateMax'])){
            return DateTime::createFromFormat('Y-m-d',$_GET['dateMax']);
        }
        else return null;
    }

    public function getSport():?String{
        if(!empty($_GET['sport']) && $_GET['sport']!='Qualsiasi Sport'){
            return $_GET['sport'];
        }
        else return null;
    }

    public function getGender():?bool{
        if(!empty($_GET['gender'])){
            if($_GET['gender']=='F')return true;
            elseif($_GET['gender']=='M') return false;
            else return null;
        }
        else return null;
    }

    public function getTeam():?String{
        if(!empty($_GET['team']))return $_GET['team'];
        else return null;
    }

}