<?php

function my_autoloader($className){
    $firstLetter = $className[0];
    $relativePath=$GLOBALS('defoultPath');
    switch ($firstLetter) {
        case 'E':
            include_once($relativePath.'/Entity/' . $className . '.php');
            break;

        case 'F':
            include_once($relativePath.'/Foundation/' . $className . '.php');
            break;

        case 'V':
            include_once($relativePath.'/View/' . $className . '.php');
            break;

        case 'C':
            include_once($relativePath.'/Control/' . $className . '.php');
            break;

        default :
            include_once($relativePath.'/'.$className . '.php');
            break;
    }
}

spl_autoload_register('my_autoloader');
