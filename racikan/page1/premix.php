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
        <h1>Master Formula Premix</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=premix&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Produk Premix</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped"  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="22">No</th>
                        <th width="64">NO Premix</th>
                        <th width="50">Tgl Produksi</th>
						<th width="50">Nama Premix</th>
						<th width="50">Jumlah</th>
						<th width="50">Edit</th>
						<th width="50">Hapus</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM premix GROUP by no asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[no_prx]"?></td>
						<td><?php echo TanggalIndo($r['tgl'])?></td>
						<td><?php echo "$r[nm_rm]"?></td>
                        <td><?php echo "$r[jumlah]"?></td>
                        
						<td><a href="?pg=premix&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-circle-o"></i></button></a></td>
						<td><a href="?pg=premix&act=delete&no=<?php echo $r['no']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
              $query = mysql_query("INSERT INTO premix VALUES ('','$_POST[no_prx]','$_POST[tgl]','$_POST[nm_rm]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[jumlah]')");
		     
		  		  
		  		
                echo "<script>window.location='home.php?pg=premix&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Planing Produksi</h1>
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
					  
					   <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from premix");
                      
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
                      $tahun = date('Y/m');
                      $kode_jadi = "PRX-$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Kode Premix</label>
                      <input type="text" class="form-control" id="no_prx" name="no_prx" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_prx" name="no_prx" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
					  
					 <div class="form-group">
                    <select class="form-control select2" id="nm_rm" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" name="nm_rm" >
                       <option value="">pilih Premix</option>
                       
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
					
                      </select>
					  </div>
					  
					    
					<div class="form-group">Tanggal Planing
                    <input type="date" class="form-control" id="" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong"/>
					</div>	
						
					  <div class="form-group">
                      <select class="form-control select2" name="r1" id="r1" >
                      <option value="">pilih tepung</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu f10">terigu f10</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						<option value="terigu tambang">terigu tambang</option>
						<option value="terigu falcon kuning">terigu falcon kuning</option>
						<option value="terigu serdadu kuning">terigu serdadu kuning</option>
						<option value="terigu serdadu jingga">terigu serdadu jingga</option>
						<option value="terigu roket">terigu roket</option>
						<option value="terigu tegu">terigu tegu</option>
						<option value="terigu jawara">terigu jawara</option>
						<option value="terigu payung">terigu payung</option>
					  </select>
						<input type="text" class="form-control" id="rm1" name="rm1" onKeyUp="sum();" placeholder="input dalam satuan KG" >
                    </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" value="rm-25 rj/wrn/01a" >
						<input type="text" class="form-control" id="rm2" name="rm2" onKeyUp="sum();" placeholder="input dalam satuan KG" >
                    </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r3" name="r3" value="rm-26 rj/wrn/03c" >
						<input type="text" class="form-control" id="rm3" name="rm3" onKeyUp="sum();" placeholder="input dalam satuan KG" >
                    </div>
						
						 <div class="form-group">
                      <input readonly class="form-control" id="r4" name="r4" value="rm-08 rj/wrn/04d" >
						<input type="text" class="form-control" id="rm4" name="rm4" onKeyUp="sum();" placeholder="input dalam satuan KG" >
                    </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r5" name="r5" value="rm-09 rj/wrn/02b" >
						<input type="text" class="form-control" id="rm5" name="rm5" onKeyUp="sum();" placeholder="input dalam satuan KG">
                    </div>
					  
					   <div class="form-group">Jumlah Premix                
                      <input readonly class="form-control" id="jumlah" name="jumlah" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
                    </div>
					  <script>
						  
					  function sum() {
							
							var txt1 = document.getElementById('rm1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt3 = document.getElementById('rm3').value;
							var txt4= document.getElementById('rm4').value;
						    var txt5= document.getElementById('rm5').value;
						    var txt6= document.getElementById('jumlah').value;
							
							
							var result1 =parseFloat(txt1)+parseFloat(txt2)+parseFloat(txt3)+parseFloat(txt4)+parseFloat(txt5);
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah').value = result1.toFixed(1);
							}
													
							
							
						}
						
</script> 						
					  
					  
					 
					
									
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  &nbsp;
				  <button input class="btn btn-success" type="button" onClick="sum()">Hitung</button>
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM premix WHERE no='$_GET[no]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE premix SET no_prx='$_POST[no_prx]',terigu='$_POST[terigu]',tartazine='$_POST[tartazine]',ponceau='$_POST[ponceau]',sunset_yellow='$_POST[sunset_yellow]',jumlah='$_POST[jumlah]' WHERE no='$_POST[no]'");
				
				
				
                echo "<script>window.location='home.php?pg=premix&act=view'</script>";
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
                      <p>
                        <label for="exampleInputEmail1">No Plan Prod</label>
                        <input readonly class="form-control" id="no_prx" name="no_prx" value= "<?php echo $d['no_prx'];?>">
                      </p>
                      <p>
                        <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
                        
                        <label for="exampleInputEmail2">Tanggal Produksi</label>
                        <input readonly class="form-control" id="tgl" name="tgl"  value= "<?php echo $d['tgl'];?>">
                      
					  <div class="form-group">
                      <select class="form-control select2" name="r1" id="r1" >
                      <option value="">pilih tepung</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu f10">terigu f10</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						<option value="terigu tambang">terigu tambang</option>
						<option value="terigu falcon kuning">terigu falcon kuning</option>
						<option value="terigu serdadu kuning">terigu serdadu kuning</option>
						<option value="terigu serdadu jingga">terigu serdadu jingga</option>
						<option value="terigu roket">terigu roket</option>
						<option value="terigu tegu">terigu tegu</option>
						<option value="terigu jawara">terigu jawara</option>
						<option value="terigu payung">terigu payung</option>
					  </select>
						<input type="text" class="form-control" id="rm1" name="rm1" onKeyUp="sum1();" placeholder="input dalam satuan KG" value= "<?php echo $d['rm1'];?>">
                    </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" value="rm-25 rj/wrn/01a" >
						<input type="text" class="form-control" id="rm2" name="rm2" onKeyUp="sum1();" placeholder="input dalam satuan KG" value= "<?php echo $d['rm2'];?>">
                    </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r3" name="r3" value="rm-26 rj/wrn/03c" >
						<input type="text" class="form-control" id="rm3" name="rm3" onKeyUp="sum1();" placeholder="input dalam satuan KG" value= "<?php echo $d['rm3'];?>">
                    </div>
						
						 <div class="form-group">
                      <input readonly class="form-control" id="r4" name="r4" value="rm-08 rj/wrn/04d" >
						<input type="text" class="form-control" id="rm4" name="rm4" onKeyUp="sum1();" placeholder="input dalam satuan KG" value= "<?php echo $d['rm4'];?>">
                    </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r5" name="r5" value="rm-09 rj/wrn/02b" >
						<input type="text" class="form-control" id="rm5" name="rm5" onKeyUp="sum1();" placeholder="input dalam satuan KG" value= "<?php echo $d['rm5'];?>">
                    </div>
					  
					   <div class="form-group">Jumlah Premix                
                      <input readonly class="form-control" id="jumlah" name="jumlah" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum1();" value= "<?php echo $d['jumlah'];?>">
                    </div>
					  <script>
						  
					  function sum1() {
							
							var txt1 = document.getElementById('rm1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt3 = document.getElementById('rm3').value;
							var txt4= document.getElementById('rm4').value;
						    var txt5= document.getElementById('rm5').value;
						    var txt6= document.getElementById('jumlah').value;
							
							
							var result1 =parseFloat(txt1)+parseFloat(txt2)+parseFloat(txt3)+parseFloat(txt4)+parseFloat(txt5);
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah').value = result1.toFixed(1);
							}
													
							
							
						}
						
</script> 						
					  
					  
					  
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
				
				 <script>
				function sum() {
    var x = document.getElementById("btn");
    x.disabled = false;
}
</script>
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
      mysql_query("DELETE FROM premix WHERE no='$_GET[no]'");
      echo "<script>window.location='home.php?pg=premix&act=view'</script>";
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