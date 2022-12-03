
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
          <h1>Data Produk Per-Customer</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Barang   
          </ol>
  </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=datafgcust&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
  </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="233" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="23">No</th>
                        <th width="71">Nama Customer</th>
						<th width="84">Produk</th>
						<th width="84">Harga</th>
                        <th width="27">Edit</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM harga_cust order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo "$r[nama_fg]"?></td>
						<td><?php echo "$r[harga]"?></td>
						 <td><a href="?pg=datafgcust&act=edit&id_produk=<?php echo $r['id_fg']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
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
                $query = mysql_query("INSERT INTO harga_cust VALUES ('','$_POST[nm_cust]','$_POST[nama_fg]','$_POST[harga]')");
		  
		        echo "<script>window.location='home.php?pg=datafgcust&act=view'</script>";
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
					<input type="hidden" class="form-control" id="idf" name="id" placeholder="Nomor Planing" required data-fv-notempty-message="Tidak boleh kosong">
                  </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Customer</label><br>
                      <select class="form-control select2" id="nm_cust" name="nm_cust" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM nm_cust order by no asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nama_cust']; ?>">
                        <?php echo $row['nama_cust']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					</div>
					  
					
					
					
					   
                    <div class="form-group">Harga                     
                      <input type="text" class="form-control" id="harga" name="harga" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum">
                    </div> 
					  
					  
					  
			      </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
    </div><!-- /.box-body --><!-- /.box --><!-- /.col -->
 
    <!-- /.row (main row) -->
</section> 
<!-- /.content -->
 <!-- /.container -->
<!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk_fg where id_fg='$_GET[id_fg]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE produk_fg SET id_cust_fk='$_POST[id_cust_fk]',nama_fg='$_POST[nama_fg]'WHERE id_fg='$_POST[id_fg]'");
                echo "<script>window.location='home.php?pg=datafgcust&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Produk</a></li>
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
					  
					<input type="hidden" class="form-control" id="no" name="no" placeholder="Nomor Planing" required data-fv-notempty-message="Tidak boleh kosong">
					  
                      <div class="form-group">
                      <label for="exampleInputEmail1">Nama Customer</label><br>
                      <select class="form-control select2" id="nm_cust" name="id_cust_fg" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM nm_cust order by no asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nama_cust']; ?>">
                        <?php echo $row['nama_cust']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					  
                   
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label><br>
                      <select class="form-control select2" id="nama_fg" name="nama_fg" style="width: 100%;" s>
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
      mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=produk&act=view'</script>";
      break;
			
      }
    ?>



<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>
<script>
            $("#produk_fg").chained("#nm_cust");
         
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