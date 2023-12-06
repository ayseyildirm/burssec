<?php 

include 'header.php';
$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=>$_SESSION['userkullanici_mail']
  ));


//Belirli veriyi seçme işlemi
$projesor=$conn->prepare("SELECT * FROM slider where slider_id=:id");
$projesor->execute(array(
 'id' => $_GET['slider_id']
	));
$projecek=$projesor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar where kullanici_id=:id");
$kullanicisor->execute(array(
 'id' => $projecek['slider_ekleyen']
  ));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);



?>


<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
          
            <h1><?php echo $projecek['slider_ad']; ?></h1>
            
            <div class="single_page_content"> 
              <p><h4>Proje Sahibi : <a href="profil.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><?php echo $kullanicicek['kullanici_adsoyad']; ?></a></h4></p>
              <div><img src="<?php echo $projecek['slider_resimyol'] ?>" alt="" height="250" width="600"></div><br><p>
           <?php echo $projecek['slider_icerik']; ?></p>

            <br><br>


            <br><br><br>
              <?php  
if (isset($_SESSION['userkullanici_mail'])) { ?>

            <a href="basvuru-sayfasi.php?slider_id=<?php echo $projecek['slider_id']; ?>"><button class="btn btn-primary">Başvuru Sayfası</button></a>
<?php }else{ ?>

            <a href="giris-yap"><button class="btn btn-primary">Başvuru Sayfası</button></a>
        <?php } ?>

            </div>
          
           
          </div>
        </div>
      </div>

<?php include 'sidebar.php'; ?>
  
    </div>
  </section>

<?php include 'footer.php'; ?>