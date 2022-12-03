<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
<h2>Cetak Data Formula</h2>
		<h4>PT RAJA ROTI CEMERLANG	</h4>
<p>
	  <span style="font-size: 18px">
	  <?php 
	include "../config/koneksi.php";
	?>
</span></p>
		 <table width="641" border="1">
	  <tbody>
		 <?php
					
                    $tampil=mysql_query("SELECT * FROM ppic_form where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
		<tr>
	      <td width="242" height="28" style="font-size: large">PPIC ID</td>
	      <td width="781" style="font-size: large"><?php echo "$r[ppic_id]"?></td>
        </tr>
	    <tr>
			
	      <td style="font-size: large">NAMA PRODUK</td>
	      <td style="font-size: large"><?php echo "$r[nm_fg]"?></td>
        </tr>
		  
      </tbody>
			 
</table>

<p>&nbsp;</p>
<table width="645" border="0" align="center">
  <tbody>
	    <tr>
	    <h2>
	      <td colspan="0" style="font-size: xx-large">Nama Bahan Baku</td>
	    </h2>
		
	      <td width="145" style="font-size: xx-large"><span style="font-size: xx-large">Jumlah
	      </span>
	      <td width="90" colspan="1" style="font-size: xx-large"><span style="font-size: xx-large">Satuan
	    
	      </span>
	      <td colspan="0" style="text-align: center">&nbsp;</td>
	      <td width="1" style="text-align: center">          
	      <td width="1" colspan="1">          
    <tr>
		
    </tr>  
  <td width="361" height="55" style="font-size: xx-large"><?php echo "$r[r1]"?></td>
	      <td width="145" style="font-size: xx-large"><?php echo "$r[rm1]"?></td>
	      <td width="90" style="font-size: xx-large">KG</td>
	     <td width="21">&nbsp;</td>
	      
        </tr>
	    <tr>
	      <td height="58" style="font-size: xx-large">Premium Flour</td>
	      <td style="font-size: xx-large"><?php echo "$r[rm2]"?></td>
	      <td style="font-size: xx-large">KG</td>
		 <td width="21">&nbsp;</td>

  </tr>
	    <tr>
	      <td height="57" style="font-size: xx-large"><?php echo "$r[r3]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm3]"?></td>
	      <td style="font-size: xx-large">KG</td>
	     <td width="21">&nbsp;</td>
			
  </tr>
	      <tr>
	      <td height="59" style="font-size: xx-large"><?php echo "$r[r4]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm4]"?></td>
	      <td style="font-size: xx-large">KG</td>
	     <td width="21">&nbsp;</td>
  </tr>
	    <tr>
	      <td height="64" style="font-size: xx-large"><?php echo "$r[r5]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm5]"?></td>
	      <td style="font-size: xx-large">KG</td>
	    <td width="21">&nbsp;</td>
  </tr>
	    <tr>
	      <td height="66" style="font-size: xx-large"><?php echo "$r[r6]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm6]"?></td>
	      <td style="font-size: xx-large">KG</td>
		   <td width="21">&nbsp;</td>
  </tr>
	    <tr>
	      <td height="56" style="font-size: xx-large"><?php echo "$r[r7]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm7]"?></td>
	      <td style="font-size: xx-large">KG</td>
		  <td width="21">&nbsp;</td>
  </tr>
	    <tr>
	      <td height="56" style="font-size: xx-large"><?php echo "$r[r8]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm8]"?></td>
	      <td style="font-size: xx-large">KG</td>
		  <td width="21">&nbsp;</td>
  </tr>
	   
	    <tr>
	      <td height="52" style="font-size: xx-large"><?php echo "$r[r9]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm9]"?></td>
	      <td style="font-size: xx-large">KG</td>
			 <td width="21">&nbsp;</td>
  </tr>
	    <tr>
	      <td height="56" style="font-size: xx-large"><?php echo "$r[r10]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm10]"?></td>
	      <td style="font-size: xx-large">KG</td>
			 <td width="21">&nbsp;</td>
  </tr>
	    <tr style="font-size: 18px">
	      <td height="71" style="font-size: xx-large"><?php echo "$r[r11]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm11]"?></td>
	      <td style="font-size: xx-large">KG</td>
  </tr>
	    <tr style="font-size: 18px">
	      <td height="63" style="font-size: xx-large"><?php echo "$r[r12]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm12]"?></td>
	      <td style="font-size: xx-large">KG</td>
  </tr>
	    <tr style="font-size: 18px">
	      <td height="76" style="font-size: xx-large"><?php echo "$r[r13]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm13]"?></td>
	      <td style="font-size: xx-large">KG</td>
  </tr>
	   <tr style="font-size: 18px">
	      <td height="71" style="font-size: xx-large"><?php echo "$r[r14]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm14]"?></td>
	      <td style="font-size: xx-large">KG</td>
  </tr>
	   <tr style="font-size: 18px">
	      <td height="66" style="font-size: xx-large"><?php echo "$r[r15]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm15]"?></td>
	      <td style="font-size: xx-large">KG</td>
  </tr>
	     <tr style="font-size: 18px">
	      <td height="60" style="font-size: xx-large"><?php echo "$r[r16]"?></td>
	      <td style="font-size: xx-large"><?php echo "$r[rm16]"?></td>
	      <td style="font-size: xx-large">PCS</td>
  </tr>
		
	  
</table>

		  <?php
$no++;
	
					}
		 
		  
		  ?>
</p>
		<script>
		window.print();
	      </script>
