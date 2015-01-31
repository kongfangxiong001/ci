<?php
interface Player{
	public function speak_english();
	public function play_basketball();
}

class Yaoming {
	public function speak_chinese(){
		echo "chinese";
	}
	public function play_backetball(){
		echo "excellent";
	}
}

class Adapter implements Player{
	public $yaoming;
	public function __construct($yaoming){
		$this->yaoming = $yaoming;
	}
	public function play_basketball()
	{
		$this->yaoming->play_basketball();	
	}
	public  function speak_english()
	{
		$chinese = $this->yaoming->speak_chinese();
		$english = chuli($chinese);
		return $english;
			
	}
}

$yaoming = new Yaoming();
$adapter = new Adapter($yaoming);

$adapter->speak_english();
$adapter->play_basketball();