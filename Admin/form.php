<?php include 'sidebar.php'; ?>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>



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
                                <strong>Genel ayarlar</strong> <span class="text-success">İşlem başarılı</span> 
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Başlığı</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Facebook Adresiniz" class="form-control"><small class="form-text text-muted">Profil linkinizi tam anlamıyla ekleyiniz.</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Site Açıklaması</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">Please enter your email</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Site anahtar kelime</label></div>
                                        <div class="col-12 col-md-9"><input type="text"  name="password-input" placeholder="Password" class="form-control"><small class="help-block form-text">Please enter a complex password</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                                    </div>
                                    <button type="Güncelle" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Güncelle
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Temizle
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