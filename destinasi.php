<?php require('header.php') ?>
   <div class="jumbotron flex-column d-flex event-jumbotron align-items-center justify-content-center" id="banner-artikel">
      <h2 class="text-center text-uppercase">destination</h2>
</div>
 
 <div class="article-home daftar-article-home">
   <div class="flex-sm-column flex-row d-flex align-items-center justify-content-center">
    
    <form class="form-inline" action="pencarian-artikel.php" method="get">
  <div class="form-group mx-sm-3 mb-2">
    <input type="ntext" name="des" class="form-control form-control-lg" id="inputPassword2" style="width: 50vw">
      </div>
      <input type="submit" class="btn btn-primary mb-2 ml-1 btn-lg" value="Cari">
    </form>
  
   </div>
   
    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

      <?php
        $result = $conn->query("select * from wisata inner join user on user.id_user = wisata.id_user where validasi = 'ya' order by waktu desc");
          while($data = $result->fetch_object()):
      ?>

       <a href="detail-destinasi.php?d=<?= $data->id_wisata ?>">
        <div class="article-content article-content-article text-center">
            <figure class="figure">
                <br>
              <img src="assets/image/<?= $data->gambar ?>" class="figure-img img-fluid rounded">
            </figure>
            <h3 class="text-center"><?= $data->judul ?></h3>
            <h6><small><?= $data->waktu ?></small> | <small><?= $data->tampil ?>x Dilihat</small> | <small><?= $data->nama ?></small></h6>
            <p>
              <?= substr($data->deskripsi, null, 255)." <br><strong>Read More...</strong>" ?>
            </p>
          </div>
        </a>

    <?php
        endwhile;
        $result->free_result();
    ?>
    
    
    </div>
   </div>  
        
   
 </div> 

<?php require('footer.php') ?>