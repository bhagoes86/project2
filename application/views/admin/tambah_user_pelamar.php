
<div class="container padding-top">
<div class="span11 line">


<table border="0" align="left" class="table table-striped">
<tr>
<td colspan="2" align="right"><a href="<?php echo base_url();?>job/userPelamar"><button class="btn btn-inverse">Kembali</button></a></td>
</tr>
<form action = "<?php echo base_url()?>job/addUserPelamar" method="post">
<tr>
<td></td>
<td><?php echo form_error('username',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Username</label></td>
<td><input type="text" class="input-xxlarge" name="username" placeholder="Masukan Username" value="<?php echo set_value('username');?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('password',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" class="input-xxlarge" name="password" placeholder="Masukan Password"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('email',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><input type="text" class="input-xxlarge" name="email" placeholder="Masukan Email"  value="<?php echo set_value('email');?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('fname',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nama Depan</label></td>
<td><input type="text" class="input-xxlarge" name="fname" placeholder="Masukan Nama Depan Anda"  value="<?php echo set_value('fname');?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('lname',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nama Belakang</label></td>
<td><input type="text" class="input-xxlarge" name="lname" placeholder="Masukan Nama Belakang"  value="<?php echo set_value('lname');?>"/></td>
</tr>
<tr>
<td><label>Kota</label></td>
<td>
<select name="id_kota">
<?php foreach($data as $row) { ?>
<option value="<?php echo $row['id_attribute'];?>"><?php echo $row['value'];?></option>
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
<td><input type="text" class="input-xxlarge" name="alamat" placeholder="Masukan Alamat"  value="<?php echo set_value('alamat');?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('telepon',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Telepon</label></td>
<td><input type="text" class="input-xxlarge" name="telepon" placeholder="Masukan Nomor Telepon"  value="<?php echo set_value('telepon');?>"/></td>
</tr>
<tr>
<td>Opsi</td>
<td><input type="submit" name="kirim" value="Submit" class="btn btn-success"/> &nbsp <input type="reset" value="Reset" class="btn btn-inverse"/></td>
</tr>
</table>
</form>

</div>
</div>
