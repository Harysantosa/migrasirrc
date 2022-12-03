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
						   <th width="27">Tambah Item Barang</th>
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
                       	<td><?php echo "$r[do]"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo "$r[supir]"?></td>
						<td><?php echo "$r[tgl]"?></td>
						<td><?php echo "$r[mobil]"?></td>
						 <td><a href="?pg=so&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							
						<td style="text-align: center"><a href="?pg=tambahitem&act=add"> 
                        <button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
							
						<td><a href="cetak_sj.php?id=<?php echo $r[id]?>"> <button type="button" class="btn bg-orange">
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
	include "koneksi.php";
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
      if (isset($_POST['add'])) {
                	
		  $so = $_POST['do'];		  		
		  $nama = $_POST['nm_fg']; // Ambil data nama dan masukkan ke variabel nama
		  $telp = $_POST['qty']; // Ambil data telp dan masukkan ke variabel telp
		  $alamat = $_POST['exp']; // Ambil data alamat dan masukkan ke variabel alamat

// Proses simpan ke Database
		  $query = "INSERT INTO d_so VALUES";

		  $index = 0; // Set index array awal dengan 0
		  foreach($so as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
			$query .= "('".$datanis."','".$nama[$index]."','".$telp[$index]."','".$alamat[$index]."'),";
			$index++;
}

// Kita hilangkan tanda koma di akhir query
// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
$query = substr($query, 0, strlen($query) - 1).";";

// Eksekusi $query
mysql_query($connect, $query);
	
		  		
		       
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
					
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label> <br>
                      <select class="form-control select2" id="do" name="do[]" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM so order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['do']; ?>">
                        <?php echo $row['do']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					  
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
				"<table>"+ 

"<input type='readonly' class='form-control' id='do' name='do[]' placeholder='Nomor Planing'>"+
                    "</div>"+
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