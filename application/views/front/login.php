<div class="row-fluid">
	<form method="post" class="login span6 form-horizontal">
		<div class="page-header">
		  <h3 class='text-center'>Login user</h3>
		</div>
	<?php echo $this->model_front->getMsg('msg','error');?>
	<div class="control-group">
	  <label class="control-label" for="inputEmail">Username</label>
	  <div class="controls">
		<input type="text" name="user" value="<?php echo set_value('user');?>" id="inputEmail" placeholder="Username">
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
	  <div class="controls">
		<input type="submit" class="btn" name="login" value="Sign in">
	  </div>
	</div>
  </form>
  <div class='span6'>
	<div class='page-header'><h3 class='text-center'>Register Jadi Pelamar</h3></div>
	<blockquote><p>
		Ingin melamar lowongan kerja disini!!<br>
		Ayo daftar jadi pelamar!!<br>
		Dan isi resume anda serta upload CV anda<br>
		<a href='front/register' class='btn btn-primary'>Register</a>
	</p></blockquote>
  </div>
  
	
</div>