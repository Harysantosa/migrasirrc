<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
		<h1 align="center">MUTASI REKENING	</h1>
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
                                      <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>No rek</th>
                        <th>Saldo Awal</th>
						<th>Jenis Kas</th>
                        <th>Keterangan</th>
                        <th>Nominal/Jumlah</th>
						
                        
									  
								      </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT saldo.*,tblkasmasuk.*,tblkasmasuk.nama as namamasuk, tblkaskeluar.*,
                    tblkaskeluar.nama as namakeluar, tbljeniskas.* FROM saldo LEFT  join tblkasmasuk  on saldo.id_kasmasuk=tblkasmasuk.id_kasmasuk LEFT join tblkaskeluar ON tblkaskeluar.id_kaskeluar=saldo.id_kaskeluar INNER JOIN
                    tbljeniskas ON saldo.id_jeniskas=tbljeniskas.id_jeniskas GROUP BY saldo.no_trans");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					
					
                   
			       
                    ?>
                                    <tr align="center">
                                      <tr>
                        <td align="center"><?php echo "$no"?></td>
                        <td align="center"><?php echo "$r[no_trans]"?></td>
						<td align="center"><?php echo "$r[no_rek]"?></td>
						<td align="center"><?php echo "Rp. ". number_format("$r[saldo]",'0','.','.')?></td>
                        <td align="center"><?php echo "$r[namajeniskas]"?></td>
                        <td align="center"><?php echo "$r[ket]"?></td>
                        <td align="center"><?php echo "Rp. ". number_format("$r[nominal]",'0','.','.')?></td>
						
                                      								
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
</p>
		<script>
		window.print();
	      </script>
