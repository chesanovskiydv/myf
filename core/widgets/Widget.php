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
	function tableWidget($tableStyle=array(),	$tableTitles=array(), $tableData=array(), $tableDataTerms=array())
	{
		$widget = new widT\TableWidget;
		$widget->table($tableStyle, $tableTitles, $tableData, $tableDataTerms);
	}
	
	function bootstrapTableWidget($tableStyle=array(),	$tableTitles=array(), $tableData=array(), $tableDataTerms=array())
	{
		$widget = new widT\TableWidget;
		$widget->bootstrapTable($tableStyle, $tableTitles, $tableData, $tableDataTerms);
	}
	
	/*
		$errorVarName - имя поля\переменной для которой показать ошибки (name)
		$style - массив со стилями ("стиль"=>"значение")
	*/

	function errorLabel($errorVarName, $ForName, $style=array())
	{
		$widget = new wid\ErrorLabelWidget;
		empty($style) ? $widget->errorLabel($errorVarName, $ForName) : $widget->errorLabel($errorVarName, $ForName ,$style);
	}	
	
	function bootstrapErrorLabel($errorVarName, $ForName, $style=array())
	{
		$widget = new wid\ErrorLabelWidget;
		empty($style) ? $widget->bootstrapErrorLabel($errorVarName, $ForName) : $widget->bootstrapErrorLabel($errorVarName, $ForName ,$style);
	}
	
	function groupErrorLabel($arrayOfErrors)
	{
		$widget = new wid\ErrorLabelWidget;
		$widget->groupErrorLabel($arrayOfErrors);
	}
	
	function bootstrapGroupErrorLabel($arrayOfErrors)
	{
		$widget = new wid\ErrorLabelWidget;
		$widget->bootstrapGroupErrorLabel($arrayOfErrors);
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
	
	function bootstrapInput($name, $type='text', $value=null, $style=array())
	{
		$widget = new wid\InputWidget;
		$widget->bootstrapInput($name, $type, $value, $style);
	}	
	
	/*
		$type - тип кнопки(button,submit,reset)
		$text - текст внутри
		$style - массив со стилями ("стиль"=>"значение")
	*/
	function button($type='button', $text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		empty($style) ? $widget->button($type, $text) : $widget->button($type, $text, $style);
	}
	
	function bootstrapButton($type='button', $text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		//empty($style) ? $widget->bootstrapButton($type, $text) : $widget->button($type, $text, $style);
		$widget->bootstrapButton($type, $text, $style);
	}
	
	function submitButton($text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->button('submit', $text, $style);
	}
	
	function bootstrapSubmitButton($text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->bootstrapButton('submit', $text, $style);
	}
	
	function resetButton($text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->button('reset', $text, $style);
	}
	
	function bootstrapResetButton($text="", $style=array())
	{
		$widget = new widB\ButtonWidget;
		$widget->bootstrapButton('reset', $text, $style);
	}
	
	function label($text, $style=array())
	{
		$widget = new wid\LabelWidget;
		$widget->label($text, $style);
	}
	
	function bootstrapLabel($text, $style=array())
	{
		$widget = new wid\LabelWidget;
		$widget->bootstrapLabel($text, $style);
	}
	
	function  textarea($name, $value=null, $style=array())
	{
		$widget = new wid\TextareaWidget;
		$widget->textarea($name, $value, $style);
	}
}
?>