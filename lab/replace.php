<?php
$str = 'xiangjiao buru pingguohaochi,pingguo buru chengzi haochi';
do{
	$str = preg_replace(array('/xiangjiao/','/pingguo/','/chengzi/'),'',$str,-1,$count);
	echo $count;
	echo "run";
}while($count);
