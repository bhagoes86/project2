<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class job extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('modeljob');
		$this->form_validation->set_message('required','Data %s Harus Diisi');
		$this->form_validation->set_message('valid_email','%s Harus Benar');
		if(!$this->session->userdata('role')=='admin'){
			redirect();
		}
	}
//____________________________Pelamar____________________________________________	
public function userPelamar()
	{
		$data['data'] = $this->modeljob->getPelamar();
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = "user_pelamar";
		$this->load->view('admin/admin',$data);
	}
public function addUserPelamar()
	{
	$type = "kota";
	$data['data'] = $this->modeljob->getAttribute($type);
	$data['content'] = "tambah_user_pelamar";
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('password','Password','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('fname','Nama Depan','required');
	$this->form_validation->set_rules('lname','Nama Belakang','required');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('telepon','Telepon','required');


	if(isset($_POST['kirim'])){
		if($this->form_validation->run() == TRUE){
		$this->modeljob->addUserPelamar();
		echo "<script>alert ('Sukses Menambah User Pelamar') ; location = '".base_url()."job/userPelamar'</script>";
		}else{
		$this->load->view('admin/admin',$data);
		}
	}else{
		$this->load->view('admin/admin',$data);
	}
	}
	
	
public function deleteUserPelamar(){
	$this->modeljob->deleteUserPelamar();
	redirect("job/userPelamar");
	}
public function editUserPelamar(){
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('fname','Nama Depan','required');
	$this->form_validation->set_rules('lname','Nama Belakang','required');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('telepon','Telepon','required');
	$type = "kota";
	$data['attribute'] = $this->modeljob->getAttribute($type);
	$data['data'] = $this->modeljob->getDataUser();
	$data['content'] = "edit_pelamar";

	if(isset($_POST['kirim']))
	{
		if($this->form_validation->run() == TRUE)
		{
			$this->modeljob->editDataPelamar();
			echo "<script>alert ('Sukses Menambah Edit Data Pelamar') ; location = '".base_url()."job/userPelamar'</script>";
		}else
		{
		$this->load->view('admin/admin',$data);
		
		}
	}else
	{
		$this->load->view('admin/admin',$data);
	}
	}
//____________________________Employer____________________________________________

public function userEmployer()
	{
		$data['data'] = $this->modeljob->getDataEmployer();
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = "user_employer";
		$this->load->view('admin/admin',$data);
	}
public function addUserEmployer(){
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('password','Password','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('fname','Nama Depan','required');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('telepon','Telepon','required');
	$this->form_validation->set_rules('perusahaan','Nama Perusahaan','required');
	$this->form_validation->set_rules('tentang','Tentang Perusahaan','required');

	$type = "kota";
	$data['data'] = $this->modeljob->getAttribute($type);
	$data['content'] = "tambah_user_employer";

	if(isset($_POST['kirim'])){
		if($this->form_validation->run() == TRUE){
			$this->modeljob->addUserEmployer();
			echo "<script>alert ('Sukses Menambah Data Employer') ; location = '".base_url()."job/userEmployer'</script>";

		}else{
			$this->load->view("admin/admin",$data);
		}
	}else{
		$this->load->view("admin/admin",$data);
	}
}
public function detailEmployer(){
	$data['content'] = "detail_employer";
	$data['data'] = $this->modeljob->getDataUser();
	$this->load->view("admin/admin",$data);
}
public function editUserEmployer(){
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('fname','Nama Depan','required');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('telepon','Telepon','required');
	$this->form_validation->set_rules('perusahaan','Nama Perusahaan','required');
	$this->form_validation->set_rules('tentang','Tentang Perusahaan','required');

	$type = "kota";
	$data['attribute'] = $this->modeljob->getAttribute($type);
	$data['data'] = $this->modeljob->getDataUser();
	$data['content'] = "edit_employer";

	if(isset($_POST['kirim']))
	{
		if($this->form_validation->run() == TRUE)
		{
			$this->modeljob->editDataEmployer();
			echo "<script>alert ('Sukses Edit Data Employer') ; location = '".base_url()."job/userEmployer'</script>";
		}else
		{
		$this->load->view('admin/admin',$data);
		
		}
	}else
	{
		$this->load->view('admin/admin',$data);
	}
	}
public function deleteUserEmployer(){
	$this->modeljob->deleteDataEmployer();
	redirect('job/userEmployer');
}

//____________________________Lowongan____________________________________________
public function Lowongan(){
	$data['content'] = "lowongan";
	$data['data'] = $this->modeljob->getDataLowongan();
	$data['pagination'] = $this->pagination->create_links();
	$this->load->view("admin/admin",$data);
}
public function detailLowongan(){
	$data['content'] = "detail_lowongan";
	$data['data'] = $this->modeljob->detailLowongan();
	$this->load->view("admin/admin",$data);	
}
public function addLowongan(){
	$provinsi = "provinsi";
	$keahlian = "keahlian";
	$this->form_validation->set_rules('lowongan','Lowongan','required');
	$this->form_validation->set_rules('deskripsi','Deskripsi','required');
	$data['content'] = "tambah_lowongan";
	$data['perusahaan'] = $this->modeljob->getDataPerusahaan();
	$data['provinsi'] = $this->modeljob->getAttribute($provinsi);
	$data['keahlian'] = $this->modeljob->getAttribute($keahlian);
	if(isset($_POST['kirim'])){
		if($this->form_validation->run() == TRUE){
			$this->modeljob->addlowongan();
			echo "<script>alert ('Sukses Menambah Lowongan') ; location = '".base_url()."job/Lowongan'</script>";
			}else{
			$this->load->view("admin/admin",$data);
			}
	}
	else{
	$this->load->view("admin/admin",$data);
	}
}
public function editLowongan(){
	$provinsi = "provinsi";
	$keahlian = "keahlian";
	$this->form_validation->set_rules('lowongan','Lowongan','required');
	$this->form_validation->set_rules('deskripsi','Deskripsi','required');
	$data['perusahaan'] = $this->modeljob->getDataPerusahaan();
	$data['content'] = "edit_lowongan";
	$data['provinsi'] = $this->modeljob->getAttribute($provinsi);
	$data['keahlian'] = $this->modeljob->getAttribute($keahlian);
	$data['data'] = $this->modeljob->detailLowongan();
	if(isset($_POST['kirim'])){
		if($this->form_validation->run() == TRUE){
			$this->modeljob->editLowongan();
			echo "<script>alert ('Sukses Edit Lowongan') ; location = '".base_url()."job/Lowongan'</script>";
		}else{
			$this->load->view("admin/admin",$data);
		}
	}else{
	$this->load->view("admin/admin",$data);
	}
}
public function deleteLowongan(){
	$this->modeljob->deleteLowongan();
	redirect('job/Lowongan');
}
public function Attribute(){
	$data['content'] = "attribute";
	$data['data'] = $this->modeljob->getallAttribute();
	$data['pagination'] = $this->pagination->create_links();
	$this->load->view("admin/admin",$data);
}
public function addAttribute(){
	$data['content'] = "tambah_attribute";
	$this->form_validation->set_rules('type','Tipe','required');
	$this->form_validation->set_rules('value','Nilai','required');
	if(isset($_POST['kirim'])){
		if($this->form_validation->run() == TRUE){
			$this->modeljob->addAttribute();
			echo "<script>alert ('Sukses Menambah Attribute') ; location = '".base_url()."job/Attribute'</script>";
		}else{
		$this->load->view("admin/admin",$data);
		}
	}else{
		$this->load->view("admin/admin",$data);	
	}
}
public function deleteAttribute(){
	$this->modeljob->deleteAttribute();
	redirect("job/Attribute");
}
public function editAttribute(){
	$data['content'] = "edit_attribute";
	$data['data'] = $this->modeljob->getDataAttribute();
	$this->form_validation->set_rules('type','Tipe','required');
	$this->form_validation->set_rules('value','Nilai','required');
	if(isset($_POST['kirim'])){
		if($this->form_validation->run() == TRUE){
			$this->modeljob->editAttribute();
			echo "<script>alert ('Sukses Edit Attribute') ; location = '".base_url()."job/Attribute'</script>";
		}else{
		$this->load->view("admin/admin",$data);
		}
	}else{
		$this->load->view("admin/admin",$data);	
	}
}
}





/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */