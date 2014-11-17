<?php 
namespace App\widget;
class ErrorLabelWidget extends \BaseWidget
{
	public function errorLabel($errorVarName, $ForName, $style=array())//($tableStyle=array(),	$tableTitles=array(), $tableData=array())
	{
		if(isset($_SESSION['error'][$errorVarName])) //$_SESSION['error'][название переменной, ошибку которой надо вывести]
		{
			foreach($_SESSION['error'][$errorVarName] as $error)
			{
				?>
				<label <?=$this->getStyleString($style); ?> for="<?=$ForName ?>">Поле <?=$ForName ?> <?=$error ?></label>
				<?php
			}
		}
	}
}
?>