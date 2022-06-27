
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
                        <hr>    
                        <center><h3>LAPORAN PELANGGAN</h3></center>
                        <hr>   
                    <form method="post" action="adminpanel/Laporan/Pelanggan">
                        <table>
                            <tr>
                                <td><label>Tanggal Daftar</label> </td>
                                <td>:</td>
                                <?php if (isset($_POST['proses'])){ ?>
                                <td><input type="date" class="form-control" name="tgl1" value="<?php echo $_POST['tgl1'] ?>"></td>
                                <td >&nbsp; <b>-</b>&nbsp; </td>
                                <td><input type="date" class="form-control" name="tgl2" value="<?php echo $_POST['tgl2'] ?>"></td>
                                <?php }else{ ?>
                                <td><input type="date" class="form-control" name="tgl1" value=""></td>
                                <td >&nbsp; <b>-</b>&nbsp; </td>
                                <td><input type="date" class="form-control" name="tgl2" value=""></td> 
                                <?php } ?>   
                                <td> &nbsp;</td>
                                <td><input type="submit" class="btn btn-primary btn-sm" name="proses" value="GO"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                                <th>Email</th>
                            </tr>
                        </thead>  
                        
                        <?php if(isset($_POST['proses'])){  $tgl1=$_POST['tgl1']; $tgl2=$_POST['tgl2'];?>  
                            <?php $no=1; foreach($tampil_data_pelanggan_lap->result()as $rs){?> 
                            <tbody>
                            <tr class="odd gradeX">
                                <td><?php echo $no ?></td>
                                <td><?php echo $rs->nama; ?></td>
                                <td><?php echo $rs->alamat; ?></td>
                                <td><?php echo $rs->no_telpon; ?></td>
                                <td><?php echo $rs->email; ?></td>
                            </tr>
                            </tbody> 
                            <?php $no++; } ?>
                        <?php }else{ ?> 
                            <tbody>
                            <tr class="odd gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> 
                            </tbody> 
                        <?php  } ?>      
                                            
                        </tbody>       

                        </table>           
                           
                        <br>
                        <?php if (isset($_POST['proses'])){  ?>
                        <a target="_blank" style="margin-left:93%;" href="adminpanel/Laporan/Cetak_laporan_pelanggan/<?php echo $tgl1; ?>/<?php echo $tgl2; ?> " class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-print"></span>    
                            Cetak
                        </a>
                        <?php }else{} ?>
                          
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
   

</body>

</html>
