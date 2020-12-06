<?php 

// ini_set('display_errors', 1);
require_once( dirname(__DIR__) . '/bootstrap.php');

if(isset($_GET['error_description'])) :

	$_SESSION['git_error'] = $_GET['error_description'];

elseif(isset($_GET['code'])) :

	$_SESSION['git_token'] = $_GET['code'];

endif;

redirect('/');