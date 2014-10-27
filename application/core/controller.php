<?php
class Controller {
    
    public $model;
    public $view;
    
    //Конструктор
    function __construct()
    {
        $this->view = new View();
    }
    
	//Метод action_index — это действие, вызываемое по умолчанию, перекрывается при реализации классов потомков.
    function action_index()
    {
    }
}
?>