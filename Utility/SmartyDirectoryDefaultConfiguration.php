<?php
$graphicDirReference='/Livent/SmartyTemplate';
$tamplateDir=$GLOBALS['defaultPath'].'/SmartyTemplate/Template';
$compileDir=$GLOBALS['defaultPath'].'/SmartyTemplate/Compile';
$logoImg=FDbH::loadFile('System','logo');

View::setDir($tamplateDir,$compileDir,$graphicDirReference,$logoImg);