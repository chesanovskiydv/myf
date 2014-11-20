<?php 
namespace App\widget;
class ErrorLabelWidget extends \BaseWidget
{
	public function errorLabel($errorVarName, $ForName, $style=array('class'=>'control-label'))
	{
		if(\ErrorRegistry::get($errorVarName)!==null) 
		{
		?> <div class="control-group error"> <?php
			foreach(\ErrorRegistry::get($errorVarName) as $error)
			{
				?>
				<label <?=$this->getStyleString($style); if(isset($ForName)) { ?> for="<?=$ForName ?>"<?php } ?>><?php if(isset($ForName)) {  \Localize::echoT('field'); } ?> <?=$ForName ?> <?=$error ?></label>
				<?php
			}
			?> </div> <?php
		}
	}
}
?>