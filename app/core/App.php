<?php

Class App {
	private $controller = 'tasks';

	private $method = 'index';

	private $params  = [];

	public function __construct() {
		$url = 	self:: parseUrl($_GET['url']);

		if(file_exists('app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];

			unset($url[0]);
		}


		if(file_exists('app/controllers/' . $this->controller . '.php')) {
			require_once "app/controllers/" . $this->controller . '.php';
			$this->controller = new $this->controller;
		}

		if(!empty($url[1]) && method_exists($this->controller, $url[1])) {
			$this->method = $url[1];
			unset($url[1]);
		}
		
		$this->params = array('params' => ($url ? array_values($url) : $_POST));

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	private function parseUrl($url) {
		return explode('/', filter_var(rtrim($url), FILTER_SANITIZE_URL));
	}
}