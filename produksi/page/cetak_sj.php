 <?php 
	include "../config/koneksi.php";
	?>

               
                    <table width="773" border="0">
                      <tbody>
                        <tr>
                          <td height="38" colspan="3" valign="top" style="font-weight: 100"><h3 style="text-align: left">SURAT JALAN</h3>
                          <p style="text-align: left"><u>PT RAJA ROTI CEMERLANG</u> Bekasi - Kecamatan Tarumajaya</p></td>
						  <td height="38" colspan="3" valign="top" style="font-weight: 100"><h1 style="text-align: left"><img src="../dist/img/rrc.png" width="331" height="82"></h1></td>
					    </tr>
						 <?php
						
                    $tampil=mysql_query("SELECT * FROM so WHERE id='$_GET[id]'");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
						?>  
						  
						  
					  <p>
                      <tr>
                        <td width="257" style="font-weight: 100">Customer</td>
                        <td width="141" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">DO</td>
						  <td width="26" style="font-weight: 100">:</td>
                          <td width="331" style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[do1]"?></td>
                      </tr>
                        <tr>
                          <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[nm_cust]"?></td>
                          <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">Date and Time</td>
						  <td style="font-weight: 100">:</td>
                          <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[tgl]"?>,<?php echo "$r[time]"?></td>
                      </tr>
                        <tr>
                          <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[alamat]"?></td>
                          <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">Mobil dan No Plat</td>
						 <td style="font-weight: 100">:</td>
                          <td style="font-weight: 100; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[mobil]"?></td>
                      </tr>
                        <tr>
                          <td style="font-size: small; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;"><?php echo "$r[tlp]"?></td>
                           <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">NO SO</td>
						  <td style="font-size: small">:</td>
                          <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo "$r[no_so]"?></td>
                      </tr>
					  
					  <tr>
                          <td></td>
                           <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif">PO EXT</td>
					    <td style="font-size: small">:</td>
                          <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo "$r[so_ext]"?></td>
                      </tr>
					  
                       
						<?php
                    $no++;
                    }
                    ?>
						    
                      </tbody>
                    </table>
                    <tr></tr>
<table width="770" border="1" align="left" >
                      
                      <thead>
                        <tr>
                          
                          <th  width="365" height="21" style="font-weight: bold">NAMA BARANG</th>
                          <th  width="137" style="font-weight: bold">QTY</th>
                          <th width="246" style="font-weight: bold">EXP DATE</th>
						
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
                          <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="60" value="<?php echo "$r1[nm_fg1]"?>"></span></td>
							
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="20" value="<?php echo "$r1[qty1]"?>"></span></td>
							  
                          <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo TanggalIndo($r1['exp1'])?></td>
					    </tr>
					  <td height="20" align="left" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="60" value="<?php echo "$r1[nm_fg2]"?>"></span></td>
                        <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><span style="font-size: 12px"><input type="text" size="20" value="<?php echo "$r1[qty2]"?>"></span></td>
                           <td align="center" style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"><?php echo TanggalIndo($r1['exp2'])?></td>
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
						 
                        
     
                     
					
                    </table>
 

<td><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
<table width="944" border="0">
  <tbody>
                        <tr>
                          <td colspan="4">Mobil Dalam Keadaan</td>
                          <td width="3">&nbsp;</td>
                          <td width="168">&nbsp;</td>
                          <td width="4">&nbsp;</td>
                          <td width="163">Retur Barang</td>
                          <td width="3">:</td>
                          <td width="216">___________</td>
                          <td width="178">&nbsp;</td>
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
                          <td width="108">&nbsp;</td>
                          <td width="1">&nbsp;</td>
                          <td width="32">&nbsp;</td>
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
<p><!-- /.box --></p>