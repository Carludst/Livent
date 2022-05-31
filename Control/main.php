<?php
require_once ('../Foundation/FDbH.php');
$e=new EEvent('prova','Avezzano',new EUser('robertodistefano24@gmail.com','roby','carla','o'),'true');
$u=new EUser('robertodistefano24@gmail.com','roby','carla','o');

$e=FDbH::loadOne(1,$e::class);
//$e->addCompetition(new ECompetition('prova',new DateTime('now'),'M','corsa',new EDistance(10)));
$a=FDbH::searchEvent(NULL,NULL,NULL,new DateTime('2022-05-24 01:06:23'),new DateTime('2022-05-25 01:06:23'));
var_dump($a);


//echo $info::class;
