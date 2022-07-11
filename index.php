<?php
include_once "./Utility/defaultPath.php";
include_once $GLOBALS['defaultPath']."/Utility/autoload.php";
$f=new CFrontController();
CFrontController::run();
