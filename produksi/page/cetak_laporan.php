 <?php 
	include "../config/koneksi.php";
	?>

               <title>Print Laporan Produksi</title>
                    <table width="1007" border="0">
                      <tbody>
                        <tr>
                         <td width="457" height="38" colspan="3" valign="top"><h1 style="text-align: left">LAPORAN PRODUKSI</h1></td>
						  <td width="203" height="38" valign="top"><h1 style="text-align: center">&nbsp;</h1></td>
					    </tr>
						  
						  
						
                      <td width="325"></tbody>
						  
						  
                    </table>
                    <p><font color="orange" size="3"><b>Pencarian Data Berdasarkan Periode Tanggal</b></font>
                    <form action="cetak_laporan.php" method="post" name="postform">
                      <table border="0">
                <tr>
                    <td width="125"><b>Dari Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16" />
                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>                
                    </td>
                    <td width="125"><b>Sampai Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" />
                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>                
                    </td>
                    <td colspan="2" width="190"><input type="submit" value="Pencarian Data" name="pencarian"/></td>
                    
                </tr>
            </table>
</form><br />
        <p>
        <?php
            //proses jika sudah klik tombol pencarian data
            if(isset($_POST['pencarian'])){
            //menangkap nilai form
            $tanggal_awal=$_POST['tanggal_awal'];
            $tanggal_akhir=$_POST['tanggal_akhir'];
            if(empty($tanggal_awal) || empty($tanggal_akhir)){
            //jika data tanggal kosong
            ?>
			
          <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='centak_laporan.php';
            </script>
            <?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
</p>
                               <?php
				include("indo.php");
            $query=mysql_query("select * from mixing where tgl between '$tanggal_awal' and '$tanggal_akhir'");
            }
        ?>
        </p>
        <table width="1265" height="82" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#FF6600">
               
                <th width="29" style="text-align: center">No</th>
						<th width="121" style="text-align: center">No Laporan</th>
                        <th width="128" style="text-align: center">No Planing Produksi</th>
                        <th width="103" style="text-align: center">Tanggal Produksi</th>
                        <th width="57" style="text-align: center">Nama Produk</th>
                        <th width="35" style="text-align: center">Shift</th>
                        <th width="68" style="text-align: center">Target Pershift</th>
                        <th width="77" style="text-align: center">Jumlah Produksi</th>
						<th width="68" style="text-align: center">Target Drying</th>
                        <th width="57" style="text-align: center">Aktual Drying</th>
						<th width="101" style="text-align: center">Prosentase</th>
						<th width="63" style="text-align: center">Tgl Drying</th>
                        <th width="46" style="text-align: center">Shift Drying</th>
                     	<th width="282" style="text-align: center">Ket</th>      
            </tr>
            <?php
            //menampilkan pencarian data
				
            while($r=mysql_fetch_array($query)){
            ?>
            <tr>
                <td style="text-align: center"><?php echo "$r[id]"?></td>
						 <td style="text-align: center"><?php echo "$r[no_lap]"?></td> 
                        <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
                       <td align="left" style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
                        <td align="left" style="text-align: center"><?php echo "$r[nm_fg]"?></td>
                        <td align="left" style="text-align: center"><?php echo "$r[shift]"?></td>
                        <td align="center" style="text-align: center"><?php echo "$r[batch1]"?> Batch</td>
						<td align="center" style="text-align: center"><?php echo "$r[jumlahprod]"?> Batch</td>
						<td align="center" style="text-align: center"><?php echo "$r[target_dry]"?> Sak</td>
						<td align="center" style="text-align: center"><?php echo "$r[fg]"?> Sak</td>
                        <td align="center" style="text-align: center"><?php echo "$r[prosentase]"?> %</td>
						<td align="left" style="text-align: center"><?php echo TanggalIndo($r['tgl_drying'])?></td>
                        <td align="center" style="text-align: center"><?php echo "$r[shift_drying]"?></td>
						   <td align="center" style="text-align: center"><?php echo "$r[berita]"?></td>
            </tr>
            <?php
            }
            ?>    
            <tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysql_num_rows($query)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <?php
        }
        else{
            unset($_POST['pencarian']);
        }
        ?>
<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
    </body>
</html>
