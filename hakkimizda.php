<?php 
$title="Hakkımızda";
include 'header.php';
$sor=$db->prepare('SELECT * from hakkimizda');
$sor->execute();
$cek=$sor->fetch(PDO::FETCH_ASSOC);



 ?>

		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">HAKKIMIZDA</h1>
						
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
				<div class="col-md-12">
					<div class="section-row">
						<div class="section-title">
							<h2 class="title"><?php echo $cek['hakkimizda_baslik']; ?></h2>
						</div>
						<?php echo $cek['hakkimizda_icerik']; ?>
						
					</div>
				</div>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
<?php include 'footer.php';?>