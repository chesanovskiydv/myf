<?php
return array(
	'MySQLConf' => array(
            'DB_HOST' => 'localhost',
            'DB_NAME' => 'myf',
            'DB_USER' => 'root',
            'DB_PASS' => 'root',
          //  'DB_PASS' => '',
            'DB_CHARSET' => 'utf8',
    ),
	'DbSQLiteConf' => array(
            'DB_NAME' => 'db1',
    ),
	'local' => 'ru',
	'CacheTime' => 60,
	'bannedIp' => array(),
	'scripts' => array(
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
	),
	'components' => array(
		'parser' => array(
			'parser' => 'parse/Parser.php',
			'simple_html_dom' => 'parse/simple_html_dom.php',
		),
	),
	'registry' => array(
		'cache' => 'memcache',
	//	'cache' => 'dbCache',
	),
);
?>