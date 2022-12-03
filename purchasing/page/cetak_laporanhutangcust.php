 <?php 
	include "../config/koneksi.php";
	?>
<h3>Data Hutang PT Raja Roti cemerlang</h3>
 
 <form action="cetak_laporanhutangcust.php" method="get">
 <div class="form-group">
                     <select class="form-control select2" id="cari" name="cari" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                   <?php
                $query = mysql_query("SELECT * FROM  vendor order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nama']; ?>">
                        <?php echo $row['nama']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
                      
					
                    </div>
     <input type="submit" value="Cari">
 </form>
  
 <?php 
 if(isset($_GET['cari'])){
     $cari = $_GET['cari'];
     echo "<b>Hasil pencarian : ".$cari."</b>";
 }
 ?>
  
 <table border="1">
     <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Jumlah Piutang</th>
         <th>NO Inv</th>
         <th>Hari Jatuh Tempo</th>
         <th>Tanggal Jatuh Tempo</th>
        
     </tr>
     <?php 
     if(isset($_GET['cari'])){
         $cari = $_GET['cari'];
         $data = mysql_query("select * from hutang where nama like '%".$cari."%'");				
     }else{
         $data = mysql_query("select * from hutang");		
     }
     if($data=== FALSE) {
        die(mysql_error());
        }
     $no = 1;
     while($d = mysql_fetch_array($data)){
     ?>
     <tr>
         <td><?php echo $no++; ?></td>
         <td><?php echo $d['nama']; ?></td>
         <td><?php echo "Rp. ". number_format("$d[sisa_hutang]",'0','.','.')?></td>
         <td><?php echo $d['no_inv']; ?></td>
         <td><?php echo $d['jatuh_tempo']; ?></td>
         <td><?php echo $d['tglmasuk']; ?></td>
        
         
     </tr>
     <?php } ?>
 </table>
