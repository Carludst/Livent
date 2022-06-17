<?php
include_once "../Utility/autoload.php";
include_once "../Foundation/FDbH.php";

//$a=new EAthlete('r','d',new DateTime(),false);
FDbH::deleteFile('prova','r0');
FDbH::storeFile('prova','r0','C:\Users\rober\OneDrive\Pictures\Luna.jpg','JPEG',2);
$blob=FDbH::loadFile('prova','r0',0.5,false);
//FFile::write($blob);
//FFile::delete();