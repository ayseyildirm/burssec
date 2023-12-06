<?php include 'header.php'; ?>
<?php include 'slider.php'; 

$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=>$_SESSION['userkullanici_mail']));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Proje Duyuruları</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="" class="featured_img"> <img alt="" src="images/featured_img1.jpg"> <span class="overlay"></span> </a>
                    <figcaption><b>PROJENİZİ BİZLERLE PAYLASIN</b> </figcaption>


   <?php  
if (isset($_SESSION['userkullanici_mail'])) { ?>
    <a href="proje-duyuru"><img width="200" height="200" src="images/slider/duyuru.jpeg" alt=""></a>
<?php }else{ ?>
<a href="giris-yap"><img width="200" height="200" src="images/slider/duyuru.jpeg" alt=""></a>
        <?php } ?>


                   
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              
<?php
$slidersor=$conn->prepare("SELECT * FROM slider  where slider_durum='1' order by slider_sira limit 10");
$slidersor->execute();

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>

                     
              <li>
                <div class="media wow fadeInDown"> <a href="<?php echo $slidercek['slider_link'] ?>" class="media-left"> <img alt="" src="<?php echo $slidercek['slider_resimyol'] ?>"> </a>
                  <div class="media-body"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="catg_title"><?php echo $slidercek['slider_ad']; ?></a> </div>
                </div>
              </li>



<?php 
     }

?>


              </ul>
            </div>
          </div>
      </div>

     
    </div>
  
  <?php include 'sidebar.php'; ?>
     </div>
  </section>

  <?php include 'footer.php'; ?>