<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
<left>
<table width="75%" border="0">
  <tr> 
    <td align="center"><h1><em><strong>Cetak Data Potong Stok Finish Good </strong></em></h1></td>
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
                    $tampil=mysql_query("SELECT * FROM verifikasifgout where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
    <tr> 
      <td width="247" height="28">No SO </td>
      <td width="384">: <?php echo "$r[no_so]"?></td>
      <td colspan="2"><div align="center">MENGETAHUI</div></td>
      <td colspan="2"><div align="center">DIKETAHUI</div></td>
      <td width="65">&nbsp;</td>
    </tr>
    <tr> 
      <td>SO EXT</td>
      <td>: <?php echo "$r[so_ext]"?></td>
      <td width="43">&nbsp;</td>
      <td width="161">&nbsp;</td>
      <td width="30">&nbsp;</td>
      <td width="140">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>TANGGAL SO </td>
      <td>: <?php echo TanggalIndo($r['tgl'])?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21">NAMA CUSTOMER </td>
      <td>: <?php echo "$r[nm_cust]"?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21">&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><div align="center"><strong><u>Logistik</u></strong></div></td>
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
					
                    $tampil=mysql_query("SELECT * FROM verifikasifgout where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
<p>_________________________________________________________________________________________________________________________________________</p>
 
<tbody>
<table width="959" height="150" border="1">
  <tr>
    <td width="265" height="42" bgcolor="#CCCC33"><h3 align="center"><strong><font face="Courier New, Courier, mono"><u>NAMA PRODUK </u></font></strong></h3></td>
    <td width="222" bgcolor="#CCCC33"><h3 align="center"><strong><font face="Courier New, Courier, mono"><u>JUMLAH STOK TERPOTONG (Zak)</u></font></strong></h3></td>
    <td width="190" bgcolor="#CCCC33"><h3 align="center"><strong><font face="Courier New, Courier, mono"><u>EXP STOK</u></font></strong></h3></td>
  
  </tr>
  <tr>
    <td height="25"><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[nm_fg1]"?></font></div></td>
    <td><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[qty1]"?></font></div></td>
    <td><div align="center"><font face="Courier New, Courier, mono"><?php echo TanggalIndo($r['exp1'])?></font></div></td>
    <
  </tr>
  <tr>
   <td height="25"><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[nm_fg2]"?></font></div></td>
     <td><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[qty2]"?></font></div></td>
    <td><div align="center"><font face="Courier New, Courier, mono"><?php echo TanggalIndo($r['exp2'])?></font></div></td>
  </tr>
  <tr>
   <td height="25"><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[nm_fg3]"?></font></div></td>
     <td><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[qty3]"?></font></div></td>
    <td><div align="center"><font face="Courier New, Courier, mono"><?php echo TanggalIndo($r['exp3'])?></font></div></td>
  </tr>
  <tr>
   <td height="25"><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[nm_fg4]"?></font></div></td>
    <td><div align="center"><font face="Courier New, Courier, mono"><?php echo "$r[qty4]"?></font></div></td>
    <td><div align="center"><font face="Courier New, Courier, mono"><?php echo TanggalIndo($r['exp4'])?></font></div></td>
  </tr>
</table>
<font color="#0066CC" face="Verdana, Arial, Helvetica, sans-serif"></font>
<p>&nbsp;</p>
<?php
$no++;
	
					}
					}
		 
		  
		  ?></p>

