<?php

include("layout/header.php");

if (!$_SESSION['login']){
    header('location:login.php');
}

$id=$_GET['id'];

$query=mysqli_query($con, "DELETE FROM komentar WHERE id_komentar='$id'");

if ($query) {
    header('location:list_komentar.php');
}else {
    die('Gagal menghapus komentar!');
}

?>