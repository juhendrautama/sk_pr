
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
                            Profil
                        </div>
                        <!-- panel heding -->



                        <!-- /.panel-body -->
                        <div class="panel-body">
                            <form action="user/Home/Simpan_ubah" method="post" enctype="multipart">
                                
                           <input type="text" hidden name="id_pelanggan" value="<?php echo $tampil_data_profil_user->id_pelanggan; ?>">

                           <div class="row">                               
                                <div class="col-md-6">
                                    <label>Nama</label>
                                   <input type="text" name="nama" class="form-control" value="<?php echo $tampil_data_profil_user->nama; ?>" placeholder="NAMA">
                               </div>
                                <div class="col-md-3">
                                   <label>jenis kelamin</label> 
                                   <select required name="jenis_kel" class="form-control">
                                       
                                       <?php if($tampil_data_profil_user->jenis_kel=='Laki-Laki'){ ?>
                                        <option  value="">Pilih</option>
                                        <option  selected value="Laki-Laki">Laki-Laki</option>
                                        <option  value="Perempuan">Perempuan</option>
                                        <?php }else if($tampil_data_profil_user->jenis_kel=='Perempuan'){ ?>
                                        <option  value="">Pilih</option>
                                        <option  value="Laki-Laki">Laki-Laki</option>
                                        <option  selected value="Perempuan">Perempuan</option> 
                                        <?php }else{ ?>   
                                        <option  selected value="">Pilih</option>
                                        <option  value="Laki-Laki">Laki-Laki</option>
                                        <option  value="Perempuan">Perempuan</option> 
                                        <?php } ?>    
                                   </select>
                               </div>
                               <div class="col-md-3">
                                    <label>Tanggal Lahir</label>
                                   <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $tampil_data_profil_user->tgl_lahir; ?>" placeholder="tgl lahir">
                               </div>
                            </div>
                            <br>
                            <div class="row">                               
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                   <input type="text" name="alamat" class="form-control" value="<?php echo $tampil_data_profil_user->alamat; ?>" placeholder="Alamat">
                               </div>
                                <div class="col-md-6">
                                    <label>No Telpon</label>
                                   <input type="text" name="no_telpon" class="form-control" value="<?php echo $tampil_data_profil_user->no_telpon; ?>" placeholder="No Telpon">
                               </div>
                              
                           </div>
                           <br>
                           <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                   <input type="text" name="email" class="form-control" value="<?php echo $tampil_data_profil_user->email; ?>" placeholder="Alamat">
                               </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                   <input type="password" name="pass" class="form-control form-password" value="<?php echo $tampil_data_profil_user->pass_samaran; ?>" placeholder="Password">
                                   <input type="checkbox" class="form-checkbox"> Show password
                               </div>
                           </div>
                          <br>

                          <div class="row">
                              <div class="col-md-12">
                                  <input type="submit" class="form-control btn-danger" name="proses" value="UBAH">
                              </div>
                          </div>

                         </form>  
                         
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

    <script type="text/javascript">
    $(document).ready(function(){       
        $('.form-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.form-password').attr('type','text');
            }else{
                $('.form-password').attr('type','password');
            }
        });
    });
</script>

</body>

</html>
