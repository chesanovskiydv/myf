<?php 
namespace App\widget;
class InputWidget extends \BaseWidget
{

	public function input($name, $type='text', $value=null, $style=array())
	{
		if(isset($value))
		{
			echo "<input name=\"$name\" type=\"$type\" {$this->getStyleString($style)} value=\"$value\">";
		}
		else
		{
			echo "<input name=\"$name\" type=\"$type\" {$this->getStyleString($style)}>";
		}
	}
	
	public function bootstrapInput($name, $type='text', $value=null, $style=array())
	{
		$style['class'] = isset($style['class']) ? $style['class'].' input-xlarge' : 'input-xlarge';
		if(isset($value))
		{
			echo "<input name=\"$name\" type=\"$type\" {$this->getStyleString($style)} value=\"$value\">";
		}
		else
		{
			echo "<input name=\"$name\" type=\"$type\" {$this->getStyleString($style)}>";
		}
	}
}
?>