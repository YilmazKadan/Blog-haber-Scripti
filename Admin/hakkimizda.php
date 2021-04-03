<?php include 'sidebar.php'; ?>



<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>

    <?php 

    $sor=$db->prepare("SELECT * from hakkimizda ");
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
                                <strong>Hakkımızda</strong>
                                <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
                                 <span class="text-success ">Güncelleme işlemi başarılı</span> 
                             <?php } else if($durum){ ?>
                                <span class="text-danger">Güncelleme işlemi başarısız</span>
                            <?php } ?>


                        </div>
                        <div class="card-body card-block">
                            <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hakkımızda başlık</label></div>
                                    <div class="col-12 col-md-12"><input value="<?php echo $cek['hakkimizda_baslik'];  ?>" type="text" id="text-input" name="hakkimizda_baslik" placeholder="Hakkımızda alanı başlığı giriniz" class="form-control"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Hakkımızda içerik</label></div>
                                    <div class="col-12 col-md-12"><textarea name="hakkimizda_icerik" id="editor1" rows="9" placeholder="Sitede gözücek adres bilginizi giriniz" class="form-control"><?php echo htmlspecialchars($cek['hakkimizda_icerik']);?></textarea></div>
                                </div>
                                

                                <button type="submit" name="hakkimizda_guncelle" class="btn btn-primary  float-right">
                                    <i class="fa fa-dot-circle-o"></i> Güncelle
                                </button>


                            </form>
                            <form>


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