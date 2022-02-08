<!DOCTYPE html>
<html lang="en">
  <head>
      <?php $this->load->view('tools/head'); ?>
  </head>
 <body class="body">



<div style="padding:2%;">
    <div class="container" >
    <?php $this->load->view('tools/tampilan_header'); ?>
    <!-- menu atas -->
    <?php $this->load->view('tools/menu_atas'); ?>
    <!-- menu atas -->
    <!-- konten -->
    <div class="panel panel-default">

      <div class="panel-body">
          
          

            <div class="row">
          <!-- konten kiri  --> 
                <div class="col-md-8">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="font-size:18px;"><b>DATA LAPORAN</b></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                           
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>File</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $no=1; foreach($tampil_data_laporan->result()as $rs){?> 
                                    <tr class="odd gradeX">
                                          <td><?php echo $no ?></td>
                                        <td><?php echo $rs->nama_laporan; ?></td>
                                        <td><?php echo $rs->file; ?></td>
                                        <td><?php echo $rs->tgl; ?></td>
                                       <td><a href="data/laporan/<?php echo $rs->file; ?>" class="btn-sm btn-danger" target="_blank">Download</a></td>
                                    </tr>
                                  <?php $no++;   }?>            
                                </tbody>
                            </table>
                    </div>
                  </div>
                </div>
         <!-- konten kiri  -->     
         


          <!-- konten kanan  -->     
                <div class="col-md-4">
                   <?php foreach($tampil_data_baner->result()as $rs){?>
                    <a href="<?php echo $rs->link; ?>" title="<?php echo $rs->judul_baner; ?>" target="blank">
                      <img width="100%" src="img/gambar_baner/<?php echo $rs->gambar_baner; ?>" class="thumbnail">
                  </a>

                <?php } ?>
                 


                </div>
            <!-- konten kanan  --> 
              
            </div>


      </div>
    </div>
    <!-- konten -->

</div>

</div>


<!-- Footer -->
<nav class="navbar navbar-default " >
  <div class="container">
      <center>
      <h4 style="color:black ;">Copyright © 2020 Komisi Informasi Provinsi Jambi, All Rights Reserved</h4>
    </center>
  </div>
</nav>
<!-- Footer -->




 <?php $this->load->view('tools/js_footer'); ?>
  </body>
</html>