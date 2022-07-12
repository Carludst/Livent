<?php

class VDeleteUser extends View
{
    private static String $template='deleteUser.tpl';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $profileImg
     * @param array $users
     * @param String $mood
     * @return void
     * @throws SmartyException
     */
    public function show(Array $users , ?Array $profileImg, String $mood)
    {
        $assign = $this->assign;
        $assign['users']=$users;
        $assign['profileImg']=$profileImg;
        $assign['mood']=$mood;
        $assign['username']=$this->getUsername();
        $assign['email']=$this->getEmail();


        $this->smarty->assign($assign);
        $this->smarty->display(self::$template);
    }

    public function getMood(){
        return empty($_GET);
    }

    public function getEmail(){
        if(!empty($_GET['email'])){
            return $_GET['email'];
        }
        else return NULL ;
    }

    public function getUsername(){
        if(!empty($_GET['username'])){
            return $_GET['username'];
        }
        else return NULL ;
    }

}