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
 

</head>
<body>

<?php
include("layout/header.php");

if (!$_SESSION['login']){
  header('location:login.php');
}

$id=$_GET["id"];
//mengambil database berita
$query=mysqli_query($con, "SELECT * FROM berita where id_berita=$id");
$data = mysqli_fetch_assoc($query);

//mengambil data kategori
$kategori=mysqli_query($con, "SELECT * FROM kategori order by nama_kategori ASC");
$kat=mysqli_fetch_assoc($kategori);
?>

<?php
if (isset($_POST['edit_berita'])){
    $status_berita = $_POST['status_berita'];
    $judul    = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi      = $_POST['isi'];
    $tag      = $_POST['tag'];
    $gambar   = $_FILES['gambar']['name'];

    if(!empty($gambar)){
    move_uploaded_file($_FILES['gambar']['tmp_name'],'../upload/'. $gambar);
    $query=mysqli_query($con, "UPDATE berita set gambar_berita = '$gambar', where id_berita = '$id'") ;
  }
$query =mysqli_query($con,"UPDATE berita set  judul_berita='$judul',  isi_berita='$isi', id_kategori='$kategori', gambar_berita='$gambar', status_berita='$status_berita', tag_isi='$tag' where id_berita = '$id'" );

if ($query) {
  header('Location: list_berita.php');
}else {
  die('Gagal menyimpan perubahan !');
}

}

?>
<div class="container-fluid">
<button class="btn btn-primary"><a href="list_berita.php">< Kembali</a></button>
<form action="" method="post" enctype="multipart/form-data">

<label>Judul :</label> 
<div class="form-group"><input type="text" name="judul" value="<?php echo $data['judul_berita'];?>" class="form-control"></div>
<label>Kategori :</label>  <select name="kategori">
                <option value="">-- Pilih kategori--</option>
                <?php do { ?>
                <option value="<?php echo $kat['id_kategori'];?>" <?php if($data['id_kategori'] == $kat['id_kategori']){echo "Selected";}?>>
                    <?php echo $kat['nama_kategori'];?>
                </option>
                <?php }while($kat=mysqli_fetch_assoc($kategori));?>
            </select><br>
<label>Isi :</label> 
<textarea name="isi" class="form-control" id="mytextarea" rows="10"><?php echo $data['isi_berita'];?></textarea>





<div class="form-group">
  <label>Status :</label>
  <div class="form-check-inline">
    <label class="form-check-label">
    <input type="radio" <?php if($data['status_berita']==1) echo "checked";?> class="form-check-input" name="status_berita" value="1">Publish
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
    <input type="radio" <?php if($data['status_berita']==0) echo "checked";?> class="form-check-input" name="status_berita" value="0">Konsep
    </label>
  </div>
</div>


<label>Input Tag : </label>
<div class="form-group">
  <input class="form-control" name="tag" type="text" value="<?php echo $data['tag_isi'];?>">
</div>
<label>Gambar :</label>
 <input type="file" name="gambar" value="<?php echo $data['gambar_berita'];?>"><br>
<button class="btn btn-success" name="edit_berita">Simpan</button>
</form>
</div>
</body>
</html>