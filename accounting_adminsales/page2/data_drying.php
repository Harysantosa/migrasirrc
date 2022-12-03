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
        <h1> Data Pengeringan Roti</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=dataprod&act=view">Data Planing</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="">  </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="1362"  height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="22" style="text-align: center">No</th>
                        <th width="208" style="text-align: center">No Plan Produksi</th>
                        <th width="156" style="text-align: center">Tanggal Produksi Roti</th>
						<th width="121" style="text-align: center">Nama Produksi Roti</th>
						<th width="136" style="text-align: center"><p>Shift Drying</p></th>
						<th width="114" style="text-align: center">Tanggal Drying</th>
						<th width="92" style="text-align: center">Jumlah Drying</th>
						<th width="113" style="text-align: center">Jenis Plastik</th>
						<th width="108" style="text-align: center">Jenis Label</th>
						<th width="131" style="text-align: center">Exp Date</th>
						<th width="58" style="text-align: center">Tambah Data</th>
						<th width="51" style="text-align: center">Hapus</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM drying order by no asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
						  
					                   ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						<td style="text-align: center"><?php echo "$r[no_plan]"?></td>
						<td style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
                        <td style="text-align: center"><?php echo "$r[prod1]"?></td>
						<td style="text-align: center"><?php echo "$r[shift_drying]"?></td>
                        <td style="text-align: center"><?php echo  TanggalIndo($r['tgl_drying'])?></td>
						<td style="text-align: center"><?php echo "$r[fg]"?> Sak</td>
						<td style="text-align: center"><?php echo "$r[plastik]"?></td>
						<td style="text-align: center"><?php echo "$r[label]"?></td>
						<td style="text-align: center"><?php echo  TanggalIndo($r['exp'])?></td>
						 <td style="text-align: center"><a href="?pg=drying&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td style="text-align: center"><a href="?pg=drying&act=delete&no=<?php echo $r['no']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
                $query = mysql_query("INSERT INTO drying VALUES ('','$_POST[no_plan]','$_POST[tgl]','$_POST[prod1]','$_POST[shift_drying]','$_POST[tgl_drying]','$_POST[fg]','$_POST[plastik]','$_POST[label]','$_POST[exp]')");
		  
		  
		      echo "<script>window.location='home.php?pg=drying&act=view'</script>";
              }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Mixing</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing</a></li>
            <li class="active">Tambah Data Produksi</li>
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
                <form name="form1" role="form" method = "POST" action="">
                  <div class="box-body">
					
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">No Plan Produksi</label> <br>
                  <select class="form-control select2" id= "no_plan" name="no_plan" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM planprod ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['no_plan']?>"><?php echo $r['no_plan'] ?></option>
                      <?php
                    }
                    ?>
						    </optgroup>
                      </select>
					</div>			
					<input type="hidden" class="form-control" id="no" name="no" placeholder="Nomor Planing" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Produksi Roti</label>
                      <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produksi Roti</label>
                      <input type="text" class="form-control" id="prod1" name="prod1" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['prod1'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Shift Drying</label>
                      <br>
                      <select class="form-control select2" name="shift_drying" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--SIlahkan Pilih--</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						
										  
					  </select>
				    </div>
					  
					  
					  
					  <div class="form-group">
					  <label for="exampleInputEmail1">Tanggal Drying</label>
                      <input type="date" class="form-control" id="tgl_drying" name="tgl_drying" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah FG</label>
                      <input type="text" class="form-control" id="fg" name="fg" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Plastik</label> <br>
                  <select class="form-control select2" id= "plastik" name="plastik" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM plastik ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['nama']?>"><?php echo $r['nama'] ?></option>
                      <?php
                    }
                    ?>


						    </optgroup>
                      </select>
					</div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">label</label> <br>
                  <select class="form-control select2" id= "label" name="label" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM label ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['nama']?>"><?php echo $r['nama'] ?></option>
                      <?php
                    }
                    ?>
						    </optgroup>
                      </select>
					</div>
					  
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Exp</label>
                      <input type="date" class="form-control" id="exp" name="exp" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				                  </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM drying where no='$_GET[no]'"));
	  if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE drying SET no_plan='$_POST[no_plan]',tgl='$_POST[tgl]',prod1='$_POST[prod1]',shift_drying='$_POST[shift_drying]',tgl_drying='$_POST[tgl_drying]',fg='$_POST[fg]',plastik='$_POST[plastik]',label='$_POST[label]',exp='$_POST[exp]' WHERE no='$_POST[no]'");
				
                echo "<script>window.location='home.php?pg=drying&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Pengguna </h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing Produksi</a></li>
            <li class="active">Lihat Planing Produksi</li>
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
                      <label for="exampleInputEmail1">No Planing Prod</label>
                      <input readonly class="form-control" id="no_plan" name="no_plan" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_plan'];?>">
                    </div>
					  <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					  <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Produksi Roti</label>
                      <input readonly class="form-control" id="tgl" name="tgl" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>">
                    </div>
											
									  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produksi Roti</label>
                      <input readonly class="form-control" id="prod1" name="prod1" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['prod1'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Shift Drying</label>
                      <br>
                      <select class="form-control select2" name="shift_drying" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--SIlahkan Pilih--</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						
										  
					  </select>
				    </div>
					  
					<div class="form-group">
                      <label for="exampleInputEmail1">Jumlah FG</label>
                      <input type="text" class="form-control" id="fg" name="fg" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['fg'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Drying</label>
                      <input type="date" class="form-control" id="tgl_drying" name="tgl_drying" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl_drying'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Plastik</label> <br>
                  <select class="form-control select2" id="plastik" name="plastik" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM plastik ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['nama']?>"><?php echo $r['nama'] ?></option>
                      <?php
                    }
                    ?>
						    </optgroup>
                      </select>
					</div>
					  
					  					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Nama Label</label> <br>
                  <select class="form-control select2" id="label" name="label" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM label ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['nama']?>"><?php echo $r['nama'] ?></option>
                      <?php
                    }
                    ?>
						    </optgroup>
                      </select>
					</div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Exp</label>
                      <input type="date" class="form-control" id="exp" name="exp" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['exp'];?>">
                    </div>
					  
				    
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Simpan</button>
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
      mysql_query("DELETE FROM drying WHERE no='$_GET[no]'");
      echo "<script>window.location='home.php?pg=drying&act=view'</script>";
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