 <?php 
	include "../config/koneksi.php";
	?>

               
                    <table width="818" border="0">
                      <tbody>
                        <tr>
                          <td height="38" colspan="3" valign="top"><h1 style="text-align: left">INVOICE</h1></td>
						  <td height="38" colspan="3" valign="top"><h1 style="text-align: center">&nbsp;</h1></td>
					    </tr>
                        <tr>
							<td width="308" style="font-size: 18px"><p ><u>PT RAJA ROTI CEMERLANG</u>                   
						    Bekasi - Kecamatan Tarumajaya</p>
						    <p></p></td>
                          <td colspan="3" style="font-size: 18px">&nbsp;</td>
                        </tr>
						 <?php
				    $query = mysql_query("SELECT *,DATE_ADD(tgl, INTERVAL where tempo='$_GET[tempo]' DAY) as jatuh_tempo"); while ($data = mysql_fetch_array($query)) {
                    $tampil=mysql_query("SELECT * FROM so WHERE id='$_GET[id]'");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
						?>  
						  
						  
						<p>
                        <tr>
                          <td style="font-size: 18px">Customer</td>
                          <td width="201" style="font-size: 18px">NO INV</td>
						  <td width="4" style="font-size: 18px">:</td>
                          <td width="334" style="font-size: 18px"><?php echo "$r[no_inv]"?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[nm_cust]"?></td>
                          <td style="font-size: 18px">Tanggal Pengiriman</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[tgl]"?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[alamat]"?></td>
                          <td style="font-size: 18px">Tanggal Jatuh Tempo</td>
						 <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[jatuh_tempo]"?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[tlp]"?></td>
                           <td style="font-size: 18px">NO DO</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[do1]"?></td>
                        </tr>
                       
						<?php
                    $no++;
                    }
                    ?>
					<?php } ?>	    
                      </tbody>
                    </table>
                    <tr> ______________________________________________________________________________________________________</tr>
                    <table width="822" align="left" >
                      <tr>
                        <th height="0" colspan="4" style="text-align: left">______________________________________________________________________________________________________</th>
                      </tr>
                      <thead>
                        <tr>
                          
                          <th  width="223" height="21" style="text-align: center">Nama Barang</th>
                          <th  width="57" style="text-align: center">Qty</th>
                          <th width="243" style="text-align: center">Harga Perbarang</th>
                          <th width="281" style="text-align: center">Total Harga</th>
						 
						
                        </tr>
                      </thead>
                      <tbody>
						  <?php
					
                    $tampil1=mysql_query("SELECT * FROM so where id='$_GET[id]'");
            		 $no1 = 1;
			        while ($r1=mysql_fetch_array($tampil1)){
					
				
                    ?>
                        <tr align="left">
                          <td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg1]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty1]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[harga1]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[total1]"?></span></td>
						
						  </tr>
							 <tr>
                          <td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg2]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty2]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[harga2]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[total2]"?></span></td>
							
						  <tr>
							<td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg3]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty3]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[harga3]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[total3]"?></span></td>
						  </tr>
						  <tr>
							<td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg4]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty4]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[harga4]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[total4]"?></span></td>
                        </tr>
						  <?php
                         $no1++;
					}
				
						?>
                        <tr>
						
                          <td align = "left" bordercolor="#F81115" colspan="3">TOTAL</td>
                          <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT qty1,qty2,qty3,qty4 ,(qty1+qty2+qty3+qty4) as total_qty FROM so where id ='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center"><?php echo "". number_format("$liatHarga[total_qty]")?> </td>
						
                        </tr>
                        <tr>
                          <td align = "left" bordercolor="#F81115" colspan="3">PPN</td>
                          <td bgcolor="#1E9BEB" align = "center"><?php echo "". number_format("$liatHarga[total_qty]")?></td>
                        </tr>
                        <tr>
                          <td align = "left" bordercolor="#F81115" colspan="3">GRAND TOTAL</td>
                          <td bgcolor="#1E9BEB" align = "center"><?php echo "". number_format("$liatHarga[total_qty]")?></td>
                        </tr>
						 
                        
     
                     
					
                    </table>
 

<td><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>_______________________________________________________________________________________________________</p></td>
<table width="823" border="0">
  <tbody>
                        <tr>
                          <td colspan="5" align="center">Disiapkan Oleh</td>
                          <td width="168" rowspan="5" style="text-align: center">Pembayaran ditransfer melalui Rekening BCA Dengan Nomor Rekening 0123456789</td>
                          <td colspan="3" align="center">Diterima Oleh</td>
                        </tr>
                        <tr>
                          <td width="24">&nbsp;</td>
                          <td width="104">&nbsp;</td>
                          <td width="3">&nbsp;</td>
                          <td width="35">&nbsp;</td>
                          <td width="3">&nbsp;</td>
                          <td width="6">&nbsp;</td>
                          <td width="161">&nbsp;</td>
                          <td width="3">&nbsp;</td>
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
                        </tr>
                        <tr>
                          <td colspan="4" align="center"> (_____________________)</td>
                          <td>&nbsp;</td>
                          <td colspan="3"align="center"> (_____________________)</td>
                        </tr>
                      </tbody>
</table>
                    <p>Printed By Sistem Informasi PT RAJA ROTI CEMERLANG</p>
                    <p>&nbsp; </p>
<p>&nbsp;</p>
<!-- /.box -->