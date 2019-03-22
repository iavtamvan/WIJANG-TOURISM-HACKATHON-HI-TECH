<?php require('header.php') ?>
<?php
    if(isset($_GET["d"])){
        $id = $_GET["d"];
        $result = $conn->query("select * from wisata where id_wisata = $id");
        $data = $result->fetch_object();

        $judul = $data->judul;
        $deskripsi = $data->deskripsi;
        $id = $data->id_wisata;
    }else{
        header("Location: index.php");
    }
?>
 <div class="article-home">
  
    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-center">
      <h2 class="mt-0 mb-3 ml-0 mr-0 text-center" >Edit Artikel</h2>
      <?php
        if($pesan_error !== "") echo "<div class=\"alert alert-danger\">$pesan_error</div>";
      ?>       
      <form style="width: 75vw;" method="post" action="dashboard-user.php">
  <div class="form-group">
    <p class="h4"><strong>Judul</strong></p>
    <input type="text" class="form-control form-control-lg" name="judul" value="<?= $judul ?>" required>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Deskripsi</strong></p>
    <textarea class="form-control" cols="30" rows="10" name="deskripsi" required><?= $deskripsi ?></textarea>
  </div>
  <div class="form-group">
      <input type="hidden" value="<?= $id ?>" name="id_wisata">
      <button type="submit" class="form-control btn btn-primary btn-lg mr-3 mb-3 ml-3" name="edit_wisata" value="Edit">EDIT</button>
  </div>
</form>
      
   </div>       
                            
 </div> 
 <?php require('footer.php') ?>