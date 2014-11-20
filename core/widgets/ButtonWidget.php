<?php 
namespace App\widgetBtn;
class ButtonWidget extends \BaseWidget
{
	public function button($type='button', $text="", $style=array('class'=>'btn'))
	{
		?>
		<button type="<?=$type; ?>" <?=$this->getStyleString($style); ?>><?=$text; ?></button>
		<?php
	}
}
?>