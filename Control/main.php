<?php
include_once "../Utility/defaultPath.php";
include_once $GLOBALS['defaultPath']."/Utility/autoload.php";
include_once $GLOBALS['defaultPath']."/Foundation/FDbH.php";

$user=new EUser('roberto.distefano1@student.univaq.it','roberto','password','Organizer');
FDbH::store($user);
//$e=new EEvent("Internazionali D'Italia","L'Aquila",$user,true);
//FDbH::store($e);
//$e->addCompetition(new ECompetition('5000m a punti',new DateTime(),'M','Pattinaggio',new EDistance(5000)));

//$a=new EAthlete('r','d',new DateTime(),false);
//FDbH::deleteFile('prova','r0');
//FDbH::storeFile('System','logo','C:\Users\lenovo\Downloads\MicrosoftTeams-image.png','png');
//echo(FDbH::loadFile('System','logo'));
//$blob=FDbH::loadFile('prova','r0',0.5,false);
//FFile::write($blob);
//FFile::delete();
