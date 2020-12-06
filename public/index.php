<?php ini_set('display_errors', 1);

require_once( dirname(__DIR__) . '/bootstrap.php');

$ctrl = new HomeController;
$ctrl->displayPage();



