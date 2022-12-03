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
               mysql_query("UPDATE so SET do1='$_POST[do1]',time='$_POST[time]',no_so='$_POST[no_so]',
				so_ext='$_POST[so_ext]',nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',tlp='$_POST[tlp]',tgl='$_POST[tgl]',mobil='$_POST[mobil]',
				supir='$_POST[supir]',
				nm_fg1='$_POST[nm_fg1]',qty1='$_POST[qty1]',exp1='$_POST[exp1]',
				nm_fg2='$_POST[nm_fg2]',qty2='$_POST[qty2]',exp2='$_POST[exp2]',
				nm_fg3='$_POST[nm_fg3]',qty3='$_POST[qty3]',exp3='$_POST[exp3]',
				nm_fg4='$_POST[nm_fg4]',qty4='$_POST[qty4]',exp4='$_POST[exp4]' WHERE id='$_POST[id]'");
		  
			       
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
                      <input type="text" class="form-control" id="do1" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="do1" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong">
					  <input type="hidden" class="form-control" id="id" value= "<?php echo $d['id'];?>" name="id"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Data Mobil</label> <br>
                      <select class="form-control select2" name="mobil" id="mobil" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--- SIlahkan Pilih ---</option>
                        <option value="Enggkel B 9125 FCL">Enggkel B 9125 FCL</option>
                        <option value="Enggkel B 9102 FXW">Enggkel B 9102 FXW</option>
                        <option value="Double Enggkel B 9922 FXV">Double Enggkel B 9922 FXV</option>
						<option value="Double Enggkel B 9664 FCG">Double Enggkel B 9664 FCG</option>
						 <option value="Expedisi ">Expedisi</option>
						 </optgroup>
                      </select>
					  </div>
					  
						<div class="form-group">
                      <label for="exampleInputEmail1">Nama Supir</label> <br>
                      <select class="form-control select2" name="supir" id="supir" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--- Silahkan Pilih ---</option>
                        <option value="Muhaji">Muhaji</option>
                        <option value="Wahid">Dadang</option>
                        <option value="Sofyan">Sofyan</option>
						<option value="Dadang">Mulkin</option>
						<option value="Dani">Wahyudin</option>
						<option value="Expedisi">Expedisi</option>
                      </select>
					</div>
					  
					   <div class="form-group">Waktu Kirim
						 <input readonly class="form-control" id="time" name="time" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value=" <?php date_default_timezone_set('Asia/Jakarta'); echo date(date("H:i:s"));?> ">
						  </div>
						  
					     <div class="form-group">Nomor SO
                     <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>"> 
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
					 
					  <div class="form-group">Produk1
                     <input readonly class="form-control" id="nm_fg1" name="nm_fg1" value= "<?php echo $d['nm_fg1'];?>"> 
					  <input readonly class="form-control" id="qty1" name="qty1" value= "<?php echo $d['qty1'];?>"> 
					 <input readonly class="form-control" id="date" name="exp1"  value= "<?php echo $d['exp1'];?>"> 
					</div>
					
					<div class="form-group">Produk2
                      <input readonly class="form-control" id="nm_fg2" name="nm_fg2" value= "<?php echo $d['nm_fg2'];?>"> 
					  <input readonly class="form-control" id="qty2" name="qty2" value= "<?php echo $d['qty2'];?>"> 
					 <input readonly class="form-control" id="date" name="exp2" value= "<?php echo $d['exp2'];?>"> 
					</div>
					
					<div class="form-group">Produk3
                      <input readonly class="form-control" id="nm_fg3" name="nm_fg3" value= "<?php echo $d['nm_fg3'];?>"> 
					  <input readonly class="form-control" id="qty3" name="qty3" value= "<?php echo $d['qty3'];?>"> 
					 <input readonly class="form-control" id="date" name="exp3" value= "<?php echo $d['exp3'];?>"> 
					</div>
					
					<div class="form-group">Produk4
                       <input readonly class="form-control" id="nm_fg4" name="nm_fg4" value= "<?php echo $d['nm_fg4'];?>">  
					 <input readonly class="form-control" id="qty4" name="qty4" value= "<?php echo $d['qty4'];?>">
					 <input readonly class="form-control" id="date" name="exp4" value= "<?php echo $d['exp41'];?>"> 
					</div>
					  
					
					  
					 
					
									
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

