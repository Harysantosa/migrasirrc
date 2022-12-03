 <?php 
	include "../config/koneksi.php";
	?>

               
                    <table width="824" border="0">
                      <tbody>
                        <tr>
                          <td height="38" colspan="3" valign="top"><h1 style="text-align: center">SURAT JALAN</h1></td>
						  <td height="38" colspan="3" valign="top"><h1 style="text-align: left"><img src="../dist/img/rrc.png" width="338" height="147"></h1></td>
					    </tr>
                        <tr>
							<td width="278" style="font-size: 18px"><p ><u>PT RAJA ROTI CEMERLANG</u>                   
						    Bekasi - Kecamatan Tarumajaya</p>
						    <p></p></td>
                          <td colspan="3" style="font-size: 18px">&nbsp;</td>
                        </tr>
						 <?php
						
                    $tampil=mysql_query("SELECT * FROM so WHERE id='$_GET[id]'");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
						?>  
						  
						  
						<p>
                        <tr>
                          <td style="font-size: 18px">Customer</td>
                          <td width="168" style="font-size: 18px">DO</td>
						  <td width="4" style="font-size: 18px">:</td>
                          <td width="338" style="font-size: 18px"><?php echo "$r[do1]"?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[nm_cust]"?></td>
                          <td style="font-size: 18px">Date and Time</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[tgl]"?>,<?php echo "$r[time]"?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[alamat]"?></td>
                          <td style="font-size: 18px">Mobil dan No Plat</td>
						 <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[mobil]"?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px"><?php echo "$r[tlp]"?></td>
                           <td style="font-size: 18px">NO PO</td>
						  <td style="font-size: 18px">:</td>
                          <td style="font-size: 18px"><?php echo "$r[no_so]"?></td>
                        </tr>
                       
						<?php
                    $no++;
                    }
                    ?>
						    
                      </tbody>
                    </table>
                    <tr> ______________________________________________________________________________________________________</tr>
                    <table width="803" align="left" >
                      <tr>
                        <th height="0" colspan="3" style="text-align: center">______________________________________________________________________________________________________</th>
                      </tr>
                      <thead>
                        <tr>
                          
                          <th  width="316" height="21" style="text-align: center">Nama Barang</th>
                          <th  width="105" style="text-align: center">Qty</th>
                          <th width="387" style="text-align: center">Exp Date</th>
						
                        </tr>
                      </thead>
                      <tbody>
						  <?php
					 include("indo.php");
                    $tampil1=mysql_query("SELECT * FROM so where id='$_GET[id]'");
            		 $no1 = 1;
			        while ($r1=mysql_fetch_array($tampil1)){
					
				
                    ?>
                        <tr align="left">
                          <td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg1]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty1]"?></span></td>
                         <td align="center"><?php echo TanggalIndo($r1['exp1'])?></td>
						  </tr>
							 <td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg2]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty2]"?></span></td>
                           <td align="center"><?php echo TanggalIndo($r1['exp2'])?></td>
							
						  <tr>
							<td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg3]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty3]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[exp3]"?></span></td>
						  </tr>
						  <tr>
							<td height="20" align="left" style="text-align: center"><span style="font-size: 15px"><?php echo "$r1[nm_fg4]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[qty4]"?></span></td>
                          <td align="center" style="font-weight: 12"><span style="font-size: 15px"><?php echo "$r1[exp4]"?></span></td>
                        </tr>
						  <?php
                         $no1++;
					}
				
						?>
                        <tr>
						
                          <td align = "left" bordercolor="#F81115" colspan="1">TOTAL</td>
                          <?php $liatHarga=mysql_fetch_array(mysql_query("SELECT qty1,qty2,qty3,qty4 ,(qty1+qty2+qty3+qty4) as total_qty FROM so where id ='$_GET[id]'"));?>
                          <td bgcolor="#1E9BEB" align = "center"><?php echo "". number_format("$liatHarga[total_qty]")?> </td>
						
                        </tr>
						 
                        
     
                     
					
                    </table>
 

<td><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>_______________________________________________________________________________________________________</p></td>
<table width="944" border="0">
  <tbody>
                        <tr>
                          <td colspan="4">Mobil Dalam Keadaan</td>
                          <td width="3">&nbsp;</td>
                          <td width="168">&nbsp;</td>
                          <td width="6">&nbsp;</td>
                          <td width="161">Retur Barang</td>
                          <td width="3">:</td>
                          <td width="216">___________________________</td>
                          <td width="175">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="24"><input type="checkbox" name="checkbox" id="checkbox"></td>
                          <td colspan="3">Baik</td>
                          <td>:</td>
                          <td>_____________________</td>
                          <td>&nbsp;</td>
                          <td>Jumlah</td>
                          <td>:</td>
                          <td>___________________________</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
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
                          <td colspan="5">Kilometer Kendaraan</td>
                          <td><p>Awal  :</p>
                          <p>Akhir :</p></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
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
                          <td width="104">&nbsp;</td>
                          <td width="3">&nbsp;</td>
                          <td width="35">&nbsp;</td>
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
                          <td colspan="4" align="center"> (_____________________)</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td colspan="3"align="center"> (_____________________)</td>
                          <td>&nbsp;</td>
							<td align="center" >(_____________________)</td>
							  
                        </tr>
                      </tbody>
</table>
                    <p>&nbsp;</p>
                    <p>&nbsp; </p>
<p>&nbsp;</p>
<!-- /.box -->