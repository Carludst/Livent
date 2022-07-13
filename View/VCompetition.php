<?php

class VCompetition extends View
{
    private static String $template='competition.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param EEvent|null $event
     * @param String|null $eventImg
     * @return void
     * @throws SmartyException
     */
    public function show(?EUser $user , ?String $profileImg, ?String $name, ?Array $athletes , ?DateTime $startDate, ?string $sport, ?EDistance $distance, ?string $gender, ?string $description)
    {
        $assign = $this->assign;
        //$assign['eventImg'] = $eventImg;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['athletes']=$athletes;
        //$assign['result']=$result;
        $assign['name']=$name;
        $assign['startDate'] = $startDate;
        $assign['sport'] = $sport;
        $assign['distance'] = $distance;
        $assign['gender'] = $gender;
        $assign['description'] = $description;

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getId(){
        if(!empty($_POST['id']))return $_POST['id'];
        else return null;
    }

    public function addNewIscription(String $name, String $surname, DateTime $birthdate, bool $famale ,string $team="", string $sport=""):EAthlete{
        $id=$this->getId();
        $athlete= new EAthlete($name,$surname,$birthdate,$famale,$team,$sport,$id);
        return $athlete;
    }
}
