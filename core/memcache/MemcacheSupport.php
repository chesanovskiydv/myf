<?php 
include 'MemcacheConnect.php';
class  MemcacheSupport extends MemcacheConnect {

	public function __construct($memcache_obj=NULL)
	{
		parent::__construct($memcache_obj);
	}
	
	public function getMemcacheObj()
	{
		return $this->memcache_obj;
	}
	
	public function getCache($var)
	{
		return $this->getMemcacheObj()->get($var);
	}
	
	public static function init($className=__CLASS__)
	{
		return parent::init($className);
	}
}
//$a = new MemcacheSupport;
$a=MemcacheSupport::init();
$var_key = $a->getCache('our_var');
//$var_key = $a->getMemcacheObj()->get('our_var');
 
    if(!empty($var_key))
    {
        //Если объект закэширован, выводим его значение
        echo $var_key;
    }
 
    else
    {
        //Если в кэше нет объекта с ключом our_var, создадим его
        //Объект our_var будет храниться 5 секунд и не будет сжат
        $a->getMemcacheObj()->set('our_var', date('G:i:s'), false, 5);
 
        //Выведем закэшированные данные
        echo $a->getCache('our_var');
    }
?>