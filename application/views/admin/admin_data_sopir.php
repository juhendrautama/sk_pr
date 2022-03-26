
<!DOCTYPE html>
<html lang="en">

<head>

     <?php $this->load->view('admin/tools/head'); ?>

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
                            DATA SOPIR
                              <hr>
                            <a  style="text-decoration:none" class="btn btn-info" href="#" data-toggle="modal" data-target="#myModal">
                            <i class="icon-edit icon-white"></i>TAMBAH DATA
                            </a>
                        </div>
                      

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Sopir</h4>
      </div>
    <form action="adminpanel/Data_sopir/Simpan_data" method="post">
      <div class="modal-body">

        <div class="row">
             <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="recipient-name" name="nama" placeholder="NAMA ">
            </div>
             <div class="col-md-12 form-group">
                <input type="number" class="form-control" id="recipient-name" name="no_tlp" placeholder="NO TELPON ">
            </div>
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="recipient-name" name="plat" placeholder="PLAT ">
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

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                           
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Telpon</th>
                                        <th>Plat</th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $no=1; foreach($tampil_data_sopir->result()as $rs){?> 
                                    <tr class="odd gradeX">
                                     <td><?php echo $no ?></td>
                                     <td><?php echo $rs->nama; ?></td>
                                     <td><?php echo $rs->no_tlp; ?></td>
                                     <td><?php echo $rs->plat; ?></td>
                                     <td >
                                        <center>
                                        <a  style="text-decoration:none" href="#" class="btn-sm btn-primary"  data-toggle="modal" data-target="#m<?php echo $rs->id_sopir; ?>">
                                        Ubah
                                        </a> 
                                        &nbsp;
                                        <a style="text-decoration:none" Onclick="return confirm('apakah yakin ingin di Hapus ?');" href="adminpanel/Data_sopir/Hapus_data/<?php echo $rs->id_sopir; ?>" class="btn-sm btn-danger">Hapus</a>
                                        </center> 
                                     </td>
                                    </tr>

<!-- Modal -->
<div class="modal fade" id="m<?php echo $rs->id_sopir; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Data Sopir </h4>
      </div>
    <form action="adminpanel/Data_sopir/Simpan_data_ubah" method="post">
      <div class="modal-body">

        <input type="text"  name="id_sopir" hidden value="<?php echo $rs->id_sopir; ?>">

        <div class="row">
             <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="recipient-name" name="nama" placeholder="NAMA " value="<?php echo $rs->nama; ?>">
            </div>
             <div class="col-md-12 form-group">
                <input type="number" class="form-control" id="recipient-name" name="no_tlp" placeholder="NO TELPON " value="<?php echo $rs->no_tlp; ?>">
            </div>
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="recipient-name" name="plat" placeholder="PLAT " value="<?php echo $rs->plat; ?>">
            </div>
        </div>
           


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" name="proses">Ubah</button>
      </div>

    </form> 

    </div>
  </div>
</div>
<!-- Modal -->                                     



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
