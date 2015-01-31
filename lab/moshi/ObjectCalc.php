<?php
/**
 * 
 * 封装，继承，多态
 *
 */
abstract class Operate{
	abstract public function get_value();
}

class Add_opt extends Operate{
	public function get_value($num1=10,$num2=5){
		return $num1+$num2;
	}
} 

class Sub_opt extends Operate{
	public function get_value($num1=10,$num2=5){
		return $num1-$num2;
	}
}

class Operate_factory{
	public static  function create_opt($opt){
		switch($opt){
			case '+':
				return new Add_opt();
				break;
			case '-':
				return new Sub_opt();
				break;
		}
	}
}

$opt = Operate_factory::create_opt('+');
echo $opt->get_value(10,5);