
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
<center>
LAPORAN PELANGGAN </center>
<?php $tgl1=$this->uri->segment('4'); ?> <?php $tgl2=$this->uri->segment('5'); ?>
TANGGAL : <?php  echo date('d F Y', strtotime($tgl1)); ?> - <?php  echo date('d F Y', strtotime($tgl2)); ?>
<br>
<table width="100%" border="1" style="border-bottom:1px black solid; border-top:1px black solid; border-width:2px;">
    <tr style="font-size:11px; border-bottom:1px black solid; border-top:1px black solid; border-width:2px; ">
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telpon</th>
        <th>Email</th>    
    </tr>
    <?php $no=1; foreach($cetak_laporan_pelanggan->result()as $rs){?>
    <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $rs->nama; ?></td>
    <td><?php echo $rs->alamat; ?></td>
    <td><?php echo $rs->no_telpon; ?></td>
    <td><?php echo $rs->email; ?></td>
    </tr>
    <?php $no++; } ?>
                                
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
