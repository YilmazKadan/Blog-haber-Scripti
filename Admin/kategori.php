<?php
include 'sidebar.php'; 
$sor=$db->prepare('Select * from kategori  order by kategori_id asc ');
$sor->execute()
?>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

  <!-- Header-->
  <?php include 'header.php';?>

  <style>

    th,td{
      text-align: center;
    }
    #btn{
      width: 90px;
    }

  </style>

  <div class="content mt-3">
    <div class="animated ">

      <div class="card">
        <div class="card-header">
          <strong class="card-title">Kategoriler</strong>

          <?php $durum=@$_GET['sil']; if ($durum=="basarili") { ?>
           <span class="text-success ">Silme işlemi başarılı</span> 

         <?php } else if($durum=="basarisiz"){ ?>
          <span class="text-danger">Silme  işlemi başarısız</span>
        <?php } ?>

        <a href="kategori_ekle.php" class="btn btn-success  float-right">Kategori ekle</a>
      </div>
      <!-- TABLO ALANI -->
      <div class="card-body table-responsive">
        <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Kategori Adı</th>
              <th>Kategori Sırası</th>
              <th>Kategori Durum</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php  while ($cek=$sor->fetch(PDO::FETCH_ASSOC)) {?>
              <tr>
                <td><?php echo $cek['kategori_ad']; ?></td>
                <td><?php echo $cek['kategori_sira']; ?></td>
                <td>
                  <?php
                  if ($cek['kategori_durum']=='0') 
                    echo '<span class="text-success">Aktif</span>';
                  else 
                    echo '<span class="text-danger">Pasif</span>';
                  ?>  
                </td>
                <td><a href="kategori_guncelle.php?id=<?php echo $cek['kategori_id']  ?>" class=" btn btn-outline-primary"> Güncelle</a></td>
                <td><a href="special/islem.php?kategori_sil&id=<?php echo $cek['kategori_id']  ?>" id="btn" class=" btn btn-outline-danger"> Sil</a></td>
              </tr>  
            <?php } ?>

          </tbody>
        </table>
      </div>

      <!-- TABLO ALANI BİTİŞ -->
    </div>

  </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'footer.php';?>
