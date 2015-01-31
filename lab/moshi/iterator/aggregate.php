<?php
/**
 * PHP设计模式之迭代器模式(Iterator):http://blog.samoay.me/post/view/17
 */

/**
 *  PHP5提供的Iterator接口，Traversable接口只是为了标识对象是否可以通过foreach迭代，不包含任何方法
	Iterator extends Traversable {
	    abstract public mixed current ( void )
	    abstract public scalar key ( void )
	    abstract public void next ( void )
	    abstract public void rewind ( void )
	    abstract public boolean valid ( void )
	}
	
	好处就是不暴漏被迭代对象的内部结构
 */
 
class Record_iterator implements Iterator{
	public  $record;
	public  $position;
	public function __construct(Array $data)
	{
		$this->record = $data;
		$this->position = 0;	
	}
	
	public function current()
	{
		return $this->record[$this->position];
	}
	
	public function next()
	{
		$this->position++;
	}
	public function key()
	{
		return $this->position;
	}
	public function rewind()
	{
		$this->position = 0;
	}
	public function valid()
	{
		return isset($this->record[$this->position]);
	}
}

interface Aggregate
{
	public function get_iterator();
}

class Record_list implements Aggregate
{
	private $iterator;
	public function __construct($data)
	{
		$this->iterator = new Record_iterator($data);
	}
	public function get_iterator()
	{
		return $this->iterator;
	}
}
//假如我们从MongoDB中读取得到下列数据
$data = array(
    0 => array('field' => 'value'),
    1 => array('field' => 'value'),
    2 => array('field' => 'value'),
    3 => array('field' => 'value'),
);

$record_list = new Record_list($data);
$iterator = $record_list->get_iterator();
while($iterator->valid()){
	$record = $iterator->current();
	$iterator->next();
	print_r($record);
}
$iterator->rewind();