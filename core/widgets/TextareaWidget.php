<?php 
class TextareaWidget extends BaseWidget
{
	public function textarea($name, $value=null, $style=array())
	{
		?>
			 <textarea <?=$this->getStyleString($style); ?> name="<?=$name; ?>"><?=$value; ?></textarea>
		<?php
	}
}
?>