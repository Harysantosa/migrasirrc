<?php
mysql_connect('localhost','root','');
mysql_select_db('aplikasi_stok');


$kd = $_GET[''];
	//Checks if the username is available or not
	$query = "SELECT stok FROM stok_rm WHERE stok='$kd'";
	$result = mysql_query($query);
	$jum = mysql_num_rows($result);
	if ($jum <= 1) {
		echo "<span style='color:red; padding-left:4px;'><i class='fa fa-warning'></i> Kode Barang Sudah Tersedia</span>";
	}
	
		 else{ 	  $query = mysql_query("INSERT INTO gudang_rm VALUES ('','$_POST[no_plan]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[nm_fg]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]')");
		  		  
		  		
                echo "<script>window.location='home.php?pg=gudangrm&act=view'</script>";
              }
             
	




?>