<?php
require_once 'config.php';

use \Controller\MainController;

$controller = new MainController();
if (empty($_POST)) {
    $controller->index();
} else {
    $controller->create();
}
