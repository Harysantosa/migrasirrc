<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
<table width="540" border="0">
      <tbody>
        <tr>
          <td><img src="../dist/img/1.png" width="290" height="83"/></td>
          <td><p style="font-style: inherit">&nbsp;</p></td>
        </tr>
      </tbody>
</table>
<p style="font-style: inherit">
<h2>Data Raw Material Keluar</h2>
		</p>
<p>
  <?php 
	include "../config/koneksi.php";
	?>
</p>
		 <table width="367" border="0">
	  <tbody>
		 <?php
					
                    $tampil=mysql_query("SELECT * FROM gudang_rm where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
		<tr>
	      <td width="130">No Plan Produksi</td>
	      <td width="148"><?php echo "$r[no_plan]"?></td>
        </tr>
		  <tr>
	      <td width="130">Tanggal Keluar RM</td>
	      <td width="148"><?php echo "$r[tgl]"?></td>
        </tr>
	    <tr>
			
	      <td>Formula Produk</td>
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
             <tr>
               <td height="41" style="text-align: left"><?php echo "$r[r15]"?></td>
               <td style="text-align: center"><?php echo "$r[rm15]"?></td>
               <td style="text-align: center">&nbsp;</td>
             </tr>
                          
           </tbody>
</table>
<p>&nbsp;</p>
<table width="350" border="0">
  <tbody>
    <tr>
      <td style="text-align: center">Mengetahui</td>
      <td style="text-align: center">Disetujui</td>
	  
    </tr>
	 <tr>
      <td style="text-align: center">&nbsp;</td>
      <td style="text-align: center">&nbsp;</td>
	  
    </tr>
	  <tr>
      <td style="text-align: center">&nbsp;</td>
      <td style="text-align: center">&nbsp;</td>
	  
    </tr>
	   <tr>
      <td style="text-align: center">&nbsp;</td>
      <td style="text-align: center">&nbsp;</td>
	  
    </tr>
	   <tr>
      <td style="text-align: center">Dept. Production</td>
      <td style="text-align: center">Dept. Warehouse</td>
	  
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
