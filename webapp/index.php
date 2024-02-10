<?php
namespace webapp;

require_once 'autoload.php';

use webapp\database\Database;
use webapp\model\IngredientModel;

define('DS',DIRECTORY_SEPARATOR); 
define('ROOT', dirname(__FILE__));
define('CLASSDIR', ROOT.DS.'src');
define('CONTROLLERDIR', CLASSDIR.DS.'controller');
define('MODELDIR', CLASSDIR.DS.'model');
define('VIEWDIR', CLASSDIR.DS.'view');


$db = Database::getInstance();
$db->connect();

$r = new Router();
$r->manageRequest();