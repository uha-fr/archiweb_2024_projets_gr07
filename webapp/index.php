<?php
define('DS',DIRECTORY_SEPARATOR); 
define('ROOT', dirname(__FILE__));
define('CLASSDIR', ROOT.DS.'src');
define('CONTROLLERDIR', CLASSDIR.DS.'controllers');
define('MODELDIR', CLASSDIR.DS.'models');
define('VIEWRDIR', CLASSDIR.DS.'views');

require CLASSDIR.DS.'Router.php';


// $r = new Router();
// $r->manageRequest();