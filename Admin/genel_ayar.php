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
                                <strong>Genel ayarlar</strong>
                                <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
                                   <span class="text-success">Güncelleme işlemi başarılı</span> 
                                <?php } else if($durum){ ?>
                                    <span class="text-danger">Güncelleme işlemi başarısız</span>
                                <?php } ?>

                                    

                                    



                                </div>
                                <div class="card-body card-block">
                                    <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Url Adresi</label></div>
                                            <div class="col-12 col-md-9"><input value="<?php echo $cek['site_url'];  ?>" type="text" id="text-input" name="site_url" placeholder="Site alan adı  giriniz.." class="form-control"><small class="form-text text-muted">Sitenizin Alan adı </small></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Başlığı</label></div>
                                            <div class="col-12 col-md-9"><input value="<?php echo $cek['site_tittle'];  ?>" type="text" id="text-input" name="site_tittle" placeholder="Site başlığı giriniz.." class="form-control"><small class="form-text text-muted">Sitenizin googledeki adı</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Açıklaması</label></div>
                                            <div class="col-12 col-md-9"><input value="<?php echo $cek['site_aciklama']; ?>" type="text" id="text-input" name="site_aciklama" placeholder="Site açıklması giriniz.." class="form-control"><small class="form-text text-muted">Sitenizin google aramalarında çıkacak açıklması</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Anahtar kelime</label></div>
                                            <div class="col-12 col-md-9"><input value="<?php echo $cek['site_keyword'];  ?>" type="text" id="text-input" name="site_keyword" placeholder="Site anahtar kelimeleri giriniz..." class="form-control"><small class="form-text text-muted">Her bir anahtar kelimenin arasına "," koyunuz</small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Yazar</label></div>
                                            <div class="col-12 col-md-9"><input value="<?php echo $cek['site_yazar'];  ?>" type="text" id="text-input" name="site_yazar" placeholder="Site yazarı giriniz.." class="form-control"><small class="form-text text-muted">Sitenizin googledeki yapımcısı</small></div>
                                        </div>

                                        <button  type="submit" name="genelayar_guncelle" class="btn btn-primary  float-right">
                                            <i class="fa fa-dot-circle-o"></i> Güncelle
                                        </button>


                                    </form>
                                </div>
                                <div class="card-footer ">

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