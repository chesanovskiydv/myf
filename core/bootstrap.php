<?php
spl_autoload_register('my_autoloader');

//require_once 'config/Config.php';
require_once '/core/config/Config.php';
require_once '/core/localization/Localize.php';
require_once '/core/db/DbConnect.php';
require_once '/core/db/mysql/MySQLConnect.php';
require_once '/core/db/mysql/MySQL.php';
require_once '/core/db/sqlite/SQLiteConnect.php';
require_once '/core/db/sqlite/SQLite.php';
require_once '/../application/parse/Parser.php';
require_once '/../application/parse/simple_html_dom.php';
require_once '/core/validate/Validate.php';
require_once '/core/validate/ValidateAssistant.php';
require_once '/core/cache/iCache.php';
require_once '/core/cache/dbcache/DbCache.php';
require_once '/core/cache/memcache/MemcacheConnect.php';
require_once '/core/cache/memcache/MemcacheSupport.php';
require_once '/core/cache/Cache.php';
require_once '/core/auth/Auth.php';
require_once '/core/widgets/BaseWidget.php';
require_once '/core/widgets/Widget.php';
require_once '/core/Model.php';
require_once '/core/View.php';
require_once '/core/BaseController.php';
require_once '/core/Controller.php';
require_once '/core/Route.php';
//TODO: autoload?


Route::start(); // запускаем маршрутизатор

function my_autoloader($class) {
	require_once '/core/' . $class . '.php';
}
?>