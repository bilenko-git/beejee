<?php 

Class Login extends Controller {
	public function __construct() {
		$this->model = $this->model('User');
	} 

	public function user($data) {
		if(!empty($data)) {
			$user = $this->model->user($data);

			if($user) {
			   	setcookie("login", $user['login'], time()+60*60*24*30, '/');
		      	header("Location: user"); exit(); 
			} else {
				$message = 'Incorrect Login or Password';
			}
		}

		$this->view('login/index', [
			'message' => !empty($message) ? $message : '', 
			'login' => !empty($_COOKIE['login']) ? $_COOKIE['login'] : ''
		]);
	}

	public function logout() {
		SetCookie("login", "", time() - 360000, '/'); 	
		header("Location: user"); exit(); 
	}
}
