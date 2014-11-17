<?php
require_once 'TableWidget.php';
require_once 'ErrorLabelWidget.php';
require_once 'InputWidget.php';
require_once 'ButtonWidget.php';
require_once 'LabelWidget.php';
require_once 'TextareaWidget.php';
//TODO:autoload
use App\widget as wid;
use App\widgetTable as widT;
use App\widgetBtn as widB;
class Widget 
{
	function tableWidget($tableStyle=array(),	$tableTitles=array(), $tableData=array())
	{
		$widget = new widT\TableWidget;
		$widget->table($tableStyle, $tableTitles, $tableData);
	}
	
	/*
		$errorVarName - имя поля\переменной для которой показать ошибки (name)
		$style - массив со стилями ("стиль"=>"значение")
	*/

	function errorLabelWidget($errorVarName, $ForName, $style=array())
	{
		$widget = new wid\ErrorLabelWidget;
		$widget->errorLabel($errorVarName, $ForName ,$style);
	}	
	
	/*
		$name - имя поля
		$type - тип поля(text,radio,password,checkbox etc)
		$style - массив со стилями ("стиль"=>"значение")
	*/
	function input($name, $type='text', $value=null, $style=array())
	{
		$widget = new wid\InputWidget;
		$widget->input($name, $type, $value, $style);
	}	
	
	/*
		$type - тип кнопки(button,submit,reset)
		$text - текст внутри
		$style - массив со стилями ("стиль"=>"значение")
	*/
	function button($type='button', $text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->button($type, $text, $style);
	}
	
	function submitButton($text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->button('submit', $text, $style);
	}
	
	function resetButton($text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->button('reset', $text, $style);
	}
	
	function label($inscription, $style=array())
	{
		$widget = new wid\LabelWidget;
		$widget->label($inscription, $style);
	}
	
	function  textarea($name, $value=null, $style=array())
	{
		$widget = new wid\TextareaWidget;
		$widget->textarea($name, $value, $style);
	}
}
?>