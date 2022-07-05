<?php

class VUserProfile extends View
{
    private static Array $template=['profile'=>'userProfile.tpl', 'competition'=>'userCompetition.tpl', 'results'=>'userResults.tpl' ];

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
    public function showProfile(?EUser $user , ?String $profileImg)
    {
        $assign = $this->assign;
        $assign['user'] = $user;
        $assign['profileImg'] = $profileImg;


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template['profile']);
    }

    /**
     * @param array|null $registration
     * @throws SmartyException
     */
    public function showCompetition(?Array $registration)
    {
        $assign = $this->assign;
        $assign['competitions'] = array_keys($registration);
        $assign['athlets'] = array_values($registration);

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template['competition']);
    }
}