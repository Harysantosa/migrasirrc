 <?php 
	include "../config/koneksi.php";
	?>

               
                    <table width="1007" border="0">
                      <tbody>
                        <tr>
                         <td height="38" colspan="3" valign="top"><h1 style="text-align: left">INVOICE</h1></td>
						  <td height="38" colspan="3" valign="top"><h1 style="text-align: center">&nbsp;</h1></td>
					    </tr>
                        <tr>
							<td width="325" style="font-size: 18px"><p ><u>PT RAJA ROTI CEMERLANG</u></p>                   
						   <p> Bekasi Inodensia</p>
						    <p></p></td>
                          <td colspan="3" style="font-size: 18px">&nbsp;</td>
                        </tr>
						  
						  
						<?php
						  $tampil = mysql_query("SELECT *,DATE_ADD(tgl,interval tempo DAY) as jatuh_tempo FROM inv where id='$_GET[id]'"); 
						  $no = 1;
						  while ($r = mysql_fetch_array($tampil)) {
						  ?>
						 
						  
						  
				      <p>
                      <tr>
                          <td style="font-size: 18px">Customer</td>
                          <td width="247" style="font-size: 18px">&nbsp;</td>
							<td width="210" style="font-size: 18px">NO INV</td>
						  <td width="4" style="font-size: 18px">:</td>
                          <td width="199" style="font-size: 18px"><?php echo "$r[no_inv]"?></td>
                      </tr>
							
                      <tr>
                          <td style="font-size: 18px"><?php echo "$r[nm_cust]"?></td>
                          <td style="font-size: 18px">&nbsp;</td>
						<td width="210" style="font-size: 18px">Tanggal Pengiriman</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[tgl]"?></td>
                      </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[alamat]"?></td>
                          <td style="font-size: 18px">&nbsp;</td>
							<td width="210" style="font-size: 18px">Tanggal Jatuh Tempo</td>
						 <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[jatuh_tempo]"?></td>
                        </tr>
							
                      <tr>
                          <td style="font-size: 18px"><?php echo "$r[tlp]"?></td>
                           <td style="font-size: 18px">&nbsp;</td>
							<td width="210" style="font-size: 18px">NO DO</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[do1]"?></td>
                      </tr>
                       
						<?php
                    $no++;
                    }
						
                    ?>
						    
                      </tbody>
                    </table>
                    <tr> _______________________________________________________________________________________________________________________________</tr>
                    <table width="1047" border="1" align="left" >
                      <tr>
                        <th height="1" colspan="6" style="text-align: left">_______________________________________________________________________________________________________________________________</th>
                      </tr>
                      <thead>
                        <tr>
                          
                         <th  width="174" height="21" style="text-align: center">Nama Barang</th>
                          <th  width="38" style="text-align: center">Qty (Sak)</th>
                          <th width="129" style="text-align: center">Return (Sak)</th>
                          
                          <th width="245" style="text-align: center">Jumlah Tagihan (Sak)</th>
                          <th width="414" style="text-align: center">Harga Perbarang (Rp)</th>
                         
                          <th width="414" style="text-align: center">Total Harga (Rp)</th>
						 
						
                        </tr>
                      </thead>
                      <tbody>
						  <?php
					
                    $tampil1=mysql_query("SELECT * FROM inv where id='$_GET[id]'");
            		 $no1 = 1;
			        while ($r1=mysql_fetch_array($tampil1)){
					
				
                    ?>
                        <tr align="left">
                          <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg1]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty1]"?></span></td>
                        
                         <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur1]"?></span></td>
                         <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix1]"?></span></td>
                         <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga1]"?></span></td>
                         <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total1]"?></span></td>
						
					    </tr>
							 <tr>
                         <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg2]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty2]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur2]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix2]"?></span></td>
                        <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga2]"?></span></td>
                        <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total2]"?></span></td>
							
						  <tr>
							 <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg3]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total3]"?></span></td>
						  </tr>
						  <tr>
							 <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg4]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total4]"?></span></td>
                        </tr>
						  <?php
                         $no1++;
					}
				
						?>
						   <tr>
                        <th height="0" colspan="8" style="text-align: left">_______________________________________________________________________________________________________________________________</th>
                      </tr>
                        <tr>
						
                         <td align = "left" bordercolor="#F81115" colspan="3">TOTAL</td>
                         
                         
                          <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT * FROM inv where id='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center">Rp.<?php echo "". number_format("$liatHarga[grand_total]")?> </td>
						
                        </tr>
                        <tr>
                          <td align = "left" bordercolor="#F81115" colspan="3">PPN</td>
                          
                          
						   <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT * FROM inv where id='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center">Rp.<?php echo "". number_format("$liatHarga[ppn]")?></td>
                        </tr>
                        <tr>
                          <td colspan="3" height="20" align = "left" bordercolor="#F81115" style="font-weight: bold">JUMLAH YANG DIBAYAR</td>
                          
                         
						 <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT * FROM inv where id='$_GET[id]'"));?>
                          <td align = "center" bgcolor="#1E9BEB" style="font-weight: bold">Rp.<?php echo "". number_format("$liatHarga[piutang]")?></td>
                        </tr>
						  <tr>
                        <th height="0" colspan="8" style="text-align: left">_______________________________________________________________________________________________________________________________</th>
                      </tr>
                        
     
                     
					
                    </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="877" border="0">
  <tbody>
                        <tr>
						 <?php
					
                    $tampil1=mysql_query("SELECT * FROM inv where id='$_GET[id]'");
            		 $no3 = 1;
			        while ($r3=mysql_fetch_array($tampil1)){
					
				
                    ?>
                          <td colspan="5" align="center">Hormat Kami</td>
                          <td width="370" rowspan="12" style="text-align: center">Pembayaran ditransfer melalui Rekening BCA Dengan Nomor Rekening <?php echo "$r3[no_rek]"?> </td>
                             <?php
                         $no3++;
					}
				
						?>
                          <td colspan="3" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="48">&nbsp;</td>
                          <td width="179">&nbsp;</td>
                          <td width="19">&nbsp;</td>
                          <td width="7">&nbsp;</td>
                          <td width="18">&nbsp;</td>
                          <td width="231">&nbsp;</td>
                          <td width="98">&nbsp;</td>
                          <td width="17">&nbsp;</td>
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
                          <td>&nbsp;</td>
                          <td><p>&nbsp;</p>
                          <p>&nbsp;</p></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="5" style="text-align: center">(Ari Sudarsono)</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                       
                       
                        
                       
	  
  
	  
  </tbody>
</table>
<p>=================================================================================================================</p>

                     <table width="1007" border="0">
                      <tbody>
                        <tr>
                          <td height="38" colspan="3" valign="top"><h1 style="text-align: left">INVOICE</h1></td>
						  <td height="38" colspan="3" valign="top"><h1 style="text-align: center">&nbsp;</h1></td>
					    </tr>
                        <tr>
							<td width="325" style="font-size: 18px"><p ><u>PT RAJA ROTI CEMERLANG</u></p>                   
						   <p> Bekasi Inodensia</p>
						    <p></p></td>
                          <td colspan="3" style="font-size: 18px">&nbsp;</td>
                        </tr>
						  
						  
						<?php
						  $tampil = mysql_query("SELECT *,DATE_ADD(tgl,interval tempo DAY) as jatuh_tempo FROM inv where id='$_GET[id]'"); 
						  $no = 1;
						  while ($r = mysql_fetch_array($tampil)) {
						  ?>
						 
						  
						  
					   <p>
                       <tr>
                          <td style="font-size: 18px">Customer</td>
                          <td width="247" style="font-size: 18px">&nbsp;</td>
							<td width="210" style="font-size: 18px">NO INV</td>
						  <td width="4" style="font-size: 18px">:</td>
                          <td width="199" style="font-size: 18px"><?php echo "$r[no_inv]"?></td>
                       </tr>
							
                      <tr>
                          <td style="font-size: 18px"><?php echo "$r[nm_cust]"?></td>
                          <td style="font-size: 18px">&nbsp;</td>
						<td width="210" style="font-size: 18px">Tanggal Pengiriman</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[tgl]"?></td>
                       </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[alamat]"?></td>
                          <td style="font-size: 18px">&nbsp;</td>
							<td width="210" style="font-size: 18px">Tanggal Jatuh Tempo</td>
						 <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[jatuh_tempo]"?></td>
                        </tr>
							
                      <tr>
                          <td style="font-size: 18px"><?php echo "$r[tlp]"?></td>
                           <td style="font-size: 18px">&nbsp;</td>
							<td width="210" style="font-size: 18px">NO DO</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[do1]"?></td>
                       </tr>
                       
						<?php
                    $no++;
                    }
						
                    ?>
						    
                      </tbody>
                    </table>
                    <tr> _______________________________________________________________________________________________________________________________</tr>
                    <table width="1047" border="1" align="left" >
                      <tr>
                        <th height="1" colspan="6" style="text-align: left">_______________________________________________________________________________________________________________________________</th>
                      </tr>
                      <thead>
                        <tr>
                          
                         <th  width="174" height="21" style="text-align: center">Nama Barang</th>
                          <th  width="38" style="text-align: center">Qty (Sak)</th>
                          <th width="129" style="text-align: center">Return (Sak)</th>
                          
                          <th width="245" style="text-align: center">Jumlah Tagihan (Sak)</th>
                          <th width="414" style="text-align: center">Harga Perbarang (Rp)</th>
                         
                          <th width="414" style="text-align: center">Total Harga (Rp)</th>
						 
						
                        </tr>
                      </thead>
                      <tbody>
						  <?php
					
                    $tampil1=mysql_query("SELECT * FROM inv where id='$_GET[id]'");
            		 $no1 = 1;
			        while ($r1=mysql_fetch_array($tampil1)){
					
				
                    ?>
                        <tr align="left">
                           <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg1]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty1]"?></span></td>
                        
                         <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur1]"?></span></td>
                         <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix1]"?></span></td>
                         <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga1]"?></span></td>
                         <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total1]"?></span></td>
						
					    </tr>
							 <tr>
                          <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg2]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty2]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur2]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix2]"?></span></td>
                        <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga2]"?></span></td>
                        <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total2]"?></span></td>
							
						  <tr>
							 <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg3]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga3]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total3]"?></span></td>
						  </tr>
						  <tr>
							 <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="30" value="<?php echo "$r1[nm_fg4]"?>"></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[qty4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px">-<?php echo "$r1[retur4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[fix4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[harga4]"?></span></td>
                          <td align="center" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[total4]"?></span></td>
                        </tr>
						  <?php
                         $no1++;
					}
				
						?>
						   <tr>
                        <th height="0" colspan="8" style="text-align: left">_______________________________________________________________________________________________________________________________</th>
                      </tr>
                        <tr>
						
                         <td align = "left" bordercolor="#F81115" colspan="3">TOTAL</td>
                         
                         
                          <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT * FROM inv where id='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center">Rp.<?php echo "". number_format("$liatHarga[grand_total]")?> </td>
						
                        </tr>
                        <tr>
                          <td align = "left" bordercolor="#F81115" colspan="3">PPN</td>
                          
                          
						   <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT * FROM inv where id='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center">Rp.<?php echo "". number_format("$liatHarga[ppn]")?></td>
                        </tr>
                        <tr>
                          <td colspan="3" height="20" align = "left" bordercolor="#F81115" style="font-weight: bold">JUMLAH YANG DIBAYAR</td>
                          
                         
						 <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT * FROM inv where id='$_GET[id]'"));?>
                          <td align = "center" bgcolor="#1E9BEB" style="font-weight: bold">Rp.<?php echo "". number_format("$liatHarga[piutang]")?></td>
                        </tr>
						  <tr>
                        <th height="0" colspan="8" style="text-align: left">_______________________________________________________________________________________________________________________________</th>
                      </tr>
                      <table width="877" border="0">
  <tbody>
                        <tr>
						 <?php
					
                    $tampil1=mysql_query("SELECT * FROM inv where id='$_GET[id]'");
            		 $no3 = 1;
			        while ($r3=mysql_fetch_array($tampil1)){
					
				
                    ?>
                          <td colspan="5" align="center">Hormat Kami</td>
                          <td width="370" rowspan="12" style="text-align: center">Pembayaran ditransfer melalui Rekening BCA Dengan Nomor Rekening <?php echo "$r3[no_rek]"?> </td>
                             <?php
                         $no3++;
					}
				
						?>
                          <td colspan="3" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="48">&nbsp;</td>
                          <td width="179">&nbsp;</td>
                          <td width="19">&nbsp;</td>
                          <td width="7">&nbsp;</td>
                          <td width="18">&nbsp;</td>
                          <td width="231">&nbsp;</td>
                          <td width="98">&nbsp;</td>
                          <td width="17">&nbsp;</td>
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
                          <td colspan="5" align="center"> (Ari Sudarsono)</td>
                          <td colspan="3"align="center">&nbsp;</td>
                        </tr>
	  
  
	  
  </tbody>
</table>  
     
                     
					
                    </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- /.box -->
