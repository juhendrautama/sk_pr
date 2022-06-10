<!DOCTYPE html>
<html lang="en">
  <head>
      <?php $this->load->view('tools/head'); ?>
  </head>
  <body class="body">
 
 <?php $this->load->view('tools/menu_atas'); ?>

 
  <hr><hr><br>

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">

     

        <div class="row">

        <div class="col-md-12">
        <header class="section-header wow fadeInUp">
          <h3>Perhitungan Estimasi</h3>
        </header>
          <hr>
                  <div class="panel panel-default">
                    <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item bg-success" style="color:#ffff;">
            <i class="bi bi-card-list"></i>
            Menu Perhitungan Estimasi
          </li>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            1. Menghitung Luas Bangunan
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            2. Menghitung Kebutuhan Perabung / Nok
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal3">
            3. Menghitung Kebutuhan Atap
            </a>
            
        </ul>

                    </div>
                  </div>
        </div>  
        


        </div>

      </div>
    </section><!-- End Services Section -->

<!-- rumus 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menghitung Luas Bangunan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">

              <div class="row">
              <div class="form-group col-md-4">
                      <input  type="number" id="panjang"  class="form-control" id="recipient-name" name="PANJANG_BANGUNAN" placeholder="PANJANG">
                  </div>
                  <br>
                  <div class="form-group col-md-4">
                      <input  type="number"  id="lebar"  class="form-control" id="recipient-name" name="LEBAR_BANGUNAN" placeholder="LEBAR">
                  </div>
                  <div class="form-group col-md-4">
                      <input  type="number" class="form-control" id="hasil"  name="LEBAR_BANGUNAN" placeholder="Hasil">
                     
                  </div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" onclick="hitung()">Hitung</button>
             
             
            </div>
          </form> 
      </div>
    </div>
</div>
 <!-- rumus 1 -->
<!-- rumus  2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel" >MENGHITUNG KEBUTUHAN PERABUNG / NOK</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">

              <div class="row">
                  <div class="form-group col-md-4">
                          <input  type="number" id="luas2"  class="form-control" name="luas2" placeholder="LUAS">
                    </div>
                      
                    <div class="form-group col-md-4">
                          <input  type="number"  id="panjang2"  class="form-control"  name="Panjang2" placeholder="PANJANG">
                    </div>
                    <div class="form-group col-md-4">
                          <input  type="number" class="form-control" id="lebar2"  name="lebar" placeholder="LEBAR">
                    </div>
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-4">
                <input  type="number" class="form-control" id="hasil2"  name="hasil" placeholder="Hasil">
                </div>
              </div>
            </div>
           
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" onclick="hitung2()">Hitung</button>
             
             
            </div>
          </form> 
      </div>
    </div>
</div>
 <!-- rumus 2 -->

 <!-- rumus 3 -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MENGHITUNG KEBUTUHAN ATAP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">

              <div class="row">
              <div class="form-group col-md-4">
                      <input  type="number" id="panjang3"  class="form-control"  name="PANJANG_BANGUNAN" placeholder="PANJANG">
                  </div>
                  <br>
                  <div class="form-group col-md-4">
                      <input  type="number"  id="lebar3"  class="form-control"  name="LEBAR_BANGUNAN" placeholder="LEBAR">
                  </div>
                  <div class="form-group col-md-4">
                      <input  type="number" class="form-control" id="hasil3"  name="LEBAR_BANGUNAN" placeholder="Hasil">
                     
                  </div>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" onclick="hitung3()">Hitung</button>
             
             
            </div>
          </form> 
      </div>
    </div>
</div>
 <!-- rumus 3 -->


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
              <li><i class="bi bi-chevron-right"></i> <a href="#">Program</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Undahan</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. Mayjen H M.J. Singedekane <br> Sungai Putri <br> Kec. Telanaipura <br> Kota Jambi  <br> Jambi 36361

              <strong>Phone:</strong><br>
              <strong>Email:</strong> <br>
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
        &copy; Copyright <strong>PEMERINTAH PROVINSI JAMBI  </strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https://bootstrapmade.com/">Diskominfo Provinsi jambi</a>
      </div>
    </div>
  </footer><!-- End Footer -->

 
 


 <?php $this->load->view('tools/js_footer'); ?>
 <script>
function hitung(){
    let panjang = document.getElementById("panjang").value;
    let lebar = document.getElementById("lebar").value;
    let hasil1 = panjang * lebar;
    document.getElementById("hasil").value=hasil1;
}

function hitung2(){
    let luas2 = document.getElementById("luas2").value;
    let panjang2 = document.getElementById("panjang2").value;
    let lebar2 = document.getElementById("lebar2").value;
    let hasil2 = luas2 / panjang2 / lebar2;
    document.getElementById("hasil2").value=hasil2;
}

function hitung3(){
    let panjang3 = document.getElementById("panjang3").value;
    let lebar3 = document.getElementById("lebar3").value;
    let hasil3 = panjang3 / lebar3;
    document.getElementById("hasil3").value=hasil3;
}
</script>  
  </body>
</html>