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

			if($withAuth) {

				if(!isset($_SESSION['git_token'])) {
					throw new \Exception('Oops, invalid or expired session. Please re-auth.');
				}
				
				$headers[] = "Authorization: token {$_SESSION['git_token']}";
				$headers[] = "Accept: application/vnd.github.v3+json, application/vnd.github.machine-man-preview";
				$headers[] = "User-Agent: ". GITHUB_REPO_NAME;

$headers['accept'] =  'application/vnd.github.v3+json, application/vnd.github.machine-man-preview';
//$post = array_merge($post, $headers);

			}

			$response = Request::post($url)
				->withoutStrictSSL()
				->sendsJson()
				->body( $post );

			if($headers) {
				$response = $response->addHeaders( $headers );
			}

			$response = $response->send();
d($response);
			$result['content'] = $response->body;

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
