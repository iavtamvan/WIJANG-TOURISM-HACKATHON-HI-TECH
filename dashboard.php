<?php require('header.php') ?>
<?php
  if(!$_SESSION['admin']){
    header("Location: masuk.php");
  }
?>
 <div class="article-home">
  
    <div class="flex-md-column flex-sm-column flex-column d-flex  align-items-center">
   
    <?php
      if (isset($pesan)) {
           echo "<div class=\"alert alert-info text-center\">$pesan</div>";
      }
    ?>

      <h2 class="mt-3 mb-3 ml-0 mr-0" style="display:inline-block">wisata</h2>
      <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <a href="print-laporan.php" class="btn btn-primary">CETAK LAPORAN</a>
        <tr>
          <th>NO</th>
          <th>JUDUL</th>
          <th>WAKTU</th>
          <th>VALIDASI</th>
          <th>TAMPIL</th>
          <th>ACTION</th>
        </tr>
        <?php
        $result = $conn->query("select * from wisata order by waktu desc");
          $i = 1;
          while($data = $result->fetch_object()):
      ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $data->judul ?></td>
          <td><?= $data->waktu ?></td>
          <td style="text-transform:uppercase;" >
            <?= $data->validasi ?>
        </td>
          <td><?= $data->tampil ?> kali</td>
          <td>
            <a href="detail-destinasi.php?d=<?= $data->id_wisata ?>" class="btn btn-primary">DETAIL</a>
            <form action="validasi-destinasi.php" method="post" style="display:inline-block">
              <input type="hidden" value="<?= $data->id_wisata ?>" name="id_wisata">
              <button type="submit" class="btn btn-info">VALIDASI</button>
            </form>
            <form action="hapus-destinasi.php" method="post" style="display:inline-block">
              <input type="hidden" value="<?= $data->id_wisata ?>" name="id_wisata">
              <button type="submit" class="btn btn-danger">HAPUS</button>
            </form>
          </td>
        </tr>
        <?php
        endwhile;
        $result->free_result();
    ?>
      </table>
    </div>

    <h2 class="mt-3 mb-3 ml-0 mr-0" style="display:inline-block">DRAFT YANG BELUM DIVALIDASI</h2>
      <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <tr>
          <th>NO</th>
          <th>JUDUL</th>
          <th>WAKTU</th>
          <th>USER</th>
          <th>ACTION</th>
        </tr>
        <?php
        $result = $conn->query("select * from wisata join user on wisata.id_user = user.id_user where validasi = 'tidak' order by waktu desc");
          $i = 1;
          while($data = $result->fetch_object()):
      ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $data->judul ?></td>
          <td><?= $data->waktu ?></td>
          <td>
            <?= $data->nama ?>
        </td>
          <td>
            <a href="detail-destinasi.php?d=<?= $data->id_wisata ?>" class="btn btn-primary">DETAIL</a>
            <form action="validasi-destinasi.php" method="post" style="display:inline-block">
              <input type="hidden" value="<?= $data->id_wisata ?>" name="id_wisata">
              <button type="submit" class="btn btn-info">VALIDASI</button>
            </form>
            <form action="hapus-destinasi.php" method="post" style="display:inline-block">
              <input type="hidden" value="<?= $data->id_wisata ?>" name="id_wisata">
              <button type="submit" class="btn btn-danger">HAPUS</button>
            </form>
          </td>
        </tr>
        <?php
        endwhile;
        $result->free_result();
    ?>
      </table>
    </div>

      <h2 class="mt-3 mb-3 ml-0 mr-0">User </h2>
      <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered">
          <tr>
            <th>NO</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>TELEPON</th>
            <th>LEVEL</th>
            <th>ACTION</th>
        </tr>

        <?php
        $result = $conn->query("select * from user");
          $i = 1;
          while($data = $result->fetch_object()):
      ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $data->username ?></td>
          <td><?= $data->email ?></td>
          <td><?= $data->telepon ?></td>
          <td style="text-transform:uppercase"><?= $data->level ?></td>
          <td>
            <form action="hapus-user.php" method="post" style="display:inline-block">
              <input type="hidden" value="<?= $data->id_user ?>" name="id_user">
              <button type="submit" class="btn btn-danger">HAPUS</button>
            </form>
          </td>
        </tr>

        <?php
        endwhile;
        $result->free_result();
    ?>
      </table>
    </div>
    </div>       
 </div> 

<?php require('footer.php') ?>