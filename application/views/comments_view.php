<table class="features-table">
	<thead>
		<tr>
			<td>№</td>
			<td class="grey">Автор</td>
			<td class="grey" nowrap>Коментарий</td>
			<td class="green">Время создания</td>
		</tr>
	</thead>


	<tbody>
	<?php 
	$tmp=1;
	foreach($data as $value) { ?>
		<tr>
			<td nowrap><?php echo $tmp ?></td>
			<td class="grey"><?php echo $value['author_id'] ?></td>
			<td class="grey"><?php echo $value['comments'] ?></td>
			<td class="green"><?php echo $value['update_time'] ?></td>
		</tr>
<?php $tmp++; } ?>
	</tbody>
</table>