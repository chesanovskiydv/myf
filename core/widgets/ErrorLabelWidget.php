<?php 
namespace App\widget;
class ErrorLabelWidget extends \BaseWidget
{
	public function errorLabel($errorVarName, $ForName, $style=array())
	{
		
		if(\ErrorRegistry::get($errorVarName)!==null) 
		{
			$widget= new LabelWidget;
			foreach(\ErrorRegistry::get($errorVarName) as $error)
			{
				$text = isset($ForName) ? \Localize::t('field').' '.$ForName.' '.$error : $error;
				$style['for'] = $ForName;
				$widget->label($text, $style);
			}
		}
	}
	
	public function bootstrapErrorLabel($errorVarName, $ForName, $style=array())
	{

		if(\ErrorRegistry::get($errorVarName)!==null) 
		{
			$widget= new LabelWidget;
			$style['class'] = isset($style['class']) ? $style['class'].' control-label' : 'control-label';
			echo "<div class=\"control-group error\">";
			foreach(\ErrorRegistry::get($errorVarName) as $error)
			{
				$text = isset($ForName) ? \Localize::t('field').' '.$ForName.' '.$error : $error;
				$style['for'] = $ForName;
				$widget->label($text, $style);
			}
			echo "</div>";
		}
	}
	
	/*
	array(
		0 => array(
			'errorVarName' => 'error1',
			'forName' => 'forName',
		//	'style' => array('id'=>'idtest')
		),
		1 => array(
			'errorVarName' => 'error1',
			'forName' => 'forName',
		//	'style' => array('id'=>'idtest')
		),
	);
	*/
	public function groupErrorLabel($arrayOfErrors)
	{
		foreach($arrayOfErrors as $value)
		{
			$this->errorLabel($value['errorVarName'], $value['forName'], $value['style']);
		}
	}
	
	public function bootstrapGroupErrorLabel($arrayOfErrors)
	{
		foreach($arrayOfErrors as $value)
		{
			$this->bootstrapErrorLabel($value['errorVarName'], $value['forName'], $value['style']);
		}
	}
}
