<?php
require_once ('../Foundation/FDbH.php');

//$e=new EEvent('carla','Avezzano',new EUser('robertodistefano24@gmail.com','roby','carla','o'),'true');
$u=FDbH::loadOne('robertodistefano24@gmail.com',EUser::class);
//new EUser('robertodistefano24@gmail.com','roby','carla','o');
//FDbH::store($u);
//FDbH::store($e);
/*
$e->addCompetition(new ECompetition('prova',new DateTime('now'),'M','corsa',new EDistance(10)));
*/
$a=FDbH::searchEvent('pr');
var_dump($a);


//echo $info::class;
