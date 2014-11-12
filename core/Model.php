<?php
class Model extends MySQL
{
    //Массив с данными
    public $data = array();
    //set для $data
    public function setData($array,$push=false)
    {
        $push ? array_push($this->data, $array) : $this->data = $array;
    }
    //get для $data
    public function getData()
    {
        return $this->data;
    }
}
?>