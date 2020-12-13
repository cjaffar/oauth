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
	public function performPost(String $url, array $post, array $headers = [], bool $withAuth = null): array {

		$result = ['error' => false ];
		$headers = [];

		try {

			if(!isset($_SESSION['git_token'])) {
				throw new \Exception('Oops, invalid or expired session. Please re-auth.');
			}

			if($withAuth) {
				$headers[] = "Authorization: token {$_SESSION['git_token']}";
				$headers[] = "Accept: application/vnd.github.v3+json";
			}

			$response = Request::post($url)
				// ->sendsJson()
				->body( $post );

			if($headers) {
				$response = $response->addHeaders( $headers );
			}

			$response = $response->send();

			$result['content'] = $response->body;
			var_dump($headers);
			var_dump($url);

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
