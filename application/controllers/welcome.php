<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('cimongo/Cimongo');
		$this->load->library('pagination');
	}
	
	function index(){
		$this->view();
	}
	
	public function view()
	{
		$keyword=$this->input->post("search")?$this->input->post("search"):0;
		$offset=$this->uri->segment(4)?urldecode($this->uri->segment(4)):0;
		if($keyword!=""){
			$result = $this->cimongo->like("nama",$keyword)->get("user")->num_rows();
		}else{
			$result = $this->cimongo->get("user")->num_rows();
		}
		
		//$this->db->start_cache();
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['base_url'] = site_url()."/welcome/view/".$keyword;
		$config['total_rows'] =$result;
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		
		if($keyword!=""){
			$content = $this->cimongo->like("nama",$keyword)->get("user",$config['per_page'],$offset)->result_array();
		}else{
			$content = $this->cimongo->get("user",$config['per_page'],$offset)->result_array();
		}
		//$this->db->stop_cache();
		
		$data['hal']=$this->pagination->create_links();
		$data['no']=$offset;
		$data["data"] = $content;
		
		$this->load->view('header');
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}
	
	public function add(){
		$this->load->view('header');
		$this->load->view("add_form");
		$this->load->view('footer');
	}
	
	public function edit($id){
		$id = new MongoId($id);
		$data["data"] = $this->cimongo->where(array("_id"=>$id))->get("user")->row_array();
		$this->load->view('header');
		$this->load->view("edit_form",$data);
		$this->load->view('footer');
	}
	
	public function save(){
		$data["nama"] = $this->input->post("nama");
		$data["alamat"] = $this->input->post("alamat");
		$data["hobi"] = $this->input->post("hobi");
		
		$query = $this->cimongo->insert("user",$data);
		if($query){
			redirect("welcome");
		}else{
			$konten["content"] = "gagal";
			$this->load->view('header');
			$this->load->view("add_form",$konten);
			$this->load->view('footer');
		}
	}
	
	public function ubah($id){
		$data["nama"] = $this->input->post("nama");
		$data["alamat"] = $this->input->post("alamat");
		$data["hobi"] = $this->input->post("hobi");
		$id = new MongoId($id);
		$query = $this->cimongo->where(array("_id"=>$id))->update("user",$data);
		if($query){
			redirect("welcome");
		}else{
			$konten["content"] = "gagal";
			$this->load->view('header');
			$this->load->view("add_form",$konten);
			$this->load->view('footer');
		}
	}
	
	public function delete($id){
		if(!empty($id)){
			$id = new MongoId($id);
			$exec = $this->cimongo->where(array("_id"=>$id))->delete("user");
			if($exec){
				redirect("welcome");
			}else{
				$data["data"] = $this->cimongo->get("user")->result_array();
				$data["errorMsg"] = "Failed to delete data";
				$this->load->view('header');
			$this->load->view('welcome_message',$data);
				$this->load->view('footer');
			}
		}
	}
}