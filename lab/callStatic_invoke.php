<?php
class MethodTest{
	public function __call($name,$arguments){
		echo "调用对象方法'$name'".implode('---',$arguments)."\n\r";
	}
	public static function __callstatic($name,$arguments){
		echo "调用静态方法'$name'".implode('---',$arguments);
	}
	
	public function __invoke()
	{
		echo 'invoked';	
	}
}
header("content-type:text/html;charset=utf-8");
$obj = new MethodTest();
$obj->runTest("  通过对象调用","abc");

MethodTest::runTest("  静态调用");

$obj(); //invoked