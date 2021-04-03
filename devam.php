<?php 

require 'Admin/special/baglan.php';
if (isset($_GET['id'])) {
	$makale_id=$_GET['id'];
	$makalesor=$db->prepare("SELECT * from makale inner join kategori on kategori.kategori_id=makale.makale_kategoriid where makale_id=?");
	$makalesor->execute(array($makale_id));
	$say=$makalesor->rowCount();
	if ($say==0) {
		header("location:../../index.php");
		#Burda gelen  id ile ilgili veri yoksa sayfa index php ye gidiyor ancak seo url ve id alanlarında '/' işareti olduğu için iki klasör yukarı yönlendirip index sayfasına gidiyoruz.

	}
	$makale_cek=$makalesor->fetch(PDO::FETCH_ASSOC);
	$kategori_id=$makale_cek['makale_kategoriid'];
	$makale_id=$makale_cek['makale_id'];
	$makale_seourl=$makale_cek['makale_seourl'];
	$makale_baslik=$makale_cek['makale_baslik'];
	$makale_keyword=$makale_cek['makale_keyword'];
	$makale_aciklama=substr($makale_cek['makale_icerik'], 0,200);
	// BU KODLAR MAKALE OKUNMA SAYISININ ARTMASI İÇİN
	$goruntulenme=@$_COOKIE[$makale_cek['makale_id']];
	if (!$goruntulenme) {
		$update=$db->prepare("UPDATE makale set makale_okunma=? where makale_id=?");
		$update->execute(array($makale_cek['makale_okunma']+1,$makale_id));
		setcookie($makale_cek['makale_id'],"1",time()+600);
		// 10 dakika süre ile okunmalar sayılacak
	}
	
	
}
else{
	header("location:index.php?yetkisizerisim");
}
$title=$makale_baslik;#Dinamik title
$keyword=$makale_keyword;#Dinamik keyword
$description=$title;

include 'header.php'; 
?>

<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
	<div class="page-header-bg"  style="background-image: url('<?php echo $makale_cek['makale_resim'];?>');" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="post-category">
					<a href="kategori-<?=$makale_cek['kategori_seourl'];?>"><?php echo $makale_cek['kategori_ad']; ?></a>
				</div>
				<h1 ><?php echo  $makale_cek['makale_baslik']; ?> </h1>
				<ul class="post-meta">
					<li><a href="author.html">Admin
					</a></li>
					<li><?php 
					
					echo tarihfarki($makale_cek['makale_tarih']);


					?></li>
					<li><i class="fa fa-eye"></i> <?php  echo $makale_cek['makale_okunma']; ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /PAGE HEADER -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<!-- post share -->
				
				<!-- /post share -->

				<!-- post content -->
				<div  class="section-row " >
					<h1><?php echo $makale_cek['makale_baslik'];  ?></h1>

					<?php  echo $makale_cek['makale_icerik'];  ?>


				</div>
				<!-- /post content -->

				

				
				<!-- post author -->
				<!-- Buraya yazar bilgi gelecek -->
				<!-- /post author -->

				<!-- /related post -->
				<div>
					<div class="section-title">
						<h3 class="title">Benzer makaleler</h3>
					</div>
					<div class="row">
						<!-- post -->
						<?php 
						$makalesor=$db->prepare("SELECT * from makale inner join kategori on kategori.kategori_id=makale.makale_kategoriid where makale_kategoriid=?  order by rand() limit 3");
						$makalesor->execute(array($kategori_id));
						while ($makalecek=$makalesor->fetch(PDO::FETCH_ASSOC)) { ?>

							<!-- post -->
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="makale/<?php echo seo($makalecek['makale_baslik']).'/'.$makalecek['makale_id'];?>"><img class="post-3" src="<?php  echo $makalecek['makale_resim']; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="kategori-<?php echo seo($makalecek['kategori_ad']);?>"><?php echo $makalecek['kategori_ad'];  ?></a>
										</div>
										<h3 class="post-title title-sm"><a href="makale/<?php echo seo($makalecek['makale_baslik']).'/'.$makalecek['makale_id'];?>"><?php  echo $makalecek['makale_baslik']; ?></a></h3>
										<ul class="post-meta">
											<li><a href="yazar.php">Admin
											</a></li>
											<li><?php echo $makalecek['makale_tarih']; ?></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- Bu posttları döndüren whilenin süslü parantezi alltakide kategorileri döndürenin ki -->
						<?php  } ?>				
					</div>
				</div>
				<!-- /related post -->
				<!-- YORUM ÇEKME ALANI -->

				
				<!-- Burda yorum eklenemediyse hata verdiyoruz -->
				


				<?php 
				$yorumsor=$db->prepare("SELECT * from yorum where yorum_makaleid=? and yorum_durum=? order by yorum_id desc");
				$yorumsor->execute(array($makale_id,0));
				$yorumsay=$yorumsor->rowCount();
				$yorumcek=$yorumsor->fetchAll(PDO::FETCH_ASSOC);
				?>
				<!-- post comments -->
				<div class="section-row">
					<div class="section-title">
						<h3 class="title"><?=$yorumsay?> Yorum </h3>
					</div>
					<div class="post-comments">

						<?php 
						if ($say>0) {
							foreach ($yorumcek as $bas ) {
								?>
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar-2.jpg" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4><?php echo $bas['yorum_ad']." ".$bas['yorum_soyad']; ?></h4>
											<span class="time"><?php echo $bas['yorum_tarih']; ?></span>
										</div>
										<p><?= $bas['yorum_icerik']; ?></p>
									</div>
								</div>
								<!-- /comment -->
							<?php  }} ?>
						</div>
					</div>
					<!-- /post comments -->
					
					<!-- post reply -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">GÖRÜŞ BELİRT</h3>
						</div>
						<form class="post-reply" id="yorum">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea required="" class="input" name="yorum_icerik" placeholder="Mesaj"></textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="input" type="text" name="yorum_ad" required="" placeholder="Ad">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="input" type="text" name="yorum_soyad"   required="" placeholder="Soyad">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="input" type="email" name="yorum_mail" required="" placeholder="Email">
										<input type="hidden" name="yorum_makaleid" value="<?php echo $makale_id;  ?>">
										
									</div>
								</div>
								<div class="col-md-12">
									<button   name="yorum_ekle"  id="yorum_ekle" class="primary-button">Gönder</button>
								</div>

							</div>
						</form>
						<!-- Burda yorum eklendi mi eklenmedi mi onun bilgisi veriliyor -->
						<div id="sonuc">

						</div>


						
					</div>
					<!-- /post reply -->
				</div>
				<?php include 'sag.php'; ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- KOD PAYLAŞIMI OLDUĞUNDA GÖRÜNÜM İÇİN -->
	<?php include 'footer.php';