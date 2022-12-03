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
        <h1> Data Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Sales Order</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href=""> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data Planing</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="798" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="30" style="text-align: center">No</th>
                        <th width="75" style="text-align: center">NO Sales Order</th>
						 <th width="75" style="text-align: center">Tanggal Kirim</th> 
                        <th width="75" style="text-align: center">Nama Customer</th>
						<th width="111" style="text-align: center">Nama Produk</th>
						<th width="56" style="text-align: center">Qty</th>
						<th width="56" style="text-align: center">Biaya Bensin</th>
						<th width="56" style="text-align: center">Biaya TOL</th>
						<th width="94" style="text-align: center">Biaya Bongkar Brg</th>
						<th width="89" style="text-align: center">Total</th>
						<th width="89" style="text-align: center">BIaya Persak</th>
						<th width="92" style="text-align: center">Input Uang Jalan</th>
						
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM uangjalan order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						<td style="text-align: center"><?php echo "$r[no_so]"?></td>
						<td style="text-align: center"><?php echo "$r[tglkirim]"?></td>	
						<td style="text-align: center"><?php echo "$r[nm_cust]"?></td>
                        <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
						 <td style="text-align: center"><?php echo "$r[qty]"?></td>
						 <td style="text-align: center"><?php echo "Rp.". number_format("$r[bensin]",'0','.','.')?></td>
						 <td style="text-align: center"><?php echo "Rp.". number_format("$r[tol]",'0','.','.')?></td>
						 <td style="text-align: center"><?php echo "Rp.". number_format("$r[bongkar]",'0','.','.')?></td>
						<td style="text-align: center"><?php echo "Rp.". number_format("$r[total_uj]",'0','.','.')?></td>
						<td style="text-align: center"><?php echo "Rp.". number_format("$r[avg]",'0','.','.')?></td>
						<td style="text-align: center"><a href="?pg=uangjalan&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
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
                $query = mysql_query("INSERT INTO so VALUES ('','$_POST[no_so]','$_POST[tgl]','$_POST[nm_cust]','$_POST[nm_fg]','$_POST[harga]','$_POST[qty]','$_POST[total]','$_POST[ppn]','$_POST[gtotal]','$_POST[tglkirim]')");
		  
		        $query .= mysql_query("INSERT INTO uangjalan VALUES ('','$_POST[no_so]','$_POST[tglkirim]','$_POST[nm_cust]','$_POST[nm_fg]','$_POST[qty]','$_POST[bensin]','$_POST[totl]','$_POST[bongkar]','$_POST[total]')");      	  
		  
                echo "<script>window.location='home.php?pg=so&act=view'</script>";
              }
              ?>



<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Data Sales Order</a></li>
            <li class="active">Tambah Data Sales Order</li>
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
                      $sql = mysql_query("select * from so");
                      
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
                      $tahun = date('Y/m');
                      $kode_jadi = "SO-SPS-$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Sales Order</label>
                      <input type="text" class="form-control" id="no_so" name="no_so" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_so" name="no_so" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
						
					<div class="form-group">Tanggal Order
                     <input type="date" class="form-control" id="tgl" name="tgl" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					  
					  <div class="form-group">Nama Customer
                     <input type="text" class="form-control" id="nm_cust" name="nm_cust" placeholder="Input Nama Cust" required data-fv-notempty-message="Tidak boleh kosong">
					</div>		  
					 
					   
					  <div class="form-group">Nama Produk
                     <input type="text" class="form-control" id="nm_fg" name="nm_fg" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
                    
					  <div class="form-group">harga                   
                      <input type="text" class="form-control" id="harga" name="harga" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div> 
					  
										  
					  <div class="form-group">Quantity                   
                      <input type="text" class="form-control" id="qty" name="qty" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					   <div class="form-group">Total Harga                  
                      <input type="text" class="form-control" id="total" name="total" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					   <div class="form-group">PPN                   
                      <input type="text" class="form-control" id="ppn" name="ppn" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					   <div class="form-group">Grand Total                 
                      <input type="text" class="form-control" id="gtotal" name="gtotal" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  			  
					<div class="form-group">Tanggal Kirim                  
                      <input type="date" class="form-control" id="tglkirim" name="tglkirim" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>	  
						
					  <script>
						function sum() {
						    var txt3=document.getElementById('qty').value;
							var txt4=document.getElementById('harga').value;
							var txt5=document.getElementById('total').value;
							var txt6=document.getElementById('gtotal').value;
							var txt7=document.getElementById('ppn').value;
													
														
							var result2 = parseInt(txt3) * parseInt(txt4);
      						if (!isNaN(result2)) {
         					document.getElementById('total').value = result2;
							}
							
							var result3 = parseInt(txt5) * 0.1;
      						if (!isNaN(result3)) {
         					document.getElementById('ppn').value = result3;
							}
							
							var result4 = parseInt(txt5) + parseInt(txt7);
      						if (!isNaN(result4)) {
         					document.getElementById('gtotal').value = result4;
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
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
		include("indo.php");				  
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM uangjalan WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE uangjalan SET no_so='$_POST[no_so]',tglkirim='$_POST[tglkirim]',nm_cust='$_POST[nm_cust]',nm_fg='$_POST[nm_fg]',qty='$_POST[qty]',bensin='$_POST[bensin]',tol='$_POST[tol]',bongkar='$_POST[bongkar]',total_uj='$_POST[total_uj]',avg='$_POST[avg]'WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=uangjalan&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Lihat Planing Produksi</h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Tambah Data Planing</a></li>
            <li class="active"> Data Planing</li>
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
					  
				<div class="form-group"></div>
                        <label for="exampleInputEmail1">No SO</label>
                        <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>">
            
                    
                        <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
                        
                        <label for="exampleInputEmail2">Tanggal Kirim</label>
                        <input readonly class="form-control" id="tglkirim" name="tglkirim"  value= "<?php echo $d['tglkirim'];?>">
                        
                        
                        <label for="exampleInputEmail2">Nama Customer</label>
                        <input readonly class="form-control" id="nm_cust" name="nm_cust" value= "<?php echo $d['nm_cust'];?>">
                        
                        <label for="exampleInputEmail3">Nama Produk</label>
                        <input readonly class="form-control" id="nm_fg" name="nm_fg" value= "<?php echo $d['nm_fg'];?>">
       
                      <label for="exampleInputEmail1">Qty</label>
                      <input type="text" class="form-control" id="qty" name="qty" value= "<?php echo $d['qty'];?>" onkeyup="sum();">
                    
					  
                      <label for="exampleInputEmail1">Biaya Bensin</label>
                      <input type="text" class="form-control" id="bensin" name="bensin" value= "<?php echo $d['bensin'];?>" onkeyup="sum();">
                   
					  
					
                      <label for="exampleInputEmail1">Biaya Tol</label>
                      <input type="text" class="form-control" id="tol" name="tol" value= "<?php echo $d['tol'];?>" onKeyUp="sum();">
                    
					  
                    
                      <label for="exampleInputEmail1">Biaya Bongkar Barang</label>
                      <input type="text" class="form-control" id="bongkar" name="bongkar" value= "<?php echo $d['bongkar'];?>" onkeyup="sum();">
                   
					 
                      <label for="exampleInputEmail1">Total Uang Jalan</label>
                      <input type="text" class="form-control" id="total_uj" name="total_uj" value= "<?php echo $d['total_uj'];?>" onkeyup="sum();">
                   
					   <label for="exampleInputEmail1">Biaya Persak</label>
                      <input type="text" class="form-control" id="avg" name="avg" value= "<?php echo $d['avg'];?>" onkeyup="sum();">
					  				  
					  
				    <script>
						function sum() {
							var txt10=document.getElementById('bensin').value;
      						var txt11=document.getElementById('tol').value;
							var txt12=document.getElementById('bongkar').value;
							var txt13=document.getElementById('total_uj').value;
						    var txt14=document.getElementById('qty').value;
							var txt15=document.getElementById('avg').value;							
							
							var result6 = parseInt(txt10) + parseInt(txt11) + parseInt(txt12) ;
      						if (!isNaN(result6)) {
         					document.getElementById('total_uj').value = result6;
							}
							
							var result7 = parseInt(txt13) / parseInt(txt14);
      						if (!isNaN(result7)) {
         					document.getElementById('avg').value = result7;
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

              <button type="submit" name = 'update' class="btn btn-info">Print Formula</button>
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
      mysql_query("DELETE FROM planprod WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
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