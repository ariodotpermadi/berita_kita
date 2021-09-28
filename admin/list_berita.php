<!DOCTYPE html>
<html>
<head>
<title>Dasboard Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "layout/header.php";

if (!$_SESSION['login']){
    header('location:login.php');
}

$query = mysqli_query($con, "SELECT * FROM kategori RIGHT JOIN berita ON kategori.id_kategori=berita.id_kategori 
order by berita.id_kategori DESC");
$data = mysqli_fetch_assoc($query); 
?>

<div class="container-fluid">
<h2>SIAR.COM</h2>
<a href="tambah_berita.php"><button class="btn btn-primary">+Tambah Berita</button></a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Status</th>
        <th>Aksi</th>    
    </tr> 
    </thead>
    <tbody>
   <?php $num = 0; do{ $num++; ?>
    <tr>
        <td><?php echo $num;?></td>
        <td><?php echo $data['judul_berita'];?></td>
        <td><?php echo $data['tanggal_berita'];?></td>
        <td><?php echo $data['nama_kategori'];?></td>
        <td><img src="../upload/<?php echo $data['gambar_berita'];?>" style="width:100px; height:100px"></td>
        <td><?php echo $data['status_berita'] == 1 ? "<span class='text-success'>Publish</span>" : "<span class='text-danger'>Konsep</span>"  ;?></td>
        <td>
            <a href="edit_berita.php?id=<?php echo $data['id_berita'];?>"><button class="btn btn-warning">Edit</button></a> | 
            <a href="hapus_berita.php?id=<?php echo $data['id_berita'];?> "><button class="btn btn-danger">Delete</button></a>
        </td>
    </tr>    
     <?php } while($data = mysqli_fetch_assoc($query));?>

     <?php 
     
     ?>
    </tbody>
</table>
</div>
</body>
</html>