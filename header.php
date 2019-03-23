<?php
    date_default_timezone_set("Asia/Makassar");

    session_start();

    require("koneksi.php");
    
    if(isset($_SESSION["login"])){
        $login = $_SESSION["login"];
    }

    if (isset($_GET["p"])) {
        $pesan = $_GET["p"];
      }

    if(isset($_POST["post_wisata"])){
        $judul = trim(htmlentities(strip_tags($_POST["judul"])));
        $deskripsi = trim(htmlentities(strip_tags($_POST["deskripsi"])));

        $pesan_error = "";

        if(empty($judul)) $pesan_error = "Judul wisata wajib diisi <br>";
        if(empty($deskripsi)) $pesan_error .= "Deskripsi berita wajib diisi <br>";

        $upload_error = $_FILES["gambar"]["error"];
        if ($upload_error !== 0){

            $arr_upload_error = array(
                1 => 'Ukuran file melewati batas maksimal',
                2 => 'Ukuran file melewati batas maksimal 1MB',
                3 => 'File hanya ter-upload sebagian',
                4 => 'Tidak ada file yang terupload',
                6 => 'Server Error',
                7 => 'Server Error',
                8 => 'Server Error',
            );
            $pesan_error .= $arr_upload_error[$upload_error];
        }else{
            $nama_folder = "image";
            $nama_file = $_FILES["gambar"]["name"];
            $path_file = "assets/$nama_folder/$nama_file";

            if (file_exists($path_file)) {
                $pesan_error .= "File dengan nama sama sudah ada di server <br>";
            }

            $ukuran_file = $_FILES["gambar"]["size"];
            if ($ukuran_file > 2097152) {
                $pesan_error .= "Ukuran file melebihi 2MB <br>";
            }

            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if ($check === false){
                $pesan_error .= "Mohon upload file gambar (gif, png, atau jpg )";
            }
        }
        if($pesan_error === ""){
            $nama_folder = "image";
            $tmp = $_FILES["gambar"]["tmp_name"];
            $nama_file = $_FILES["gambar"]["name"];
            move_uploaded_file($tmp, "assets/$nama_folder/$nama_file");

            $pesan = "Wisata dengan judul \"<b>$judul</b>\" berhasil di posting <br> Dan Siap Untuk Direview";
            $pesan = urlencode($pesan);

            $judul = (string) $conn->real_escape_string($judul);
            $deskripsi = (string) $conn->real_escape_string($deskripsi);

            $id_user = $_SESSION["id_user"];
            $result = $conn->query("insert into wisata (judul, deskripsi, gambar, tampil, id_user) values ('$judul', '$deskripsi', '$nama_file', 0, $id_user)");

            if($result) header("Location: dashboard-user.php?p=$pesan");
            else die("Query Error ".$conn->error);
        }
    }elseif(isset($_POST['edit_wisata'])){

        $judul = trim(htmlentities(strip_tags($_POST["judul"])));
        $deskripsi = trim(htmlentities(strip_tags($_POST["deskripsi"])));
        $id = trim(htmlentities(strip_tags($_POST["id_wisata"])));
        $pesan_error = "";

        if(empty($judul)) $pesan_error = "Judul artikel wajib diisi <br>";
        if(empty($deskripsi)) $pesan_error .= "Isi artikel wajib diisi <br>";

        if($pesan_error === ""){

            $pesan = "Artikel dengan judul \"<b>$judul</b>\" berhasil di update";
            $pesan = urlencode($pesan);

            $judul = (string) $conn->real_escape_string($judul);
            $deskripsi = (string) $conn->real_escape_string($deskripsi);
            $id = (int) $conn->real_escape_string($id);

            $result = $conn->query("update wisata set judul = '$judul', deskripsi = '$deskripsi' where id_wisata = $id");

            if($result) header("Location: dashboard-user.php?p=$pesan");
            else die("Query Error ".$conn->error);
        }
    }elseif(isset($_POST["tambah_user"])){
        $username = trim(htmlentities(strip_tags($_POST["username"])));
        $password = trim(htmlentities(strip_tags($_POST["password"])));

        $pesan_error = "";

        if(empty($username)) $pesan_error = "Username wajib diisi <br>";
        if(empty($password)) $pesan_error .= "Password berita wajib diisi <br>";

        if($pesan_error === ""){

            $pesan = "User dengan username \"<b>$username</b>\" berhasil ditambahkan";
            $pesan = urlencode($pesan);

            $username = (string) $conn->real_escape_string($username);
            $password = (string) $conn->real_escape_string($password);

            $pasword_hash = sha1(md5($password));

            $result = $conn->query("insert into user (username, password) values ('$username', '$pasword_hash')");

            if($result) header("Location: dashboard.php?p=$pesan");
            else die("Query Error ".$conn->error);
        }
    }elseif(isset($_POST["daftar"])){
        $nama = trim(htmlentities(strip_tags($_POST["nama"])));
        $email = trim(htmlentities(strip_tags($_POST["email"])));
        $telepon = trim(htmlentities(strip_tags($_POST["telepon"])));
        $username = trim(htmlentities(strip_tags($_POST["username"])));
        $password = trim(htmlentities(strip_tags($_POST["password"])));

        $pesan_error = "";

        if(empty($username)) $pesan_error = "Username wajib diisi <br>";
        if(empty($nama)) $pesan_error .= "Nama wajib diisi <br>";
        if(empty($email)) $pesan_error .= "Email wajib diisi <br>";
        if(empty($telepon)) $pesan_error .= "Telepon wajib diisi <br>";
        if(empty($password)) $pesan_error .= "Password berita wajib diisi <br>";

        if($pesan_error === ""){

            $nama = (string) $conn->real_escape_string($nama);
            $email = (string) $conn->real_escape_string($email);
            $telepon = (string) $conn->real_escape_string($telepon);
            $username = (string) $conn->real_escape_string($username);
            $password = (string) $conn->real_escape_string($password);

            $pasword_hash = sha1(md5($password));

            $result = $conn->query("insert into user (username, password, nama, telepon, email) values ('$username', '$pasword_hash', '$nama', '$telepon', '$email')");

            if($result) header("Location: masuk.php");
            else die("Query Error ".$conn->error);
        }
    }else{
            $pesan_error = "";
            $judul = "";
            $deskripsi = "";
            $username = "";
            $password = '';
            $nama = '';
            $email = '';
            $telepon = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#464ae7">
    <title>WIJANG (WIsata Jawa Tengah)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/image/info.png" type="image/x-icons">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <a class="navbar-brand" href="index.php" style="color: #fff;">
        <img src="assets/image/info.png" width="180">
        </a>
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
  <div class="collapse navbar-collapse justify-content-end text-center" id="navbarSupportedContent">
   
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link mr-2 mt-1" href="index.php" style="color:white"> <i class="fa fa-home" aria-hidden="true"></i> home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mr-2 mt-1" href="destinasi.php" style="color:white"> <i class="fa fa-plane" aria-hidden="true"></i> destinasi</a>
      </li>
        <li class="nav-item">
            <a class="nav-link mr-2 mt-1" href="./blog" style="color:white"> <i class="fa fa-home" aria-hidden="true"></i> peta tematik</a>
        </li>
      <?php if(isset($_SESSION["admin"])): ?>
    <li class="nav-item">
        <a class="nav-link btn btn-primary mr-2 mt-1" href="dashboard.php" style="color: white"> <i class="fa fa-dashboard" aria-hidden="true"></i> dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-warning mr-2 mt-1" href="keluar.php" style="color: white"> <i class="fa fa-sign-out" aria-hidden="true"></i> logout</a>
      </li>
    <?php elseif(isset($_SESSION["user"])): ?>
    <li class="nav-item">
        <a class="nav-link btn btn-primary mr-2 mt-1" href="dashboard-user.php" style="color: white"> <i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-warning mr-2 mt-1" href="keluar.php" style="color: white"> <i class="fa fa-sign-out" aria-hidden="true"></i> logout</a>
      </li>
    <?php else: ?>
    <li class="nav-item">
        <a class="nav-link btn btn-primary mr-2 mt-1" href="dashboard.php" style="color: white"> <i class="fa fa-newspaper-o" aria-hidden="true"></i> posting</a>
      </li>
      <?php endif ?>
    </ul>
  </div>
</nav>
