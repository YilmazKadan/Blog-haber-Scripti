<?php include 'sidebar.php'; ?>



<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>



    <div class="content mt-3">
        <div class="animated">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Kategori Ekleme</strong>
                        <?php $durum=@$_GET['ekle']; if ($durum=="basarili") { ?>
                         <span class="text-success ">Ekleme işlemi başarılı</span> 

                     <?php } else if($durum=="basarisiz"){ ?>
                        <span class="text-danger">Ekleme işlemi başarısız</span>
                        
                    <?php } else if($durum=="ayni"){ ?>
                        <span class="text-danger">Aynı isimde kategori oluşturulamaz</span>
                    <?php } ?>


                </div>
                <div class="card-body">
                    <form action="special/islem.php" method="post" class="form-horizontal">

                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kategori Adı</label></div>
                            <div class="col-12 col-md-6"><input  required="" type="text" id="text-input" name="kategori_ad" placeholder="Kategori adı giriniz.." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kategori Sıra</label></div>
                            <div class="col-12 col-md-6"><input required=""  type="number" id="text-input" name="kategori_sira" placeholder="Kategori sira giriniz.." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Kategori Durum</label></div>
                            <div class="col-12 col-md-6">
                             <select name="kategori_durum" id="select" class="form-control">
                                <option value="0">Aktif</option>
                                <option value="1">Pasif</option>

                            </select>

                        </div>
                    </div>


                    <div class=" col-md-8">
                        <button type="submit" name="kategori_ekle" class="btn btn-primary mt-3  float-right">
                            <i class="fa fa-dot-circle-o"></i> Ekle
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