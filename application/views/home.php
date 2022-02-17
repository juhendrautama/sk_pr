<!DOCTYPE html>
<html lang="en">
  <head>
  		<?php $this->load->view('tools/head'); ?>
  </head>
  <body class="body">
 
 <?php $this->load->view('tools/menu_atas'); ?>

 
  <hr><hr><br>

<!-- slider -->
<div class="container">
  <?php $this->load->view('tools/slider'); ?>
</div>
<!-- slider -->






  <main id="main">

  

   
<hr>

<hr>
   



   <!-- GAMBAR -->
     <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">DAFTAR PRODUK</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class=" col-lg-12">
          <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <?php foreach($tampil_data_kat_produk->result()as $rs) {?>   
                <li data-filter=".filter-<?php echo $rs->id_kategori; ?>"><?php echo $rs->nama; ?></li>
                <?php } ?>
              </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

         <?php foreach($tampil_data_produk->result()as $rs) {?>
                  <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $rs->id_kategori; ?>">
                    <div class="portfolio-wrap">
                      <figure>
                        <img src="img/gambar_produk/<?php echo $rs->gambar; ?>" class="img-fluid" alt="">
                        <a href="img/gambar_produk/<?php echo $rs->gambar; ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="<?php echo $rs->nama_produk; ?>">
                        <i class="bi bi-plus"></i>
                        </a>
                      </figure>

                      <div class="portfolio-info">
                        <p style="font-size: 15px; margin-top:-25px; color:green;">
                            <b><?php echo $rs->nama_produk; ?></b>
                              
                            <br>
                              Harga : <?php echo $hasil_rupiah = "Rp " . number_format($rs->harga,2,',','.'); ?>
                            <br>
                            <a href="Detail/Produk/<?php echo $rs->id_produk; ?>/<?php echo str_replace(' ','-',$rs->nama_produk) ?>" class="btn btn-success btn-sm">Detail</a>
                            

                           
                        </p>
                      </div>
                    </div>
                  </div>
           <?php } ?>





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

  <script type="text/javascript">
      $.getJSON('https://api.jambiprov.go.id/pegawai/',function (data){
                            
        let tampil_data = data.tampil_data;
          $.each(tampil_data,function(i, data){
            $('#daftar_data').append(data.foto);
          }); 
      });
    </script>

 
  </body>
</html>