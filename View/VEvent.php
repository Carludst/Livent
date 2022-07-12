<?php

class VEvent extends View
{
    private static String $template='event.tpl';

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
    public function show(?EEvent $event , ?String $eventImg, ?EUser $user , ?String $profileImg, ?Array $competitions,?Array $contacts,String $mood)
    {
        $assign = $this->assign;
        $assign['event'] = $event;
        $assign['eventImg'] = $eventImg;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['competitions'] = $competitions;
        $assign['contacts'] = $contacts;
        $assign['mood']=$mood;



        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }
}