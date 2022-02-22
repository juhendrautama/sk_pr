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
                                       <form action="Transaksi/Simpan_data_keranjang" method="post" >
                                        <?php $id_pelanggan=$this->session->userdata('id_pelanggan');?>
                                        <?php  $id_produk=$tampil_produk_detail->id_produk; ?>
                                        <?php  $nama_produk=$tampil_produk_detail->nama_produk; ?>
                                        <?php $harga=$tampil_produk_detail->harga; ?>
                                        <input type="text" hidden name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                                        <input type="text" hidden name="id_produk" value="<?php echo $id_produk; ?>">
                                        <input type="text" hidden name="nama_produk" value="<?php echo $nama_produk; ?>">
                                        <input type="text" hidden name="jumlah_pesanan" value="1">
                                        <input type="text" hidden name="harga" value="<?php echo $harga; ?>">
                                        <button type="submit"  class="btn btn-success btn-sm" name="proses_keranjang">

                                            <i class="bi bi-cart3"></i> Beli
                                          </button>
                                       </form> 
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


 </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
 

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