<!DOCTYPE html>

<html>
<head>
	
</head>
<body>
 
	<left>
 
<table width="540" border="0">
      <tbody>
        <tr>
          <td width="238"><img src="../dist/img/rrc.png" width="222" height="140"></td>
          <td width="292"><p style="font-style: inherit">&nbsp;</p></td>
        </tr>
      </tbody>
</table>
<form id="form1" name="form1" method="post">
</form>
<h2>Cetak Data PPIC PT Raja Roti Cemerlang</h2>
		</p>
<p>
  <?php 
	include "../config/koneksi.php";
	?>
	
</p>
	
    <tr>
		<?php
			include("indo.php");		
                    $tampil=mysql_query("SELECT * FROM ppic_jml where id");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					
				
                    ?> 
		
<table width="468" border="1">
  <tbody>
	  
	Tanggal Planing :<?php echo TanggalIndo($r['tgl'])?>
	    <p>
	Untuk Shift 1 2 3
	  <p>
      <td><?php echo "$r[ppic_id]"?></td>
	<td>Jumlah Barang Dalam Satuan KG</td>
	<td>Jumlah Harga</td>	
    </tr>
		
    <tr>
      <td width="113"><?php echo "$r[r1]"?> </td>
      <td width="164"><?php echo "$r[rm1]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r1]"?></td>
      <td><?php echo "$r[rm1]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r2]"?></td>
      <td width="164"><?php echo "$r[rm2]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r3]"?></td>
      <td><?php echo "$r[rm3]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r4]"?></td>
      <td width="164"><?php echo "$r[rm4]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r5]"?></td>
      <td><?php echo "$r[rm5]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r6]"?></td>
      <td width="164"><?php echo "$r[rm6]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r7]"?></td>
      <td><?php echo "$r[rm7]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r8]"?></td>
      <td width="164"><?php echo "$r[rm8]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r9]"?></td>
      <td><?php echo "$r[rm9]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r10]"?></td>
      <td width="164"><?php echo "$r[rm10]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r11]"?></td>
      <td><?php echo "$r[rm11]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r12]"?></td>
      <td width="164"><?php echo "$r[rm12]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r13]"?></td>
      <td><?php echo "$r[rm13]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r14]"?></td>
      <td width="164"><?php echo "$r[rm14]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r15]"?></td>
      <td><?php echo "$r[rm15]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r16]"?></td>
      <td width="164"><?php echo "$r[rm16]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r17]"?></td>
      <td><?php echo "$r[rm17]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r18]"?></td>
      <td width="164"><?php echo "$r[rm18]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r19]"?></td>
      <td><?php echo "$r[rm19]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r20]"?></td>
      <td width="164"><?php echo "$r[rm20]"?></td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r21]"?></td>
      <td><?php echo "$r[rm21]"?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo "$r[r22]"?></td>
      <td width="164"><?php echo "$r[rm22]"?></td>
      <td width="169">&nbsp;</td>
		<?php
                         $no++;
					}
				
						?>
    </tr>
    
	     
	
	
  </tbody>
	
</table>
	
<p>&nbsp;</p>
		 <p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>
		 
</p>
<script>
		window.print();
	      </script>
