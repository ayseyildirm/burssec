<?php include 'header.php'; ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
      <div class="col-lg-6 col-md-6 col-sm-6">
      
          <div class="single_page">
            <form role="form" method="POST" action="admin/baglanti/islem.php">
                                 <br><br>   <hr />
                                   <center><h3><b>GİRİS YAP</b></h3></center> 
                                       <br /><br>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="email" class="form-control" name="kullanici_mail" placeholder="Eposta adresiniz " />
                                        </div><br>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="kullanici_password" placeholder="Şifreniz" />
                                        </div><br>
                                
                                   <button style="width: 100%" type="submit" class="btn btn-primary" name="kullanicigiris">Giriş Yap</button>
                                    </form>
                                    <a href="uye-ol"><button style="width: 100%"s class="btn btn-success">Üye Ol</button></a><br><br></div>
        
      </div>
      
 
    </div>
  </section>
  <?php include 'footer.php'; ?>