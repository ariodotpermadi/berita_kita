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

$query=mysqli_query($con, "SELECT * FROM komentar LEFT JOIN berita ON berita.id_berita=komentar.id_berita
ORDER BY komentar.id_komentar DESC");
$data=mysqli_fetch_assoc($query);
?>

<div class="container-fluid">
    <h2>Tabel komentar siar.com</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Judul Berita</th>
                <th>Isi Komentar</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $num = 0; do{ $num++; ?>
            <tr>
            <td><?php echo $num;?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['judul_berita'];?></td>
            <td><?php echo $data['isi_komentar'];?></td>
            <td><?php echo $data['tanggal_komentar'];?></td>
            <td><?php echo $data['status_komentar'] == 1 ? "<span class='text-success'>Publish</span>" : "<span class='text-danger'>Tidak Dipublish</span>"  ;?></td>
            <td>
                <a href ="edit_komentar.php?id=<?php echo $data['id_komentar'];?>"><button class="btn btn-warning">Edit</button></a> |
                <a href ="hapus_komentar.php?id=<?php echo $data['id_komentar'];?>"><button class="btn btn-danger">Hapus</button></a>
            </td>
            </tr>
            <?php } while($data = mysqli_fetch_assoc($query));?>
        </tbody>
    </table>
</div>

</body>
</html>