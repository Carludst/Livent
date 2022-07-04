<?php

    class VNewEvent extends View
    {
    private static String $template='newEvent.tpl';

    public function __construct()
    {
    parent::__construct();
    }

    public function show()
    {
    $assign=$this->assign;
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

    public function getCity():?String{
    if(!empty($_GET['city']))return $_GET['city'];
    else return null;
    }

    public function getStreet():?String{
        if(!empty($_GET['street']))return $_GET['street'];
        else return null;
    }

    public function getCivicNumber():?String{
        if(!empty($_GET['civic number']))return $_GET['civic number'];
        else return null;
    }

    public function getPublic():?String{
        if(!empty($_GET['public?']))return $_GET['public?'];
        else return null;
    }

    public function getCEmail():?String{
        if(!empty($_GET['email']))return $_GET['email'];
        else return null;
    }

    public function getCTelephone():?String{
        if(!empty($_GET['telephone']))return $_GET['telephone'];
        else return null;
    }

}