<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

	
<body>
<table width="898" border="0" align="center">
  <tbody>
    <tr>
      <td width="251" style="font-size: 36px; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">SURAT JALAN</td>
      <td width="198">&nbsp;</td>
      <td width="15">&nbsp;</td>
      <td width="302">&nbsp;</td>
    </tr>
	  <?php 
	include "../config/koneksi.php";
	?>
	   <?php
						
                    $tampil=mysql_query("SELECT * FROM so WHERE id='$_GET[id]'");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
						?>  
    <tr>
      <td style="text-align: left">PT RAJA ROTI CEMERLANG</td>
      <td>DO</td>
      <td style="text-align: center">:</td>
      <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[do1]"?></td>
    </tr>
    <tr>
      <td style="text-align: left">BEKASI</td>
      <td>TANGGAL DAN JAM</td>
      <td style="text-align: center">:</td>
  <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[tgl]"?>,<?php echo "$r[time]"?></td>
    </tr>
	   
    <tr>
      <td> CUSTOMER</td>
      <td>MOBIL DAN PLAT</td>
      <td style="text-align: center">:</td>
     <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[mobil]"?></td>
    </tr>
	   <?php
                    $no++;
                    }
                    ?>
	  
	  
    <tr>
		<?php
						
                    $tampil=mysql_query("SELECT * FROM so WHERE id='$_GET[id]'");
                    $no = 1;
                      while ($r1=mysql_fetch_array($tampil)){
						?>  
     <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r1[nm_cust]"?></td>
     <td>NO SO</td>
     <td style="text-align: center">:</td>
     <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo "$r1[no_so]"?></td>
    </tr>
    <tr>
       <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r1[alamat]"?></td>
       <td>PO EXT</td>
       <td style="text-align: center">:</td>
        <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo "$r1[so_ext]"?></td>
    </tr>
    <tr>
      <td style="font-size: small; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r1[tlp]"?></td>
      <td>&nbsp;</td>
      <td style="text-align: center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	  <?php
                    $no++;
                    }
                    ?>
	   
	
</table>
<table width="783" border="1" align="center">
  <tbody>
	   <?php
					 include("indo.php");
                    $tampil1=mysql_query("SELECT * FROM so where id='$_GET[id]'");
            		 $no1 = 1;
			        while ($r1=mysql_fetch_array($tampil1)){
					
				
                    ?>
    <tr>
      <td width="328" style="text-align: center">NAMA BARANG</td>
      <td width="142" style="text-align: center">QTY</td>
      <td width="291" style="text-align: center">EXP DATE</td>
    </tr>
    <tr>
      <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="60" value="<?php echo "$r1[nm_fg1]"?>"></span></td>
							
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="20" value="<?php echo "$r1[qty1]"?>"></span></td>
							  
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo TanggalIndo($r1['exp1'])?></td>
    </tr>
    <tr>
      <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="60" value="<?php echo "$r1[nm_fg2]"?>"></span></td>
                        <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="20" value="<?php echo "$r1[qty2]"?>"></span></td>
                           <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo TanggalIndo($r1['exp2'])?></td>
    </tr>
    <tr>
      <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="60" value="<?php echo "$r1[nm_fg3]"?>"></span></td>
    <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="20" value="<?php echo "$r1[qty3]"?>"></span></td>
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo TanggalIndo($r1['exp3'])?></td>
    </tr>
    <tr>
      <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="60" value="<?php echo "$r1[nm_fg4]"?>"></span></td>
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="20" value="<?php echo "$r1[qty4]"?>"></span></td>
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo TanggalIndo($r1['exp4'])?></td>
    </tr>
	   <?php
                         $no1++;
					}
				
						?>
    <tr>
    <td height="21" colspan="1" align = "left" bordercolor="#F81115">TOTAL</td>
                          <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT qty1,qty2,qty3,qty4 ,(qty1+qty2+qty3+qty4) as total_qty FROM so where id ='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center"><?php echo "". number_format("$liatHarga[total_qty]")?> <span style="font-size: 12px"></span></td>
						
                        </tr>
     
    </tr>
  </tbody>
</table>
<table width="944" border="0" align="center">
  <tbody>
    <tr>
      <td colspan="4">Mobil Dalam Keadaan</td>
      <td width="3">&nbsp;</td>
      <td width="168">&nbsp;</td>
      <td width="3">&nbsp;</td>
      <td width="164">Retur Barang</td>
      <td width="3">:</td>
      <td width="216">___________</td>
      <td width="175">&nbsp;</td>
    </tr>
    <tr>
      <td width="25"><input type="checkbox" name="checkbox" id="checkbox"></td>
      <td colspan="3">Baik</td>
      <td>:</td>
      <td>_____________________</td>
      <td>&nbsp;</td>
      <td>Jumlah</td>
      <td>:</td>
      <td>___________</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="34"><input type="checkbox" name="checkbox3" id="checkbox3"></td>
      <td colspan="3">Tidak Baik Karena</td>
      <td>:</td>
      <td>_____________________</td>
      <td>&nbsp;</td>
      <td>Alasan</td>
      <td>:</td>
      <td>___________________________</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Kilometer kendaraan</td>
      <td>&nbsp;</td>
      <td>Awal :</td>
      <td>&nbsp;</td>
      <td>Akhir :</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" rowspan="2" align="center">Disiapkan Oleh</td>
      <td>&nbsp;</td>
      <td colspan="3" rowspan="2" align="center">Dikirim Oleh</td>
      <td>&nbsp;</td>
      <td rowspan="2" align="center" >Di Terima OIeh</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="109">&nbsp;</td>
      <td width="3">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center">GUDANG</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3"align="center"> SUPIR</td>
      <td>&nbsp;</td>
      <td align="center" >PELANGGAN</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>