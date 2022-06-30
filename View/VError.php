<?php

class VError extends View
{
    private static String $template='error.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(String $message )
    {
        $assign=$this->assign;
        $assign['message']=$message;

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

}