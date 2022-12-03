<style type="text/css">
  <!--
  .style2 {
    font-family: Verdana, Arial, Helvetica, sans-serif
  }
  -->
</style>
<title>Cetak PO</title>
<?php
include "../config/koneksi.php";
?>
<title>Cetak PO</title>
<table width="776" height="285" border="0">
  <?php

  $tampil = mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'");
  $no = 1;
  $r = mysql_fetch_array($tampil); {


  ?>
    <tr>
      <td colspan="3"><span class="style2">PT RAJA ROTI CEMERLANG</span></td>
      <td colspan="3" rowspan="2">
        <h1 align="center" class="style2">PURCHASE ORDER</h1>
      </td>
    </tr>
    <tr>
      <td height="73" colspan="3"><span class="style2">Kp Pulo Kendal Desa Setia Asih, Kecamatan Tarumajaya Kabupaten Bekasi</span></td>
    </tr>
    <tr>
      <td height="40" colspan="3" bgcolor="#FFFF00">
        <div align="center"><strong>SUPLIER DETAIL INFO </strong></div>
      </td>
      <td width="151">No Po </td>
      <td width="8">:</td>
      <td width="224"><?php echo "$r[no_po]" ?></td>
    </tr>
    <tr>
      <td width="112" height="37">Nama</td>
      <td width="8">:</td>
      <td width="233"><?php echo "$r[nama]" ?></td>
      <td>Tanggal PO </td>
      <td>:</td>
      <td><?php echo "$r[tglmasuk]" ?></td>
    </tr>
    <tr>
      <td height="39">Alamat</td>
      <td>:</td>
      <td><?php echo "$r[alamat]" ?></td>
      <td>Metode Pembayaran </td>
      <td>:</td>
      <td><?php echo "$r[metode]" ?></td>
    </tr>
    <tr>
      <td height="39">Up to </td>
      <td>:</td>
      <td><?php echo "$r[pic]" ?></td>
      <td>Tempo Pembayaran</td>
      <td>:</td>
      <td><?php echo "$r[jatuh_tempo]" ?> Days</td>
    </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan="6">________________________________________________________________________________________________</td>
  </tr>
</table>
<table width="777" height="180" border="0">
  <?php

  $tampil1 = mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'");
  $no1 = 1;
  $r1 = mysql_fetch_array($tampil1); {


  ?>
    <tr>
      <td colspan="4" bgcolor="#0066CC">
        <div align="center"><strong>ORDER DETAIL </strong></div>
      </td>
    </tr>
    <tr>
      <td bgcolor="#0066CC">
        <div align="left"><strong><span class="style2">NAMA BARANG </span></strong></div>
      </td>
      <td bgcolor="#0066CC">
        <div align="left"><strong>JUMLAH QTY </strong></div>
      </td>
      <td bgcolor="#0066CC">
        <div align="left"><strong>HARGA SATUAN </strong></div>
      </td>
      <td bgcolor="#0066CC">
        <div align="left"><strong>TOTAL HARGA </strong></div>
      </td>
    </tr>
    <tr>
      <td height="34"><?php echo "$r1[nama_rm1]" ?></td>
      <td><?php echo "$r1[jumlah_barang1]" ?></td>
      <td>Rp <?php echo "" . number_format("$r[harga_perbarang1]") ?></td>
      <td>Rp <?php echo "" . number_format("$r[total1]") ?></td>
    </tr>
    <tr>
      <td height="39"><?php echo "$r1[nama_rm2]" ?></td>
      <td><?php echo "$r[jumlah_barang2]" ?></td>
      <td><?php if ($r['harga_perbarang2'] == NULL) {
            echo "";
          } else {
            echo "Rp " . number_format("$r[harga_perbarang2]");
          } ?></td>
      <td><?php if ($r['total2'] == NULL) {
            echo "";
          } else {
            echo "Rp " . number_format("$r[total2]");
          } ?></td>
    </tr>
    <tr>
      <td height="30"><?php echo "$r1[nama_rm3]" ?></td>
      <td><?php echo "$r[jumlah_barang3]" ?></td>
      <td><?php if ($r['harga_perbarang3'] == NULL) {
            echo "";
          } else {
            echo "Rp " . number_format("$r[harga_perbarang3]");
          } ?></td>
      <td><?php if ($r['total3'] == NULL) {
            echo "";
          } else {
            echo "Rp " . number_format("$r[total3]");
          } ?></td>
    </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan="4">________________________________________________________________________________________________</td>
  </tr>
</table>
<table width="777" border="0">
  <?php

  $tampil = mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'");
  $no = 1;
  $r = mysql_fetch_array($tampil); {


  ?>
    <tr>
      <td width="156" height="37"><strong>DISKON</strong></td>
      <td width="16">:</td>
      <td>Rp.<?php echo "" . number_format("$r[diskon]") ?></td>
    </tr>
    <tr>
      <td height="37"><strong>TOTAL AFTER DISC </strong></td>
      <td>:</td>
      <td>Rp.<?php echo "" . number_format("$r[total_harga]") ?></td>
    </tr>
    <tr>
      <td height="31"><strong>PPN</strong></td>
      <td>:</td>
      <td>Rp.<?php echo "" . number_format("$r[ppn]") ?></td>
    </tr>
    <tr>
      <td height="37"><strong>GRAND TOTAL</strong></td>
      <td>:</td>
      <td>Rp.<?php echo "" . number_format("$r[grand_total]") ?></td>
    </tr>
  <?php
  }
  ?>
</table>
<table width="780" height="172" border="0">
  <tr>
    <td width="208">
      <div align="center">Prepared By </div>
    </td>
    <td width="184">
      <div align="center">Approved By </div>
    </td>
    <td width="170">
      <div align="center">&nbsp;</div>
    </td>
    <td width="250">
      <div align="center">Approval supplier </div>
    </td>
  </tr>
  <tr>
    <td height="91"><img src="../img/ttd.jpeg" alt="" width="100%" height="100%"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">
      <div align="center">Purchasing </div>
    </td>
    <td>
      <div align="center">Manager</div>
    </td>
    <td>
      <div align="center">&nbsp;</div>
    </td>
    <td>
      <div align="left"><?php echo "$r[nama]" ?></div>
    </td>
  </tr>
</table>
<table width="779" height="126" border="0">
  <tr>
    <td height="23"><em>Note *) </em></td>
  </tr>
  <tr>
    <td height="97">
      <p>* PO Disertakan Ketika Mengirim Barang</p>
      <p>* Konformasi ketika mengirim barang</p>
      <p>* Pembayaran Dilakukan pada hari</p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>