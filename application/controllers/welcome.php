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
		//in the view  $apple,$banana
	}
	public function cache_driver()
	{
		$fruit = array('apple'=>'pingguo','banana'=>'aca');
		
		$this->load->driver("Cache");
		$this->cache->file->save('abc',$fruit,10);
		$content = $this->cache->file->get('abc');
		print_r($content);
	}
	
	public function config_load()
	{
		$this->config->load('test',true);
		echo $this->config->item('auto');
		echo $this->config->item('pagesize','test');
		echo $this->config->slash_item('index_page');
		echo $this->config->base_url("admin/he");
	}
	public function input_get()
	{
		print_r($this->input);
		echo $this->config->system_url();
	}
	
	public function get_config()
	{
		$config = &get_config(array(
			'base_url'=>'http://loaclhost/',
			'subclass_prefix' => 'MYCI_'
		));  //&get_config为static，会影响到$this->config
		print_r($config);
		print_r($this->config);
	}
	public function load_email(){
		$this->load->library("email");
		print_r($this->email);
	}
	public function blank()
	{
		echo $this->config->base_url();
		echo $this->config->site_url();
	}
	public function output()
	{
		$this->load->view("output");
		$data = "output special!";
		$this->output->set_output($data);
		$string = $this->output->get_output();
		$this->output->append_output("append_output");
		
	}
	public function pagenation()
	{
		$this->load->library('pagination');
		$this->load->helper('url');
		
		$config['base_url'] = site_url('welcome/pagenation');
		$config['total_rows'] = 200;
		$config['per_page'] = 20; 
		
		$this->pagination->initialize($config); 
		echo $this->pagination->create_links();	
	}
	 function register()
	 {
		  $this->load->helper(array('form', 'url'));
		  $this->load->library('form_validation');
		  $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		  
		  
		  $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|callback_username_check');
		  $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		  $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		  $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		  $this->form_validation->set_rules('colors[]', 'colors', 'required');
		   $this->form_validation->set_rules('mycheck[]', 'mycheck', '');
		  
		  if ($this->form_validation->run() == FALSE)
		  {
		   		$this->load->view('myform');
		  }
		  else
		  {
		   		$this->load->view('formsuccess');
		  }
	 }
	 
	public function username_check($str)
	 {
	  if ($str == 'test')
	  {
		   $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
		   return FALSE;
	  }
	  else
	  {
	   		return TRUE;
	  }
	 }
	 /**
	  * URI 类
	  * http://codeigniter.org.cn/user_guide/libraries/uri.html
	  */
	 public function segment(){
	 	echo $this->uri->segment(2, 0);
	 	echo $this->uri->rsegment(1);
	 	$array = $this->uri->uri_to_assoc(3);
	 	print_r($array);
	 	
	 	$array = array('product' => 'shoes', 'size' => 'large', 'color' => 'red');
		$str = $this->uri->assoc_to_uri($array);
		echo $str;
		$this->load->helper('url');
		echo site_url().base_url();
		echo "||";
		echo $this->uri->uri_string();
		$segment_array = $this->uri->segment_array();
		print_r($segment_array);
	 }
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */