<?php
class BaseController
{

	public $model;
	public $view;

	//Конструктор
	function __construct($info)
	{
		$this->view = new View($info);
	}

	//Метод before_action_index — это действие, вызываемое перед действием action_index, перекрывается при необходимости.
	function beforeActionIndex()
	{
	}
	//Метод action_index — это действие, вызываемое по умолчанию, перекрывается при реализации классов потомков.
	function actionIndex()
	{
	}
	//Метод after_action_index — это действие, вызываемое после действия action_index, перекрывается при необходимости.
	function afterActionIndex()
	{
	}
}
?>