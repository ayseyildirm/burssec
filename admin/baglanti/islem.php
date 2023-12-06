<?php 
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';



####################  KULLANICI KAYDET ###############################
if (isset($_POST['kullanicikaydet'])) {
	
	echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";



	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {


			$kullanicisor=$conn->prepare("SELECT * from kullanicilar where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$conn->prepare("INSERT INTO kullanicilar SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../uye-ol.php?durum=basarisiz");
				}

			} else {

				header("Location:../../uye-ol.php?durum=mukerrerkayit");
			}

		} else {

			header("Location:../../uye-ol.php?durum=eksiksifre");
		}

	} else {

		header("Location:../../uye-ol.php?durum=farklisifre");
	}	
}

####################  KULLANICI GİRİS ###############################


if (isset($_POST['kullanicigiris'])) {


	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$conn->prepare("SELECT * from kullanicilar where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));

	$say=$kullanicisor->rowCount();

	if ($say==1) {
  
		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;

	} else {

		header("Location:../../?durum=basarisizgiris");

	}
}




####################  LOGİN İŞLEMLERİ ###############################
if (isset($_POST['admingiris'])) {

$kullanici_mail=$_POST['kullanici_mail'];
$kullanici_password=($_POST['kullanici_password']);

$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
	'mail'=>$kullanici_mail,
	'password'=>$kullanici_password,
	'yetki'=>5
));
echo $say=$kullanicisor->rowCount();
if ($say==1) {
	$_SESSION['kullanici_mail']=$kullanici_mail;
	header("Location:../production/index.php");
	exit;
	
}else{
	header("Location:../production/login.php?durum=no");
	exit;
}


}




####################  GENEL AYAR GÜNCELLEME ###############################
if (isset($_POST['genelayarkaydet'])) {
	$ayarkaydet=$conn->prepare("UPDATE ayar SET 
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

 $update=$ayarkaydet->execute(array(
 	'ayar_title'=>$_POST['ayar_title'],
 	'ayar_description'=>$_POST['ayar_description'],
 	'ayar_keywords'=>$_POST['ayar_keywords'],
 	'ayar_author'=>$_POST['ayar_author']
 ));
 if ($update) {
 	header("Location:../production/genel_ayar.php?durum=ok");
 }else{
 	header("Location:../production/genel_ayar.php?durum=no");
 }
}

####################  İLETİŞİM AYAR GÜNCELLEME ###############################
if (isset($_POST['iletisimayarkaydet'])) {
	$ayarkaydet=$conn->prepare("UPDATE ayar SET 
		ayar_tel=:ayar_tel,
		ayar_mail=:ayar_mail,
		ayar_adres=:ayar_adres
		WHERE ayar_id=0");

 $update=$ayarkaydet->execute(array(
 	'ayar_tel'=>$_POST['ayar_tel'],
 	'ayar_mail'=>$_POST['ayar_mail'],
 	'ayar_adres'=>$_POST['ayar_adres']
 ));
 if ($update) {
 	header("Location:../production/iletisim_ayar.php?durum=ok");
 }else{
 	header("Location:../production/iletisim_ayar.php?durum=no");
 }
}

####################  API AYAR GÜNCELLEME ###############################
if (isset($_POST['apiayarkaydet'])) {
	$ayarkaydet=$conn->prepare("UPDATE ayar SET 
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim,
		ayar_analystic=:ayar_analystic
		WHERE ayar_id=0");

 $update=$ayarkaydet->execute(array(
 	'ayar_maps'=>$_POST['ayar_maps'],
 	'ayar_zopim'=>$_POST['ayar_zopim'],
 	'ayar_analystic'=>$_POST['ayar_analystic']
 ));
 if ($update) {
 	header("Location:../production/api_ayar.php?durum=ok");
 }else{
 	header("Location:../production/api_ayar.php?durum=no");
 }
}

####################  SOSYAL AYAR GÜNCELLEME ###############################
if (isset($_POST['sosyalayarkaydet'])) {
	$ayarkaydet=$conn->prepare("UPDATE ayar SET 
		ayar_instagram=:ayar_instagram,
		ayar_twitter=:ayar_twitter,
		ayar_facebook=:ayar_facebook
		WHERE ayar_id=0");

 $update=$ayarkaydet->execute(array(
 	'ayar_instagram'=>$_POST['ayar_instagram'],
 	'ayar_twitter'=>$_POST['ayar_twitter'],
 	'ayar_facebook'=>$_POST['ayar_facebook']
 ));
 if ($update) {
 	header("Location:../production/sosyal_ayar.php?durum=ok");
 }else{
 	header("Location:../production/sosyal_ayar.php?durum=no");
 }
}

####################  MAIL AYAR GÜNCELLEME ###############################
if (isset($_POST['mailayarkaydet'])) {
	$ayarkaydet=$conn->prepare("UPDATE ayar SET 
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=0");

 $update=$ayarkaydet->execute(array(
 	'ayar_smtphost'=>$_POST['ayar_smtphost'],
 	'ayar_smtpuser'=>$_POST['ayar_smtpuser'],
 	'ayar_smtppassword'=>$_POST['ayar_smtppassword'],
 	'ayar_smtpport'=>$_POST['ayar_smtpport']
 ));
 if ($update) {
 	header("Location:../production/mail_ayar.php?durum=ok");
 }else{
 	header("Location:../production/mail_ayar.php?durum=no");
 }
}


####################  KULLANICI DÜZENLEME ###############################
if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$conn->prepare("UPDATE kullanicilar SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}



####################  KULLANICI SİL ###############################
if ($_GET['kullanicisil']=="ok") {

	$sil=$conn->prepare("DELETE from kullanicilar where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {


		header("location:../production/kullanicilar.php?sil=ok");


	} else {

		header("location:../production/kullanicilar.php?sil=no");

	}


}


####################  MENÜ DÜZENLEME ###############################
if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);

	
	$ayarkaydet=$conn->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}
####################  MENU SİL ###############################
if ($_GET['menusil']=="ok") {

	$sil=$conn->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
		));


	if ($kontrol) {


		header("location:../production/menu.php?sil=ok");


	} else {

		header("location:../production/menu.php?sil=no");

	}


}


####################  MENU EKLE ###############################

if (isset($_POST['menukaydet'])) {


	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$conn->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}




####################  LOGO DÜZENLEME ###############################


if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../images';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$conn->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}



####################  SLİDER EKLE ###############################

if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../images/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$conn->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
		));


	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}
}


####################  SLİDER DÜZENLE ###############################

if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../images/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$conn->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
			));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$conn->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
			));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}

}





####################  SLİDER SİL ###############################

if ($_GET['slidersil']=="ok") {
	
	$sil=$conn->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
		));

	if ($kontrol) {

		$resimsilunlink=$_GET['slider_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}

}

####################  KATEGORİ SİL ###############################

if ($_GET['kategorisil']=="ok") {
	
	$sil=$conn->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
		));

	if ($kontrol) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}



####################  KATEGORİ DÜZENLE ###############################

if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$kaydet=$conn->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
		));

	if ($update) {

		Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
	}

}


####################  KATEGORİ EKLE ###############################
if (isset($_POST['kategoriekle'])) {

	$kategori_seourl=seo($_POST['kategori_ad']);

	$kaydet=$conn->prepare("INSERT INTO kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
		));

	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}
####################  PROJE EKLE ###############################
if (isset($_POST['duyuruyap'])) {

	$uploads_dir = '../../images/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
	$kaydet=$conn->prepare("INSERT INTO slider SET
		slider_kategori=:slider_kategori,
		slider_ad=:slider_ad,
		slider_ekleyen=:slider_ekleyen,
		slider_resimyol=:slider_resimyol,
		slider_icerik=:slider_icerik
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_kategori'=>$_POST['slider_kategori'],
		'slider_ekleyen'=>$_POST['slider_ekleyen'],
		'slider_resimyol' => $refimgyol,
		'slider_icerik' => $_POST['slider_icerik']
		
		));
	$slidersor=$conn->prepare("SELECT * FROM slider where slider_ad=:slider_ad");
	$slidersor->execute(array('slider_ad'=>$_POST['slider_ad']));
    $slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
    
    $itemCount = count($_POST["kriter_ad"]);


   for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["kriter_ad"][$i]) || !empty($_POST["kriter_deger"][$i])) {

    $ozellik=$conn->prepare("INSERT INTO basvuru_kriter set 
		slider_id=:slider_id,
		kriter_ad=:kriter_ad,
		kriter_deger=:kriter_deger
    	");
    $ekle=$ozellik->execute(array( 
    	'slider_id'=>$slidercek['slider_id'],
    	'kriter_ad'=>$_POST['kriter_ad'][$i],
    	'kriter_deger'=>$_POST['kriter_deger'][$i]

    ));
	
 }
}


	if ($insert && $ekle) {

		Header("Location:../../index.php?durum=ok");

	} else {

		Header("Location:../../index.php?durum=no");
	}

}

##################### BAŞVURU YAP ####################
if (isset($_POST['basvur'])) {
	/* //POST ile ne gelmiş bakmak için kullanabilirsin bu sorguyu
	foreach ($_POST as $k => $v) {
		echo $k." -> ".$v."<br>";
	}
	*/
	$itemCount = count($_POST["deger"]);
	for($i=0;$i<$itemCount;$i++) {
	$kaydet=$conn->prepare("INSERT INTO gelen_basvuru SET
			slider_id=:slider_id,
			basvuru_kullanici=:basvuru_kullanici,
			basvuru_deger=:basvuru_deger,
			kriter_id=:kriter_id
		");
	$insert=$kaydet->execute(array(
		'slider_id' => $_POST['slider_id'],
		'basvuru_kullanici'=>$_POST['kullanici_adsoyad'],
		'basvuru_deger'=>$_POST['deger'][$i],
		'kriter_id'=>$_POST['kriter_id'][$i]
		
		));
}
		if ($insert) {

		Header("Location:../../index.php?durum=ok");
			//echo "<br>kayit basarili";

	} else {

		Header("Location:../../index.php?durum=no");
		//echo "<br>kayit basarisiz";
	}

}



######################### PROFİL GÜNCELLE ########################
if (isset($_POST['profilguncelle'])) {

	
	if($_FILES['kullanici_resim']["size"] > 0)  { 


		$uploads_dir = '../../images/slider';
		@$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
		@$name = $_FILES['kullanici_resim']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$conn->prepare("UPDATE kullanicilar SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_gsm=:kullanici_gsm,
			kullanici_adres=:kullanici_adres,
			kullanici_il=:kullanici_il,
			kullanici_ilce=:kullanici_ilce,
			kullanici_cv=:kullanici_cv,
			kullanici_resim=:kullanici_resim	
			WHERE kullanici_id={$_POST['kullanici_id']}");
		$update=$duzenle->execute(array(
			'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
			'kullanici_gsm' => $_POST['kullanici_gsm'],
			'kullanici_adres' => $_POST['kullanici_adres'],
			'kullanici_il'=>$_POST['kullanici_il'],
			'kullanici_ilce'=>$_POST['kullanici_ilce'],
			'kullanici_cv' => $_POST['kullanici_cv'],
			'kullanici_resim' => $refimgyol,
			));
		

		$kullanici_id=$_POST['kullanici_id'];

		if ($update) {

			$resimsilunlink=$_POST['kullanici_resim'];
			unlink("../../$resimsilunlink");

			Header("Location:../../index.php?durum=ok");

		} else {

			Header("Location:../../index.php?durum=no");
		}



	} else {

		$duzenle=$conn->prepare("UPDATE kullanicilar SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_gsm=:kullanici_gsm,
			kullanici_adres=:kullanici_adres,
			kullanici_il=:kullanici_il,
			kullanici_ilce=:kullanici_ilce,
			kullanici_cv=:kullanici_cv		
			WHERE kullanici_id={$_POST['kullanici_id']}");
		$update=$duzenle->execute(array(
			'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
			'kullanici_gsm' => $_POST['kullanici_gsm'],
			'kullanici_adres' => $_POST['kullanici_adres'],
			'kullanici_il'=>$_POST['kullanici_il'],
			'kullanici_ilce'=>$_POST['kullanici_ilce'],
			'kullanici_cv' => $_POST['kullanici_cv']
			));

		$kullanici_id=$_POST['kullanici_id'];

		if ($update) {

			Header("Location:../../index.php?durum=ok");

		} else {

			Header("Location:../../index.php?durum=no");
		}
	}

}





####################  PROJE PASİF ###############################
if ($_GET['basvurusil']=="ok") {
	

	$kontrol=$conn->prepare("UPDATE slider SET
			slider_durum=:durum			
			WHERE slider_id={$_GET['proje_id']}");
	$update=$kontrol->execute(array('durum'=>'0'));

	if ($update) {


		header("location:../../profil-duzenle.php?kaldır=ok");


	} else {

		header("location:../../profil-duzenle.php?kaldır=no");

	}


}






 ?>