<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Print Kanban</title>
</head>

<body>
<table width="1215" height="1303" border="1">
  <tbody>
    <tr>
      <td width="518" height="1297"><h2>PLANING PRODUKSI</h2>
        <h4>PT RAJA ROTI CEMERLANG </h4>
        <p>
          <span style="text-align: left">
          <?php 
	include "../config/koneksi.php";
	?>
        </span></p>
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
            <tr>
              <td>Nama Leader</td>
              <td><?php echo "$r[leader]"?></td>
            </tr>
			   <tr>
              <td>Screen Produk</td>
              <td><?php echo "$r[screen]"?></td>
            </tr>
			  <tr>
              <td>Nama Customer</td>
              <td><?php echo "$r[nm_cust]"?></td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="518" height="644" border="0">
          <tbody>
            <tr>
              <h2>
                <td colspan="0">Racikan Formula</td>
              </h2>
              <td width="140" style="text-align: center"><span style="text-align: left">Jumlah
              </span>
              <td width="52" colspan="1"><span style="text-align: left">Satuan
                
              </span>
              <td style="text-align: center">Kode Exp</td>
              <td width="10" colspan="1">        
            <tr>
              <td width="154" height="32"><?php echo "$r[kode1]"?></td>
              <td width="140" style="text-align: center"><?php echo "$r[rm1]"?></td>
              <td width="52">KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode2]"?></td>
              <td style="text-align: center"><?php echo "$r[rm2]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode3]"?></td>
              <td style="text-align: center"><?php echo "$r[rm3]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode4]"?></td>
              <td style="text-align: center"><?php echo "$r[rm4]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode5]"?></td>
              <td style="text-align: center"><?php echo "$r[rm5]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode6]"?></td>
              <td style="text-align: center"><?php echo "$r[rm6]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode7]"?></td>
              <td style="text-align: center"><?php echo "$r[rm7]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode8]"?></td>
              <td style="text-align: center"><?php echo "$r[rm8]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode9]"?></td>
              <td style="text-align: center"><?php echo "$r[rm9]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode10]"?></td>
              <td style="text-align: center"><?php echo "$r[rm10]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode11]"?></td>
              <td style="text-align: center"><?php echo "$r[rm11]"?></td>
              <td>KG</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode12]"?></td>
              <td style="text-align: center"><?php echo "$r[rm12]"?></td>
              <td>KG</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode13]"?></td>
              <td style="text-align: center"><?php echo "$r[rm13]"?></td>
              <td>KG</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode14]"?></td>
              <td style="text-align: center"><?php echo "$r[rm14]"?></td>
              <td>KG</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[kode15]"?></td>
              <td style="text-align: center"><?php echo "$r[rm15]"?></td>
              <td>KG</td>
            </tr>
            <tr>
              <td height="32"><input type="text" value="<?php echo "$r[r16]"?>"></td>
              <td style="text-align: center"> <?php echo "$r[rm16]"?></td>
              <td>KG</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[r17]"?></td>
              <td style="text-align: center"><?php echo "$r[rm17]"?></td>
              <td>PCS</td>
            </tr>
            <tr>
              <td height="32"><?php echo "$r[r18]"?></td>
              <td style="text-align: center"><?php echo "$r[rm18]"?></td>
              <td>PCS</td>
            </tr>
        </table>
        <table width="443" border="0">
          <tbody>
            <tr style="text-align: center">
              <td width="122">Disiapkan Oleh,</td>
              <td width="161">Diterima Oleh,</td>
              <td width="146">Diketahui Oleh,</td>
            </tr>
            <tr>
              <td rowspan="3"><img src="../dist/img/sign.png" width="120" height="98"></td>
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
              <td style="text-align: center">SPV Logistik</td>
              <td style="text-align: center">Leader Produksi</td>
              <td style="text-align: center">Manager Produksi</td>
            </tr>
          </tbody>
        </table>
        <p>
          
      </p>
      <p>KENDALA MIXING :</p>
      <p>ABSENSI:</p>
      <table width="330" border="1">
        <tbody>
          <tr>
            <td width="61">SAKIT</td>
            <td width="48">&nbsp;</td>
            <td width="45">IZIN</td>
            <td width="37">&nbsp;</td>
            <td width="51">ALPHA</td>
            <td width="48">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <p>TEMUAN BENDA ASING :</p>
      <p>KESESUAIN PRODUK :</p></td>
      <td width="681"><h2>LAPORAN HASIL PRODUKSI</h2>
        <h4>PT RAJA ROTI CEMERLANG </h4>
        <p><span style="text-align: left">
     <?php
$no++;
	
					}
		 
		  
		  ?>  </span></p>
        <table width="367" border="0">
          <tbody>
            <?php
					
                    $tampil=mysql_query("SELECT * FROM planprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
            <tr>
              <td width="130" height="28">Kanban Number</td>
              <td width="148"><?php echo "$r[kanban]"?></td>
            </tr>
            <tr>
              <td>Jenis Oven</td>
              <td><?php echo "$r[jenis_oven]"?></td>
            </tr>
          </tbody>
        </table>
        <h1>LAPORAN HASIL PRODUKSI MIXING
          </p>
        </h1>
        <table width="684" border="1">
          <tbody>
            <?php
					
                    $tampil=mysql_query("SELECT * FROM planprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					
					                 
			       
                    ?>
             <tr style="text-align: center">
              <td width="147" style="text-align: center">No Plan</td>
              <td width="162" style="text-align: center">Nama Produk</td>
              <td width="43" style="text-align: center">Target Mixing</td>
				<td width="45" style="text-align: center">Actual Mixing</td>
				<td width="62" style="text-align: center">Shift</td>
            
				<td width="97" style="text-align: center">Tanggal</td>
            
				<td width="82" style="text-align: center">Keterangan</td
            </tr>
            <tr>
              <td><?php echo "$r[no_plan]"?></td>
              <td><?php echo "$r[nm_fg]"?></td>
              <td><?php echo "$r[batch1]"?></td>
				 <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><?php echo "$r[jumlahprod]"?></td>
				 <td>&nbsp;</td>
				
            </tr>
            <tr>
              <td><?php echo "$r[no_plan]"?></td>
              <td><?php echo "$r[nm_fg]"?></td>
              <td><?php echo "$r[batch1]"?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><?php echo "$r[jumlahprod]"?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><?php echo "$r[no_plan]"?></td>
              <td><?php echo "$r[nm_fg]"?></td>
              <td><?php echo "$r[batch1]"?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><?php echo "$r[jumlahprod]"?></td>
              <td>&nbsp;</td>
            </tr>
            <?php
				   }
					   ?>
          </tbody>
        </table>
        <table width="443" border="0">
          <tbody>
            <tr style="text-align: center">
              <td width="137">Dikerjakan Oleh,</td>
              <td width="146">Diketahui</td>
				 <td width="146">Diketahui</td>
            </tr>
            <tr>
              <td height="98">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center">Opt. Produksi</td>
              <td style="text-align: center">Spv. Prod</td>
              <td style="text-align: center">Manager Produksi</td>
            </tr>
          </tbody>
        </table>
        <h1>LAPORAN HASIL PRODUKSI DRYING
          </p>
        </h1>
        <table width="684" border="1">
          <tbody>
            <?php
					
                    $tampil=mysql_query("SELECT * FROM planprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					
					                 
			       
                    ?>
            <tr style="text-align: center">
              <td width="147" style="text-align: center">No Plan</td>
              <td width="162" style="text-align: center">Nama Produk</td>
              <td width="43" style="text-align: center">Target Drying</td>
				<td width="45" style="text-align: center">Jumlah Fg</td>
				<td width="62" style="text-align: center">Shift</td>
            
				<td width="97" style="text-align: center">Tanggal</td>
            
				<td width="82" style="text-align: center">Jumlah Limbah</td
            </tr>
            <tr>
              <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
              <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
			   <td style="text-align: center"><?php echo "$r[target_drying]"?></td>
              <td style="text-align: center"><?php echo "$r[fg]"?></td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
				 <td style="text-align: center">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
              <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
              <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
            </tr>
           
          </tbody>
        </table>
        <table width="443" border="0">
          <tbody>
            <tr>
              <td style="text-align: center"><table width="443" border="0">
                <tbody>
                  <tr style="text-align: center">
                    <td width="137">Dikerjakan Oleh,</td>
                    <td width="146">Diketahui,</td>
                    <td width="146">Diterima Oleh,</td>
                  </tr>
                  <tr>
                    <td rowspan="3"><p>&nbsp;</p>
                      <p>&nbsp;</p></td>
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
                    <td style="text-align: center">SPV &amp; Manager Produksi</td>
                    <td style="text-align: center">Spv. Gudang</td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
      </table>
        <table width="684" height="175" border="1">
          <tbody>
            <tr>
              <td width="178" height="71"><p>NO KANBAN MIXING</p>
              <p>NO KANBAN DRYING</p></td>
              <td width="490"><p>___ ___ ___ ___ ___ ___|___ ___|___ ___ ___|___ ___ ___</p>
              <p>___ ___ ___ ___ ___ ___|___ ___|___ ___ ___</p></td>
            </tr>
            <tr>
              <td height="49"><p>NO KANBAN MIXING</p>
              <p>NO KANBAN DRYING</p></td>
              <td><p>___ ___ ___ ___ ___ ___|___ ___|___ ___ ___|___ ___ ___</p>
              <p>___ ___ ___ ___ ___ ___|___ ___|___ ___ ___</p></td>
            </tr>
          </tbody>
        </table>
        <table width="443" border="0">
          <tbody>
          <tr>
            <td style="text-align: center"><table width="443" border="0">
              <tbody>
                <tr style="text-align: center">
                  <td width="137">Disiapkan Oleh,</td>
                  <td width="146">Diketahui,</td>
                  <td width="146">Diterima Oleh,</td>
                </tr>
                <tr>
                  <td rowspan="3"><p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p></td>
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
                  <td style="text-align: center">QC Dept</td>
                  <td style="text-align: center">Kepala QC/QA</td>
                  <td style="text-align: center">Spv. Gudang</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
        </tbody>
  </table>
    <p>KENDALA DRYING :</p>
    <p>ABSENSI:</p>
    <table width="330" border="1">
      <tbody>
        <tr>
          <td width="61">SAKIT</td>
          <td width="48">&nbsp;</td>
          <td width="45">IZIN</td>
          <td width="37">&nbsp;</td>
          <td width="51">ALPHA</td>
          <td width="48">&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <p>TOTAL LIMBAH :</p>
    <p>TEMUAN BENDA ASING :</p>
    <p>KESESUAIN PRODUK :</p></td>
    </tr>
     
  </tbody>
</table>
<?php
				   }
					   ?>
<?php
				   }
					   ?>




</body>
