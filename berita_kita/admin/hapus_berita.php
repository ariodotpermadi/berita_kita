<?php

include("layout/header.php");

if (!$_SESSION['login']){
    header('location:login.php');
}

$id = $_GET["id"];

$query = mysqli_query($con, "DELETE FROM berita WHERE id_berita = '$id'");

if ($query) {
    header('location:list_berita.php');
}else {
    die('Berita gagal dihapus !');
}





?>