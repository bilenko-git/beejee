<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

	public function user($data = '') {
		if(!empty($data)) {
			$login = $data['login'];
			$password = md5($data['password']);

			$user = User::where('login', $login)
					->where('password', $password)
					->get();

			return !empty($user[0]) ? $user[0] : '';
		}
	}
}