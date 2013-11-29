<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
<div class="span9">
	<ul class="breadcrumb">
	  <li>Result <?php echo $get_lowongan['count'];?> Lowongan</li>
	</ul>
<?php
	if(empty($get_lowongan['data'])){
		echo "<h3>Tidak ada Lowongan ataupun Pelamar</h3>";
	}else{
?>
	<table class="list-lowongan table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Lowongan</th>
			  <th>Pelamar</th>
			  <th>Detail</th>
			</tr>
		  </thead>
		  <tbody>
	<?php
		$i = 0;
			foreach($get_lowongan['data'] as $row){
			$this->db->where('id_lowongan',$row->id_lowongan);
			$count = $this->db->count_all_results('lamar');
			if(!$count){
				$count = "Belum Ada Pelamar";
			}else{
				$count = "<a href='front/detailLowongan/".$row->id_lowongan."'>".$count." Pelamar</a>";
			}
				$i++;
				echo"
					<tr>
					  <td>$i</td>
					  <td><h4>".$row->lowongan."</h4></td>
					  <td>".$count."</td>
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