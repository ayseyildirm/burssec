<?php 

include 'header.php'; 


$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=>$_SESSION['userkullanici_mail']
  ));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>



<section id="contentSection">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="left_content">
          <div class="single_page">
          
           <div class="contact_area">

            <?php 

                $kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail");
                $kullanicisor->execute(array(
                  'mail'=>$_SESSION['userkullanici_mail']
                  ));
                $say=$kullanicisor->rowCount();
                $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC); 
                ?>
               
               

            <h2>Profil Bilgileri</h2><br>
             <img src="<?php echo $kullanicicek['kullanici_resim']; ?>" alt="Avatar" class="avatar"> <br><br><br>
            
            <form action="admin/baglanti/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="contact_form">
              <div class="row">
                <div class="col-md-2"><p>Ad Soyad :</p></div>
                <div class="col-md-7">   <input class="form-control" name="kullanici_adsoyad" type="text" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>" ></div>
              </div>

              <div class="row">
                <div class="col-md-2"><p>E-posta :</p></div>
                <div class="col-md-7">
              <input class="form-control" name="kullanici_mail" disabled="" type="text" value="<?php echo $kullanicicek['kullanici_mail'] ?>"></div>
              </div>

              <div class="row">
                <div class="col-md-2"><p>Telefon :</p></div>
                <div class="col-md-7">
              <input class="form-control" name="kullanici_gsm" type="text" value="<?php echo $kullanicicek['kullanici_gsm'] ?>"></div>
              </div>

           
             <div class="row">
                <div class="col-md-2">Resim Seç : </div>
                <div class="col-sm-7"><input class="form-control" type="file" value="<?php echo $kullanicicek['kullanici_resim']; ?>" name="kullanici_resim"></div>
              </div><br>
                 <div class="row">
                <div class="col-md-2"><p>Adres :</p></div>
                <div class="col-md-7">
              <input class="form-control" name="kullanici_adres" type="text" value="<?php echo $kullanicicek['kullanici_adres'] ?>"></div>
              </div>
    <div class="row">
                <div class="col-md-2"><p>İl :</p></div>
                <div class="col-md-7">
              <input class="form-control" name="kullanici_il" type="text" value="<?php echo $kullanicicek['kullanici_il'] ?>"></div>
              </div>

                  <div class="row">
                <div class="col-md-2"><p>İlçe :</p></div>
                <div class="col-md-7">
              <input class="form-control" name="kullanici_ilce" type="text" value="<?php echo $kullanicicek['kullanici_ilce'] ?>"></div>
              </div>

              <textarea class="form-control" name="kullanici_cv" cols="30" rows="10"><?php echo $kullanicicek['kullanici_cv'] ?></textarea>
              <input type="submit" name="profilguncelle" value="Güncelle">
            </form>
          </div>
     
          </div>
        </div>
      </div>
 <div class="col-lg-5 col-md-5 col-sm-5">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Aktif Proje Duyurularım</span></h2>
            <ul class="spost_nav">
                <table class="table table-bordered">
    <thead>
        <tr>
        <th colspan="3"><a href="proje-duyuru"><img width="300" height="80" src="images/slider/dyr.jpg" alt=""></a></th>
       
      </tr>
    </thead>
    <tbody>

             
 <?php
$slidersor=$conn->prepare("SELECT * FROM slider WHERE slider_ekleyen=:kullanici_id  and slider_durum='1'");
$slidersor->execute(array(
  'kullanici_id'=>$kullanicicek['kullanici_id']
  ));

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
        <td>
          <li>
                <div class="media wow fadeInDown"> 
                  <div class="media-body"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="catg_title"><?php echo $slidercek['slider_ad']; ?></a> </div>
                </div>
              </li>
              </td>
        <td><a href="basvurulistele.php?proje_id=<?php echo $slidercek['slider_id']; ?>" title="Projeye yapılmış bütün başvuruları görüntüle"><button class="btn btn-primary">Başvurular</button></a></td>
        <td>
         <a href="admin/baglanti/islem.php?proje_id=<?php echo $slidercek['slider_id']; ?>&basvurusil=ok" title="Proje duyurusunu diğer kullanıclar göremez"><button class="btn btn-danger">Sonlandır</button></a>
         </td>
      </tr>
<?php } ?>


      </tbody>
  </table>
          </ul>
          </div>
        </aside>
      </div>

 <div class="col-lg-5 col-md-5 col-sm-5">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Sonlandırılmıs Proje Duyurularım</span></h2>
            <ul class="spost_nav">
                <table class="table table-bordered">
    <thead>
        <tr>
       
      </tr>
    </thead>
    <tbody>

             
 <?php
$slidersor=$conn->prepare("SELECT * FROM slider WHERE slider_ekleyen=:kullanici_id  and slider_durum='0'");
$slidersor->execute(array(
  'kullanici_id'=>$kullanicicek['kullanici_id']
  ));

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
        <td>
          <li>
                <div class="media wow fadeInDown"> 
                  <div class="media-body"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="catg_title"><?php echo $slidercek['slider_ad']; ?></a> </div>
                </div>
              </li>
              </td>
        <td><a href="basvurulistele.php?proje_id=<?php echo $slidercek['slider_id']; ?>" title="Projeye yapılmış bütün başvuruları görüntüle"><button class="btn btn-primary">Başvuruları Listele</button></a></td>
      
      </tr>
<?php } ?>


      </tbody>
  </table>
          </ul>
          </div>
        </aside>
      </div>

<div class="col-lg-5 col-md-5 col-sm-5">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Proje Basvurularım</span></h2>
            <ul class="spost_nav">
             <table class="table table-bordered">
              <tbody>
    
 <?php


$basvurusor=$conn->prepare("SELECT * FROM gelen_basvuru WHERE basvuru_kullanici=:kullanici_id");
$basvurusor->execute(array(
  'kullanici_id'=>$kullanicicek['kullanici_id']
  ));
$basvurucek=$basvurusor->fetch(PDO::FETCH_ASSOC);
$slidersor=$conn->prepare("SELECT * FROM slider where slider_id=:slider_id");
$slidersor->execute(array('slider_id'=>$basvurucek['slider_id']));
$sayac=$slidersor->rowCount();
if ($sayac==0) { ?>

  <tr>
        <td>
          <li>
                <div class="media wow fadeInDown"> 
                  <div class="media-body"> Henüz bir projeye başvuru yapmadınız.</div>
                </div>
              </li></td>
      </tr>
 
<?php }
while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>  <tr>
        <td>
          <li>
                <div class="media wow fadeInDown"> 
                  <div class="media-body"> <?php echo $slidercek['slider_ad']; ?> </div>
                </div>
              </li></td>
      </tr>
<?php } ?>

    </tbody></table>
          </ul>
          </div>
        </aside>
      </div>
  
    </div>
  </section>



<?php include 'footer.php'; ?>
