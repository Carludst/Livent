<?php
class VLogin extends View
{
    private static String $template='login.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    public function show()
    {
        $this->smarty->assign($this->assign);
        $this->smarty->display(self::$template);
    }
}

