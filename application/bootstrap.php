<?php
spl_autoload_register('my_autoloader');

require_once '/../core/cnf/Config.php';
require_once '/../core/mysql/MySQLConnect.php';
require_once '/../core/mysql/MySQL.php';
require_once '/../core/DbConnect.php';
require_once '/../core/sqlite/SQLiteConnect.php';
require_once '/../core/sqlite/SQLite.php';
require_once '/../core/parse/Parser.php';
require_once '/../core/parse/simple_html_dom.php';
require_once '/../core/validate/Validate.php';
require_once '/../core/cache/Cache.php';
require_once '/../core/localization/Localize.php';
require_once '/../core/Auth.php';
require_once '/../core/widgets/BaseWidget.php';
require_once '/../core/widgets/Widget.php';
require_once '/../core/Model.php';
require_once '/../core/View.php';
require_once '/../core/Controller.php';
require_once '/../core/Route.php';
//TODO: autoload?


Route::start(); // запускаем маршрутизатор

function my_autoloader($class) {
	require_once '/../core/' . $class . '.php';
}
?>