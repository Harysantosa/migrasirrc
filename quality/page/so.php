<?php
error_reporting
?>
<script src="jquery.min.js" type="text/javascript"></script>
<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA PRODUK //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Surat Jalan</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">

    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="446" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
						 <th width="24">NO</th>
						  <th width="62">Delivery Order</th>
                        <th width="65">Nama Customer</th>
						 <th width="62">Supir</th>
						   <th width="33">Date</th>
						   <th width="80">Mobil dan Plat Nomor</th>
						    <th width="27">Buat Surat Jalan</th>
						   <th width="27">Hapus</th>
					      <th width="41">Cetak</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM so order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
						<td><?php echo "$no"?></td>
                       	<td><?php echo "$r[do1]"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo "$r[supir]"?></td>
						<td><?php echo "$r[tgl]"?></td>
						<td><?php echo "$r[mobil]"?></td>
						  <td style="text-align: left"><a href="?pg=so&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange" onclick="return confirm('Buat Surat Jalan?');"><i class="fa fa-check"></i></button></a></td>
						 <td><a href="?pg=so&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							
						<td><a href="cetak_sj.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-orange">
						<i class="fa fa-print" target=_blank></i></button></a></td>
                        
                        </tr>
						<?php
                    $no++;
                    }
                    ?>
					
			
               </tbody>
                  </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

      <?php
      break;

      // PROSES TAMBAH DATA PRODUK //
      case 'edit':
	  include("indo.php");
	    $d = mysql_fetch_array(mysql_query("SELECT * FROM so WHERE id='$_GET[id]'"));
      if (isset($_POST['update'])) {
      	 if  ($_POST['total']>='0' ){	
               mysql_query("UPDATE so SET do1='$_POST[do1]',time='$_POST[time]',no_so='$_POST[no_so]',
				so_ext='$_POST[so_ext]',segel='$_POST[segel]',nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',tlp='$_POST[tlp]',tgl='$_POST[tgl]',mobil='$_POST[mobil]',supir='$_POST[supir]',
				nm_fg1='$_POST[nm_fg1]',qty1='$_POST[qty1]',exp1='$_POST[exp1]',
				nm_fg2='$_POST[nm_fg2]',qty2='$_POST[qty2]',exp2='$_POST[exp2]',
				nm_fg3='$_POST[nm_fg3]',qty3='$_POST[qty3]',exp3='$_POST[exp3]',
				nm_fg4='$_POST[nm_fg4]',qty4='$_POST[qty4]',exp4='$_POST[exp4]' WHERE id='$_POST[id]'");

              
		  
		   echo "<script> alert('data berhasil disimpan');window.location='home.php?pg=so&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Karna Beberapa Stok Kurang !');</script>";
			 }
			   
			   }
              ?>
<div class="content-wrapper">
	<script src="jquery.min.js" type="text/javascript"></script>
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Surat Jalan</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Vendor</a></li>
            <li class="active"><a href="#">Tambah Data Vendor</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">		  
					  
				
					<div>
                         <?php $kd_trans= kd_sj_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input readonly="readonly" class="form-control" id="do1" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="do1" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong">
            <input type="hidden" class="form-control" id="id" value= "<?php echo $d['id'];?>" name="id"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Data Mobil</label> <br>
                      <select class="form-control select2" name="mobil" id="mobil" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="Enggkel-SPS B 9658 KCE">Enggkel-SPS B 9658 KCE</option>
                        <option value="Enggkel-RRC B 9370 KCE">Enggkel-RRC B 9370 KCE</option>
                        <option value="Double Enggkel-RRC B 9664 FCG">Double Enggkel-RRC B 9664 FCG</option>
						<option value="CarryBox-RRC B 9845 FCG">CarryBox-RRC B 9845 FCG</option>
						  <option value="Carrent-Yayan F 8278 GW ">Carrent-Yayan F 8278 GW</option>
						  <option value="Double Engkel B 9811 FCI ">Double Engkel B 9811 FCI</option>
						 <option value="Expedisi ">Expedisi</option>
						 </optgroup>
                      </select>
					  </div>
					  
						<div class="form-group">
                      <label for="exampleInputEmail1">Nama Supir</label> <br>
                      <select class="form-control select2" name="supir" id="supir" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--Silahkan Pilih--</option>
                        <option value="Muhaji">Muhaji</option>
                        <option value="Wahid">Wahid</option>
                        <option value="Sofyan">Sofyan</option>
						<option value="Dadang">Dadang</option>
						<option value="Yayan">Yayan</option>
						<option value="Expedisi">Expedisi</option>
                      </select>
					</div>
					
				
                      
				
					  
					   <div class="form-group">Waktu Kirim
						 <input readonly class="form-control" id="time" name="time" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value=" <?php date_default_timezone_set('Asia/Jakarta'); echo date(date("H:i:s"));?> ">
						  </div>
						  
					     <div class="form-group">Nomor SO
                     <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>"> 
					</div>

					  <div class="form-group">Segel
                     <input readonly class="form-control" id="segel" name="segel" value= "<?php echo $d['segel'];?>"> 
					</div>
					 
					 
					  <div class="form-group">Nomor SO External
                     <input readonly class="form-control" id="so_ext" name="so_ext" value= "<?php echo $d['so_ext'];?>"> 
					</div>
					
					 
					 <div class="form-group">Tanggal Kirim
                     <input readonly class="form-control" id="tgl" name="tgl"  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>"> 
					</div>
					 
					   <div class="form-group">Nama Customer
                     <input readonly class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_cust'];?>"> 
					</div>
					  
					  <div class="form-group">Alamat Customer
                     <input readonly class="form-control" id="alamat" name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>"> 
					</div>
					
					 <div class="form-group">No Telepon
                     <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Telepon Customer" required data-fv-notempty-message="Tidak boleh kosong" > 
					</div>


					  <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-1</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nm_fg1" id="nm_fg1" onchange="changerm1(this.value)" >
					<option value=''>-Pilih Produk-</option>
					<?php 
					$result1 = mysql_query("select * from stok_fg order by id");    
					$jsArray1 = "var frm1 = new Array();
";        
					while ($row = mysql_fetch_array($result1)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray1 .= "frm1['" . $row['nm_fg'] . "'] = {
stok1:'" . addslashes($row['stok']) . "',
exp1:'" . addslashes($row['exp']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
                       <input readonly  id="exp1" name="exp1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
				
					  <input disabled="disabled" id="stok1" name="stok1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">+
					  
					  
					    <input type="text" id="qty1" name="qty1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">=
					  	 <input readonly id="sisa1"name="sisa1"   placeholder="sisa stok" onclick="sum1();">
                  				  
                    
					  </div>
				  
				  
				  		 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-2</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg2" id="nm_fg2" onchange="changerm2(this.value)" >
					<option value=''>-Pilih Produk-</option>
					<?php 
					$result2 = mysql_query("select * from stok_fg order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray2 .= "frm2['" . $row['nm_fg'] . "'] = {
stok2:'" . addslashes($row['stok']) . "',
exp2:'" . addslashes($row['exp']) . "'

};
";    
					}      
					?>    
						    </optgroup>

                      </select>
                      <input readonly  id="exp2" name="exp2" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					 <input disabled="disabled" id="stok2" name="stok2" placeholder="Harga Satuan Barang" onKeyUp="sum1();">+
					  
					   
					  <input type="text" id="qty2" name="qty2" placeholder="Harga Satuan Barang" onKeyUp="sum1();">		=
					  	 <input readonly  id="sisa2"name="sisa2"   placeholder="sisa stok" onclick="sum1();">
 
                     		  
                    
					  </div>
		
				 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg3" id="nm_fg3" onchange="changerm3(this.value)" >
					<option value=''>-Pilih Produk-</option>
					<?php 
					$result3 = mysql_query("select * from stok_fg order by id");    
					$jsArray3 = "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray3 .= "frm3['" . $row['nm_fg'] . "'] = {
stok3:'" . addslashes($row['stok']) . "',
exp3:'" . addslashes($row['exp']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
                      <input readonly  id="exp3" name="exp3" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					<input disabled="disabled" id="stok3" name="stok3" placeholder="Harga Satuan Barang" onKeyUp="sum1();">+
					  
					   
					   <input type="text" id="qty3" name="qty3" placeholder="Harga Satuan Barang" onKeyUp="sum1();">	=
					  	 <input readonly  id="sisa3"name="sisa3"   placeholder="sisa stok"  onclick="sum1();">	

                     
                    
					  </div>
					  

					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-4</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg4" id="nm_fg4" onchange="changerm4(this.value)" >
					<option value=''>-Pilih Produk-</option>
					<?php 
					$result4 = mysql_query("select * from stok_fg order by id");    
					$jsArray4 = "var frm4 = new Array();
";        
					while ($row = mysql_fetch_array($result4)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray4 .= "frm4['" . $row['nm_fg'] . "'] = {
stok4:'" . addslashes($row['stok']) . "',
exp4:'" . addslashes($row['exp']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
                      <input readonly id="exp4" name="exp4" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					<input disabled="disabled" id="stok4" name="stok4" placeholder="Harga Satuan Barang" onKeyUp="sum1();">+
					  
					   
					   <input type="text" id="qty4" name="qty4" placeholder="Harga Satuan Barang" onKeyUp="sum1();">	=
					  	 <input readonly id="sisa4"name="sisa4"   placeholder="sisa stok" onclick="sum1();">	

                     
                    
					  </div>

				   <div class="form-group">hasil
                     <input readonly class="form-control" id="total" name="total" onclick="sum1();"  data-fv-notempty-message="Tidak boleh kosong" placeholder="klik untuk jumlah"> 
					</div>
					
							<script>
					  	<?php 
						echo 
						$jsArray1; 
						?>  
						 
						function changerm1(value){ 
	
						document.getElementById('stok1').value = frm1[value].stok1;
						document.getElementById('exp1').value = frm1[value].exp1;
						
						
						
						};  
	  					</script>

	  						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changerm2(value){ 
	
						document.getElementById('stok2').value = frm2[value].stok2;
						document.getElementById('exp2').value = frm2[value].exp2;
						
						
						
						};  
	  					</script>


	  						<script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changerm3(value){ 
	
						document.getElementById('stok3').value = frm3[value].stok3;
						document.getElementById('exp3').value = frm3[value].exp3;
						
						
						
						};  
	  					</script>

	  						<script>
					  	<?php 
						echo 
						$jsArray4; 
						?>  
						 
						function changerm4(value){ 
	
						document.getElementById('stok4').value = frm4[value].stok4;
						document.getElementById('exp4').value = frm4[value].exp4;
						
						
						
						};  
	  					</script>
		 <script>
						  function sum1() {
							var txt1 = document.getElementById('stok1').value;
							var txt2 = document.getElementById('qty1').value;
							var txt3 = document.getElementById('sisa1').value;
							var txt4 = document.getElementById('stok2').value;
							var txt5 = document.getElementById('qty2').value;
							var txt6 = document.getElementById('sisa2').value;
							var txt7 = document.getElementById('stok3').value;
							var txt8 = document.getElementById('qty3').value;
							var txt9 = document.getElementById('sisa3').value;
							var txt10 = document.getElementById('stok4').value;
							var txt11 = document.getElementById('qty4').value;
							var txt12 = document.getElementById('sisa4').value;
							var txt13 = document.getElementById('total').value;


						
							
							var result1 =parseInt(txt1)-parseInt(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa1').value = result1;
							}
							var result2 =parseInt(txt4)-parseInt(txt5);
      						if (!isNaN(result2)) {
         					document.getElementById('sisa2').value = result2;
							}
							var result3 =parseInt(txt7)-parseInt(txt8);
      						if (!isNaN(result3)) {
         					document.getElementById('sisa3').value = result3;
							}	
							var result4 =parseInt(txt10)-parseInt(txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('sisa4').value = result4;
							}
							var result5 =(parseInt(txt3));
      						if (!isNaN(result5)) {
         					document.getElementById('total').value = result5;
							}
							var result6 =(parseInt(txt3)+parseInt(txt6));
      						if (!isNaN(result6)) {
         					document.getElementById('total').value = result6;
							}
							var result7 =(parseInt(txt3)+parseInt(txt6)+parseInt(txt9));
      						if (!isNaN(result7)) {
         					document.getElementById('total').value = result7;
							}
							var result8 =(parseInt(txt3)+parseInt(txt6)+parseInt(txt9)+parseInt(txt12));
      						if (!isNaN(result8)) {
         					document.getElementById('total').value = result8;
							}				

							}
							</script>
	 
									
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
				  </section>
 	
     
				  

    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM so WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=so&act=view'</script>";
      break;

    }
    ?>

