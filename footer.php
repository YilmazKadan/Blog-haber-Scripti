<?php

$ayar=$db->prepare("SELECT * from ayar ");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);


?>

<!-- FOOTER -->
<footer id="footer">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-6">
				<div class="footer-widget">
					<div class="footer-logo">
						<a href="index.php"  class="logo" style="font-size:35px;"><span style="color:#00b5cc;">KADAN</span> YAZILIM</a>
						
					</div>
					<p><?= $ayarcek['site_aciklama']; ?></p>
					<ul class="contact-social">
						<li><a target="blank" href="<?php echo  $ayarcek['site_facebook']; ?>"><i class="fa fa-2x fa-facebook"></i></a></li>
						<li><a target="blank" href="<?php echo  $ayarcek['site_twitter']; ?>"><i class="fa fa-2x fa-twitter"></i></a></li>
						<li><a target="blank" href="<?php echo  $ayarcek['site_youtube']; ?>"><i class="fa fa-2x fa-youtube"></i></a></li>
						<li><a target="blank" href="<?php echo  $ayarcek['site_instagram']; ?>"><i class="fa fa-2x fa-instagram"></i></a></li>

					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="footer-widget">
					<h3 class="footer-title">KATEOGORİLER</h3>
					<div class="category-widget">
						<ul>
							<?php
							$kategori=$db->prepare("Select * from kategori order by  kategori_sira asc");
							$kategori->execute();
							while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) {?>
								<li><a href="#"><?php echo $kategoricek['kategori_ad']; ?> </a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			
			
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="footer-bottom row">
			<div class="col-md-6 col-md-push-6">
				<ul class="footer-nav">
					<li><a href="index.php">Anasayfa</a></li>
					<li><a href="hakkimizda.php">Hakkımızda</a></li>
					<li><a href="iletisim.php">İletişim</a></li>
					
				</ul>
			</div>
			<div class="col-md-6 col-md-pull-6">
				<div class="footer-copyright">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright  &copy;2019-<script>document.write(new Date().getFullYear());</script> Tüm yazılım hakları Kadan Yazılım'a aittir.<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?php echo  $ayarcek['site_url']; ?>" target="_blank">KADAN YAZILIM</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/main.js"></script>
<script src="js/prism.js"></script>

<script type="text/javascript">
	$('#yorum').submit(function(){
		var veri=$('#yorum').serialize();
		$.ajax({
			url:'yorum_ekle.php',
			data:veri,
			type:"POST",
			success:function(sonuc){
				if(sonuc=="Basarili"){
					$('#sonuc').show();
					$('#sonuc').html("<div class='alert alert-success'>Yorumunuz başarılı bir şekilde eklenmiştir yönetici onayından sonra gösterilecektir.");
					$('#yorum')[0].reset();//Bu satır formu resetler
					$('#sonuc').fadeOut(7000);
				}
				else if(sonuc=="Bos"){
					$('#sonuc').show();
					$('#sonuc').html("<div class='alert alert-danger'>Boş alan bırakma çakallık yapma</div>");
					$('#sonuc').fadeOut(7000);
				}

				else if(sonuc=="Basarisiz")
					alert("<div class'alert alert-danger'>Bilinmeyen bir hata ile karşılaşıldı!</div>");
			}
		});
		return false;
	});
</script>
</body>

</html>
