<?php
class VHome extends Smarty
{
    private static String $template='home.tpl';

    public function __construct(String $template, String $compile)
    {
        $this->setTemplateDir($template);
        $this->setCompileDir($compile);
    }

    public function show(?EUser $user , String $profileImg,Array $eventsOpen, Array $eventsFinished , Array $homeImg, Array $eventsOpenImg, Array $eventsFinishedImg)
    {
        $assign=array();
        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['eventsOpen']=$eventsOpen;
        $assign['eventsFinished']=$eventsFinished;
        $assign['homeImg']=$homeImg;
        $assign['eventsOpenImg']=$eventsOpenImg;
        $assign['eventsFinishedImg']=$eventsFinishedImg;

        $this->assign($assign);
        $this->display(self::$template);
    }
}
