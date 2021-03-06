<?php

class VUserProfile extends View
{
    private static String $template='userProfile.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param EUser|null $user
     * @param String|null $profileImg
     * @return void
     * @throws SmartyException
     */
    public function showProfile(?EUser $user , ?String $profileImg, ?Array $competition, ?Array $athletes, ?Array $events)
    {
        $assign = $this->assign;
        $assign['user'] = $user;
        $assign['profileImg'] = $profileImg;
        $assign['competitions'] = $competition;
        $assign['athletes'] = $athletes;
        $assign['events'] = $events;


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }
}