<?php include 'sidebar.php'; ?>



<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>
    <?php 
    $sor=$db->prepare("SELECT * from kategori where kategori_id=?");
    $sor->execute(array($_GET['id']));
    $cek=$sor->fetch(PDO::FETCH_ASSOC);


    ?>



    <div class="content mt-3">
        <div class="animated">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Kategori Güncelleme</strong>
                        <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
                         <span class="text-success ">Güncelleme işlemi başarılı</span> 

                     <?php } else if($durum=="basarisiz"){ ?>
                        <span class="text-danger">Güncelleme işlemi başarısız</span>
                        
                    <?php } else if($durum=="ayni"){ ?>
                        <span class="text-danger">Şu anda kullanılan bir kategori ismini kullanmazsınız</span>
                    <?php } ?>


                </div>
                <div class="card-body">
                    

                <form action="special/islem.php" method="post" class="form-horizontal">

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kategori Adı</label></div>
                        <div class="col-12 col-md-6"><input value="<?php echo $cek['kategori_ad'];  ?>"  required="" type="text" id="text-input" name="kategori_ad" placeholder="Kategori adı giriniz.." class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kategori Sıra</label></div>
                        <div class="col-12 col-md-6"><input value="<?php echo $cek['kategori_sira'];  ?>" required=""  type="number" id="text-input" name="kategori_sira" placeholder="Kategori sira giriniz.." class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kategori Durum</label></div>
                        <div class="col-12 col-md-6">
                         <select name="kategori_durum" id="select" class="form-control">
                            <?php  if ($cek['kategori_durum']==1){ ?>

                                <option value="1">Pasif</option>
                                <option value="0">Aktif</option>
                            <?php }else { ?>
                             <option value="0">Aktif</option>
                             <option value="1">Pasif</option>
                         <?php }?>
                     </select>
                 </div>
                 <input type="hidden" value="<?php echo $cek['kategori_id'];  ?>" name="id">
                 <input type="hidden" value="<?php echo $cek['kategori_ad'];  ?>" name="ad">
                 <div class=" col-md-8">
                    <button type="submit" name="kategori_guncelle" class="btn btn-primary mt-3  float-right">
                        <i class="fa fa-dot-circle-o"></i> Güncelle
                    </button>
                </div>
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
