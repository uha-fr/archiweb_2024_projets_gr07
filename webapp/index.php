<?php
namespace webapp;

require_once 'autoload.php';

define('DS',DIRECTORY_SEPARATOR); 
define('ROOT', dirname(__FILE__));
define('CLASSDIR', ROOT.DS.'src');
define('CONTROLLERDIR', CLASSDIR.DS.'controller');
define('MODELDIR', CLASSDIR.DS.'model');
define('VIEWDIR', CLASSDIR.DS.'view');

require CLASSDIR.DS.'Router.php';

// Test of a connection to the database
// use webapp\model\Model;
// $m = new Model();
// $m->test_DB();

$r = new Router();
$r->manageRequest();