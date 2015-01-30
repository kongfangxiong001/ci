<?php
/**
 * PHP设计模式之注册模式实例
 * 
 * @link  http://www.phpddt.com
 */
/**
 * http://www.phpddt.com/php/registry-pattern.html
 *单例模式保证了一个类中只有一个实例被全局访问，当你有一组全局对象被全局访问时可能就需要用到注册者模式 (registry)，它 提供了在程序中有条理的存放并管理对象 (object)一种解决方案。一个“注册模式”应该提供get() 和 set()方法来存储和取得对象（用一些属性key）而且也应该提供一个isValid()方法来确定一个给定的属 性是否已经设置。
 *
 */
class  Registry  {
    
  protected  static  $store  =  array();   
  private static $instance;
  
  public static function instance() {
      if(!isset(self::$instance)) {
          self::$instance = new self();
      }
      return self::$instance;
  }
  
  public function  isValid($key)  {
    return  array_key_exists($key,  Registry::$store);
  }
 
  public function  get($key)  {
    if  (array_key_exists($key,  Registry::$store))
    return  Registry::$store[$key];
  }
 
  public  function  set($key,  $obj)  {
    Registry::$store[$key]  =  $obj;
  }
}

class ConnectDB {
    
    private $host;
    private $username;
    private $password;
    
    private $conn = null;
    
    public function __construct($host, $username, $password){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }
    
//    public function getConnect() {
//    	try{
//    		$this->conn = mysql_connect($this->host,$this->username,$this->password);
//    		if(!$this->conn){
//    			throw new Exception("Can't connect mysql server");
//    		}
//    		return $this->conn;
//    	}catch(Exception $e){
//    		echo $e->getMessage();
//    	}
//    }
}

//测试
$reg = Registry::instance();
$reg->set('db1', new ConnectDB('127.0.0.1', 'root', ''));
$reg->set('db2', new ConnectDB('192.168.1.198', 'test', '0K5Dt@2jdc8#x@'));
print_r($reg->get('db1'));
print_r($reg->get('db2'));

class Cat{
	public $name;
	public $age;
	public  function __construct($name,$age){
		$this->name = $name;
		$this->age = $age;
	}
	public  function introduce(){
		echo $this->name."---".$this->age;
	}
}

$reg->set('miao_jack',new Cat('jack',100));
$reg->set('miao_peter',new Cat('peter',200));

$reg->get('miao_jack')->introduce();
$reg->get('miao_peter')->introduce();




