<!DOCTYPE html>
<html>
    <head>
    <title>Dasboard Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
<?php

require '../config/db_connect.php';

session_start();

?>

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
<button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
        <a href="index.php" class="w3-bar-item w3-button">Home</a>
        <a href="list_berita.php" class="w3-bar-item w3-button">List Berita</a>
        <a href="list_kategori.php" class="w3-bar-item w3-button">List Kategori</a>
        <a href="list_admin.php" class="w3-bar-item w3-button">List Admin</a>
        <a href="list_komentar.php" class="w3-bar-item w3-button">Komentar</a>
        <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>      
</div>

<div class="w3-main" style="margin-left:200px">
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  </div>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>