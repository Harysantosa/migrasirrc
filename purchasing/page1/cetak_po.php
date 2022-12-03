<style type="text/css">
body,td,th {
	font-size: large;
}
</style>
 <?php 
	include "../config/koneksi.php";
	?>

<body style="font-weight: 300; font-size: large; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;"><table width="882" border="0">
  <tbody>
	   <?php
					
                    $tampil=mysql_query("SELECT * FROM produk where id_produk='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
    <tr>
      <td height="29" colspan="3" style="font-size: large">PT RAJA ROTI CEMERLANG</td>
      <td colspan="3" rowspan="3" align="center" style="font-size: large"><h1>PURCHASE ORDER</h1></td>
    </tr>
    <tr>
      <td height="42" colspan="3" style="font-size: larger; font-weight: 900;">Kp Pulo Kendal Desa Setia Asih, Kecamatan Tarumajaya Kabupaten Bekasi</td>
    </tr>
    <tr>
      <td colspan="3" style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
		
		
      <td height="29" colspan="2" style="font-size: large" he><?php echo "$r[nama]"?></td>
      <td width="209" style="font-size: large">&nbsp;</td>
      <td colspan="2" style="font-size: medium">NO PO:</td>
      <td width="17" style="font-size: large"><?php echo "$r[no_po]"?></td>
    </tr>
    <tr>
      <td height="29" colspan="3" style="font-size: large"><?php echo "$r[alamat]"?> , <?php echo "$r[kota]"?></td>
      <td colspan="2" style="font-size: medium">Tanggal PO:</td>
      <td style="font-size: large"><?php echo "$r[tglmasuk]"?></td>
    </tr>
    <tr>
      <td height="29" colspan="2" style="font-size: large"><?php echo "$r[telepon]"?></td>
      <td style="font-size: medium">&nbsp;</td>
      <td style="font-size: medium"> PIlih Metode Pembayaran  </td>
      <td width="143" style="font-size: medium">  <select class="form-control select2" name="shift" style="width: 100%;">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="Cash">Bayar Dimuka</option>
                        <option value="NET 30">NET 30</option>
                        <option value="NET 14">NET 14</option>
		  				<option value="NET 45">NET 45</option>
		  </select></optgroup> </td>
    </tr>
    <tr>
      <td height="29" colspan="2" style="font-size: medium"><?php echo "$r[pic]"?></td>
      <td style="font-size: large">&nbsp;</td>
      <td colspan="2" style="font-size: medium">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
	  <?php
				   }
						   ?>
    <tr>
		 <?php
					
                    $tampil1=mysql_query("SELECT * FROM produk where id_produk='$_GET[id]'");
            	 $no1 = 1;
			       $r1=mysql_fetch_array($tampil1);{
					       
			       
                    ?>
      <td height="28" colspan="6" align="center" style="text-align: center"><h2>-------------------------------------------------------------------</h2>
      <h2>DETAIL PESANAN</h2></td>
    </tr>
    <tr>
      <td width="14" style="text-align: left">&nbsp;</td>
      <td width="268" style="text-align: left">NAMA BARANG</td>
      <td style="text-align: left">JUMLAH</td>
      
      <td width="208" style="text-align: left">HARGA SATUAN</td>

    </tr>
    <tr>
      <td height="52" style="font-size: large">&nbsp;</td>
      <td style="text-align: left"><?php echo "$r[nama_rm1]"?></td>
      <td style="text-align: left"><?php echo "$r[jumlah_barang1]"?></td>
      
      <td style="text-align: left">Rp.<?php echo "". number_format("$r[harga_perbarang1]")?> 
    
    </tr>
    <tr>
      <td height="49" style="font-size: large">&nbsp;</td>
      <td style="text-align: left"><?php echo "$r[nama_rm2]"?></td>
      <td style="text-align: left"><?php echo "$r[jumlah_barang2]"?></td>
     
      <td style="text-align: left"><?php echo "$r[harga_perbarang2]"?></td>

    </tr>
    <tr>
      <td height="47" style="font-size: large">&nbsp;</td>
      <td style="text-align: left"><?php echo "$r[nama_rm3]"?></td>
      <td style="text-align: left"><?php echo "$r[jumlah_barang3]"?></td>
  
      <td style="text-align: left"><?php echo "$r[harga_perbarang3]"?></td>
   
    </tr>
   
    <tr>
      <td height="29" style="font-size: large">&nbsp;</td>

  
    
   
    </tr>
  </tbody>
</table>
<p>-------------------------------------------------------------------------------------------------------</p>
<table width="645" border="0">
  <tbody>
    <tr>
      <td width="445" height="22" style="font-size: medium">TOTAL HARGA</td>
      <td width="190" style="font-size: medium">Rp.<?php echo "". number_format("$r[total_harga]")?> 
    </tr>
    <tr>
      <td height="22" style="font-size: medium">PPN </td>
      <td style="font-size: medium">Rp.<?php echo "". number_format("$r[ppn]")?> 
    </tr>
    <tr>
      <td height="22" style="font-size: medium">DISKON</td>
      <td style="font-size: medium">Rp.<?php echo "". number_format("$r[diskon]")?> </td>
    </tr>
    <tr>
      <td height="22" style="font-size: medium">GRAND TOTAL</td>
      <td style="font-size: medium">Rp.<?php echo "". number_format("$r[grand_total]")?> </td>
    </tr>
	  <?php
				   }
		?>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1070" border="0">
  <tbody>
    <tr>
      <td colspan="5" align="left" style="font-size: large">KETERANGAN</td>
    </tr>
    <tr>
      <td height="55" colspan="5" style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td width="90" style="font-size: large">&nbsp;</td>
      <td width="149" style="font-size: large">&nbsp;</td>
      <td width="46" style="font-size: large">&nbsp;</td>
      <td width="211" style="font-size: large">&nbsp;</td>
	 <td width="540" style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="font-size: large">Prepared By</td>
      <td style="font-size: large">&nbsp;</td>
      <td align="center" style="font-size: large">Approved By</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" style="font-size: large">(_____________________________)</td>
      <td style="font-size: large">&nbsp;</td>
      <td style="font-size: large">(_________________________)</td>
      <td style="font-size: large">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
