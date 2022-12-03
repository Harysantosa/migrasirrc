
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
        <h1>Data Harga Bahan Baku</h1>
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
    <a href="?pg=listbahan&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
	
		
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="589" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%">
                    <thead>
                      <tr>
                        <th width="23">No</th>
						
                        <th width="71">Kategori</th>
						<th width="84">Berat Bahan Baku</th>
						<th width="84">Nama Bahan Baku</th>
                        <th width="136">Harga Bahan Baku</th>
						<th width="27">Edit</th>
						<th width="43">Hapus Data</th>
						 
						
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
include("indo.php");
                    $tampil=mysql_query("SELECT * FROM harga_rm order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[kategori]"?></td>
						<td><?php echo "$r[berat]"?></td>
						<td><?php echo "$r[nm_fg]"?></td>
						<td>Rp.<?php echo "". number_format("$r[harga]")?></td>
                        <td><a href="?pg=listbahan&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
							
                        <td><a href="?pg=listbahan&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
						  
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
                $query = mysql_query("INSERT INTO harga_rm VALUES ('','$_POST[kategori]','$_POST[berat]','$_POST[nm_fg]','$_POST[harga]')");
		  
		       echo "<script>window.location='home.php?pg=listbahan&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Bahan Produksi </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=listbahan&act=view">Data Produk</a></li>
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
                      <label for="exampleInputEmail1">Kategori Bahan Baku</label>
                      <input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" >
					  
					
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Berat Bahan Baku</label>
                      <input type="text" class="form-control" id="berat" name="berat" placeholder="berat bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Bahan Baku</label>
                      <input type="text" class="form-control" id="nm_fg" name="nm_fg" placeholder="Harga bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					
					
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Harga Bahan Baku</label>
                      <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					
					
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM harga_rm where id='$_GET[id]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE harga_rm SET kategori='$_POST[kategori]'
				,berat='$_POST[berat]'
				,nm_fg='$_POST[nm_fg]'
				,harga='$_POST[harga]'
				WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=listbahan&act=view'</script>";
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
				  
				   <div class="form-group">
                      <label for="exampleInputEmail1">Kategori Bahan Baku</label>
                      <input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['kategori'];?>">
					  <input type="hidden" class="form-control" id="id" name="id"value="<?php echo $d['id'];?>">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Berat Bahan Baku</label>
                      <input type="text" class="form-control" id="berat" name="berat" placeholder="berat bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['berat'];?>" >
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Bahan Baku</label>
                      <input type="text" class="form-control" id="nm_fg" name="nm_fg" placeholder="nama bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['nm_fg'];?>"  >
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Harga Bahan Baku</label>
                      <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga bahan baku" 
					  required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['harga'];?>"  >
                    </div>
					
				  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->
	</section>
</div>
          
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
      mysql_query("DELETE FROM harga_rm WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=listbahan&act=view'</script>";
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
	</script>