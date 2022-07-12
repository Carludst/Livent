<?php
include_once "../Utility/defaultPath.php";
include_once $GLOBALS['defaultPath']."/Utility/autoload.php";
include_once $GLOBALS['defaultPath']."/Foundation/FDbH.php";

$e=FDbH::loadOne(7,EEvent::class);
$contact=new EContact('Roberto','3515787678','roberto.distefano@gmail.com');
FDbH::store($contact,$e->getId());
$password = hash("sha3-256", 'password');
$user=new EUser('carladistefano99@hotmail.it','Carla amministratore',$password,'Administrator');
FDbH::store($user);
//$e=new EEvent("Internazionali D'Italia","L'Aquila",$user,true);
//FDbH::store($e);
//$e->addCompetition(new ECompetition('5000m a punti',new DateTime(),'M','Pattinaggio',new EDistance(5000)));

//$a=new EAthlete('r','d',new DateTime(),false);
//FDbH::deleteFile('prova','r0');
//FDbH::storeFile(MappingPathFile::dirUserDefault(),MappingPathFile::nameUserMain(),'C:\Users\lenovo\Desktop\WebImg\defoultProfile.jpg','jpg');
//echo(FDbH::loadFile('System','logo'));
//$blob=FDbH::loadFile('prova','r0',0.5,false);
//FFile::write($blob);
//FFile::delete();
