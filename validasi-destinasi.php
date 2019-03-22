<?php
    if(!isset($_POST["id_wisata"])) header("Location: index.php");
    else{
        require_once("koneksi.php");
        $id = htmlentities(strip_tags($_POST["id_wisata"]));
        $id = (string) $conn->real_escape_string($id);
        
        $result = $conn->query("select * from wisata where id_wisata = $id");
        $data = $result->fetch_object();
        $judul = $data->judul;
        $result->free_result();

        $result = $conn->query("update wisata set validasi = 'ya' where id_wisata = $id");
        if($result){
            $pesan = "Wisata dengan judul \"<b>$judul</b>\" berhasil divalidasi";
            $pesan = urlencode($pesan);
            
            header("Location: dashboard.php?p=$pesan");
        }
    }
?>