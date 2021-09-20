<div class="wrapper">
<div id="main-container">
<link rel="stylesheet" type="text/css" href="asset/css/style2.css"/>
<link rel="stylesheet" type="text/css" href="asset/css/style.css"/>

<!--Query-->
<?php
require "layout/header.php";

$id=$_GET['id'];
$query=mysqli_query($con, "SELECT * FROM kategori WHERE id_kategori='$id' ");
$data=mysqli_fetch_assoc($query);
?>
<div style="margin:20px 0 20px 40px; ">
  <strong><h2><?php echo $data['nama_kategori'];?></h2></strong>
  
</div>
<hr>

<?php 
$id_kategori=$_GET['id'];
$sql=mysqli_query($con, "SELECT * FROM berita WHERE id_kategori=".$_GET['id']." AND status_berita=1 ORDER BY id_berita DESC ");
while($data=mysqli_fetch_assoc($sql)){
  
  $id_kategori = $data['id_kategori'];
  $id_berita = $data['id_berita'];
  $gambar_berita = $data['gambar_berita'];
  $judul_berita = $data['judul_berita'];
  $isi_berita = $data['isi_berita'];
  $tanggal_berita = $data['tanggal_berita'];
?>              
<!--END-->



 <div class="main">
   <div class="article">
     <a href="lihat_berita.php?id=<?php echo $id_berita;?>" class="judul"><strong><?php echo $judul_berita;?></strong></a>
     <img src="upload/<?php echo $gambar_berita;?>" alt="Picture">
     <p><?php echo substr($isi_berita, 0, 150);?> <a href="lihat_berita.php?id=<?php echo $id_berita;?>">selengkapnya...</a></p>     
     <div class="posted"><p>POSTED ON <?php echo $tanggal_berita ;?></p></div>
   </div>
 </div>

<?php } ?>

</div><!--End main-container-->

<!--Footer-->
<div style="margin:0 0 0 15px">
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
</div>

</div><!--End wrapper-->