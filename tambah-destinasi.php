<?php require('header.php') ?>

 <div class="article-home">
  
    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-center">
      <h2 class="mt-0 mb-3 ml-0 mr-0 text-center" >Posting Artikel</h2>
      <?php
        if($pesan_error !== "") echo "<div class=\"alert alert-danger\">$pesan_error</div>";
      ?>       
      <form style="width: 75vw;" method="post" action="tambah-destinasi.php" enctype="multipart/form-data">
  <div class="form-group">
    <p class="h4"><strong>Judul</strong></p>
    <input type="text" class="form-control form-control-lg" name="judul" value="<?= $judul ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Deskripsi</strong></p>
    <textarea class="form-control" cols="30" rows="10" name="deskripsi" required><?= $deskripsi ?></textarea>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Gambar</strong></p>
    <div class="custom-file">
        <input type="file" name="gambar" required accept="image/*" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Pilih Gambar</label>
      </div>
  </div>
  <div class="form-group">
      <button type="submit" class="form-control btn btn-primary btn-lg mr-3 mb-3 ml-3" name="post_wisata" value="Posting">POSTING</button>
  </div>
</form>
      
   </div>       
                            
 </div> 
 <?php require('footer.php') ?>