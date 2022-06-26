<?php
$projectName='Livent';


global $webReference;
global $defaultPath;
preg_match('/^(.*'.$projectName.')/',__DIR__,$array);
$defaultPath=$array[0];
$webReference='/'.$projectName;
