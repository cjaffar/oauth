<?php session_start();

define('OAUTH2_CLIENT_ID', '9842fa9325a317c39003');
define('OAUTH2_CLIENT_SECRET', '4687d07e489af18ce294437503a829e853cc9c90');

define('APP_NAME','TESTER sf APP');

$authorizeURL = 'https://github.com/login/oauth/authorize';
$tokenURL = 'https://github.com/login/oauth/access_token';
$apiURLBase = 'https://api.github.com';

  $params = [
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . '/callback.php',
    'scope' => 'user',
    // 'state' => $_SESSION['state']
  ];