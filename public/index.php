<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$controllerFile = "../app/controllers/" . ucfirst($controller) . "Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $className = ucfirst($controller) . "Controller";
    $obj = new $className();

    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Ação '$action' não encontrada.";
    }
} else {
    echo "Controller '$controller' não encontrado.";
}
