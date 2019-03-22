<?php require('header.php') ?>
<?php
  if(!$_SESSION['user']){
    header("Location: masuk.php");
  }

    $id_user = $_SESSION["id_user"];
    
    $result = $conn->query("select * from user left join wisata on user.id_user = wisata.id_user where user.id_user = $id_user");
    $data = $result->fetch_object();
?>

  <div class="about-home about-home-top struktur-top flex-column d-flex align-items-center justify-content-center">
       <div class="article-content struktur text-center">
       <figure class="figure">
        </figure>
       <h5><strong><?= $data->nama ?></strong></h5>
       <hr>
       <div class="h4 mt-3">
           <?php if($data->judul): ?>
           Total Artikel : <?= $result->num_rows ?> &nbsp;
           <?php else: ?>
           Total Artikel : 0 &nbsp;
            <?php endif ?>
           <a href="tambah-destinasi.php" class="btn btn-outline-primary btn-lg">Posting </a>
       </div>

  <?php
      if (isset($pesan)) {
           echo "<div class=\"alert alert-info\">$pesan</div>";
      }
    ?>

      </div>
    </div>
 
 <div class="article-home">
   
    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">
   
   <?php
        $result = $conn->query("select * from user inner join wisata on user.id_user = wisata.id_user where user.id_user = $id_user");
          while($data = $result->fetch_object()):
    ?>
       
       <div class="article-content article-content-article text-center">
        <a href="detail-destinasi.php?d=<?= $data->id_wisata ?>">
            <figure class="figure">
              <img src="assets/image/<?= $data->gambar ?>" class="figure-img img-fluid rounded">
            </figure>
            <h3 class="text-center"><?= $data->judul ?></h3>
            <h6><small><?= $data->waktu ?></small> | <small><?= $data->tampil ?>x Dilihat</small> | <small><?= $data->nama ?></small></h6>
            <p>
              <?= substr($data->deskripsi, null, 255)." <br><strong>Read More...</strong>" ?>
            </p>
        </a>
        <a href="edit-destinasi.php?d=<?= $data->id_wisata ?>" class="btn btn-primary">Edit</a>
          </div>
    
    <?php
        endwhile;
        $result->free_result();
    ?>

    </div>
   </div>       
                            
 </div>

<?php require('footer.php') ?>
