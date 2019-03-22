<?php require('header.php') ?>
<?php
    if(!isset($_GET["d"])){
        header("Location: index.php");
    }else{
        $id = $_GET["d"];

        $result = $conn->query("update wisata set tampil = tampil + 1 where id_wisata = $id");

        $result = $conn->query("select * from wisata inner join user on user.id_user = wisata.id_user where id_wisata = $id");
        $data = $result->fetch_object();
    }
?>
 <div class="article-home">
  
    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">
   
    <div class="article-content article-content-article w-100 text-center">
        
      <h2 class="mt-3 mb-3 ml-3 mr-3" style="border: none;"><strong><?= $data->judul ?></strong></h2>
      <h6><small><?= $data->waktu ?></small> | <small><?= $data->tampil ?>x Dilihat</small> | <small><?= $data->nama ?></small></h6>
       <a href="detail-destinasi.php?d=<?= $data->id_wisata ?>">
       <figure class="figure" style="text-align:center;">
  <img src="assets/image/<?= $data->gambar ?>" class="figure-img img-fluid rounded" style="width: 100%; height: auto">
</figure>
        </a>
        <p class="h5 pl-3 pr-3 pb-3 ">
          <?= $data->deskripsi ?>
        </p>
    </div>
    </div>
   </div>       
   
 </div> 
 <?php require('footer.php') ?>