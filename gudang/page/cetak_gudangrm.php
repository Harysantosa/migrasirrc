<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
<left>
<table width="75%" border="0">
  <tr> 
    <td align="center"><h1><em><strong>Rekap verifikasi Raw Material Keluar</strong></em></h1></td>
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
                    $tampil=mysql_query("SELECT * FROM rakapcutrm where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
    <tr> 
      <td width="248" height="28"></td>
      <td width="183"></td>
      <td colspan="2"><div align="center">MENGETAHUI</div></td>
      <td colspan="2"><div align="center">DIKETAHUI</div></td>
      <td width="137">&nbsp;</td>
    </tr>
    <tr> 
      <td>NAMA PRODUK</td>
      <td>: <?php echo "$r[nm_fg]"?></td>
      <td width="91">&nbsp;</td>
      <td width="137">&nbsp;</td>
      <td width="137">&nbsp;</td>
      <td width="137">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>TANGGAL PRODUK</td>
      <td>: <?php echo TanggalIndo($r['tgl'])?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>SHIFT</td>
      <td>: <?php echo "$r[shift]"?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>JUMLAH BATCH</td>
      <td>: <?php echo "$r[lot]"?> BATCH</td>
      <td colspan="2"><div align="center"><strong><u>Kepala PPIC</u></strong></div></td>
      <td colspan="2"><div align="center"><strong><u>Kepala Gudang</u></strong></div></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<font color="#FF3333"></font> 

</p>
		
		 <?php
					
                    $tampil1=mysql_query("SELECT * FROM rakapcutrm where id='$_GET[id]'");
            	 $no1 = 1;
			       $r1=mysql_fetch_array($tampil1);{
					       
			       
                    ?>
<p>_________________________________________________________________________________________________________________________________________</p>
 
<tbody>
<table width="84%" border="0">
  <tr> 
    <td width="14%" height="50" background="" bgcolor="#CCCC33" > <h3 align="center"><font face="Courier New, Courier, mono"><u>PREMIX 
        ANGKA</u></font></h3></td>
    <td width="18%" bgcolor="#CCCC33" background="" > <h3 align="center"><font face="Courier New, Courier, mono"><u>JUMLAH 
        (KG)</u></font></h3></td>
    <td width="1%" rowspan="6"  >&nbsp;</td>
    <td width="17%" bgcolor="#CCCC33" background="" ><h3 align="center"><font face="Courier New, Courier, mono"><u><strong>PREMIX 
        ALFABET</strong></u></font></h3></td>
    <td width="14%" bgcolor="#CCCC33" background="" ><h3 align="center"><font face="Courier New, Courier, mono"><u><strong>JUMLAH 
        (KG)</strong></u></font></h3></td>
    <td width="1%" > <h3 align="center"><font face="Courier New, Courier, mono"><u></u></font></h3></td>
    <td width="19%" background="" bgcolor="#CCCC33" ><h3 align="center"><font face="Courier New, Courier, mono"><u><strong>RAW 
        MATERIAL </strong></u></font></h3></td>
    <td width="16%" background="" bgcolor="#CCCC33" ><h3 align="center"><font face="Courier New, Courier, mono"><u><strong>JUMLAH 
        (KG)</strong></u></font></h3></td>
  </tr>
  <tr> 
    <td height="41"><div align="center">PRX 01</div></td>
    <td><?php echo "$r[jml6]"?></td>
    <td><div align="center">PRX A</div></td>
    <td><?php echo "$r[jml1]"?> <div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center">MARGARINE</div></td>
    <td><?php echo "$r[jml14]"?></td>
  </tr>
  <tr> 
    <td height="40"><div align="center">PRX 02</div></td>
    <td><?php echo "$r[jml7]"?></td>
    <td><div align="center">PRX B</div></td>
    <td><?php echo "$r[jml2]"?> <div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center">SHORTENING</div></td>
    <td><?php echo "$r[jml13]"?></td>
  </tr>
  <tr> 
    <td height="40"><div align="center">PRX 03</div></td>
    <td><?php echo "$r[jml8]"?></td>
    <td><div align="center">PRX C</div></td>
    <td><?php echo "$r[jml3]"?> <div align="center"></div>
      <div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center">RAGI</div></td>
    <td><?php echo "$r[jml12]"?></td>
  </tr>
  <tr> 
    <td height="37"><div align="center">PRX 04</div></td>
    <td><?php echo "$r[jml9]"?></td>
    <td><div align="center">PRX D</div></td>
    <td><?php echo "$r[jml4]"?> <div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center">Flour<?php echo "$r[terigub]"?> </div></td>
    <td><?php echo "$r[jmlt2]"?></td>
  </tr>
  <tr> 
    <td height="37"><div align="center">PRX 05</div></td>
    <td><?php echo "$r[jml10]"?></td>
    <td><div align="center">PRX E</div></td>
    <td><?php echo "$r[jml5]"?> <div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center">Flour <?php echo   "$r[terigua]"?> </div></td>
    <td><?php echo "$r[jmlt1]"?></td>
  </tr>
  <tr> 
    <td height="37"><div align="center">PRX 06</div></td>
    <td><?php echo "$r[jml11]"?></td>
    <td  >&nbsp;</td>
    <td><div align="center">label <?php echo   "$r[r15]"?></td>
    <td><?php echo   "$r[rm15]"?> pcs</td>
    <td>&nbsp;</td>
    <td><div align="center">Plastik <?php echo   "$r[r16]"?> | <?php echo   "$r[r17]"?> </td>
    <td><?php echo   "$r[rm17]"?> pcs</td>
  </tr>
</table>
<font color="#0066CC" face="Verdana, Arial, Helvetica, sans-serif"></font>
<p>&nbsp;</p>
<?php
$no1++;
	
					}
					}
		 
		  
		  ?></p>

