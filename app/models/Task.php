<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Task extends Eloquent {
 	protected $table = 'tasks';
  	public $timestamps = false;

	public function addTask($data) {
		if(!empty($data)) {
			Task::insert($data);
		}
	}

	public function editTask($data) {
		if(!empty($data)) {
			$id = $data['id'];
			unset($data['id']);
			
			Task::where('id', $id)->update($data);
		} 
	}

	public function getTask($field, $orderBy) {
		return Task::orderBy($field, $orderBy)->get();
	}
} 