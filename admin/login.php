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
        <div class="container" style="margin: 100px 0 0 500px; border: 1.5px solid grey; border-radius:5px; width:250px; background-color:white; box-shadow:5px 5px 6px rgb(119, 136, 153);">
            <div class=" justify-content-center mt-20 "> 
                <div class="col-md-4">
                    <div class="card">
            <!--Cek Pesan Notifikasi-->
            <?php             
            
            include "../config/db_connect.php";                  
               $err='';
               if (isset($_POST['login'])) {
                  $username = $_POST['user'];
                  $password = md5($_POST['pass']); 

                  $query=mysqli_query($con, "SELECT * FROM `admin` where user_admin='$username' AND pass_admin='$password'");
                  $data=mysqli_fetch_assoc($query);                                      
                  
                  if (mysqli_num_rows($query) > 0) {
                    session_start();
                    $_SESSION['id_admin']= $data['id_admin'];
                    $_SESSION['login']=true;
                    header("location:index.php");
                    }else{
                        $err="<div class='alert alert-warning'>Username atau Password salah!</div>";
                    } 
               }
                                       
            ?>
            <div class="card-header bg-transparent md-0"><img src="../asset/gambar/logo siar com (1).png" style="width: 150px; margin:10px 0 0 18px; padding:0 0 10px 0"></div>
            <hr style="width: fit-content;">
            <div class="card-body">
            <form action="" method="POST" onSubmit="return validasi()">
            <div class="form-group"><input type="text" name="user" placeholder="Username" id="username" require></div>
            <div class="form-group"><input type="password" name="pass" placeholder="Password" id="password" require></div>
                <br><br>
                <button class="btn btn-success" name="login">LOGIN</button>
                <br><br>
              <div style="width: fit-content; margin:0 0 0 0"> <?php echo $err;?></div>
            </form>
            </div><!--End card-body-->
                    </div><!--End card-->
                </div><!--end class md-4-->
            </div> <!--justify center-->                   
        </div><!--End container-->
    </body>  
</script>
</html>