<?php include 'sidebar.php'; ?>



<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>

    
    <div class="content mt-3">
        <div class="animated">




            <!-- BURAYA İÇERİKLER GELECEK KART GÖVDESİDİR -->


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Makale ekleme </strong>
                        <?php $durum=@$_GET['ekle']; if ($durum=="basarili") { ?>
                         <span class="text-success ">Ekleme işlemi başarılı</span> 
                     <?php } else if($durum){ ?>
                        <span class="text-danger">Ekleme işlemi başarısız</span>
                    <?php } ?>


                </div>
                <div class="card-body card-block">
                    <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Makale başlık</label></div>
                            <div class="col-12 col-md-10"><input required=""  type="text" id="text-input" name="makale_baslik" placeholder="Makale başlığı giriniz" class="form-control"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Makale Keyword</label></div>
                            <div class="col-12 col-md-10"><input required=""  type="text" id="text-input" name="makale_keyword" placeholder="Makale keyword giriniz..." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-10">
                                <label for="file-input" class=" form-control-label">Makale fotoğrafı</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="file" id="file-input" required="" name="makale_resim" class="form-control-file">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-10"><label for="text-input" class=" form-control-label">Makale Durum</label></div>
                            <div class="col-12 col-md-10">
                                <select name="makale_durum" id="select" class="form-control">
                                <option value="0">Aktif</option>
                                <option value="1">Pasif</option>

                            </select>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-10">
                            <label for="file-input" class=" form-control-label">Makale Kategorisi</label>
                        </div>
                        <div class="col-12 col-md-10">
                            <select id="select" type="select"  required="" name="makale_kategoriid" class="form-control">
                                <?php  
                                $sor=$db->prepare("Select * from kategori order by kategori_ad asc");
                                $sor->execute();
                                while ($cek=$sor->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php  echo $cek['kategori_id'];  ?>"><?php echo $cek['kategori_ad'] ?></option>
                                <?php } ?>



                            </select>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Makale içerik</label></div>
                        <div class="col-12 col-md-12"><textarea name="makale_icerik" required="" id="editor1" rows="9"  class="form-control"></textarea></div>
                    </div>
                    <button type="submit" name="makale_ekle" class="btn btn-primary  float-right">
                        <i class="fa fa-dot-circle-o"></i> Ekle
                    </button>
                </form>
            </div>

        </div>

    </div>















</div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'footer.php';?>