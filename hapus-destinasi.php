<?php
    if(!isset($_POST["id_wisata"])) header("Location: index.php");
    else{
        require_once("koneksi.php");
        $id = htmlentities(strip_tags($_POST["id_wisata"]));
        $id = (string) $conn->real_escape_string($id);
        
        $result = $conn->query("select * from wisata where id_wisata = $id");
        $data = $result->fetch_object();
        $gambar = $data->gambar;
        $judul = $data->judul;
        $result->free_result();
        
        $result = $conn->query("delete from wisata where id_wisata = $id");
        if($result){
            $pesan = "Artikel dengan judul \"<b>$judul</b>\" berhasil di hapus";
            $pesan = urlencode($pesan);
            
            unlink("assets/image/$gambar");
            header("Location: dashboard.php?p=$pesan");
        }
    }
?>