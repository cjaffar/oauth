<?php 

// ini_set('display_errors', 1);
require_once( dirname(__DIR__) . '/bootstrap.php');

if(isset($_GET['error_description'])) :

	$_SESSION['git_error'] = $_GET['error_description'];

elseif(isset($_GET['code'])) :

	if(isset($_GET['state']) == $_SESSION['state']) {
		
		$ctrl = new HomeController;
		$ctrl->setAction('token');
		$ctrl->addParam('code', $_GET['code']);
		$ctrl->displayPage();

	}

	if(!isset($_SERVER['git_token'])) {
		$_SESSION['git_error'] = "Invalid git code encountered, App not Authorized.";
	}

endif;

redirect('/');