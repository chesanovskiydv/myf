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
	function before_action_index()
	{
	}
	//Метод action_index — это действие, вызываемое по умолчанию, перекрывается при реализации классов потомков.
	function action_index()
	{
	}
	//Метод after_action_index — это действие, вызываемое после действия action_index, перекрывается при необходимости.
	function after_action_index()
	{
	}
}
?>