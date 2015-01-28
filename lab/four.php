<?php
//http://blog.csdn.net/black_ox/article/details/21163193
//Session提供了上传进度支持，通过$_SESSION["upload_progress_name"]就可以获得当前文件上传的进度信息，结合Ajax就能很容易实现上传进度条了。
$arr = [1,'string','tsingpost.com'];
$array = [
	'foo'=>"bar",
	'bar'=>"foo"
];

print_r($arr);
print_r($array);
// Array dereferencing 数组值
function myfunc()
{
	return array(1,'tsing','tsingpost.com');
}
$arr = myfunc();

echo myfunc()[1];

$name = explode(",","tsings,male")[0];
echo $name;
echo explode(",","tsings,male")[3] = "phper";


//实例化类

class test{
	function show()
	{
		return 'test';
	}
}
echo (new test())->show();


//Class::{expr}()
class Human{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	
	public function hello(){
		echo $this->name;
	}
	
}

foreach([new Human("Gonzalo"),new Human('Peter')] as $human)
{
	echo $human->{'hello'}();
}

//callable typehint
function foo(callable $callback){
	return $callback();
}
//foo(false); //error,不是callable类型
//foo("printf");
//foo(function(){});
class A{
	static function show($a){
		echo "show run".$a;
	}
}
//foo(array("A","show"));

call_user_func_array(array('A','show'), ['hi']);


//函数类型提示的增强 。对于传入的参数进行类型检查，不符合则提示错误。


//让Json更懂中文(JSON_UNESCAPED_UNICODE)
echo json_encode("中文", JSON_UNESCAPED_UNICODE);

//二进制直接量(binary number format)
$bin  = 0b1101;
echo $bin;














