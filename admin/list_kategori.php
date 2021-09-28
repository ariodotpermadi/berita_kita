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

$query=mysqli_query($con, "SELECT * FROM `kategori` ORDER BY `id_kategori` DESC");
$data=mysqli_fetch_assoc($query);
?>
<div class="container-fluid">
<h2>SIAR.COM</h2>
<a href="tambah_kategori.php"><button class="btn btn-primary">+Tambah Kategori</button></a>
<table class="table table-bordered">
<thead>
    
        <tr>
            <th>No.</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    
</thead>
<tbody>
    <?php $num=0; do{$num++;?>
    <tr>
        <td><?php echo "$num";?></td>
        <td><?php echo $data['nama_kategori'] ;?></td>
        <td>
            <a href="edit_kategori.php?id=<?php echo $data['id_kategori'] ;?>"><button class="btn btn-warning">Edit</button></a> |
            <a href="hapus_kategori.php?id=<?php echo $data['id_kategori'];?>"><button class="btn btn-danger">Hapus</button></a>        
        </td>
    </tr>    
    <?php } while ($data = mysqli_fetch_assoc($query));?>
</tbody>
</table>
</div>
</body>
</html>