<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function show()
	{
		$this->load->library('layout');
		 
		$data["page_title"] = "业务咨询"; 
		$data["Keywords"] = "华领GPS业务咨询,GPS车辆管理,如何开通GPS车辆管理系统,GPS车辆管理系统,昆山GPS车辆管理系统,华领GPS车辆管理系统"; 
		$data["Description"] = "如何开通GPS车辆管理系统,昆山华领网络设备服务部——领先的GPS车辆管理系统服务商"; 
		$this->layout->view('support',$data); 
	}
	
	public function test_session()
	{
		$this->load->library("Session/Session");
		print_r($this->session);
	}
	public function test_vars()
	{
		$fruit = array('apple'=>'pingguo','banana'=>'xiangjiao');
		$this->load->vars($fruit);
	}
	public function cache_driver()
	{
		$fruit = array('apple'=>'pingguo','banana'=>'aca');
		
		$this->load->driver("Cache");
		$this->cache->file->save('abc',$fruit,10);
		$content = $this->cache->file->get('abc');
		print_r($content);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */