
<!DOCTYPE html>
<html lang="en">

<head>

     <?php $this->load->view('admin/tools/head'); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="adminpanel/Home">PT Harmoni Trussindo Lestari</a>
            </div>
            <!-- /.navbar-header -->

             <?php $this->load->view('admin/tools/menu_atas'); ?>
            <?php $this->load->view('admin/tools/menu_samping'); ?>
     </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pembelian 
                        </div>
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                           
                                <thead>
                                    <tr style="font-size:11px; text-align: center;">
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Status</th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $no=1; foreach($tampil_data_pembelian->result()as $rs){?> 
                                    <tr class="odd gradeX" style="font-size:11px; text-align: center;">
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $rs->kode_pesanan; ?></td>
                                        <td><?php echo $rs->jumlah_pesan; ?></td>
                                        <td><?php echo $hasil_rupiah = "Rp " . number_format($harga=$rs->total_harga,2,',','.');?></td>
                                        <td><?php  echo date('d F Y', strtotime($rs->tanggal_pesan)); ?></td>
                                        <td><?php echo $rs->status; ?></td>
                                        <td>
                                        <center>
                                        <a  href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#m<?php echo $rs->kode_pesanan; ?>">
                                        Konfirmasi
                                        </a> 
                                        </center> 

                                        </td>
                                    </tr>

<!-- Modal -->
<div class="modal fade" id="m<?php echo $rs->kode_pesanan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">KONFIRMASI PEMBELIAN</h4>
      </div>
    <form action="adminpanel/Data_pembelian/Simpan_data_konfirmasi" method="post">
      <div class="modal-body">
        <label>Kode Pesanan</label>
        <div class="row">
            <div class="form-group col-md-4" >
                <input type="text" hidden name="id_pesanan" value="<?php echo $rs->id_pesanan; ?>">   
                <input type="text"   hidden  name="id_pelanggan"  value="<?php echo $rs->id_pelanggan; ?>">
                <input type="text" class="form-control" readonly  name="a"  value="B<?php echo $rs->kode_pesanan; ?>">
            </div>
            <div class="form-group col-md-4">
                 <a href="img/bukti_bayar/<?php echo $rs->bukti_pembayaran; ?>" target="_blank" class="btn btn-success" >Lihat Bukti Pembayaran</a>
            </div>
        </div>

            
           
        <hr>

        <div class="row">
            <div class="form-group col-md-12">
                <select required class="form-control" name="status">
                    <option value="">Status</option>
                    
                    <option value="Di Terima">Di Terima</option>
                    <option value="Di Tolak">Di Tolak</option>
                    
                </select>                                                                       
            </div>
        </div>      
        
           

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" name="proses">Simpan</button>
      </div>

    </form> 

    </div>
  </div>
</div>
<!-- Modal -->  


<!-- Modal 2 -->
<div class="modal fade" id="m2<?php echo $rs->kode_pesanan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bukti Pembelian</h4>
      </div>
  
      <div class="modal-body">

      </div>  

    </div>
  </div>
</div>
<!-- Modal 2 -->  




                                  <?php $no++;   }?>            
                                </tbody>
                            </table>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
         
                           
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="tmp_admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="tmp_admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="tmp_admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="tmp_admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="tmp_admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="tmp_admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="tmp_admin/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
