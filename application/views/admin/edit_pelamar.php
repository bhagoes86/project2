
<div class="container padding-top">
<div class="span11 line">

<?php foreach($data as $row) { ?>
<table border="0" align="left" class="table table-striped">
<tr>
<td><a href="<?php echo base_url();?>job/userPelamar"><button class="btn btn-inverse">Kembali</button></a></td>
</tr>

<form action = "<?php echo base_url()?>job/editUserPelamar/<?php echo $row['id_user'];?>" method="post">
<tr>
<td><label>Id User</label></td>
<td><input type="text" class="input-xxlarge" name="id" readonly value="<?php echo $row['id_user'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('username',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Username</label></td>
<td><input type="text" class="input-xxlarge" name="username" value="<?php echo $row['username'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('email',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><input type="text" class="input-xxlarge" name="email" value="<?php echo $row['email'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('fname',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nama Depan</label></td>
<td><input type="text" class="input-xxlarge" name="fname" value="<?php echo $row['fname'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('lsername',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nama Belakang</label></td>
<td><input type="text" class="input-xxlarge" name="lname" value="<?php echo $row['lname'];?>"/></td>
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
<td><input type="text" class="input-xxlarge" name="alamat" value="<?php echo $row['alamat'];?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('telepon',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Telepon</label></td>
<td><input type="text" class="input-xxlarge" name="telepon" value="<?php echo $row['telp'];?>"/></td>
</tr>
<tr>
<td>Opsi</td>
<td><input type="submit" name="kirim" value="Save" class="btn btn-success"/> &nbsp <input type="reset" value="Reset" class="btn btn-inverse"/></td>
</tr>
<?php } ?>
</table>
</form>

</div>
</div>
