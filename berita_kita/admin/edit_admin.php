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

$id=$_GET['id'];
$query=mysqli_query($con,"SELECT * FROM admin where id_admin='$id'");
$data=mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $cond = "";
    $nama =$_POST['nama'];
    $usernama=$_POST['user'];
    
    if (!empty($_POST['pass'])) {
        $password=md5($_POST['pass']);
        $cond ="pass_admin='$password'";
    }


    $query=mysqli_query($con,"UPDATE `admin` set nama_admin='$nama', user_admin='$usernama', pass_admin='$password'
     where id_admin='$id'");

    if ($query) {
        header('location:list_admin.php');
    }else {
        die('Gagal update admin!');
    }
}
?>
<div class="container-fluid">
<button class="btn btn-primary"><a href="list_admin.php">< Kembali</a></button>
<form action="" method="post" enctype="">

    <label>Nama :</label> 
    <div class="form-group">
    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama_admin'];?>">
    </div>
    <label>Username :</label> 
    <div class="form-group">
        <input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $data['user_admin'];?>">
    </div>
    <label>Password :</label>
    <div class="form-group">
        <input type="password" name="pass" class="form-control" placeholder="Password">
    </div>
    <button class="btn btn-primary" name="update">Update</button>
</form>
    </div>
</body>
</html>