<center><h1>Запорожье</h1></center>
<table class="features-table">
	<thead>
		<tr>
			<td>Температура</td>
			<td class="grey" nowrap>Скорость ветра</td>
			<td class="grey" nowrap>Давление</td>
			<td class="green">Влажность воздуха</td>
			<td class="green">Температура воды</td>
		</tr>
	</thead>


	<tbody>
		<tr>
			<td nowrap><?php echo $data['temp'][0][0]; ?></td>
			<td class="grey"><?php echo $data['m_wind'][0][0]; ?></td>
			<td class="grey"><?php echo $data['m_press'][0][0]; ?></td>
			<td class="green"><?php echo $data['wicon'][0][0]; ?></td>
			<td class="green"><?php echo $data['m_temp'][0][0]; ?></td>
		</tr>
	</tbody>
</table>