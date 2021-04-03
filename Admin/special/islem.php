<?php 
include 'baglan.php';
include 'function.php';
ob_start();
session_start();

#GENEL AYAR GÜNCELLEME ALANI
if (isset($_POST['genelayar_guncelle'])) {

	$sor=$db->prepare('UPDATE  ayar set
		site_tittle=:site_tittle,
		site_aciklama=:site_aciklama,
		site_keyword=:site_keyword,
		site_url=:site_url,
		site_yazar=:site_yazar

		');
	$update=$sor->execute(array(
		'site_tittle'=>$_POST['site_tittle'],
		'site_aciklama'=>$_POST['site_aciklama'],
		'site_keyword'=>$_POST['site_keyword'],
		'site_url'=>$_POST['site_url'],
		'site_yazar'=>$_POST['site_yazar']

	));
	
	if ($update) {
		header("location:../genel_ayar.php?guncelleme=basarili");
		exit;
	}
	else{
		header("location:../genel_ayar.php?guncelleme=basarisiz");
		exit;
	}
}

#İLETİŞİM AYAR GÜNCELLEME ALANI
if (isset($_POST['iletisimayar_guncelle'])) {
	$sor=$db->prepare("UPDATE ayar set
		site_tel1=:tel1,
		site_tel2=:tel2,
		site_eposta=:posta,
		site_adres=:adres
		");
	$update=$sor->execute(array(
		'tel1'=>$_POST['site_tel1'],
		'tel2'=>$_POST['site_tel2'],
		'posta'=>$_POST['site_eposta'],
		'adres'=>trim($_POST['site_adres'])

	));
	if ($update) {
		header("Location:../iletisim_ayar.php?guncelleme=basarili");
	}
	else{
		header("Location:../iletisim_ayar.php?guncelleme=basarisiz");
	}
}
#SOSYAL AYAR GÜNCELLEME ALANI
if (isset($_POST['sosyalayar_guncelle'])) {
	$sor=$db->prepare("UPDATE ayar set
		site_facebook=:site_facebook,
		site_youtube=:site_youtube,
		site_twitter=:site_twitter,
		site_instagram=:site_instagram
		
		");
	$update=$sor->execute(array(
		'site_facebook'=>$_POST['site_facebook'],
		'site_youtube'=>$_POST['site_youtube'],
		'site_instagram'=>$_POST['site_instagram'],
		'site_twitter'=>$_POST['site_twitter']

	));
	if ($update) {
		header("Location:../sosyal_ayar.php?guncelleme=basarili");
	}
	else{
		header("Location:../sosyal_ayar.php?guncelleme=basarisiz");
	}
}
#SOSYAL AYAR GÜNCELLEM ALANI BİTİŞ


#LOGO GÜNCELLEME ALANI
if (isset($_POST['logo_guncelle'])) {
	$klasor = '../../gorsel';
	@$tmp_name = $_FILES['logo']["tmp_name"];#Görüntü ön bellekte
	@$name = $_FILES['logo']["name"];#dosya adı burda alınıyor
	$name=turkce_cevir($name);
	//resmin isminin benzersiz olması
	$benzersiz=benzersiz();
	#Burda  dosya benzersiz sayı ve dosya adı birleştiriliyor ve yol yapılıyor.
	$resimyol=substr($klasor, 6)."/".$benzersiz.$name;

	$sor=$db->prepare("UPDATE ayar  set site_logo=:logo ");
	$update=$sor->execute(array('logo'=>$resimyol));
	if ($update) {

		$eskiyol=$_POST['eski_yol'];
		if (strlen($eskiyol)>0){

			
			@move_uploaded_file($tmp_name, "$klasor/$benzersiz$name");#Burda update işlemi olduktan sonra fotoğrafın yüklemesi yapılıyor.
			unlink('../../'.$eskiyol);#bir daha sakın ezbere çalışma burda . koymadığın için 1.30 dakika falan araştırdın hatanı
			
		}
		header("location:../logo.php?guncelleme=basarili");
	}
	else{
		header("location:../logo.php?guncelleme=basarisiz");
	}

}
#LOGO GÜNCELLEME ALANI BİTİŞ

#HAKKIMIZDA GÜNCELLEME ALANI BAŞLANGIÇ
if (isset($_POST['hakkimizda_guncelle'])) {

	$sor=$db->prepare('UPDATE  hakkimizda set
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_baslik=:hakkimizda_baslik
		

		');
	$update=$sor->execute(array(
		'hakkimizda_icerik'=>$_POST['hakkimizda_icerik'],
		'hakkimizda_baslik'=>$_POST['hakkimizda_baslik']
		

	));
	
	if ($update) {
		header("location:../hakkimizda.php?guncelleme=basarili");
		exit;
	}
	else{
		header("location:../hakkimizda.php?guncelleme=basarisiz");
		exit;
	}
}

#KATEOGİR EKLEME ALANI
if (isset($_POST['kategori_ekle'])) {

	#bu alanda daha önce aynı kategori isminde kayit var mı ona bakılıyor .
	$sor=$db->prepare("SELECT * from kategori where kategori_ad=?");
	$sor->execute(array($_POST['kategori_ad']));


	if ($sor->rowCount()=="0") {
		$sor=$db->prepare("INSERT  into kategori set
			kategori_ad=:kategori_ad,
			kategori_sira=:kategori_sira,
			kategori_durum=:kategori_durum,
			kategori_seourl=:seo
			");
		$kontrol=$sor->execute(array(
			'kategori_ad'=>$_POST['kategori_ad'],
			'kategori_sira'=>$_POST['kategori_sira'],
			'kategori_durum'=>$_POST['kategori_durum'],
			'seo'=>seo($_POST['kategori_ad'])
		));


		if ($kontrol) {
			header("Location:../kategori_ekle.php?ekle=basarili");
		}
		else{
			header("Location:../kategori_ekle.php?ekle=basarisiz");
		}
	}
	else{
		header("Location:../kategori_ekle.php?ekle=ayni");#Daha önce aynı kayıt var ise ayni mesajı veriliyor
	}
}

#KATEGORİ EKLEME ALANI BİTİŞ

#KATEGORİ SİLME ALANI BAŞLANGIÇ
if (isset($_GET['kategori_sil'])) {
	$id=$_GET['id'];
	$sor=$db->prepare("DELETE from  kategori where kategori_id=?");
	$sor->execute(array($id));
	$say=$sor->rowCount();
	if ($say) {
		header("location:../kategori.php?sil=basarili");
	}
	else{
		header("Location:../kategori.php?sil=basarisiz");
	}
}

#KATEGORİ SİLME ALANI BİTİŞ

#KATEGORİ GÜNCELLEME ALANI BAŞLANGIÇ
if (isset($_POST['kategori_guncelle'])) {
	$sor=$db->prepare("SELECT * from kategori where kategori_ad=?");
	$sor->execute(array($_POST['kategori_ad']));
	$cek=$sor->fetch(PDO::FETCH_ASSOC);
	$id=$_POST['id'];

	#Bu kod bloğu veri tabanına bakıyor bu kategori isminde kayit var mı yok mu diye eğer var olan kayit şu anda güncellenmekte olan kayit ise problem olmuyor eğer değilse kullanıcıya mesaj verdiliyor
	$varmi=false;
	if ($sor->rowCount()=="0") {
		$varmi=true;
	}
	else{
		if ($cek['kategori_ad']==$_POST['ad']) {
			$varmi=true;
		}
	}



	if ($varmi==true) {

		

		$sor=$db->prepare("UPDATE kategori set

			kategori_ad=:kategori_ad,
			kategori_sira=:kategori_sira,
			kategori_durum=:kategori_durum,

			kategori_seourl=:seo
			where kategori_id=:id
			");
		$update=$sor->execute(array(

			'kategori_ad'=>$_POST['kategori_ad'],
			'kategori_sira'=>$_POST['kategori_sira'],
			'kategori_durum'=>$_POST['kategori_durum'],

			'seo'=>seo($_POST['kategori_ad']),
			'id'=>$id

		));
		if ($update) {
			header("location:../kategori_guncelle.php?guncelleme=basarili&id=$id");
		}
		else{
			header("location:../kategori_guncelle.php?guncelleme=basarisiz&id=$id");
		}
	}
	else{
		header("location:../kategori_guncelle.php?guncelleme=ayni&id=$id");
	}
}
#KATEGORİ GÜNCELLEME ALANI BİTİŞ

#MAKALE EKLEME ALANI BAŞLANGIÇ
if (isset($_POST['makale_ekle'])) {
	$klasor = '../../gorsel/makale';
	@$tmp_name = $_FILES['makale_resim']["tmp_name"];#Görüntü ön bellekte
	@$name = $_FILES['makale_resim']["name"];#dosya adı burda alınıyor
	$name=turkce_cevir($name);#Görsel kaydedilirken türkçe karakterler problem oluşturuyor onları yok ediyoruz.
	//resmin isminin benzersiz olması
	$benzersiz=benzersiz();
	#Burda  dosya benzersiz sayı ve dosya adı birleştiriliyor ve yol yapılıyor.
	$resimyol=substr($klasor, 6)."/".$benzersiz.$name;


	$sor=$db->prepare("INSERT into makale set
		makale_baslik=:makale_baslik,
		makale_icerik=:makale_icerik,
		makale_keyword=:makale_keyword,
		makale_kategoriid=:makale_kategoriid,
		makale_resim=:makale_resim,
		makale_seourl=:makale_seourl,
		makale_durum=:makale_durum

		");
	$insert=$sor->execute(array(
		'makale_baslik'=>$_POST['makale_baslik'],
		'makale_icerik'=>$_POST['makale_icerik'],
		'makale_keyword'=>$_POST['makale_keyword'],
		'makale_kategoriid'=>$_POST['makale_kategoriid'],
		'makale_resim'=>$resimyol,
		'makale_seourl'=>seo($_POST['makale_baslik']),
		'makale_durum'=>$_POST['makale_durum']


	));


	if ($insert) {

		@move_uploaded_file($tmp_name, "$klasor/$benzersiz$name");#Burda insert işlemi olduktan sonra fotoğrafın yüklemesi yapılıyor.
		header("location:../makale_ekle.php?ekle=basarili");
	}
	else{
		header("location:../makale_ekle.php?ekle=basarisiz");
	}
}


#MAKALE EKLEME ALANI BİTİŞ

#MAKALE GÜNCELLEME ALANI BAŞLANGIÇ
if (isset($_POST['makale_guncelle'])) {
	$id=$_POST['id'];
	$sor=$db->prepare("UPDATE makale set

		makale_baslik=:makale_baslik,
		makale_icerik=:makale_icerik,
		makale_keyword=:makale_keyword,
		makale_kategoriid=:makale_kategoriid,	
		makale_seourl=:makale_seourl,
		makale_durum=:makale_durum
		where makale_id=:id

		");
	$update=$sor->execute(array(
		'makale_baslik'=>$_POST['makale_baslik'],
		'makale_icerik'=>$_POST['makale_icerik'],
		'makale_keyword'=>$_POST['makale_keyword'],
		'makale_kategoriid'=>$_POST['makale_kategoriid'],
		
		'makale_seourl'=>seo($_POST['makale_baslik']),
		'makale_durum'=>$_POST['makale_durum'],
		'id'=>$id
	));
	if ($update) {
		header("Location:../makale_guncelle.php?guncelleme=basarili&id=$id");
	}
	else{
		header("Location:../makale_guncelle.php?guncelleme=basarisiz&id=$id");
	}

}


#MAKALE GÜNCELLEME ALANI BİTİŞ

#MAKALE SİLME ALANI BAŞLANGIÇ
if (isset($_GET['makale_sil'])) {
	$id=$_GET['id'];
	$eskiyol=$_POST['eski_resim'];
	$sor=$db->prepare("DELETE from makale where makale_id=?");
	$sor->execute(array($id));
	$kontrol=$sor->rowCount();
	if ($kontrol) {
		unlink("../..".$eskiyol);
		header("location:../makale.php?sil=basarili");
	}
	else{
		header("location:../makale.php?sil=basarisiz");
	}
}

#MAKALE SİLME ALANI BİTİŞ

#MAKALE FOTOĞRAF GÜNCELLEME ALANI
if (isset($_POST['makaleresim_guncelle'])) {
	$klasor = '../../gorsel/makale';
	@$tmp_name = $_FILES['makale_resim']["tmp_name"];#Görüntü ön bellekte
	@$name = $_FILES['makale_resim']["name"];#dosya adı burda alınıyor
	$name=turkce_cevir($name);
	//resmin isminin benzersiz olması
	$benzersiz=benzersiz();
	#Burda  dosya benzersiz sayı ve dosya adı birleştiriliyor ve yol yapılıyor.
	$resimyol=substr($klasor, 6)."/".$benzersiz.$name;

	$makale_id=$_POST['makale_id'];
	$sor=$db->prepare("UPDATE makale  set makale_resim=:resim where makale_id=:id ");
	$update=$sor->execute(array('resim'=>$resimyol,'id'=>$makale_id));
	if ($update) {

		$eskiyol=$_POST['eski_yol'];
		if (strlen($eskiyol)>0){

			
			@move_uploaded_file($tmp_name, "$klasor/$benzersiz$name");#Burda update işlemi olduktan sonra fotoğrafın yüklemesi yapılıyor.
			unlink('../../'.$eskiyol);#bir daha sakın ezbere çalışma burda . koymadığın için 1 saat 30 dakika falan araştırdın hatanı
			
		}
		header("location:../makale_guncelle.php?guncelleme=basarili&id=$makale_id");
	}
	else{
		header("location:../makale_guncelle.php?guncelleme=basarisiz&id=$makale_id");
	}

}
#MAKALE FOTOĞRAF GÜNCELLEME ALANI BİTİŞ

#ADMİN PANEL GİRİŞ İŞLEMLERİ
if (isset($_POST['admin_giris'])) {
	$sifre=$_POST['kullanici_sifre'];
	$eposta=$_POST['kullanici_email'];
	if ($sifre!="" and $eposta!="") {
		$kullanicisor=$db->prepare("SELECT * from kullanici where BINARY kullanici_sifre=? and BINARY kullanici_mail=?");
		$kullanicisor->execute(array($sifre,$eposta));
		$say=$kullanicisor->rowCount();
		if ($say==1) {
			$_SESSION['email']=$eposta;
			header("location:../anasayfa.php");
		}
		else{
			header("location:../index.php?giris=basarisiz");
		}
	}
	else{
		header("location:../index.php?giris=bosalan");
	}


}
#ADMİN PANELİ GİRİŞ İŞLEMLERİ BİTİŞ

#ADMİN PANEL ÇIKIŞ
if (isset($_GET['cikis'])) {
	session_destroy();
	header("Location:../index.php");
}
#ADMİN PANEL ÇIKIŞ BİTİŞ


#YORUM ONAYLAMA ALANI BAŞLANGIÇ
if (isset($_GET['yorum_onayla'])) {
	$yorumid=$_GET['yorum_id'];
	$sor=$db->prepare("UPDATE yorum set yorum_durum=? where yorum_id=?");
	$sor->execute(array(0,$yorumid));
	if ($sor->rowCount()) {
		header("Location:../yorum.php?onay=ok");
		exit;
	}
	else{
		header("Location:../yorum.php?onay=no");
	}
}
#YORUM ONAYLAMA ALANI BİTİŞ

#YORUM PASİFLEŞTİRME ALANI BAŞLANGIÇ
if (isset($_GET['yorum_pasif'])) {
	$yorumid=$_GET['yorum_id'];
	$sor=$db->prepare("UPDATE yorum set yorum_durum=? where yorum_id=?");
	$sor->execute(array(1,$yorumid));
	if ($sor->rowCount()) {
		header("Location:../yorum.php?pasif=ok");
		exit;
	}
	else{
		header("Location:../yorum.php?pasif=no");
	}
}
#YORUM PASİFLEŞTİRME ALANI BİTİŞ
#YORUM SİLME ALANI BAŞLANGIÇ
if (isset($_GET['yorum_sil'])) {
	$id=$_GET['yorum_id'];
	$sor=$db->prepare("DELETE from  yorum where yorum_id=?");
	$sor->execute(array($id));
	$say=$sor->rowCount();
	if ($say) {
		header("location:../yorum.php?sil=basarili");
	}
	else{
		header("Location:../yorum.php?sil=basarisiz");
	}
}
#YORUM SİLME ALANI BİTİŞ
?>