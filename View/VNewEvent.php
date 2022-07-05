<?php

class VNewEvent extends View
{
    private static String $template='newEvent.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show()
    {
        $assign=$this->assign;
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
        $assign=$this->assign;
        if($this->getMood())$assign['mood']='true';
        else $assign['mood']='false';
        $assign['name']=$this->getName();
        $assign['place']=$this->getPlace();
        $assign['sport']=$this->getSport();
        $assign['public']=$this->getPublic();
        $assign['contacts']=$this->getContacts();
    }

    public function getMood():bool{
        return empty($_GET);
    }

    public function getMyInput():?int{
        if(isset($GLOBALS['_MYINPUT'])){
            return (int)$GLOBALS['_MYINPUT'];
        }
        else return NULL;
    }

    public function getName():?String{
        if(!empty($_POST['name']))return $_POST['name'];
        else return null;
    }

    public function getPlace(){
        $place=array();
        if(!empty($_POST['city'])) $place['city']=$_POST['city'];
        if(!empty($_POST['street'])) $place['street']=$_POST['street'];
        if(!empty($_POST['civic number'])) $place['civicnumber']=$_POST['city'];
        if($place['city'] & $place['street'] & $place['civicnumber']) return $place;
        else return null;
    }

    public function getPublic():?String{
        if(!empty($_POST['public?']))return $_POST['public?'];
        else return null;
    }

    public function getContacts():?array{
        $contacts=array();
        $name=array();
        $email=array();
        $telephone=array();
        if(!empty($_POST['nameContact1'])) array_push($name, $_POST['nameContact1']);
        if(!empty($_POST['nameContact2'])) array_push($name, $_POST['nameContact2']);
        if(!empty($_POST['nameContact3'])) array_push($name, $_POST['nameContact3']);
        if(!empty($_POST['email1'])) array_push($email, $_POST['email1']);
        if(!empty($_POST['email2'])) array_push($email, $_POST['email2']);
        if(!empty($_POST['email3'])) array_push($email, $_POST['email3']);
        if(!empty($_POST['telephone1'])) array_push($telephone, $_POST['telephone1']);
        if(!empty($_POST['telephone2'])) array_push($telephone, $_POST['telephone2']);
        if(!empty($_POST['telephone3'])) array_push($telephone, $_POST['telephone3']);
        if(var_dump(count($name))!=0 & var_dump(count($email))!=0 & var_dump(count($telephone))!=0){
            array_push($contacts, $name);
            array_push($contacts, $email);
            array_push($contacts, $telephone);
            return $contacts;
        }else return null;
    }

}