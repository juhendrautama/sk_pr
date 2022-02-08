<!DOCTYPE html>
<html lang="en">
  <head>
  		<?php $this->load->view('tools/head'); ?>
  </head>
  <body class="body">
 
 <?php $this->load->view('tools/menu_atas'); ?>

 
  <hr><hr><br>






  <main id="main">

  

   

   



   <!-- GAMBAR -->
     <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">DETAIL PRODUK</h3>
        </header>

  
<div class="row">

    <div class="col-md-8">     
      <div class="card">
        <div class="card-body">
              <div class="row " data-aos="fade-up" data-aos-delay="200">
                        
                            <div class="col-md-5">
                                  <img src="img/gambar_produk/<?php echo $tampil_produk_detail->gambar; ?>" class="img-thumbnail" style='width:100%; height: 100%;' >
                             </div>
                             <div class="col-md-7">
                                
                                  <h4><b><?php echo $tampil_produk_detail->nama_produk; ?></b></h4>
                                  <hr>
                                  <p style="font-size: 15px;  color:green;">  
                                        <?php
                                            $aVar = mysqli_connect('localhost','root','','sk_pr');
                                            $id_kategori=$tampil_produk_detail->id_kategori;
                                            $query = mysqli_query($aVar,"SELECT * FROM tbl_kategori_produk where id_kategori='$id_kategori'   ");
                                            $aName1 = mysqli_fetch_assoc($query);
                                            $nama_kategori=$aName1['nama']; 
                                        ?> 
                                        Kategori : <?php echo $nama_kategori; ?> <br>
                                        Stok : <?php echo $tampil_produk_detail->stok; ?><br>
                                        Harga : <?php echo $hasil_rupiah = "Rp " . number_format($tampil_produk_detail->harga,2,',','.'); ?>
                                  <hr>
                                      <?php echo $tampil_produk_detail->keterangan; ?>
                                      <?php 
                                       $berhasil=$this->session->userdata('login');
                                      if (!isset($berhasil) || $berhasil !=true ){
                                       ?>  
                                       <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-cart3"></i> Beli </a>
                                      <?php }else{ ?>
                                       <a href="#" class="btn btn-success btn-sm"><i class="bi bi-cart3"></i> Beli </a> 
                                      <?php } ?>  

                                     
                                     
                                  </p>
                             </div>      
                                 
                             
                </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">  
          <ul class="list-group">
          <li class="list-group-item bg-success" style="color:#ffff;">
            <i class="bi bi-card-list"></i>
            Kategori
          </li>
          <?php foreach($tampil_data_kat_produk->result()as $rs) {?> 
            <a href="Kategori/Produk/<?php echo $rs->id_kategori; ?>/<?php echo str_replace(' ','-',$rs->nama) ?>" class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto"> 

            <?php echo $rs->nama; ?>
          </div>
            <span class="badge bg-success rounded-pill">
               <?php 
                    $aVar = mysqli_connect('localhost','root','','sk_pr');
                    $id_kategori= $rs->id_kategori;;                      
                    $query = mysqli_query($aVar,"SELECT count(id_produk) as total FROM tbl_produk where id_kategori='$id_kategori' ");
                    $total = mysqli_fetch_assoc($query);
                    echo $total['total'];
                ?>
            </span>
            </a>
          <?php } ?>
        </ul>
    </div>

</div>



      </div>
    </section><!-- End Portfolio Section -->
 <!-- GAMBAR -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row contact-info">
<?php $no=1; foreach($tampil_data_kontak_addres->result()as $rs){?> 
          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3><?php echo $rs->nama_kontak; ?></h3>
              <address><?php echo $adres=$rs->isi; ?></address>
            </div>
          </div>
<?php } ?>

<?php $no=1; foreach($tampil_data_kontak_nomber_phone->result()as $rs){?>
          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3><?php echo $rs->nama_kontak; ?></h3>
              <p><a href="tel:<?php echo $rs->isi; ?>"><?php echo $phone=$rs->isi; ?></a></p>
            </div>
          </div>
<?php } ?>


<?php $no=1; foreach($tampil_data_kontak_email->result()as $rs){?>
          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3><?php echo $rs->nama_kontak; ?></h3>
              <p><a href="mailto:<?php echo $rs->isi; ?>"><?php echo $email=$rs->isi; ?></a></p>
            </div>
          </div>
<?php } ?>

        </div>

        <div class="form">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d997.0487589836796!2d103.62149655554127!3d-1.6344555136993586!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2589a437d5726f%3A0xf76eb59610c68a20!2sRumah%20Atap%20Harmoni!5e0!3m2!1sid!2sid!4v1644140298209!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">


          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Profil</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Kontak</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Daftar</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Login</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <?php echo $adres; ?>

              <strong>Phone:<?php echo $phone; ?></strong>
              <strong>Email:<?php echo $email; ?></strong> 
            </p>

           

          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Media Sosial</h4>
            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>  </strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer><!-- End Footer -->





  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->


 <?php $this->load->view('tools/js_footer'); ?>
  </body>
</html>