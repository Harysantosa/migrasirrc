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
                  <table width="500" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
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
                    $tampil=mysql_query("SELECT * FROM so order by id  asc");
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
						
						<td><a href="cetak_sj.php?do=<?php echo $r['do']?>"><button type="button" class="btn bg-orange">
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
                $query .= mysql_query("INSERT INTO so VALUES ('','$_POST[do1]','$_POST[time]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[tgl]','$_POST[mobil]','$_POST[supir]','$_POST[expd]')");
		      
		  
		  
		include "koneksi.php";
		 $do = $_POST['do'];
		 $do1= $_post['do1'];
		  $nama = $_POST['nm_fg']; // Ambil data nama dan masukkan ke variabel nama
		  $telp = $_POST['qty']; // Ambil data telp dan masukkan ke variabel telp
		  $alamat = $_POST['exp']; // Ambil data alamat dan masukkan ke variabel alamat

// Proses simpan ke Database
		  $query = "INSERT INTO d_so VALUES";

		  $index = 0; // Set index array awal dengan 0
		  foreach($do as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
			$query .= "('".$datanis."','".$do1[$index]."','".$nama[$index]."','".$telp[$index]."','".$alamat[$index]."'),";
			$index++;
}
		  


// Kita hilangkan tanda koma di akhir query
// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
$query = substr($query, 0, strlen($query) - 1).";";

// Eksekusi $query
mysqli_query($connect, $query);
	
		  		
		       
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
					  
					    <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from so");
                      
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
                      $kode_jadi = "$bikin_kode/SPS/$tahun";

                      ?>
					  
					   <?php
                      //memulai mengambil datanya
                      $sql1 = mysql_query("select * from so");
                      
                      $num1 = mysql_num_rows($sql1);
                      
                      if($num1 <> 0)
                      {
                      $kode1 = $num1 + 1;
                      }else
                      {
                      $kode1 = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode1 = str_pad($kode1, 3, "0", STR_PAD_LEFT);
                      $tahun1 = date('m/Y');
                      $kode_jadi1 = "$bikin_kode1/SPS/$tahun1";

                      ?>
					  
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Delivery Order</label>
                      <input type="text" class="form-control" id="do1" name="do" placeholder="Nomor planing" value="<?php echo $kode_jadi1?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="do1" name="do" placeholder="Nomor Planing" value="<?php echo $kode_jadi1?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Delivery Order</label>
                      <input type="text" class="form-control" id="do1" name="do1[]" placeholder="Nomor planing" value="<?php echo $kode_jadi1?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="do1" name="do1[]" placeholder="Nomor Planing" value="<?php echo $kode_jadi1?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					                      					  
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Surat Jalan</label>
                      <input type="text" class="form-control" id="do" name="do[]" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="do" name="do[]" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					   <div class="form-group">Waktu Kirim
						   
                     <input type="text" class="form-control" id="time" name="time" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value=" <?php date_default_timezone_set('Asia/Jakarta'); echo date(date("H:i:s"));?> ">
						  
					</div>	
					  
					  <div class="form-group">Nama Customer
                     <input type="text" class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					  
					  <div class="form-group">Alamat Customer
                     <input type="text" class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					  <div class="form-group">No Telepon
                     <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Nomor Telepon" >
					</div>	
					  
					  <div class="form-group">Tanggal Pengiriman
                     <input type="date" class="form-control" id="tgl" name="tgl" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					  
					  <div class="form-group">Expedisi
                     <input type="text" class="form-control" id="expd" name="expd" placeholder="Nama Expedisi" >
					</div>	
					  
					  <div class="form-group">
                    <label for="exampleInputEmail1">Mobil dan Plat Nomor</label> 
                      <select class="form-control select2" name="mobil" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="Enggkel-SPS B 9658 KCE">Enggkel-SPS B 9658 KCE</option>
                        <option value="Enggkel-RRC B 9370 KCE">Enggkel-RRC B 9370 KCE</option>
                        <option value="Double Enggkel-RRC B 9664 FCG">Double Enggkel-RRC B 9664 FCG</option>
						<option value="CarryBox-RRC B 9845 FCG">CarryBox-RRC B 9845 FCG</option>
						<option value="Carrent-Yayan F 8278 GW ">Carrent-Yayan F 8278 GW</option>
                      </select>
                      </div>
					  					   				  
					  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Supir</label> 
                      <select class="form-control select2" name="supir" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--Silahkan Pilih--</option>
                        <option value="Muhaji">Muhaji</option>
                        <option value="Wahid">Wahid</option>
                        <option value="Sofyan">Sofyan</option>
						<option value="Dadang">Dadang</option>
						<option value="Yayan">Yayan</option>
                      </select>
                      </div>
					  
                     <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label> <br>
                      <select class="form-control select2" id="nama" name="nm_fg[]" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_fg order by no asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nm_fg']; ?>">
                        <?php echo $row['nm_fg']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					   <input type="text" class="form-control" id="qty" name="qty[]" placeholder="input jumlah barang" >
					 <input type="date" class="form-control" id="exp" name="exp[]" >
				   
					</div>
					
                  
                    <div class="form-group">
                      <button type="button" id="btn-tambah-form">Tambah Data Barang</button>
					<button type="button" id="btn-reset-form">Reset Form</button><br><br>
				  <div id="insert-form"></div>
					</div>
                   <!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1">
	
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
				"<table>" +
				 "<input type='text' class='form-control' id='do' name='do[]'' placeholder='Nomor planing' value='<?php echo $kode_jadi?>' required data-fv-notempty-message='Tidak boleh kosong'>"+	
			"<input type='text' class='form-control' id='do1' name='do1[]'' placeholder='Nomor planing' value='<?php echo $kode_jadi1?>' required data-fv-notempty-message='Tidak boleh kosong'>"+	
 			 "<div class='form-group'>"+
                      "<label for='exampleInputEmail1'>Nama Produk</label>"+
					"<br>"+
                      "<select class='form-control select2' id='nama' name='nm_fg[]' style='width: 100%;' >"+
                      "<option value='' >--- Silahkan Pilih ---</option>"+
					"<?php $query = mysql_query('SELECT * FROM stok_fg order by no asc'); while ($row = mysql_fetch_array($query)) { ?>"+
                    "<option value='<?php echo $row['nm_fg']; ?>'>"+
                        "<?php echo $row['nm_fg']; ?>"+
                   " </option>"+
                "<?php }?>"+
               
						    "</optgroup>"+
                      "</select>"+
									 
									 
			    "<input type='text' class='form-control' name='qty[]'  placeholder='input barang' >"+
				"<input type='date' class='form-control' name='exp[]' >"+
				  
				"</table>" +
				"<br><br>");
			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>

              </div><!-- /.box -->
              </div> <!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col --><!-- /.row (main row) -->
</section> <!-- /.content --><!-- /.container --><!-- /.content-wrapper -->


       <?php
      break;
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
      if (isset($_POST['add'])) {
                
		        $query .= mysql_query("INSERT INTO inv VALUES ('','$_POST[inv]','$_POST[do]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[tgl]','$_POST[tempo]','$_POST[nmprod1]','$_POST[qty1]','$_POST[exp1]','$_POST[price1]','$_POST[total1]','$_POST[nmprod2]','$_POST[qty2]','$_POST[exp2]','$_POST[price2]','$_POST[total2]','$_POST[nmprod3]','$_POST[qty3]','$_POST[exp3]','$_POST[price3]','$_POST[total3]','$_POST[nmprod4]','$_POST[qty4]','$_POST[exp4]','$_POST[price4]','$_POST[total4]','$_POST[total]','$_POST[ppn]','$_POST[grand_total]')"); 
                echo "<script>window.location='home.php?pg=so&act=view'</script>";
              }
              ?>






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
                       
					 <input type="text" class="form-control" id="r2" name="r2" >
				    <input type="text" class="form-control" id="r2" name="r2" >
                    </div>
					  
					 <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_rm'];?>">
                    <div class="form-group">
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Update</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
                  </div>
  <!-- /.box-body --><!-- /.row (main row) --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

				  

    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM so WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=so&act=view'</script>";
      break;

    }
    ?>

<script>
	//upper
	$(function(){
		$('#nama_vendor').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
    	$('#merk_barang').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
	});
	</script>