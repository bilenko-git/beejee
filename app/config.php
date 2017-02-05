<?
require_once 'core/UploadFiles.php';

class Files extends UploadFiles {

   	public function links() {
     	$file = [
	    	'app/public/css/bootstrap/css/bootstrap.css' => 'css',
	        'app/public/css/style.css' => 'css',
	       	'app/public/js/lib/jquery.min.js' => 'js',
	    	'app/public/js/index.js' => 'js'
    	];

    	return $this->ParseLinks($file);
    }
}
