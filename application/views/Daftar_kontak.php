<!DOCTYPE html>
<html lang="en">
  <head>
        <?php $this->load->view('tools/head'); ?>
  </head>
  <body class="body">

<?php $this->load->view('tools/tampilan_header'); ?>
<!-- menu atas -->
  <?php $this->load->view('tools/menu_atas'); ?>
<!-- menu atas -->


<!-- konten -->
<div class="container">
	<center><h2>DAFTAR KONTAK</h2></center>
                      <hr>
            <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-body">

                     <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                           
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Kontak</th>
                                        <th>Isi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $no=1; foreach($tampil_data_kontak->result()as $rs){?> 
                                    <tr class="odd gradeX">
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $rs->nama_kontak; ?></td>
                                        <td><?php echo $rs->isi; ?></td>
                                       
                                    </tr>
                                  <?php $no++;   }?>            
                                </tbody>
                            </table>
                      
                    </div>
                  </div>
                </div>
            </div>

</div>
<!-- konten -->






<!-- Footer -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<nav class="navbar navbar-default" style="background:#00aecc; ">
  <div class="container">
      <center>
      <h4 style="color:white ;">Pesantren Tahfids Entrepreneur Cinta Qur’an Izzati Jannah</h4>
    </center>
  </div>
</nav>
<!-- Footer -->






















 <?php $this->load->view('tools/js_footer'); ?>
  </body>
</html>