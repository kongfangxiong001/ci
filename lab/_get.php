<?php
class cat{
	public function  __get($property)
	{
		return  $this->{$property};
	}
	
	public function __call($parm1,$parm2)
	{
		print_r($parm1);
		print_r($parm2);
	}
	public function __set($var,$val)
	{
			echo $var."|".$val."\r\n";
			$this->$var = $val;
	}
	public function __clone()
	{
		echo "clone func invoke"."\r\n";	
	}
	public function __isset($var)
	{
		echo "via __isset view isset".$var;
	}
	public function __unset($var)
	{
		echo "via __unset unset".$var;
	}
	public static function __callStatic($parm1,$parm2)
	{
		echo "__callStatic ".$parm1.var_dump($parm2);
	}
	public function __construct()
	{
		echo '__construct';
	}
	public function __destruct()
	{
		echo '__destruct';
	}
	public function __toString()
	{
		return  'cat to string';
	}
	public function __invoke($xxx)
	{
			var_dump($xxx);
	}
	
}
$Cat = new cat();
//echo $Cat->name;
//$Cat->hello($array=array('a','b'));

$Cat->a = 3;

$Cat2 = clone $Cat;
$Cat2->a = 10;
echo $Cat->a;
echo $Cat2->a;

var_dump(isset($Cat->b));
unset($Cat->b);
Cat::ddd('abc');
echo $Cat2;
$Cat('abccd');
var_dump(is_callable($Cat));