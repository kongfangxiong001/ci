<?php
class Calc{
	public function calculate($num1,$num2,$operation)
	{
		try{
			switch($operation){
				case '+' :
					return $num1+$num2;
					break;
				case '-' :
					return $num1-$num2;
					break;
				case '/' :
					if($num2==0){
						throw new Exception("\$num2 can not be 0");
					}
					return $num1/$num2;
					break;
				case '*' :
					return $num1*$num2;
					break;
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}

$calc = new Calc();
echo $calc->calculate(10, 2, '+');
echo $calc->calculate(10, 0, '/');