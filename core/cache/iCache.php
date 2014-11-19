<?php 
interface iCache
{
    public function getCache($var);
    public function setCache($var_name, $var_value, $liveTime=null);
}
?>