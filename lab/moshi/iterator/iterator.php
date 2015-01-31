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
 */
 
class Record_list implements Iterator{
	public  $record_list;
	public  $position;
	public function __construct(Array $data)
	{
		$this->record_list = $data;
		$this->position = 0;	
	}
	
	public function current()
	{
		return $this->record_list[$this->position];
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
		return isset($this->record_list[$this->position]);
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
while($record_list->valid()){
	$record = $record_list->current();
	print_r($record);
	$record_list->next();
}
$record_list->rewind();


