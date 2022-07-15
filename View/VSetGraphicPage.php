<?php

class VSetGraphicPage extends View
{

    private static String $template='setGraphic.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(EUser $user,String $profileImg,Array $homeImg,String $logoImg , String $eventImg , String $userImg)
    {
        $assign=$this->assign;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['homeImg']=$homeImg;
        $assign['logoImg']=$logoImg;
        $assign['eventImg']=$eventImg;
        $assign['userImg']=$userImg;

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getNameDelateHomeImg():?String{
        return $GLOBALS['_MYINPUT'] ?? NULL;
    }

    public function getNameHomeImg():?String{
        var_dump($_POST);
        return $_POST['nameHomeImg'] ?? null;
    }

    public function getPathHomeImg():?String{
        if(isset($_FILES['imageHome'])){
            return $_FILES['imageHome']['tmp_name'];
        }
        else return null;
    }

    public function getTypeHomeImg():?String{
        if(isset($_FILES['imageHome']['type']) && ($_FILES['imageHome']['type']=='image/jpeg'||$_FILES['imageHome']['type']=='image/jpg')){
            return 'jpg';
        }
        elseif(isset($_FILES['imageHome']['type']) && $_FILES['imageHome']['type']=='image/png') return 'png';
        else return null;
    }

    public function getPathLogoImg():?String{
        var_dump($_FILES);
        if(isset($_FILES['imageLogo'])){
            return $_FILES['imageLogo']['tmp_name'];
        }
        else return null;
    }

    public function getTypeLogoImg():?String{
        if(isset($_FILES['imageLogo']['type']) && ($_FILES['imageLogo']['type']=='image/jpeg'||$_FILES['imageLogo']['type']=='image/jpg')){
            return 'jpg';
        }
        elseif(isset($_FILES['imageLogo']['type']) && $_FILES['imageLogo']['type']=='image/png') return 'png';
        else return null;
    }

    public function getPathEventImg():?String{
        var_dump($_FILES);
        if(isset($_FILES['imageEvent'])){
            return $_FILES['imageEvent']['tmp_name'];
        }
        else return null;
    }

    public function getTypeEventImg():?String{
        if(isset($_FILES['imageEvent']['type']) && ($_FILES['imageEvent']['type']=='image/jpeg'||$_FILES['imageEvent']['type']=='image/jpg')){
            return 'jpg';
        }
        elseif(isset($_FILES['imageEvent']['type']) && $_FILES['imageEvent']['type']=='image/png') return 'png';
        else return null;
    }

    public function getPathProfileImg():?String{
        var_dump($_FILES);
        if(isset($_FILES['imageProfile'])){
            return $_FILES['imageProfile']['tmp_name'];
        }
        else return null;
    }

    public function getTypeProfileImg():?String{
        if(isset($_FILES['imageProfile']['type']) && ($_FILES['imageProfile']['type']=='image/jpeg'||$_FILES['imageProfile']['type']=='image/jpg')){
            return 'jpg';
        }
        elseif(isset($_FILES['imageProfile']['type']) && $_FILES['imageProfile']['type']=='image/png') return 'png';
        else return null;
    }
}