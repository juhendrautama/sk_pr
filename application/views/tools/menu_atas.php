 <header id="header" class="fixed-top d-flex align-items-center header bg-success" >
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-md-10 d-flex align-items-center justify-content-between">
          <h1>
            <!-- <img src="img/logo/logo2.png" width="50" height="40"> -->
            <a href="" style="font-size: 60%; color:white;">PT Harmoni Trussindo Lestari</a>
          </h1>
          <nav id="navbar" class="navbar bg-success">
            <ul>
              <li><a class="nav-link scrollto active" href="#">Home</a></li>
               <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                 <?php foreach($tampil_data_profil->result()as $rs) {?> 
                  <li>
                    <a class="dropdown-item " href="Profil/Selengkap_nya/<?php echo $rs->id_profil; ?>/<?php echo str_replace(' ','-',$rs->nama) ?>">
                            <?php echo $rs->nama; ?>
                        </a>
                  </li>
                <?php } ?>
                </ul>
              </li>
              <li class="dropdown scrollto"><a class="scrollto" href="#"><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a class="dropdown-item  " href="#portfolio">Daftar Produk</a></li>
                  <li><a class="dropdown-item " href="">Rekomendasi Produk</a></li>
                  <li><a class="dropdown-item " href="Home/Estimasi">Estimasi Produk</a></li>  
                </ul>
              </li>
            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
            
             <?php $berhasil=$this->session->userdata('login_user');
                    if (!isset($berhasil) || $berhasil !=true  ){
              ?> 
              
               <li><a  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="bi bi-box-arrow-in-right"></span>
               &nbsp; Daftar | Login</a></li>
              <?php }else{ ?>
               
                
                <li class="dropdown"><a href="#"><span>User : <?php echo $this->session->userdata('nama'); ?> </span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                 <li>
                    <a class="dropdown-item a"  href="user/Home">Dashboard</a>
                  </li>

                  <li>
                    <a class="dropdown-item a" Onclick="return confirm('apakah yakin ingin keluar ?');" href="Login_user/logout">Logout</a>
                  </li>

                </ul>
              </li>
              <?php 
              $id_pelanggan=$this->session->userdata('id_pelanggan'); 
              $total=$this->M_crud_transaki->tot_data_keranjang_pel($id_pelanggan)->row();
              ?>
              <li>
                <a href="Transaksi/Keranjang/<?php echo $id_pelanggan; ?> ">
                  <i class="bi bi-cart-fill btn btn-danger btn-sm">
                  <?php echo $total->total; ?>
                  </i>
                </a>
              </li>
             <?php } ?>
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
                      <input required type="text" class="form-control" id="recipient-name" name="email" placeholder="Email">
                  </div>
                  <br>
                  <div class="form-group">
                      <input required type="password" class="form-control" id="recipient-name" name="pass" placeholder="Password">
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
                      <input required type="text" class="form-control" id="recipient-name" name="nama" placeholder="nama">
                  </div>
                  <br>
                  <div class="form-group">
                      <select required class="form-control" name="jenis_kel">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                  <br>
                   <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input required type="date" class="form-control" id="recipient-name" name="tgl_lahir" placeholder="Tanggal Lahir">
                  </div>
                   <br>
                   <div class="form-group">
                      <label>Alamat</label>
                      <input required type="text" class="form-control" id="recipient-name" name="alamat" placeholder="Alamat">
                  </div>
                  <br>
                  <div class="form-group">
                      <label>No Telpon</label>
                      <input required type="number" class="form-control" id="recipient-name" name="no_telpon" placeholder="No Telpon">
                  </div>
                  <br>
                   <div class="form-group">
                      <label>Email</label>
                      <input required type="email" class="form-control" id="recipient-name" name="email" placeholder="Email">
                  </div>
                  <br>
                  <div class="form-group">
                      <input required type="password" class="form-control" id="recipient-name" name="pass" placeholder="Password">
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

