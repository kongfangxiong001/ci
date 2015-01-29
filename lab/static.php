<?php
function set_arr($key,$val)
{
	static $arr=array();
	if(array_key_exists($key,$arr)){
		return $arr[$key];
	}else{
		$arr[$key] = $val;
	}
	return $arr[$key];
}

echo set_arr('a','A');
echo set_arr('b','B');
echo set_arr('a','AA');


