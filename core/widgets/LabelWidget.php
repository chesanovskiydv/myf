<?php 
namespace App\widget;
class LabelWidget extends \BaseWidget
{
	public function bootstrapLabel($text, $style=array())
	{
		$style['class'] = isset($style['class']) ? $style['class'].' control-label' : 'control-label';
		echo "<label {$this->getStyleString($style)}>$text</label>";
	}

	public function label($text, $style=array())
	{
		echo "<label {$this->getStyleString($style)}>$text</label>";
	}
}