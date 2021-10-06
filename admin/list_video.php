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
?>
<div class="container-fluid">
<strong><h4>Upload videomu</h4></strong>
<button class="btn btn-primary"><a href="tambah_video.php">+ Tambah video</a></button>

<table class="table table-bordered" >
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul Video</th>
            <th>Tanggal Video</th>
            <th>Aksi</th>
            <th>Video</th>
        </tr>
    </thead>
    <tbody>
        <tr>

        </tr>
    </tbody>
</table>
</div>
</body>
</html>