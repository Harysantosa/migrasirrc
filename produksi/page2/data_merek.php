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
        <h1> Data Stok</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Barang   
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=namabarang&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="351" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="74">Id Merek</th>
                        <th width="170">Nama Barang</th>
                        <th width="328">Merek Barang</th>
						   <th width="76">Edit</th>
						  <th width="73">Hapus</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM merek order by id_merek asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[id_rm_fk]"?></td>
						<td><?php echo "$r[nm_merek]"?></td>
                        <td><a href="?pg=barang&act=edit&id=<?php echo $r['id_merek']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=barang&act=delete&id=<?php echo $r['id_merek']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
                $query = mysql_query("INSERT INTO produk VALUES ('','$_POST[no_inv]','$_POST[nama_vendor]','$_POST[jenis_barang]','$_POST[merk_barang]','$_POST[jumlah_barang]','$_POST[berat_kg]','$_POST[jumlah_kg]','$_POST[harga_perbarang]','$_POST[total_harga]','$_POST[ppn]','$_POST[grand_total]','$_POST[jumlah_bayar]','$_POST[sisa_hutang]','$_POST[tglmasuk]')");
                echo "<script>window.location='home.php?pg=produk&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Produk </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Produk</a></li>
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
                      <label for="exampleInputEmail1">Nama Produk</label> <br>
                      <select class="form-control select2" name="id_produk" style="width: 100%;">
                      <option value="">--- Silahkan Pilih ---</option>
                      <optgroup label="--- Nama Produk ---">
                      <?php
                      $tampil=mysql_query("SELECT * FROM produk ORDER BY id_produk");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['id_produk']?>"><?php echo $r['jenis_barang'] ?></option>
                      <?php
                    }
                    ?>
						    </optgroup>
                      </select>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Merek</label>
                      <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" placeholder="Jenis Barang" required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                     
                    </div>
					  
					  
					  
					  
					  
					  
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE produk SET tipe_brg='$_POST[tipe_brg]',merk_brg='$_POST[merk_brg]',nm_vendor='$_POST[nm_vendor]',kategori='$_POST[kategori]'WHERE id_produk='$_POST[id]'");
                echo "<script>window.location='home.php?pg=produk&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Pengguna </h1>
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
                      <label for="exampleInputEmail1">Tipe Barang</label>
                      <input type="text" class="form-control" id="no_inv" name="no_inv" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_inv'];?>">
                    </div>
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_produk'];?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Merek Barang</label>
                      <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_vendor'];?>">
                    </div>
											
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label>
                      <input type="text" class="form-control" id="merk_barang" name="merk_barang" placeholder="Merek Barang" value= "<?php echo $d['merk_barang'];?>" onKeyUp="sum();">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" 
					  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['jumlah_barang'];?>" onKeyUp="sum();">
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
      mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
      echo "<script>window.location='home.php?pg=produk&act=view'</script>";
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