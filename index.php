<?php
require_once('connection.php');
require_once('vendor/autoload.php');

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'listWorks';
    }
} else {
    $controller = 'works';
    $action = 'listWorks';
}

require_once('routes.php');
?>