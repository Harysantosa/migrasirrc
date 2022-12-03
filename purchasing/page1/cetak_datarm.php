<!DOCTYPE html>

<html>
<head>
	
<meta charset="utf-8">
<style type="text/css">
body {
	margin-left: 0cm;
	margin-top: 0cm;
	margin-right: 0cm;
	margin-bottom: 0cm;
}
</style>
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
                    <table width="1037" border="4" >
                      <tbody>
                        <tr>
                          <td width="100" height="149" colspan="5" align = "center"><table width="1003" align="left" class="table table-hover responsive">
                            <tbody>
                              <tr align="left">
                                <td width="1485" height="78" colspan="5" align="center"><table width="982" align="center" class="table table-hover responsive">
                                  <thead>
                                    <tr>
                     <th width="20" height="60" align="center" valign="top" style="font-weight: 8">No</th>
                                      <th  width="61" align="center" valign="top" style="font-weight: 8">No Planing Produksi</th>
                                      <th  width="54" align="center" valign="top" style="font-weight: 8">Tanggal Produksi</th>
                                      <th  width="45" align="center" valign="top" style="font-weight: 8">Nama Produk</th>
									   <th  width="35" align="center" valign="top" style="font-weight: 8">Batch</th>
                                      <th width="41" align="center" valign="top" style="font-weight: 8">Nama Terigu</th>
									  <th width="45" align="center" valign="top" style="font-weight: 8">Jumlah Terigu</th>
									  <th width="32" align="center" valign="top" style="font-weight: 8">Gula Pasir</th>	
									  <th width="49" align="center" valign="top" style="font-weight: 8">Calcium</th>
									  <th width="44" align="center" valign="top" style="font-weight: 8">Instant Plus</th>	
									  <th width="27" align="center" valign="top" style="font-weight: 8">Ragi</th>	
									  <th width="63" align="center" valign="top" style="font-weight: 8">Shoftening</th>
										<th width="51" align="center" valign="top" style="font-weight: 8">Titanium</th>	
										<th width="44" align="center" valign="top" style="font-weight: 8">Sunset Yellow</th>	
										<th width="62" align="center" valign="top" style="font-weight: 8">Margarine</th>	
										<th width="50" align="center" valign="top" style="font-weight: 8">Premix 1</th>	
										<th width="46" align="center" valign="top" style="font-weight: 8">Premix 2</th>	
										<th width="46" align="center" valign="top" style="font-weight: 8">Premix 3</th>
										<th width="46" align="center" valign="top" style="font-weight: 8">Premix 4</th>
									    <th width="163" align="center" valign="top" style="font-weight: 8">Premix 5</th>
                                      
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM gudang_rm1 order by id asc");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					?>
                                    <tr align="left">
                                      <th height="72" align="left" valign="top" style="text-align: center"><strong><?php echo "$no"?></strong></th>
							          <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[no_plan]"?></strong></th>
                                      <th align="left" valign="top" style="text-align: center"><strong><?php echo TanggalIndo($r['tgl'])?></strong></th>
                                      <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[prod1]"?></strong></th>
                                      <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[batch]"?></strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[r1]"?></strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[terigu]"?> KG</strong></th>
								      <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[gula]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[calcium]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[instant_plus]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[ragi]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[softening]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[titanium]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[sunset_yellow]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[margarine]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[premix1]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[premix2]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[premix3]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[premix4]"?> KG</strong></th>
									  <th align="left" valign="top" style="text-align: center"><strong><?php echo "$r[premix5]"?> KG</strong></th>
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
                    <p>&nbsp;</p>
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
		
		window.print(page);
		
	      </script>
