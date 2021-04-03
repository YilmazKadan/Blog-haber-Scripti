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

            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title" v-if="headerText">Ayarlar</strong>
                </div>
                <div class="card-body">
                    <!-- BURAYA İÇERİKLER GELECEK KART GÖVDESİDİR -->


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Sosyal hesap ayarları</strong>
                                <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
                                 <span class="text-success ">Güncelleme işlemi başarılı</span> 
                             <?php } else if($durum){ ?>
                                <span class="text-danger">Güncelleme işlemi başarısız</span>
                            <?php } ?>


                        </div>
                        <div class="card-body card-block">
                            <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Facebook adresiniz</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_facebook'];  ?>" type="text" id="text-input" name="site_facebook" placeholder="Facebook adresi giriniz.." class="form-control"><small class="form-text text-muted">Sitenizdeki butonlarda gözükecek facebook adresiniz</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">İnstagaram adresiniz</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_instagram']; ?>" type="text" id="text-input" name="site_instagram" placeholder="İnstagram adresi giriniz.." class="form-control"><small class="form-text text-muted">Sitenizdeki butonlarda gözükecek instagram adresiniz</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Youtube adresiniz</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_youtube'];  ?>" type="text" id="text-input" name="site_youtube" placeholder="Youtube adresi giriniz.." class="form-control"><small class="form-text text-muted">Sitenizdeki butonlarda gözükecek youtube adresiniz</small></div>
                                </div>
                                 <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Twitter adresiniz</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_twitter'];  ?>" type="text" id="text-input" name="site_twitter" placeholder="Twitter adresi giriniz.." class="form-control"><small class="form-text text-muted">Sitenizdeki butonlarda gözükecek twitter adresiniz</small></div>
                                </div>

                                <button type="submit" name="sosyalayar_guncelle" class="btn btn-primary  float-right">
                                    <i class="fa fa-dot-circle-o"></i> Güncelle
                                </button>


                            </form>
                        </div>
                        
                    </div>

                </div>






            </div>
        </div>







    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'footer.php';?>