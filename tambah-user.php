<?php require('header.php') ?>

 <div class="article-home">
  
    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-center">
      <h2 class="mt-0 mb-3 ml-0 mr-0 text-center" >Tambah User</h2>
      <?php
        if($pesan_error !== "") echo "<div class=\"alert alert-danger\">$pesan_error</div>";
      ?>       
      <form style="width: 75vw;" method="post" action="dashboard.php">
  <div class="form-group">
    <p class="h4"><strong>Username</strong></p>
    <input type="text" class="form-control form-control-lg" name="username" value="<?= $username ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Password</strong></p>
    <input type="password" class="form-control form-control-lg" name="password" value="<?= $password ?>" required>
  </div>
  <div class="form-group">
      <button type="submit" class="form-control btn btn-primary btn-lg mr-3 mb-3 ml-3" name="tambah_user" value="Tambah">Tambah</button>
  </div>
</form>
   </div>       
 </div> 
 <?php require('footer.php') ?>