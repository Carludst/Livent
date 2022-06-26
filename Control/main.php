<?php
include_once "../Utility/defaultPath.php";
include_once $GLOBALS['defaultPath']."/Utility/autoload.php";
include_once $GLOBALS['defaultPath']."/Foundation/FDbH.php";

$user=new EUser('robertodistefano26@gmail.com','username','pasword','Organizer');
FDbH::store($user);
$e=new EEvent("Internazionali D'Italia","L'Aquila",$user,true);
FDbH::store($e);
$e->addCompetition(new ECompetition('5000m a punti',new DateTime(),'M','Pattinaggio',new EDistance(5000)));

//$a=new EAthlete('r','d',new DateTime(),false);
//FDbH::deleteFile('prova','r0');
//FDbH::storeFile('System/HomeImg',"INTERNAZIONALI D'ITALIA",'C:\Users\rober\OneDrive\Pictures\Pattinaggio.png','png');
//$blob=FDbH::loadFile('prova','r0',0.5,false);
//FFile::write($blob);
//FFile::delete();
