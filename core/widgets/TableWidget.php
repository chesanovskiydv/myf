<?php
namespace App\widgetTable;
class TableWidget extends \BaseWidget
{
	public function table($tableStyle=array(),	$tableTitles=array(), $tableData=array(), $tableDataTerms=array())
	{
		echo "<table {$this->getStyleString($tableStyle)}>
		{$this->tableHeader($tableTitles)} 
		{$this->tableData($tableData,$tableDataTerms)}
		</table>";
	}
	
	public function bootstrapTable($tableStyle=array(),	$tableTitles=array(), $tableData=array(), $tableDataTerms=array())
	{
		$tableStyle['class'] = isset($tableStyle['class']) ? $tableStyle['class'].' table table-bordered' : 'table table-bordered';
		echo "<table {$this->getStyleString($tableStyle)}>
		{$this->tableHeader($tableTitles)} 
		{$this->tableData($tableData,$tableDataTerms)}
		</table>";
	}

	/*
	$data = array(
		0 => array
		(
			'id' => '1',
			'author_id' => 'login1',
			'comments' => 'ewer',
			'create_time' => '2014-10-29 10:31:38',
			'update_time' => '2014-10-29 10:32:32',
		),
	$tableDataTerms=array(
		array('dataName'=>'#'),
		array('dataName'=>'author_id',
			  'style'=>array('class'=>'grey')),
		array('dataName'=>'comments',
			  'style'=>array('class'=>'grey1')),
		array('dataName'=>'update_time',
			  'style'=>array('class'=>'green')),
	);
	*/
	private function tableData($tableData=null,$tableDataTerms=null)
	{
		if(!empty($tableData) && empty($tableDataTerms))
		{
			$tableBody = "<tbody>";
			foreach($tableData as $columnNumber=>$columnDataArray)
			{
				$tableBody .="<tr>";
				foreach($columnDataArray as $columnTitle=>$columnData)
				{
					$tableBody .="<td>$columnData</td>";
				}
				$tableBody .="</tr>";
			}
			$tableBody .= "</tbody>";
		}elseif(!empty($tableData) && !empty($tableDataTerms))
		{
			$counter = 0;
			$tableBody = "<tbody>";
			foreach($tableData as $columnNumber=>$columnDataArray)
			{
				$counter++;
				$tableBody .="<tr>";
				foreach($tableDataTerms as $termNumber=>$termData)
				{
					$tableBody .="<td ";
					if(isset($termData['style']))
					{
						$tableBody .= $this->getStyleString($termData['style']);
					}
					$tableBody .='>';
					if($termData['dataName']=='#')
					{
						$tableBody .= $counter;
					}
					else
					{
						$tableBody .= $columnDataArray[$termData['dataName']];
					}
					$tableBody .="</td>";
				}
				$tableBody .="</tr>";
			}
			$tableBody .= "</tbody>";
		}
		return $tableBody;
	}
	/*
	array(
		array('title'=>'#'),
		array('title'=>'title1', 
			  'style'=> array('class'=>'grey')),
		array('title'=>'title2', 
			  'style'=> array('class'=>'grey')),
		array('title'=>'title3', 
			  'style'=> array('class'=>'green'))
	);
	*/
	private function tableHeader($tableTitles=null)
	{
		if(!empty($tableTitles))
		{
			$tableHeader = "<thead>
			<tr>";
			foreach($tableTitles as $key=>$value)
			{
				if(isset($value['style']))
				{
					$tableHeader.= "<th {$this->getStyleString($value['style'])}>{$value['title']}</th>";
				}
				else
				{
					$tableHeader.= "<th>{$value['title']}</th>";
				}
			}
			$tableHeader.="</tr>
			</thead>";
		}
		return $tableHeader;
	}
}
?>