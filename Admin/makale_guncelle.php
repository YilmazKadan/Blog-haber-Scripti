<?php include 'sidebar.php'; ?>



<div id="right-panel" class="right-panel">

  <!-- Header-->
  <?php include 'header.php';?>

  <?php 
    #Burda id olmadan makale güncelleme sayfasına gelinmiş ise makale sayfasına yönlendiriyoruz.
  if (isset($_GET['id'])) {
   $id=$_GET['id']; 
   $sor=$db->prepare("SELECT * from makale where makale_id=?");
   $sor->execute(array($id));
   $cek=$sor->fetch(PDO::FETCH_ASSOC);
   $kategori_id=$cek['makale_kategoriid'];

 }
 else{
   header("Location:makale.php");
 }

 ?>
 <div class="content mt-3">
  <div class="animated">




    <!-- BURAYA İÇERİKLER GELECEK KART GÖVDESİDİR -->


    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong>Makale ekleme </strong>
          <?php $durum=@$_GET['guncelleme']; if ($durum=="basarili") { ?>
           <span class="text-success ">Güncelleme işlemi başarılı</span> 
         <?php } else if($durum){ ?>
          <span class="text-danger">Güncelleme işlemi başarısız</span>
        <?php } ?>


      </div>
      <div class="card-body card-block">
        <!-- MAKALE FOTOĞRAF GÜNCELLEME ALANI -->
        <form action="special/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">

          <div class="row form-group">
            <div class=" col-md-12">
              <label for="text-input" class="form-control-label">Yüklü Fotoğraf</label>
            </div>
            <div class="col col-md-12">


             <img style="float:left;width: 100%;height: 400px;border: 2px solid #cccccc;" src="../<?php echo $cek['makale_resim'];   ?>" >
           </div>
         </div>
         <!-- Burda eski logoyu silmek için logo yolu gizli bir input ile belirtiliyor -->
         <input type="hidden" value="<?php echo $cek['makale_resim']; ?>" name="eski_yol">
         <input type="hidden" value="<?php echo $cek['makale_id']; ?>" name="makale_id">

         <div class="row form-group">
          <div class="col col-md-10">
            <label for="file-input" class=" form-control-label">Yeni Fotoğraf</label>
          </div>
          <div class="col-12 col-md-10">
            <input type="file" id="file-input" required="" name="makale_resim" class="form-control-file">
          </div>
        </div>
        <div class="row form-group">

          <div class="col-12 col-md-10">
            <button type="submit" name="makaleresim_guncelle" class="btn btn-primary  float-left">
              <i class="fa fa-dot-circle-o"></i> Güncelle
            </button>
          </div>
        </div>



      </form>
      <!-- MAKALE FOTOĞRAF GÜNCELELME ALANI BİTİŞ -->
      <form action="special/islem.php" method="post"  class="form-horizontal">

        <div class="row form-group">
          <div class="col col-md-10"><label for="text-input" class=" form-control-label">Makale başlık</label></div>
          <div class="col-12 col-md-5"><input value="<?php echo $cek['makale_baslik'];?>" required=""  type="text" id="text-input" name="makale_baslik" placeholder="Makale başlığı giriniz" class="form-control"></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-12"><label for="text-input" class=" form-control-label">Makale Keyword</label></div>
          <div class="col-12 col-md-5"><input value="<?php echo $cek['makale_keyword'];?>" required=""  type="text" id="text-input" name="makale_keyword" placeholder="Makale keyword giriniz..." class="form-control"></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-10"><label for="select" class=" form-control-label">Makale Durum</label></div>
          <div class="col-12 col-md-3">
           <select name="makale_durum" id="select" class="form-control">
            <?php  if ($cek['makale_durum']==1){ ?>

              <option value="1">Pasif</option>
              <option value="0">Aktif</option>
            <?php }else { ?>
             <option value="0">Aktif</option>
             <option value="1">Pasif</option>
           <?php }?>
         </select>

         </div>
       </div>

       <input type="hidden" value="<?php echo $cek['makale_id'];?>" name="id">

       <div class="row form-group">
        <div class="col col-md-10">
          <label for="deneme" class=" form-control-label">Makale Kategorisi</label>
        </div>
        <div class="col-12 col-md-3">
          <select id="deneme" type="select"  required="" name="makale_kategoriid" class="form-control">
            <?php  
            $sor=$db->prepare("Select * from kategori order by kategori_ad asc");
            $sor->execute();
            while ($kategori_cek=$sor->fetch(PDO::FETCH_ASSOC)) { ?>
              <option <?php if ($kategori_cek['kategori_id']==$kategori_id) echo 'selected'; ?>  value="<?php  echo $kategori_cek['kategori_id'];  ?>"><?php echo $kategori_cek['kategori_ad'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>




      <div class="row form-group">
        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Makale içerik</label></div>
        <div class="col-12 col-md-12"><textarea name="makale_icerik" required="" id="editor1" rows="9"  class="form-control">
          <?php echo htmlspecialchars($cek['makale_icerik']); ?>
        </textarea></div>
      </div>
      <button type="submit" name="makale_guncelle" class="btn btn-primary  float-right">
        <i class="fa fa-dot-circle-o"></i> Güncelle
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