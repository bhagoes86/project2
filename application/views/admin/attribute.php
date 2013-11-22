 

<div class="container padding-top">

<div class="span4"><h3>Attributte</h3></div>
<div class="span11 line">
<table border="0" width="100%">
<td align="left"><a href="<?php echo base_url();?>job/addAttribute"><button class="btn btn-success">Tambah Data</button></a></td>
<td align="right">
    <form class="form-search">
    <input type="text" class="input-large search-query">
    <button type="submit" class="btn btn-inverse">Cari</button>
    </form>
</td>
</table>
<table class="table table-striped">
 <tr>
 <th width="10%">Id Attribute</th>
  <th>Tipe</th>
   <th>Nilai</th>
 <th>Opsi</th>
 </tr>
 
<?php 
foreach($data as $row) {?>
 <tr>
 <td><?php echo $row['id_attribute'];?></td>
 <td><?php echo $row['type'];?></td>
 <td><?php echo $row['value'];?></td>
 <td>
 <a href="<?php echo base_url();?>job/editAttribute/<?php  echo $row['id_attribute'];?>"><button class="btn btn-info">Edit</button></a> 
 
 &nbsp 
 <a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" href = "<?php echo base_url();?>job/deleteAttribute/<?php echo $row['id_attribute'];?>"><button class="btn btn-danger">Delete</button></a> </td>
 </tr>
 <?php
 } 
 ?>
 <tr>
 <td colspan="5"><?php //echo "Halaman :".$pagination;?></td>
 </tr>
</table>
</div>
</div>
</div>
