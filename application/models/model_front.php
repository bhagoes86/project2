<?php
	class model_front extends CI_Model{
	
		//Register
		function register(){
			if($this->input->post('register')){
				$this->form_validation->set_rules('user','Username','required');
				$this->form_validation->set_rules('pass','Password','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('fname','First Name','required');
				$this->form_validation->set_rules('lname','Last Name','required');
				$this->form_validation->set_rules('kota','Kota','required');
				$this->form_validation->set_rules('alamat','Alamat','required');
				$this->form_validation->set_rules('telepon','Telepon','required');
				if(!$this->form_validation->run()==false){
					//Data
					$data['username'] = $this->input->post('user');
					$data['password'] = md5($this->input->post('pass'));
					$data['email'] = $this->input->post('email');
					$data['fname'] = $this->input->post('fname');
					$data['lname'] = $this->input->post('lname');
					$data['id_kota'] = $this->input->post('kota');
					$data['alamat'] = $this->input->post('alamat');
					$data['telp'] = $this->input->post('telepon');
					$data['role'] = 'pelamar';
					//Insert data
					$this->session->set_userdata('msg','Register berhasil mari login <a href="front/Login">Login</a>');
					$this->db->insert('user',$data);
					unset($_POST);
				}
			}
		}
		//get Atributte
		function sel_attributte($type,$val=false){
			$query = $this->db->get_where('attributte',array('type'=>$type))->result();
			foreach($query as $row){
				$tampil[''] = "--Semua--";
				if($val){
					$tampil[$row->value] = $row->value;
				}else{
					$tampil[$row->id_attribute] = $row->value;
				}
			}
			return $tampil;
		}
		//Get Lowongan
		function get_lowongan($id=false){
			$this->db->start_cache();
			if($id){
				$this->db->where('id_employer',$id);
			}
			$this->db->join('attributte','attributte.id_attribute = lowongan.id_keahlian');
			$this->db->join('user','user.id_user = lowongan.id_employer');
			//Search
			if($this->input->post('search')){
				$this->db->like(array('lowongan'=>$this->input->post('src'),
					'id_keahlian'=>$this->input->post('keahlian'),
					'provinsi'=>$this->input->post('provinsi')));
			}
			$this->db->from('lowongan');
			$this->db->stop_cache();
			
			$result['data'] = $this->db->get()->result();
			$result['count'] = $this->db->count_all_results();
			$this->db->flush_cache();
			return $result;
		}
		//Get lowongan by id
		function getLowonganId($id){
			$this->db->join('attributte','attributte.id_attribute=lowongan.id_keahlian');
			$this->db->join('user','user.id_user=lowongan.id_employer');
			$this->db->where('id_lowongan',$id);
			return $this->db->get('lowongan')->result();
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
		//Aksi CRUD lowongan
		function lowonganAksi(){
			//tambah lowongan
			if($this->input->post('createLowongan')){
				$this->form_validation->set_rules('lowongan','Lowongan','required');
				$this->form_validation->set_rules('deskripsi','Deskripsi','required');
				$this->form_validation->set_rules('provinsi','Provinsi','required');
				$this->form_validation->set_rules('kategori','Kategori','required');
				if(!$this->form_validation->run()==FALSE){
					//Buat data
					$data['id_employer'] = $this->session->userdata('id_user');
					$data['lowongan'] = $this->input->post('lowongan');
					$data['deskripsi'] = $this->input->post('deskripsi');
					$data['provinsi'] = $this->input->post('provinsi');
					$data['id_keahlian'] = $this->input->post('kategori');
					$data['tanggal'] = date('d-m-Y');
					$data['status'] = 1;
					//Insert data
					$this->db->insert('lowongan',$data);
					$this->session->set_userdata('msg','Buat Lowongan berhasil <a href="front/formLowongan">lihat</a>');
				}
			}
			//Edit Lowongan
			if($this->input->post('editLowongan')){
				$this->form_validation->set_rules('lowongan','Lowongan','required');
				$this->form_validation->set_rules('deskripsi','Deskripsi','required');
				$this->form_validation->set_rules('provinsi','Provinsi','required');
				$this->form_validation->set_rules('kategori','Kategori','required');
				if(!$this->form_validation->run()==FALSE){
					//Buat data
					$data['lowongan'] = $this->input->post('lowongan');
					$data['deskripsi'] = $this->input->post('deskripsi');
					$data['provinsi'] = $this->input->post('provinsi');
					$data['id_keahlian'] = $this->input->post('kategori');
					$data['tanggal'] = date('d-m-Y');
					$data['status'] = 1;
					//Insert data
					$this->db->where('id_lowongan',$this->input->post('id_lowongan'));
					$this->db->update('lowongan',$data);
					$this->session->set_userdata('msg','Edit Lowongan berhasil <a href="front/formLowongan">lihat</a>');
				}
			}
			//Delete Lowongan
			if($this->input->post('deleteLowongan')){
				$this->db->where('id_lowongan',$this->input->post('deleteLowongan'));
				$this->db->delete('lowongan');
				$this->session->set_userdata('msg','Delete Lowongan berhasil');
			}
		}
		//Edit Profil employer
		function profil_employer(){
			if($this->input->post('edit')){
				//$this->form_validation->set_rules('user','Username','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('fname','Nama Lengkap','required');
				$this->form_validation->set_rules('perusahaan','Perusahaan','required');
				$this->form_validation->set_rules('about','about','required');
				if(!$this->form_validation->run()==false){
					$data = array(
						'username'=>$this->input->post('user'),
						'email'=>$this->input->post('email'),
						'fname'=>$this->input->post('fname'),
						'perusahaan'=>$this->input->post('perusahaan'),
						'about'=>$this->input->post('about'),
						'id_kota'=>$this->input->post('kota'),
						'alamat'=>$this->input->post('alamat'),
						'telp'=>$this->input->post('telp')
					);
					//Jika upload Gambar
					if($_FILES['logo']['name']){
						unlink('assets/logo/'.$this->input->post('dlogo'));
						$dir = "assets/logo/";
						$name = time()."_".$_FILES['logo']['name'];
						move_uploaded_file($_FILES['logo']['tmp_name'],$dir.$name);
						$data['logo'] = $name;
					}
					if($this->input->post('pass')){
						$data['password'] = md5($this->input->post('pass'));
					}
					$this->db->where('id_user',$this->session->userdata('id_user'));
					$this->db->update('user',$data);
					$this->session->set_userdata('msg','Ubah profil berhasil');
				}
			}
		}
		//Edit Profil pelamar
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
		//Get Pelamar
		function pelamar($id){
			$this->db->join('user','user.id_user=lamar.id_user');
			$this->db->join('resume','resume.id_resume=lamar.id_user');
			$this->db->join('lowongan','lowongan.id_lowongan=lamar.id_lowongan');
			$this->db->join('attributte','attributte.id_attribute=lowongan.id_keahlian');
			$this->db->where('lowongan.id_lowongan',$id);
			$result = $this->db->get('lamar')->result();
			return $result;
		}
		//Detail Pelamar
		function detailPelamar($id){
			$this->db->join('attributte','attributte.id_attribute=user.id_kota');
			$this->db->join('resume','resume.id_resume=user.id_user');
			$this->db->where(array('id_user'=>$id,'role'=>'pelamar'));
			return $this->db->get('user')->row();
		}
		//Lamar
		function lamar(){
			//Lamar lowongan
			if($this->input->post('lamar')){
				//Cek Upload CV
				$row = $this->db->get_where('resume',array('id_resume'=>$this->session->userdata('id_user')))->row();
				if($row&&$row->cv){
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
							redirect('front/employer');
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