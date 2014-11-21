<?php 
namespace App\widget;
class TextareaWidget extends \BaseWidget
{
	public function textarea($name, $value=null, $style=array())
	{
		echo "<textarea name=\"$name\" {$this->getStyleString($style)}>$value</textarea>";
	}
}
?>