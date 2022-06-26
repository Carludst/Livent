<?php
$projectName='Livent';



global $defaultPath;
preg_match('/^(.*'.$projectName.')/',__DIR__,$array);
$defaultPath=$array[0];
