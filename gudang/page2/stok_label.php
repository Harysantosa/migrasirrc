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
        <h1> Data Label dan Plastik</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Label dan Plastik/ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href=""> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data Label dan Plastik</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="788"  class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
						 <th width="201" style="text-align: left">No</th>  
                        
						<th width="402" style="text-align: left">Nama Label </th>
						  <th width="66"  style="text-align: left">Stok</th>
						
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM stok_label order by id asc");
                    $no1 = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: left"><?php echo "$no1"?></td>
						
						<td style="text-align: left"><?php echo "$r[nm_label]"?></td>
						<td style="text-align: left"><?php echo "$r[stok]"?></td>
						
                     
                                      </a></td>
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
                $query = mysql_query("INSERT INTO stok_rm VALUE('','$_POST[id_rm]','$_POST[nm_rm]','$_POST[stok]')");
                echo "<script>window.location='home.php?pg=stokrm&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Raw Material</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Raw Metrial</a></li>
            <li class="active"><a href="#">Tambah Data Raw Material</a></li>
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
                      $sql = mysql_query("select * from stok_rm");
                      
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
                      $kode_jadi = "RM-$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Kode Finish Good</label>
                      <input type="text" class="form-control" id="id_rm" name="id_rm" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="id_rm" name="id_rm" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Nama RM</label>
                      <input type="text" class="form-control" id="nm_rm" name="nm_rm" placeholder="Stok Finish Good" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM stok_rm WHERE no='$_GET[no]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE stok_rm SET nm_rm='$_POST[nm_rm]',stok='$_POST[stok]'WHERE no='$_POST[no]'");
                echo "<script>window.location='home.php?pg=stokrm&act=view'</script>";
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
                     
					  <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Produk 1</label> <br>
                      <select class="form-control select2" name="nm_rm" style="width: 100%;" onKeyUp="sum">
                      <option value="">--SIlahkan Pilih--</option>
					    <option value="Terigu Dragonfly">Terigu Dragonfly</option>
						<option value="Terigu f06">Terigu F06</option>
						<option value="Terigu f02">Terigu F02</option>
						<option value="Terigu Hikari">Terigu Hikari</option>
						<option value="Terigu White Bear">Terigu White Bear</option>
						<option value="Terigu Gelang Berlian">Terigu Gelang Berlian</option>
						<option value="Terigu Tambang">Terigu Tambang</option>
						<option value="Gula Pasir">Gula Pasir</option>
						<option value="Calcium">Calcium</option>
						<option value="Instant Plus">Instant Plus</option>
						<option value="Ragi">Ragi</option>
						<option value="Shoftening">Shoftening</option>
						<option value="Titanium"> Titanium</option>
						<option value="Sunset Yellow">Sunset Yellow</option>
						<option value="Margarine">Margarine</option>
						<option value="Premix 01">Premix 01</option>
						<option value="Premix 02">Premix 02</option>
						<option value="Premix 03">Premix 03</option>
						<option value="Premix 04">Premix 04</option>
						<option value="Premix 05">Premix 05</option>
						  
					  </select>
				    </div>
					  
						
					  <div class="form-group">
                      <label for="exampleInputEmail1">Stok Finish Good</label>
                      <input type="text" class="form-control" id="stok" name="stok" placeholder="Nomor Telepon" value= "<?php echo $d['stok'];?>">
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
      mysql_query("DELETE FROM stok_rm WHERE no='$_GET[no]'");
      echo "<script>window.location='home.php?pg=stokrm&act=view'</script>";
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