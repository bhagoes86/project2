<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
	<div class="span9">
<?php
	$row = $this->model_front->profil('pelamar');
?>
	<form method="post" class="form-horizontal">
		<div class="page-header">
		  <h4>My Profil</h4>
		</div>
	<?php echo $this->model_front->getMsg('msg','success');?>
	<div class="control-group">
	  <label class="control-label" for="inputEmail">Username</label>
	  <div class="controls">
		<input type="text" name="user" readonly value="<?php echo $row->username;?>" id="inputEmail" placeholder="Username">
		<?php echo form_error('user');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="inputPassword">Password</label>
	  <div class="controls">
		<input type="password" name="pass" value="<?php echo set_value('pass');?>" id="inputPassword" placeholder="Password">
		<?php echo form_error('pass');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Email</label>
	  <div class="controls">
		<input type="text" name="email" value="<?php echo $row->email;?>" placeholder="Email">
		<?php echo form_error('email');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Firs Name</label>
	  <div class="controls">
		<input type="text" name="fname" value="<?php echo $row->fname;?>" placeholder="First Name">
		<?php echo form_error('fname');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Last Name</label>
	  <div class="controls">
		<input type="text" name="lname" value="<?php echo $row->lname;?>" placeholder="Last Name">
		<?php echo form_error('lname');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Kota</label>
	  <div class="controls">
		<?php 
			$sel_kota = $this->model_front->sel_attributte('kota');
			echo form_dropdown("kota",$sel_kota,$row->id_kota);
		?>
	  </div>
	  <?php echo form_error('kota');?>
	</div>
	<div class="control-group">
	  <label class="control-label">Alamat</label>
	  <div class="controls">
		<textarea name='alamat'><?php echo $row->alamat;?></textarea>
	  </div>
	  <?php echo form_error('alamat');?>
	</div>
	<div class="control-group">
	  <label class="control-label">No Telp/Hp</label>
	  <div class="controls">
		<input type="text" name="telp" value="<?php echo $row->telp;?>" placeholder="No Telp/Hp">
		<?php echo form_error('telp');?>
	  </div>
	</div>
	<div class="control-group">
	  <div class="controls">
		<input type="submit" class="btn" name="edit" value="Ubah Profil">
	  </div>
	</div>
  </form>
	</div>
</div>