<?php
include_once "../Utility/defaultPath.php";
include_once $GLOBALS['defaultPath']."/Utility/autoload.php";
include_once $GLOBALS['defaultPath']."/Foundation/FDbH.php";

$competition=FDbH::loadOne(22,ECompetition::class);
$user=FDbH::loadOne(12,EUser::class);
$athlete=FDbH::loadOne(23,EAthlete::class);
$competition->addRegistration($athlete,$user);
$competition->addResult($athlete,new ETime(10*60*60));
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
