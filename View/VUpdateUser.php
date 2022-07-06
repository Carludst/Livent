<?php

class VUpdateUser extends View
{
    private static String $template='login.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(?EUser $user)
    {
        $assign=$this->assign;
        $assign['user']=$user;
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getEmail():String{
        if(!empty($_POST['email']))return $_POST['email'];
        else throw new Exception('email not setted');
    }

    public function getPassword():String{
        if(!empty($_POST['password']))return $_POST['password'];
        else throw new Exception('password not setted');
    }

    public function getNewPassword():?String{
        if(!empty($_POST['newPassword']))return $_POST['newPassword'];
        else return null;
    }

    public function getConfirmPassword():?String{
        if(!empty($_POST['confirmPassword']))return $_POST['confirmPassword'];
        elseif(empty($_POST['newPassword'])) return null;
        else throw new Exception('confirm password not setted');
    }

    public function getUsername():?String{
        if(!empty($_POST['username']))return $_POST['username'];
        else return null;
    }

}