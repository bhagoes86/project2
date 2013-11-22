
<div class="container padding-top">
<div class="span11 line">


<table border="0" align="left" class="table table-striped">
<tr>
<td colspan="2" align="right"><a href="<?php echo base_url();?>job/Attribute"><button class="btn btn-inverse">Kembali</button></a></td>
</tr>
<form action = "<?php echo base_url()?>job/addAttribute" method="post">
<tr>
<td></td>
<td><?php echo form_error('type',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Tipe</label></td>
<td><input type="text" class="input-xxlarge" name="type" placeholder="Masukan Nama Belakang"  value="<?php echo set_value('type');?>"/></td>
</tr>
<tr>
<td></td>
<td><?php echo form_error('value',"<div class='alert alert-error'><b>","</b></div>"); ?></td>
</tr>
<tr>
<td><label>Nilai</label></td>
<td><input type="text" class="input-xxlarge" name="value" placeholder="Masukan Nama Belakang"  value="<?php echo set_value('vaue');?>"/></td>
</tr>
<tr>
<td>Opsi</td>
<td><input type="submit" name="kirim" value="Submit" class="btn btn-success"/> &nbsp <input type="reset" value="Reset" class="btn btn-inverse"/></td>
</tr>	
</table>
</form>

</div>
</div>
