<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Print Kanban</title>
</head>

<body>
<table rules="all" width="1215" height="1303" border="1">
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
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM planingprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
            <tr>
              <td width="130" height="28">No Plan Prod</td>
              <td width="148"><?php echo "$r[plan_prod]"?></td>
            </tr>
            <tr>
              <td>Nama Produk</td>
              <td><?php echo "$r[nm_fg]"?></td>
            </tr>
            <tr>
              <td>Tanggal Produksi</td>
              <td><?php echo TanggalIndo($r['tgl'])?></td>
            </tr>
            <tr>
              <td>Shift</td>
              <td><?php echo "$r[shift]"?></td>
            </tr>
            <tr>
              <td>Jumlah Batch</td>
              <td><?php echo "$r[lot]"?></td>
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
         <!-- terigu standart -->
              <td width="154" height="32">RM-A</td>
              <td width="140" style="text-align: center"><?php echo "$r[jmlt1]"?></td>
              <td width="52">KG</td>
              <td width="86">&nbsp;</td>
            </tr>
			    <tr>
            <!-- terigu premium -->
              <td width="154" height="32">RM-B</td>
              <td width="140" style="text-align: center"><?php echo "$r[jmlt2]"?></td>
              <td width="52">KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PRXA -->
              <td width="154" height="32">RM-01</td>
              <td width="140" style="text-align: center"><?php echo "$r[jml1]"?></td>
              <td width="52">KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <!-- PRXB -->
              <td height="32">RM-02</td>
              <td style="text-align: center"><?php echo "$r[jml2]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PRXC -->
              <td height="32">RM-03</td>
              <td style="text-align: center"><?php echo "$r[jml3]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PRXD -->
              <td height="32">RM-04</td>
              <td style="text-align: center"><?php echo "$r[jml4]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PRXE -->
              <td height="32">RM-05</td>
              <td style="text-align: center"><?php echo "$r[jml5]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
              <!-- PR01 -->
              <td height="32">RM-06</td>
              <td style="text-align: center"><?php echo "$r[jml6]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PR02 -->
              <td height="32">RM-07</td>
              <td style="text-align: center"><?php echo "$r[jml7]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PR03 -->
              <td height="32">RM-08</td>
              <td style="text-align: center"><?php echo "$r[jml8]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PR04 -->
              <td height="32">RM-09</td>
              <td style="text-align: center"><?php echo "$r[jml9]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PR05 -->
              <td height="32">RM-10</td>
              <td style="text-align: center"><?php echo "$r[jml10]"?></td>
              <td>KG</td>
              <td width="86">&nbsp;</td>
            </tr>
            <tr>
               <!-- PR06 -->
              <td height="32">RM-11</td>
              <td style="text-align: center"><?php echo "$r[jml11]"?></td>
              <td>KG</td>
            </tr>
            <tr>
               <!-- PR07 -->
              <td height="32">RM-12</td>
              <td style="text-align: center"><?php echo "$r[jml12]"?></td>
              <td>KG</td>
            </tr>
            <tr>
               <!-- PR08 -->
              <td height="32">RM-13</td>
              <td style="text-align: center"><?php echo "$r[jml13]"?></td>
              <td>KG</td>
            </tr>
            <tr>
               <!-- Ragi -->
              <td height="32">RM-14</td>
              <td style="text-align: center"><?php echo "$r[jml14]"?></td>
              <td>KG</td>
            </tr>
            <tr>
               <!-- shortening -->
              <td height="32"><?php echo "$r[r15]"?></td>
              <td style="text-align: center"><?php echo "$r[jml15]"?></td>
              <td>PCS</td>
            </tr>
            <tr>
               <!-- margarine -->
              <td height="32"><?php echo "$r[r16]"?></td>
              <td style="text-align: center"> <?php echo "$r[jml16]"?></td>
              <td>PCS</td>
            </tr>
            <tr>
               <!-- prx09 -->
              <td height="32"><?php echo "$r[r17]"?></td>
              <td style="text-align: center"><?php echo "$r[jml17]"?></td>
              <td>PCS</td>
            </tr>
            <tr>
               <!-- label -->
              <td height="32"><?php echo "$r[r18]"?></td>
              <td style="text-align: center"><?php echo "$r[rm18]"?></td>
              <td>PCS</td>
            </tr>
            <tr>
               <!-- palstik luar -->
              <td height="32"><?php echo "$r[r19]"?></td>
              <td style="text-align: center"><?php echo "$r[rm19]"?></td>
              <td>PCS</td>
            </tr>
            <tr>
               <!-- plastik dalam -->
              <td height="32"><?php echo "$r[r20]"?></td>
              <td style="text-align: center"><?php echo "$r[rm20]"?></td>
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
              <td rowspan="3"><img src="ttd.png" alt="TTD" style="width:80px;height:80px;"></td>
              <td rowspan="3"></td>
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
      <table rules="all" width="330" border="1">
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
					
                    $tampil=mysql_query("SELECT * FROM planingprod where id='$_GET[id]'");
            	 $no = 1;
			       $r=mysql_fetch_array($tampil);{
					       
			       
                    ?>
            <tr>
              <td width="130" height="28">Kanban Number</td>
              <td width="148"><?php echo "$r[plan_prod]"?></td>
            </tr>
            <tr>
              <td>Jenis Oven</td>
              <td><?php echo "$r[oven]"?></td>
            </tr>
          </tbody>
        </table>
        <h1>LAPORAN HASIL PRODUKSI MIXING
          </p>
        </h1>
        <table rules="all" width="684" border="1">
          <tbody>
            <?php
					
                    $tampil=mysql_query("SELECT * FROM planingprod where id='$_GET[id]'");
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
            ></tr>
            <tr>
              <td><?php echo "$r[plan_prod]"?></td>
              <td><?php echo "$r[nm_fg]"?></td>
              <td><?php echo "$r[lot]"?></td>
				 <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
				 <td>&nbsp;</td>
				
            </tr>
            <tr>
              <td><?php echo "$r[plan_prod]"?></td>
              <td><?php echo "$r[nm_fg]"?></td>
              <td><?php echo "$r[lot]"?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><?php echo "$r[plan_prod]"?></td>
              <td><?php echo "$r[nm_fg]"?></td>
              <td><?php echo "$r[lot]"?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
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
        <table rules="all" width="684" border="1">
          <tbody>
            <?php
					
                    $tampil=mysql_query("SELECT * FROM planingprod where id='$_GET[id]'");
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
            ></tr>
            <tr>
              <td style="text-align: center"><?php echo "$r[plan_prod]"?></td>
              <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
			   <td style="text-align: center"></td>
              <td style="text-align: center"></td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
				 <td style="text-align: center">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center"><?php echo "$r[plan_prod]"?></td>
              <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
              <td style="text-align: center">&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center"><?php echo "$r[plan_prod]"?></td>
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
        <table rules="all" width="684" height="175" border="1">
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
                  <td width="137">Diterima Oleh,</td>
                  <td width="146">&nbsp;</td>
                  <td width="146">&nbsp;</td>
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
                  <td style="text-align: center">Spv. Gudang</td>
                  <td style="text-align: center">&nbsp;</td>
                  <td style="text-align: center">&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
        </tbody>
  </table>
    <p>KENDALA DRYING :</p>
    <p>ABSENSI:</p>
    <table rules="all" width="330" border="1">
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
