<?php

class VDelete extends View
{
    private static $template='delete.tpl';

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

    public function getMyInputCompetition(): ?int
    {
        if(isset($GLOBALS['_MYINPUT'])){
            $myinput=explode('I',$GLOBALS['_MYINPUT']);
            return (int)$myinput[1];
        }
        else return NULL;
    }

    public function getMyInputAthlete(): ?int
    {
        if(isset($GLOBALS['_MYINPUT'])){
            $myinput=explode('I',$GLOBALS['_MYINPUT']);
            return (int)$myinput[0];
        }
        else return NULL;
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