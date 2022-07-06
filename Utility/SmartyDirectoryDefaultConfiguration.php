<?php
$graphicDirReference='/Livent/SmartyTemplate';
$templateDir=$GLOBALS['defaultPath'].'/SmartyTemplate/Template';
$compileDir=$GLOBALS['defaultPath'].'/SmartyTemplate/Compile';
if(FDbH::existFile('System','logo'))$logoImg=FDbH::loadFile('System','logo',0.1);
else $logoImg='';

View::setDir($templateDir,$compileDir,$graphicDirReference,$logoImg);