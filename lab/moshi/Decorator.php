<?php
/**
 * http://www.phppan.com/2010/06/php-design-pattern-4-decorator/
 * 装饰者模式
 */
interface Component{
	public function operation();
}

abstract class Decorator implements Component{
	protected $_component;
	public function __construct($component)
	{
		$this->_component = $component;
	}
	public function operation()
	{
		$this->_component->operation();
	}
}

class ConcreteDecoratorA extends Decorator {
	public function __construct($component){
		parent::__construct($component);
	}
	public function operation()
	{
		parent::operation();
		$this->addedOperationA();
	}
	public function addedOperationA(){
		echo "add operation A";
	}
}

class ConcreteDecoratorB extends Decorator {
	public function __construct($component){
		parent::__construct($component);
	}
	public function operation()
	{
		parent::operation();
		$this->addedOperationB();
	}
	public function addedOperationB(){
		echo "add operation B";
	}
}

class ConcreteComponent implements Component{
	public function operation(){
		echo 'Concrete Component operation <br />';
	}
}


        $component = new ConcreteComponent();
        $decoratorA = new ConcreteDecoratorA($component);
        $decoratorB = new ConcreteDecoratorB($decoratorA);
 
        $decoratorA->operation();
        $decoratorB->operation();





