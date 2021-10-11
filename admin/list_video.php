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

<?php
$query=mysqli_query($con, "SELECT * FROM `video` ORDER BY `id_video` DESC ");
$data=mysqli_fetch_assoc($query);
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
            <th>Status</th>
            <th>Aksi</th>
            <th>Video</th>
        </tr>
    </thead>
    <tbody>
        <?php $num=0; do{$num++?>
        <tr>
            <td><?php echo "$num"?></td>
            <td><?php echo $data['nama_video'];?></td>
            <td><?php echo $data['tanggal_video'];?></td>
            <td><?php echo $data['status_video'] == 1 ? "<span class='text-success'>Publish</span>" : "<span class='text-danger'>Draft</span>";?></td>
            <td>
                <a href="edit_video.php?id=<?php echo $data['id_video'];?>"><button class="btn btn-warning">Edit</button></a>
                <a href="hapus_video.php?id=<?php echo $data['id_video'];?>"><button class="btn btn-danger">Hapus</button></a>
            </td>
            <td><video src="../upload_video/<?php echo $data['video_upload'];?>" style="width: 100px; height:100px"></video></td>
        </tr>
        <?php } while ($data=mysqli_fetch_assoc($query));?>
    </tbody>
</table>
</div>
</body>
</html>