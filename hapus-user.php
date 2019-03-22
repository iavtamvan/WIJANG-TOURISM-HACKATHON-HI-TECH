<?php
    if(!isset($_POST["id_user"])) header("Location: index.php");
    else{
        require_once("koneksi.php");
        $id = htmlentities(strip_tags($_POST["id_user"]));
        $id = (string) $conn->real_escape_string($id);
        
        $pesan = "Artikel dengan id \"<b>$id</b>\" berhasil dihapus";
        $pesan = urlencode($pesan);

        $result = $conn->query("delete from user where id_user = $id");
        if($result){
            header("Location: dashboard.php?p=$pesan");
        }
    }
?>