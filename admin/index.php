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
    
<h2 style="text-align: center;">SIAR.COM</h2>




<?php

include "layout/header.php";


if (!$_SESSION['login']){
    header('location:login.php');
}
?>
<div class="container-fluid">

Welcome in Dashboar SIAR.COM !!
    </div>
</body>
</html>