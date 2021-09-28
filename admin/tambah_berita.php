<!DOCTYPE html>
<html>
<head>
<title>Dasboard Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!--tiny textarea-->
  <script src='https://cdn.tiny.cloud/1/eove7zpgwitufm8ssqfhflz4rvacnfwseq8imtzvak3mdws0/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
  <script src="https://cdn.tiny.cloud/1/eove7zpgwitufm8ssqfhflz4rvacnfwseq8imtzvak3mdws0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<?php
include "layout/header.php";

if (!$_SESSION['login']){
  header('location:login.php');
}

if (isset($_POST['tambah_berita'])){
    $status_berita = $_POST['status_berita'];
    $judul      = $_POST['judul'];
    $kategori   = $_POST['kategori'];
    $isi        = $_POST['isi'];
    $tag_berita = $_POST['tag'];
    $gambar     = $_FILES['gambar']['name'];

    move_uploaded_file($_FILES['gambar']['tmp_name'], "../upload/".$gambar);

    $query = mysqli_query($con, "INSERT INTO berita(judul_berita, isi_berita, id_kategori, gambar_berita, status_berita, tag_isi) VALUE('$judul', '$isi', '$kategori', '$gambar', '$status_berita', $tag_berita)");
    
    header('location:list_berita.php');    
}

$query=mysqli_query($con, "SELECT *FROM kategori order by nama_kategori ASC");
$data=mysqli_fetch_assoc($query);

?>


<div class="container-fluid">
  <button class="btn btn-primary"><a href="list_berita.php">< Kembali</a></button>
<form action="" method="POST" enctype="multipart/form-data">
<label>Judul berita :</label>
<div class="form-group">
  <input type="hidden" name="status_berita" value="0" class="form-control">
  <input type="text" name="judul" class="form-control">
</div>
<label>Kategori :</label>  <select name="kategori">
                <option value="">--Pilih Kategori--</option>
                <?php do{ ?>
                <option value="<?php echo $data['id_kategori'];?>"><?php echo $data['nama_kategori'];?></option>
                <?php } while ($data = mysqli_fetch_assoc($query));?>
            </select><br>
<label>Isi berita :</label>
<textarea name="isi" class="form-control" rows="5" id="mytextarea"></textarea>
<!--Tiny textarea-->
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
  <!--End of Tiny textarea-->
  <br>
<label>Input Tag : </label>
<div class="form-group">
  <input class="form-control" name="tag" type="text">
</div>
<label>Gambar :</label> 
<div class="form-group"><input type="file" name="gambar"></div>
<button class="btn btn-success" name="tambah_berita">Tambah</button>
</form>
</div>
</body>
</html>