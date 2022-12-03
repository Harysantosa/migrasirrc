<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
		<h1 align="center">CETAK DATA LAPORAN FG IN</h1>
		<h4 align="center">PT RAJA ROTI CEMERLANG	</h4>
	<p>
	  <?php 
	include "../config/koneksi.php";
	?>
</p>
		 <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                    <table width="1297" border="3" class="table table-hover responsive">
                      <tbody>
                        <tr>
                          <td width="804" height="149" colspan="5" align = "left"><table width="1014" align="left" class="table table-hover responsive">
                            <tbody>
                              <tr align="left">
                                <td width="1006" colspan="5" align="left"><table width="1203" align="" class="table table-hover responsive">
                                  <thead>
                                    <tr>
                                      <th width="83">No</th>
                        <th width="248">NO Planing</th>
                        <th width="198">Tgl Produksi</th>
						<th width="310">Nama Produk </th>
						<th width="242">Jumlah Produk Masuk </th>
						
									  
								      </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM gudang_fg order by id asc");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					
					
                   
			       
                    ?>
                                    <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						<td style="text-align: center"><?php echo "$r[no_plan]"?></td>
						<td style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
                        <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
					     <td align="center" style="text-align: center"><?php echo "$r[fg1]"?></td>
                                      								
                        </tr>
                                    <?php
                         $no++;
					}
				
						?>
						
						
                                    <tr>
                                      <td align = "left" bordercolor="#F81115" colspan="4"><span style="font-weight:bold">TOTAL</span></td>
										<?php
                               $liatHarga=mysql_fetch_array(mysql_query("SELECT sum(fg1) as total_jumlahprod 
                         FROM gudang_fg id"));
                        ?>
						
						
                                  <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold"><?php echo number_format("$liatHarga[total_jumlahprod]",'0','.','.')?> Sak</span></td>
                                  
								
                                </tr>
						
                                  </tbody>
                                </table>
                                  <span style="font-weight:bold"></span></td>
                              </tr>
                            </tbody>
                          </table>                            <span style="font-weight:bold"></span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.box-body -->
</p>
		<script>
		window.print();
	      </script>
