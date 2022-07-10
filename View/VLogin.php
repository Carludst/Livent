<?php
class VLogin extends View
{
    private static String $template='login.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show()
    {


        $this->smarty->assign($this->assign);
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

