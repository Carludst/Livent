<?php
include_once "../Utility/defaultPath.php";
include_once $GLOBALS('defoultPath')."/Utility/autoload.php";


$blob=FDbH::loadFile('prova','r0',0.01);
echo("<html><body><img src='data:image/jpg;base64,".$blob."'></html></body>" );

//$f=new CFrontController();
//CFrontController::run();
