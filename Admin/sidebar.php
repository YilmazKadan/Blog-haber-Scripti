<?php 
include 'special/baglan.php';
ob_start();
session_start();
if (isset($_SESSION['email'])) {

}
else{
    header("location:index.php");
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kadan yazılım admin template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
  
    <script src="vendors/ckeditor/ckeditor.js"></script>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="anasayfa.php">Kadan Yazılım</a>
                <a class="navbar-brand hidden" href="anasayfa.php">K</a>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="anasayfa.php"> <i class="menu-icon fa fa-dashboard"></i>Anasayfa </a>
                    </li>
                    <h3 class="menu-title">Yönetim</h3><!-- /.menu-title -->

                    <li>
                        <a href="makale.php"> <i class="menu-icon fa fa-book"></i>Makaleler </a>
                    </li>
                    <li>
                        <a href="yorum.php"> <i class="menu-icon fa fa-book"></i>Yorumlar </a>
                    </li>


                    <li>
                        <a href="kategori.php"> <i class="menu-icon ti-email"></i>Kategoriler </a>
                    </li>

                    <li>
                        <a href="hakkimizda.php"> <i class="menu-icon fa fa-book"></i>Hakkımızda </a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i  class=" menu-icon fa fa-cog  fa-fw"></i>Ayarlar</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-cog fa-spin fa-fw"></i><a href="genel_ayar.php">Genel ayarlar</a></li>
                            <li><i class="fa fa-cog fa-spin fa-fw"></i><a href="iletisim_ayar.php">İletişim ayarları</a></li>
                            <li><i class="fa fa-cog fa-spin fa-fw"></i><a href="sosyal_ayar.php">Sosyal hesap ayarları</a></li>
                            <li><i class="fa fa-cog fa-spin fa-fw"></i><a href="logo.php">Logo</a></li>

                        </ul>
                    </li>

                    

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->