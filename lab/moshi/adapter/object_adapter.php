<?php
/**
 * 
类适配器：Adapter与Adaptee是继承关系
1、用一个具体的Adapter类和Target进行匹配。结果是当我们想要一个匹配一个类以及所有它的子类时，类Adapter将不能胜任工作
2、使得Adapter可以重定义Adaptee的部分行为，因为Adapter是Adaptee的一个子集
3、仅仅引入一个对象，并不需要额外的指针以间接取得adaptee

对象适配器：Adapter与Adaptee是委托关系
1、允许一个Adapter与多个Adaptee同时工作。Adapter也可以一次给所有的Adaptee添加功能
2、使用重定义Adaptee的行为比较困难
 *
 */
interface Target{
	public function sample_method();
	public function sample_method2();
}


class Adaptee{
	public function sample_method(){
		echo "sample_method from Adaptee";
	}
}

class Adapter{
	public $adaptee;
	public function __construct($Adaptee){
		$this->adaptee = $Adaptee;
	}
	public function sample_method(){
		$this->adaptee->sample_method();
	}
	public function sample_method2(){
		echo "sample_method2 from Adapter";
	}
}
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

$adapter->sample_method();
$adapter->sample_method2();