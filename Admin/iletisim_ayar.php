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
                                <strong>İletişim ayarları</strong>
                                <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
                                 <span class="text-success ">Güncelleme işlemi başarılı</span> 
                             <?php } else if($durum){ ?>
                                <span class="text-danger">Güncelleme işlemi başarısız</span>
                            <?php } ?>


                        </div>
                        <div class="card-body card-block">
                            <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telefon 1</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_tel1'];  ?>" type="text" id="text-input" name="site_tel1" placeholder="Site başlığı giriniz.." class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telefon 2</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_tel2']; ?>" type="text" id="text-input" name="site_tel2" placeholder="Site açıklması giriniz.." class="form-control"><small class="form-text text-muted">Sitenizde gözükecek 2.telefon numarası</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">E posta Adresi</label></div>
                                    <div class="col-12 col-md-9"><input value="<?php echo $cek['site_eposta'];  ?>" type="text" id="text-input" name="site_eposta" placeholder="Site anahtar kelimeleri giriniz..." class="form-control"><small class="form-text text-muted">Sitenizde görüncek E-mail adresiniz</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Adres</label></div>
                                    <div class="col-12 col-md-9"><textarea name="site_adres" id="textarea-input" rows="9" placeholder="Sitede gözücek adres bilginizi giriniz" class="form-control"><?php echo $cek['site_adres']; ?></textarea></div>
                                </div>

                                <button type="submit" name="iletisimayar_guncelle" class="btn btn-primary  float-right">
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