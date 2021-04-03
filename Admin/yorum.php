<?php
include 'sidebar.php'; 
$sor=$db->prepare('SELECT * from yorum inner join makale on yorum.yorum_makaleid=makale.makale_id  order by yorum_id asc ');
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
    textarea{
      min-height: 100px;
      min-width: 200px;
    }
    .btn{
      width: 90px;
    }

  </style>
 
  <div class="content mt-3">
    <div class="animated ">

      <div class="card">
        <div class="card-header">
          <strong class="card-title">Yorumlar</strong>

          <?php $durum=@$_GET['sil']; if ($durum=="basarili") { ?>
            <span class="text-success ">Silme işlemi başarılı</span> 
          <?php } else if($durum=="basarisiz"){ ?>
            <span class="text-danger">Silme  işlemi başarısız</span>
          <?php } else if(@$_GET['onay']=="ok"){ ?>
            <span class="text-success">Onaylama  işlemi başarılı</span>
          <?php } else if(@$_GET['onay']=="no"){ ?>
            <span class="text-danger">Onaylama  işlemi başarısız</span>
          <?php } else if(@$_GET['pasif']=="ok"){ ?>
            <span class="text-success">Pasifleştirme  işlemi başarılı</span>
          <?php } else if(@$_GET['pasif']=="no"){ ?>
            <span class="text-danger">Pasifleştirme  işlemi başarısız</span>
          <?php } ?>

        </div>
        <!-- TABLO ALANI -->
        <div class="card-body table-responsive">
          <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Ad Soyad</th>
                <th>Mail</th>
                <th>Makale</th>
                <th>Yorum </th>
                <th>Tarih </th>
                <th>Yorum Durum</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <?php  while ($cek=$sor->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                  <td><?php echo $cek['yorum_ad'].'<br>'.$cek['yorum_soyad']; ?></td>
                  <td><?php echo $cek['yorum_mail']; ?></td>
                  <td><?php echo $cek['makale_baslik']; ?></td>
                  <td><textarea class="form-control" disabled=""><?php echo $cek['yorum_icerik']; ?></textarea></td>
                  <td><?php echo $cek['yorum_tarih']; ?></td>
                  <td>
                    <?php
                    if ($cek['yorum_durum']=='0') 
                      echo '<span class="text-success">Aktif</span>';
                    else 
                      echo '<span class="text-danger">Pasif</span>';
                    ?>  
                  </td>
                  <td>
                   <?php
                   if ($cek['yorum_durum']=='1'){ ?>
                    <a href="special/islem.php?yorum_onayla&yorum_id=<?php echo $cek['yorum_id']  ?>" class=" btn btn-outline-success"> Onayla</a> 
                  <?php }  else{ ?>
                    <a href="special/islem.php?yorum_pasif&yorum_id=<?php echo $cek['yorum_id']  ?>" class=" btn btn-outline-warning">Pasif Yap</a> 
                  <?php } ?>


                </td>

                <td><a href="special/islem.php?yorum_sil&yorum_id=<?php echo $cek['yorum_id']  ?>" id="btn" class=" btn btn-outline-danger"> Sil</a></td>
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
