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

     

                  <div class="panel panel-default">
                    <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item bg-success" style="color:#ffff;">
          <center>
            <h3>Perhitungan Estimasi</h3>
          </center>  
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
            <a href="#" class="list-group-item d-flex justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal4">
            4. Menghitung Kanal
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal5">
            5. Menghitung Reng
            </a>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal6">
            6. Menghitung Baut
            </a>
            
        </ul>

        </div>  
        


        </div>

      </div>
    </section><!-- End Services Section -->
<br><br><br><br><br>
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
                  <div class="form-group col-md-6">
                          <input  type="number" id="luas2"  class="form-control" name="luas2" placeholder="LUAS">
                    </div>
                      
                    <div class="form-group col-md-6">
                          <input readonly  type="number"  id="Nilai_mutlak"  class="form-control"  name="Nilai_mutlak" value="0.8">
                    </div>
                   
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-6">
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
              <div class="form-group col-md-6">
                      <input  type="number" id="luas3"  class="form-control"  name="luas3" placeholder="luas">
                  </div>
                  <br>
                  <div class="form-group col-md-6">
                    <select name="Nilai_mutlak2" id="Nilai_mutlak2" class="form-control" >
                      <option value="">Pilih</option>
                      <option value="1.3">Multi Roof</option>
                      <option value="1.62">Sakura Roof</option>
                      <option value="1.62">Surya Roof</option>
                      <option value="1.7">Polar 1.8</option>
                      <option value="2">Polar 2.1</option>
                      <option value="1.6">Puma 1.7</option>
                      <option value="3.9">Jaguar 4m</option>
                      <option value="4.9">Jaguar 5m</option>
                      <option value="5.9">Jaguar 6m</option>
                      <option value="1.6">Leopard Trendy 1.7</option>
                      <option value="0.283">Fancy Trendy</option>
                      <option value="1.6">Soka Jempol 1.7</option>
                      <option value="1.7">Soka Jempol 1.8</option>
                      <option value="2">Soka Jempol 2.1</option>
                    </select>
                  </div>
                
              </div>
            <br>
            <div class="row">
                  <div class="form-group col-md-6">
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

 <!-- rumus 4 -->
 <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel" >MENGHITUNG KANAL</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">

              <div class="row">
                  <div class="form-group col-md-6">
                          <input  type="number" id="luas4"  class="form-control" name="luas4" placeholder="LUAS">
                    </div>
                      
                    <div class="form-group col-md-6">
                          <input readonly  type="number"  id="Nilai_mutlak4"  class="form-control"  name="Nilai_mutlak4" value="0.5">
                    </div>
                   
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-6">
                <input  type="number" class="form-control" id="hasil4"  name="hasil" placeholder="Hasil">
                </div>
              </div>
            </div>
           
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" onclick="hitung4()">Hitung</button>
             
             
            </div>
          </form> 
      </div>
    </div>
</div>
 <!-- rumus 4 -->

 <!-- rumus 5 -->
 <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel" >MENGHITUNG RENG</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">

              <div class="row">
                  <div class="form-group col-md-6">
                          <input  type="number" id="luas5"  class="form-control" name="luas5" placeholder="LUAS">
                    </div>
                      
                    <div class="form-group col-md-6">
                          <input readonly  type="number"  id="Nilai_mutlak5"  class="form-control"  name="Nilai_mutlak5" value="0.4">
                    </div>
                   
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-6">
                <input  type="number" class="form-control" id="hasil5"  name="hasil" placeholder="Hasil">
                </div>
              </div>
            </div>
           
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" onclick="hitung5()">Hitung</button>
            </div>
          </form> 
      </div>
    </div>
</div>
 <!-- rumus 5 -->

  <!-- rumus 6 -->
  <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel" >MENGHITUNG BAUT</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">

              <div class="row">
                  <div class="form-group col-md-8">
                          <input  type="number" id="luas6"  class="form-control" name="luas6" placeholder="Pemakaian Kanal & Reng">
                    </div>
                      
                    <div class="form-group col-md-4">
                          <input readonly  type="number"  id="Nilai_mutlak6"  class="form-control"  name="Nilai_mutlak6" value="20">
                    </div>
                   
              </div>
              <br>
              <div class="row">
                <div class="form-group col-md-6">
                <input  type="number" class="form-control" id="hasil6"  name="hasil" placeholder="Hasil">
                </div>
              </div>
            </div>
           
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-md" onclick="hitung6()">Hitung</button>
            </div>
          </form> 
      </div>
    </div>
</div>
 <!-- rumus 6 -->


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
    document.getElementById("hasil").value=Math.round(hasil1);
}

function hitung2(){
    let luas2 = document.getElementById("luas2").value;
    let Nilai_mutlak = document.getElementById("Nilai_mutlak").value;
    let hasil2 = luas2 / Nilai_mutlak;
    document.getElementById("hasil2").value=Math.round(hasil2);
}

function hitung3(){
    let luas3 = document.getElementById("luas3").value;
    let Nilai_mutlak2 = document.getElementById("Nilai_mutlak2").value;
    let hasil3 = luas3 / Nilai_mutlak2;
    document.getElementById("hasil3").value=Math.round(hasil3);
}

function hitung4(){
    let luas4 = document.getElementById("luas4").value;
    let Nilai_mutlak4 = document.getElementById("Nilai_mutlak4").value;
    let hasil4 = luas4 / Nilai_mutlak4;
    document.getElementById("hasil4").value=Math.round(hasil4);
}

function hitung5(){
    let luas5 = document.getElementById("luas5").value;
    let Nilai_mutlak5 = document.getElementById("Nilai_mutlak5").value;
    let hasil5 = luas5 / Nilai_mutlak5;
    document.getElementById("hasil5").value=Math.round(hasil5);
}

function hitung6(){
    let luas6 = document.getElementById("luas6").value;
    let Nilai_mutlak6 = document.getElementById("Nilai_mutlak6").value;
    let hasil6 = luas6 / Nilai_mutlak6;
    document.getElementById("hasil6").value=Math.round(hasil6);
}
</script>  
  </body>
</html>