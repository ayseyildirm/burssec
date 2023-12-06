
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
        
 <?php
$slidersor=$conn->prepare("SELECT * FROM slider  where slider_durum='1' order by RAND() limit 10");
$slidersor->execute();


while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>

 <div class="single_iteam"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>"> <img  src="<?php echo $slidercek['slider_resimyol'] ?>" alt=""></a>
            <div class="slider_article">
              <h4><a class="slider_tittle" href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>"> <?php echo $slidercek['slider_ad']

              ?></a></h4>
            </div>
          </div>

<?php } ?>

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Son Eklenenler</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
             <?php 
             $slidersor=$conn->prepare("SELECT * FROM slider  where slider_durum='1' order by slider_id desc limit 6");
$slidersor->execute();

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>

             <li>
                <div class="media"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="media-left"> <img alt="" width="20" src="<?php echo $slidercek['slider_resimyol'] ?>"> </a>
                  <div class="media-body"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="catg_title"> <?php echo $slidercek['slider_ad'] ?></a> </div>
                </div>
              </li>
              <?php } ?>
           </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
    <br><br><br>
  </section>
