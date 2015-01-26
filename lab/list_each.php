<?php
$arr = array('A'=>'a','B'=>'b','C'=>'c','d','E'=>'e');
reset($arr);
while(list($k,$v)=each($arr)){
	echo $k."--".$v;
}

reset($arr);
echo "\r\n";
foreach($arr as $k=>$v){
	echo $k."--".$v;
}