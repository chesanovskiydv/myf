<?php 
class ButtonWidget extends BaseWidget
{
	public function button($type='button', $text="", $style=array())
	{
		?>
		<button type="<?=$type; ?>" <?=$this->getStyleString($style); ?>><?=$text; ?></button>
		<?php
	}
}
?>