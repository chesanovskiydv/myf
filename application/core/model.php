<?php
class Model extends DB
{
    //Массив с данными
    public $data = array();
    //set для $data
    public function set_data($array,$push=false)
    {
        $push ? array_push($this->data, $array) : $this->data = $array;
    }
    //get для $data
    public function get_data()
    {
        return $this->data;
    }
    
    //Перенаправление на страницу
    public static function redirect($controller_action)
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host.$controller_action);
    }
}
?>