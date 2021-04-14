# Blog-haber-Scripti
Bu websitesi blog-haber paylaşımı üzerine yapılmış ve yönetilebilir bir sistemdir.

## Yapılandırma ayarları
#### Veritabanı bağlantı dosyası yapılandırması

Admin > special klasörü altındaki baglan.php dosyası altında bulunan aşağıdaki satırı kendi veritabanı bilgileriniz ile güncelleyin
ardından sorunsuz bir şekilde kullanabilirsiniz.
$db=new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","");
