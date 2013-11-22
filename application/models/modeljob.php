<?php
class modeljob extends CI_Model{

public function getPelamar(){
	$offset = $this->uri->segment(3);
	if(empty($offset)){
	$offset = 0;
	}
	$config['base_url'] = "job/userPelamar";
	$config['per_page'] = 10;
	$this->db->where('role','pelamar');
	$config['total_rows'] = $this->db->count_all_results('user');
	$config['prev_link'] = "<< Sebelumnya";
	$config['next_link'] = "Selanjutnya >>";
	$this->pagination->initialize($config);
	$num = $config['per_page']; 
	$query = $this->db->query("SELECT user.*,attributte.* FROM user,attributte WHERE user.id_kota = attributte.id_attribute AND user.role = 'pelamar' limit $offset,$num");
	return $query->result_array();
}
public function getAttribute($type){
	$query = $this->db->query("SELECT * FROM attributte WHERE type = '$type'");
	return $query->result_array();
}
public function addUserPelamar(){
	$data = array(
	'id_user' => "",
	'username' => $this->input->post('username'),
	'password' => md5($this->input->post('password')),
	'email' => $this->input->post('email'),
	'fname' => $this->input->post('fname'),
	'lname' => $this->input->post('lname'),
	'id_kota' => $this->input->post('id_kota'),
	'alamat' => $this->input->post('alamat'),
	'telp' => $this->input->post('telepon'),
	'role' => "pelamar"
	);
	$this->db->insert('user',$data);
}
public function editDataPelamar(){
	$id = $this->input->post('id');
	$data = array(
	'username' => $this->input->post('username'),
	'password' => md5($this->input->post('password')),
	'email' => $this->input->post('email'),
	'fname' => $this->input->post('fname'),
	'lname' => $this->input->post('lname'),
	'id_kota' => $this->input->post('id_kota'),
	'alamat' => $this->input->post('alamat'),
	'telp' => $this->input->post('telepon'),
	);
	$this->db->where('id_user',$id);
	$this->db->update('user',$data);
}
public function getDataUser(){
	$id = $this->uri->segment(3);
	$sql = "SELECT user.*,attributte.* FROM user,attributte WHERE user.id_kota = attributte.id_attribute AND id_user = '$id'";
	$query = $this->db->query($sql);
	return $query->result_array();
}
public function deleteUserPelamar(){
	$id = $this->uri->segment(3);
	$this->db->delete('user',array('id_user' => $id));
}
//_____________________________________employer_______________________
public function getDataEmployer(){
	$offset = $this->uri->segment(3);
	if(empty($offset)){
	$offset = 0;
	}
	$config['base_url'] = "job/userEmployer";
	$config['per_page'] = 10;
	$this->db->where('role','employer');
	$config['total_rows'] = $this->db->count_all_results('user');
	$config['prev_link'] = "<< Sebelumnya";
	$config['next_link'] = "Selanjutnya >>";
	$this->pagination->initialize($config);
	$num = $config['per_page']; 
	$query = $this->db->query("SELECT user.*,attributte.* FROM user,attributte WHERE user.id_kota = attributte.id_attribute AND user.role = 'employer' limit $offset,$num");
	return $query->result_array();
}
public function addUserEmployer(){
	$tempat = 'assets/logo/';
	$name = time()."-".$_FILES['logo']['name'];
	$tmpname = $_FILES['logo']['tmp_name'];
	$upload = $tempat.$name;
	move_uploaded_file($tmpname,$upload);
	$data = array(
	'id_user' => "",
	'username' => $this->input->post('username'),
	'password' => md5($this->input->post('password')),
	'email' => $this->input->post('email'),
	'perusahaan' => $this->input->post('perusahaan'),
	'about' => $this->input->post('tentang'),
	'logo' => $name,
	'fname' => $this->input->post('fname'),
	'lname' => $this->input->post('lname'),
	'id_kota' => $this->input->post('id_kota'),
	'alamat' => $this->input->post('alamat'),
	'telp' => $this->input->post('telepon'),
	'role' => "employer"
	);
	$this->db->insert('user',$data);
}
public function editDataEmployer(){
	$id = $this->input->post('id');
	$data = array();
	if($_FILES['logo']['name']){
		unlink('assets/logo/'.$this->input->post('name_logo'));
		$tempat = 'assets/logo/';
		$name = time()."-".$_FILES['logo']['name'];
		$tmpname = $_FILES['logo']['tmp_name'];
		$upload = $tempat.$name;
		move_uploaded_file($tmpname,$upload);
		$data += array('logo' => $name);
	}
	$data += array(
	'username' => $this->input->post('username'),
	'password' => md5($this->input->post('password')),
	'email' => $this->input->post('email'),
	'fname' => $this->input->post('fname'),
	'perusahaan' => $this->input->post('perusahaan'),
	'about' => $this->input->post('tentang'),
	'id_kota' => $this->input->post('id_kota'),
	'alamat' => $this->input->post('alamat'),
	'telp' => $this->input->post('telepon'),
	'fax' => $this->input->post('fax')
	);
	$this->db->where('id_user',$id);
	$this->db->update('user',$data);
}
public function deleteDataEmployer(){
	$id = $this->uri->segment(3);
	$logo = $this->uri->segment(4);
	$this->db->delete('user',array('id_user' => $id));
	return unlink('assets/logo/'.$logo);
}
//_____________________________________Lowongan_______________________
public function getDataLowongan(){

	$offset = $this->uri->segment(3);
	if(empty($offset)){
	$offset = 0;
	}
	$config['base_url'] = "job/Lowongan";
	$config['per_page'] = 10;
	$config['total_rows'] = $this->db->count_all('lowongan');
	$config['prev_link'] = "<< Sebelumnya";
	$config['next_link'] = "Selanjutnya >>";
	$this->pagination->initialize($config);
	$num = $config['per_page']; 
	$query = $this->db->query("SELECT lowongan.*,attributte.*,user.* FROM lowongan,attributte,user WHERE lowongan.id_employer = user.id_user AND lowongan.id_keahlian = attributte.id_attribute ORDER BY id_lowongan DESC limit $offset,$num");
	return $query->result_array();
}
public function detailLowongan(){
	$id = $this->uri->segment(3);
	$query = $this->db->query("SELECT lowongan.*,attributte.*,user.* FROM lowongan,attributte,user WHERE lowongan.id_employer = user.id_user AND lowongan.id_keahlian = attributte.id_attribute AND lowongan.id_lowongan = '$id'");
	return $query->result_array();
}
public function getDataPerusahaan(){
	$query = $this->db->query("SELECT id_user,perusahaan FROM user WHERE role='employer'");
	return $query->result_array();
	}
public function addLowongan(){
	$date = date('d-M-Y');
	$data = array(
	'id_lowongan' => "",
	'id_employer' => $this->input->post('perusahaan'),
	'lowongan' => $this->input->post('lowongan'),
	'deskripsi' => $this->input->post('deskripsi'),
	'provinsi'=> $this->input->post('provinsi'),
	'id_keahlian' => $this->input->post('keahlian'),
	'tanggal' => $date,
	'status' => "1"
	);
	$this->db->insert('lowongan',$data);
}
public function editLowongan(){
	$id = $this->uri->segment(3);
	$date = date('d-M-Y');
	$data = array(
	'id_employer' => $this->input->post('perusahaan'),
	'lowongan' => $this->input->post('lowongan'),
	'deskripsi' => $this->input->post('deskripsi'),
	'provinsi'=> $this->input->post('provinsi'),
	'id_keahlian' => $this->input->post('keahlian'),
	'tanggal' => $date,
	'status' => $this->input->post('status')
	);
	$this->db->where('id_lowongan',$id);
	$this->db->update('lowongan',$data);
}	
public function deleteLowongan(){
	$id = $this->uri->segment(3);
	$this->db->delete('lowongan',array('id_lowongan' => $id));
}
//___________________________________________Attribute_______________________________
public function getallAttribute(){
	$offset = $this->uri->segment(3);
	if(empty($offset)){
	$offset = 0;
	}
	$config['base_url'] = "job/Attribute";
	$config['per_page'] = 10;
	$this->db->where('role','pelamar');
	$config['total_rows'] = $this->db->count_all_results('user');
	$config['prev_link'] = "<< Sebelumnya";
	$config['next_link'] = "Selanjutnya >>";
	$this->pagination->initialize($config);
	$num = $config['per_page']; 
	$query = $this->db->query("SELECT * FROM attributte ORDER BY type ASC limit $offset,$num");
	return $query->result_array();
}
public function addAttribute(){
	$data = array(
	'type' => $this->input->post('type'),
	'value' => $this->input->post('value')
	);
	$this->db->insert('attributte',$data);
}
public function deleteAttribute(){
	$id = $this->uri->segment(3);
	$this->db->delete('attributte',array('id_attribute' => $id));
}
public function getDataAttribute(){
	$id = $this->uri->segment(3);
	$query = $this->db->query("SELECT * FROM attributte WHERE id_attribute = '$id'");
	return $query->result_array();
}
public function editAttribute(){
	$id = $this->uri->segment(3);
	$data = array(
	'type' => $this->input->post('type'),
	'value' => $this->input->post('value')
	);
	$this->db->where('id_attribute',$id);
	$this->db->update('attributte',$data);
}
}
?>