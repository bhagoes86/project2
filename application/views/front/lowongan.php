<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
<div class="span9">
	<ul class="breadcrumb">
	  <li>Result <?php echo $get_lowongan['count'];?> Lowongan</li>
	</ul>
<?php
	if(empty($get_lowongan['data'])){
		echo "<h3>Lowongan Tidak ditemukan</h3>";
	}else{
?>
	<table class="list-lowongan table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Logo</th>
			  <th>Lowongan</th>
			  <th>Provinsi</th>
			  <th>Detail</th>
			</tr>
		  </thead>
		  <tbody>
	<?php
		$i = 0;
			foreach($get_lowongan['data'] as $row){
				$i++;
				echo"
					<tr>
					  <td>$i</td>
					  <td><img class='logo' src='assets/logo/".$row->logo."'/></td>
					  <td><h4>".$row->lowongan."</h4></td>
					  <td>".$row->provinsi."</td>
					  <td><a href='front/lamar/".$row->id_user."' type='button' class='btn btn-info'>Detail</a></td>
					</tr>
				";
			}
	?>
		  </tbody>
	</table>
<?php } ?>
  </div>
</div>