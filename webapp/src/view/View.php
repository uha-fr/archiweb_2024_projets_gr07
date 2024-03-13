<?php
namespace webapp\view; 
use webapp\model\AccountModel;
abstract class AbstractView {
 
    protected function loadViewContent($ressource, $file, $content='',$user=null,$calories=null,$numberOfMeals=0) {
        $ut = AccountModel::getUserType() ;
        $userType = isset($ut) ? $ut:'guest'; 
        ob_start();
        require VIEWDIR . DS . 'template.php';
        $out = ob_get_clean();
        return $out;
    }
}

?>
