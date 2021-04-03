<?php 
ob_start();
require_once 'Admin/special/baglan.php';
require 'Admin/special/function.php';
$ayar=$db->prepare("SELECT * from ayar ");
$ayar->execute();
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);


#Bu sorgu aşağıda bulunan kategori alanına kategorileri çekmek için
$kategori=$db->prepare("SELECT * from kategori where kategori_durum=? order by  kategori_sira asc");
$kategori->execute(array(0));


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Burda daha önce title keyword gibi meta taglar girilmemiş ise default tagları alıyoruz   -->
	<title><?php if (isset($title)) {
		echo $title;
	}else{
		echo $ayarcek['site_tittle'];
	}
	?></title>
	
	<meta name="description" content="<?php if(isset($description)) {
		echo $description;
		}else{
			echo $ayarcek['site_aciklama'];
		}
		?>
		">
		<meta name="keywords" content="<?php if (isset($keyword)) {
			echo $keyword;
			}else{
				echo $ayarcek['site_keyword'];
			}
			?>">
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<base href="<?php echo $ayarcek['site_url']; ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

			<!-- Google font -->
			<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">
			
			<!-- Bootstrap -->
			
			<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

			<!-- Font Awesome Icon -->
			<link rel="stylesheet" href="css/font-awesome.min.css">

			<!-- Custom stlylesheet -->
			<link type="text/css" rel="stylesheet" href="css/style.css" />


			<link rel="stylesheet"
			href="css/prism.css">

		</head>

		<body>
			<!-- HEADER -->
			<header id="header">
				<!-- NAV -->
				<div id="nav">
					<!-- Top Nav -->
					<div id="nav-top">
						<div class="container">
							<!-- social -->
							<ul class="nav-social">
								<li><a target="blank" href="<?php echo  $ayarcek['site_facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a target="blank" href="<?php echo  $ayarcek['site_twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a target="blank" href="<?php echo  $ayarcek['site_youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
								<li><a target="blank" href="<?php echo  $ayarcek['site_instagram']; ?>"><i class="fa fa-instagram"></i></a></li>

							</ul>
							<!-- /social -->

							<!-- logo -->
							<div class="nav-logo">
								<a href="index.php"  class="logo" style="font-size:35px;"><span style="color:#00b5cc;">KADAN</span> YAZILIM</a>
								<!-- 	<?php echo $cek[0]['makale_resim'];  ?> -->
							</div>
							<!-- /logo -->

							<!-- search & aside toggle -->
							<div class="nav-btns">
								<button class="aside-btn"><i class="fa fa-bars"></i></button>
								<button class="search-btn"><i class="fa fa-search"></i></button>
								<div id="nav-search">
									<form action="search.php" method="POST">
										<input class="input" name="aranan" placeholder="Aramak istediğiniz kelimeyi giriniz...">

										<button class="nav-close search-close" name="ara">
											<span></span>
										</button>
									</form>
								</div>
							</div>
							<!-- /search & aside toggle -->
						</div>
					</div>
					<!-- /Top Nav -->

					<!-- Main Nav -->
					<div id="nav-bottom">
						<div class="container">
							<!-- nav -->
							<ul class="nav-menu">
								<li><a href="Anasayfa">ANASAYFA</a></li>
								<li><a href="ben-kimim">HAKKIMIZDA</a></li>
								<li><a href="bize-ulasin">İLETİŞİM</a></li>
							</ul>
							<!-- /nav -->
						</div>
					</div>
					<!-- /Main Nav -->

					<!-- Aside Nav -->
					<div id="nav-aside">
						<ul class="nav-aside-menu">
							<li><a href="index.php">Anasayfa</a></li>
							<li class="has-dropdown"><a>Kategoriler</a>
								<ul class="dropdown">
									<?php  while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) {?>
										<li><a href="kategori-<?php echo seo($kategoricek['kategori_ad']);?>"><?php echo $kategoricek['kategori_ad']; ?></a></li>
									<?php }?>



								</ul>
							</li>
							<li><a href="hakkimizda.php">Hakkımızda</a></li>
							<li><a href="iletisim.php">İletişim</a></li>

						</ul>
						<button class="nav-close nav-aside-close"><span></span></button>
					</div>
					<!-- /Aside Nav -->
				</div>
				<!-- /NAV -->
			</header>
			<!-- /HEADER -->
