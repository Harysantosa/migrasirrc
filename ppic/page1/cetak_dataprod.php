<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
		<h1 align="center">CETAK DATA PRODUKSI	</h1>
		<h4 align="center">PT SEGARA PANGAN SAKINAH	</h4>
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
                                      <th width="37" style="text-align: center">No</th>
                                      <th  width="155" style="text-align: center">No Planing Produksi</th>
                                      <th  width="203" style="text-align: center">Tanggal Produksi</th>
                                      <th  width="68" style="text-align: center">Shift</th>
                                      <th  width="116" style="text-align: center">Jumlah Batch</th>
                                      <th width="133" style="text-align: center">Nama Produk</th>
                                      <th width="104" style="text-align: center">Jumlah Produksi</th>
                                      <th width="106" style="text-align: center">Jumlah Drying</th>
                                      <th width="131" style="text-align: center">Tanggal Drying</th>
                                      <th width="46" style="text-align: center">Shift Drying</th>
									  
								      </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM mixing order by id asc");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td height="47" style="text-align: center"><?php echo "$no"?></td>
							          <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
                                      <td align="left" style="text-align: center"><?php echo "$r[tgl]"?></td>
									  <td align="left" style="text-align: center"><?php echo "$r[shift]"?></td>
									  <td align="left" style="text-align: center"><?php echo "$r[batch1]"?></td>
                                      <td align="left" style="text-align: center"><?php echo "$r[nm_fg]"?></td>
                                      <td align="center" style="text-align: center"><?php echo "$r[jumlahprod]"?></td>
									  <td align="center" style="text-align: center"><?php echo "$r[fg]"?></td>
									  <td align="center" style="text-align: center"><?php echo "$r[tgl_drying]"?></td>
									  <td align="center" style="text-align: center"><?php echo "$r[shift_drying]"?></td>
                                      								
                        </tr>
                                    <?php
                         $no++;
					}
				
						?>
						
						
                                    <tr>
                                      <td align = "left" bordercolor="#F81115" colspan="6"><span style="font-weight:bold">TOTAL</span></td>
										<?php
                               $liatHarga=mysql_fetch_array(mysql_query("SELECT sum(jumlahprod) as total_jumlahprod, 
                        sum(fg) as total_sisa FROM mixing id"));
                        ?>
						
						
                                  <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold"><?php echo "". number_format("$liatHarga[total_jumlahprod]",'0','.','.')?> Batch</span></td>
                                  <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold"><?php echo number_format("$liatHarga[total_sisa]",'0','.','.')?> Batch</span></td>
                                  
								
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
