<?php
/**
 * 简单工厂 实现 商场打折
 */
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


class Cash_factory{
	public static $cs = null;
	public static function create_cash_accept($type)
	{
		switch($type){
			case "1" :
				self::$cs = new Cash_normal();
				break;
			case "2" :
				self::$cs = new Cash_rebate("0.8");
				break;
			case "3" :
				self::$cs = new Cash_return("300", "100");
				break;
		}
		return self::$cs;
	}
}

$total = 0;

$cs = Cash_factory::create_cash_accept("3");
$total_price = 0;

$total_price = $cs->accept_cash(500*2);

$total = $total+$total_price;

echo $total;























