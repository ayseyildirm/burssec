<?php 

include 'header.php'; 


$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:id");
$kullanicisor->execute(array(
  'id'=>$_GET['kullanici_id']
  ));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>



<section id="contentSection">
    <div class="row">

      <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="left_content">
          <div class="single_page">
          
           <div class="contact_area">

    
               

            <h2>Profil Bilgileri</h2><br>
            
            <form action="" method="" enctype="multipart/form-data"data-parsley-validate  class="contact_form">

             <img src="<?php echo $kullanicicek['kullanici_resim']; ?>" alt="Avatar" class="avatar"> <br><br>

             <p><?php echo $kullanicicek['kullanici_cv'] ?></p>
       

            </form>
             
              
          </div>
     
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5">

        <aside class="right_content">
          <div class="single_sidebar">
                 <form action="" method="" enctype="multipart/form-data"data-parsley-validate  class="contact_form">
<br><br><br>
              <div class="row">
                <div class="col-md-3"><p>Ad Soyad :</p></div>
                <div class="col-md-7">   <input class="form-control" disabled=""  name="kullanici_adsoyad" type="text" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>" ></div>
              </div>

              <div class="row">
                <div class="col-md-3"><p>E-posta :</p></div>
                <div class="col-md-7">
              <input class="form-control" name="kullanici_mail" disabled="" type="text" value="<?php echo $kullanicicek['kullanici_mail'] ?>"></div>
              </div>

              <div class="row">
                <div class="col-md-3"><p>Telefon :</p></div>
                <div class="col-md-7">
              <input class="form-control" disabled=""  name="kullanici_gsm" type="text" value="<?php echo $kullanicicek['kullanici_gsm'] ?>"></div>
              </div>

                 <div class="row">
                <div class="col-md-3"><p>Adres :</p></div>
                <div class="col-md-7">
              <input class="form-control" disabled=""  name="kullanici_adres" type="text" value="<?php echo $kullanicicek['kullanici_adres'] ?>"></div>
              </div>
    <div class="row">
                <div class="col-md-3"><p>İl :</p></div>
                <div class="col-md-7">
              <input class="form-control" disabled=""  name="kullanici_il" type="text" value="<?php echo $kullanicicek['kullanici_il'] ?>"></div>
              </div>

                  <div class="row">
                <div class="col-md-3"><p>İlçe :</p></div>
                <div class="col-md-7">
              <input class="form-control" disabled=""  name="kullanici_ilce" type="text" value="<?php echo $kullanicicek['kullanici_ilce'] ?>"></div>
              </div>

            </form>

           
  
    </div>
    </div>
       <div class="col-lg-5 col-md-5 col-sm-5">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Duyurdugu Projeler</span></h2>
            <ul class="spost_nav">
                <table class="table table-bordered">
    <thead>
        <tr>
       
      </tr>
    </thead>
    <tbody>

             
 <?php
$slidersor=$conn->prepare("SELECT * FROM slider WHERE slider_ekleyen=:kullanici_id");
$slidersor->execute(array(
  'kullanici_id'=>$_GET['kullanici_id']
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
      
      </tr>
<?php } ?>


      </tbody>
  </table>
          </ul>
          </div>
        </aside>
      </div>

    </div>
    </div>
  </section>

<?php include 'footer.php'; ?>