 

<div class="container padding-top">

<div class="span4"><h3>Lowongan</h3></div>
<div class="span11 line">
<table border="0" width="100%">
<td align="left"><a href="<?php echo base_url();?>job/addLowongan"><button class="btn btn-success">Tambah Data</button></a></td>
<td align="right">
    <form class="form-search">
    <input type="text" class="input-large search-query">
    <button type="submit" class="btn btn-inverse">Cari</button>
    </form>
</td>
</table>
<table class="table table-striped">
 <tr>
 <th width="10%">No</th>
   <th>Perusahaan</th>
 <th>Lowongan</th>
 <th>Provinsi</th>
 <th>Keahlian</th>
 <th>Tanggal</th>
 <th>Aktif</th>
 <th width="40%">Opsi</th>
 </tr>

<?php 
$no=1;
foreach($data as $row) {?>
 <tr>
 
 <td><?php echo $no;?></td>
 <td><?php echo $row['perusahaan'];?></td>
 <td width="20%"><?php echo $row['lowongan'];?></td>
 <td><?php echo $row['provinsi'];?></td>
 <td><?php echo $row['value'];?></td>
 <td><?php echo $row['tanggal'];?></td>
 <td><?php echo $row['status'];?></td>
 <td>
 <a href="<?php echo base_url();?>job/detailLowongan/<?php echo $row['id_lowongan'];?>"><button class="btn btn-primary">Detail</button></a> 
 
 &nbsp 
 
 <a href="<?php echo base_url();?>job/editLowongan/<?php echo $row['id_lowongan'];?>"><button class="btn btn-info">Edit</button></a> 
 
 &nbsp 
 <a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" href = "<?php echo base_url();?>job/deleteLowongan/<?php echo $row['id_lowongan'];?>"><button class="btn btn-danger">Delete</button></a> </td>
 </tr>
 <?php
$no++;
 } ?>
 <tr>
 <td colspan="5"><?php echo "Halaman :".$pagination;?></td>
 </tr>
</table>
</div>
</div>
</div>
