<?php 
function dd($var)
{
	echo '<pre>';
	var_dump($var);die;

}
function C($file,$name)
{
	return \Core\Lib\config::get($file,$name);
}
function M($table)
{
	
}
?>