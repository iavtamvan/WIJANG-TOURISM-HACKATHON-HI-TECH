<?php require('header.php') ?>
<?php
    if(isset($_POST["login"])){

        $username = trim(htmlentities(strip_tags($_POST["username"])));
        $password = trim(htmlentities(strip_tags($_POST["password"])));

        $pesan_error = "";

        if(empty($username)) $pesan_error = "Username harus diisi <br>";
        elseif(empty($password)) $pesan_error .= "Password harus diisi <br>";

        require_once("koneksi.php");

        $username = (string) $conn->real_escape_string($username);
        $password = (string) $conn->real_escape_string($password);

        $password_hash = sha1(md5($password));

        $result = $conn->query("select * from user where username = '$username' and password = '$password_hash'");

        if($result->num_rows == 0) $pesan_error .= "Username dan/atau Password Tidak Sesuai <br>";
        $data = $result->fetch_object();
        
        if($pesan_error === ""){
            session_start();
            $_SESSION["login"] = TRUE;
            if($data->level === "admin"){
                $_SESSION["admin"] = $data->level;
            }else{
                $_SESSION["user"] = $data->level;
                $_SESSION["id_user"] = $data->id_user;
            }
            header("Location: index.php");
        }

        $result->free_result();
        $conn->close();
    }else{

        $pesan_error = "";
        $username = "";
        $password = "";
    }

?>

 <div class="article-home">
  
    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-center">
      <h2 class="mt-0 mb-3 ml-0 mr-0 text-center" >Masuk</h2>
      <?php
            if($pesan_error !== "") echo "<div id=\"errorSignUp\" class=\"btn btn-danger\">$pesan_error</div>";
        ?>
      <form style="width: 75vw;" method="post" action="masuk.php">
  <div class="form-group">
    <p class="h4"><strong>Username</strong></p>
    <input type="text" class="form-control form-control-lg" name="username" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Password</strong></p>
    <input type="password" class="form-control form-control-lg" name="password" required>
  </div>
  <div class="form-grup form-inline">
      <input type="submit" class="form-control btn btn-primary btn-lg mr-3 mb-3 ml-3" name="login" value="MASUK">
  </div>
</form>
    <p class="text-center">
        Belum punya akun ? Silahkan <a href="daftar.php" class="btn btn-primary">Daftar</a>
    </p>

   </div>
                            
 </div> 
 <?php require('footer.php') ?>