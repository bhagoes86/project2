<!--Head-->
<?php $this->load->view("part/head");?>
<!--Content-->
<?php
	if($content=="home"){
		$this->load->view("home.php");
	}else{
		echo "<div id='content' class='container'>";
			$this->load->view($content);
			
		echo "</div>";
	}
?>
<!--Footer-->
<?php $this->load->view("part/footer");?>
