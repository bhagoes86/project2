<div class="row-fluid">
	<?php $this->load->view('part/fmenukiri.php');?>
	<div class="span9">
		<h3>Tentang Pelamar</h3>
		<blockquote>
			<dl class="dl-horizontal">
            <dt>Nama Lengkap</dt>
				<dd><?php echo $row->fname." ".$row->lname;?></dd>
            <dt>Email Saya</dt>
				<dd><?php echo $row->email;?></dd>
            <dt>Pendidikan Terakhir</dt>
				<dd><?php echo $row->pendidikan;?></dd>
            <dt>Gelar</dt>
				<dd><?php echo $row->title;?></dd>
            <dt>CV Saya</dt>
				<dd><a href='assets/document/<?php echo $row->cv;?>'><i class='icon-file'></i><?php echo $row->cv;?></a></dd>
            <dt>Tempat Lahir</dt>
				<dd><?php echo $row->tempat_lahir;?></dd>
            <dt>Tanggal Lahir</dt>
				<dd><?php echo $row->tanggal_lahir;?></dd>
            <dt>Agama</dt>
				<dd><?php echo $row->agama;?></dd>
            <dt>Kelamin</dt>
				<dd><?php echo $row->jenis_kelamin;?></dd>
            <dt>Kota</dt>
				<dd><?php echo $row->value;?></dd>
            <dt>Alamat</dt>
				<dd><?php echo $row->alamat;?></dd><br>
			</dl>
</div>