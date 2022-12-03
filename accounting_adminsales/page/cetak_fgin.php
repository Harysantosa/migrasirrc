<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
<h2 align="center">CETAK DATA VERIFIKASI BARANG MASUK</h2>
		<h4 align="center">PT SEGARA PANGAN SAKINAH	</h4>
	<p>
	  <?php 
	include "../config/koneksi.php";
	?>
</p>
	<div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                    <table width="900" border="3" class="table table-hover responsive">
                      <tbody>
                        <tr>
                          <td width="804" height="149" colspan="5" align = "center"><table width="1014" align="left" class="table table-hover responsive">
                            <tbody>
                              <tr align="left">
                                <td width="1006" height="78" colspan="5" align="center"><table width="1238" align="center" class="table table-hover responsive">
                                  <thead>
                                    <tr>
                                      <th width="24" style="text-align: center">No</th>
                                      <th  width="99" style="text-align: center">No Planing Produksi</th>
                                      <th  width="99" style="text-align: center">Tanggal Produksi</th>
                                      <th  width="70" style="text-align: center">Nama Produk</th>
                                      <th width="95" style="text-align: center">Aktual FG</th>
									  <th width="48" style="text-align: center">Tgl Drying</th>
									  <th width="80" style="text-align: center">Shift Drying</th>
									  <th width="50" style="text-align: center">Label</th>
									  <th width="65" style="text-align: center">Exp</th>
									                            
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM gudang_fg order by no asc");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td height="35" style="text-align: center"><?php echo "$no"?></td>
							          <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
                                     
                                      <td align="left" style="text-align: center"><?php echo "$r[tgl]"?></td>
                                      <td align="left" style="text-align: center"><?php echo "$r[nm_fg]"?></td>
                                     
                                      <td align="center" style="text-align: center"><?php echo "$r[fg]"?></td>
									<td align="center" style="text-align: center"><?php echo "$r[tgl_drying]"?></td>
									<td align="center" style="text-align: center"><?php echo "$r[shift_drying]"?></td>
									<td align="center" style="text-align: center"><?php echo "$r[label]"?></td>
								    <td align="center" style="text-align: center"><?php echo "$r[exp]"?></td>
									
                                    </tr>
                                    <?php
                         $no++;
					}
				
						?>
						
						
						
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
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

		<script>
		window.print();
	      </script>
