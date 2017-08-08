<?php
require_once "config.php";
require_once 'core/views.php';
$routes = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = "Main";
$actionName = "index";

if (!empty($routes[1])) {
    $controllerName = $routes[1];
}

if (!empty($routes[2])) {
    $actionName = $routes[2];
}

$fileNme = "controllers/" . strtolower($controllerName) . ".php";

try {
    if (file_exists($fileNme)) {
        require_once $fileNme;

        $className = ucfirst($controllerName);

        if (class_exists($className)) {
            $controller = new $className();
        } else {
            throw new Exception('file found but class not found: ' . $className);
        }

        if(method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            throw new Exception('Class exist but action not found: ' . $actionName);
        }

    } else {
        throw new Exception('file not found ' . $fileNme);
    }

} catch (Exception $e) {
    if (file_exists('debug')) {
        echo $e->getMessage();
    } else {
        require_once "errors/404.php";
    }
}