 

<div class="container padding-top">

<div class="span4"><h3>User Pelamar</h3></div>
<div class="span11 line">
<table border="0" width="100%">
<td align="left"><a href="<?php echo base_url();?>job/addUserPelamar"><button class="btn btn-success">Tambah Data</button></a></td>
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
  <th>Username</th>
   <th>Email</th>
 <th>Nama Lengkap</th>
 <th>Kota</th>
 <th>Alamat</th>
 <th>Telepon</th>
 <th>Tipe</th>
 <th width="40%">Opsi</th>
 </tr>
 
<?php 
$no = 1;
foreach($data as $row) {?>
 <tr>
 <td><?php echo $no;?></td>
 <td><?php echo $row['username'];?></td>
 <td><?php echo $row['email'];?></td>
 <td><?php echo $row['fname']." ".$row['lname'];?></td>
 <td><?php echo $row['value'];?></td>
 <td><?php echo $row['alamat'];?></td>
 <td><?php echo $row['telp'];?></td>
 <td><?php echo $row['role'];?></td>
 <td>
 <a href="<?php echo base_url();?>job/editUserPelamar/<?php  echo $row['id_user'];?>"><button class="btn btn-info">Edit</button></a> 
 
 &nbsp 
 <a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" href = "<?php echo base_url();?>job/deleteUserPelamar/<?php echo $row['id_user'];?>"><button class="btn btn-danger">Delete</button></a> </td>
 </tr>
 <?php  
 
 $no++;
 } 
 ?>
 <tr>
 <td colspan="5"><?php echo "Halaman :".$pagination;?></td>
 </tr>
</table>
</div>
</div>
</div>
