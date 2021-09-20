<?php
require "config/db_connect.php";
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="asset/css/style.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/png" href="asset/gambar/logo-icon.png">
<title>Industri Kreatif dan Lifestyle </title>


<script src="https://cdn.tiny.cloud/1/eove7zpgwitufm8ssqfhflz4rvacnfwseq8imtzvak3mdws0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  </head>
<body>
<div class="box_logo"><a href="index.php"></a><img src="asset/gambar/logo siar com.png" class="logo_nav" style="height:auto"></div>



  <!--Menu Navigasi-->
          
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li>
          <a class="nav-link" href="index.php" style="color: white;" >Home<span class="sr-only">(current)</span></a>
        </li>

        <ul class="navbar-nav mr-auto">
            <?php
            include "config/db_connect.php";
            $sql=mysqli_query($con, "SELECT * FROM kategori ORDER BY id_kategori");
            while ($data = mysqli_fetch_array($sql)) {            
              $id_kategori = $data['id_kategori'];
              $nama_kategori=$data['nama_kategori'];
            ?>
            <li class=nav-item>
              <a class="nav-link" style="color:white; " href="home.php?id=<?php echo $id_kategori;?>"><?php echo $nama_kategori;?></a>
            </li>
            <?php }?>
        </ul>

    <!--Search bar-->
      <div style="margin:0 0 0 400px">
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>
      </div>
    </div>

</nav>
