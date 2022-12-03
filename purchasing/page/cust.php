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
        <h1> Data Customer</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Customer</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href=?pg=cust&act=add> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="500" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
						  <th width="24">NO</th>
						  <th width="62">Id Customer</th>
                          <th width="65">Nama Customer</th>
						  <th width="62">Alamat Customer</th>
						  <th width="62">Alamat Expedisi</th>
						  <th width="33">PIC</th>
					  <th width="33">Hapus</th>
						  <th width="33">Edit</th>
						  
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM customer order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
					
                        <tr>
						<td><?php echo "$no"?></td>
                       	<td><?php echo "$r[id_cust]"?></td>
						<td><?php echo "$r[nama]"?></td>
						<td><?php echo "$r[alamat]"?></td>
						<td><?php echo "$r[expedisi]"?></td>
						<td><?php echo "$r[pic]"?></td>
						
					    <td><a href="?pg=cust&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
						<td><a href="?pg=cust&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
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
                $query .= mysql_query("INSERT INTO customer VALUES ('','$_POST[id_cust]','$_POST[nama]','$_POST[penerima]','$_POST[alamat]','$_POST[expedisi]','$_POST[pic]')");
		      
		       
                echo "<script>window.location='home.php?pg=cust&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
	<script src="jquery.min.js" type="text/javascript"></script>
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Customer</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Customer</a></li>
            <li class="active"><a href="#">Tambah Data Customer</a></li>
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
                      $sql = mysql_query("select * from customer");
                      
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
                      $tahun = date('m/Y');
                      $kode_jadi = "CUST-$bikin_kode";

                      ?>
					 		  
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Customer</label>
                      <input type="text" class="form-control" id="id_cust" name="id_cust" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="id_cust" name="id_cust" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  					
					  <div class="form-group">Nama Customer
                     <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					  
					    <div class="form-group">Penerima
                     <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Nama Penerima" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					  
					  <div class="form-group">Alamat Customer
                     <input type="text" class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					    <div class="form-group">Expedisi
                     <input type="text" class="form-control" id="expedisi" name="expedisi" placeholder="Nama Expedisi" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					  
					  <div class="form-group">No Telepon
                     <input type="text" class="form-control" id="pic" name="pic" placeholder="Nomor Telepon" >
					</div>	
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Update</button>
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM customer where id='$_GET[id]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE customer SET id_cust='$_POST[id_cust]',nama='$_POST[nama]',alamat='$_POST[alamat]',expedisi='$_POST[expedisi]',pic='$_POST[pic]' WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=cust&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Formuala</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Customer</a></li>
            <li class="active">Update Data Customer</li>
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
                      <label for="exampleInputEmail1">Nomor Customer</label>
                      <input readonly class="form-control" id="id_cust" name="id_cust" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_cust'];?>">
                    </div>
					
					  <div class="form-group">
					 <input type="hidden" class="form-control" id="id" name="id" placeholder="Nomor Planing" value="<?php echo $d['id'];?>" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>				 
						
					    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Customer </label>
                      <input "text" class="form-control" id="nama" name="nama"  style="text-transform:uppercase" value="<?php echo $d['nama'];?>" >
                    </div>
					  
					  					   
					    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat </label>
                      <input "text" class="form-control" id="alamat" name="alamat"  style="text-transform:uppercase" value="<?php echo $d['alamat'];?>" >
                    </div>
					  
					  					   
					    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat Expedisi</label>
                      <input "text" class="form-control" id="expedisi" name="expedisi"  style="text-transform:uppercase" value="<?php echo $d['expedisi'];?>" >
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">PIC</label>
                      <input "text" class="form-control" id="pic" name="pic"  style="text-transform:uppercase" value="<?php echo $d['pic'];?>" >
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
      mysql_query("DELETE FROM customer WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=cust&act=view'</script>";
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



