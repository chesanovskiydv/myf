<?php
class Model_weather extends Model
{
	public function getWeather()
	{
	$parser = new Parser;
	$weatherContent = $parser->startParse('http://www.gismeteo.ua/weather-zaporizhzhya-5093/');
	$pattern = '/<dd class=\'value m_temp c\'>(.*)<span class="meas">(.*)<\/span><\/dd>/';
	preg_match_all($pattern,$weatherContent,$data['temp']);
	$pattern = '/<dd class=\'value m_wind ms\' style=\'display:inline\'>(.*)<span class="unit">(.*)<\/span><\/dd>/';
	preg_match_all($pattern,$weatherContent,$data['m_wind']);
	$pattern = '/<dd class=\'value m_press torr\'>(.*)<span class="unit">(.*)<\/span><\/dd>/';
	preg_match_all($pattern,$weatherContent,$data['m_press']);
	$pattern = '/<div class="wicon hum" title="Влажность">(.*)<span class="unit">(.*)<span class="meas_hum_txt hidden">(.*)<\/span><\/span><\/div>/';
	preg_match_all($pattern,$weatherContent,$data['wicon']);
	$pattern = '/<dd class="value m_temp c">(.*)<span class="meas unit">(.*)<\/span><span class="unit">(.*)<\/span><\/dd>/';
	preg_match_all($pattern,$weatherContent,$data['m_temp']);
	return $data;
	}
}
?>