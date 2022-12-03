<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
<h2>PLANING PRODUKSI</h2>
		<h4>PT SEGARA PANGAN SAKINAH	</h4>
	<p>
	  <?php 
	include "../config/koneksi.php";
	?>
</p>
		 <table width="367" border="0">
	  <tbody>
		 <?php
					
                    $tampil=mysql_query("SELECT * FROM planprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
		<tr>
	      <td width="130" height="28">No Plan Prod</td>
	      <td width="148"><?php echo "$r[no_plan]"?></td>
        </tr>
	    <tr>
			
	      <td>Nama Produk</td>
	      <td><?php echo "$r[nm_fg]"?></td>
        </tr>
	    <tr>
	      <td>Tanggal Produksi</td>
	      <td><?php echo "$r[tgl]"?></td>
        </tr>
	    <tr>
	      <td>Shift</td>
	      <td><?php echo "$r[shift]"?></td>
        </tr>
	    <tr>
	      <td>Jumlah Batch</td>
	      <td><?php echo "$r[batch1]"?></td>
        </tr>
		  
      </tbody>
			 
</table>

<table width="645" border="0">
  <tbody>
	    <tr>
	    <h2><td colspan="0">Racikan Formula</td></h2>
		
	      <td width="233" style="text-align: center">Jumlah
	      <td width="48" colspan="1">Satuan
	    
	      <td colspan="0" style="text-align: center">Kode Exp</td>
	      <td style="text-align: center">          
	      <td colspan="1">          
    <tr>
		
	    </tr>  
  <td width="264" height="32"><span style="text-align: center"><?php echo "$r[r1]"?></span></td>
	      <td width="31" style="text-align: center"><?php echo "$r[rm1]"?></td>
	      <td width="47">KG</td>
	     <td width="233">&nbsp;</td>
	      
        </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r2]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm2]"?></td>
	      <td>KG</td>
		 <td width="233">&nbsp;</td>

        </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r3]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm3]"?></td>
	      <td>KG</td>
	     <td width="233">&nbsp;</td>
			
        </tr>
	      <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r4]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm4]"?></td>
	      <td>KG</td>
	     <td width="233">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r5]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm5]"?></td>
	      <td>KG</td>
	    <td width="233">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r6]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm6]"?></td>
	      <td>KG</td>
		   <td width="233">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r7]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm7]"?></td>
	      <td>KG</td>
		  <td width="233">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r8]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm8]"?></td>
	      <td>KG</td>
		  <td width="233">&nbsp;</td>
		</tr>
	   
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r9]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm9]"?></td>
	      <td>KG</td>
			 <td width="233">&nbsp;</td>
    </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r10]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm10]"?></td>
	      <td>KG</td>
			 <td width="233">&nbsp;</td>
    </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r11]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm11]"?></td>
	      <td>KG</td>
    </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r12]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm12]"?></td>
	      <td>KG</td>
    </tr>
	    <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r13]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm13]"?></td>
	      <td>KG</td>
    </tr>
	   tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r14]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm14]"?></td>
	      <td>KG</td>
    </tr>
	   <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r15]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm15]"?></td>
	      <td>KG</td>
    </tr>
	     <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r16]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm16]"?></td>
	      <td>KG</td>
    </tr>
		<tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r17]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm17]"?></td>
	      <td>KG</td>
    </tr>
	  <tr>
	      <td height="32"><span style="text-align: center"><?php echo "$r[r18]"?></span></td>
	      <td style="text-align: center"><?php echo "$r[rm18]"?></td>
	      <td>KG</td>
    </tr>
	  
		</table>
<p>&nbsp;</p>
<table width="443" border="0">
  <tbody>
    <tr style="text-align: center">
      <td width="137">Disiapkan Oleh,</td>
      <td width="146">Diterima Oleh,</td>
	<td width="146">Diketahui Oleh,</td>
    </tr>
    <tr>
      <td rowspan="3">&nbsp;</td>
      <td rowspan="3">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center">Logistik</td>
      <td style="text-align: center">Produksi</td>
      <td style="text-align: center">SPV. Logistik</td>
    </tr>
  </tbody>
</table>
<h1>LAPORAN HASIL PRODUKSI MIXING
  </p>
</h1>
<table width="507" border="1">
		  <tbody>
			   <?php
					
                    $tampil=mysql_query("SELECT * FROM planprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					
					                 
			       
                    ?>
		    <tr style="text-align: center">
		     
		      <td width="177">No Plan</td>
		      <td width="170">Nama Produk</td>
		      <td width="74">Jumlah Batch</td>
	        </tr>
		    <tr>
		      
		      <td><?php echo "$r[no_plan]"?></td>
		      <td><?php echo "$r[nm_fg]"?></td>
		      <td><?php echo "$r[jumlahprod]"?></td>
	        </tr>
			  <?php
				   }
					   ?>
	      </tbody>
</table>
<p>&nbsp;</p>
<table width="443" border="0">
  <tbody>
    <tr style="text-align: center">
      <td width="137">Dikerjakan Oleh,</td>
      <td width="146">Diketahui</td>
    </tr>
    <tr>
      <td rowspan="3">&nbsp;</td>
      <td rowspan="3">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center">Opt. Produksi</td>
      <td style="text-align: center">Spv. Prod</td>
      <td style="text-align: center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<h1>LAPORAN HASIL PRODUKSI DRYING</p></h1>
		<table width="517" border="1">
		  <tbody>
			   <?php
					
                    $tampil=mysql_query("SELECT * FROM planprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					
					                 
			       
                    ?>
		    <tr style="text-align: center">
		      
		      <td width="208">No Plan</td>
		      <td width="187">Nama Produk</td>
		      <td width="100">Jumlah FG</td>
	        </tr>
		    <tr>
		    
		      <td><?php echo "$r[no_plan]"?></td>
		      <td><?php echo "$r[nm_fg]"?></td>
		      <td><?php echo "$r[fg]"?></td>
	        </tr>
			   <?php
				   }
					   ?>
	      </tbody>
</table>
		<p>&nbsp;</p>
		<table width="443" border="0">
		<tbody>
		  <tr>
		    <td style="text-align: center"><table width="443" border="0">
		      <tbody>
		        <tr style="text-align: center">
		          <td width="137">Dikerjakan Oleh,</td>
		          <td width="146">Diterima Oleh,</td>
				 <td width="146">Diketahui Oleh,</td>
	            </tr>
		        <tr>
		          <td rowspan="3">&nbsp;</td>
		          <td rowspan="3">&nbsp;</td>
		          <td>&nbsp;</td>
	            </tr>
		        <tr>
		          <td>&nbsp;</td>
	            </tr>
		        <tr>
		          <td>&nbsp;</td>
	            </tr>
		        <tr>
		          <td style="text-align: center">Opt. Produksi</td>
		          <td style="text-align: center">Logistik</td>
		          <td style="text-align: center">Spv. Gudang</td>
	            </tr>
	          </tbody>
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
