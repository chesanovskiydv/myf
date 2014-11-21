<?php 
namespace App\widgetBtn;
class ButtonWidget extends \BaseWidget
{
	public function button($type='button', $text="", $style=array())
	{
		echo "<button {$this->getStyleString($style)} type=\"$type\">$text</button>";
	}

	public function bootstrapButton($type='button', $text="", $style=array())
	{
		$style['class'] = isset($style['class']) ? $style['class'].' btn' : 'btn';
		echo "<button {$this->getStyleString($style)} type=\"$type\">$text</button>";
	}
}
?>