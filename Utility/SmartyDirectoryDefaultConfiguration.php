<?php
$defoultDirReference='/Livent/SmartyTemplate';
$tamplateDir=$GLOBALS['defaultPath'].'/SmartyTemplate/Template';
$compileDir=$GLOBALS['defaultPath'].'/SmartyTemplate/Compile';

View::setDir($tamplateDir,$compileDir,$defoultDirReference);