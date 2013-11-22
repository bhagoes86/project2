<div class="row-fluid">
	<form method="post" class="login form-horizontal">
		<div class="page-header">
		  <h3>Register user</h3>
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
</div>