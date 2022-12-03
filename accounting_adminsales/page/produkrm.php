
<?php
error_reporting
?>

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
        <h1>Data Verifikasi RM IN</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li>Data Kedatangan RM             </li>
            </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="cetak_produkrm.php"> <button type="button" class="btn btn-info"><i class = "fa fa-print"> Cetak Data Barang Masuk</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="1121" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="37" style="text-align: center">No</th>
                        <th width="178" style="text-align: center">Nomor PO</th>
						<th width="138" style="text-align: center">Nama Vendor</th>
						<th width="211" style="text-align: center">Jenis Barang</th>
						<th width="116" style="text-align: center">Jumlah Barang</th>  
						<th width="98" style="text-align: center">Jumlah (KG)</th>
						<th width="122" style="text-align: center">Tanggal PO</th>
						<th width="139" style="text-align: center">Tanggal Datang</th>
						<th width="42" style="text-align: center">Verify</th>
						
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM produkrm order by id_produk asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						<td style="text-align: center"><?php echo "$r[no_po]"?></td>
						<td style="text-align: center"><?php echo "$r[nama_vendor]"?></td>
                        <td style="text-align: center"><?php echo "$r[nm_rm]"?></td>
                        <td style="text-align: center"><?php echo "$r[jumlah_barang]"?></td>
                        <td style="text-align: center"><?php echo "$r[jumlah_kg]"?></td>
                        <td style="text-align: center"><?php echo "$r[tglmasuk]"?></td>
						<td style="text-align: center"><?php echo "$r[tgldatang]"?></td>
                        <td style="text-align: center"><a href="?pg=produkrm&act=edit&id_produk=<?php echo $r['id_produk']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
							
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
                $query = mysql_query("INSERT INTO produkrm VALUES ('','$_POST[no_po]','$_POST[nama_vendor]','$_POST[nm_rm]','$_POST[jumlah_barang]','$_POST[jumlah_perkilo]','$_POST[jumlah_kg]')");
                echo "<script>window.location='home.php?pg=produkrm&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Produk</a></li>
            <li class="active"><a href="#">Tambah Data Produk</a></li>
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
					 <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from produk");
                      
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
                      $tahun = date('Y/m');
                      $kode_jadi = "PO/SPS/$tahun/$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">No PO</label>
                      <input type="text" class="form-control" id="no_po" name="no_po" placeholder="Nomor Penjualan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                    </div>
					 <input type="hidden" class="form-control" id="no_po" name="no_po" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label> <br>
                      <select class="form-control select2" id="nama" name="nama_vendor" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM vendor order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nama']; ?>">
                        <?php echo $row['nama']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang</label> <br>
                      <select class="form-control select2" id="rm" name="nm_rm" style="width: 100%;">
                      <option value="">--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_rm ORDER BY id_rm");
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
					  
					 
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Barang</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Berat Per Barang</label>
                      <input type="text" class="form-control" id="jumlah_perkilo" name="jumlah_perkilo" placeholder="Jumlah Berat Satuan Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Total KG</label>
                      <input readonly class="form-control" id="jumlah_kg" name="jumlah_kg" placeholder="Total (KG)" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Harga Perbarang</label>
                      <input type="text" class="form-control" id="harga_perbarang" name="harga_perbarang" placeholder="Harga" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Total Harga Barang</label>
                      <input readonly class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PPN</label>
                      <input readonly class="form-control" id="ppn" name="ppn" placeholder="Pajak" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Grand Total</label>
                      <input readonly class="form-control" id="grand_total" name="grand_total" placeholder="Grand Total" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah dibayar</label>
                      <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Sisa Hutang</label>
                      <input readonly class="form-control" id="sisa_hutang" name="sisa_hutang" placeholder="Sisa Hutang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input type="date" class="form-control" id="date" name="tglmasuk" placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
											  
                    <script>
						function sum() {
							var txtFirstNumberValue = document.getElementById('jumlah_barang').value;
      						var txtSecondNumberValue = document.getElementById('jumlah_perkilo').value;
							var txt4=document.getElementById('harga_perbarang').value;
							var txt5=document.getElementById('total_harga').value;
							var txt6=document.getElementById('grand_total').value;
							var txt7=document.getElementById('ppn').value;
							var txt8=document.getElementById('jumlah_bayar').value;
							var txt9=document.getElementById('sisa_hutang').value;
							
							var result1 = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah_kg').value = result1;
							}
							
							var result2 = parseInt(txtFirstNumberValue) * parseInt(txt4);
      						if (!isNaN(result2)) {
         					document.getElementById('total_harga').value = result2;
							}
							
							var result3 = parseInt(txt5) * 0.1;
      						if (!isNaN(result3)) {
         					document.getElementById('ppn').value = result3;
							}
							
							var result4 = parseInt(txt5) + parseInt(txt7);
      						if (!isNaN(result4)) {
         					document.getElementById('grand_total').value = result4;
							}
							
							var result5 = parseInt(txt6) - parseInt(txt8);
      						if (!isNaN(result5)) {
         					document.getElementById('sisa_hutang').value = result5;
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

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
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
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produkrm where id_produk='$_GET[id_produk]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE produkrm SET no_po='$_POST[no_po]',jumlah_barang='$_POST[jumlah_barang]',jumlah_perkilo='$_POST[jumlah_perkilo]',jumlah_kg='$_POST[jumlah_kg]',tgldatang='$_POST[tgldatang]'WHERE id_produk='$_POST[id_produk]'");
                echo "<script>window.location='home.php?pg=produkrm&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Produk</a></li>
            <li class="active">Update Data Produk</li>
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
                      <label for="exampleInputEmail1">Nomor PO</label>
                      <input readonly class="form-control" id="no_po" name="no_po" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_po'];?>">
                    </div>
					 <input type="hidden" class="form-control" id="id_produk" name="id_produk" placeholder="Nomor Planing" value="<?php echo $d['id_produk'];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    					 
						  
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Barang</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" 
					  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['jumlah_barang'];?>" onKeyUp="sum();">
                    </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Berat Per Barang</label>
                      <input type="text" class="form-control" id="jumlah_perkilo" name="jumlah_perkilo" placeholder="Berat Per Kilo"  value= "<?php echo $d['jumlah_perkilo'];?>" onKeyUp="sum();">
                    </div>
					 
					  <div class="form-group">
                     <label for="exampleInputEmail1">Total KG</label>
                      <input type readonly class="form-control" id="jumlah_kg" name="jumlah_kg" placeholder="Total KG"  value= "<?php echo $d['jumlah_kg'];?>" onKeyUp="sum();">
                    </div>
					  					 
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal PO</label>
                      <input type readonly class="form-control" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY"  value= "<?php echo $d['tglmasuk'];?>">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Kedatangan</label>
                      <input type="date" class="form-control" id="tgldatang" name="tgldatang" placeholder="MM/DD/YYY"  value= "<?php echo $d['tgldatang'];?>">
                    </div>
					  
					   <script>
						function sum() {
							var first = document.getElementById('jumlah_barang').value;
      						var second = document.getElementById('jumlah_perkilo').value;
							
							
							var result1 = parseInt(first) * parseInt(second);
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah_kg').value = result1;
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

              <button type="submit" name = 'update' class="btn btn-info">Update</button>
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
</div><!-- /.content-wrapper -->


    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM produkrm WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=produk&act=view'</script>";
      break;

    }
    ?>


  <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#merek").chained("#rm");
         
        </script>

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