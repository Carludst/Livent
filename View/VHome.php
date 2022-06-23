<?php
class VHome
{
    private static Smarty $smarty;
    private static String $template='home.tpl';

    public function __construct(String $template, String $compile)
    {
        self::$smarty=new Smarty();
        self::$smarty->setTemplateDir($template);
        self::$smarty->setCompileDir($compile);
    }

    public static function show(?EUser $user , String $profileImg,Array $eventOpen, Array $eventsFinished , Array $homeImg)
    {
        $assign=array();

        $assign['user']=$user;
        $assign['profileImg']=$profileImg;
        $assign['eventOpen']=$eventOpen;
        $assign['eventsFinished']=$eventsFinished;
        $assign['homeImg']=$homeImg;

        self::$smarty->assign($assign);
        self::$smarty->display(self::$template);
    }
}
