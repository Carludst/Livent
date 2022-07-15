<?php
class VHome extends View
{
    private static String $template='home.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param EUser|null $user
     * @param String|null $profileImg
     * @param array $eventsOpen
     * @param array $eventsFinished
     * @param array $homeImg
     * @param array $eventsOpenImg
     * @param array $eventsFinishedImg
     * @return void
     * @throws SmartyException
     */
    public function show(?EUser $user , ?String $profileImg, Array $eventsOpen, Array $eventsFinished , Array $eventsRunning , Array $homeImg, Array $eventsOpenImg, Array $eventsFinishedImg, Array $eventsRunningImg)
    {
        $assign=$this->assign;
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['eventsOpen']=$eventsOpen;
        $assign['eventsFinished']=$eventsFinished;
        $assign['eventsRunning']=$eventsRunning;
        $assign['homeImg']=$homeImg;
        $assign['eventsOpenImg']=$eventsOpenImg;
        $assign['eventsFinishedImg']=$eventsFinishedImg;
        $assign['eventsRunningImg']=$eventsRunningImg;

        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }
}
