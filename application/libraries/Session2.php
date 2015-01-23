<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_Sessions {
	public $flash_key = "flash";
	
	/**
	 * 初始化session,通过_sess_run开启session并检测是否过期
	 */
	public function __construct(){
		$this->CI = &get_instance();
		log_message('debug', "Session init");
		
		ini_set('session.gc_maxlifetime',1440);
		$this->sess_run();
	}
	
	/**
	 * 开启session，并检测session是否过期
	 */
	private function sess_run(){
		if(!isset($_SESSION)){
			session_start();
		}
		$session_id_ttl = $this->CI->config->item('sess_expiration');
		if (is_numeric($session_id_ttl))
		{
			if ($session_id_ttl > 0)
			{
				$this->session_id_ttl = $this->CI->config->item('sess_expiration');
			}
			else
			{
				$this->session_id_ttl = (60*60*24*365*2);
			}
		}
		
		if($this->sess_expired()){
			$this->sess_destory();
		}
		$this->flashdata_sweep();
		$this->flashdata_mark();
	}
	
	/**
	 * 检测是否过期
	 */
	private function sess_expired(){
		if ( !isset( $_SESSION['regenerated'] ) )
		{
			$_SESSION['regenerated'] = time();
			return false;
		}
		$expiry_time = time() - $this->session_id_ttl;
		if ( $_SESSION['regenerated'] <=  $expiry_time )
		{
			return true;
		}
		return false;
	}
	
	/**
	 * 清除session，cookie
	 */
	public function sess_destory(){
		if ( isset( $_COOKIE[session_name()] ) )
		{
			setcookie(session_name(), '', time()-43200, '/');
		}
		unset($_SESSION);
		session_destroy();
	}
	/**
	 * 获取flashdata
	 */
	function flashdata($key)
	{
		$flash_key = $this->flash_key.':new:'.$key;
		return $this->userdata($flash_key);
	}
	
	
	/**
	 * 清除old的flashdata
	 */
	private function flashdata_sweep(){
		foreach ($_SESSION as $name => $value)
		{
			$parts = explode(':old:', $name);
			if (is_array($parts) && count($parts) == 2 && $parts[0] == $this->flash_key)
			{
				$this->unset_userdata($name);
			}
		}
	}
	
	/**
	 * 将一次性flashdata标记为old
	 */
	private function flashdata_mark($key=''){
		if($key){
			$flash_key = $this->flash_key.':new:'.$key;
			if(isset($_SESSION[$flash_key])){
				$new_key = $this->flash_key.':old:'.$key;
				$value = $this->userdata($flash_key);
				$this->set_userdata($new_key, $value);
				$this->unset_userdata($flash_key);
			}
			return ;
		}
		foreach ($_SESSION as $name => $value)
		{
			$parts = explode(':new:', $name);
			if (is_array($parts) && count($parts) == 2)
			{
				$new_name = $this->flash_key.':old:'.$parts[1];
				$this->set_userdata($new_name, $value);
				$this->unset_userdata($name);
			}
		}
	}
	/**
	 * 读取session
	 */
	public function userdata($item){
		if($item==='session_id'){
			return session_id();
		}else{
			return $_SESSION[$item]?$_SESSION[$item]:false;
		}
	}
	/**
	 * 写session
	 */
	public function set_userdata($newdata=array(),$newval=''){
		if(is_string($newdata)){
			$newdata = array($newdata=>$newval);
		}
		if(count($newdata)>0){
			foreach($newdata as $key=>$value){
				$_SESSION[$key]=$value;
			}
		}
	}
	/**
	 * 删除session
	 */
	function unset_userdata($newdata = array())
	{
		if (is_string($newdata))
		{
			$newdata = array($newdata => '');
		}

		if (count($newdata) > 0)
		{
			foreach ($newdata as $key => $val)
			{
				unset($_SESSION[$key]);
			}
		}
	}
}