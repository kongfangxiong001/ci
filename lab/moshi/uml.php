<?php
/**
 * 实现大话设计模式 1.11中的uml类图
 * 
 * 接口，抽象类，类
 * 
 * 各种关系【6种】包括：继承，实现接口，聚合，组合，依赖，关联
 * 
 * 类：封装，继承，多态
 */

abstract class Animal{
	public $life;
	//繁殖
	public function metabolism(Oxygen $o,Water $w){
		
	}
	abstract public function fanzhi();
}
/**
 * 氧气
 */
class Oxygen{
	
}
class Water{
	
}

abstract class Bird extends Animal{
	public $feather1;
	public $feather2;
	public $yuan;
	public function __construct(){
		$this->feather1 = new Wing();
		$this->feather2 = new Wing();
	}
	abstract public function xiadan();
}

class dayan extends Bird implements Feixiang{
	public function fly(){
		echo "大雁 飞翔";
	}
	public function xiadan(){
		echo "xiadan dayan";
	}
	
}
interface Feixiang{
	abstract public function fly();
}
class Wing{
	
}


class Qie extends Bird{
	public $climat;
	public function __construct(){
		$this->climat = new Climat();
	}
	public function xiadan(){
		echo "Qie xiadan";
	}
}

class Climat{
	
}


class Yanquan{
	private $dayan = array();
	public function v_fly(){
		echo "v_fly";
	}
	public function one_fly(){
		echo "one_fly";
	}
}



