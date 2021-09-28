<!DOCTYPE html>
<html>
    <head>
        <title>Dasboar siar.com</title>
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
        $id=$_GET["id"];     

         //mengambil data dari table komentar
         $query=mysqli_query($con, "SELECT * FROM komentar LEFT JOIN berita ON komentar.id_berita=berita.id_berita WHERE id_komentar='$id'");
         $data=mysqli_fetch_assoc($query);  
         
         
        
        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        
        <div class="container-fluid">
        <?php
        //Update submit komentar.
        if(isset($_POST['edit_komentar'])){
            $nama=$_POST['nama_komentator'];
            $email=$_POST['email'];
            $isi_komentar=$_POST['isi_komentar'];
            $status=$_POST['status'];

            $uquery=mysqli_query($con, "UPDATE komentar SET nama='$nama', email='$email', isi_komentar='$isi_komentar',
        status_komentar='$status' WHERE id_komentar='$id'");   
        
        if ($uquery) {
            echo "<div class='alert alert-success'>Komentar berhasil di update!</div>";
        }else {
            die('Gagal update komentar!');
        }
        
        }
        
        ?>



        <a href="list_komentar.php"><button class="btn btn-primary">< Kembali</button></a>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul berita</label>
                <input name="judul" value="<?php echo $data['judul_berita'];?>" type="text" class="form-control" disabled>
                
            </div>
            <div class="form-group">
                <lable>Nama</lable>
                <input name="nama_komentator" value="<?php echo $data['nama'];?>" type="text" class="form-control" placeholder="Masukan nama" required>
            </div>
            <div class="form-group">
                <lable>Email</lable>
                <input name="email" value="<?php echo $data['email'];?>" type="email" class="form-control" placeholder="Masukan email" required>
            </div>
            <div class="form-group">
                <label>Isi komentar</label>
                <textarea name="isi_komentar" class="form-control" rows="5"><?php echo $data['isi_komentar'];?></textarea>
            </div>
            <div class="form-group">
                <label>Status :</label>                
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" <?php if($data['status_komentar']==1) echo "checked";?> class="form-check-input" name="status" value="1">Publish
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" <?php if($data['status_komentar']==0) echo "checked";?> class="form-check-input" name="status" value="0">Tidak Publish
                    </label>
                </div>
            </div>
            <button class="btn btn-success" name="edit_komentar" type="submit">Update Komentar</button>
        </form>
        </div>
        
    </body>
</html>