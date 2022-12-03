 <?php 
	include "../config/koneksi.php";
	?>
<h3>Data Piutang PT Raja Roti cemerlang</h3></h3>
 
 <form action="cetak_laporanpiutangcust.php" method="get">
 <div class="form-group">
                     <select class="form-control select2" id="cari" name="cari" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                   <?php
                $query = mysql_query("SELECT * FROM  customer order by id asc");
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
         <th>Sisa Piutang</th>
         <th>NO Inv</th>
         <th>Hari Jatuh Tempo</th>
         <th>Tanggal Jatuh Tempo</th>
         <th>Nominal Piutang</th>
         <th>Metode Pembayaran</th>
     </tr>
     <?php 
     if(isset($_GET['cari'])){
         $cari = $_GET['cari'];
         $data = mysql_query("select * from piutang where nm_cust like '%".$cari."%'");				
     }else{
         $data = mysql_query("select * from piutang");		
     }
     if($data=== FALSE) {
        die(mysql_error());
        }
     $no = 1;
     while($d = mysql_fetch_array($data)){
     ?>
     <tr>
         <td><?php echo $no++; ?></td>
         <td><?php echo $d['nm_cust']; ?></td>
         <td><?php echo "Rp. ". number_format("$d[piutang]",'0','.','.')?></td>
         <td><?php echo $d['no_inv']; ?></td>
         <td><?php echo $d['tempo']; ?></td>
         <td><?php echo $d['tgl_tempo']; ?></td>
         <td><?php echo $d['nominal']; ?></td>
         <td><?php echo $d['metode_pembayaran']; ?></td>
         
     </tr>
     <?php } ?>
 </table>
