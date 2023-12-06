<?php include 'header.php';
 
 ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
      <div class="col-lg-6 col-md-6 col-sm-6">
      
          <div class="single_page">
          <h2><span>Basvuruları Listele</span></h2>
           <div class="single_page_content">
          <ul class="spost_nav">

     <?php  


 


$kackullanicivar=$conn->prepare("SELECT basvuru_kullanici FROM gelen_basvuru WHERE slider_id=:slider_id GROUP BY basvuru_kullanici");
  $kackullanicivar->execute(array(
    'slider_id'=> $_GET['proje_id']
  ));
  $kullanicilar=array();
  $satir = 0;
  while($kullanicicek=$kackullanicivar->fetch(PDO::FETCH_ASSOC)) {
    $kullanicilar[$satir] = $kullanicicek['basvuru_kullanici'];
    $satir++;
  }


  $veriler=array();
  $verisor=$conn->prepare("SELECT * FROM gelen_basvuru WHERE slider_id=:slider_id and basvuru_kullanici=:basvuru_kullanici");

  foreach ($kullanicilar as $kullanici_id){
    $verisor->execute(array(
      'slider_id'=> $_GET['proje_id'],
      'basvuru_kullanici'=> $kullanici_id 
    ));

    $kontrol=$verisor->rowCount();

  
    $sutunsayisi=0;
    while($vericek=$verisor->fetch(PDO::FETCH_ASSOC)) {
      $veriler[$kullanici_id][$vericek['kriter_id']] = $vericek['basvuru_deger'];
      $sutunsayisi++;
    }

  }




  //bu kısım hangi veriler geldi diye kontrol etmek için
  foreach ($veriler as $key => $value) {
    $kullanici=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
    $kullanici->execute(array('kullanici_id'=> $key));
       while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)) {
   //     echo $kullanicicek['kullanici_adsoyad'];
       }
  //  echo " kullanicinin verileri <br>";

    foreach ($veriler[$key] as $indis => $deger) {
          $kriter=$conn->prepare("SELECT * FROM basvuru_kriter WHERE kriter_id=:kriter_id");
          $kriter->execute(array('kriter_id'=> $indis));
          while($kritercek=$kriter->fetch(PDO::FETCH_ASSOC)) {
       // echo $kritercek['kriter_ad'];
       }
     // echo "$indis --> $deger <br>";



    }
  //  echo "<hr>";
  }


      






  //kontrol kısmı bitti



 // echo "<table  class='table table-bordered'> <th>Sıra</th> <th>Ad Soyad</th>";

   
    foreach ($veriler[$key] as $indis => $deger) {
          $kriter=$conn->prepare("SELECT * FROM basvuru_kriter WHERE kriter_id=:kriter_id");
          $kriter->execute(array('kriter_id'=> $indis));
          while($kritercek=$kriter->fetch(PDO::FETCH_ASSOC)) { ?>
        <th><?php //echo $kritercek['kriter_ad']; ?></th>
        <?php 
       }
    }
  
  //buraya kriter adları gelecek

  $i=1;
  foreach ($veriler as $key => $value) {

   // echo "<tr> <td> $i </td>" ;$i++;
    $kullanici=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
    $kullanici->execute(array('kullanici_id'=> $key));
       while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)) {?>
        
       <td><a href="profil.php?kullanici_id=<?php //echo $kullanicicek['kullanici_id']; ?>"><?php // echo $kullanicicek['kullanici_adsoyad']; ?></a></td><?php 
       }
   
    
    foreach ($veriler[$key] as $indis => $deger) {
    //  echo "<td> $deger </td>";
    }
  //  echo "</tr>";
  }

 // echo "</table>";

$enbuyukler = array();
  $enkucukler = array();
  foreach ($veriler[$key] as $kriter => $kdeger) {

    $enbuyukler[$kriter] = $veriler[$kullanicilar[0]][$kriter]; //kullancı ve kriter id   
    $enkucukler[$kriter] = $veriler[$kullanicilar[0]][$kriter]; //kullancı ve kriter id
    foreach ($veriler as $kullanici => $kuldeger) {
      //enbuyukleri bulmak icin
      if ($veriler[$kullanici][$kriter] > $enbuyukler[$kriter]) {
        $enbuyukler[$kriter] = $veriler[$kullanici][$kriter];
      }
      //en kucukleri bulmak icin
      if ($veriler[$kullanici][$kriter] < $enkucukler[$kriter]) {
        $enkucukler[$kriter] = $veriler[$kullanici][$kriter];
      }
    }
  }
 
 // echo "<hr> en buyukler <br>";

  foreach ($enbuyukler as $krit => $eb) {
   // echo "$krit kriterin eb: $eb <br>";
  }
 // echo "<br> en kucukler <br>";
  foreach ($enkucukler as $krit => $ek) {
    //echo "$krit kriterin ek: $ek <br>";
  }




  $agirliksor=$conn->prepare("SELECT * FROM basvuru_kriter WHERE slider_id=:slider_id");
  $agirliksor->execute(array(
    'slider_id'=> $_GET['proje_id']
  ));
  $agirlik=array();
 
  $agirliksayisi=1;
  while($agirlikcek=$agirliksor->fetch(PDO::FETCH_ASSOC)) {
    $ondalik=$agirlikcek['kriter_deger']/100;
    $indis=$agirlikcek['kriter_id'];
    $agirlik[$indis] = $ondalik;
  
    $agirliksayisi++;
  }

    foreach ($agirlik as $indis => $dgr) {
          $dnm=$conn->prepare("SELECT * FROM basvuru_kriter WHERE kriter_id=:kriter_id");
          $dnm->execute(array('kriter_id'=> $indis));
      //  echo "$indis --> $dgr <br>";
       }
  
 



 //echo "<hr>"."GRİ İLİŞKİSEL KATSAYI TABLOSU"."<hr>";

  //echo "<table  class='table table-bordered'> <th>Sıra</th> <th>Ad Soyad</th>";

   
    foreach ($veriler[$key] as $indis => $deger) {
          $kriter=$conn->prepare("SELECT * FROM basvuru_kriter WHERE kriter_id=:kriter_id");
          $kriter->execute(array('kriter_id'=> $indis));
          while($kritercek=$kriter->fetch(PDO::FETCH_ASSOC)) { ?>
        <th><?php //echo $kritercek['kriter_ad']; ?></th>
        <?php 
       }
    }
  
  //buraya kriter adları gelecek

  
  $giaagirliklar = array();
  $i=1;
  $agirliktoplam = array();
  foreach ($veriler as $key => $value) {

  //  echo "<tr> <td> $i </td>" ;$i++;
    $kullanici=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
    $kullanici->execute(array('kullanici_id'=> $key));
   
       while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)) {?>
        
       <td><a href="profil.php?kullanici_id=<?php //echo $kullanicicek['kullanici_id']; ?>"><?php // echo $kullanicicek['kullanici_adsoyad']; ?></a></td><?php 
       
       }
  
    $toplam = 0; 
    foreach ($veriler[$key] as $indis => $deger) {
      $normalizasyon1=$deger-$enkucukler[$indis];
      $normalizasyon2=$enbuyukler[$indis]-$enkucukler[$indis];
      $normalizasyon3=$normalizasyon1/$normalizasyon2;
      $mutlak=1-$normalizasyon3;
      $giakatsayi1=0.5+$mutlak;
      $giakatsayi2=0.5/$giakatsayi1;
      
      $giaagirlik1=$giakatsayi2*$agirlik[$indis];
     
     
     // echo "<td>  $giaagirlik1 </td>";
      $giaagirliklar[$key][$indis] = $giaagirlik1;
      $toplam = $toplam + $giaagirlik1;
      
    }  
     $agirliktoplam[$key] = $toplam/count($veriler[$key]);
   
   // echo "</tr>";
  }
 // echo "</table>";
 // print_r($agirliktoplam);

/////////////////////////////////ANALİZ SONUCU SIRALAMA///////////////////////////
echo "<table  class='table table-bordered'> <th>Sıra</th> <th>Ad Soyad</th> <th>Projeye Uygunluk Değeri</th>";
arsort($agirliktoplam);
 $sira=1;
foreach ($agirliktoplam as $key => $val) {
 
    echo "<tr> <td> $sira </td>" ; $sira++;


   $kullanici=$conn->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
    $kullanici->execute(array('kullanici_id'=> $key));
   
       while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC)) {?>
        
       <td><a href="profil.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><?php  echo $kullanicicek['kullanici_adsoyad']; ?></a></td><?php 
       
       }

     echo "<td> $val </td>" ;
   // echo "$key idli kullanıcı = $val\n";
 echo "</tr>";
      
}echo "</table>";


     ?>
          </ul>

        </div>
         </div>
      </div>
      
 
    </div>
  </section>
  <?php include 'footer.php'; ?>








