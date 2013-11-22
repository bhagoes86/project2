<div class="span3 bs-docs-sidebar">
	<form action='<?php echo base_url();?>front/lowongan' >
		<h4>Cari Lowongan :</h4>
		<div class="control-group">
		  <label class="control-label" for="inputProvinsi">Provinsi</label>
		  <div class="controls">
			<?php 
				$sel_provinsi = $this->model_front->sel_attributte('provinsi');
				$style = "class='span12'";
				echo form_dropdown("provinsi",$sel_provinsi,"",$style);
			?>
		  </div>
        </div>
		<div class="control-group">
		  <label class="control-label" for="inputkeahlian">Keahlian</label>
		  <div class="controls">
			<?php 
				$sel_keahlian = $this->model_front->sel_attributte('keahlian');
				$style = "class='span12'";
				echo form_dropdown("keahlian",$sel_keahlian,"",$style);
			?>
		  </div>
        </div>
		<div class="control-group">
		  <label class="control-label" for="inputsrc">Cari</label>
		  <div class="controls">
			<input class='span12' name='src' type="text" id="inputsrc" placeholder="Cari Lowongan">
		  </div>
		  <div class="controls">
			<input type="submit" name='search' value='Search' class="btn span12">
		  </div>
		</div>
	</form>
	<h4>Menu</h4>
	<ul class="nav nav-tabs nav-stacked">
	<?php
		$menu['Cari Lowongan'] = "front/lowongan"; 
		if($this->session->userdata('login')){
			$menu['Profil'] = "front/profil";
			if($this->session->userdata('role')=='pelamar'){
				$menu['Resume'] = "front/resume";
			}
			if($this->session->userdata('role')=='employer'){
				$menu['Buat Lowongan'] = "front/formLowongan";
			}
		}
		foreach($menu as $menu => $halaman){
			echo "<li><a href='$halaman'>$menu</a></li>";
		}
	?>
	</ul>
</div>