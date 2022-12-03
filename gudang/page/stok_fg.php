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
        <h1> Data Stok Finish Good</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Stok FG</ol>
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
                  <table width="100"  class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
						 <th style="text-align: left">No</th>  
                        <th style="text-align: left">Kode Barang</th>
						<th style="text-align: left">Nama Barang </th>
						  <th  style="text-align: left">Stok</th>
						  
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM stok_fg order by id asc");
                    $no1 = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: left"><?php echo "$no1"?></td>
						<td style="text-align: left"><?php echo "$r[no_form]"?></td>
						<td style="text-align: left"><?php echo "$r[nm_fg]"?></td>
						<td style="text-align: left"><?php echo "$r[stok]"?></td>
						</tr>
						<?php
                    $no1++;
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
      case 'add' :
      if (isset($_POST['add'])) {
                $query = mysql_query("INSERT INTO stok_fg VALUE('','$_POST[id_fg]','$_POST[nm_fg]','$_POST[stok]')");
                echo "<script>window.location='home.php?pg=stokfg&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Vendor</h1>
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
                      $sql = mysql_query("select * from stok_fg");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 2, "0", STR_PAD_LEFT);
                      $tahun = +1;
                      $kode_jadi = "FG-$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Kode Finish Good</label>
                      <input type="text" class="form-control" id="id_fg" name="id_fg" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="id_fg" name="id_fg" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Produk 1</label> <br>
                      <select class="form-control select2" name="nm_fg" style="width: 100%;" onKeyUp="sum">
                      <option value="">--SIlahkan Pilih--</option>
						  <option value="Sapu Jagat Mix">Sapu Jagat Mix</option>
						<option value="Sapu Jagat White">sapu jagat white</option>
						 <option value="Sapu Jagat Yellow">sapu jagat yellow</option> 
						<option value="Eco Royal Mix">Eco Royal Mix</option>
						<option value="Eco Royal White">Eco Royal White</option>
						<option value="Royal Mix">Royal Mix</option>
						<option value="Royal White">Royal White</option>
						<option value="Eco Raja Orange">Eco Raja Orange</option>
						<option value="Raja Mix">Raj Mix</option>
						<option value="Raja Orange"> Raja Orange</option>
						<option value="RYL BC 07">Royal BreadChrumb 07</option>
						<option value="RJ BC 01">Raja Breadchrumb 01</option>
						  
					  </select>
				    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Stok</label>
                      <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Finish Good" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  
                     <div class="form-group"></div>
					  
					  
                   					  
					  
					<div><!-- /.box-body -->

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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM stok_fg WHERE no='$_GET[no]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE stok_fg SET nm_fg='$_POST[nm_fg]',stok_fg='$_POST[stok_fg]'WHERE no='$_POST[no]'");
                echo "<script>window.location='home.php?pg=stokfg&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Vendor</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Vendor</a></li>
            <li class="active">Update Data Vendor</li>
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
                      <label for="exampleInputEmail1">ID Finish Good</label>
					</div>
					  <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					  <span class="form-group">
					  <input type="text" class="form-control" id="id_fg2" name="id_fg2" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_fg'];?>">
					  </span>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Finish Good</label>
                      <input type="text" class="form-control" id="nm_fg" name="nm_fg" placeholder="alamat vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_fg'];?>">
                    </div>
						
					  <div class="form-group">
                      <label for="exampleInputEmail1">Stok Finish Good</label>
                      <input type="text" class="form-control" id="stok_fg" name="stok_fg" placeholder="Nomor Telepon" value= "<?php echo $d['stok_fg'];?>">
                    </div>
					  
					
					  
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
                  </div>
  <!-- /.box-body --><!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM stok_fg WHERE no='$_GET[no]'");
      echo "<script>window.location='home.php?pg=stokfg&act=view'</script>";
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