
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
                            DATA  PRODUK
                              <hr>
                            <a   class="btn btn-info" href="#" data-toggle="modal" data-target="#myModal">
                            <i class="icon-edit icon-white"></i>TAMBAH DATA
                            </a>
                        </div>
                      

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Produk</h4>
      </div>
    <form action="adminpanel/Produk/Simpan_data" method="post" enctype="multipart/form-data">
      <div class="modal-body">

        
           
        <div class="row">
            <div class="form-group col-md-4" >
                <input type="text"   hidden  name="kode_produk"  value="<?php echo $kodeunik ?>">
            <input type="text" class="form-control" readonly  name="a"  value="B<?php echo $kodeunik ?>">
            </div>
        </div>

        <div class="row">
             <div class="form-group col-md-12">
                <input type="text" class="form-control" id="recipient-name" name="nama_produk" placeholder="NAMA PRODUK">
            </div>
        </div>    

        <div class="row">
            <div class="form-group col-md-12">
                <select class="form-control" name="id_kategori">
                    <option>Pilih Kategori</option>
                    <?php  foreach($tampil_data_kat_produk->result()as $rs){?> 
                    <option value="<?php echo $rs->id_kategori; ?>"><?php echo $rs->nama; ?></option>
                    <?php } ?>
                </select>                                                                       
            </div>
        </div>    
           
        <div class="row">   
            <div class="form-group col-md-12">
                <input type="number" class="form-control" id="recipient-name" name="stok" placeholder="Stok">
            </div>
        </div>    

        <div class="row">
            <div class="form-group col-md-12">
                <input type="number" class="form-control" id="recipient-name" name="harga" placeholder="Harga">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <input required type="file" class="form-control" id="recipient-name" name="userfile" >
            </div>
        </div>    

        <div class="row">
             <div class="form-group col-md-12"  class="form-control">
                <textarea name="keterangan">
                    
                </textarea>
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
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Tgl</th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $no=1; foreach($tampil_data_produk->result()as $rs){?> 
                                    <tr class="odd gradeX">
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $rs->nama_produk; ?></td>
                                        <td>
                                        <?php
                                            $aVar = mysqli_connect('localhost','root','','sk_pr');
                                            $id_kategori=$rs->id_kategori;
                                            $query = mysqli_query($aVar,"SELECT * FROM tbl_kategori_produk where id_kategori='$id_kategori'   ");
                                            $aName1 = mysqli_fetch_assoc($query);
                                            echo $nama_kategori=$aName1['nama']; 
                                         ?>
                                         </td>
                                        <td><?php echo $stok=$rs->stok; ?></td>
                                        <td><?php echo $hasil_rupiah = "Rp " . number_format($harga=$rs->harga,2,',','.');?></td>
                                        <?php $keterangan=$rs->keterangan; ?>
                                        <td><?php  echo date('d F Y', strtotime($rs->tgl_tambah)); ?></td>
                                        <td >
                                        <center>
                                        <a  href="#" class="btn-sm btn-primary"  data-toggle="modal" data-target="#m<?php echo $rs->id_produk; ?>">
                                        Ubah
                                        </a> 
                                        &nbsp;
                                        <a Onclick="return confirm('apakah yakin ingin di Hapus ?');" href="adminpanel/Produk/Hapus_data/<?php echo $rs->id_produk; ?>" class="btn-sm btn-danger">Hapus</a>
                                        </center> 

                                        </td>
                                    </tr>

<!-- Modal -->
<div class="modal fade" id="m<?php echo $rs->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Data Produk</h4>
      </div>
    <form action="adminpanel/Produk/Simpan_data_ubah" method="post">
      <div class="modal-body">

        
           
        <div class="row">
            <div class="form-group col-md-4" >
            <input type="text" hidden name="id_produk" value="<?php echo $rs->id_produk; ?>">   
            <input type="text"   hidden  name="kode_produk"  value="<?php echo $rs->kode_produk; ?>">
            <input type="text" class="form-control" readonly  name="a"  value="B<?php echo $rs->kode_produk; ?>">
            </div>
        </div>

        <div class="row">
             <div class="form-group col-md-12">
                <input type="text" class="form-control" id="recipient-name" name="nama_produk" placeholder="NAMA PRODUK" value="<?php echo $rs->nama_produk; ?>">
            </div>
        </div>    

        <div class="row">
            <div class="form-group col-md-12">
                <select class="form-control" name="id_kategori">
                    <option value="<?php echo $rs->id_kategori; ?>"><?php echo $nama_kategori; ?></option>
                    <?php  foreach($tampil_data_kat_produk->result()as $rs){?> 
                    <option value="<?php echo $rs->id_kategori; ?>"><?php echo $rs->nama; ?></option>
                    <?php } ?>
                </select>                                                                       
            </div>
        </div>    
           
        <div class="row">   
            <div class="form-group col-md-12">
                <input type="number" class="form-control" id="recipient-name" name="stok" placeholder="Stok" value="<?php echo $stok; ?>">
            </div>
        </div>    

        <div class="row">
            <div class="form-group col-md-12">
                <input type="number" class="form-control" id="recipient-name" name="harga" placeholder="Harga" value="<?php echo $harga; ?>">
            </div>
        </div>    

        <div class="row">
             <div class="form-group col-md-12"  class="form-control">
                <textarea name="keterangan">
                    <?php echo $keterangan; ?>
                </textarea>
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
