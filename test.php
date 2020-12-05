<?php 


session_start();

ini_set('display_errors', 1);

define('OAUTH2_CLIENT_ID', '923598fc7612cb705b79');//'9842fa9325a317c39003');
define('OAUTH2_CLIENT_SECRET', 'c19ffdd827d249e1e34287e840a96f2f709a01b5'); //'4687d07e489af18ce294437503a829e853cc9c90');

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

  print_r($params);

  print($authorizeURL);

#  header('Location: ' . $authorizeURL . '?' . http_build_query($params));
#  exit('HELLO WORLD');