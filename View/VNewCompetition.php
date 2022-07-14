<?php

class VNewCompetition extends View
{
    private static String $template='newCompetition.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show(ECompetition|int $competition)
    {
        $assign=$this->assign;
        if(is_int($competition)){
            $assign['idevent']=$competition;
            $assign['competition']='';
        }
        else{
            $assign['idevent']='';
            $assign['competition']=$competition;
        }
        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    private function getName():?String{
        if(!empty($_POST['name']))return $_POST['name'];
        else return null;
    }

    private function getDateTime():?DateTime{
        if(!empty($_POST['dateTime'])){
            $dateTime=str_replace('T',' ',$_POST['dateTime']);
            echo($dateTime);
            return DateTime::createFromFormat('Y-m-d H:i',$dateTime);
        }
        else return null;
    }

    private function getDescription():?String{
        if(!empty($_POST['description']))return $_POST['description'];
        else return '';
    }

    /**
     * @throws Exception
     */
    private function getGender():?String{
        if(!empty($_POST['gender'])){
            if($_POST['gender']=="Uomo") return 'M';
            elseif ($_POST['gender']=="Donna") return 'F';
            elseif($_POST['gender']=='Uomo e Donna')return 'M/F';
            else throw new Exception('invalid value');
        }
        else return null;
    }

    private function getSport():?String{
        if(!empty($_POST['sport']))return $_POST['sport'];
        else return null;
    }

    /**
     * @throws Exception
     */
    private function getDistance():?EDistance{
        if(!empty($_POST['dist'])){
            return new EDistance($_POST['dist'].$_POST['unit']);
        }
        else return null;
    }

    public function getEmail():?string{
        if(!empty($_POST['email']))return $_POST['email'];
        else return null;
    }

    public function getPassword():?string{
        if(!empty($_POST['password']))return hash("sha3-256", $_POST['password']);
        else return null;
    }

    /**
     * @throws Exception
     */
    public function createCompetition():ECompetition{
        $name=$this->getName();
        $dateTime=$this->getDateTime();
        $sport=$this->getSport();
        $gender=$this->getGender();
        $distance=$this->getDistance();
        $description=$this->getDescription();
        return new ECompetition($name,$dateTime,$gender,$sport,$distance,$description);
    }

}