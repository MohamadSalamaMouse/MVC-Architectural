<?php
define("DS", DIRECTORY_SEPARATOR);
define("Root", dirname(__DIR__));
define('app', Root . DS . 'app');
define('controllers', app . DS . 'controllers' . DS);
define('models', app . DS . 'models' . DS);
define('views', app . DS . 'views' . DS);
define('core', app . DS . 'core' . DS);
define('vendor', Root . DS . 'vendor' . DS);
define('URL', 'http://localhost/mvcapp/public');
define('DNS', 'mysql:host=localhost;dbname=cms');
define('DB_USER', 'root');
define('DB_PASS', '');
require_once vendor . "autoload.php";

//require core . "app.php";
$object_app = new mvc\core\app;
//$aa = new mvc\models\userModel();
//$a = ['name' => 'mohamed_mousa'];
//$aa->login($a);
//$aa->up($a, 3);
