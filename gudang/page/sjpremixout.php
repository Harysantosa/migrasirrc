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
        <h1> Data SJ Premix Out</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=sjpremixout&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data</i></button> </a>
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
						   <th width="33">Date</th>
						     <th width="27">Hapus</th>
					      <th width="41">Cetak</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM sjpremixout order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
						<td><?php echo "$no"?></td>
                       	<td><?php echo "$r[no_so]"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo "$r[tgl]"?></td>
						<td><a href="?pg=sjpremixout&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" ><i class = "fa fa-trash-o"></i></button></a></td>
							
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM sjpremixout WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
 if  ($_POST['sisa1']>='0'&&$_POST['sisa2']>='0'&&$_POST['sisa3']>='0'&&$_POST['sisa4']>='0'){
  		mysql_query("DELETE FROM sjpremixout WHERE id='$_GET[id]'");
	  mysql_query("UPDATE sjpremixout SET no_so='$_POST[no_so]', so_ext='$_POST[so_ext]'
	  ,tgl='$_POST[tgl]',nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',pic='$_POST[pic]'
	  ,nm_fg1='$_POST[nm_fg1]',qty1='$_POST[qty1]',nm_fg2='$_POST[nm_fg2]',qty2='$_POST[qty2]'
	  ,nm_fg3='$_POST[nm_fg3]',qty3='$_POST[qty3]',nm_fg4='$_POST[nm_fg4]',qty4='$_POST[qty4]' WHERE id='$_POST[id]'");
				
				$query = mysql_query("INSERT INTO rekapsjpremix VALUES ('','$_POST[no_so]','$_POST[so_ext]',
			   '$_POST[tgl]','$_POST[nm_cust]','$_POST[alamat]','$_POST[pic]','$_POST[nm_fg1]',
			   '$_POST[qty1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[nm_fg4]','$_POST[qty4]')");
				
                echo "<script> alert('data berhasil disimpan');window.location='home.php?pg=sjpremixout&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Karna Beberapa Stok Kurang !');</script>";
			 }
			   
			   }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Ubah Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Sales Order</a></li>
            <li class="active">Edit Sales Order</li>
             </ol>
        </section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="" >
                  <div class="box-body">
					  
					  
                    	<div class="form-group">
                        <label for="exampleInputEmail1">No Sales Order</label>
                        <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>">
					  </div>
					  
					  <div class="form-group">
                        <label for="exampleInputEmail1">No PO External</label>
                        <input readonly class="form-control" id="so_ext" name="so_ext" value= "<?php echo $d['so_ext'];?>">
					  </div>
					  
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 
					  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['tgl'];?>">
						   
					  </div>
					  
					  <div class="form-group">Nama Customer
                     <input type="text" class="form-control" id=nm_cust name="nm_cust" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_cust'];?>">
					</div>
					  
					  
					   <div class="form-group">Alamat Customer
                     <input type="text" class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
					</div>
					  
					  <div class="form-group">PIC
                     <input type="text" class="form-control" id="pic" name="pic" placeholder="Nomor Telepon" value= "<?php echo $d['pic'];?>">
					</div>	
					  
					
					 
                 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-1</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama_rm1" id="nm_fg1" onchange="changerm1(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result1 = mysql_query("select * from stok_fgpremix order by id");    
					$jsArray1 = "var frm1 = new Array();
";        
					while ($row = mysql_fetch_array($result1)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray1 .= "frm1['" . $row['nm_rm'] . "'] = {
stok1:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					  <input readonly class="form-control" id="nm_fg1" name="nm_fg1" placeholder="Harga Satuan Barang" onKeyUp="sum();" value= "<?php echo $d['nm_fg1'];?>">
					<input readonly class="form-control" id="stok1" name="stok" placeholder="Harga Satuan Barang" onKeyUp="sum();">
					<input readonly class="form-control" id="qty1" name="qty1" placeholder="Harga Satuan Barang" onKeyUp="sum();" value= "<?php echo $d['qty1'];?>">
					<input readonly class="form-control" id="sisa1" name="sisa1" placeholder="Harga Satuan Barang" onKeyUp="sum();">
					</div>
					
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-2</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama_rm2" id="nm_fg2" onchange="changerm2(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result2 = mysql_query("select * from stok_fgpremix order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray2 .= "frm2['" . $row['nm_rm'] . "'] = {
stok2:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="stok2" name="stok" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					<input readonly class="form-control" id="qty2" name="qty2" placeholder="Harga Satuan Barang" onKeyUp="sum1();" value= "<?php echo $d['qty2'];?>">
					<input readonly class="form-control" id="sisa2" name="sisa2" placeholder="Harga Satuan Barang" onKeyUp="sum1();" value="0">
					</div>
					   
					   
					   
					   <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama_rm3" id="nm_fg3" onchange="changerm3(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result3 = mysql_query("select * from stok_fgpremix order by id");    
					$jsArray3 = "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray3 .= "frm3['" . $row['nm_rm'] . "'] = {
stok3:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="stok3" name="stok" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
					<input readonly class="form-control" id="qty3" name="qty3" placeholder="Harga Satuan Barang" onKeyUp="sum2();" value= "<?php echo $d['qty3'];?>">
					<input readonly class="form-control" id="sisa3" name="sisa3" placeholder="Harga Satuan Barang" onKeyUp="sum2();" value="0">
					</div>
					
					
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-4</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama_rm4" id="nm_fg4" onchange="changerm4(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result4 = mysql_query("select * from stok_fgpremix order by id");    
					$jsArray4 = "var frm4 = new Array();
";        
					while ($row = mysql_fetch_array($result4)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray4 .= "frm4['" . $row['nm_rm'] . "'] = {
stok4:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="stok4" name="stok" placeholder="Harga Satuan Barang" onKeyUp="sum4();">
					<input readonly class="form-control" id="qty4" name="qty4" placeholder="Harga Satuan Barang" onKeyUp="sum4();" value= "<?php echo $d['qty4'];?>">
					<input readonly class="form-control" id="sisa4" name="sisa4" placeholder="Harga Satuan Barang" onKeyUp="sum4();" value="0">
					</div>
					
		  
	  			
						<script>
					  	<?php 
						echo 
						$jsArray1; 
						?>  
						 
						function changerm1(value){ 
	
						document.getElementById('stok1').value = frm1[value].stok1;
										
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changerm2(value){ 
	
						document.getElementById('stok2').value = frm2[value].stok2;
										
						};  
	  					</script>
					  
					  
					  <script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changerm3(value){ 
	
						document.getElementById('stok3').value = frm3[value].stok3;
										
						};  
	  					</script>
						
						
						  
					  <script>
					  	<?php 
						echo 
						$jsArray4; 
						?>  
						 
						function changerm4(value){ 
	
						document.getElementById('stok4').value = frm4[value].stok4;
										
						};  
	  					</script>
					  
					  
					  
					    <script>
						  function sum() {
							var txt1 = document.getElementById('stok1').value;
							var txt2 = document.getElementById('qty1').value;
							var txt3 = document.getElementById('sisa1').value;
							
							
							var result1 = (txt1)-(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa1').value = result1;
							}
							
							
							
							}
							</script>
							
							 <script>
						  function sum1() {
							var txt1 = document.getElementById('stok2').value;
							var txt2 = document.getElementById('qty2').value;
							var txt3 = document.getElementById('sisa2').value;
							
							
							var result1 = (txt1)-(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa2').value = result1;
							}
							
							
							
							}
							</script>
							
							<script>
						  function sum2() {
							var txt1 = document.getElementById('stok3').value;
							var txt2 = document.getElementById('qty3').value;
							var txt3 = document.getElementById('sisa3').value;
							
							
							var result1 = (txt1)-(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa3').value = result1;
							}
							
							
							
							}
							</script>
							
					  
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Edit</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
			
            </form>
			
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
 	
     
				  

    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM so WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=so&act=view'</script>";
      break;

    }
    ?>

