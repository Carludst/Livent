<?php
class VHome
{
    private Smarty $smarty;
    private Array $assign;
    public function __construct(String $template, String $compile){
        $this->smarty=new Smarty();
        $this->smarty->setTemplateDir($template);
        $this->smarty->setCompileDir($compile);
        $this->assign=array();
    }

    public function show(Array $eventsProgrammed, Array $eventsFinished){
        if(FSession::isLogged()){
            $this->assign['user']=FSession::getUserLogged();
            if(FDbH::existFile($this->assign['user'],'profile'))  $this->assign['profileImg']=FDbH::loadFile($this->assign['user'],'profile',0.2);
            else  $this->assign['profileImg']=FDbH::loadFile('User','defaultProfile');
        }
        else{
            $this->assign['user']=null;
            $this->assign['profileImg']=null;
        }
        $this->smarty->assign($this->assign);
        $this->smarty->display('home.tpl');
    }
}
