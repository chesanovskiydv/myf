<?php 
class TableWidget extends BaseWidget
{
	public function table($tableStyle=array(),	$tableTitles=array(), $tableData=array())
	{
	?>
	<table <?php if(isset($tableStyle)){
		foreach($tableStyle as $key=>$value)
		{
			echo $key.'="'.$value.'" ';
		}
			}?>>
			<thead>
				<tr>
				<?php foreach($tableTitles as $key=>$value) { ?>
					<td <?php if(isset($value['style'])) {  
						foreach($value['style'] as $styleKey=>$styleVal)
						{
							echo $styleKey.'="'.$styleVal.'" ';
						}
					} ?>> <?php echo $value['title']; ?></td>
				<?php } ?>
				</tr>
			</thead>
	<tbody>
	<?php 
	if(isset($tableData[0])){
	$counter=1;
	foreach($tableData[0] as $dataKey=>$dataVal){
	?><tr> 
		<?php	foreach($tableData[1] as $dataVal2){
					?><td <?php if(isset($dataVal2['style'])){
					foreach($dataVal2['style'] as $styleKey=>$styleVal)
						{
							echo $styleKey.'="'.$styleVal.'" ';
						}
					}?>><?php echo $dataVal2['dataName']!=='№' ? $dataVal[$dataVal2['dataName']] : $counter; ?></td>
		<?php 	} 
	?></tr>
	<?php	$counter++; }} ?>
	</tbody>
	</table>
	<?php
	}
}
?>