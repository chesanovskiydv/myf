<?php
class Model_Test extends Model
{
    
	public function get_sql_data()
	{	
		//$query='SELECT * FROM test';
		//$query='SELECT * FROM test WHERE id =2';
        $query_select_array = array (
            'columns' => "*",
            'table' => 'test'
        );  
        $data = $this->sql_select($query_select_array);
        $query_insert_array = array (
            'table' => 'test',
            'columns' => "name,str",
            'values' => "'qw4', 'asd5'",
        ); 
        $this->sql_insert($query_insert_array);
        $query_update_array = array (
            'table' => 'test',
            'setParam' => 'name',
            'setVal' => 'oloq1',
            'whereParam' => 'str',
            'whereVal' => 'asd4',
        );
        $this->sql_update($query_update_array);
        $query_delete_array = array (
            'table' => 'test',
            'whereParam' => 'str',
            'whereVal' => '3',
        );
        $this->sql_delete($query_delete_array);
        
		return array('return_data'=>$data);
	}
}
?>