<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
	<div class="span9">
<?php
	$action = $this->uri->segment(3);
	if($action=='add'){
?>
	<form method="post" class="form-horizontal" enctype='multipart/form-data'>
		<div class="page-header">
		  <h4>Buat Lowongan <a class='btn btn-inverse' onclick='window.history.go(-1)'>Back</a></h4>
		</div>
	<?php echo $this->model_front->getMsg('msg','success');?>
	<div class="control-group">
	  <label class="control-label">Lowongan</label>
	  <div class="controls">
		<input type="text" name="lowongan" value="<?php echo set_value('lowongan');?>" placeholder="Lowongan">
		<?php echo form_error('lowongan');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Deskripsi</label>
	  <div class="controls">
		<textarea rows='8' name="deskripsi" placeholder='Deskripsi'><?php echo set_value('deskripsi');?></textarea>
		<?php echo form_error('deskripsi');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Provinsi</label>
	  <div class="controls">
		<?php 
			$sel_keahlian = $this->model_front->sel_attributte('provinsi',true);
			echo form_dropdown("provinsi",$sel_keahlian,set_value('provinsi'));
		?>
	  </div>
	  <?php echo form_error('provinsi');?>
	</div>
	<div class="control-group">
	  <label class="control-label">Kategori</label>
	  <div class="controls">
		<?php 
			$sel_kategori = $this->model_front->sel_attributte('keahlian');
			echo form_dropdown("kategori",$sel_kategori,set_value('kategori'));
		?>
	  </div>
	  <?php echo form_error('kategori');?>
	</div>
	<div class="control-group">
	  <div class="controls">
		<input type="submit" class="btn" name="createLowongan" value="Buat Resume">
	  </div>
	</div>
  </form>
<?php
	}elseif($action=='edit'){
	$id = $this->uri->segment(4);
	$row = $this->db->get_where('lowongan',array('id_lowongan'=>$id))->row();
	if($this->input->post('editLowongan')){
		foreach($_POST as $key => $val){
			$get[$key] = $val;
		}
	}else{
		$get = array('lowongan'=>$row->lowongan,'deskripsi'=>$row->deskripsi,'provinsi'=>$row->provinsi,
			'kategori'=>$row->id_keahlian);
	}
?>
	<form method="post" class="form-horizontal" enctype='multipart/form-data'>
	<input type='hidden' name='id_lowongan' value='<?php echo $id;?>' />
		<div class="page-header">
		  <h4>Edit Lowongan <a class='btn btn-inverse' onclick='window.history.go(-1)'>Back</a></h4>
		</div>
	<?php echo $this->model_front->getMsg('msg','success');?>
	<div class="control-group">
	  <label class="control-label">Lowongan</label>
	  <div class="controls">
		<input type="text" name="lowongan" value="<?php echo $get['lowongan'];?>" placeholder="Lowongan">
		<?php echo form_error('lowongan');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Deskripsi</label>
	  <div class="controls">
		<textarea rows='8' name="deskripsi" placeholder='Deskripsi'><?php echo $get['deskripsi'];?></textarea>
		<?php echo form_error('deskripsi');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Provinsi</label>
	  <div class="controls">
		<?php 
			$sel_keahlian = $this->model_front->sel_attributte('provinsi',true);
			echo form_dropdown("provinsi",$sel_keahlian,$get['provinsi']);
		?>
	  </div>
	  <?php echo form_error('provinsi');?>
	</div>
	<div class="control-group">
	  <label class="control-label">Kategori</label>
	  <div class="controls">
		<?php 
			$sel_kategori = $this->model_front->sel_attributte('keahlian');
			echo form_dropdown("kategori",$sel_kategori,$get['kategori']);
		?>
	  </div>
	  <?php echo form_error('kategori');?>
	</div>
	<div class="control-group">
	  <div class="controls">
		<input type="submit" class="btn" name="editLowongan" value="Buat Resume">
	  </div>
	</div>
  </form>
<?php
	}else{
?>
	<div class="well well-small">
	  Result <?php echo $get_lowongan['count'];?> Lowongan
	</div>
	<a href='front/formLowongan/add' class='btn btn-success'>Tambah Lowongan</a>
	<?php echo $this->model_front->getMsg('msg','success');?>
<?php
	if(empty($get_lowongan['data'])){
		echo "<h3>Lowongan Tidak ditemukan</h3>";
	}else{
?>
	<table class="list-lowongan table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Lowongan</th>
			  <th>Kategori</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
	<?php
		$i = 0;
			$confirm = "onsubmit='return confirm(\"Anda yakin ingin menghapusnya,..?\");'";
			foreach($get_lowongan['data'] as $row){
				$i++;
				echo"
					<tr>
					  <td>$i</td>
					  <td><h4>".$row->lowongan."</h4></td>
					  <td>".$row->value."</td>
					  <td>
						<form method='post' $confirm>
							<a href='front/formLowongan/edit/".$row->id_lowongan."' class='btn btn-info'>Edit</a>
							<button type='submit' name='deleteLowongan' value='".$row->id_lowongan."' class='btn btn-info'>Delete</button>
						</form>
					</td>
					</tr>
				";
			}
	?>
		  </tbody>
	</table>
<?php }} ?>
	</div>
</div>