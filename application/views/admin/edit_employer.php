
<div class="container padding-top">
<div class="span11 line">


<table border="0" align="left" class="table table-striped">
<tr>
<td colspan="2" align="right"><a href="<?php echo base_url();?>job/userEmployer"><button class="btn btn-inverse">Kembali</button></a></td>
</tr>
<?php foreach($data as $row) { ?>
<form action = "<?php echo base_url()?>job/editUserEmployer/<?php echo $row['id_user'];?>" method="post" enctype='multipart/form-data'>
<input type='hidden' name='name_logo' value='<?php echo $row['logo'];?>' />
<tr>
<td><label>Id User</label></td>
<td><input type="text" class="input-xxlarge" readonly name="id" placeholder="Masukan Nama Depan Anda"  value="<?php echo $row['id_user'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('fname',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nama Employer</label></td>
<td><input type="text" class="input-xxlarge" name="fname" placeholder="Masukan Nama Depan Anda"  value="<?php echo $row['fname'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('username',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Username</label></td>
<td><input type="text" class="input-xxlarge" name="username" placeholder="Masukan Username" value="<?php echo $row['username'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('email',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><input type="text" class="input-xxlarge" name="email" placeholder="Masukan Email"  value="<?php echo $row['email'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('perusahaan',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nama Perusahaan</label></td>
<td><input type="text" class="input-xxlarge" name="perusahaan" placeholder="Masukan Nama Perusahaan"  value="<?php echo $row['perusahaan'];?>"</td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('tentang',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Tentang Perusahaan</label></td>
<td><textarea cols="10px" name="tentang"  id="posting" rows="10"><?php echo $row['about'];?></textarea></td>
</tr>
<script type="text/javascript">
		var editor = CKEDITOR.replace('posting');
</script>
<tr>
<td><label>Gambar Logo</label></td>
<td><img src="<?php echo base_url();?>assets/logo/<?php echo $row['logo'];?>" width="200" height="100"/></td>
</tr>
<tr>
<td>Logo Perusahaan</td>
<td><input type="file" class="input-xxlarge" name="logo"/></td>
</tr>
<tr>
<td><label>Kota</label></td>
<td>
<select name="id_kota">
<?php foreach($attribute as $row2) { 
if($row2['id_attribute'] == $row['id_kota'])
{
$s = "selected";
}
else
{
$s = "";
}
?>
<option value="<?php echo $row2['id_attribute']?>" <?php echo $s;?>><?php echo $row2['value'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('alamat',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Alamat</label></td>
<td><input type="text" class="input-xxlarge" name="alamat" placeholder="Masukan Alamat"  value="<?php echo $row['alamat'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('telepon',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Telepon</label></td>
<td><input type="text" class="input-xxlarge" name="telepon" placeholder="Masukan Nomor Telepon"  value="<?php echo $row['telp'];?>"/></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td><label>Fax</label></td>
<td><input type="text" class="input-xxlarge" name="fax" placeholder="Masukan Fax"  value="<?php echo $row['fax'];?>"/></td>
</tr>
<tr>
<td>Opsi</td>
<td><input type="submit" name="kirim" value="Submit" class="btn btn-success"/> &nbsp <input type="reset" value="Reset" class="btn btn-inverse"/></td>
</tr>
<?php } ?>
</table>
</form>

</div>
</div>
