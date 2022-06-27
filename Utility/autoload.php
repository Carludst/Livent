<?php

function my_autoloader($className){
    $firstLetter = $className[0];
    $relativePath=$GLOBALS['defaultPath'];

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
            if($className=='Smarty')include_once($GLOBALS['defaultPath'].'/smarty-4.1.1/libs/Smarty.class.php');
            elseif(file_exists($relativePath.'/'.$className . '.php')) include_once($relativePath.'/'.$className . '.php');
            break;
    }
}

spl_autoload_register('my_autoloader');
