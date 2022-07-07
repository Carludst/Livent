<?php
class VSignin extends View
{
    private static String $template='signin.tpl';

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

    public function getUser():EUser{
        $password=$this->getPassword();
        $confirmPassword=$this->getConfirmPassword();
        $email=$this->getEmail();
        $username=$this->getUsername();
        $type=$this->getType();
        if($password!=$confirmPassword)throw new Exception("confirm password don't chack with new password");
        else return new EUser($email,$username,$password,$type);
    }

    private function getEmail(){
        if(!empty($_POST['email']))return $_POST['email'];
        else throw new Exception('email not setted');
    }

    private function getType(){
        if(!empty($_POST['type']) && $_POST['type']=='Organizatore' )return 'Organizer';
        elseif(!empty($_POST['type']))return $_POST['type'];
        else throw new Exception('type not setted');
    }

    private function getPassword(){
        if(!empty($_POST['password']))return $_POST['password'];
        else throw new Exception('password not setted');
    }

    private function getNewPassword():?String{
        if(!empty($_POST['newPassword']))return $_POST['newPassword'];
        else return null;
    }

    private function getConfirmPassword():?String{
        if(!empty($_POST['confirmPassword']))return $_POST['confirmPassword'];
        else return null;
    }

    private function getUsername(){
        if(!empty($_POST['username']))return $_POST['username'];
        else throw new Exception('password not setted');
    }
}

