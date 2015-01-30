<?php
function set_arr($key,$val)
{
	static $arr=array();
	if(array_key_exists($key,$arr)&&0){
		return $arr[$key];
	}else{
		$arr[$key] = $val;
	}
	print_r($arr);
	return $arr[$key];
}

echo set_arr('a','A');
echo set_arr('b','B');
echo set_arr('a','AA');

/**
 * 静态变量仅在局部函数域中存在且只被初始化一次,当程序执行离开此作用域时，其值不会消失,会使用上次执行的结果
 * 如果在声明中用表达式的结果对静态变量赋值会导致解析错误
 * 
 * 
 * 
 * 静态变量的作用域只能在本函数中。
 */
function Test()
{
	static $count = 0; //这是初始化。静态变量不能被二次初始化，但可以被重新赋值
	if($count<10){
		echo "recored:".$count;
	}
	$count = 10;
}
Test();
Test();

/**************************/
echo "/**********************/";
function Test2()
{
	static $T2=1;
	$T2++;
	echo $T2;
}
Test2();
Test2();
Test2();
/************************************************/
/**
 * 静态变量只能Class::$varname调用
 */
class Cat{
	public static $name="a Cat Miao";
	private static $age;
	public function __construct()
	{
		
	}
	public static  function init(){
		self::$age = 10;
	} 
	public static  function get_age(){
		return self::$age;
	}
	
	public   function get_age2(){
		return self::$age;
	}
	
}

Cat::init();
$age = Cat::get_age();
echo $age;

$cat = new Cat();
echo $cat->get_age2();














