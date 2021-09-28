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

if(isset($_POST['tambah_kategori'])){
$nama = $_POST['nama'];

mysqli_query($con, "INSERT INTO kategori(nama_kategori) value('$nama')");

header('location:list_kategori.php');
}
    


?>
<div class="container-fluid">
<h2>SIAR.COM</h2>
<button class="btn btn-primary"><a href="list_kategori.php">< Kembali</a></button>
<form method="post" action="">
<label>Nama kategori :</label> 
<div class="form-group"><input type="text" name="nama" class="form-control"></div>

<button class="btn btn-primary" name="tambah_kategori">Tambah</button>
</form>
</div>
</body>
</html>