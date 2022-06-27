<?php
include_once "./Utility/defaultPath.php";
include_once $GLOBALS['defoultPath']."/Utility/autoload.php";

$f=new CFrontController();
CFrontController::run();
