<?php
function my_autoloader($class) {
	require_once 'core/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

require_once 'core/parse/Parser.php';
require_once 'core/config.php';
require_once 'core/DB_connect.php';
require_once 'core/DB.php';
require_once 'core/auth.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

Route::start(); // запускаем маршрутизатор
?>