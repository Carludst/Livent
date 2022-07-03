<?php

class VSearchEvent extends View
{
    private static String $template='searchEvent.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(Array $events ,Array $eventsImg )
    {
        $assign=$this->assign;
        if($this->getMood())$assign['mood']='true';
        else $assign['mood']='false';
        $assign['events']=$events;
        $assign['eventsImg']=$eventsImg;
        $assign['name']=$this->getName();
        $assign['place']=$this->getPlace();
        $assign['sport']=$this->getSport();
        $assign['dateMin']=$this->minDate();
        $assign['dateMax']=$this->maxDate();

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getMood():bool{
        return empty($_GET);
    }

    public function getMyInput():?int{
        if(isset($GLOBALS['_MYINPUT'])){
            return (int)$GLOBALS['_MYINPUT'];
        }
        else return NULL;
    }

    public function getName():?String{
        if(!empty($_GET['name']))return $_GET['name'];
        else return null;
    }

    public function getPlace():?String{
        if(!empty($_GET['place']))return $_GET['place'];
        else return null;
    }

    public function getSport():?String{
        if(!empty($_GET['sport']) && $_GET['sport']!='Qualsiasi Sport'){
            return $_GET['sport'];
        }
        else return null;
    }

    public function minDate():?DateTime{
        if(!empty($_GET['dateMin'])){
            return DateTime::createFromFormat('Y-m-d',$_GET['dateMin']);
        }
        else return null;
    }

    public function maxDate():?DateTime{
        if(!empty($_GET['dateMax'])){
            return DateTime::createFromFormat('Y-m-d',$_GET['dateMax']);
        }
        else return null;
    }

}