<?php

class VOrganizerProfile extends View
{

    private static String $template='organizerProfile.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param EUser|null $user
     * @param String|null $profileImg
     * @param String|null $eventImg
     * @param array|null $events
     * @return void
     * @throws SmartyException
     */
    public function showProfile(?EUser $user , ?String $profileImg, ?Array $eventImg, ?Array $events)
    {
        $assign = $this->assign;
        $assign['user'] = $user;
        $assign['profileImg'] = $profileImg;
        $assign['eventImg'] = $eventImg;
        $assign['events'] = $events;


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

}