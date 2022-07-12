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
    public function show(?EUser $user , ?String $profileImg, ?String $name, ?Array $athletes , ?DateTime $startDate, ?string $sport, ?EDistance $distance, ?string $gender)
    {
        $assign = $this->assign;
        //$assign['eventImg'] = $eventImg;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['athletes']=$athletes;
        $assign['name']=$name;
        $assign['startDate'] = $startDate;
        $assign['sport'] = $sport;
        $assign['distance'] = $distance;
        $assign['gender'] = $gender;


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }
}
