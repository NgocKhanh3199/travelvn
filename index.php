<?php
session_start();
require_once __DIR__ . "/mvc/controllers/controller.php";
if (isset($_REQUEST['controller'])) {
    $controller = $_REQUEST['controller'];
    if (file_exists("./mvc/controllers/$controller.php")) {
        $controller = $_REQUEST['controller'];
    } else {
        $controller = "chome";
    }
} else {
    $controller = "chome";
}

require_once __DIR__ . "/mvc/controllers/$controller.php";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    if (method_exists($controller, $action)) {
        $action;
    } else {
        $action = "home";
    }
} else {
    $action = "home";
}
require_once __DIR__ . "/mvc/controllers/$controller.php";
$controller = new $controller();
$controller->$action();
?>