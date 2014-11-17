<?php
//Класс основных конфигураций
Class Config {
    //Параметры MySQL
    private static $MySQLConf = array(
            'DB_HOST' => 'localhost',
            'DB_NAME' => 'myf',
            'DB_USER' => 'root',
          //  'DB_PASS' => 'root',
            'DB_PASS' => '',
            'DB_CHARSET' => 'utf8',
    );
	
	private static $DB_SQLite_conf = array(
            'DB_NAME' => 'db1',
    );
	
	private static $local = 'en';
	
	private static $CacheTime = 60;
	
	private static $bannedIp = array();
	//js и css файлы
	private static $scripts = array(
	//	'js' => array('main.js'),
	//	'css' => array('auth.css','topmenu.css', 'style.css'),
		'css' => array('style.css'),
		'packages' => array(
			'comments' => array(
				'js' => array(),
				'css' =>  array('comments.css','comments_view.css'),
			),
			'auth' => array(
				'css' => array('auth.css'),
			),
			'slider' => array(
				'js'=> array('slides.js','myslider.js'),
				'css' => array('slyder_styles.css'),
			),
			'jquery'=> array(
				'js'=> array('jquery/jquery-2.1.1.min.js'),
			),
			'bootstrap'=> array(
				'css'=>array('bootstrap/bootstrap.css','bootstrap/bootstrap.min.css'),
			),
			'erasure'=> array(
				'css'=>array('styleErasure.css'),
			),
		)		
	);
	
    //Получение данных про соединение с БД
    public static function getMySQLConf($config=null){
        if(isset($config))
        {
            if(isset(self::$MySQLConf[$config]))
            {
                return self::$MySQLConf[$config];
            }
             else
            {
                return false;
             }
        }
        else
        {
            return self::$MySQLConf;
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
	
	public static function getLocal()
	{
		return self::$local;
	}
	
	public static function getCacheTime()
	{
		return self::$CacheTime;
	}
	
	public static function getBannedIp()
	{
		return self::$bannedIp;
	}
	
	public static function getSQLiteconf($config=null)
	{
		 if(isset($config))
        {
            if(isset(self::$DB_SQLite_conf[$config]))
            {
                return self::$DB_SQLite_conf[$config];
            }
             else
            {
                return false;
             }
        }
        else
        {
            return self::$DB_SQLite_conf;
        }
	}
}
?>