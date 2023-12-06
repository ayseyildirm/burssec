
<?php 

include 'header.php';
?>


<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
          
            <h1>PROJE DUYURUNUZU YAPIN</h1>
     
            <div class="single_page_content"> 
              <br>

            <form action="admin/baglanti/islem.php" role='form' enctype="multipart/form-data"data-parsley-validate class="contact_form" method="POST">

              <div class="row">
                <div class="col-md-3">Proje Adı : </div>
                <div class="col-sm-9"><input class="form-control" type="text" name="slider_ad"></div>
              </div>



              <div class="row">
                <div class="col-md-3">Proje Sahibinin Adı : </div>
                <div class="col-sm-9"><input class="form-control" type="text" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>"></div>
                <input type="hidden" name="slider_ekleyen" value="<?php echo $kullanicicek['kullanici_id']; ?>">
              </div>


             <div class="row">
                <div class="col-md-3">Resim Seç : </div>
                <div class="col-sm-9"><input class="form-control" type="file" name="slider_resimyol"></div>
              </div>
<br>

              <div class="row">
                <div class="col-md-3">Proje Kategorisi : </div>

                <div class="col-sm-9">
                
       <select class="form-control" name="slider_kategori" id="kategori">
        <option value="0">--Seçiniz--</option>
          <?php 
                     $kategorisor=$conn->prepare("SELECT * FROM kategori order by kategori_ad");
                    $kategorisor->execute();
                    while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 
                   ?>
         <option id="<?php echo $kategoricek['kategori_id']; ?>" value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option><?php } ?>
       </select> 
            </div>
            </div>
<br>
              <div class="row">
                <div class="col-md-3">Proje Hakkında : </div>
                <div class="col-sm-9"> <textarea class="form-control" name="slider_icerik" cols="30" rows="10" placeholder="Projenizi kısaca tanıtın*"></textarea></div>
              </div>      
<br>
  <font color="green"> <i>Bu kısımda projeye başvuracak kişilerden beklenilen özelliklerin adını ve bu özelliklerin projede etki oranını giriniz. Kriterlere verilen değerler toplamı %100 geçemez.</i></font>
    <div><br></div>
 
              <br> 
 

         <div id="ozellik" class="row"></div>
   
<button id="yeniekle" class="btn btn-warning" type="button">Yeni Özellik Ekle</button>
              



<script type="text/javascript">
  $(document).ready(function(){
    var count=1;
    $( "#yeniekle" ).click(function() {
      count=count+1;
      $("#ozellik").append($("<div class='col-md-9'><input class='form-control' type='text' name='kriter_ad[]' placeholder='Özellik Adı'> </div><div class='col-md-3'><input type='number' class='form-control'  placeholder='Değeri' min='0' max='100' name='kriter_deger[]'></div><br>"));
    });
  })
      

</script>
            



<br><br><br>
               <div class="row">
                <div class="col-md-9"></div>
                <div class="col-sm-2"> 
<button type="submit" name="duyuruyap" class="btn btn-info">Duyuru Yap</button>
                </div>
              </div>

            
            </form>

            

            <br><br><br><br><br>

            </div>
          
            
          </div>
        </div>
      </div>
      

  
    </div>
  </section>

<?php include 'footer.php'; ?>