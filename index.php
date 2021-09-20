<div class= "wrapper">
<div id="main-container">

<link rel="stylesheet" type="text/css" href="asset/css/style.css"/>

<!--Design Box Atas (main berita)-->
<?php
require "layout/header.php";
$query = mysqli_query($con, "SELECT * FROM berita LEFT JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE id_berita=id_berita AND status_berita=1 
order by berita.id_berita  DESC LIMIT 6");
$data = mysqli_fetch_assoc($query); 
?>


<!--Berita Utama-->
<div style="height: 60%;  width:60%; margin:10px 70px; float:left" >
    <img src="upload/<?php echo $data['gambar_berita'];?>" style="width: 100%; height:100%; margin:auto">
    <div style="position: absolute; margin:-130px 20px"><a href="kategori.php?id=<?php echo $data['id_kategori'];?>"><p style="font-size: 35px; color: #F8F8FF;"><?php echo $data['nama_kategori'];?></p></a></div>
    <div style="position: absolute; margin:-90px 20px"><a href="lihat_berita.php?id=<?php echo $data['id_berita'];?>"><p style="font-size: 30px; color: #e61919;"><?php echo $data['judul_berita'];?></p></a></div>    
</div>

<!--Iklan aside-->
<div class="aside">
  <div style="margin:10px 0 0 0">
  <img src="asset/gambar/iklan.png" style="width: 25%; padding:0 0 5px 0">
  <img src="asset/gambar/iklan.png" style="width: 25%;">
  </div>
</div>

<!--Berita terbaru-->
<div style="width: 50%; height:100%; margin:20px 0 0 70px; padding:0 0 0 0; ">
<h4><strong>Berita Terbaru</strong></h4>
<hr style="border:2px solid red; width:25%; margin:2px 0 0 0 ">
<?php do {?>  
<div style="width: 300px;  height:300px;  float:left; padding:25px 20px 20px 0" >
  <div>
    <img src="upload/<?php echo $data['gambar_berita'];?>" style="width: 100%;">
  </div>
  <div><h5><a href="lihat_berita.php?id=<?php echo $data['id_berita'];?>" style="color: black;"><?php echo $data['judul_berita'];?> </a></h5></div>
  <div>    
      <p><a href="kategori.php?id=<?php echo $data['id_kategori'];?>" style="color: black;"><?php echo $data['nama_kategori'];?></a></p>
      <p><?php echo $data['tanggal_berita'];?></p>    
  </div>
</div>
<?php } while($data=mysqli_fetch_assoc($query))?>
</div>

<!--Aside-->
<div class="aside">
<!--Berita Populer-->
<div style="float: right;  margin:-600px 20px 100px 0; width:30%; height: 100%;">
  <h4><strong>Berita Populer</strong></h4>
  <hr style="border:2px solid red; width:40%; margin:2px 0 0 0;  ">
<?php 
  $sql = mysqli_query($con, "SELECT * FROM berita WHERE id_berita=id_berita AND status_berita=1 ORDER BY id_berita   ASC LIMIT 5");
  while ($row=mysqli_fetch_assoc($sql)) {
    $id_berita = $row['id_berita'];
    $judul_berita = $row['judul_berita'];
    $isi_berita = $row['isi_berita'];
    $id_kategori = $row['id_kategori'];
    $gambar_berita = $row['gambar_berita'];
    $tanggal_berita = $row['tanggal_berita'];
    $view = $row['view'];  
?> 
  
  <div style="margin: 10px 0 0 0;">  
    <img src="upload/<?php echo $gambar_berita;?>" style="width: 100px;">
  </div>
  <div style=" margin:-50px 0 0 110px">
    <p><a href="lihat_berita.php?id=<?php echo $id_berita;?>" style="color: black;"><?php echo $judul_berita;?></a></p>
    <p><?php echo $tanggal_berita;?></p>
  </div>
  <?php } ?>
</div>


</div>

<!--Iklan aside-->
<div class="aside">
  <div style="margin:345px 0 0 0px">
  <img src="asset/gambar/iklan.png" style="width: 25%; margin:-23px 0 0 200px">
  
  </div>
</div><!--End aside-->

</div><!--End main container-->

<!--Footer-->
<div class="footer-wrapper">
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




</div><!--End Wrapper-->