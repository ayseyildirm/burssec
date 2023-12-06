<?php 
include 'admin/baglanti/baglan.php';
include 'admin/production/fonksiyon.php';
error_reporting(E_ALL ^ E_NOTICE);
session_start();
ob_start();
$ayarsor=$conn->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array('id'=>0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=>$_SESSION['userkullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $ayarcek['ayar_title']; ?></title>
<meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>">
<meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/switch.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
<style>
  .avatar {
  vertical-align: middle;
  width: 100px;
  height: 95px;
  border-radius: 50%;
}


</style>
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
       <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              
            </ul>
          </div>
          <div class="header_top_right">
          
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index" class="logo"><img width="150" src="images/logoburs.png ?>" alt=""></a> 
        </div>

      </div>
    </div>
    </div>
    
  </header>

     
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">  
        <li class="active"><a href="index"><span class="fa fa-home desktop-home"></span><span class="mobile-show">ANASAYFA</span></a></li>    
        
<?php 
$menusor=$conn->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira limit 4");
$menusor->execute(array(
 'durum'=>1
));
while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
 ?>
<li ><a href="
 <?php 

        if (!empty($menucek['menu_url'])) {

          echo $menucek['menu_url'];

        } else {


          echo "sayfa-".seo($menucek['menu_ad']);

        }
        ?> "><?php echo $menucek['menu_ad']; ?></a></li>
<?php } 
if (isset($_SESSION['userkullanici_mail'])) { ?>
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">profilim </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="profil-duzenle"><i class="fa fa-user"></i><?php echo " ".$kullanicicek['kullanici_adsoyad']; ?></a></li>
              <li><a href="logout"><i class="fa fa-share"></i> Güvenli Çıkış</a></li>
            </ul>
          </li>
  
<?php }else{ ?>
  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Giris Yap</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="giris-yap">Giriş Yap</a></li>
              <li><a href="uye-ol">Üye Ol</a></li>
            </ul>
          </li>
        <?php } ?>



        </ul>

      </div>

    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Son Eklenenler</span>
          <ul id="ticker01" class="news_sticker">
<?php
$slidersor=$conn->prepare("SELECT * FROM slider where slider_durum='1' order by slider_id desc limit 10");
$slidersor->execute();

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
 <li ><a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><img src="<?php echo $slidercek['slider_resimyol'] ?>" alt=""><?php echo $slidercek['slider_ad']; ?></a></li>
  <?php 
     }
?>

          </ul>
  <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="http://facebook.com"></a></li>
              <li class="twitter"><a href="https://twitter.com/"></a></li>
              
              <li class="pinterest"><a href="http://pinterest.com/"></a></li>
              
              <li class="youtube"><a href="https://www.youtube.com/"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>