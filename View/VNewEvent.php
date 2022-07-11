<?php

class VNewEvent extends View
{
    private static String $template='newEvent.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(EEvent|null $event)
    {
        $assign=$this->assign;
        if($this->getMood())$assign['mood']='true';
        else $assign['mood']='false';
        $assign['event']=$event;
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getMood():bool{
        return empty($_POST);
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

    public function getPublic():?bool{
        if(!empty($_POST['public?'])){
            if($_POST['public?']=='public') return true;
            else return false;
        }
        else return null;
    }

    public function getContacts():?array{
        $contacts=array();
        $name=array();
        $email=array();
        $telephone=array();
        if(!empty($_POST['nameContact1'])&&!empty($_POST['email1'])&&!empty($_POST['telephone1'])){
            $name=$_POST['nameContact1'];
            $phone=$_POST['telephone1'];
            $email=$_POST['email1'];
            $contacts[]= new EContact($name, $phone, $email);
        }
        elseif (!empty($_POST['nameContact1'])||!empty($_POST['email1'])||!empty($_POST['telephone1'])){
            throw new Exception('You have to compile all fields about a contact');
        }
        if(!empty($_POST['nameContact2'])&&!empty($_POST['email2'])&&!empty($_POST['telephone2'])){
            $name=$_POST['nameContact2'];
            $phone=$_POST['telephone2'];
            $email=$_POST['email2'];
            $contacts[]= new EContact($name, $phone, $email);
        }
        elseif (!empty($_POST['nameContact2'])||!empty($_POST['email2'])||!empty($_POST['telephone2'])){
            throw new Exception('You have to compile all fields about a contact');
        }
        if(!empty($_POST['nameContact3'])&&!empty($_POST['email3'])&&!empty($_POST['telephone3'])){
            $name=$_POST['nameContact3'];
            $phone=$_POST['telephone3'];
            $email=$_POST['email3'];
            $contacts[]= new EContact($name, $phone, $email);
        }
        elseif (!empty($_POST['nameContact2'])||!empty($_POST['email2'])||!empty($_POST['telephone2'])){
            throw new Exception('You have to compile all fields about a contact');
        }
        return $contacts;
    }

    public function getDescription():?String{
        if(!empty($_POST['description']))return $_POST['description'];
        else return null;
    }

    public function getEmail():?string{
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword():?string{
        if(!empty($_POST['password']))return $_POST['password'];
        else return null;
    }

    public function createEvent():EEvent{
        $name=$this->getName();
        $place=$this->getPlace();
        $sport=$this->getSport();
        $public=$this->getPublic();
        $contacts=$this->getContacts();
        $description=$this->getDescription();
        $events= new EAthlete($name, $place,$sport,$public,$contacts,$description);
        return $events;
    }

}