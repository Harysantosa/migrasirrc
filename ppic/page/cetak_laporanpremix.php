 <?php 
	include "../config/koneksi.php";
	?>

               <title>Print Laporan Produksi</title>
                    <table width="1007" border="0">
                      <tbody>
                        <tr>
                         <td width="457" height="38" colspan="3" valign="top"><h1 style="text-align: left">LAPORAN PRODUKSI PREMIX</h1></td>
						  <td width="203" height="38" valign="top"><h1 style="text-align: center">&nbsp;</h1></td>
					    </tr>
						  
						  
						
                      <td width="325"></tbody>
						  
						  
                    </table>
                    <p><font color="orange" size="3"><b>Pencarian Data Berdasarkan Periode Tanggal</b></font>
                    <form action="cetak_laporanpremix.php" method="post" name="postform">
                      <table border="0">
                <tr>
                    <td width="125"><b>Dari Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16" />
      </td>
                    <td width="125"><b>Sampai Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" />
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
                document.location='cetak_laporanpremix.php';
            </script>
            <?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
</p>
                               <?php
				include("indo.php");
            $query=mysql_query("select * from ppic_plan where tgl between '$tanggal_awal' and '$tanggal_akhir'");
            }
        ?>
        </p>
        
<table width="1164" height="203" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FF6600">
               
                
    <th width="20" style="text-align: center">No</th>
						
                        
    <th width="48" style="text-align: center">Nama Produk</th>
				 
    <th width="79" style="text-align: center">Tanggal Produksi</th>
                       	
    <th width="52" style="text-align: center">Jumlah Batch</th>
							
    <th width="59" style="text-align: center">Target Produksi</th>
                        
    <th width="57" style="text-align: center">Jumlah Terigu Standart</th>
						
    <th width="59" style="text-align: center">Jumlah Terigu Premium</th>
						
    <th width="52" style="text-align: center">Jumlah PRX A</th>
						
    <th width="52" style="text-align: center">Jumlah PRX B</th>
						
    <th width="52" style="text-align: center">Jumlah PRX C</th>
						
    <th width="52" style="text-align: center">Jumlah PRX D</th>
						
    <th width="52" style="text-align: center">Jumlah PRX E</th>
						
    <th width="52" style="text-align: center">Jumlah PRX 01</th>
						
    <th width="52" style="text-align: center">Jumlah PRX 02</th>
						
    <th width="52" style="text-align: center">Jumlah PRX 03</th>
						
    <th width="52" style="text-align: center">Jumlah PRX 04</th>
						
    <th width="52" style="text-align: center">Jumlah PRX 05</th>
						
    <th width="52" style="text-align: center">Jumlah PRX 06</th>
						
    <th width="52" style="text-align: center">Jumlah Ragi</th>
						
    <th width="72" style="text-align: center">Jumlah Shortening</th>
						
    <th width="1101" style="text-align: center">Jumlah Margarine</th>
						
						
                     
            </tr>
            <?php
            //menampilkan pencarian data
				
            while($r=mysql_fetch_array($query)){
            ?>
            <tr>
                <td style="text-align: center"><?php echo "$r[id]"?></td>
						 <td style="text-align: center"><?php echo "$r[nm_fg]"?></td> 
                         <td align="left" style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
						 <td align="left" style="text-align: center"><?php echo "$r[lot]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jumlah]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jmlt1]"?>Kg</td>
						 <td align="center" style="text-align: center"><?php echo "$r[jmlt2]"?>Kg</td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml1]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml2]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml3]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml4]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml5]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml6]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml7]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml8]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml9]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml10]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml11]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml12]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml13]"?></td>
						 <td align="center" style="text-align: center"><?php echo "$r[jml14]"?></td>
						 
						
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
