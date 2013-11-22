<html>
<head>
    <title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Styles-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<base href='<?php echo base_url();?>' />
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor/ckeditor.js"></script>
	</head>

<body>
<!-- header -->
<div class="container-fluid container2">

</div>
<div class="nav_luar">
<div class="container">
  <div class="navbar">
      <div class="navbar-inner">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="nav-collapse collapse">
            <ul class="nav">


              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url();?>job/userPelamar">User Pelamar</a></li>
                  <li><a href="<?php echo base_url();?>job/userEmployer">User Employer</a></li>
                </ul>
			<li><a href="<?php echo base_url();?>job/Lowongan">Lowongan</a></li>
			<li><a href="<?php echo base_url();?>job/Attribute">Attribute</a></li>
              </li>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

