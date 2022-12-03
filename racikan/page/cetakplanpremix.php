<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
<left>
<table width="75%" border="0">
  <tr> 
    <td align="center"><h1><em><strong>Cetak Planing Produksi Premix </strong></em></h1></td>
  </tr>
  <tr> 
    <td align="center"><p>PT RAJA ROTI CEMERLANG </p></td>
  </tr>
  <tr> 
    <td>________________________________________________________________________________________________________________________________________</td>
  </tr>
</table>
<p> 
  <?php 
	include "../config/koneksi.php";
	?>
</p>
<table width="1100" border="0">
  <tbody>
    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM premix where no='$_GET[no]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
    <tr> 
      <td width="248" height="28">No PLAN PROD PRX</td>
      <td width="183">: <?php echo "$r[planprx]"?></td>
      <td colspan="2"><div align="center">MENGETAHUI</div></td>
      <td colspan="2"><div align="center">DIKETAHUI</div></td>
      <td width="137">&nbsp;</td>
    </tr>
    <tr> 
      <td>NAMA PREMIX</td>
      <td>: <?php echo "$r[nm_rm]"?></td>
      <td width="91">&nbsp;</td>
      <td width="137">&nbsp;</td>
      <td width="137">&nbsp;</td>
      <td width="137">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>TANGGAL PRODUKSI</td>
      <td>: <?php echo TanggalIndo($r['tgl'])?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>JUMLAH LOT</td>
      <td>: <?php echo "$r[lot]"?> LOT</td>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>JUMLAH OUTPUT</td>
      <td>: <?php echo "$r[jumlah]"?> KG</td>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>TOTAL PER PACK</td>
      <td>: <?php echo "$r[total]"?> PACK</td>
      <td colspan="2"><div align="center"><strong><u>Kepala PREMIX</u></strong></div></td>
      <td colspan="2"><div align="center"><strong><u>Kepala Gudang</u></strong></div></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<font color="#FF3333"></font> 
 <?php 
	include "../config/koneksi.php";
	?>
</p>
		
		 <?php
					
                    $tampil=mysql_query("SELECT * FROM premix where no='$_GET[no]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
<p>_________________________________________________________________________________________________________________________________________</p>
 
<tbody>
<table width="56%" border="0">
  <tr> 
    <td width="30%" height="50" background="" bgcolor="#CCCC33" > 
<h3 align="center"><font face="Courier New, Courier, mono">Nama 
        Bahan Baku</font></h3></td>
    <td width="25%" bgcolor="#CCCC33" background="" > 
      <h3 align="center"><font face="Courier New, Courier, mono"><u>JUMLAH 
        (KG)</u></font></h3></td>
    <td width="27%" height="50" background="" bgcolor="#CCCC33" > 
      <h3 align="center"><font face="Courier New, Courier, mono">Nama 
        Bahan Baku</font></h3></td>
    <td width="18%" background="" bgcolor="#CCCC33" > 
      <h3 align="center"><font face="Courier New, Courier, mono"><u>JUMLAH 
        (KG)</u></font></h3></td>
  </tr>
  <tr> 
    <td height="41"><div align="center">RM A <?php// echo "$r[r1]"?></div></td>
    <td><?php echo "$r[jml1]"?></td>
    <td height="41"><div align="center">RM 17 <?php// echo "$r[r6]"?></div></td>
    <td><?php echo "$r[jml6]"?></td>
  </tr>
  <tr> 
    <td height="40"><div align="center">RM 15 <?php// echo "$r[r2]"?></div></td>
    <td><?php echo "$r[jml2]"?></td>
    <td height="40"><div align="center">RM 19 <?php// echo "$r[r7]"?></div></td>
    <td><?php echo "$r[jml7]"?></td>
  </tr>
  <tr> 
    <td height="40"><div align="center">RM 16 <?php// echo "$r[r3]"?></div></td>
    <td><?php echo "$r[jml3]"?></td>
    <td height="40"><div align="center">RM 18 <?php// echo "$r[r8]"?></div></td>
    <td><?php echo "$r[jml8]"?></td>
  </tr>
  <tr> 
    <td height="37"><div align="center">RM 20 <?php// echo "$r[r4]"?></div></td>
    <td><?php echo "$r[jml4]"?></td>
    <td height="37"><div align="center">RM 22 <?php// echo "$r[r9]"?></div></td>
    <td><?php echo "$r[jml9]"?></td>
  </tr>
  <tr> 
    <td height="37"><div align="center">RM 21 <?php// echo "$r[r5]"?></div></td>
    <td><?php echo "$r[jml5]"?></td>
    <td height="37"><div align="center">RM 23 <?php// echo "$r[r10]"?></div></td>
    <td><?php echo "$r[rm10]"?> PCS</td>
  </tr>
 
</table>
<font color="#0066CC" face="Verdana, Arial, Helvetica, sans-serif"></font>
<p>&nbsp;</p>
<?php
$no++;
	
					}
					}
		 
		  
		  ?></p>

