<?php
$controllers = array(
    'works' => ['listWorks', 'listJsonWorks','createWorks', 'addWorks', 'editWorks', 'updateWorks', 'deleteWorks', 'error']
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'Works';
    $action = 'error';
}

include_once("controllers/" . $controller . "Controller.php");

$klass = str_replace('_', '', ucwords($controller, '_')) . "Controller";
$controller = new $klass;
$controller->$action();
?>