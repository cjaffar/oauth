<?php namespace Swordfish\controllers;

class HomeController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$data = [
			'page_label' => 'You will need to authorize this App with Github in order to continue.<br />By selecting to Authorize below, you will be redirected to Github for Authentication.',
			'authorized' => false
		];

		if(isset($_SESSION['git_error'])) {
			$data['page_label'] =  $_SESSION['git_error'];
		}

		if(isset($_SESSION['git_token'])) {
			$data['authorized'] =  true;
			$data['page_label'] = 'You have been successfully authorized to use this App.';
		}

		unset($_SESSION['git_error']);

		foreach($data as $k => $v) {
			$$k = $v;
		}

		$page = include( VIEWS_PATH . 'home.php' );
		echo $page;
	}

	public function displayPage() {


		switch($this->action) :

			case 'auth' :
				$method = $this->doAuth();
				break;

			case 'token' :
				$method = $this->processToken();
				break;

			default :

				$method = $this->index();

		endswitch;

		return $method;

	}

	public function processToken() {

		$params = [
			'client_id' => OAUTH2_CLIENT_ID,
			'client_secret' => OAUTH2_CLIENT_SECRET,
			'code' => $this->getParam('code')
		];

		$resp = $this->performPost(TOKEN_URL, $params);
		if(isset($resp['access_token'])) {
			$_SESSION['git_token'] = $resp['access_token'];
			return true;
		}

		$_SESSION['git_error'] = 'Unsuccessful getting authorization from Github.';
		return false;
	}

	/**
	*
	* @see for documentation on authorizing with github.  https://docs.github.com/en/free-pro-team@latest/developers/apps/authorizing-oauth-apps#web-application-flow
	*/
	public function doAuth() {
	  
	  $state = $_SESSION['state'] = md5( uniqid() );

	  $params = [
	    'client_id' => OAUTH2_CLIENT_ID,
	    'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . '/callback.php',
	    'scope' => 'user,repo',
	    'state' => $state,
	    'allow_signup' => false
	  ];

	 header('Location: ' . AUTHORIZE_URL . '?' . http_build_query($params));
	 exit;
	}

}