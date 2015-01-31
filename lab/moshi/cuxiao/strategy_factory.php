<?php
abstract class Cash_super{
	public abstract function accept_cash($money);
}

class Cash_normal extends Cash_super{
	public function accept_cash($money)
	{
		return $money;
	}
}

class Cash_rebate extends Cash_super{
	private $money_rebate = 1;
	public function __construct($money_rebate){
		$this->money_rebate = $money_rebate;
	}
	public function accept_cash($money)
	{
		return $money*$this->money_rebate;
	}
}

class Cash_return extends Cash_super{
	private $money_condition = 0;
	private $money_return = 0;
	
	public function __construct($condition,$return)
	{
		$this->money_condition = $condition;
		$this->money_return = $return;
	}
	
	public function accept_cash($money)
	{
		if($money>=$this->money_condition){
			$result =$money - floor($money/$this->money_condition)*$this->money_return;
		}
		return $result;
	}
}

class Cash_context{
	private $cs;
	public function __construct($type)
	{
		switch($type){
			case "1":
				$this->cs = new Cash_normal();
				break;
			case "2":
				$this->cs = new Cash_return("300", "100");
				break;
			case "3":
				$this->cs = new Cash_rebate("0.8");
				break;
		}
	}
	public function get_result($money)
	{
		return $this->cs->accept_cash($money);
	}
}

$total = 0;
$type =2;

$cs = new Cash_context(2);

$total_price = 0;

$total_price = $cs->get_result(500*2);
$total = $total+$total_price;

echo $total;



























