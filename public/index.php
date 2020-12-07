<?php ini_set('display_errors', 1);

require_once( dirname(__DIR__) . '/bootstrap.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

$ctrl = new \Swordfish\controllers\HomeController;
$ctrl->setAction($action);
$ctrl->displayPage();



