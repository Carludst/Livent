<?php

class VDelete extends View
{
    private static String $template='delete.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(String $action,String $what,String $return ,String $message)
    {
        $assign=$this->assign;
        $assign['action']=$action;
        $assign['what']=$what;
        $assign['return']=$return;
        $assign['message']=$message;
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getEmail(){
        if(!empty($_POST['email']))return $_POST['email'];
        else throw new Exception('email not setted');
    }

    public function getPassword(){
        if(!empty($_POST['password']))return hash("sha3-256",$_POST['password']);
        else throw new Exception('password not setted');
    }

}