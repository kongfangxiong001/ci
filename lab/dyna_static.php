<?php
class Test{
	public static function testgo()
	{
		echo "gogo";
	}
}
$class = 'Test';
$action = 'testgo';
$class::$action();