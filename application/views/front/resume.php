<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
	<div class="span9">
<?php
	$row = $this->db->get_where('resume',array('id_resume'=>$this->session->userdata('id_user')))->row();
	if(!$row){
		$this->db->insert('resume',array('id_resume'=>$this->session->userdata('id_user')));
		redirect('front/resume');
	}
	if($this->input->post('edit')){
		foreach($_POST as $key => $val){
			$get[$key] = $val;
		}
	}else{
		$get = array('title'=>$row->title,'pendidikan'=>$row->pendidikan,'tempat_lahir'=>$row->tempat_lahir,
			'tanggal_lahir'=>$row->tanggal_lahir,'agama'=>$row->agama,'jenis_kelamin'=>$row->jenis_kelamin,
			'keahlian'=>$row->id_keahlian,'cv'=>$row->cv);
	}
?>
	<form method="post" class="form-horizontal" enctype='multipart/form-data'>
		<div class="page-header">
		  <h4>My Profil</h4>
		</div>
	<?php echo $this->model_front->getMsg('msg','success');?>
	<?php echo $this->model_front->getMsg('error_cv','error');?>
	<div class="control-group">
	  <label class="control-label">Pendidikan Terakhir</label>
	  <div class="controls">
		<select name='pendidikan'>
		<?php
			$sel_pendidikan = array('S3','S2','S1','D3','SMK/SMA');
			foreach($sel_pendidikan as $value){
				$s="";
				if($value == $get['pendidikan']){$s='selected';}
				echo "<option value='$value' $s>$value</option>";
			}
		?>
		</select>
		<?php echo form_error('pendidikan');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Gelar</label>
	  <div class="controls">
		<input type="text" name="title" value="<?php echo $get['title'];?>" placeholder="Gelar">
		<?php echo form_error('title');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Tempat Lahir</label>
	  <div class="controls">
		<input type="text" name="tempat_lahir" value="<?php echo $get['tempat_lahir'];?>" placeholder="Tempat Lahir">
		<?php echo form_error('tempat_lahir');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Tanggal Lahir</label>
	  <div class="controls">
		<input type="text" name="tanggal_lahir" value="<?php echo $get['tanggal_lahir'];?>" placeholder="Tanggal Lahir">
		<?php echo form_error('tanggal_lahir');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Agama</label>
	  <div class="controls">
		<input type="text" name="agama" value="<?php echo $get['agama'];?>" placeholder="Agama">
		<?php echo form_error('agama');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Jenis Kelamin</label>
	  <div class="controls">
		<?php 
			$data = array('Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan');
			echo form_dropdown('jenis_kelamin',$data,$get['jenis_kelamin']);?>
		<?php echo form_error('jenis_kelamin');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Keahlian</label>
	  <div class="controls">
		<?php 
			$sel_keahlian = $this->model_front->sel_attributte('keahlian');
			echo form_dropdown("keahlian",$sel_keahlian,$get['keahlian']);
		?>
	  </div>
	  <?php echo form_error('keahlian');?>
	</div>
	<div class="control-group">
	  <label class="control-label">CV</label>
	  <div class="controls">
	<?php
		if($row->cv){
			echo "<a href='assets/document/".$row->cv."'><i class='icon-file'></i>".$row->cv."</a>";
		}else{
			echo "Belum upload CV";
		}
	?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Uplaod CV</label>
	  <div class="controls">
		<input type='file' name='cv' title='Upload CV' />
	  </div>
	</div>
	<div class="control-group">
	  <div class="controls">
		<input type="submit" class="btn" name="edit" value="Simpan Resume">
	  </div>
	</div>
  </form>
	</div>
</div>