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
    <a href="?pg=so&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data</i></button> </a>
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
      case 'add':
      if (isset($_POST['add'])) {
                $query = mysql_query("INSERT INTO so VALUES ('','$_POST[do1]','$_POST[time]','$_POST[no_so]','$_POST[so_ext]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[tgl]','$_POST[mobil]','$_POST[supir]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[exp1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[exp2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[exp3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[exp4]')");
		  
			       
                echo "<script>window.location='home.php?pg=so&act=view'</script>";
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
					  
					<?php $kd_trans= kd_sj_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					   <div class="form-group">Waktu Kirim
						   
                     <input type="text" class="form-control" id="time" name="time" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value=" <?php date_default_timezone_set('Asia/Jakarta'); echo date(date("H:i:s"));?> ">
						  </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Sales Order</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="no_so" id="no_so" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result = mysql_query("select * from salesorder order by id");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_so'] . '">' . $row['no_so'] . '</option>';    
$jsArray .= "frm['" . $row['no_so'] . "'] = {
so_ext:'" . addslashes($row['so_ext']) . "',
nm_cust:'" . addslashes($row['nm_cust']) . "',
alamat:'".addslashes($row['alamat'])."',
tlp:'".addslashes($row['tlp'])."',
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
					  
					  
					   <div class="form-group">Nomor SO External
                     <input type="text" class="form-control" id="so_ext" name="so_ext"  >
					</div>
					
					  <div>
                    <label for="exampleInputEmail1">Mobil dan Plat Nomor</label> 
                      <select class="form-control select2" name="mobil" id="mobil" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="Enggkel-SPS B 9658 KCE">Enggkel-SPS B 9658 KCE</option>
                        <option value="Enggkel-RRC B 9370 KCE">Enggkel-RRC B 9370 KCE</option>
                        <option value="Double Enggkel-RRC B 9664 FCG">Double Enggkel-RRC B 9664 FCG</option>
						<option value="CarryBox-RRC B 9845 FCG">CarryBox-RRC B 9845 FCG</option>
						  <option value="Carrent-Yayan F 8278 GW ">Carrent-Yayan F 8278 GW</option>
						  <option value="Double Engkel B 9811 FCI ">Double Engkel B 9811 FCI</option>
						 <option value="Expedisi ">Expedisi</option>
                      </select>
						  
					<label for="exampleInputEmail1">Nama Supir</label> 
                      <select class="form-control select2" name="supir" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--Silahkan Pilih--</option>
                        <option value="Muhaji">Muhaji</option>
                        <option value="Wahid">Wahid</option>
                        <option value="Sofyan">Sofyan</option>
						<option value="Dadang">Dadang</option>
						<option value="Yayan">Yayan</option>
						<option value="Expedisi">Expedisi</option>
                      </select>
					</div>
					 
					 <div class="form-group">Tanggal Kirim
                     <input type="date" class="form-control" id="tgl" name="tgl"  required data-fv-notempty-message="Tidak boleh kosong" >
					</div>
					 
					   <div class="form-group">Nama Customer
                     <input type="text" class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					  <div class="form-group">Alamat Customer
                     <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					
					 <div class="form-group">No Telepon
                     <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					 
					  <div class="form-group">Produk1
                     <input type="text" class="form-control" id="nm_fg1" name="nm_fg1">
					  <input type="text" class="form-control" id="qty1" name="qty1" >
					 <input type="date" class="form-control" id="exp1" name="exp1" >
					</div>
					
					<div class="form-group">Produk2
                      <input type="text" class="form-control" id="nm_fg2" name="nm_fg2" >
					  <input type="text" class="form-control" id="qty2" name="qty2" >
					 <input type="date" class="form-control" id="exp2" name="exp2" >
					</div>
					
					<div class="form-group">Produk3
                      <input type="text" class="form-control" id="nm_fg3" name="nm_fg3">
					  <input type="text" class="form-control" id="qty3" name="qty3" >
					 <input type="date" class="form-control" id="exp3" name="exp3" >
					</div>
					
					<div class="form-group">Produk4
                       <input type="text" class="form-control" id="nm_fg4" name="nm_fg4">
					 <input type="text" class="form-control" id="qty4" name="qty4" >
					 <input type="date" class="form-control" id="exp4" name="exp4" >
					</div>
					  
					
					
						<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('so_ext').value = frm[no_form].so_ext;
		document.getElementById('nm_cust').value = frm[no_form].nm_cust;
		document.getElementById('alamat').value = frm[no_form].alamat;
		document.getElementById('tlp').value = frm[no_form].tlp;  
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
							var txt4= document.getElementById('qty4').value;
						    var txt6= document.getElementById('jumlah').value;
							
							
							var result1 =parseFloat(txt1)+parseFloat(txt2)+parseFloat(txt3)+parseFloat(txt4)+parseFloat(txt5);
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah').value = result1;
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
      mysql_query("DELETE FROM so WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=so&act=view'</script>";
      break;

    }
    ?>

