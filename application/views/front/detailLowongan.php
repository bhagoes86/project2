<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
	<div class="span9">
<?php
	foreach($get_lowongan['data'] as $row){
?>
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
		<br>
		<h3>Pelamar Lowongan</h3>
		<blockquote>
			<table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pelamar</th>
                  <th>Data CV</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
<?php
		$i = 0;
		foreach($get_pelamar as $row1){
			$i++;
			echo "<tr>
				<td>$i</td>
				<td>".$row1->fname." ".$row1->lname."</td>
				<td><a href='assets/document/".$row1->cv."'><i class='icon-file'></i> ".$row1->cv."</a></td>
				<td><a href='front/detailPelamar/".$row1->id_user."'>Detail</a></td>
			</tr>";
		}
?>
              </tbody>
            </table>
		</blockquote>
	</div>
<?php } ?>
</div>