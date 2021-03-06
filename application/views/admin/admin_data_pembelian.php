
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
                                 <?php $no_urut=1; foreach($tampil_data_pembelian->result()as $rs){?> 
                                    <tr class="odd gradeX" style="font-size:11px; text-align: center; ">
                                        <td><?php echo $no_urut; ?></td>
                                        <td><?php echo $rs->kode_pesanan; ?></td>
                                        <td><?php echo $rs->jumlah_pesan; ?></td>
                                        <td><?php echo $hasil_rupiah = "Rp " . number_format($harga=$rs->total_harga,2,',','.');?></td>
                                        <td><?php  echo date('d F Y', strtotime($rs->tanggal_pesan)); ?></td>
                                        <td><?php echo $rs->status; ?></td>
                                        <td>
                                        <center>
                                        <?php if($rs->status=='Di Terima'){ ?> 
                                       <a  href="#" class="btn-sm btn-primary" style="text-decoration:none" data-toggle="modal" data-target="#m2<?php echo $rs->kode_pesanan; ?>">
                                        <span class="glyphicon glyphicon-send"></span> 
                                        Kirim Pesanan
                                        </a>   
                                        <?php }else if($rs->status=='Di Tolak'){ ?>   
                                        <a   class="btn btn-sm btn-warning" style="text-decoration:none" disabled="disabled">
                                        Ditolak
                                        </a> 
                                         <?php }else if($rs->status=='Pemabayaran Terverifikasi'){ ?>      
                                        <a  href="#" class="btn-sm btn-danger" style="text-decoration:none" data-toggle="modal" data-target="#m<?php echo $rs->kode_pesanan; ?>">
                                        Konfirmasi Ulang
                                        </a>
                                       <?php }else if($rs->status=='Di Kirim'){ ?> 

                                            <?php if($rs->kode_invoice==''){ ?>
                                                <a  href="#"  class="btn-sm btn-success" style="text-decoration:none" data-toggle="modal" data-target="#m3<?php echo $rs->kode_pesanan; ?>">
                                                Proses Input No Invoice
                                                </a>   
                                            <?php }else{ ?>    
                                                <a  href="adminpanel/Data_pembelian/Cetak_invoice/<?php echo $rs->kode_pesanan; ?>" target="_blank" class="btn-sm btn-success" style="text-decoration:none">
                                                <span class="glyphicon glyphicon-print"></span>
                                                                  
                                                 Cetak Invoice
                                                </a>
                                            <?php } ?>
                                    <?php }else if($rs->status=='Selesai'){ ?>
                                       <a   class="btn btn-sm btn-warning" style="text-decoration:none" disabled="disabled">
                                        Proses Selesai
                                        </a> 
                                       <?php }else{ ?>
                                         <a  href="#" class="btn-sm btn-danger" style="text-decoration:none" data-toggle="modal" data-target="#m<?php echo $rs->kode_pesanan; ?>">
                                        Konfirmasi
                                        </a>
                                        <?php } ?>
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
                 <input type="text" hidden  name="kode_pesanan"  value="<?php echo $rs->kode_pesanan; ?>">
                <input type="text" class="form-control" readonly  name="a"  value="B<?php echo $kodepesanan=$rs->kode_pesanan; ?>">
            </div>
            
        </div>
        <hr>
        <label>Detail pesanan</label>

        <ol>
        <?php $tampil_detail_pesanan_user=$this->M_crud_produk->tampil_detail_pesanan_user($kodepesanan);?>

        <?php
        $grentot_pesanan=0;
        $grento_total_harga=0;
        $no=1; 
        foreach($tampil_detail_pesanan_user->result()as $rs2){ ?> 

            <li>
                <?php echo $rs2->nama_produk; ?> : <?php echo $pesanan=$rs2->jumlah_pesanan; ?>, Harga : <?php echo $hasil_rupiah = "Rp " . number_format($rs2->harga,0,',','.');?>
                <?php $harga=$rs2->harga * $pesanan ?>
                
            </li>
            <?php 

                $grentot_pesanan=$grentot_pesanan + $pesanan;
                $grento_total_harga=$grento_total_harga + $harga;

             ?>
    <?php } ?>
            <hr>
            Total Pesanan : <?php echo $grentot_pesanan; ?><br>
            Total Harga : <?php echo $hasil_rupiah2 = "Rp " . number_format($grento_total_harga,0,',','.');?>
            <hr>
            <a href="img/bukti_bayar/<?php echo $rs->bukti_pembayaran; ?>" target="_blank" class="btn btn-success" >Lihat Bukti Pembayaran</a>
        </ol>
            
           
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
        <h4 class="modal-title" id="myModalLabel">PROSES PENGIRIMAN BARANG</h4>
      </div>
  
      <div class="modal-body">
<form action="adminpanel/Data_pembelian/Proses_kirim_barang" method="post">
    <input type="text" hidden name="id_pesanan" value="<?php echo $rs->id_pesanan; ?>">   
    <input type="text"   hidden  name="id_pelanggan"  value="<?php echo $rs->id_pelanggan; ?>">
    <input type="text" hidden  name="kode_pesanan"  value="<?php echo $rs->kode_pesanan; ?>">
        <div class="row">
            <div class="form-group col-md-12">
                
                <select name="id_sopir" class="form-control">
                    <option value="">Pilih Sopir</option>
                    
                    <?php foreach($tampil_data_sopir->result() as $data_sopir){ ?>
                        <?php if($data_sopir->status=='1'){ ?>   
                         <option value="<?php echo $data_sopir->id_sopir; ?>"><?php echo $data_sopir->nama; ?></option>
                    <?php }else if($data_sopir->status=='2'){}?>
                    
                    <?php } ?>    
                </select>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" name="proses"><span class="glyphicon glyphicon-send"></span> KIRIM</button>
      </div>
</form>
      </div>  

    </div>
  </div>
</div>
<!-- Modal 2 -->  

<!-- Modal 3 -->
<div class="modal fade" id="m3<?php echo $rs->kode_pesanan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PROSES INPUT NO INVOICE</h4>
      </div>
  
      <div class="modal-body">
<form action="adminpanel/Data_pembelian/Proses_input_no_invoice" method="post">
    <input type="text" hidden name="id_pesanan" value="<?php echo $rs->id_pesanan; ?>">   
    <input type="text"   hidden  name="id_pelanggan"  value="<?php echo $rs->id_pelanggan; ?>">
    <input type="text" hidden  name="kode_pesanan"  value="<?php echo $rs->kode_pesanan; ?>">
        <div class="row">
            <div class="form-group col-md-12">
             <input required type="text" readonly class="form-control" name="kode_invoice" placeholder="Kode Invoice" value="HTL <?php echo date('Y') ?>.<?php echo date('m'); ?>.<?php echo $buat_kode_invoice; ?>">
             <input type="text" hidden name="no_urut_kode_invoice" value="<?php echo $buat_kode_invoice; ?>">
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" name="proses">SUBMIT</button>
      </div>
</form>
      </div>  

    </div>
  </div>
</div>
<!-- Modal 3 --> 



                                  <?php $no_urut++;   }?>            
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
