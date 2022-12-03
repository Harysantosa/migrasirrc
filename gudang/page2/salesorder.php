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
        <h1>Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Sales Order</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=salesorder&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Sales Order</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped"  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="22">No</th>
                        <th width="64">NO SO</th>
						<th width="64">Tanggal SO</th>
                        <th width="50">Nama Customer</th>
			      		<th width="50">Lihat Status Pengiriman SO</th>
						<th width="50">Edit</th>
						<th width="50">Hapus</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM salesorder GROUP by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[no_so]"?></td>
						<td><?php echo TanggalIndo($r['tgl'])?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><a href="?pg=salesorder&act=edit1&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-check-square-o"></i></button></a></td>
							
                        <td><a href="?pg=salesorder&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
							
						<td><a href="?pg=salesorder&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                                    </tr>
						
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
              $query = mysql_query("INSERT INTO salesorder VALUES ('','$_POST[no_so]','$_POST[tgl]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[status1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[status2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[status3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[status4]')");
		     
		  		  
		  		
                echo "<script>window.location='home.php?pg=salesorder&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Buat Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing</a></li>
            <li class="active">Tambah Data Planing</li>
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
					  
					    <?php $kd_trans= kd_so2_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="no_so" value="<?php echo $kd_trans;?>" name="no_so"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_so" value="<?php echo $kd_trans;?>" name="no_so"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
					  
					  <div class="form-group">Tanggal Pemesanana
                    <input type="date" class="form-control" id="tgl" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong"/>
					</div>
					  
					 		 <div class="form-group">
                      <label for="exampleInputEmail1">Data Formula</label> <br>
					 
                    <select class="form-control select2" style="width: 100%;" name="nm_cust" id="nm_cust" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from customer");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';    
$jsArray .= "frm['" . $row['nama'] . "'] = {

alamat:'" . addslashes($row['alamat']) . "',
pic:'".addslashes($row['pic'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					<input readonly class="form-control" id="alamat" name="alamat" placeholder="alamat" >
				    <input readonly class="form-control" id="pic" name="pic" placeholder="PIC" >
					</div>	
					
					 <div class="form-group">
                     <select class="form-control select2" id="na" name="nm_fg1" style="width: 100%;" s>
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
				       <input type="text" class="form-control" id="qty1" name="qty1" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					   
					 <div class="form-group">
                     <select class="form-control select2" id="nm_fg2" name="nm_fg2" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM  stok_fg order by no asc");
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
                      
					<input type="text" class="form-control" id="qty2" name="qty2" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					   <div class="form-group">
                     <select class="form-control select2" id="nm_fg3" name="nm_fg3" style="width: 100%;" s>
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
                      
					 <input type="text" class="form-control" id="qty3" name="qty3" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					 <div class="form-group">
                     <select class="form-control select2" id="nm_fg4" name="nm_fg4" style="width: 100%;" s>
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
                ?>  </optgroup>
                      </select>
                      
					 <input type="text" class="form-control" id="qty4" name="qty4" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
		  
	  					  
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('alamat').value = frm[no_form].alamat;
		document.getElementById('pic').value = frm[no_form].pic; 
	
		
		
		
			};  
					  
	</script>		 
					
									
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM salesorder WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
	  mysql_query("UPDATE salesorder SET no_so='$_POST[no_so]',tgl='$_POST[tgl]',nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',tlp='$_POST[tlp]',nm_fg1='$_POST[nm_fg1]',qty1='$_POST[qty1]',nm_fg2='$_POST[nm_fg2]',qty2='$_POST[qty2]',nm_fg3='$_POST[nm_fg3]',qty3='$_POST[qty3]',nm_fg4='$_POST[nm_fg4]',qty4='$_POST[qty4]' WHERE id='$_POST[id]'");
				
                echo "<script>window.location='home.php?pg=salesorder&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Ubah Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing Produksi</a></li>
            <li class="active">Edit Planing Produksi</li>
             </ol>
        </section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="" >
                  <div class="box-body">
					  
					  
                    	<div class="form-group">
                        <label for="exampleInputEmail1">No Sales Order</label>
                        <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>">
					  </div>
					  
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 
					  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['tgl'];?>">
						   
					  </div>
					  
					  
					   <div class="form-group">Alamat Customer
                     <input type="text" class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					  <div class="form-group">No Telepon
                     <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Nomor Telepon" >
					</div>	
					  
					
					 <div class="form-group">
                     <select class="form-control select2" id="nama" name="nm_fg1" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_fg order by id asc");
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
				       <input type="text" class="form-control" id="qty1" name="qty1" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
					   
                    </div>
					
					   
					 <div class="form-group">
                     <select class="form-control select2" id="nm_fg2" name="nm_fg2" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM  stok_fg order by no asc");
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
                      
					<input type="text" class="form-control" id="qty2" name="qty2" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					   <div class="form-group">
                     <select class="form-control select2" id="nm_fg3" name="nm_fg3" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                 $query = mysql_query("SELECT * FROM stok_fg order by id asc");
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
                      
					 <input type="text" class="form-control" id="qty3" name="qty3" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
					
					 <div class="form-group">
                     <select class="form-control select2" id="nm_fg4" name="nm_fg4" style="width: 100%;" s>
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
                ?>  </optgroup>
                      </select>
                      
					 <input type="text" class="form-control" id="qty4" name="qty4" onKeyUp="sum();" placeholder="input dalam satuan Sak" >
                    </div>
		  
	  			

					  
					  
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Edit</button>
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
      case 'edit1':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM salesorder WHERE id='$_GET[id]'"));
            if (isset($_POST['update1'])) {
	  mysql_query("UPDATE salesorder SET no_so='$_POST[no_so]',tgl='$_POST[tgl]',nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',tlp='$_POST[tlp]',nm_fg1='$_POST[nm_fg1]',qty1='$_POST[qty1]',status1='$_POST[status1]',nm_fg2='$_POST[nm_fg2]',qty2='$_POST[qty2]',status2='$_POST[status2]',nm_fg3='$_POST[nm_fg3]',qty3='$_POST[qty3]',status3='$_POST[status3]',nm_fg4='$_POST[nm_fg4]',qty4='$_POST[qty4]',status4='$_POST[status4]' WHERE id='$_POST[id]'");
				
                echo "<script>window.location='home.php?pg=salesorder&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Lihat Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing Produksi</a></li>
            <li class="active">Edit Planing Produksi</li>
             </ol>
        </section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="" >
                  <div class="box-body">
					  
					  
                    	<div class="form-group">
                        <label for="exampleInputEmail1">No Sales Order</label>
                        <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>">
					  </div>
					  
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 				  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Tanggal Pemesanan</label>
                        <input readonly class="form-control" id="tgl" name="tgl" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['tgl'];?>">
					  </div>
					  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Nama Customer</label>
                        <input readonly class="form-control" id="nm_cust" name="nm_cust" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_cust'];?>">
					  </div>
					  
					   
					   <div class="form-group">Alamat Customer
                     <input readonly class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
					</div>
					  
					 <div class="form-group">
                        <label for="exampleInputEmail2">Nomor Telepon</label>
                        <input readonly class="form-control" id="tlp" name="tlp" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_cust'];?>">
					  </div>
					
					   <div class="form-group">
                        <label for="exampleInputEmail2">Detail Pesanan</label>
                        <input readonly class="form-control" id="nm_fg1" name="nm_fg1" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_fg1'];?>">
						<input readonly class="form-control" id="qty1" name="qty1" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['qty1'];?>"> 
						<input readonly class="form-control" value= "<?php echo $d['status1'];?>">  
						<select class="form-control select2" name="status1" id="status1" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" "<?php echo $d['status1'];?>">
                        <option value="">Ganti Status Pengiriman</option>
                        <option value="terkirim">terkirim</option>
                        <option value="belum terkirim">Belum Terkirim</option>
                        </select>
					  </div>
					  
					  
					  <div  class="form-group">
						<input readonly class="form-control" id="nm_fg2" name="nm_fg2" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_fg2'];?>">
						<input readonly class="form-control" id="qty2" name="qty2" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['qty2'];?>">
						  
						<input readonly class="form-control" value= "<?php echo $d['status2'];?>">  
						<select class="form-control select2" name="status2" id="status2" style="width: 100%;"  "<?php echo $d['status2'];?>">
                        <option value="">Ganti Status Pengiriman</option>
                        <option value="terkirim">terkirim</option>
                        <option value="belum terkirim">Belum Terkirim</option>
                        </select>
					  </div>
										  
					  <div  class="form-group">
						<input readonly class="form-control" id="nm_fg3" name="nm_fg3" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_fg3'];?>">
						<input readonly class="form-control" id="qty3" name="qty3" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['qty3'];?>">
					    <input readonly class="form-control" value= "<?php echo $d['status3'];?>">  
						<select class="form-control select2" name="status3" id="status3" style="width: 100%;"  "<?php echo $d['status3'];?>">
                        <option value="">Ganti Status Pengiriman</option>
                        <option value="terkirim">terkirim</option>
                        <option value="belum terkirim">Belum Terkirim</option>
                        </select>
					  </div>
					  
					  <div  class="form-group">
						<input readonly class="form-control" id="nm_fg4" name="nm_fg4" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_fg4'];?>">
						<input readonly class="form-control" id="qty4" name="qty4" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['qty4'];?>">
					    <input readonly class="form-control" value= "<?php echo $d['status4'];?>">  
						<select class="form-control select2" name="status4" id="status4" style="width: 100%;"  "<?php echo $d['status4'];?>">
                        <option value="">Ganti Status Pengiriman</option>
                        <option value="terkirim">terkirim</option>
                        <option value="belum terkirim">Belum Terkirim</option>
                        </select>
					  </div>
					  
					 <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update1' class="btn btn-info">Edit</button>
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
      mysql_query("DELETE FROM salesorder WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=salesorder&act=view'</script>";
      break;

    }
    ?>

