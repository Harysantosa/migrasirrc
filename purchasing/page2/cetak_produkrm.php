<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
		<h1 align="center">CETAK DATA PRODUKSI	</h1>
		<h4 align="center">PT RAJA ROTI CEMERLANG	</h4>
	<p>
	  <?php 
	include "../config/koneksi.php";
	?>
</p>
		              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                    <table width="900" border="3" class="table table-hover responsive">
                      <tbody>
                        <tr>
                          <td width="804" height="149" colspan="5" align = "left"><table width="1014" align="center" class="table table-hover responsive">
                            <tbody>
                              <tr align="left">
                                <td width="1006" colspan="5" align="left"><table width="961" align="" class="table table-hover responsive">
                                  <thead>
                                    <tr>
                        <th width="37" style="text-align: center">No</th>
                        <th width="178" style="text-align: center">Nomor PO</th>
						<th width="138" style="text-align: center">Nama Vendor</th>
						<th width="211" style="text-align: center">Jenis Barang</th>
						<th width="116" style="text-align: center">Jumlah Barang</th>  
						<th width="98" style="text-align: center">Jumlah (KG)</th>
						<th width="122" style="text-align: center">Tanggal PO</th>
						<th width="139" style="text-align: center">Tanggal Datang</th>
						
						
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM produkrm order by id_produk asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						<td style="text-align: center"><?php echo "$r[no_po]"?></td>
						<td style="text-align: center"><?php echo "$r[nama_vendor]"?></td>
                        <td style="text-align: center"><?php echo "$r[nm_rm]"?></td>
                        <td style="text-align: center"><?php echo "$r[jumlah_barang]"?></td>
                        <td style="text-align: center"><?php echo "$r[jumlah_kg]"?></td>
                        <td style="text-align: center"><?php echo "$r[tglmasuk]"?></td>
						<td style="text-align: center"><?php echo "$r[tgldatang]"?></td>
                      
							
                           </tr>
						<?php
                    $no++;
                    }
                    ?>
					
			
               </tbody>
                  </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
</p>
		<script>
		window.print();
	      </script>
