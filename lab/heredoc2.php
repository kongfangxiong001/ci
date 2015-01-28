<?php
function foo()
{
	static $bar = <<<LABEL
Noting in here ...
LABEL;

	echo $bar;
}

class foo
{
	const BAR = <<<FOOBAR
Context example
FOOBAR;

	public $baz = <<<FOOBAR
Property example
FOOBAR;
}

const CONSTANT = "Hello World";
echo CONSTANT;

$a = 10;
$b=5;
echo $a>$b?$a:$b;
echo $a>$b?:$b; //会返回true
echo true;