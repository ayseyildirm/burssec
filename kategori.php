<?php 

include 'header.php';
$kategorisor=$conn->prepare("SELECT * FROM kategori WHERE kategori_id=:id");
$kategorisor->execute(array('id'=>$_GET['kategori_id']));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
?>


<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
          
            <h1><?php echo $kategoricek['kategori_ad']; ?></h1>
     
            <div class="single_page_content"> 
              <div></div><br><p></p>
              <?php
$slidersor=$conn->prepare("SELECT * FROM slider where slider_kategori=:kategori_id  and slider_durum='1'");
$slidersor->execute(array(
  'kategori_id'=>$_GET['kategori_id']
  ));

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
  
 <li ><a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><?php echo $slidercek['slider_ad']; ?></a></li>
  <?php 
     }
?>

            <br><br><br><br><br>

            </div>
          
            
          </div>
        </div>
      </div>

<?php include 'sidebar.php'; ?>
  
    </div>
  </section>

<?php include 'footer.php'; ?>