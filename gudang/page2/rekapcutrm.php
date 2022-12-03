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
        <h1>Data Verifikasi Penggunaan RM</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Verifikasi RM</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header"></div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="966" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="57">No</th>
                        <th width="242">NO Planing</th>
  						<th width="127">Nama Produk</th>
						<th width="125">Status</th>
						<th width="125">Cetak RM Out</th>
			
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM rekapcutrm order by id desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[plan_prod]"?></td>
				        <td><?php echo "$r[nm_fg]"?></td>
						<td><?php echo "$r[status]"?></td>
            
						<td><a href="cetak_gudangrm.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-blue">
						<i class="fa fa-print" target=_blank></i></button></a></td>
						
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
	  $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_rm WHERE id='$_GET[id]'"));
	  $b = mysql_fetch_array(mysql_query("SELECT * FROM stok_label WHERE id='$_GET[id]'"));
	  $c = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='$_GET[id]'"));
	  $d = mysql_fetch_array(mysql_query("SELECT * FROM gudangrm WHERE id='$_GET[id]'"));
	  
      if (isset($_POST['add'])) {
	  
	   mysql_query("DELETE FROM gudangrm WHERE id='$_GET[id]'");
	   
	   		  	 $query = mysql_query("INSERT INTO gudangrm VALUES ('','$_POST[plan_prod]','$_POST[nm_fg]'
				,'$_POST[tgl]','$_POST[shift]','$_POST[terigua]','$_POST[jmlt1]','$_POST[terigub]','$_POST[jmlt2]','$_POST[r1]','$_POST[jml1]','$_POST[r2]','$_POST[jml2]','$_POST[r3]','$_POST[jml3]','$_POST[r4]','$_POST[jml4]','$_POST[r5]'
				,'$_POST[jml5]','$_POST[r6]','$_POST[jml6]','$_POST[r7]','$_POST[jml7]','$_POST[r8]','$_POST[jml8]','$_POST[r9]','$_POST[jml9]'
				,'$_POST[r10]','$_POST[jml10]','$_POST[r11]','$_POST[jml11]','$_POST[r12]','$_POST[jml12]','$_POST[r13]','$_POST[jml13]','$_POST[r14]'
				,'$_POST[jml14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]')");
		  
		  		
				
				 		
                echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
              }
              ?>

   
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Verifikasi Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Planing</a></li>
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

  
					
                  
					 
                  
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">No Plan Produksi</label>
                      <input readonly class="form-control" id="plan_prod" name="plan_prod" value= "<?php echo $d['plan_prod'];?>" >
					   <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 
                    </div>
				
					 <div class="form-group"> Nama produk
					<input readonly class="form-control" id="nm_fg" name="nm_fg" value="<?php echo $d['nm_fg'];?>">
					</div>
					
					 <div class="form-group"> Tanggal Produksi
					<input readonly class="form-control" id="tgl" name="tgl" value="<?php echo $d['tgl'];?>">
					</div>
					
					 <div class="form-group"> Shift
					<input readonly class="form-control" id="shift" name="shift" value="<?php echo $d['shift'];?>">
					</div>
					
					  <div class="form-group"> Terigu Standart
					<input readonly class="form-control" id="terigua" name="terigua" value="<?php echo $d['terigua'];?>">
                     <input readonly class="form-control"   id="jmlt1" name="jmlt1" value="<?php echo $d['jmlt1'];?>">
					  
					  </div>
					  
					  <div class="form-group"> Terigu Premium
					<input readonly class="form-control" id="terigub" name="terigub" value="<?php echo $d['terigub'];?>">
                     <input readonly class="form-control"   id="jmlt2" name="jmlt2" value="<?php echo $d['jmlt2'];?>">
					  
					  </div>
					
					 <div class="form-group">
					<input readonly class="form-control" id="r1" name="r1" value="<?php echo $d['r1'];?>">
                     <input readonly class="form-control"   id="jml1" name="jml1" value="<?php echo $d['jml1'];?>">
					  
					  </div>
					  
				 	<div class="form-group">
					<input readonly class="form-control" id="r2" name="r2" value="<?php echo $d['r2'];?>">
                     <input readonly class="form-control"   id="jml2" name="jml2" value="<?php echo $d['jml2'];?>">
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r3" name="r3" value="<?php echo $d['r3'];?>">
                    <input readonly class="form-control"   id="jml3" name="jml3" value="<?php echo $d['jml3'];?>">
					   
					  </div>
						
						<div class="form-group">
					<input readonly class="form-control" id="r4" name="r4" value="<?php echo $d['r4'];?>">
                    <input readonly class="form-control" id="jml4" name="jml4" value="<?php echo $d['jml4'];?>">
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r5" name="r5" value="<?php echo $d['r5'];?>">
                    <input readonly class="form-control" id="jml5" name="jml5" value="<?php echo $d['jml5'];?>">
					
					  </div>
					
				   <div class="form-group">
					<input readonly class="form-control" id="r6" name="r6" value="<?php echo $d['r6'];?>">
                    <input readonly class="form-control" id="jml6" name="jml6" value="<?php echo $d['jml6'];?>">
					
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r7" name="r7" value="<?php echo $d['r7'];?>">
                    <input readonly class="form-control" id="jml7" name="jml7" value="<?php echo $d['jml7'];?>">
					
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r8" name="r8" value="<?php echo $d['r8'];?>">
                    <input readonly class="form-control" id="jml8" name="jml8" value="<?php echo $d['jml8'];?>">
					
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r9" name="r9" value="<?php echo $d['r9'];?>">
                    <input readonly class="form-control" id="jml9" name="jml9" value="<?php echo $d['jml9'];?>">
					
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r10" name="r10" value="<?php echo $d['r10'];?>">
                    <input readonly class="form-control" id="jml10" name="jml10" value="<?php echo $d['jml10'];?>">
					
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r11" name="r11" value="<?php echo $d['r11'];?>">
                    <input readonly class="form-control" id="jml11" name="jml11" value="<?php echo $d['jml11'];?>">
					
					  </div>
					  
					    <div class="form-group">
					<input readonly class="form-control" id="r12" name="r12" value="<?php echo $d['r12'];?>">
                    <input readonly class="form-control" id="jml12" name="jml12" value="<?php echo $d['jml12'];?>">
					
					  </div>
					  
					   <div class="form-group">
					<input readonly class="form-control" id="r13" name="r13" value="<?php echo $d['r13'];?>">
                    <input readonly class="form-control" id="jml13" name="jml13" value="<?php echo $d['jml13'];?>">
					
					  </div>
					  
					    <div class="form-group">
					<input readonly class="form-control" id="r14" name="r14" value="<?php echo $d['r14'];?>">
                    <input readonly class="form-control" id="jml14" name="jml14" value="<?php echo $d['jml14'];?>">
					
					  </div>
					  
					   <div class="form-group">
					<input readonly class="form-control" id="r15" name="r15" value="<?php echo $d['r15'];?>">
                    <input readonly class="form-control" id="rm15" name="rm15" value="<?php echo $d['rm15'];?>">
					</div>
					
					 <div class="form-group">
					<input readonly class="form-control" id="r16" name="r16" value="<?php echo $d['r16'];?>">
                    <input readonly class="form-control" id="rm16" name="rm16" value="<?php echo $d['rm16'];?>">
					</div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r17" name="r17" value="<?php echo $d['r17'];?>">
                    <input readonly class="form-control" id="rm17" name="rm17" value="<?php echo $d['rm17'];?>">
					</div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r18" name="r18" value="<?php echo $d['r18'];?>">
                    <input readonly class="form-control" id="rm18" name="rm18" value="<?php echo $d['rm18'];?>">
					</div>
					  
					  
					 <div class="form-group"> Status Proses
					<input type readonly class="form-control" id="status" name="status" value="Berhasil Dipotong">
                    </div>			
					
					
									 <script> 
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('stok').value = frm[no_form].stok;  
		
		
			};  
			
			<?php 
	echo 
		$jsArray1; 
	?>  
	function changeValue(no_form1){ 
		
		document.getElementById('stok').value = frm[no_form1].stok;  
		
		
			};  
					 
						function sum() {
							var txt1 = document.getElementById('stok').value;
      						var txt2 = document.getElementById('jmlt1').value;
							var txt3 = document.getElementById('stok1').value;
							
							var result1 = parseInt(txt1)-parseInt(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('stok1').value = result1;
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

              <button type="submit" name = 'add' class="btn btn-info">Kirim</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
			
				 
            </form>
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

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
      mysql_query("DELETE FROM gudang_rm WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=gudangrm&act=view'</script>";
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