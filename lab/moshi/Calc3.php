<?php
class Calc3{
	public function add_operate($num1,$num2)
	{
		return $num1+num2;		
	}
	
	public function sum_operate($num1,$num2)
	{
		return $num1-$num2;
	}
}

$calc = new Calc3();
echo $calc->add_operate(1, 2);