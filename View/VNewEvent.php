<?php

class VNewEvent extends View
{
    private static String $template='newEvent.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(EEvent|null $event=NULL)
    {
        $assign=$this->assign;
        $assign['event']=$event;
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getEmail():?string{
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword():?string{
        if(!empty($_POST['password']))return hash("sha3-256", $_POST['password']);
        else return null;
    }

    public function getName():?String{
        if(!empty($_POST['name']))return $_POST['name'];
        else return null;
    }

    public function getPlace(){
        if(!empty($_POST['place'])) return $_POST['place'];
        else return null;
    }

    public function getPublic():?bool{
        if(!empty($_POST['public?'])){
            if($_POST['public?']=='public') return true;
            else return false;
        }
        else return null;
    }

    public function getDescription():?String{
        if(!empty($_POST['description']))return $_POST['description'];
        else return null;
    }

    public function getPathImg():?String{
        if(isset($_FILES['front']) && !empty($_FILES['front']['tmp_name'])){
            return $_FILES['front']['tmp_name'];
        }
        else return null;
    }

    public function getTypeImg():?String{
        if(isset($_FILES['front']['type']) && ($_FILES['front']['type']=='image/jpeg'||$_FILES['front']['type']=='image/jpg')){
            return 'jpg';
        }
        elseif(isset($_FILES['front']['type']) && $_FILES['front']['type']=='image/png') return 'png';
        else return null;
    }

    public function createEvent(EUser $organizer):EEvent{
        $name=$this->getName();
        $place=$this->getPlace();
        $public=$this->getPublic();
        $description=$this->getDescription();
        $events= new EEvent($name, $place,$organizer,$public,$description);
        return $events;
    }

}