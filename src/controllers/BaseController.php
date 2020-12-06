<?php

class BaseController {

	protected $action = null;

	public function __construct() {
		
		$this->action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

	}
}