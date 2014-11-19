<?php
//Класс для работы с БД MySQL
class SQLite extends SQLiteConnect
{

	private static $_loader;
	
    /*SQL select - на вход массив:
		array (
            'columns' => "*", //столбцы
			'table' => 'test'  //таблица
			'nameParam' => 'login, password',
            'valParam' => array($login, $password),
			'sign' => "=",
		);  
    */
	public function sqlSelect($array)
	{
		$columns = "*";
		$sign = "=";
		extract($array); 
		$query = "SELECT ".$columns." FROM ".$table;
        if(isset($nameParam,$valParam))
           {
		   	   if(is_array($valParam))
			   {
					foreach($valParam as &$val)
					{
						$val = "\"".$val."\"";
					}
					$valParam = implode(',', $valParam);
			   }

			$query .= " WHERE (".$nameParam.") ".$sign." (".$valParam.")";   
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
		array (
			'table' => 'test', //таблица
            'columns' => "name,str", //название стобцов через запятую
            'values' => array('qw4', 'asd4'), //занчения столбцов в ковычках через запятую
		); 
    */
    public function sqlInsert($array)
    {
        extract($array);
		if(is_array($values))
		{
			foreach($values as &$val)
			{
				$val = "\"".$val."\"";
			}
			$values = implode(',', $values);
		}
		else
		{
			$values = "\"".$values."\"";
		}
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
    public function sqlUpdate($array)
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
    public function sqlDelete($array)
    {
        extract($array);
        $query = "DELETE FROM ".$table."  WHERE ".$whereParam."= '".$whereVal."'";
        return $this->db->query($query) ? true : false;
        //Возвращает true при удачном завершении операции и false при не удачном
    }
	
	public static function init()
	{
		if (self::$_loader == NULL) {
			self::$_loader = new self();
		}
		return self::$_loader;
	}
    
}

?>