<?php
class News extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
	}
	
	public function index(){
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';
		
		$this->load->library('pagination');

		$config['base_url'] = 'http://example.com/index.php/test/page/';
		$config['total_rows'] = 200;
		$config['per_page'] = 20; 
		
		$this->pagination->initialize($config); 
		
		$data['pages'] =  $this->pagination->create_links();
		
		
		$this->load->view('templates/header',$data);
		$this->load->view('news/index',$data);
		$this->load->view('templates/footer');
	}
	
	public function view($slug){
		$data['news_item'] = $this->news_model->get_news($slug);
		if(empty($data['news_item'])){
			show_404();
		}
		
		$data['title'] = $data['news_item']['title'];
		
		$this->load->view('templates/header',$data);
		$this->load->view('news/view',$data);
		$this->load->view('templates/footer');
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a news item';
		
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('text','text','required');
		
		if($this->form_validation->run() === false){
			$this->load->view('templates/header',$data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}else{
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
	
	public function get(){
		header("Content-Type:text/html;charset=utf-8");
		$query = $this->db->query("select * from `news`");
//		foreach($query->result('news') as $row){
//			echo $row->show();
//		}
//		foreach($query->result_array() as $row){
//			print_r($row);			
//		}
//		if($query->num_rows()>0){
//			$row = $query->row(1);
//			print_r($row);
//		}
//		if($query->num_rows()>0){
//			$row = $query->row_array(1);
//			print_r($row);
//		}
//		$row = $query->first_row();
//		print_r($row);
//		$row = $query->last_row();
//		print_R($row);
		echo $query->num_fields();
		echo $query->num_rows();
		$row = $query->next_row('array');
		print_r($row);
		$row = $query->previous_row();
		print_r($row);
		$query->free_result();
	}
	public function show(){
		echo 'show';
	}
 
}