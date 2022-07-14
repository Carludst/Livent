<?php

class VErrorSystem extends View
{
    private static String $template='errorSystem.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param String $errors
     * @return void
     * @throws SmartyException
     */
    public function show(String $errors, ?EUser $user , ?String $profileImg)
    {
        $assign = $this->assign;
        $assign['errors'] = $errors;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }
}