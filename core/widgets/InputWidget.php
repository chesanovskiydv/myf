<?php 
class InputWidget extends BaseWidget
{
	public function input($name, $type='text', $value=null, $style=array())
	{
		?>
		<input <?=$this->getStyleString($style); ?>type="<?=$type; ?>" name="<?=$name; ?>"  <?php if(isset($value)){ ?>value="<?=$value; ?>"<?php } ?>>
		<?php
	}
}
?>