<?php
	include "koneksi.php";
?>
<form id="frm-mhs" name="example_form" action="" method="POST" data-validate="parsley" enctype="multipart/form-data">
	<h5>Tabel Data Mahasiswa</h5>
	<table width='25%' style='margin-left:1%' border='1px'>
		<tr>
			<td>NIM</td>
			<td>
				<select name="bank_k" id="nim" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NIM-</option>
					<?php 
					$result = mysql_query("select * from formula");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['id'] . '">' . $row['prod'] . '</option>';    
$jsArray .= "frm['" . $row['id'] . "'] = {
terigu:'" . addslashes($row['terigu']) . "',
gula:'".addslashes($row['gula'])."',
calcium:'".addslashes($row['calcium'])."',
instant_plus:'".addslashes($row['instant_plus'])."',
ragi:'".addslashes($row['ragi'])."',
softening:'".addslashes($row['softening'])."',
titanium:'".addslashes($row['titanium'])."',
sunset_yellow:'".addslashes($row['sunset_yellow'])."',
margarine:'".addslashes($row['margarine'])."',
premix1:'".addslashes($row['premix1'])."',
premix2:'".addslashes($row['premix2'])."',
premix3:'".addslashes($row['premix3'])."',
premix4:'".addslashes($row['premix4'])."',
premix5:'".addslashes($row['premix5'])."'};
";    
					}      
					?>    
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="harga" id="nama"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="harga" id="alamat"></td>
		</tr>
		<tr>
			<td>No. Telpon</td>
			<td><input type="text" name="harga" id="no_telp"></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><input type="text" name="harga" id="jrsn"></td>
		</tr>
	</table>
</form>
<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_prod){  
		document.getElementById('terigu').value = frm[no_prod].terigu;  
		document.getElementById('gula').value = frm[no_prod].gula; 
		document.getElementById('calcium').value = frm[no_prod].calcium;
		document.getElementById('instant_plus').value = frm[no_prod].instant_plus;
		document.getElementById('ragi').value = frm[no_prod].ragi;
		document.getElementById('softening').value = frm[no_prod].softening;
		document.getElementById('titanium').value = frm[no_prod].titanium;
		document.getElementById('sunset_yellow').value = frm[no_prod].sunset_yellow;
		document.getElementById('margarine').value = frm[no_prod].margarine;
		document.getElementById('premix1').value = frm[no_prod].premix1;
		document.getElementById('premix2').value = frm[no_prod].premix2;
		document.getElementById('premix3').value = frm[no_prod].premix3;
		document.getElementById('premix4').value = frm[no_prod].premix4;
		document.getElementById('premix5').value = frm[no_prod].premix5;
			};  
</script> 						