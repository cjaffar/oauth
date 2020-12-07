<?php session_start();

require_once( dirname(__FILE__) . '/vendor/autoload.php' );

///to be refactored into PSR7 with composer
require_once( dirname(__FILE__) . '/src/controllers/HomeController.php' );


define('SETTINGS_PATH', dirname(__FILE__) . '/settings.json');
define('VIEWS_PATH', dirname(__FILE__) . '/resources/views/');

$settings = json_decode( file_get_contents(SETTINGS_PATH), true);

define('AUTHORIZE_URL', isset($settings['AUTHORIZE_URL']) ? $settings['AUTHORIZE_URL'] : '' );
define('TOKEN_URL', isset($settings['TOKEN_URL']) ? $settings['TOKEN_URL'] : '' );

define('ENDPOINT_BASEURL', isset($settings['ENDPOINT_BASEURL']) ? $settings['ENDPOINT_BASEURL'] : '' );

define('OAUTH2_CLIENT_ID', isset($settings['OAUTH2_CLIENT_ID']) ? $settings['OAUTH2_CLIENT_ID'] : '' );
define('OAUTH2_CLIENT_SECRET', isset($settings['OAUTH2_CLIENT_SECRET']) ? $settings['OAUTH2_CLIENT_SECRET'] : '' );




/**
*
* This is bad. Normally, it should be in a helper, Facade, etc.
*/
function redirect($path = '/') {

	header('Location: ' . $path);
	exit;

}