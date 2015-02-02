<?php
/**
 * 设计模式的原则：
 * 		单一职责:就一个类而言，应该只有一个引起他变化的原因。 多个职责在一起，一个职责变化就会影响到这个类完成其他职责。
 * 		如果多余一个动机去改变类，这个类就具有多个职责。【游戏逻辑，游戏界面】
 * 	
 * 		开放-封闭原则：对修改是封闭的，对扩展是开放。创造抽象，隔离以后同类的变化。
 * 
 * 		依赖颠倒原则：高层模块不依赖于低层模块。二者都应该依赖抽象。
 * 					   抽象不依赖于细节，细节应该依赖于抽象。
 * 
 * 		李氏代换原则：子类型必须能够替换掉他们的父类型。
 */

//李氏代换原则：子类型必须能够替换掉他们的父类型

//abstract class Animal{
//	private $name;
//	abstract public function eat();
//	abstract public function sleep();
//}

class Animal{
	private $name;
	public function __construct(){
		$this->name = "A animal";
	}
}

class Cat extends Animal{
	public function __construct()
	{
		parent::__construct();
	}
	public function eat()
	{
		echo $this->name;
		echo "cat eat fish!";
	}
	public function sleep()
	{
		echo "cat sleep";
	}
}

$cat = new Cat();
$cat->eat();
