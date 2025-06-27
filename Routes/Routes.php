<?php

namespace CarRental\Routes;

use Exception;

function getName(?string $toCheck): string
{
    if (isset($toCheck) && $toCheck) {
        return ucfirst($toCheck) . 'Controller.php';
    }
    return 'NotFoundController.php';
}
$controllerPath = dirname(__DIR__, 1) . '\\Controller\\';
try {
    if (file_exists($controllerPath . getName($_REQUEST['controller']))) {
        $controllerName = $_REQUEST['controller'] . 'Controller';
        new $controllerName(); //TODO richtig machen noch
    }
} catch (Exception $e) {
    //TODO declaring custom exception
}
