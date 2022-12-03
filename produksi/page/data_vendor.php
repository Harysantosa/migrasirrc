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
        <h1> Data Vendor</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=datavendor&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data Vendor</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="730" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="60">NO</th>
						<th width="64">Kode Vendor</th>
                        <th width="64">Nama Vendor</th>
                        <th width="132">Alamat</th>
						  <th width="41">Kota</th>
						  <th width="40">Kode Pos</th>
						 <th width="72">Telepon</th>
						  <th width="87">NPWP</th>
						  <th width="52">PIC</th>
						  <th width="27">Edit</th>
						  <th width="43">Hapus</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM vendor order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[kode]"?></td>
						<td><?php echo "$r[nama]"?></td>
						<td><?php echo "$r[alamat]"?></td>
						<td><?php echo "$r[kota]"?></td>
						<td><?php echo "$r[poscode]"?></td>
						<td><?php echo "$r[telepon]"?></td>
						<td><?php echo "$r[npwp]"?></td>
						<td><?php echo "$r[pic]"?></td>
                        <td><a href="?pg=datavendor&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=datavendor&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
      case 'add' :
      if (isset($_POST['add'])) {
                $query = mysql_query("INSERT INTO vendor VALUE('','$_POST[kode]','$_POST[nama]','$_POST[alamat]','$_POST[kota]','$_POST[poscode]','$_POST[telepon]','$_POST[npwp]','$_POST[pic]')");
                echo "<script>window.location='home.php?pg=datavendor&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Vendor</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=datavendor&act=view">Data Vendor</a></li>
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
                      $sql = mysql_query("select * from vendor");
                      
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
                      $tahun = +1;
                      $kode_jadi = "SP0$tahun-$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Kode Vendor</label>
                      <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="kode" name="kode" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					  
                    <div class="form-group">	
                      <label for="exampleInputEmail1">Nama Vendor</label>
                      <input type="text" class="form-control" id="nama"  name="nama" placeholder="Nomor Vendor" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase" maxlength="50">
                    </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Vendro" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase" maxlength="50" >
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Kota / Kabupaten</label>
                      <input type="text" class="form-control" id="kota" name="kota" placeholder="Alamat Vendro" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase" maxlength="50" >
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Kode Pos</label>
                      <input type="text" class="form-control" id="poscode" name="poscode" placeholder="Alamat Vendro" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase" maxlength="50" >
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">No Telepon</label>
                      <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Alamat Vendro" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase" maxlength="13">
                    </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Poko Wajib Pajak</label>
                      <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Jenis Barang" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase">
                    </div>
					  
					    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Person io Charge</label>
                      <input type="text" class="form-control" id="pic" name="pic" placeholder="Jenis Barang" required data-fv-notempty-message="Tidak boleh kosong" style="text-transform:uppercase">
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM vendor WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE vendor SET nama='$_POST[nama]',alamat='$_POST[alamat]',kota='$_POST[kota]',poscode='$_POST[poscode]',telepon='$_POST[telepon]',npwp='$_POST[npwp]',pic='$_POST[pic]'WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=datavendor&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Vendor</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=datavendor&act=view">Data Vendor</a></li>
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
                      <label for="exampleInputEmail1">Nama vendor</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama'];?>">
                    </div>
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
                    </div>
						
					  <div class="form-group">
                      <label for="exampleInputEmail1">Telpon</label>
                      <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon" value= "<?php echo $d['telepon'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Kota/Provinsi</label>
                      <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" value= "<?php echo $d['kota'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Kode Pos</label>
                      <input type="text" class="form-control" id="poscode" name="poscode" placeholder="Kode Pos" value= "<?php echo $d['poscode'];?>">
                    </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">NPWP</label>
                      <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Nomor Pokok Wajib Pajaka" value= "<?php echo $d['npwp'];?>">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Person in Charge</label>
                      <input type="text" class="form-control" id="pic" name="pic" placeholder="Person In Charge" 
					  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['pic'];?>">
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
      mysql_query("DELETE FROM vendor WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=datavendor&act=view'</script>";
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