<?php 
class BaseWidget
{
	public function getStyleString($style=array())
	{
		$return = "";
		if(!empty($style))
		{
			foreach($style as $styleName=>$styleVal)
			{
				$return .= $styleName.'="'.$styleVal.'" ';
			}
			return substr($return,0,-1);
		}
		return null;
	}
}
?>