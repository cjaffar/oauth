<?php ini_set('display_errors', 1);

require_once( dirname(__DIR__) . '/bootstrap.php');

use Swordfish\controllers\IssuesController;

$action = isset($_GET['action']) ? trim( $_GET['action'] ) : '';

$ctrl = new IssuesController;
$ctrl->display($action);
