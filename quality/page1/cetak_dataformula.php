
<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
<table width="540" border="0">
      <tbody>
        
      </tbody>
</table>
		<p style="font-style: inherit"><h2>FORMULA PRODUKSI</h2></p>
<p>
  <?php 
	include "../config/koneksi.php";
	?>
</p>
		 <table width="729" border="0">
	  <tbody>
		 <?php
					
                    $tampil=mysql_query("SELECT * FROM formula_new where no='$_GET[no]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
		<tr>
	      <td width="148" height="30">No Formula</td>
	      <td width="571"><?php echo "$r[no_form]"?></td>
        </tr>
		  <tr>
	      <td width="148" height="32">Tanggal Buat Formula</td>
	      <td width="571"><?php echo "$r[tgl]"?></td>
        </tr>
	    <tr>
			
	      <td height="35">Nama Produk</td>
	      <td><?php echo "$r[nm_fg]"?></td>
        </tr>
		  
      </tbody>
			 
</table>

<p>&nbsp;</p>
<table width="361" border="0">
           <tbody>
             <tr>
               <td width="174" style="text-align: left">NAMA BARANG</td>
               <td width="172" style="text-align: left">JUMLAH (kg)</td>
               <td width="10" style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r1]"?></td>
               <td style="text-align: center"><?php echo "$r[rm1]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r2]"?></td>
               <td style="text-align: center"><?php echo "$r[rm2]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r3]"?></td>
               <td style="text-align: center"><?php echo "$r[rm3]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r4]"?></td>
               <td style="text-align: center"><?php echo "$r[rm4]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
			  <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r5]"?></td>
               <td style="text-align: center"><?php echo "$r[rm5]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r6]"?></td>
               <td style="text-align: center"><?php echo "$r[rm6]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
              <td height="41" style="text-align: left"><?php echo "$r[r7]"?></td>
               <td style="text-align: center"><?php echo "$r[rm7]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r8]"?></td>
               <td style="text-align: center"><?php echo "$r[rm8]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r9]"?></td>
               <td style="text-align: center"><?php echo "$r[rm9]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r10]"?></td>
               <td style="text-align: center"><?php echo "$r[rm10]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r11]"?></td>
               <td style="text-align: center"><?php echo "$r[rm11]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r12]"?></td>
               <td style="text-align: center"><?php echo "$r[rm12]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r13]"?></td>
               <td style="text-align: center"><?php echo "$r[rm13]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r14]"?></td>
               <td style="text-align: center"><?php echo "$r[rm14]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
            
                          
           </tbody>
</table>
<p>&nbsp;</p>
<table width="645" border="0">
  <tbody>
	   
        </table></td>
	      </tr>
		</tbody>
</table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>
		  <?php
$no++;
	
					}
		 
		  
		  ?>
</p>
		<script>
		window.print();
	      </script>
