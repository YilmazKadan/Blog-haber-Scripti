<?php
include 'sidebar.php'; 
$sor=$db->prepare('SELECT * from makale  order by makale_tarih asc ');
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
   
    .ana{
      min-width: 50px;
    }
    td img{
      width: 400px;
      height: 150px;
    }
    
   

  </style>

  <div class="content mt-3">
    <div class="animated ">

      <div class="card">
        <div class="card-header">
          <strong class="card-title">Makaleler</strong>

          <?php $durum=@$_GET['sil']; if ($durum=="basarili") { ?>
           <span class="text-success ">Silme işlemi başarılı</span> 

         <?php } else if($durum=="basarisiz"){ ?>
          <span class="text-danger">Silme  işlemi başarısız</span>
        <?php } ?>

        <a href="makale_ekle.php" class="btn btn-success  float-right">Makale ekle</a>
      </div>
      <!-- TABLO ALANI -->
      <div class="card-body table-responsive">
        <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="ana" >Makale Fotoğraf</th>
              <th>Makale Başlık</th>
              <th>Makale Tarih</th>
              <th>Makale Okunma Sayısı</th>
              <th>makale Durum</th>

              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php  while ($cek=$sor->fetch(PDO::FETCH_ASSOC)) {?>
              <tr>
                <td style="padding:0;"><img  src="../<?php echo $cek['makale_resim'];   ?>"></td>
                <td><?php echo $cek['makale_baslik']; ?></td>
                <td><?php echo $cek['makale_tarih']; ?></td>
                <td><?php echo $cek['makale_okunma'];  ?></td>
                <td>
                  <?php
                  if ($cek['makale_durum']=='0') 
                    echo '<span class="text-success">Aktif</span>';
                  else 
                    echo '<span class="text-danger">Pasif</span>';
                  ?>  
                </td>
                <input type="hidden" name="eski_resim" value="<?php echo $cek['makale_resim'];?>" name="">
                <td><a href="makale_guncelle.php?id=<?php echo $cek['makale_id']  ?>" class=" btn btn-outline-primary"> Güncelle</a></td>
                <td><a href="special/islem.php?makale_sil&id=<?php echo $cek['makale_id']  ?>" id="btn" class=" btn btn-outline-danger"> Sil</a></td>
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
