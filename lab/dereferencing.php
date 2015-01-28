<?php
//http://www.laruence.com/2011/07/02/2097.html
 $name = explode(",", "Laruence,male")[0];
 echo $name;
 
 
 list($name,) = explode(",", "Laruences, male");
 echo $name;
 
 
 explode(",", "Laruence,male")[3] = "phper";

 
function &ref(&$arr) {
    return $arr;
}
 
$arr = array(1,2,3);
ref($arr)[4] = 4;
 
var_dump($arr);
 