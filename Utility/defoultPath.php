<?php
$projectName='Livent';



global $defoultPath;
preg_match('/^(.*'.$projectName.')/',__DIR__,$array);
$defoultPath=$array[0];
