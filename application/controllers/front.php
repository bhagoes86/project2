<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_front');
		$this->form_validation->set_message('required',"%s Tidak boleh kosong");
		$this->form_validation->set_message('valid_email',"Gunakan Email yang valid");
		$this->form_validation->set_error_delimiters('<div class="alert alert-error nf">', '</div>');
	}
	public function index()
	{
		$this->session->set_userdata('title',"Home");
		$data['content'] = "home";
		$this->load->view('main',$data);
	}
	public function lowongan()
	{
		$this->session->set_userdata('title',"Lowongan");
		$data['get_lowongan'] = $this->model_front->get_lowongan();
		$data['content'] = "front/lowongan";
		$this->load->view('main',$data);
	}
	public function lamar()
	{
		$id = $this->uri->segment(3);
		$data['get_lowongan'] = $this->model_front->get_lowongan($id);
		$this->model_front->lamar();
		$data['content'] = "front/lamar";
		$this->load->view('main',$data);
	}
	//Untuk Pelamar Profil
	public function profil(){
		if($this->session->userdata('login')){
			if($this->session->userdata('role')=='employer'){
				$this->model_front->profil_employer();
			}else{
				$this->model_front->profil_pelamar();
			}
			$data['content'] = "front/profil";
			$this->load->view('main',$data);
		}else{
			redirect();
		}
	}
	//Untuk Pelamar Resume
	public function resume(){
		if($this->session->userdata('role')=='pelamar'){
			$this->model_front->resume();
			$data['content'] = "front/resume";
			$this->load->view('main',$data);
		}else{
			redirect();
		}
	}
	//Untuk Employer
	public function employer(){
		if($this->session->userdata('role')=='employer'){
			$this->model_front->resume();
			$data['content'] = "front/employer";
			$this->load->view('main',$data);
		}else{
			redirect();
		}
	}
	public function about()
	{
		$this->session->set_userdata('title',"About");
		$data['content'] = "front/about";
		$this->load->view('main',$data);
	}
	public function contact()
	{
		$this->session->set_userdata('title',"Contact");
		$data['content'] = "front/contact";
		$this->load->view('main',$data);
	}
	public function login()
	{
		$this->session->set_userdata('title',"Login");
		$this->model_front->login();
		$data['content'] = "front/login";
		$this->load->view('main',$data);
	}
	public function logout(){
		$data = array('id_user'=>'','role'=>'','login'=>'');
		$this->session->unset_userdata($data);
		redirect();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */