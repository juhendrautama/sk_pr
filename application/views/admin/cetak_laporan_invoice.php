
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
<center>LAPORAN INVOICE </center>
<br>
<div style="margin-left:650px;">
    <table>
        <tr>
            <td>Tanggal : </td><td><?php echo $tampil_data_invoice->tgl_invoice; ?></td>
        </tr>
        <tr>
            <td>Kepada : </td>
            <td>
                <?php  
                    $id_pelanggan=$tampil_data_invoice->id_pelanggan;
                    $data_pelanggan=$this->M_crud_pelanggan->tampil_data_pelanggan_id($id_pelanggan)->row();
                   echo $data_pelanggan->nama;
                 ?>
            </td>
        </tr>
        <tr>
            <td>Sales : </td> <td> <?php echo $this->session->userdata('nama_admin'); ?> </td>
        </tr>
    </table>
</div>
<br>
<div style="margin-left:10px;">
    <table>
        <tr>
            <td>No Faktur : </td><td><?php echo $tampil_data_invoice->kode_invoice; ?></td>
        </tr>
    </table>
</div>
<br>
<table width="100%" border="1" style="border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
    <tr style="font-size:11px; border-bottom:1px black solid; border-top:1px black solid; border-width:2px; ">
        <th>No</th>
        <th>Nama Barang</th>
        <th>Quantity</th>
        <th>Harga</th>
        <th>Jumlah</th>    
    </tr>
    <?php $no=1; $tot_jum=0; $tot_harga=0; $tot_hasil=0; foreach($tampil_data_pesanan->result()as $rs){?>
    <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $rs->nama_produk; ?></td>
    <td><?php echo $jum=$rs->jumlah_pesanan; ?></td>
    <td><?php  $harga=$rs->harga; ?>
    <?php echo $total_harga = "Rp " . number_format($rs->harga,0,',','.');?>
</td>
    <td><?php  $hasil=$harga * $jum; ?>
    <?php echo $hasil2 = "Rp " . number_format($hasil,0,',','.');?>
</td>
    </tr>
    <?php $no++; } ?>
    <tr>
        <td colspan="2" align="center">Jumlah</td>
        <td><?php echo $tot_jum=$tot_jum+$jum; ?></td>
        <td><?php  $tot_harga=$tot_harga+$harga; ?>
        <?php echo $tot_harga2 = "Rp " . number_format($tot_harga,0,',','.');?>
    </td>
        <td><?php   $tot_hasil=$tot_hasil+$hasil; ?>
        <?php echo $tot_hasil2 = "Rp " . number_format($tot_hasil,0,',','.');?>
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
