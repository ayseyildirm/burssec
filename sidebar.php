 <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Rastgele Projeler</span></h2>
            <ul class="spost_nav">
             
 <?php
$slidersor=$conn->prepare("SELECT * FROM slider  where slider_durum='1' order by RAND() limit 10");
$slidersor->execute();

while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
          <li>
                <div class="media wow fadeInDown"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="media-left"> <img alt="" src="<?php echo $slidercek['slider_resimyol'] ?>"> </a>
                  <div class="media-body"> <a href="proje-detay.php?slider_id=<?php echo $slidercek['slider_id']; ?>" class="catg_title"><?php echo $slidercek['slider_ad']; ?></a> </div>
                </div>
              </li>
<?php } ?>
          </ul>
          </div>
        </aside>
      </div>




                                


