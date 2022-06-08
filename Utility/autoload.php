<?php

function my_autoloader($className){
    $firstLetter = $className[0];
    $fileName = '';
    switch ($firstLetter) {
        case 'E':
            include_once('../Entity/' . $className . '.php');
            break;

        case 'F':
            include_once('../Foundation/' . $className . '.php');
            break;

        case 'V':
            include_once('../View/' . $className . '.php');
            break;

        case 'C':
            include_once('../Controller/' . $className . '.php');
            break;

        default :
            include_once($className . '.php');
            break;
    }

    if (file_exists($fileName) && is_readable($fileName)) {
        include_once($fileName);
    }
}

spl_autoload_register('my_autoloader');
