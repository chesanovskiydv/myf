<?php
//Класс для работы с БД MySQL
class DB extends DB_Connect{

	// Конструктор
	public function __construct($dbo=NULL)
	{
		parent::__construct($dbo);
	}
	
    /*SQL select - на вход массив:
     *   array (
     *       'columns' => "*", //столбцы
     *        'table' => 'test'  //таблица
     *   );  
     */
	public function sql_select($array)
	{
		$columns = "*";
		extract($array); 
		$query = "SELECT ".$columns." FROM ".$table;
        if(isset($nameParam) && isset($valParam))
           {
            $query .= " WHERE (".$nameParam.") = (".$valParam.")";   
           }
		$res = $this->db->query($query);
		$count=0;
		while ($row = $res->fetch(PDO::FETCH_ASSOC))
		{
			// $row - ассоциативный массив значений, ключи - названия столбцов
			foreach($row as $key=>$val)
			{
				$result[$count][$key]=$val;
			}
			$count++;
		}
        return isset($result) ? $result : NULL;
        //возвращает массив вида $array[номер результата][название столбца]
	}
    
    /* SQL INSERT - на вход массив:
     *   array (
     *       'table' => 'test', //таблица
     *       'columns' => "name,str", //название стобцов через запятую
     *       'values' => "'qw4', 'asd4'", //занчения столбцов в ковычках через запятую
     *   ); 
     */
    public function sql_insert($array)
    {
        extract($array);
        $query = "insert into ".$table."(".$columns.") values (".$values.")";
        return $this->db->query($query) ? true : false;
        //Возвращает true при удачном завершении операции и false при не удачном
    }
    
    /* SQL UPDATE - на вход массив:
     *  $array = array (
     *       'table' => 'test', //таблица
     *       'setParam' => 'name', //Имя параметра который апдейтим
     *      'setVal' => 'oloq1', //значение параметра который апдейтим
      *      'whereParam' => 'str', //имя перематра в суловии
      *     'whereVal' => 'asd4', //значение параметра в условии
      * );
      */
    public function sql_update($array)
    {
        extract($array);
        $query = "UPDATE ".$table." SET ".$setParam." = '".$setVal."' where ".$whereParam."= '".$whereVal."'";
        return $this->db->query($query) ? true : false;
        //Возвращает true при удачном завершении операции и false при не удачном
    }
    
    /*  SQL DELETE -на вход массив:
     *  $query_delete_array = array (
     *       'table' => 'test',  //название таблицы
     *       'whereParam' => 'str', //имя параметра в условии
     *       'whereVal' => '3', //значения параметра в условии
     *   );
     */
    public function sql_delete($array)
    {
        extract($array);
        $query = "DELETE FROM ".$table."  WHERE ".$whereParam."= '".$whereVal."'";
        return $this->db->query($query) ? true : false;
        //Возвращает true при удачном завершении операции и false при не удачном
    }
    
}

?>