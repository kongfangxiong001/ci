<?php 
class Cat{
	public  function eat()
	{
		echo "eat";
	}
}

class Factory{
	public static  function create_cat()
	{
		return new Cat();
	}
}

Factory::create_cat()->eat();
?>