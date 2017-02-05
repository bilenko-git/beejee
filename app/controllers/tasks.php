<?php 

Class Tasks extends Controller {

	public function __construct() {
		$this->model = $this->model('Task');
	} 

	public function index($data = '') {
    	$sortParams = array('0' => 'id', '1' => 'desc');
		if(!empty($_GET['sort'])) {
			$sortParams = explode('_', $_GET['sort']);
		}

		$tasks = $this->model->getTask($sortParams[0], $sortParams[1]);

		$editTask = array();
		if(!empty($_GET['editTask'])) {
			foreach ($tasks as $key => $task) {
				if($task['id'] == $_GET['editTask']) {
					$editTask = $task;	
				}
			}
		}

		$this->view('tasks/index', ['data' => $tasks, 'editTask' => $editTask, 'sort' => $sortParams]);
	}

	public function addTask($data = '') {
		$typeFile = array('image/png', 'image/gif', 'image/jpeg');

		if(!empty($_FILES['img']['type']) && in_array($_FILES['img']['type'], $typeFile)) {
			$data['img'] = $this->resize($_FILES['img']);
		}
		
		if(!empty($data['user'])) {
			$this->model->addTask($data);
		}

		header("Location: index"); exit();
	}

	public function editTask($data = '') {
		if(!empty($data['user'])) {
			$this->model->editTask($data);
		}

		header("Location: index"); exit();
	}

	private function resize($file, $rotate = null, $quality = null) {
		$tmp_path = '../public/img/';
		$width_max_size = 320;
		$height_max_size = 240;

		if ($quality == null) {
			$quality = 75;
		}

		if ($file['type'] == 'image/jpeg') {
			$source = imagecreatefromjpeg($file['tmp_name']);
		} elseif ($file['type'] == 'image/png') {
			$source = imagecreatefrompng($file['tmp_name']);
		} elseif ($file['type'] == 'image/gif') {
			$source = imagecreatefromgif($file['tmp_name']);
		}

		if ($rotate != null) {
			$src = imagerotate($source, $rotate, 0);			
		} else {
			$src = $source;
		}

		$w_src = imagesx($src);
		$h_src = imagesy($src);

		if ($w_src > $width_max_size) {
			$w_dest = round( $w_src / ($w_src / $width_max_size) );
			$h_dest = round( $h_src / ($h_src / $height_max_size) );

			$dest = imagecreatetruecolor($w_dest, $h_dest);

			imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

			imagejpeg($dest, $tmp_path . $file['name'], $quality);
			imagedestroy($dest);
			imagedestroy($src);

			return $file['name'];
		}
	}
}