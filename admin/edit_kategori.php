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

$id=$_GET["id"];
$query=mysqli_query($con, "SELECT * FROM kategori where id_kategori='$id'");
$data=mysqli_fetch_assoc($query);

if (isset($_POST['simpan_kategori'])) {
    $simpan = $_POST['nama'];   

    $query=mysqli_query($con, "UPDATE kategori set nama_kategori='$simpan' where id_kategori='$id'");

if ($query) {
    header('location:list_kategori.php');
}else{
    die('Gagal edit kategori!');
}

   

}
?>
<div class="container-fluid">
<h2>SIAR.COM</h2>
<button class="btn btn-primary"><a href="list_kategori.php">< Kembali</a></button>
<form action="" method="post">
<label>Nama kategori :</label> 
<div class="form-group">
    <input type="text" name="nama" value="<?php echo $data['nama_kategori'] ;?>" class="form-control">
</div>
<button class="btn btn-primary" name="simpan_kategori">SIMPAN</button>
</form>
</div>
</body>
</html>