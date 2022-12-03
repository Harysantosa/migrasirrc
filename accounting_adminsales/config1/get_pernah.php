<?php
include "../config/koneksi.php";

$id_pernah= $_GET['id_pernah'];
$hasil = mysql_query("SELECT a.id_alasan_tidak_kerja, a.alasan_tidak_kerja
from apa_pernah_kerja as s, alasan_tidak_kerja as a
  where s.id_pernah=a.id_pernah
  and s.id_status='id_pernah'");
  
echo "<option>---- Pilih ----</option>";
 
while($k = mysql_fetch_array($hasil)){
   	echo "<option value='$k[0],$k[1]'> " . ucwords($k[1]) ."</option>";
}
?>


