<?php
$title="Bize ulaşın";
$description="Size bir telefon uzaktayız";
$keyword="iletişim,bize ulaşın";
 include 'header.php';?>

		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">İletişim</h1>
						
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">İLETİŞİM BİLGİLERİ</h2>
						</div>
						<ul class="contact">
							<li><i class="fa fa-phone"></i><?php echo $ayarcek['site_tel1']; ?></li>
							<li><i class="fa fa-envelope"></i> <?php echo $ayarcek['site_eposta']; ?></li>
							<li><i class="fa fa-map-marker"></i> <?php echo $ayarcek['site_adres']; ?></li>
						</ul>
					</div>

					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Mail us</h2>
						</div>
						<form>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="subject" placeholder="Subject">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="Message"></textarea>
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php include 'sag.php';?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<?php include 'footer.php'; ?>