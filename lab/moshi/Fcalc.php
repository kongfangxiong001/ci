<?php
abstract class Calc{
	abstract function getValue($num1,$num2);
}

class add_operate extends Calc{
	public	function getValue($num1,$num2){
		return $num1+$num2;
	}
}

class sub_operate extends Calc{
	public function getValue($num1,$num2){
		return $num1-$num2;
	}
}

class mul_operate extends Calc{
	public function getValue($num1, $num2){
		return $num1*$num2;
	}
}

class div_operate extends Calc{
	public function getValue($num1,$num2){
		try{
			if(!$num2){
				throw new Exception("\$num2 can't be 0");
			}
			return $num1/$num2;
		}catch(Exception $e){
			echo $e->getMessage();			
		}
	}
}

//动态的创建类的实例
class Factory{
	public static function create_operate($operate)
	{
		switch($operate){
			case '+':
				return new add_operate();
				break;
			case '-':
				return new sub_operate();
				break;
			case '*':
				return new mul_operate();
				break;
			case '/':
				return new div_operate();
				break;
		}
		
	}
}

$opt = Factory::create_operate('+');
echo $opt->getValue(10,2);

$opt = Factory::create_operate('*');
echo $opt->getValue(19, 3);

$opt = Factory::create_operate('/');
echo $opt->getValue(19, 3);



