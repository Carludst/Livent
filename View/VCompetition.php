<?php

class VCompetition extends View
{
    private static String $template='competition.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(?EUser $user , ?String $profileImg, ECompetition $competition)
    {
        $assign = $this->assign;
        //$assign['eventImg'] = $eventImg;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['competition']=$competition;

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

}
