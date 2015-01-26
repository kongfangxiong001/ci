<?php
class o{
	public function s()
	{
		echo 's';	
	}
}

if(class_exists('o')){
	echo 'yes';
}else{
	echo 'no';
}