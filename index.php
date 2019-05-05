<?php require('header.php') ?>
    <div id="banner">
       <video src="assets/video/semarang.mp4" autoplay loop></video>
    </div>
 
    <div class="jumbotron flex-column d-flex align-items-center justify-content-center">
      <img src="assets/image/info.png" width="190"height="70">
  <h4 class="text-center">WIJANG adalah sebuah aplikasi web yang dikembangkan menggunakan bootstrap di dampingi dengan PHP. Web ini berisikan postingan - postingan para traveling yang sudah mengunjungi suatu tempat wisata kemudian melakukan pembaruan di web sehingga daapt memberikan informasi yang akurat kepada user.</h4>
    </div>
  
 <div class="article-home">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
    
    <h2 class="text-center">destinasi wisata</h2>
    <a class="btn btn btn-primary btn-lg" style="color: white" href="destinasi.php" role="button">SELENGKAPNYA</a>
    
   </div>
   
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">
      
      <?php
            $result = $conn->query("select * from wisata inner join user on user.id_user = wisata.id_user where validasi = 'ya' order by waktu desc limit 10");
            while($data = $result->fetch_object()):
      ?>

        <div class="article-content article-content-article text-center">
            <figure class="figure">
                <br>
              <img src="assets/image/<?= $data->gambar ?>" class="figure-img img-fluid rounded">
            </figure>
            <h3 class="text-center"><?= $data->judul ?></h3>
            <h6><small><?= $data->waktu ?></small> | <small><?= $data->tampil ?>x Dilihat</small> | <small><?= $data->nama ?></small></h6>
            <p>
                <a href="detail-destinasi.php?d=<?= $data->id_wisata ?>">
              <?= substr($data->deskripsi, null, 255)." <br><strong>Read More...</strong>" ?></a>
            </p>
          </div>

      <?php
            endwhile;
            $result->free_result();
      ?>
    </div>
   </div>
 </div>
 <?php require('footer.php') ?>