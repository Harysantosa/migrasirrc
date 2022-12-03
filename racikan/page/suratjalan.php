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
    <a href=""> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="512" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
						 <th width="24">NO</th>
						  <th width="62">Delivery Order</th>
                        <th width="65">Nama Customer</th>
						 <th width="48">Alamat</th>
						  <th width="62">Delivery Order</th>
						   <th width="33">Date</th>
						   <th width="80">Mobil dan Plat Nomor</th>
						   <th width="35">Supir</th>
						   <th width="53">Expidisi</th>
						   <th width="27">Edit</th>
						  <th width="41">Cetak</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM rm order by id_rm asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
						<td><?php echo "$no"?></td>
                       	<td><?php echo "$r[nama_rm]"?></td>
						<td><?php echo "$r[nama_rm]"?></td>
						<td><?php echo "$r[nama_rm]"?></td>
						<td><?php echo "$r[nama_rm]"?></td>
						<td><?php echo "$r[nama_rm]"?></td>
						<td><?php echo "$r[nama_rm]"?></td>
						<td><?php echo "$r[nama_rm]"?></td>
						<td><a href=""><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href=""><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
                $query = mysql_query("INSERT INTO rm VALUES ('','$_POST[nama_rm]')");
                echo "<script>window.location='home.php?pg=rm&act=view'</script>";
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
					  
					<div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" value= "<?php echo $d['r1'];?>">
				      <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
                    </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" value= "<?php echo $d['r1'];?>">
				      <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
                    </div>
					  					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" value= "<?php echo $d['r1'];?>">
				      <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
                    </div>
                    
					  <div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" value= "<?php echo $d['r1'];?>">
				      <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
					  <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
                    </div>
					
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM rm WHERE id_rm='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE rm SET nama_rm='$_POST[nama_rm]'WHERE id_rm='$_POST[id]'");
                echo "<script>window.location='home.php?pg=rm&act=view'</script>";
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
                      <label for="exampleInputEmail1">Nama bahan baku</label>
                      <input type="text" class="form-control" id="nama_rm" name="nama_rm" placeholder="Nama bahan baku" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_rm'];?>">
                    </div>
					  
					 <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_rm'];?>">
                    <div class="form-group">
					  
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
      mysql_query("DELETE FROM rm WHERE id_rm='$_GET[id]'");
      echo "<script>window.location='home.php?pg=rm&act=view'</script>";
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