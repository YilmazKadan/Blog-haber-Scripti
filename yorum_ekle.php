<?php
include 'Admin/special/baglan.php';
if ($_POST) {
	$yorum_makaleid=htmlspecialchars($_POST['yorum_makaleid']);
	$yorum_icerik=htmlspecialchars($_POST['yorum_icerik']);
	$yorum_soyad=htmlspecialchars($_POST['yorum_soyad']);
	$yorum_ad=htmlspecialchars($_POST['yorum_ad']);
	$yorum_mail=htmlspecialchars($_POST['yorum_mail']);
	
	
	if ($yorum_icerik !="" and $yorum_soyad!="" and $yorum_ad!="" and $yorum_mail!="") {
		$sor=$db->prepare("INSERT into yorum set
			yorum_makaleid=:yorum_makaleid,
			yorum_icerik=:yorum_icerik,
			yorum_soyad=:yorum_soyad,
			yorum_mail=:yorum_mail,
			yorum_ad=:yorum_ad
			");
		$kontrol=$sor->execute(array(
			'yorum_makaleid'=>$yorum_makaleid,
			'yorum_icerik'=>$yorum_icerik,
			'yorum_soyad'=>$yorum_soyad,
			'yorum_mail'=>$yorum_mail,
			'yorum_ad'=>$yorum_ad

		));
		if ($kontrol) {

			echo 'Basarili';
		}
		else{
			echo 'Basarisiz';
		}
	}
	else{
		echo 'Bos';
	}
}

