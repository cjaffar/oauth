<?php require_once( dirname(__FILE__) . '/BaseController.php' );

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
			unset($_SESSION['git_error']);
		}

		if(isset($_SESSION['git_token'])) {
			$data['authorized'] =  true;
			$data['page_label'] = 'You have been successfully authorized to use this App.';
			unset($_SESSION['git_error']);
		}

		foreach($data as $k => $v) {
			$$k = $v;
		}

		$page = include( VIEWS_PATH . 'home.php' );
		echo $page;
	}

	public function displayPage() {


		switch($this->action) :

			case 'auth' :
				$method = $this->do_auth();
				break;

			default :

				$method = $this->index();

		endswitch;

		return $method;

	}

	public function do_auth() {
	  
	  $params = [
	    'client_id' => OAUTH2_CLIENT_ID,
	    'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . '/callback.php',
	    'scope' => 'user',
	    // 'state' => $_SESSION['state']
	  ];

	 header('Location: ' . AUTHORIZE_URL . '?' . http_build_query($params));
	 exit;
	}

}