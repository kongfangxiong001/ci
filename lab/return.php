<?php
class dog{
	public function __construct()
	{
		return new cat();
	}
	
	public function get_cat()
	{
		return new cat();
	}
}

class cat{
	public function __construct(){
		
	}
}


$dog = new dog();

print_r($dog);

print_r($dog->get_cat());


if($dog instanceof cat){
	echo 'yes';
}else{
	echo 'no';
}