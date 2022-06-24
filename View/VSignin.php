<?php
class VSignin extends Smarty
{
    private static Smarty $smarty;
    private static String $template='signin.tpl';

    public function __construct(String $template, String $compile)
    {
        self::$smarty=new Smarty();
        self::$smarty->setTemplateDir($template);
        self::$smarty->setCompileDir($compile);
    }

    public static function show()
    {
        self::$smarty->display(self::$template);
    }
}
