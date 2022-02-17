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
          <h3 class="section-title">DATA PEGAWAI</h3>
        </header>

  
<div class="row">

    <div class="col-md-12">     
      <div class="card">
        <div class="card-body">
              <div class="row " data-aos="fade-up" data-aos-delay="200">
                        

                             <table class="table table-bordered border-primary table-hover" >
                              <tr style="font-size:15px;">
                                <th>No</th>
                                <th>nip</th>
                                <th>Nama </th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                              </tr>
                              <?php $no =1; foreach($tampil_data_api as $rs) {?> 
                              <tr  style="font-size:12px;">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $rs->nip; ?></td>
                                <td><?php echo $rs->nama; ?></td>
                                <td><?php echo $rs->jenkel; ?></td>
                                <td><?php echo $rs->tgl_lahir; ?></td>
                                <td><?php echo $rs->golongan; ?></td>
                                <td><?php echo $rs->jabatan; ?></td>
                                <td><?php echo $rs->status_pegawai; ?></td>
                              </tr>
                              <?php $no++; } ?>
                              

                             </table>     
                                 
                             
                </div>
        </div>
      </div>
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