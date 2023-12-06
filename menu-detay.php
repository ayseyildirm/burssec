<?php 

include 'header.php';



//Belirli veriyi seçme işlemi
$menusor=$conn->prepare("SELECT * FROM menu where menu_seourl=:sef");
$menusor->execute(array(
	'sef' => $_GET['sef']
	));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);


?>


<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
          
            <h1><?php echo $menucek['menu_ad'] ?></h1>
     
            <div class="single_page_content"> 

         <ul>
           <?php
$kategorisor=$conn->prepare("SELECT * FROM kategori order by kategori_ad");
$kategorisor->execute();
?><div class="row"><?php 
while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-md-6"> <li><a href="kategori.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>">
               <?php echo $kategoricek['kategori_ad']; ?></a>
              </li></div>    
             



<?php 
     }

?></div> 
 </ul>          

            
            </div>
          
     
          </div>
        </div>
      </div>

<?php include 'sidebar.php'; ?>
  
    </div>
  </section>

<?php include 'footer.php'; ?>