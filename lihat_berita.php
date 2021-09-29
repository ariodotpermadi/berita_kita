
<link rel="stylesheet" type="text/css" href="asset/css/style.css"/>
<link rel="stylesheet" type="text/css" href="asset/css/style2.css"/>

<div class="wrapper">
<div id="main-container"> 
<?php 
require "layout/header.php";
$id=$_GET['id'];

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$query=mysqli_query($con, "SELECT * FROM berita LEFT JOIN kategori ON berita.id_kategori= kategori.id_kategori
WHERE id_berita='$id' LIMIT 1");
$data=mysqli_fetch_assoc($query);

?>
   
    <div style="margin: 10px 20px 20px 60px;">
    <a href="index.php" style="color: black;">Home</a> /
    <a href="home.php?id=<?php echo $data['id_kategori'];?>" style="color: black;"><?php echo $data['nama_kategori'];?></a>
    <h3><strong><?php echo $data['judul_berita'];?></strong></h3>
    <p>Posted on : <?php echo $data['tanggal_berita'];?></p>
    <hr style="border:0.5px solid grey ; width: 700px; float: left;">

 



    
    <!--Medsos-->
    <div class="share">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share on Facebook"><span class="facebook-share"><img src="asset/gambar/facebook.png"><p>Share on Facebook</p></span></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share on Twitter"><span class="twitter-share"><img src="asset/gambar/twitter.png"><p>Tweet It</p></span></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share on Pinterest"><span class="pinterest-share"><img src="asset/gambar/pinterest.png"></span></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share by Email"><span class="email-share"><img src="asset/gambar/email.png"></span></a>
    </div>
    <!--End Medsos-->    
        <img src="upload/<?php echo $data['gambar_berita'];?>" style="width: 700px; height:400px">        
    </div>

    <!--Aside Berita Terbaru-->
  <div class="aside">
  <div style="margin:-450px 0 0 860px ; width:100%; height:100%; ">
  <h4><strong>Berita Terbaru</strong></h4>
  <hr style="border:2px solid red; width:23%; margin:0 0 0 0;  ">

  <?php
    $query=mysqli_query($con, "SELECT * FROM berita ORDER BY id_berita  DESC LIMIT 5");
    while($row=mysqli_fetch_assoc($query)){
    $id_berita = $row['id_berita'];
    $judul_berita = $row['judul_berita'];
    $isi_berita = $row['isi_berita'];
    $id_kategori = $row['id_kategori'];
    $gambar_berita = $row['gambar_berita'];
    $tanggal_berita = $row['tanggal_berita'];
    $view = $row['view'];  
    $tag= $row['tag_isi'];
  ?>
  <div style="margin: 10px 0 0 0;">
    <img src="upload/<?php echo $gambar_berita ;?>" style="width: 9%;">
  </div>
  <div style=" margin:-50px 0 0 120px;">
  <strong><p><a href="lihat_berita.php?id=<?php echo $id_berita;?>" style="color: black;"><?php echo $judul_berita;?></a></p></strong>
  <p><?php echo $tanggal_berita;?></p>
  </div>
  <?php }?>
      <br>

    <!--Tag berita-->
  <h4><strong>Tags</strong></h4>
  <hr style="border:2px solid red; width:23%; margin:0 0 10px 0;  ">
      <div >
     
        <?php 
        echo $tag;?>
        <?php
        $pecah=explode(",", $tag);
        for ($i=0; $i < count($pecah); $i++) { 
        echo $pecah[$i]."<br>";
        }        

        
        ?>
      
      
      </div>
  </div>

  
  </div><!--End aside iklan dan tag-->
    
  



  <!--Isi berita-->
    <div style="margin: -100px 0 0 60px; width:700px; height:max-content">
    
        <div style="height:max-content"><?php echo $data['isi_berita'];?></div>
    
  <!--End of isi berita-->
    <hr style="width: fit-content;">
    <!--Medsos-->
    <div class="share">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share on Facebook"><span class="facebook-share"><img src="asset/gambar/facebook.png"><p>Share on Facebook</p></span></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share on Twitter"><span class="twitter-share"><img src="asset/gambar/twitter.png"><p>Tweet It</p></span></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share on Pinterest"><span class="pinterest-share"><img src="asset/gambar/pinterest.png"></span></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share by Email"><span class="email-share"><img src="asset/gambar/email.png"></span></a>
    </div>
    <!--End Medsos-->      
   
    </div>  
</div>




<!--Kolom Trending Now-->
<br><br><br>
<h4 class="down-line"><strong>TRENDING NOW</strong></h4>
<hr style="width: 190px; height: 2px; background-color: red; margin: -2px 1px 0 60px; float: left;">
<?php 
  $sqli = mysqli_query($con, "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 3");
  while ($row=mysqli_fetch_assoc($sqli)) {
    $id_berita = $row['id_berita'];
    $judul_berita = $row['judul_berita'];
    $isi_berita = $row['isi_berita'];
    $id_kategori = $row['id_kategori'];
    $gambar_berita = $row['gambar_berita'];
    $tanggal_berita = $row['tanggal_berita'];
    $view = $row['view'];    
?> 

          
          <div class="box-trending">                         
              <a href="lihat_berita.php?id=<?php echo $id_berita;?>">
                <div class="trending"> 
                <img src="upload/<?php echo $gambar_berita;?>">
                <strong><a href = "lihat_berita.php?id=<?php echo $id_berita;?>"><p class="p-trending"><?php echo $judul_berita;?></p></a></strong>
              </a>
              <p class="tgl-post-bawah"><?php echo $tanggal_berita;?></p>              
            </div>
<?php }?>




</div> <!--End main-container-->


<!--Kolom Komentar-->
<div style="margin: -60px 0 0 -60px; width:fit-content; height:fit-content">
<hr class="hr-bottom2">
<!--Ambil data dari table komentar untuk tampilkan komentar-->
<?php

  $query=mysqli_query($con, "SELECT * FROM komentar WHERE id_berita='$id'  AND status_komentar=1 ORDER BY id_berita DESC");
  while($data=mysqli_fetch_array($query)):
?>

<div class="col-sm-12">
  <h5><strong><?php echo $data['nama'];?></strong></h5>  
  
    <div class=col-sm-1 style="margin:0 0 0 -18px">
  <img src="asset/gambar/user.png" width="100%" alt="Cinque Terre">
    </div>
    <div class="col-sm-16" style="margin:-25px 0 0 30px">
    <p><?php echo $data['isi_komentar'];?></p>
  </div>
</div>

<?php endwhile;?>
<hr>

<!--Sistem komentar-->
<?php
//simpan komentar

if (isset($_POST['tambah_komentar'])) {
include "config/db_connect.php"  ;
  $id_berita   =$_POST['id_berita'];
  $status       =$_POST['status'];
  $nama         =$_POST['nama'];
  $email        =$_POST['email'];
  $isi_komentar =$_POST['isi_komentar'];
  $query=mysqli_query($con, "INSERT INTO komentar(id_berita, status_komentar, nama, email, isi_komentar ) VALUE('$id_berita', '$status', '$nama', '$email', '$isi_komentar') ");
  
  if ($query) {
    echo"<div class='alert alert-success'>Komentar terkirim, menunggu persetujuan dari admin.</div>";
  }else {
    echo"<div class='alert alert-warning'>Komentar gagal!</div>";
  } 
} 
?>

    <form  action="" method="post" >
      <h5><strong>Tinggalkan Komentar</strong></h5>
            <div class="form-group">
                 <?php
                 $id=$_GET['id'];
                 $query=mysqli_query($con, "SELECT * FROM berita WHERE id_berita='$id' ORDER BY id_berita");
                 $data=mysqli_fetch_assoc($query);
                 ?>                  
                <input type="hidden" name="id_berita" value="<?php echo $data['id_berita'];?>" class="form-control">
              
                <input type="hidden" name="status" value="0" class="form-control">                        
            </div>
            <div>
              <input type="text" name="nama" placeholder="Nama" required/>
            </div>
            <br>
            <div>
              <input type="text" name="email" placeholder="Email" required/>
            </div>            
            <br>
            <div>
              <textarea name="isi_komentar" rows="10" placeholder="Komentar Anda..." required></textarea>
            </div>
            <br>
            <div>
              <button class="btn btn-success" type="submit" name="tambah_komentar">Tambahkan Komentar</button>
            </div>
          </form>
</div><!--End of kolom komentar-->
<br>


<!--Footer-->
<div style="margin:0 0 0 -105px">
  <div class="footer">
    <img src="asset/gambar/logo_siar_footer.png" style="width: 10%; float: left; margin: 20px;">
    <div class="icon_group">
      <a href="#"><img src="asset/gambar/facebook.png" class="facebook"></a>
      <a href="#"><img src="asset/gambar/twitter.png" class="twitter"></a>
      <a href="#"><img src="asset/gambar/instagram.png" class="instagram"></a>
    </div>
    <br>
    <hr style="color:white; background-color:white; ">
    <div class="footerdwn">
      <p class="footerpp">Copyright &copy; <script>document.write(new Date().getFullYear())</script>
        siar.com, All Right Reserved</p> 
        <ul class="footermenu">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Info Iklan</a></li>
          <li><a href="#">Pedoman Media Siber</a></li>
          <li><a href="#">Karir</a></li>
          <li><a href="#">Redaksi</a></li>
        </ul>      
    </div>    
</div>
</div><!--End footer-wrapper-->
  
</div><!--End wrapper-->