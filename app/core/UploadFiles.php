<?

class UploadFiles {

    public function ParseLinks($file, $element = '') {
        if(!empty($file)) {
            foreach($file as $url => $type) {
                if($type == 'js') {
                    $element .= '<script src="../../'.$url .'" type="text/javascript"></script>'."\n";
                } else {
                    $element .= '<link href="../../'.$url.'" rel="stylesheet" type="text/css">'."\n";
                }                
            }

            return $element;  
        }
    }
}
