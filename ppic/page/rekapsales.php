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
        <h1>Data Rekap Sales</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header"></div><!-- /.box-header -->
			
		<a href="produk_excel.php"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Ambil Report Excel</i></button> </a>
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="446" height="73" class="table table-bordered table-striped"  style="width: 100%;">
                    <thead>
                      <tr>
						<th width="24">NO</th>
						<th width="62">No DO</th>
						<th width="62">No SO</th>
					  <th width="62">No INV</th>
                        <th width="65">Nama Customer</th>
						<th width="62">Tanggal Kirim</th>
						<th width="33">Tanggal Jatuh Tempo</th>
						<th width="27">Hapus</th>
					    </tr>
                    </thead>
					
                    <tbody>
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT *  ,DATE_ADD(tgl,interval tempo DAY) as jatuh_tempo FROM rekap group by id");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[no_so]"?></td>
						<td><?php echo "$r[do1]"?></td>
						<td><?php echo "$r[no_inv]"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo TanggalIndo($r['tgl'])?></td>
						<td><?php echo TanggalIndo($r['jatuh_tempo'])?></td>	
						<td><a href="?pg=inv&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
						
                        
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
      case 'add':
      if (isset($_POST['add'])) {
                $query = mysql_query("INSERT INTO inv VALUES ('','$_POST[no_inv]','$_POST[do1]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[tgl]','$_POST[tempo]','$_POST[mobil]','$_POST[supir]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[harga1]','$_POST[total1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[harga2]','$_POST[total2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[harga3]','$_POST[total3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[harga4]','$_POST[total4]')");
		  
			       
                echo "<script>window.location='home.php?pg=inv&act=view'</script>";
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
					  
					    <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from inv");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 3, "0", STR_PAD_LEFT);
                      $tahun = date('m/Y');
                      $kode_jadi = "INV$bikin_kode/SPS/$tahun";

                      ?>
				

					  
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Surat Jalan</label>
                      <input type="text" class="form-control" id="no_inv" name="no_inv" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_inv" name="no_inv" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  				  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Sales Order</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="do1" id="do1" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result = mysql_query("select * from so order by id");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['do1'] . '">' . $row['do1'] . '</option>';    
$jsArray .= "frm['" . $row['do1'] . "'] = {
nm_cust:'" . addslashes($row['nm_cust']) . "',
alamat:'".addslashes($row['alamat'])."',
tlp:'".addslashes($row['tlp'])."',
tgl:'".addslashes($row['tgl'])."',
supir:'".addslashes($row['supir'])."',
mobil:'".addslashes($row['mobil'])."',
nm_fg1:'".addslashes($row['nm_fg1'])."',
qty1:'".addslashes($row['qty1'])."',
nm_fg2:'".addslashes($row['nm_fg2'])."',
qty2:'".addslashes($row['qty2'])."',
nm_fg3:'".addslashes($row['nm_fg3'])."',
qty3:'".addslashes($row['qty3'])."',
nm_fg4:'".addslashes($row['nm_fg4'])."',
qty4:'".addslashes($row['qty4'])."'



};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					 
					  <div class="form-group">Nama Supir
                     <input type="text" class="form-control" id="supir" name="supir" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					
					 <div class="form-group">Nama Mobil
                     <input type="text" class="form-control" id="mobil" name="mobil" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  					 
					   <div class="form-group">Nama Customer
                     <input type="text" class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					  <div class="form-group">Alamat Customer
                     <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					
					 <div class="form-group">No Telepon
                     <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No telepon" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					
					 <div class="form-group">Tanggal Kirim
                     <input type="text" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Kirim" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					
					
					 <div class="form-group">Batas Jatuh Tempo
                     <input type="text" class="form-control" id="tempo" name="tempo" placeholder="Masukan Jumlah Hari" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					
										 
					  <div class="form-group">Produk1
                     <input type="text" class="form-control" id="nm_fg1" name="nm_fg1">
					 <input type="text" class="form-control" id="qty1" name="qty1" onKeyUp="sum();" >
					 <input type="text" class="form-control" id="harga1" name="harga1" onKeyUp="sum();" placeholder="masukan harga" >
				     <input type="text" class="form-control" id="total1" name="total1" onKeyUp="sum();" placeholder="masukan harga" >
				     
					</div>
					
					<div class="form-group">Produk2
                     <input type="text" class="form-control" id="nm_fg2" name="nm_fg2" >
					 <input type="text" class="form-control" id="qty2" name="qty2" onKeyUp="sum();" >
					 <input type="text" class="form-control" id="harga2" name="harga2" onKeyUp="sum();" placeholder="masukan harga" >
				      <input type="text" class="form-control" id="total2" name="total2" onKeyUp="sum();" placeholder="masukan harga" >
					</div>
					
					<div class="form-group">Produk3
                     <input type="text" class="form-control" id="nm_fg3" name="nm_fg3">
					 <input type="text" class="form-control" id="qty3" name="qty3" onKeyUp="sum();" >
					 <input type="text" class="form-control" id="harga3" name="harga3" onKeyUp="sum();" placeholder="masukan harga" >
					  <input type="text" class="form-control" id="total3" name="total3" onKeyUp="sum();" placeholder="masukan harga" >
					</div>
					
					<div class="form-group">Produk4
                     <input type="text" class="form-control" id="nm_fg4" name="nm_fg4">
					 <input type="text" class="form-control" id="qty4" name="qty4" onKeyUp="sum();" >
					 <input type="text" class="form-control" id="harga4" name="harga4" onKeyUp="();" placeholder="masukan harga" >
					  <input type="text" class="form-control" id="total4" name="total4" onKeyUp="sum();" placeholder="masukan harga" >
					</div>
					  
					
					
						<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		
		document.getElementById('nm_cust').value = frm[no_form].nm_cust;
		document.getElementById('alamat').value = frm[no_form].alamat;
		document.getElementById('tlp').value = frm[no_form].tlp;
		document.getElementById('tgl').value = frm[no_form].tgl;
		document.getElementById('mobil').value = frm[no_form].mobil; 
		document.getElementById('supir').value = frm[no_form].supir; 
		document.getElementById('nm_fg1').value = frm[no_form].nm_fg1; 
		document.getElementById('qty1').value = frm[no_form].qty1; 
		document.getElementById('nm_fg2').value = frm[no_form].nm_fg2; 
		document.getElementById('qty2').value = frm[no_form].qty2; 
	    document.getElementById('nm_fg3').value = frm[no_form].nm_fg3; 
		document.getElementById('qty3').value = frm[no_form].qty3; 
		document.getElementById('nm_fg4').value = frm[no_form].nm_fg4; 
		document.getElementById('qty4').value = frm[no_form].qty4; 
		
			};  
</script>
	  <script>
		
		function sum() {
							
							var txt1 = document.getElementById('qty1').value;	
							var txt2 = document.getElementById('qty2').value;
							var txt3 = document.getElementById('qty3').value;
							var txt4 = document.getElementById('qty4').value;
			                var txt5 = document.getElementById('total1').value;	
							var txt6 = document.getElementById('total2').value;
							var txt7 = document.getElementById('total3').value;
							var txt8 = document.getElementById('total4').value;
			                var txt9 = document.getElementById('harga1').value;	
							var txt10 = document.getElementById('harga2').value;
							var txt11 = document.getElementById('harga3').value;
							var txt12 = document.getElementById('harga4').value;
			               
							
							
							var result1 = parseInt(txt1)*parseInt(txt9);
      						if (!isNaN(result1)) {
         					document.getElementById('total1').value = result1;
							}
			
							var result2 = parseInt(txt2)*parseInt(txt10);
      						if (!isNaN(result2)) {
         					document.getElementById('total2').value = result2;
							}
			                
							var result3 = parseInt(txt3)*parseInt(txt11);
      						if (!isNaN(result3)) {
         					document.getElementById('total3').value = result3;
							}
													
							var result4 = parseInt(txt4)*parseInt(txt12);
      						if (!isNaN(result4)) {
         					document.getElementById('total4').value = result4;
							}
							
						}
		
		</script>
				
					  
					 
					
									
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
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
      mysql_query("DELETE FROM inv WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=inv&act=view'</script>";
      break;

    }
    ?>

