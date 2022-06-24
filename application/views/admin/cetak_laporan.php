
<!DOCTYPE html>
<html lang="en">

<head>

     <?php $this->load->view('admin/tools/head'); ?>

</head>

<body onload="window.print();" >
<img src="img/logo/logo.png" style="margin-right:500px;" >
             <center style="margin-top:-75px;">  
             <font style="font-size:25px; ">PT. HARMONI TRUSSINDO LESTARI</font> </br>     
             <font style="font-size:10px; margin-top:-600px;">JL H Adam Malik, Handil Jaya No. 81 , Jambi, Indonesia </font><br>
             <font style="font-size:10px; ">HP : 082398567789</font> 
             </center>

<b><hr size="100px"></b>
<center>LAPORAN PENJUALAN </center>
<br>
<?php $tgl1=$this->uri->segment('4'); ?> <?php $tgl2=$this->uri->segment('5'); ?>
TANGGAL : <?php  echo date('d F Y', strtotime($tgl1)); ?> - <?php  echo date('d F Y', strtotime($tgl2)); ?>
<br><br>
  <table width="100%" border="1" style="border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                    <tr style="font-size:11px; border-bottom:1px black solid; border-top:1px black solid; border-width:2px; ">
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">NO INVOICE</th>
                                        <th style="text-align:center;">TGL</th>
                                        <th  style="text-align:center;">NAMA PELANGGAN</th> 
                                        <th  style="text-align:center; height:1px;">DETAIL PESANAN</th>
                                        
                                    </tr>
                               
                                 <?php $no=1; $total_penjualan1=0; foreach($tampil_data_cari_laporan->result()as $rs){?>
                                <tr  style="font-size:11px; border-bottom:1px black solid; border-top:1px black solid; border-width:1px; ">
                                <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                        <p style="margin-top:-25px;"><?php echo $no ?></p>
                                    </td>
                                    <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                        <p style="margin-top:-25px;"><?php echo $rs->kode_invoice; ?></p>
                                    </td>
                                    <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
                                        <p style="margin-top:-25px;"><?php echo $rs->tgl_invoice; ?></p>
                                    </td>
                                    <td style="text-align:center; border-bottom:1px black solid; border-top:1px black solid; border-left:-5px; border-width:2px;">
                                    <p style="margin-top:-25px;">
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
                                            <font style="margin-left:500px; ">
                                                <?php echo 'Rp.'.$total_penjualan=number_format($total_penjualan1,0,',','.'); ?>
                                            </font>   
                                            </b>
                                        </td>
                                  </tr>
                                 
                            </table>
                            <br>
<div style="margin-left:20px;">
<table>
    <tr>
        <td align="center">Dibuat</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
        <td align="center">Diketahui</td>
    </tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr>
        <td align="center">____________</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="center">____________</td>
    </tr>

    <tr>
        
    </tr>
</table>
</div>



</body>

</html>
