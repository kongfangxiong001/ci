<?php
/**
 * 使用PHP实现适配器模式:http://www.phppan.com/2010/07/php-design-pattern-10-adapter/
 * 
 * 适配器模式（PHP实现）:http://www.cnblogs.com/whoamme/p/3324325.html
 * 
 *  1、你想使用一个已经存在的类，而它的接口不符合你的需求
 *	2、你想创建一个可以复用的类，该类可以与其他不相关的类或不可预见的类协同工作
 *	3、你想使用一个已经存在的子类，但是不可能对每一个都进行子类化以匹配它们的接口。对象适配器可以适配它的父类接口（仅限于对象适配器）
 * 
 */

class Adaptee{
	public function sample_method()
	{
		echo "sample_method from Adaptee!";
	}
}

interface Target {
	public function sample_method();
	public function sample_method2();
}

class Adapteer extends Adaptee implements Target{
	public function sample_method2()
	{
		echo "sample_method2 from Adapteer";
	}	
}

$adapteer = new Adapteer();
$adapteer->sample_method();
$adapteer->sample_method2();


