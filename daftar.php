<?php require('header.php') ?>

 <div class="article-home">
  
    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-center">
      <h2 class="mt-0 mb-3 ml-0 mr-0 text-center" >Daftar</h2>
      <?php
        if($pesan_error !== "") echo "<div class=\"alert alert-danger\">$pesan_error</div>";
      ?>       
      <form style="width: 75vw;" method="post" action="index.php">
  <div class="form-group">
    <p class="h4"><strong>Nama</strong></p>
    <input type="text" class="form-control form-control-lg" name="nama" value="<?= $nama ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Email</strong></p>
    <input type="email" class="form-control form-control-lg" name="email" value="<?= $email ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Telepon</strong></p>
    <input type="tel" class="form-control form-control-lg" name="telepon" value="<?= $telepon ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Username</strong></p>
    <input type="text" class="form-control form-control-lg" name="username" value="<?= $username ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Password</strong></p>
    <input type="password" class="form-control form-control-lg" name="password" value="<?= $password ?>" required>
  </div>
  <div class="form-group">
      <button type="submit" class="form-control btn btn-primary btn-lg mr-3 mb-3 ml-3" name="daftar" value="Daftar">Daftar</button>
  </div>
</form>
   </div>       
 </div> 
 <?php require('footer.php') ?>