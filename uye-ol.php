<?php include 'header.php'; ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
      <div class="col-lg-6 col-md-6 col-sm-6">
      
          <div class="single_page">
            <form role="form" method="POST" action="admin/baglanti/islem.php">
                                 <br><br>   <hr />
                                   <center><h3><b>ÜYE OL</b></h3></center> 
                                       <br /><br>
                                       
        <?php 

        if ($_GET['durum']=="farklisifre") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
        </div>
          
        <?php } elseif ($_GET['durum']=="eksiksifre") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
        </div>
          
        <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
        </div>
          
        <?php } elseif ($_GET['durum']=="basarisiz") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
        </div>
          
        <?php }
         ?>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="kullanici_adsoyad" placeholder="Adınızı ve soyadınızı giriniz " />
                                        </div><br>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="email" class="form-control" name="kullanici_mail" placeholder="E-posta adresinizi giriniz " />
                                        </div><br>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="kullanici_passwordone" placeholder="Şifrenizi giriniz" />
                                        </div><br>
                                          <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="kullanici_passwordtwo" placeholder="Şifrenizi tekrar giriniz" />
                                        </div><br>
                                
                                   <button style="width: 100%" type="submit" class="btn btn-primary" name="kullanicikaydet">Üye Ol</button>
                                 
                                    </form>  <a href="giris-yap"><button style="width: 100%" class="btn btn-success">Giriş Yap</button></a><br><br></div>
        
      </div>
      
 
    </div>
  </section>
  <?php include 'footer.php'; ?>