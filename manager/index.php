<?php

/*$string = '21-11-2015';
$pattern = '/([0-9]{2})-([0-9]{2}-([0-9]{4})/';
$replacement = 'Рiк $3, мiсяць $2, день $1';
echo preg_replace($pattern, $replacement, $string);
die;*/

//settings
ini_set('display_errors',1);
error_reporting(E_ERROR);

//system files
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

//connect to DB


//Router call
$router = new Router();
$router->run();