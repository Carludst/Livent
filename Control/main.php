<?php
//require_once '../Entity/EUser.php';
require_once '../Entity/EAthlete.php';
require_once '../Foundation/FDbH.php';
//$info=new EUser("carla@gmail.com","carla","lesbica","amministratore");
$a=new EAthlete("roberto","di stefano",new DateTime("2001-01-24"),false);
$db=new FDbH();
//$db::store($a);

$a=$db::loadOne(22,$a::class);
$a->setName("mario");
echo $a->getId();
echo "\n";
$arr=$db::load($a::class,"name","mario","=","name",false);
var_dump($arr[0]);


//echo $info::class;
