<?php
//print_r(get_class_methods('Validate'));
echo "qq";
//$cache = new Cache(new DbCache);
//Registry::set('cache', new Cache(new DbCache));

$cache = Registry::get('cache');

//$cache = new Cache(new MemcacheSupport);
//$cache->setCache('var3','testvar1', 30);
echo "\n";
echo $cache->getCache('var3');
echo "\n";
/*
$DbCache = new DbCache;
$DbCache->setCache('var1','testvar1', 30);
echo "\n";
echo $DbCache->getCache('var1');
echo "\n";
*/
/*DbCache::setCache('var1','testvar2', '100');
echo "\n";
echo DbCache::getCache('var1');
echo "\n";
*/
?>
<select><option>Выберите из списка</option>
<option>Option</option>
<option>Textarea</option>
<option>Label</option>
<option>Fieldset</option><
<option>Legend</option></select>
<form method="post" action="" class="login">
		<?php $this->input('login1','text', isset($_POST['login1']) ? $_POST['login1'] : null,array('id'=>'login')); ?>
		<?php $this->submitButton('Subbmit', array('class'=>'login-button1', 'id'=>'test')); ?>
		<?php $this->errorLabelWidget('login1',array('for'=>'login1')); ?>
</form>
<?php 
echo $_SERVER['QUERY_STRING']."<br>";
echo $_SERVER['REMOTE_ADDR']."<br>";

//echo isset($_GET['a'], $_GET['b']) ? $_GET['a']."  ".$_GET['b'] : "no";
function get_all_ip() {
  $ip_pattern="#(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)#";
  $ret="";
  foreach ($_SERVER as $k => $v) {
    if (substr($k,0,5)=="HTTP_" AND preg_match($ip_pattern,$v)) $ret.=$k.": ".$v."\n";
  }
  return $ret;
}
$k=get_all_ip();
echo $k;
echo "<br>";
echo "<br>";
//$html = file_get_html('https://ru.wikipedia.org/wiki/CURL');
$html = file_get_html('http://www.google.com/');

foreach($html->find('a') as $element)
echo $element->href .' ('. $element->innertext. ')<br>';

$html->clear();
unset($html);

echo "<br>";
echo "<br>";


echo "CURL<br>";
//$html = get_html('https://ru.wikipedia.org/wiki/CURL');
$html = get_html('http://www.google.com/','/proxy/teeee1.txt');

foreach($html->find('a') as $element)
echo $element->href .' ('. $element->innertext. ')<br>';

$html->clear();
unset($html);

?>