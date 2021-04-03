<?php include 'sidebar.php'; ?>



<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>

    <?php 

    $sor=$db->prepare("SELECT * from ayar ");
    $sor->execute();
    $cek=$sor->fetch(PDO::FETCH_ASSOC);




    ?>

    <div class="content mt-3">
        <div class="animated">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Logo güncelleme</strong>
                        <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
                         <span class="text-success ">Güncelleme işlemi başarılı</span> 
                     <?php } else if($durum){ ?>
                        <span class="text-danger">Güncelleme işlemi başarısız</span>
                    <?php } ?>


                </div>
                <div class="card-body">
                    <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="text-input" class="form-control-label">Yüklü logo</label>
                            </div>
                            <div class="col col-md-5">
                                <!-- Burda  veri tabanında logo alanı boş ise logo yok görseli ekrana basılıyor eğer var ise veri tabanındaki yola göre bulunan logo görseli çekiliyor -->
                                <?php if (strlen($cek['site_logo'])>0) {?>
                                   <img style="width: 250px;height: 200px;border: 2px solid #cccccc;" src="../<?php echo $cek['site_logo']; ?>">
                               <?php } else{?>
                                <img style="width: 250px;height: 200px;border: 2px solid #cccccc" src="../img/logo-yok.png">
                            <?php } ?>



                        </div>
                    </div>
                    <!-- Burda eski logoyu silmek için logo yolu gizli bir input ile belirtiliyor -->
                    <input type="hidden" value="<?php echo $cek['site_logo']; ?>" name="eski_yol">

                    <div class="row form-group">
                        <div class="col col-md-10">
                            <label for="file-input" class=" form-control-label">Yeni logo</label>
                        </div>
                        <div class="col-12 col-md-10">
                            <input type="file" id="file-input" required="" name="logo" class="form-control-file">
                        </div>
                    </div>
                    <button type="submit" name="logo_guncelle" class="btn btn-primary  float-left">
                        <i class="fa fa-dot-circle-o"></i> Güncelle
                    </button>


                </form>
            </div>

        </div>





    </div>
</div>







</div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'footer.php';?>