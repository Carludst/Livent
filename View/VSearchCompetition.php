<?php

class VSearchCompetition extends View
{
    private static String $template='searchCompetition.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(Array $competitions,Array $events,String $mood)
    {
        $assign=$this->assign;
        $assign['mood']=$mood;
        $assign['competitions']=$competitions;
        $assign['events']=$events;

        $assign['name']=$this->getName();
        $assign['sport']=$this->getSport();
        $assign['dateMin']=$this->getMinDate();
        $assign['dateMax']=$this->getMaxDate();
        $assign['gender']=$this->getGender();
        $assign['distanceMin']=$this->getMinDistance();
        $assign['distanceMax']=$this->getMaxDistance();


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);

    }

    public function getMood():bool{
        return empty($_GET);
    }

    public function getName():?String{
        if(!empty($_GET['name']) && $_GET['sport']!='Qualsiasi tipo')return $_GET['name'];
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

    /**
     * @throws Exception
     */
    public function getGender():?String{
        if(!empty($_GET['gender'])){
            if($_GET['gender']=='F'|| $_GET['gender']=='M' || $_GET['gender']=='M/F'){
                return $_GET['gender'];
            }
            else throw new Exception('value not allowed');
        }
        else return null;
    }

    /**
     * @throws Exception
     */
    public function getMinDistance():?EDistance{
        if(!empty($_GET['distanceMin'])){
            return new EDistance((float)$_GET['distanceMin']);
        }
        else return null;
    }

    /**
     * @throws Exception
     */
    public function getMaxDistance():?EDistance{
        if(!empty($_GET['distanceMax'])){
            return new EDistance((float)$_GET['distanceMax']);
        }
        else return null;
    }

}