<?php
include 'header.php'; 

#Bu kodlarda kategori sayfası ile makale sayfası bir biri ile bağlanıyor ve aktif olan makaleler içerik başlık ve aynı zamanda kategori adını getiriyor
$sor=$db->prepare("SELECT * from makale inner join kategori on makale.makale_kategoriid=kategori.kategori_id
	where makale_durum=? order by makale_okunma desc limit 3");
$sor->execute(array(0));
$cek=$sor->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- BÜYÜK HABERLER SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div id="hot-post" class="row hot-post">
			<div class="col-md-8 hot-post-left">
				<!-- post -->
				<div class="post post-thumb">
					<a class="post-img " href="makale/<?php echo seo($cek[0]['makale_baslik']).'/'.$cek[0]['makale_id']; ?>"><img class="post-1"  src="<?php echo $cek[0]['makale_resim'];  ?>" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="kategori-<?php echo seo($cek[0]['kategori_ad']);?>"><?php echo $cek[0]['kategori_ad'];  ?></a>
						</div>
						<h3 class="post-title title-lg"><a href="makale/<?php echo seo($cek[0]['makale_baslik']).'/'.$cek[0]['makale_id']; ?>"><?php echo $cek[0]['makale_baslik'];  ?></a></h3>
						<ul class="post-meta">
							<li><a href="ben-kimim">Yılmaz Kadan</a></li>
							<li><i class="fa fa-eye"></i> <?php  echo $cek[0]['makale_okunma']; ?></li>
							<li>
								<?php
								echo  tarihfarki($cek[0]['makale_tarih']); 

								?></li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="makale/<?php echo seo($cek[1]['makale_baslik']).'/'.$cek[1]['makale_id']; ?>"><img  class="post-2"  src="<?php echo $cek[1]['makale_resim']; ?>" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="kategori-<?php echo seo($cek[1]['kategori_ad']);?>"><?php echo $cek[1]['kategori_ad'];  ?></a>
							</div>
							<h3 class="post-title"><a href="makale/<?php echo seo($cek[1]['makale_baslik']).'/'.$cek[1]['makale_id']; ?>"><?php echo $cek[1]['makale_baslik'];  ?></a></h3>
							<ul class="post-meta">
								<li><a href="ben-kimim">Admin
								</a></li>
								<li><i class="fa fa-eye"></i> <?php  echo $cek[1]['makale_okunma']; ?></li>
								<li><?php 
								echo  tarihfarki($cek[1]['makale_tarih']); 
								?></li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="makale/<?php echo seo($cek[2]['makale_baslik']).'/'.$cek[2]['makale_id']; ?>"><img class="post-2"  src="<?php echo $cek[2]['makale_resim'];  ?>" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="kategori-<?php echo seo($cek[2]['kategori_ad']);?>"><?php echo $cek[2]['kategori_ad'];  ?></a>

							</div>
							<h3 class="post-title"><a href="makale/<?php echo seo($cek[2]['makale_baslik']).'/'.$cek[2]['makale_id']; ?>"><?php echo $cek[2]['makale_baslik'];  ?></a></h3>
							<ul class="post-meta">
								<li><a href="ben-kimim">Admin
								</a></li>
								<li><i class="fa fa-eye"></i> <?php  echo $cek[2]['makale_okunma']; ?></li>
								<li><?php 
								echo  tarihfarki($cek[2]['makale_tarih']); 
								?>
							</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BÜYÜK HABERLER SECTİON BİTİŞ -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Son Makaleler</h2>
							</div>
						</div>
						<?php 
						$limit = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.
						$say=$db->prepare("SELECT * from makale inner join kategori on makale.makale_kategoriid=kategori.kategori_id where makale_durum=?  order by makale_tarih desc");
						$say->execute(array(0));
						$toplam_icerik=$say->rowcount();
						$toplam_sayfa = ceil($toplam_icerik / $limit);
						// eğer sayfa girilmemişse 1 varsayalım.
						$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
						// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
						if($sayfa < 1) $sayfa = 1; 
						// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
						if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
						$goster = ($sayfa - 1) * $limit;//2-1=1 1*2=2 hangi veriden başlanacağını belirler

						$makalesor=$db->prepare("SELECT * from makale inner join kategori on makale.makale_kategoriid=kategori.kategori_id where makale_durum=?  order by makale_tarih desc limit $goster,$limit  ");
						$makalesor->execute(array(0));
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
											<li><a href="ben-kimim">Yılmaz Kadan
											</a></li>
											<li><?php 
											
											echo  tarihfarki($cek['makale_tarih']); 
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
										<li class="page-item"><a class="page-link" href="?sayfa=1" >İlk</a></li>

										<li class="page-item">	<a class="page-link" href="?sayfa=<?php echo $sayfa-1; ?>" >Geri</a></li>
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
													echo '<li class="page-item"><a class="page-link" href="?sayfa='.$i.'">'.$i.'</a></li>';						
												}
											}
										}
										?>
										<?php if($sayfa!=$toplam_sayfa){?>
											<li class="page-item">
												<a class="page-link" href="?sayfa=<?php echo $sayfa+1;?>">İleri</a>
											</li>
											<li class="page-item">
												<a class="page-link" href="?sayfa=<?php echo $sayfa=$toplam_sayfa;?>">Son</a>
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


							<!-- BU ALANA DAHA SONRA SERİ HABERLER EKLENEBİLİR -->
						</div>
						<!-- COL MD-8 divinin bitişi -->
						<?php include 'sag.php';?>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

			<!-- SECTION -->
			<!-- BURDA REKLAM ALANI OLACAK -->
			<!-- /SECTION -->
			<?php include'footer.php'; ?>