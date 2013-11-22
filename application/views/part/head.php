<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Jobs-Online - <?php echo $this->session->userdata('title');?></title>
    <!-- Bootstrap Styles-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/stylefront.css" rel="stylesheet">
	<base href='<?php echo base_url();?>' />
</head>
<body>
<!--Navigation Bar-->
<div class="navbar navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
	  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="brand" href="<?php echo base_url();?>">Jobs-Online</a>
	  <div class="nav-collapse collapse">
		<ul class="nav">
	<?php
		$page = array(
			'Home'=>"",
			'Lowongan'=>"front/Lowongan",
			'About'=>"front/About",
			'Contact'=>"front/Contact",
			'Login'=>"front/Login",
		);
		if($this->session->userdata('login')){
			unset($page['Login']);
			$page['Logout'] = "front/logout";
		}
		foreach($page as $page => $halaman){
			$s = "";
			if($page==$this->session->userdata('title')){$s="class='active'";}
			echo "<li $s><a href='$halaman'>$page</a></li>";
		}
	?>
		</ul>
	  </div>
	</div>
  </div>
</div>
<div class='visible-desktop' style='height:60px;'></div>