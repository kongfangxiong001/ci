<?php
interface Animal{
	public function eat();
}
/**
 * 为什么要implements animal
 *
 */
abstract class Decoration implements Animal{
	private $animal;
	public function __construct($animal)
	{
		$this->animal = $animal;
	}
	public function eat(){
		$this->animal->eat();
	}
}

class Cat extends Decoration{
	public function __construct($animal)
	{
		parent::__construct($animal);
	}
	public function eat()
	{
		parent::eat();
		$this->cat_eat();
	}
	public function cat_eat(){
		echo 'cat_eat fish!';
	}
}

class Dog extends Decoration{
	public function __construct($animal)
	{
		parent::__construct($animal);
	}
	public function eat()
	{
		parent::eat();
		$this->dog_eat();
	}
	public function dog_eat(){
		echo 'dog_eat bone!';
	}
}

class Some_Animal implements Animal{
	public function eat()
	{
		echo 'eat what?';
	}
}

$some_animal = new Some_Animal();
$cat = new Cat($some_animal);
$dog = new Dog($cat);

$cat->eat();
$dog->eat();



