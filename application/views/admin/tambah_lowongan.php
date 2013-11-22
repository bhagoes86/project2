
<div class="container padding-top">
<div class="span11 line">


<table border="0" align="left" class="table table-striped">
<tr>
<td colspan="2" align="right"><a href="<?php echo base_url();?>job/Lowongan"><button class="btn btn-inverse">Kembali</button></a></td>
</tr>
<form action = "<?php echo base_url()?>job/addLowongan" method="post">
<tr>
<td><label>Perusahaan</label></td>
<td>
<select name ="perusahaan">
<?php 
foreach($perusahaan as $prs) { ?>
<option value="<?php echo $prs['id_user'];?>"><?php echo $prs['perusahaan'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('password',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Provinsi</label></td>
<td>
<select name="provinsi">
<?php 
foreach($provinsi as $prv) { ?>
<option value="<?php echo $prv['value'];?>"><?php echo $prv['value'];?></option>
<?php } ?>
</select> 
</td>
</tr>
<tr>
<td><label>Keahlian</label></td>
<td>
<select name="keahlian">
<?php foreach($keahlian as $kh) { ?>
<option value="<?php echo $kh['id_attribute'];?>"><?php echo $kh['value'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('lowongan',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Lowongan</label></td>
<td><input type="text" class="input-xxlarge" name="lowongan" placeholder="Masukan Nama Belakang"  value="<?php echo set_value('lowongan');?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('deskripsi',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Deskripsi Lowongan</label></td>
<td><textarea cols="10px" name="deskripsi"  id="posting" rows="10"><?php echo set_value('deskripsi');?></textarea></td>
</tr>
<script type="text/javascript">
		var editor = CKEDITOR.replace('posting');
</script>
<tr>
<td>Opsi</td>
<td><input type="submit" name="kirim" value="Submit" class="btn btn-success"/> &nbsp <input type="reset" value="Reset" class="btn btn-inverse"/></td>
</tr>	
</table>
</form>

</div>
</div>
