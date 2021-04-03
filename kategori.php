<?php 
require 'Admin/special/baglan.php';

if (isset($_GET['sef'])) {
	#Burda gelen sef linke göre veri tabanından kontrol yapılıyor ve aktif olan kategori çekiliyor yok ise index php ye yönlendiriliyor
	$kategorisor=$db->prepare("SELECT * from kategori where kategori_seourl=? and kategori_durum=?");
	$kategorisor->execute(array($_GET['sef'],0));
	$say=$kategorisor->rowcount();
	$kategori_cek=$kategorisor->fetch(PDO::FETCH_ASSOC);
	if ($say==0) {
		header("location:index.php");exit;
	}
	else{
		$kategori_id=$kategori_cek['kategori_id'];
		$kategori_ad=$kategori_cek['kategori_ad'];
		$kategori_seourl=$kategori_cek['kategori_seourl'];
	}
}
else{
	header("Location:index.php");exit;
}
$title=$kategori_ad." Kategorisi";#Dinamik title
include 'header.php';
?>

<!-- PAGE HEADER -->
<div class="page-header">
	<div class="page-header-bg" style="background-image: url('gorsel/makale/24407228592419322343what-is-a-web-developer.jpg');" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h1 class="text-uppercase"><?php echo $kategori_ad;  ?></h1>
			</div>
		</div>
	</div>
</div>
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!-- post -->
					<?php 
						$limit = 4; // sayfada gösterilecek içerik miktarını belirtiyoruz.
						$say=$db->prepare("SELECT * from makale inner join kategori on makale.makale_kategoriid=kategori.kategori_id where makale_durum=? and makale_kategoriid=? order by makale_tarih desc");
						$say->execute(array(0,$kategori_id));
						$toplam_icerik=$say->rowcount();
						$toplam_sayfa = ceil($toplam_icerik / $limit);
						// eğer sayfa girilmemişse 1 varsayalım.
						$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
						// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
						if($sayfa < 1) $sayfa = 1; 
						// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
						if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
						$goster = ($sayfa - 1) * $limit;//2-1=1 1*2=2 hangi veriden başlanacağını belirler

						$makalesor=$db->prepare("SELECT * from makale inner join kategori on makale.makale_kategoriid=kategori.kategori_id where makale_durum=? and makale_kategoriid=? order by makale_tarih desc limit $goster,$limit  ");
						$makalesor->execute(array(0,$kategori_id));
						$i=1;
						while ($cek=$makalesor->fetch(PDO::FETCH_ASSOC)) {  ?>
							<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="makale/<?php echo seo($cek['makale_baslik']).'/'.$cek['makale_id'];?>"> <img class="post-2" src="<?php echo $cek['makale_resim'];  ?>" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="kategori-<?php echo seo($cek['kategori_ad']);?>"><?php echo $cek['kategori_ad'];  ?></a>
										</div>
										<h3 class="post-title"><a href="makale/<?php echo seo($cek['makale_baslik']).'/'.$cek['makale_id'];?>"><?php  echo $cek['makale_baslik'];  ?></a></h3>
										<ul class="post-meta">
											<li><a href="ben-kimim">John Doe</a></li>
											<li><?php 
											$tarih= $cek['makale_tarih'];
											echo  tarihfarki($tarih); 
											 ?></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php 

							if ($i%2==0) {?>
								<!-- Bu komut her 2 makalede bir ekranı temizlemekle yükümklü bu nedenle döngü her 2 kez döndüğünde if bloğunun içine giriliyor ve ekran temizleiyor aksi taktirde makaleler arası boşluklar olacaktır -->
								<div class="clearfix visible-md visible-lg"></div>
							<?php } $i++; } ?>
						</div>
						<!-- SAYFALAMA BAŞLANGIÇ -->
						<div class="text-right">
							<nav aria-label="Page navigation example">
								<ul class="pagination justify-content-center">

									<?php if($sayfa>1){?>
										<li class="page-item"><a class="page-link" href="kategori-<?=$kategori_seourl; ?>?sayfa=1" >İlk</a></li>

										<li class="page-item">	<a class="page-link" href="kategori-<?=$kategori_seourl; ?>?sayfa=<?php echo $sayfa-1; ?>" >Geri</a></li>
									<?php } else{?>
										<li class="page-item disabled"><a class="page-link" >İlk</a></li>

										<li class="page-item disabled">	<a class="page-link" >Geri</a></li>

									<?php } ?>

									<?php 
										$sagsol=3;//Şu anki sayfanın sağında ve solunda olması gereken sayıyı belirler
										for ($i=$sayfa-$sagsol;$i<=$sayfa+$sagsol;$i++){
											if ($i>0 and $i<=$toplam_sayfa) {
												if ($sayfa==$i) {
													echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
												}
												else{
													echo '<li class="page-item"><a class="page-link" href="kategori-'.$kategori_seourl.'?sayfa='.$i.'">'.$i.'</a></li>';						
												}
											}
										}
										?>
										<?php if($sayfa!=$toplam_sayfa){?>
											<li class="page-item">
												<a class="page-link" href="kategori-<?=$kategori_seourl; ?>?sayfa=<?php echo $sayfa+1;?>">İleri</a>
											</li>
											<li class="page-item">
												<a class="page-link" href="kategori-<?=$kategori_seourl; ?>?sayfa=<?php echo $sayfa=$toplam_sayfa;?>">Son</a>
											</li>
											<?php   ?>
										<?php } else{?>
											<li class="page-item disabled"><a class="page-link" >İleri</a></li>

											<li class="page-item disabled">	<a class="page-link" >Son</a></li>

										<?php } ?>
									</ul>
								</nav>
							</div>
							<!-- SAYFALAMA BİTİŞ -->
						</div>

						<?php include 'sag.php';?>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

			<?php include 'footer.php';