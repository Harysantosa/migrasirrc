<?php
error_reporting
?>
<?php 
	$kode = $pembelian->kode_otomatis();
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
   <a href="?pg=stokfg&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
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
						 
						  <th  style="text-align: left">Edit</th>
						  <th  style="text-align: left">Hapus</th>
						  
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM stok_fg order by no_form asc");
                    $no1 =1; 
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: left"><?php echo "$no1"?></td>
						<td style="text-align: left"><?php echo "$r[no_form]"?></td>
						<td style="text-align: left"><?php echo "$r[nm_fg]"?></td>
				
						 <td><a href="?pg=stokfg&act=edit&no_form=<?php echo $r['no_form']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=stokfg&act=delete&no=<?php echo $r['no']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>
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
                $query = mysql_query("INSERT INTO stok_fg VALUE('','$_POST[no_form]','$_POST[nm_fg]','$_POST[stok]')");
                echo "<script>window.location='home.php?pg=stokfg&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Dafar Nama Finish Good </h1>
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
                   <label for="exampleInputEmail1">Kode Finish Good</label>
                   <input type="text" class="form-control" id="no_form" name="no_form" placeholder="Nomor Planing" value="<?php echo $kode?>" required data-fv-notempty-message="Tidak boleh kosong">
                      <input type="hidden" class="form-control" id="no_form" name="no_form" placeholder="Nomor Planing" value="<?php echo $kode?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
			 <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" class="form-control" id="nm_fg" name="nm_fg" placeholder="Nama Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM stok_fg where no_form='$_GET[no_form]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE stok_fg SET no_form='$_POST[no_form]',nm_fg='$_POST[nm_fg]',stok='$_POST[stok]'WHERE no='$_POST[no]'");
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
					
					
					
					  <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					</div>
					  <div class="form-group">
					  
					  <input type readonly="" class="form-control" id="no_form" name="no_form" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_form'];?>">
					  </span>
					  </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Finish Good</label>
                      <input type="text" class="form-control" id="nm_fg" name="nm_fg" placeholder="alamat vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_fg'];?>">
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
      mysql_query("delete FROM stok_fg where no='$_GET[no]'");
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