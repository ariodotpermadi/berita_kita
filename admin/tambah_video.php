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




if (isset($_POST['video_upload'])) {
    $id_video       = $_POST['id_video'];
    $tanggal        = $_POST['tanggal']; 
    $status_video   = $_POST['status_video'];
    $judul_video    = $_POST['judul_video'];
    $video_file     = $_FILES['video_file']['name'];
    move_uploaded_file($_FILES['video_file']['tmp_name'], "../upload_video/".$video_file);

    $query=mysqli_query($con, "INSERT INTO video(id_video, nama_video, tanggal_video, status_video, video_upload) VALUE ('$id_video', '$judul_video', '$status_video', '$video_file', '$tanggal')") ;

    header('location:list_video.php');
}

?>
<div class="container-fluid">
<h3>Upload video</h3>
<hr>
<button class="btn btn-warning"><a href ="list_video.php">Kembali</a></button><br>
<form action="" method="post" enctype="">
    <div>
        <input type="hidden" name="id_video">
    </div>
    <label>Tanggal upload</label>
    <div class="form-group">
        <input type="date" class="form-control" name="tanggal">
    </div>
    <label>Judul video :</label>
    <div class="form-group">
        <input type="text" name="judul_video" placeholder="Masukan judul" class="form-control">
    </div>
    <label>Video upload</label>
    <div>
        <input type="file" name="video_file">
    </div><br>
    <button class="btn btn-primary" name="video_upload">Upload</button>
</form>


</div>


    </body>
</html>
