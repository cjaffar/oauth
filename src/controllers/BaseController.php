<?php namespace Swordfish\controllers;

use Httpful\Request;

class BaseController {

	protected $action = null;

	protected $params = [];

	public function __construct() {	}

	public function setAction(String $action) {
		$this->action = $action;
	}

	public function isAuthorized() {
		return (isset($_SESSION['git_token'])) && !empty($_SESSION['git_token']);
	}

	/**
	*
	*/
	public function performPost(String $url, array $post): array {

		$result = ['error' => false ];
		try {

			$response = Request::post($url)
				->sendsJson()
				->body( $post )
				->send();

			$result['content'] = $response->getBody();

		} catch(\Exception $ex) {

			$result['error'] = $ex->getMessage();

		}
		
		return $result;
	}

	public function addParam(String $key, String $value): void {
		$this->params[$key] = $value;
	}

	public function getParam($key) {
		return isset($this->params[$key]) ? $this->params[$key] : '';
	}
}