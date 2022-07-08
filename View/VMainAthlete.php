<?php

class VMainAthlete extends View
{
    private static String $template='mainAthlete.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(?EUser $user , ?String $profileImg, EAthlete $athlete, ?Array $results)
    {
        $assign=$this->assign;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['athlete']=$athlete;
        $assign['results']=$results;

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getSport()
    {
        if(!empty($_GET['sport']))return $_GET['sport'];
        else return null;
    }
}