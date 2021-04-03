			<div class="col-md-4">
				<!-- ad widget -->
				<div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-3.jpg" alt="">
					</a>
				</div>
				<!-- /ad widget -->



				<!-- category widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2 class="title">Kategoriler</h2>
					</div>
					<div class="category-widget">
						<ul>
							<!-- Burda kategorileri çekiyoruz -->
							<?php
							$kategorisor=$db->prepare("SELECT * from kategori  where kategori_durum=?  order by  kategori_sira asc");
							$kategorisor->execute(array(0));
							
							while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
								$sor=$db->prepare("SELECT * from makale where makale_kategoriid=? and makale_durum=?");
								$sor->execute(array($kategoricek['kategori_id'],0));
								$say=$sor->rowCount();

							   ?>
								<li><a href="kategori-<?php echo seo($kategoricek['kategori_ad']);?>"><?php echo $kategoricek['kategori_ad']; ?> <span><?php echo $say;  ?></span></a></li>
							<?php }?>
						</ul>
					</div>
				</div>
				<!-- /category widget -->



				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2 class="title">Popüler Makaleler</h2>
					</div>

						<?php 
						$sor=$db->prepare("SELECT * from makale inner join kategori on kategori.kategori_id=makale.makale_kategoriid order by makale_okunma desc limit 4");
						$sor->execute();
						while ($cek=$sor->fetch(PDO::FETCH_ASSOC)) { ?>
							
						
						 
					<!-- post -->
					<div class="post post-widget">
						<a class="post-img" href="makale/<?php echo seo($cek['makale_baslik']).'/'.$cek['makale_id'];?>"><img class="post-4" src="<?php echo $cek['makale_resim'];  ?>" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="kategori-<?php echo seo($cek['kategori_ad']);?>"><?php echo $cek['kategori_ad'];  ?></a>
							</div>
							<h3 class="post-title"><a href="makale/<?php echo seo($cek['makale_baslik']).'/'.$cek['makale_id'];?>"><?php echo $cek['makale_baslik'];   ?></a></h3>
						</div>
					</div>
					<!-- /post -->
				<?php }?>
				</div>
				<!-- /post widget -->



				<!-- Ad widget -->
				<div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-1.jpg" alt="">
					</a>
				</div>
				<!-- /Ad widget -->
			</div>