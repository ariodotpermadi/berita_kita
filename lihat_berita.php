
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
      $query=mysqli_query($con,"SELECT * FROM berita WHERE id_berita='$id'");
      $data=mysqli_fetch_array($query);
      ?>


        <?php echo $data['tag_isi'];
        $pecah=explode(",", $data['tag_isi']);
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



<hr>


<!--Uji coba komentar dengan disqus-->

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://news-vmbvxez7pk.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



<!--End of komentar disqus-->

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