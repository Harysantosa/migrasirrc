<?php
error_reporting(0);
unset($_POST[no_prod]);
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
        <h1>Data Formula </h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Formula   
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="cetak_laporanpremix.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Data Laporan Produksi Premix</i></button> 
		</a>		<a href="cetak_cutrmpremix.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Data Cut RM untuk Premix</i></button> 
		</a>
	   </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  
            <table width="78%" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
<thead>
                                    <tr>
                                      
                  <th width="29">No</th>
                       				  
                  <th width="180">Nama Premix</th>
						              
                  <th width="647">Input Planing Produksi Premix</th>
						            
									  
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM form_premix order by no");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td><?php echo "$no"?></td>
									<td><?php echo "$r[nm_rm]"?></td>
									  <td><a href="?pg=verifikasipremix&act=add&no=<?php echo $r['no']?>" target="_blank" ><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"> INPUT PLANING PREMIX</i></button></a></td>
                        
                                    </tr>
                                    <?php
                         $no++;
					}
				
						?>
						
						
                                    
						
                                  </tbody>
                                </table>
                                  <span style="font-weight:bold"></span></td>
                              </tr>
                            </tbody>
                          </table>                            <span style="font-weight:bold"></span></td>
                        </tr>
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
	$d = mysql_fetch_array(mysql_query("SELECT * FROM form_premix WHERE no='$_GET[no]'"));
	
      if (isset($_POST['add'])) {		  
                $query = mysql_query("INSERT INTO premix VALUES ('','$_POST[tgl]','$_POST[lot]','$_POST[nm_rm]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[jumlah]')");
		  		 		
                echo "<script>window.location='home.php?pg=verifikasipremix&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Premix</h1>
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
					 				
					
					<div class="form-group">Nama Produk Premix
                      <input readonly class="form-control" id="nm_rm" name="nm_rm" value="<?php echo $d['nm_rm'];?>">
					
                  </div>
					
						<div class="form-group">Tanggal Planing
                    <input type="date" class="form-control" id="" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong"/>
					</div>
					
			<div class="form-group">Jumlah Lot
						<input type="text" class="form-control" id="lot" name="lot" onKeyUp="sum();" placeholder="input dalam satuan KG">
                  </div>
		
			<div class="form-group">
                      <label for="exampleInputEmail1">Nama Terigu</label> <br>
                     <select class="form-control select2" id="r1" name="r1"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="" >--- Silahkan Pilih Bahan Baku Terigu ---</option>
                     <?php
               $query = mysql_query("SELECT * FROM stok_rm order by no");
                while ($row = mysql_fetch_array($query))
	{
	 echo "<option value='".$row['nm_rm']."'> ".$row['nm_rm']." | ".$row['stok']." </option>";
                ?>
                  
						
						
                    </option>
					 <?php
                }
                ?>
				</optgroup>
                      </select>

					
						<input readonly class="form-control" id="rm1" name="rm1" onKeyUp="sum();" placeholder="input dalam satuan KG" value="<?php echo $d['rm1'];?>">
						
						<input readonly class="form-control" id="jml1" name="jml1" onKeyUp="sum();" >
                  </div>
					
					<input readonly class="form-control" id="r2" name="r2" value="<?php echo $d['r2'];?>">
                      <input readonly class="form-control" id="rm2" name="rm2" value="<?php echo $d['rm2'];?>" onKeyUp="sum();">
					 <input readonly class="form-control"   id="jml2" name="jml2" onKeyUp="sum();" >
					   <?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='2'"));?>
					   <div class="form-group">Stok Gudang <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok2" name="stok2" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r3" name="r3" value="<?php echo $d['r3'];?>">
                      <input readonly class="form-control" id="rm3" name="rm3" value="<?php echo $d['rm3'];?>" onKeyUp="sum();">
					 <input readonly class="form-control"   id="jml3" name="jml3" onKeyUp="sum();" >
					   <?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='2'"));?>
					   <div class="form-group">Stok Gudang <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok3" name="stok3" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
						
						<div class="form-group">
					<input readonly class="form-control" id="r4" name="r4" value="<?php echo $d['r4'];?>">
                     <input readonly class="form-control" id="rm4" name="rm4" value="<?php echo $d['rm4'];?>" onKeyUp="sum();">
					 <input readonly class="form-control" id="jml4" name="jml4" onKeyUp="sum();" >
					  <?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='3'"));?>
					   <div class="form-group">Stok Gudang <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok4" name="stok4" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r5" name="r5" value="<?php echo $d['r5'];?>">
                     <input readonly class="form-control" id="rm5" name="rm5" value="<?php echo $d['rm5'];?>" onKeyUp="sum();">
					 <input readonly class="form-control" id="jml5" name="jml5" onKeyUp="sum();" >
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='4'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok5" name="stok5" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					
				<div class="form-group">
					<input readonly class="form-control" id="r6" name="r6" value="<?php echo $d['r6'];?>">
                     <input readonly class="form-control" id="rm6" name="rm6" value="<?php echo $d['rm6'];?>" onKeyUp="sum();">
					 <input readonly class="form-control" id="jml6" name="jml6" onKeyUp="sum();" >
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='5'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok6" name="stok6" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r7" name="r7" value="<?php echo $d['r7'];?>">
                     <input readonly class="form-control" id="rm7" name="rm7" value="<?php echo $d['rm7'];?>" onKeyUp="sum();">
					 <input readonly class="form-control" id="jml7" name="jml7" onKeyUp="sum();" >
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='6'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok7" name="stok7" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r8" name="r8" value="<?php echo $d['r8'];?>">
                     <input readonly class="form-control" id="rm8" name="rm8" value="<?php echo $d['rm8'];?>" onKeyUp="sum();">
					 <input readonly class="form-control" id="jml8" name="jml8" onKeyUp="sum();" >
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='7'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok8" name="stok8" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r9" name="r9" value="<?php echo $d['r9'];?>">
                     <input readonly class="form-control" id="rm9" name="rm9" value="<?php echo $d['rm9'];?>" onKeyUp="sum();">
					 <input readonly class="form-control" id="jml9" name="jml9" onKeyUp="sum();" >
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_rmpremix WHERE no='8'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok9" name="stok9" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					  </div>
					  
					   <div class="form-group">Jumlah Premix                
                      <input readonly class="form-control" id="jumlah" name="jumlah" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
                    </div>
					  
					  
			   			
					<script type="text/javascript">    
	
					  				  
								
			
						 function sum() {
							
							var txt1 = document.getElementById('rm1').value;
							var txt1a = document.getElementById('jml1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt2a = document.getElementById('jml2').value;
							var txt3 = document.getElementById('rm3').value;
							var txt3a = document.getElementById('jml3').value;
							var txt4= document.getElementById('rm4').value;
							var txt4a= document.getElementById('jml4').value;
							var txt5= document.getElementById('rm5').value;
							var txt5a= document.getElementById('jml5').value;
							  var txt6= document.getElementById('rm6').value;
							   var txt6a= document.getElementById('jml6').value;
							  var txt7= document.getElementById('rm7').value;
							   var txt7a= document.getElementById('jml7').value;
							  var txt8= document.getElementById('rm8').value;
							   var txt8a= document.getElementById('jml8').value;
							  var txt9= document.getElementById('rm9').value;
							   var txt9a= document.getElementById('jml9').value;
							 var txt10= document.getElementById('lot').value;
							 
							 
							 
							 
							 
							var txt11= document.getElementById('jumlah').value;
							
							
							var result1 = (parseFloat(txt1)+parseFloat(txt2)+parseFloat(txt3)+parseFloat(txt4)+parseFloat(txt5)+parseFloat(txt6)+parseFloat(txt7)+parseFloat(txt8)+parseFloat(txt9)) *parseInt(txt10) ;
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah').value = result1.toFixed(1);
							}
							
							var result2 = (parseFloat(txt1)*parseFloat(txt10)) ;
      						if (!isNaN(result2)) {
         					document.getElementById('jml1').value = result2.toFixed(1);
							}
							
							var result3 = (parseFloat(txt2)*parseFloat(txt10)) ;
      						if (!isNaN(result3)) {
         					document.getElementById('jml2').value = result3.toFixed(1);
							}
							
							var result4 = (parseFloat(txt3)*parseFloat(txt10)) ;
      						if (!isNaN(result4)) {
         					document.getElementById('jml3').value = result4.toFixed(1);
							}
							
							var result5 = (parseFloat(txt4)*parseFloat(txt10)) ;
      						if (!isNaN(result5)) {
         					document.getElementById('jml4').value = result5.toFixed(1);
							}						
							
							var result6 = (parseFloat(txt5)*parseFloat(txt10)) ;
      						if (!isNaN(result6)) {
         					document.getElementById('jml5').value = result6.toFixed(1);
							}
							
							var result7 = (parseFloat(txt6)*parseFloat(txt10)) ;
      						if (!isNaN(result7)) {
         					document.getElementById('jml5').value = result7.toFixed(1);
							}
							
							var result8 = (parseFloat(txt7)*parseFloat(txt10)) ;
      						if (!isNaN(result8)) {
         					document.getElementById('jml7').value = result8.toFixed(1);
							}
							
							var result9 = (parseFloat(txt8)*parseFloat(txt10)) ;
      						if (!isNaN(result9)) {
         					document.getElementById('jml8').value = result9.toFixed(1);
							}
							
							var result10 = (parseFloat(txt9)*parseFloat(txt10)) ;
      						if (!isNaN(result10)) {
         					document.getElementById('jml9').value = result10.toFixed(1);
							}
						}
						
						
</script> 						
					  
					
				  <!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info" onclick="return confirm('Apakah anda yakin sudah Menghitung Jumlah Barang Masuk?');">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
			  
				  
				                  </form>
				                  </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /
				  .content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM gudang_fg WHERE no='$_GET[no]'"));
	
            if (isset($_POST['update'])) {
				
				
				mysql_query("UPDATE gudang_fg SET no_plan='$_POST[no_plan]',fg='$_POST[fg]',tgl_drying='$_POST[tgl_drying]',shift_drying='$_POST[shift_drying]',kurang='$_POST[kurang]',lebih='$_POST[lebih]',total_jumlahprod='$_POST[total_jumlahprod]',total_sisa='$_POST[total_sisa]',total_hasilfg='$_POST[total_hasilfg]',total_fg='$_POST[total_fg]' WHERE no='$_POST[no]'");
               
				mysql_query("UPDATE planprod SET fg='$_POST[fg]' WHERE no='$_POST[no]'");
				 echo "<script>window.location='home.php?pg=gudangfg&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Verifikasi Finish Good</h1>
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
                      <label for="exampleInputEmail1">No Plan Prod</label>
                      <input readonly class="form-control" id="no_plan" name="no_plan" value= "<?php echo $d['no_plan'];?>">
					  </div>
					  
					 <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					  
                    <label for="exampleInputEmail1">Shift Drying</label> 
                      <select class="form-control select2" name="shift_drying" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div> 
               
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Drying</label>
                      <input readonly class="form-control" id="date" name="tgl_drying"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl_drying'];?>" />
                    </div>
					
                  	 <div class="form-group">
                      <label for="exampleInputEmail1">Aktual drying</label>
                      <input type="text" class="form-control" id="fg" name="fg" value= "<?php echo $d['fg'];?>" onKeyUp="sum()">
                    </div>
					  
				    <div class="form-group">
                      <label for="exampleInputEmail1">Selisih Kurang (HANYA SALAH SATAU SAJA YANG DI INPUT</label>
                      <input type="text" class="form-control" id="kurang" name="kurang" value= "<?php echo $d['kurang'];?>" onKeyUp="sum()">
                    </div>
				 
					 <div class="form-group">
                      <label for="exampleInputEmail1">Selisih Lebih (HANYA SALAH SATU SAJA YANG DI INPUT)</label>
                      <input type="text" class="form-control" id="lebih" name="lebih" value= "<?php echo $d['lebih'];?>" onKeyUp="sum()">
                    </div>
                    
					
				   
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Save</button>
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
      mysql_query("DELETE FROM verifikasi_prodrm WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=verifikasirm&act=view'</script>";
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