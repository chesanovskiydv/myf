<?php
require_once 'TableWidget.php';

class Widget 
{
	function tableWidget($tableStyle=array(),	$tableTitles=array(), $tableData=array())
	{
		$table = new TableWidget;
		$table->table($tableStyle, $tableTitles, $tableData);
	}
}
?>