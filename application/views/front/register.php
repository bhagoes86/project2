<div class="row-fluid">
	<form method="post" class="login form-horizontal">
		<div class="page-header">
		  <h3>Register user</h3>
		</div>
	<?php echo $this->model_front->getMsg('msg','error');?>
	<div class="control-group">
	  <label class="control-label">Username</label>
	  <div class="controls">
		<input type="text" name="user" value="<?php echo set_value('user');?>" placeholder="Username">
		<?php echo form_error('user');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Password</label>
	  <div class="controls">
		<input type="password" name="pass" value="<?php echo set_value('pass');?>" placeholder="Password">
		<?php echo form_error('pass');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Email</label>
	  <div class="controls">
		<input type="text" name="email" value="<?php echo set_value('email');?>" placeholder="Email">
		<?php echo form_error('pass');?>
	  </div>
	</div>
		<div class="control-group">
	  <label class="control-label">Nama Depan</label>
	  <div class="controls">
		<input type="text" name="fname" value="<?php echo set_value('fname');?>" placeholder="Nama Depan">
		<?php echo form_error('fname');?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Nama Belakang</label>
	  <div class="controls">
		<input type="text" name="lname" value="<?php echo set_value('lname');?>" placeholder="Nama Belakang">
		<?php echo form_error('lname');?>
	  </div>
	</div>
		<div class="control-group">
	  <label class="control-label">Kota</label>
	  <div class="controls">
	<select name="kota">
	<option value="">Belum Ada Kota</option>
	</select>
		<?php echo form_error('kota');?>
	  </div>
	</div>
		<div class="control-group">
	  <label class="control-label">Alamat</label>
	  <div class="controls">
		<input type="text" name="alamat" value="<?php echo set_value('alamat');?>" placeholder="Alamat">
		<?php echo form_error('alamat');?>
	  </div>
	</div>
		<div class="control-group">
	  <label class="control-label">Telepon</label>
	  <div class="controls">
		<input type="text" name="telepon" value="<?php echo set_value('telepon');?>" placeholder="Telepon">
		<?php echo form_error('telepon');?>
	  </div>
	</div>
	<div class="control-group">
	  <div class="controls">
		<input type="submit" class="btn" name="login" value="Sign in">
	  </div>
	</div>
  </form>
</div>