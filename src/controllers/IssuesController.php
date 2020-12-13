<?php namespace Swordfish\controllers;

class IssuesController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function display($method) {
		switch($method) {
			case 'add' :
				return $this->add();
				break;

			default :
				return $this->listing();
				break;
		}
	}

	public function listing() {

		$url = ENDPOINT_BASEURL . 'repos/' . GITHUB_REPO_OWNER . '/' . GITHUB_REPO_NAME . '/issues';

		$params = [
			'direction' => 'desc',
			'sort' => 'updated'
		];

		$headers = [];
		$result = $this->performPost($url, $params, $headers=[],  $withAuth=true); //$headers=[], 

		var_dump($result);
	}

}