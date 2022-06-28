<?php
require_once $GLOBALS['defaultPath'].'/Utility/SmartyDirectoryDefaultConfiguration.php';

class View
{
    private static String $templateDir;
    private static String $compileDir;
    private static String $dir;
    private static String $logo;
    protected Smarty $smarty;
    protected Array $assign;

    protected function __construct()
    {
        $this->smarty=new Smarty();
        $this->smarty->setTemplateDir(self::$templateDir);
        $this->smarty->setCompileDir(self::$compileDir);
        $this->assign=array();
        $this->assign['dir']=self::$dir;
        $this->assign['logo']=self::$logo;
    }

    public static function setDir(String $template, String $compile , String $default, String $logo)
    {
        self::$dir=$default;
        self::$compileDir=$compile;
        self::$templateDir=$template;
        self::$logo=$logo;
    }
}