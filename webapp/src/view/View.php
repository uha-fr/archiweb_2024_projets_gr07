<?php
namespace webapp\view; 
abstract class AbstractView {
    
    protected function loadViewContent($ressource, $file, $content) {
        ob_start();
        require VIEWDIR . DS . 'template.php';
        $out = ob_get_clean();
        return $out;
    }

}

?>
