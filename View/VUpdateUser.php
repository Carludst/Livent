<?php

class VUpdateUser extends View
{
    private static String $template='updateUser.tpl';

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
        else return null;
    }

    public function getUsername():?String{
        if(!empty($_POST['username']))return $_POST['username'];
        else return null;
    }

    public function getPathFile():?String{
        if(isset($_FILES['image'])){
            return $_FILES['image']['tmp_name'];
        }
        else return null;
    }

    public function getNewEmail():?String{
        if(!empty($_POST['newEmail']))return $_POST['newEmail'];
        else return null;
    }

    public function getTypeFile():?String{
        if(isset($_FILES['image']['type']) && ($_FILES['image']['type']=='image/jpeg'||$_FILES['image']['type']=='image/jpg')){
            return 'jpg';
        }
        elseif(isset($_FILES['image']['type']) && $_FILES['image']['type']=='image/png') return 'png';
        else return null;
    }

}