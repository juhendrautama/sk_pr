
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
                    <form method="post" action="adminpanel/Laporan/Cari">
                        <table>
                           
                            <tr>
                                <td><label>Tanggal</label> </td>
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
                            <table width="100%" border="1" style="border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                    <tr style="font-size:11px; border-bottom:1px black solid; border-top:1px black solid; border-width:2px; ">
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">NO INVOICE</th>
                                        <th style="text-align:center;">TGL</th>
                                        <th  style="text-align:center;">NAMA PELANGGAN</th> 
                                        <th  style="text-align:center; height:1px;">DETAIL PESANAN</th>
                                        
                                    </tr>
                                 <?php if (isset($_POST['proses'])){  $tgl1=$_POST['tgl1']; $tgl2=$_POST['tgl2']; $a=$tampil_data_cari_laporan; }else{ $a='0'; } ?>   

                                 <?php if(isset($_POST['proses'])){ ?>
                                 <?php $no=1; $total_penjualan1=0; foreach($tampil_data_cari_laporan->result()as $rs){?>
                                <tr  style="font-size:11px; border-bottom:1px black solid; border-top:1px black solid; border-width:1px; ">
                                <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                        <p style="margin-top:-38px;"><?php echo $no ?></p>
                                    </td>
                                    <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                        <p style="margin-top:-38px;"><?php echo $rs->kode_invoice; ?></p>
                                    </td>
                                    <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                        <p style="margin-top:-38px;"><?php echo $rs->tgl_invoice; ?></p>
                                    </td>
                                    <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-left:-5px; border-width:2px;">
                                    <p style="margin-top:-38px;">
                                       <?php $id=$rs->id_pelanggan; ?>
                                       <?php $datapelanggan=$this->M_crud_pelanggan->tampil_data_profil_user($id); ?>
                                       <?php echo $datapelanggan->nama; ?>
                                    </p>
                                    </td>
                                    <td>
                                            <table border="1" style=" border-bottom:1px black solid; border-top:1px  solid; border-width:0px;" width="100%"  >
                                               <tr >
                                                    <th style="text-align:center;" >KODE BARANG</th>
                                                    <th style="text-align:center;">NAMA ITEM</th>
                                                    <th style="text-align:center;">QTY</th>
                                                    <th style="text-align:center;">HARGA</th>
                                                    <th style="text-align:center;">TOTAL</th>
                                                </tr>

                                                <?php $id=$rs->kode_pesanan ?>
                                                <?php $tampil_detail_pesanan=$this->M_crud_produk->tampil_detail_pesanan_invoice($id); ?>
                                                <?php $subtotal=0; foreach($tampil_detail_pesanan->result()as $rs2){?>
                                                    <tr>
                                                        <td  style="text-align:center;" >
                                                        <?php  $id_produk=$rs2->id_produk ?>
                                                        <?php $databarang=$this->M_crud_produk->tampil_data_produk_id($id_produk)->row(); ?>
                                                        <?php echo $databarang->kode_produk; ?>
                                                        </td>
                                                        <td><?php echo $rs2->nama_produk ?></td>
                                                        <td  style="text-align:center;"><?php echo $jum_pesanan=$rs2->jumlah_pesanan ?></td>
                                                        <td >
                                                            <?php  $harga=$rs2->harga ?>
                                                            <?php echo'Rp.'.$harga2=number_format($harga,0,',','.'); ?>
                                                        </td>
                                                        <td >
                                                            <?php  $harga_tot=$jum_pesanan * $harga;  ?>
                                                            <?php echo'Rp.'. $harga_tot2=number_format($harga_tot,0,',','.'); ?>
                                                        </td>
                                                        <?php $subtotal=$subtotal+$harga_tot ?>
                                                    </tr>

                                                <?php } ?>  
                                                    <tr>
                                                        <td colspan="4">Sub Total</td>
                                                        <td><b><?php echo'Rp.'. $subtotal1=number_format($subtotal,0,',','.');?></b></td>
                                                        <?php $total_penjualan1=$total_penjualan1+$subtotal; ?>
                                                    </tr>
                                                                                                 
                                            </table>
                                                    </td> 

                                    </tr>
                                  <?php $no++;   }?> 
                                  <tr style="font-size:11px; ">
                                        <td colspan="4">TOTAL PENJUALAN</td>
                                        <td > 
                                            <b>                                          
                                            <font style="margin-left:606px; ">
                                                <?php echo 'Rp.'.$total_penjualan=number_format($total_penjualan1,0,',','.'); ?>
                                            </font>   
                                            </b>
                                        </td>
                                  </tr>
                                 
                                  <?php }else{} ?>
                            </table>
                            <br>
                        <?php if (isset($_POST['proses'])){  ?>
                        <a target="_blank" style="margin-left:93%;" href="adminpanel/Laporan/Cetak_laporan/<?php echo $tgl1; ?>/<?php echo $tgl2; ?> " class="btn btn-success btn-sm">
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
