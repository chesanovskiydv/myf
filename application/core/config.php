<?php
//Класс основных конфигураций
Class Config {
    //Параметры БД
    private static $DB_conf = array(
            'DB_HOST' => 'localhost',
            'DB_NAME' => 'myf',
            'DB_USER' => 'root',
           // 'DB_PASS' => 'root',
            'DB_PASS' => '',
            'DB_CHARSET' => 'utf8',
    );
	//js и css файлы
	private static $scripts = array(
		'js' => array('main.js'),
		'css' => array('auth.css','topmenu.css', 'style.css'),
		'packages' => array(
			'comments' => array(
				'js' => array(),
				'css' =>  array('comments.css','comments_view.css'),
		))		
	);
    //Получение данных про соединение с БД
    public static function getDB_conf($config=null){
        if(isset($config))
        {
            if(isset(self::$DB_conf[$config]))
            {
                return self::$DB_conf[$config];
            }
             else
            {
                return false;
             }
        }
        else
        {
            return self::$DB_conf;
        }
    }
	
	public static function getRegisterJsScripts($packageName=null)
	{
		return $packageName===null ? array_unique(self::$scripts['js']) : array_unique(self::$scripts['packages'][$packageName]['js']);
	}
	
	public static function getRegisterCssScripts($packageName=null)
	{
		return $packageName===null ? array_unique(self::$scripts['css']) :  array_unique(self::$scripts['packages'][$packageName]['css']);
	}
}
?>