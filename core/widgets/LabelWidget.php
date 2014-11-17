<?php 
namespace App\widget;
class LabelWidget extends \BaseWidget
{
	public function label($inscription, $style=array())
	{
		?>
		<label <?=$this->getStyleString($style); ?>><?=$inscription ?></label>
		<?php
	}
}
?>