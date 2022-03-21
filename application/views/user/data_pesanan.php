
<!DOCTYPE html>
<html lang="en">

<head>

     <?php $this->load->view('user/tools/head'); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="user/Home">PT Harmoni Trussindo Lestari</a>
            </div>
            <!-- /.navbar-header -->

              <?php $this->load->view('user/tools/menu_atas'); ?>
            <?php $this->load->view('user/tools/menu_samping'); ?>
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
                        <!-- panel heding -->
                        <div class="panel-heading">
                            <i class="fa fa-shopping-bag"></i> DATA PESANAN
                        </div>
                        <!-- panel heding -->



                        <!-- /.panel-body -->
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
                                 <?php $no=1; foreach($tampil_data_pesanan_user->result()as $rs){?> 
                                    <tr class="odd gradeX" style="font-size:11px; text-align: center;">
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $rs->kode_pesanan; ?></td>
                                        <td><?php echo $rs->jumlah_pesan; ?></td>
                                        <td><?php echo $hasil_rupiah = "Rp " . number_format($harga=$rs->total_harga,2,',','.');?></td>
                                        <td><?php  echo date('d F Y', strtotime($rs->tanggal_pesan)); ?></td>
                                        <td>
                                            
                                            <?php if($rs->status=='Di Tolak'){ ?>
                                            <p style="color:red;">DATA PEMBAYARAN TIDAK SESUI</p>
                                            <?php }else{ ?>
                                            <?php echo $rs->status; ?>
                                            <?php } ?>    
                                        </td>
                                        <td>
                                        <center>
                                         <?php if($rs->status=='Di Tolak'){ ?>
                                        <a  href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#m<?php echo $rs->kode_pesanan; ?>">
                                        Kirim Ulang
                                        </a>
                                        &nbsp;
                                         <?php }else{} ?>     
                                        <a  href="user/Home/Detail_pesanan/<?php echo $rs->kode_pesanan; ?>" class="btn-sm btn-primary">
                                        Detail
                                        </a> 
                                        </center> 

                                        </td>
                                    </tr>


<!-- Modal 1 -->
<div class="modal fade" id="m<?php echo $rs->kode_pesanan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PROSES KIRIM ULANG</h4>
      </div>
  
      <div class="modal-body">
<form action="Transaksi/Kirim_ulang" method="post" enctype="multipart/form-data">
    <input type="text" hidden name="id_pesanan" value="<?php echo $rs->id_pesanan; ?>">   
    <input type="text"   hidden  name="id_pelanggan"  value="<?php echo $rs->id_pelanggan; ?>">
    <input type="text" hidden  name="kode_pesanan"  value="<?php echo $rs->kode_pesanan; ?>">
        <div class="row">
            <div class="form-group col-md-12">
            <label>Bukti Pembayaran</label>
              <input  type="file" required name="userfile" class="form-control" value="">
              <b style="font-size:12px;">Format FDF</b>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"   class="btn btn-primary" name="proses">SUBMIT</button>
      </div>
</form>
      </div>  

    </div>
  </div>
</div>
<!-- Modal 1 -->  



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
