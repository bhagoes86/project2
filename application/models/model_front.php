<?php
	class model_front extends CI_Model{
	
		//get Atributte
		function sel_attributte($type){
			$query = $this->db->get_where('attributte',array('type'=>$type))->result();
			foreach($query as $row){
				$tampil[$row->id_attribute] = $row->value;
			}
			return $tampil;
		}
		//Get Lowongan
		function get_lowongan($id=false){
			if($id){
				$this->db->where('id_employer',$id);
			}
			$this->db->join('attributte','attributte.id_attribute = lowongan.id_keahlian');
			$this->db->join('user','user.id_user = lowongan.id_employer');
			$result['data'] = $this->db->get('lowongan')->result();
			$result['count'] = $this->db->count_all_results('lowongan');
			return $result;
		}
		//Get Profil
		function profil($role){
			$this->db->where('role',$role);
			$this->db->where('id_user',$this->session->userdata('id_user'));
			$this->db->join('attributte','attributte.id_attribute=user.id_kota');
			$result = $this->db->get('user');
			return $result->row();
		}
		//Simpan Resume
		function resume(){
			if($this->input->post('edit')){
				//Cek Upload CV
				$row = $this->db->get_where('resume',array('id_resume'=>$this->session->userdata('id_user')))->row();
					//Data Resume
					$data = array('title'=>$this->input->post('title'),
					'pendidikan'=>$this->input->post('pendidikan'),
					'tempat_lahir'=>$this->input->post('tempat_lahir'),
					'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
					'agama'=>$this->input->post('agama'),
					'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
					'id_keahlian'=>$this->input->post('id_keahlian'));
					//Jika upload cv
					if($_FILES['cv']['name']){
						$tipe = explode("/",$_FILES['cv']['type']);
						$type = array('pdf','msword','rar','zip','octet-stream');
						//alert($_FILES['cv']['type']);
						$error = false;
						foreach($type as $type){
							if($tipe[1]==$type){$error = true;}
						}
						if(!$error){
							$validation = false;
							$this->session->set_userdata('error_cv','Upload CV harus berbentuk Document atau Zip');
							$this->session->set_userdata('validation',true);
						}else{
							//Unlink CV
							if($row->cv){
								unlink('assets/document/'.$row->cv);
							}
							//File CV
							$dir = "assets/document/";
							$name = time()."_".$_FILES['cv']['name'];
							move_uploaded_file($_FILES['cv']['tmp_name'],$dir.$name);
							$data['cv'] = $name;
						}
					}
					//Simpan Resume
					$this->db->where('id_resume',$this->session->userdata('id_user'));
					$this->db->update('resume',$data);
					if(!$this->session->userdata('validation')==true){
						$this->session->set_userdata('msg','Simpan resume berhasil');
					}
					$this->session->unset_userdata('validation');
			}
		}
		//Edit Profil pelamar{
		function profil_pelamar(){
			if($this->input->post('edit')){
				//$this->form_validation->set_rules('user','Username','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('fname','First Name','required');
				if(!$this->form_validation->run()==false){
					$data = array(
						'username'=>$this->input->post('user'),
						'email'=>$this->input->post('email'),
						'fname'=>$this->input->post('fname'),
						'lname'=>$this->input->post('lname'),
						'id_kota'=>$this->input->post('kota'),
						'alamat'=>$this->input->post('alamat'),
						'telp'=>$this->input->post('telp')
					);
					if($this->input->post('pass')){
						$data['password'] = md5($this->input->post('pass'));
					}
					$this->db->where('id_user',$this->session->userdata('id_user'));
					$this->db->update('user',$data);
					$this->session->set_userdata('msg','Ubah profil berhasil');
				}
			}
		}
		//Lamar
		function lamar(){
			//Lamar lowongan
			if($this->input->post('lamar')){
				//Cek Upload CV
				$row = $this->db->get_where('resume',array('id_resume'=>$this->session->userdata('id_user')))->row();
				if($row->cv){
					$data = array('id_lowongan'=>$this->input->post('id_lowongan'),
								'id_user'=>$this->session->userdata('id_user'),
								'status'=>0);
					$this->db->insert('lamar',$data);
				}else{
					alert('Maaf, anda harus melengkapi Resume dan CV anda','front/resume');
				}	
			}
			//Batal lamar lowongan
			if($this->input->post('batal_lamar')){
				$this->db->where(array('id_user'=>$this->session->userdata('id_user'),'id_lowongan'=>$this->input->post('id_lowongan')));
				$this->db->delete('lamar');
			}
		}
		//Fungsi Login
		function login(){
			if($this->input->post('login')){
				$this->form_validation->set_rules('user','Username','required');
				$this->form_validation->set_rules('pass','Password','required');
				if(!$this->form_validation->run()==FALSE){
					$row = $this->db->get_where('user',array('username'=>$this->input->post('user'),
						'password'=>md5($this->input->post('pass'))))->row();
					if(!empty($row)){
						$data = array('id_user'=>$row->id_user,'role'=>$row->role,'login'=>true);
						$this->session->set_userdata($data);
						
						//Cek Role User
						if($this->session->userdata('role')=='admin'){
						redirect('job/userPelamar');
						}elseif($this->session->userdata('role')=='employer'){
							redirect('employer');
						}else{
							redirect('front/lowongan');
						}
					}else{
						$this->session->set_userdata('msg',"Username atau Password anda salah");
					}
				}
			}
		}
		//Get Message
		function getMsg($ses,$style){
			if($this->session->userdata($ses)){
				echo "<div class='alert alert-$style'>".$this->session->userdata($ses)."</div>";
				$this->session->unset_userdata($ses);
			}
		}
	}
?>