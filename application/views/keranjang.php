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
      <div class="container" >


  
<div class="row">

    <div class="col-md-9">     
      <div class="card">
        <div class="card-header bg-success" style="color:white;"><i class="bi bi-cart-fill "></i>Keranjang Belanja</div>
        <div class="card-body">
                        
<form action="Transaksi/Proses_beli" method="post">  
                             <table class="table table-bordered border-primary table-hover">
                              <tr style="font-size:15px;">
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Jumlah Pesanan</th>
                                
                                <th>Total Harga</th>
                              </tr>
                            
                              <?php
                              $grentot_pesanan=0;
                              $grento_total_harga=0;
                               $no=1; foreach($tampil_data_keranjang_pel->result()as $rs) {?>
                                

                              <tr style="font-size:12px;">
                                <td><?php echo $no ?></td>
                                 <td><?php echo $rs->nama_produk; ?></td>
                                   <td><?php echo $harga_rp= "Rp " . number_format($rs->harga,0,',','.'); ?></td>
                                 <td>
                                  <?php 
                                  //proses stok
                                      $id_produk = $rs->id_produk;
                                      $stok = $this->M_crud_produk->tampil_data_stok($id_produk)->row();
                                      $jumlah_pesanan = $rs->jumlah_pesanan;
                                      $stok_awal = $stok->stok;
                                      $stok_akhir = $stok_awal-$jumlah_pesanan;

                                      $harga = $rs->harga;
                                      $total_harga = $harga * $jumlah_pesanan;
                                   //proses stok  
                                   

                                    $grentot_pesanan=$grentot_pesanan + $jumlah_pesanan;
                                    $grento_total_harga=$grento_total_harga + $total_harga;
                                    
                                  ?>
                                 <?php echo $stok_akhir; ?>
                               </td>
                                 <td>
                                 <center>
                                  <form action="Transaksi/hitung_jumlah_pesanan" method="post">
                                    <input type="text" hidden name="id_keranjang" value="<?php echo $rs->id_keranjang; ?>"> 
                                   <input type="text" hidden name="id_pelanggan" value="<?php echo $rs->id_pelanggan; ?>"> 
                                   <input type="text" hidden name="id_produk" value="<?php echo $rs->id_produk; ?>"> 
                                   <input type="text" hidden name="jumlah_pesanan" value="<?php echo $rs->jumlah_pesanan; ?>"> 
                                  <?php if($jumlah_pesanan==0){ ?> 
                                  <button type="submit" name="kurang_1" disabled  class="btn btn-dark" style="padding:0px;">&nbsp; - &nbsp;
                                  </button>
                                <?php }else{ ?>
                                  <button type="submit" name="kurang_1"   class="btn btn-info" style="padding:0px;">&nbsp; - &nbsp;</button>
                                <?php } ?>

                                  &nbsp; <?php echo $rs->jumlah_pesanan; ?> &nbsp;

                                  <?php if($stok_akhir==0){ ?>  
                                  <button type="submit" name="tambah_1" disabled class="btn btn-dark" style="padding:0px;">&nbsp; + &nbsp;</button>
                                  <?php }else{ ?>                
                                  <button type="submit" name="tambah_1"  class="btn btn-info" style="padding:0px;">&nbsp; + &nbsp;</button>
                                  <?php } ?>
                                  
                                  </form> 
                                </center>
                                </td>
                               
                                 <td><?php echo $total_harga_rp= "Rp " . number_format($total_harga,0,',','.'); ?></td>
                              </tr>


                            <?php $no++; } ?>

                            <tr>
                              <td colspan="4">Gran total</td>
                              <td><center><?php echo $grentot_pesanan; ?> </center></td>
                              <td ><?php echo $grento_total_harga_rp="Rp " . number_format($grento_total_harga,0,',','.') ?></td>
                            </tr>

                             </table>   
              
        <button type="submit" name="btnbeli" class="btn btn-lg btn-danger" style="float:right;width:100%;font-size:20px;">Bayar Sekarang</button>
      </form>                 
                       
        </div>
      </div>
      <br>
    </div>

    <div class="col-md-3">  
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
                  $id_kategori= $rs->id_kategori;
                  $total=$this->M_crud_kat_produk->total_produk_id_kate($id_kategori)->row();
                  echo $total->total;


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