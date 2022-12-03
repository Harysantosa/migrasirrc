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
    <a href="?pg=sjpremix&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data</i></button> </a>
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
                    $tampil=mysql_query("SELECT * FROM sjpremix order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
						<td><?php echo "$no"?></td>
                       	<td><?php echo "$r[no_so]"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo "$r[tgl]"?></td>
						<td><a href="?pg=sjpremix&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							
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
               $query = mysql_query("INSERT INTO sjpremix VALUES ('','$_POST[no_so]','$_POST[so_ext]',
			   '$_POST[tgl]','$_POST[nm_cust]','$_POST[alamat]','$_POST[pic]','$_POST[nm_fg1]',
			   '$_POST[qty1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[nm_fg4]','$_POST[qty4]')");
			   
			   $query .= mysql_query("INSERT INTO sjpremixout VALUES ('','$_POST[no_so]','$_POST[so_ext]',
			   '$_POST[tgl]','$_POST[nm_cust]','$_POST[alamat]','$_POST[pic]','$_POST[nm_fg1]',
			   '$_POST[qty1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[nm_fg4]','$_POST[qty4]')");
		  
			       
                echo "<script>window.location='home.php?pg=sjpremix&act=view'</script>";
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
					<div class="form-group">  
					<?php $kd_trans= kd_sj_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="no_so"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="no_so"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					   <div class="form-group">Waktu Kirim
						   
                     <input type="text" class="form-control" id="time" name="time" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value=" <?php date_default_timezone_set('Asia/Jakarta'); echo date(date("H:i:s"));?> ">
						  </div>
					  
					  
					   <div class="form-group">Nomor SO External
                     <input type="text" class="form-control" id="so_ext" name="so_ext"  >
					</div>
					
					 
					 <div class="form-group">Tanggal Kirim
                     <input type="date" class="form-control" id="tgl" name="tgl"  required data-fv-notempty-message="Tidak boleh kosong" >
					</div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Data Customer</label> <br>
					 
                    <select class="form-control select2" style="width: 100%;" name="nm_cust" id="nm_cust" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from customer");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';    
$jsArray .= "frm['" . $row['nama'] . "'] = {

alamat:'" . addslashes($row['alamat']) . "',
pic:'".addslashes($row['pic'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					
					
					<input readonly class="form-control" id="alamat" name="alamat" placeholder="alamat" >
				    <input readonly class="form-control" id="pic" name="pic" placeholder="PIC" >
					</div>	
					
					 
					 
					    <div class="form-group">
                     <select class="form-control select2" id="na" name="nm_fg1" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_fgpremix order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
				       <input type="text" class="form-control" id="qty1" name="qty1" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					
					  <div class="form-group">
                     <select class="form-control select2" id="na" name="nm_fg2" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_fgpremix order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
				       <input type="text" class="form-control" id="qty2" name="qty2" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					  <div class="form-group">
                     <select class="form-control select2" id="na" name="nm_fg3" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_fgpremix order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
				       <input type="text" class="form-control" id="qty3" name="qty3" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					  <div class="form-group">
                     <select class="form-control select2" id="na" name="nm_fg4" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_fgpremix order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
				       <input type="text" class="form-control" id="qty4" name="qty4" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('alamat').value = frm[no_form].alamat;
		document.getElementById('pic').value = frm[no_form].pic; 
	
		
		
		
			};  
					  
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

