 <header id="header" class="fixed-top d-flex align-items-center header bg-success" >
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-md-10 d-flex align-items-center justify-content-between">
          <h1>
            <!-- <img src="img/logo/logo2.png" width="50" height="40"> -->
            <a href="" style="font-size: 60%; color:white;">PT Harmoni Trussindo Lestari</a>
          </h1>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#">Home</a></li>
               <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                 <?php foreach($tampil_data_profil->result()as $rs) {?> 
                  <li>
                    <a class="dropdown-item a" href="Profil/Selengkap_nya/<?php echo $rs->id_profil; ?>/<?php echo str_replace(' ','-',$rs->nama) ?>">
                            <?php echo $rs->nama; ?>
                        </a>
                  </li>
                <?php } ?>
                </ul>
              </li>
           

              <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
               <li><a  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="bi bi-box-arrow-in-right"></span>&nbsp; Daftar | Login</a></li>
              
             
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- modal login -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="Login_user/cek" method="post">
            <div class="modal-body">

              
                  <div class="form-group">
                      <input type="text" class="form-control" id="recipient-name" name="email" placeholder="Email">
                  </div>
                  <br>
                  <div class="form-group">
                      <input type="password" class="form-control" id="recipient-name" name="pass" placeholder="Password">
                  </div>
                 


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Daftar</button>
              <button type="submit"  class="btn btn-primary" name="proses">Login</button>
            </div>
          </form> 
      </div>
    </div>
</div>
<!-- modal login -->

 <!-- modal daftar -->
<div class="modal fade" id="exampleModalToggle2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="Pendaftaran/Simpan_data" method="post">
            <div class="modal-body">

              
                  <div class="form-group">
                    <label>Nama</label>
                      <input type="text" class="form-control" id="recipient-name" name="nama" placeholder="nama">
                  </div>
                  <br>
                  <div class="form-group">
                      <select class="form-control" name="jenis_kel">
                        <option>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                  <br>
                   <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" id="recipient-name" name="tgl_lahir" placeholder="Tanggal Lahir">
                  </div>
                   <br>
                   <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="recipient-name" name="alamat" placeholder="Alamat">
                  </div>
                  <br>
                  <div class="form-group">
                      <label>No Telpon</label>
                      <input type="number" class="form-control" id="recipient-name" name="no_telpon" placeholder="No Telpon">
                  </div>
                  <br>
                   <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="recipient-name" name="email" placeholder="Email">
                  </div>
                  <br>
                  <div class="form-group">
                      <input type="password" class="form-control" id="recipient-name" name="pass" placeholder="Password">
                  </div>
                 


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <!--  <button type="button" class="btn btn-danger" data-bs-target="#exampleModal" data-bs-toggle="modal">Login</button> -->
              <button type="submit"  class="btn btn-primary" name="proses">Simpan</button>
            </div>
          </form> 
      </div>
    </div>
</div>
<!-- modal daftar -->

