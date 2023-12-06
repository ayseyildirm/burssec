<?php 

include 'header.php';
$kullanicisor=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=>$_SESSION['userkullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$kritersor=$conn->prepare("SELECT * FROM basvuru_kriter where slider_id=:id");
$kritersor->execute(array(
 'id' => $_GET['slider_id']
  ));
$projesor=$conn->prepare("SELECT * FROM slider where slider_id=:id");
$projesor->execute(array(
 'id' => $_GET['slider_id']
  ));
$projecek=$projesor->fetch(PDO::FETCH_ASSOC);

?>


<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
          
            <h1>BASVURU SAYFASI</h1>
     
            <div class="single_page_content"> 
              <h4><?php echo $projecek['slider_ad'];  ?></h4><br><br>
               
                <form action="admin/baglanti/islem.php" role='form' enctype="multipart/form-data"data-parsley-validate class="contact_form" method="POST">
                 

             <div class="row">
                <div class="col-md-3">Projeye Başvuran Kişi : </div>
                <div class="col-sm-9"><p name="kullanici_adsoya"><?php echo $kullanicicek['kullanici_adsoyad']; ?></p></div>
                <input type="hidden" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_id']; ?>" >
              </div>
             
              <br>

                <div class="row">
                <div class="col-md-3">Başvurulan Proje Adı : </div>
                <div class="col-sm-9"><p name="slider_ad"><?php echo $projecek['slider_ad'];  ?></p><input type="hidden" name="slider_id" value="<?php echo $projecek['slider_id']; ?>"></p> </div>
              </div>
              <br><br>


                 <font color="blue"> <i>Bu kısımda projeye başvuracak kişilerden beklenilen özellikler verilmiştir. Bu özellikler ile ilgili bilgi düzeyinizi 0-100 arasında özellik değerleri kısmına giriniz. (0=Bilmiyorum, 100=Çok iyi biliyorum)</font> 
              </i>

  <table class="table table-striped ">
    <thead>
      <tr>
        <th>Proje Katılımcısından Beklenilen Özellikler</th>
        <th>Özellik Değerleri</th>
      
      </tr>
    </thead>
    <tbody> <?php 
     
     while($kritercek=$kritersor->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td><?php echo $kritercek['kriter_ad'];  ?><input type="hidden" name="kriter_id[]" value="<?php echo $kritercek['kriter_id']; ?>"></td>
        <td><input class="form-control" type="number" placeholder="0" min='0' max='100' name="deger[]"></td>
      </tr>
    <?php  } ?>
    </tbody>
  </table>
            <br><br><br><br><br>

           <?php  
if (isset($_SESSION['userkullanici_mail'])) { ?>
  <button type="submit" name="basvur" class="btn btn-primary">Başvuruyu Onayla</button>
  
<?php }else{ ?>

            <a href="giris-yap"><button class="btn btn-primary">Başvuruyu Onayla</button></a>

        <?php } ?>

            </form>

            </div>
          
            
          </div>
        </div>
      </div>
  
    </div>
  </section>

<?php include 'footer.php'; ?>