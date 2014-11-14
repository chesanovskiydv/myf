<?php
class View extends Widget
{
	/*	
	$info = array(
		currentController' - текущий контрооллер
	 	currentAction' - текущее действие
	 	)
	 */
	public $info;
	function __construct($info=null)
	{
		$this->info = $info;
	}
    //public $template_view; // здесь можно указать общий вид по умолчанию.
    //Функция отображения
    function generate($content_view, $template_view, $data = null)
    {
		/*
			$content_file — виды отображающие контент страниц;
			$template_file — общий для всех страниц шаблон;
			$data — массив, содержащий элементы контента страницы. Обычно заполняется в модели.
		*/
        /*
        if(is_array($data)) {
            // преобразует элементы массива в переменные
            extract($data);
        }
        */
        include 'application/views/'.$template_view;
    }
	//Функция для подключения js скриптов
	function jsScripts($packageName=null)
	{
		foreach(Config::getRegisterJsScripts($packageName) as $val)
		{
			echo '<script type="text/javascript" src="../../js/'.$val.'"></script>'."\n";
		}
		return $this;
		
	}
	//Функция для подключения css скриптов
	function cssScripts($packageName=null)
	{
		foreach(Config::getRegisterCssScripts($packageName) as $val)
		{
			echo '<link rel="stylesheet" type="text/css" href="../../css/'.$val.'" />'."\n";
		}
		return $this;
	}
}
?>