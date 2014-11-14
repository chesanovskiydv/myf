<?php
class Model_Test extends Model
{
    function validationRules()
	{
		return array(
			'login1'=>array('compare=test12', 'isInt'),
		);
	}
	
	public function get_sql_data()
	{	
		//$query='SELECT * FROM test';
		//$query='SELECT * FROM test WHERE id =2';
        $query_select_array = array (
            'columns' => "*",
            'table' => 'test'
        );  
        $data = $this->sqlSelect($query_select_array);
        $query_insert_array = array (
            'table' => 'test',
            'columns' => "name,str",
            'values' => "'qw4', 'asd5'",
        ); 
        $this->sqlInsert($query_insert_array);
        $query_update_array = array (
            'table' => 'test',
            'setParam' => 'name',
            'setVal' => 'oloq1',
            'whereParam' => 'str',
            'whereVal' => 'asd4',
        );
        $this->sqlUpdate($query_update_array);
        $query_delete_array = array (
            'table' => 'test',
            'whereParam' => 'str',
            'whereVal' => '3',
        );
        $this->sqlDelete($query_delete_array);
		return array('return_data'=>$data);
	}
}
?>