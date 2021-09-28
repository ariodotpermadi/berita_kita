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

if (isset($_POST['tambah'])) {
    $nama       =$_POST['nama'];
    $username   =$_POST['user'];
    $password   =md5($_POST['pass']);

    $query = mysqli_query($con, "INSERT INTO admin(nama_admin, user_admin, pass_admin) VALUE('$nama', '$username',
    '$password')");

    if ($query) {
        header('location:list_admin.php');
    }else {
        die('Gagal menambahkan admin!');
    }
}


?>
<div class="container-fluid">
    <button class="btn btn-primary"><a href="list_admin.php">< Kembali</a></button>
<form action="" method="post" enctype="">
    <label>Nama :</label> 
    <div class="form-group">
    <input type="text" name="nama" placeholder="Nama" class="form-control">
    </div>
    <label>Username :</label>
    <div class="from-group"> 
    <input type="text" name="user" placeholder="Username" class="form-control">
    </div>
    <label>Password :</label>
    <div class="form-group"> 
    <input type="password" name="pass" placeholder="Password" class="form-control">
    </div>
    <button class="btn btn-primary" name="tambah">Tambah</button>

</form>

</div>
</body>
</html>