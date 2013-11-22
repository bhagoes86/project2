
<div class="container padding-top">
<div class="span11 line">


<table border="0" align="left" class="table table-striped">
<tr>
<td colspan="2" align="right"><a href="<?php echo base_url();?>job/Lowongan"><button class="btn btn-inverse">Kembali</button></a></td>
<?php foreach($data as $row) { ?>
</tr>
<tr>
<td width="12%"><label>Id Lowongan</label></td>
<td><?php echo $row['id_lowongan'];?></td>
</tr>
<tr>
<td><label>Nama Lengkap</label></td>
<td><?php echo $row['fname']?></td>
</tr>
<tr>
<td><label>Username</label></td>
<td><?php echo $row['username'];?></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><?php echo $row['email'];?></td>
</tr>
<tr>
<td><label>Nama Perusahaan</label></td>
<td><?php echo $row['perusahaan'];?></td>
</tr>
<tr>
<td><label>Lowongan</label></td>
<td><?php echo $row['lowongan'];?></td>
</tr>
<tr>
<td><label>Deskripsi Lowongan</label></td>
<td><?php echo $row['deskripsi'];?></td>
</tr>
<tr>
<td><label>Provinsi</label></td>
<td><?php echo $row['provinsi'];?></td>
</tr>
<tr>
<td><label>Keahlian</label></td>
<td><?php echo $row['value'];?></td>
</tr>
<tr>
<td><label>Logo Perusahaan</label></td>
<td><img src="<?php echo base_url();?>assets/logo/<?php echo $row['logo'];?>" width="200" height="100"/></td>
</tr>
<tr>
<td><label>Tentang Perusahaan</label></td>
<td><?php echo $row['about'];?></td>
</tr>
<tr>
<td><label>Alamat</label></td>
<td><?php echo $row['alamat'];?></td>
</tr>
<tr>
<td><label>Telepon</label></td>
<td><?php echo $row['telp'];?></td>
</tr>
<tr>
<td><label>Fax</label></td>
<td><?php echo $row['fax'];?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
