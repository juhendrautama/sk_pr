
<!DOCTYPE html>
<html lang="en">

<head>

     <?php $this->load->view('admin/tools/head'); ?>

</head>

<body onload="window.print();" >

 

<table border="0" width="100%">
     <tr>
          <td width="120px">
               <tr>
                    <td colspan="3">

                                             
                         <table border="1" style=" width:240px ;" >
                              <tr >
                                   <td style="text-align:center;" > RUMAH ATAP HARMONI </td>
                              </tr>
                                        
                         </table>
                    </td>
                    <td width="125px">
                         <table border="0">
                              <tr>
                                   <td>Tanggal :  <?php echo date('d F Y', strtotime($tampil_pesanan_invoice->tanggal_pesan));  ?></td>
                                   
                              </tr>
                               <tr>
                                   
                                   <td>Kepada :  <?php 
                                   $id=$tampil_pesanan_invoice->id_pelanggan;
                                   $data_pelanggan=$this->M_crud_pelanggan->tampil_data_profil_user($id);
                                   ?>
                                   <?php echo $data_pelanggan->nama; ?> </td>
                                   
                              </tr>
                               <tr>
                                   <td>Sales : <?php echo $this->session->userdata('nama_admin'); ?></td>
                              </tr>
                         </table>
                          
                    </td>
                   
               </tr>
             
          </td>
     </tr>
</table>


<b><hr size="100px"></b>
<table border="1" width="100%">
     <tr >
          <th style="text-align:center;">No</th>
          <th style="text-align:center;">Kode Barang</th>
          <th style="text-align:center;">Nama Barang</th>
          <th style="text-align:center;">Quantity</th>
     </tr>
     <?php $no=1; $tot=0; foreach($tampil_detail_pesanan_invoice->result()as $rs){?> 
     <tr style="text-align:center;">
          <td><?php echo $no; ?></td>
          <td>
               <?php 
                    $id=$rs->id_produk;
                    $data_produk=$this->M_crud_produk->tampil_data_produk_detail($id);
                    echo $data_produk->kode_produk; 
               ?>
               
          </td>
          <td><?php echo $data_produk->nama_produk;  ?></td>
          <td><?php echo $tot=$tot+$rs->jumlah_pesanan; ?></td>
     </tr>
     <?php $no++; } ?>
     <tr>
          <td colspan="3">TOTAL : </td>
          <td align="center"><?php echo $tot; ?></td>
     </tr>
</table>
<br>

<table border="0" width="100%">
     <tr>
          <td>
               <p>Dibuat</p>
               <br><br><br>
               <p>Gudang</p>
          </td>

            <td>
               <p>Diketahui</p>
               <br><br><br>
               <p>Periksa</p>
          </td>

            <td width="320">
               <table>
               <?php 
                    $id=$tampil_pesanan_invoice->id_sopir;
                    $data_sopir=$this->M_crud_sopir->tampil_id_sopir($id);
                   
               ?>
               <tr>
                    <td>
                          Dicetak : <?php echo $this->session->userdata('nama'); ?><br>
                          Harga : Cash <br>
                          Supir : <?php echo $data_sopir->no_tlp;  ?>/<?php echo $data_sopir->plat ?> / <?php echo $data_sopir->nama; ?>

                    </td>
               </tr> 
               <tr>
                    <td><br>Sopir</td>
               </tr>
               </table>
          </td>

          <td><br><br><br>Penerima</td>
     </tr>
    
</table>


</body>

</html>
