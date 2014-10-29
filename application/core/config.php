<?php
//Класс основных конфигураций
Class Config {
    //Параметры БД
    private static $DB_conf = array(
            'DB_HOST' => 'localhost',
            'DB_NAME' => 'myf',
            'DB_USER' => 'root',
            'DB_PASS' => 'root',
            //'DB_PASS' => '',
            'DB_CHARSET' => 'utf8',
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
}
?>