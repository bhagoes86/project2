<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
	<div class="span9">
<?php
	foreach($get_lowongan as $row){
?>
		<h3>Tentang Perusahaan</h3>
		<blockquote>
			<dl class="dl-horizontal">
            <dt>Logo</dt>
				<dd><img src='assets/logo/<?php echo $row->logo;?>' class='logo'/></dd>
            <dt>Perushaan</dt>
				<dd><h4><?php echo $row->perusahaan;?></h4></dd>
            <dt>Tentang Perusahaan</dt>
				<dd><?php echo $row->about;?></dd>
            <dt>Alamat</dt>
				<dd><?php echo $row->alamat;?></dd>
          </dl>
		</blockquote>
		
		<br>
		<h3>Tentang Lowongan</h3>
		<blockquote>
			<dl class="dl-horizontal">
            <dt>Lowongan</dt>
				<dd><h4><?php echo $row->lowongan;?></h4></dd>
            <dt>Deskripsi Lowongan</dt>
				<dd><?php echo $row->deskripsi;?></dd>
            <dt>Provinsi</dt>
				<dd><?php echo $row->about;?></dd>
            <dt>Alamat</dt>
				<dd><?php echo $row->alamat;?></dd><br>
	<?php 
		if($this->session->userdata('role')=='pelamar'){
			$row1 = $this->db->get_where('lamar',array('id_lowongan'=>$row->id_lowongan,'id_user'=>$this->session->userdata('id_user')))->row();
	?>
			<form method='post'>
				<input type='hidden' name='id_lowongan' value='<?php echo $row->id_lowongan;?>' />
				<dt>Lamar</dt>
	<?php 
			if($row1){
				echo "<dd><input type='submit' class='btn btn-info' name='batal_lamar' value='Batal Lamar'></dd>";
			}else{
				echo "<dd><input type='submit' class='btn btn-info' name='lamar' value='Lamar'></dd>";
			}
	?>
			</form>
<?php 	}	?>
          </dl>
		</blockquote>
	</div>
<?php } ?>
</div>