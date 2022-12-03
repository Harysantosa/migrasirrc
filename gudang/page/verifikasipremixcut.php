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
        <h1>Verifikasi Data Premix</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Premix</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
		  <a href="?pg=premixcut&act=view1"> <button type="button" class="btn btn-info"><i class = "fa fa-database"> Rekap Potong RM Premix</i></button> </a>
    <div class="box-header">
  
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="200" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%">
                    <thead>
                                    <tr>
                                      <th width="65">No</th>
                       				  <th width="507">Tgl Produksi</th>
						              <th width="349">Nama Premix</th>
						              <th width="351">Jumlah</th>
									  <th width="351">Potong Stok </th>
									     <th width="647">Cetak Premix</th>
									  
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php	
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM premix1 order by no asc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td><?php echo "$no"?></td>
										<td><?php echo TanggalIndo($r['tgl'])?></td>
										<td><?php echo "$r[nm_rm]"?></td>
                        				<td><?php echo "$r[jumlah]"?></td>
										<td><a href="?pg=premixcut&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-circle-o"></i></button></a></td
										 ><td><a href="cetakplanpremix.php?no=<?php echo $r['no']?>"> <button type="button" class="btn bg-blue">
						<i class="fa fa-print" target=_blank></i></button></a></td>
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM premix1 WHERE no='$_GET[no]'"));
	
            if (isset($_POST['update'])) {
				 if  ($_POST['sisat']>='0'&&$_POST['sisa2']>='0'&&$_POST['sisa3']>='0'&&$_POST['sisa4']>='0'
				 &&$_POST['sisa5']>='0'&&$_POST['sisa6']>='0'&&$_POST['sisa7']>='0'&&$_POST['sisa8']>='0'
				 &&$_POST['sisa9']>='0'){
				 
				  mysql_query("DELETE FROM premix1 WHERE no='$_GET[no]'");
				  
				 $query = mysql_query("INSERT INTO premixcut VALUES ('','$_POST[planprx]','$_POST[tgl]','$_POST[lot]',
			   '$_POST[nm_rm]','$_POST[r1]','$_POST[jml1]','$_POST[r2]','$_POST[jml2]','$_POST[r3]','$_POST[jml3]',
			   '$_POST[r4]','$_POST[jml4]','$_POST[r5]','$_POST[jml5]','$_POST[r6]','$_POST[jml6]','$_POST[r7]',
			   '$_POST[jml7]','$_POST[r8]','$_POST[jml8]','$_POST[r9]','$_POST[jml9]','$_POST[r10]','$_POST[rm10]')");
			   
                echo "<script> alert('data berhasil disimpan');window.location='home.php?pg=premixcut&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Karna Beberapa Stok Kurang !');</script>";
			 }
			   
			   }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit Planing Premix</h1>
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
                      <label for="exampleInputEmail1">No Plan Premix</label>
                      <input readonly class="form-control" id="planprx" name="planprx" value= "<?php echo $d['planprx'];?>">
					  </div>
					  
					 <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					  
                   <div class="form-group">Nama Premix
                    <input readonly class="form-control" id="nm_rm" name="nm_rm"   required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_rm'];?>">
					</div>
					
					<div class="form-group">Tanggal Planing
                     <input readonly class="form-control" id="" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>">
					</div>
					
					<div class="form-group">Jumlah Lot
						 <input readonly class="form-control" id="lot" name="lot" onKeyUp="sum();" placeholder="input dalam satuan KG"required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['lot'];?>">
                  </div>
					
			<div class="form-group">
                      <label for="exampleInputEmail1">Terigu Standart</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="r1" id="r1" onchange="changeid(this.value)" >
					<option value=''>-Pilih Terigu-</option>
					<?php 
					$result = mysql_query("select * from stok_rm");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray .= "frm['" . $row['nm_rm'] . "'] = {
stok:'" . addslashes($row['stok']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					  	 <input readonly class="form-control" id="stok" name="stok" onKeyUp="sum();" >
           			     <input readonly class="form-control" id="jml1" name="jml1" onKeyUp="sum();" value="<?php echo $d['jml1'];?>">
					    <input readonly class="form-control" id="sisat" name="sisat" onKeyUp="sum();" >
					
					</div>
					
					<input readonly class="form-control" id="r2" name="r2" value="<?php echo $d['r2'];?>">
                     <input readonly class="form-control"   id="jml2" name="jml2" onKeyUp="sum();" value="<?php echo $d['jml2'];?>">
					   <?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='15'"));?>
					   <div class="form-group">Stok Gudang <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok2" name="stok2" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa2" name="sisa2" onKeyUp="sum();" >
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r3" name="r3" value="<?php echo $d['r3'];?>">
                  	 <input readonly class="form-control"   id="jml3" name="jml3" onKeyUp="sum();" value="<?php echo $d['jml3'];?>">
					   <?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='16'"));?>
					   <div class="form-group">Stok Gudang <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok3" name="stok3" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa3" name="sisa3" onKeyUp="sum();" >
					  </div>
					  
						<div class="form-group">
					<input readonly class="form-control" id="r4" name="r4" value="<?php echo $d['r4'];?>">
                    <input readonly class="form-control" id="jml4" name="jml4" onKeyUp="sum();" value="<?php echo $d['jml4'];?>"
					  <?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix  WHERE id='17'"));?>
					   <div class="form-group">Stok Gudang <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok4" name="stok4" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					     <input readonly class="form-control" id="sisa4" name="sisa4" onKeyUp="sum();" >
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r5" name="r5" value="<?php echo $d['r5'];?>">
                    <input readonly class="form-control" id="jml5" name="jml5" onKeyUp="sum();" value="<?php echo $d['jml5'];?>"
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix  WHERE id='18'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok5" name="stok5" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa5" name="sisa5" onKeyUp="sum();" >
					  </div>
					
				<div class="form-group">
					<input readonly class="form-control" id="r6" name="r6" value="<?php echo $d['r6'];?>">
                    <input readonly class="form-control" id="jml6" name="jml6" onKeyUp="sum();" value="<?php echo $d['jml6'];?>"
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix  WHERE id='19'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok6" name="stok6" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa6" name="sisa6" onKeyUp="sum();" >
					  </div>

					
					<div class="form-group">
					<input readonly class="form-control" id="r7" name="r7" value="<?php echo $d['r7'];?>">
                    <input readonly class="form-control" id="jml7" name="jml7" onKeyUp="sum();" value="<?php echo $d['jml7'];?>"
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix  WHERE id='20'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok7" name="stok7" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa7" name="sisa7" onKeyUp="sum();" >
					  </div>

					
					<div class="form-group">
					<input readonly class="form-control" id="r8" name="r8" value="<?php echo $d['r8'];?>">
                    <input readonly class="form-control" id="jml8" name="jml8" onKeyUp="sum();" value="<?php echo $d['jml8'];?>"
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix  WHERE id='21'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok8" name="stok8" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa8" name="sisa8" onKeyUp="sum();" >
					  </div>

					<div class="form-group">
					<input readonly class="form-control" id="r9" name="r9" value="<?php echo $d['r9'];?>">
                    <input readonly class="form-control" id="jml9" name="jml9" onKeyUp="sum();" value="<?php echo $d['jml9'];?>"
					<?php $e = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix  WHERE id='22'"));?>
					   <div class="form-group">Stok <?php echo $e['nm_rm'];?>
					   <input readonly class="form-control" id="stok9" name="stok9" onKeyUp="sum();" value="<?php echo $e['stok'];?>"  >
					    <input readonly class="form-control" id="sisa9" name="sisa9" onKeyUp="sum();" >
					  </div>

					  
					 
					  
					  <div class="form-group"> Masukan Jenis Plastik
						
					   <input readonly class="form-control" id="r10" name="r10" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['r10'];?>" onKeyUp="sum();"> 
                     <input readonly class="form-control" id="rm10" name="rm10"  onKeyUp="sum();" value="<?php echo $d['rm10'];?>"  >
                    </div>		
					
					
					
					
					  
			   			
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeid(fgh){ 
		
		document.getElementById('stok').value = frm[fgh].stok;
	  
		
		
			}; 
			</script>
					 
						<script type="text/javascript">    
	
					  				  
								
			
						 function sum() {
							
							
							var txt1 = document.getElementById('stok').value;
							var txt2 = document.getElementById('jml1').value;
							var txt3 = document.getElementById('sisat').value;
							
							var txt4 = document.getElementById('stok2').value;
							var txt5 = document.getElementById('jml2').value;
							var txt6 = document.getElementById('sisa2').value;
							
							var txt7 = document.getElementById('stok3').value;
							var txt8 = document.getElementById('jml3').value;
							var txt9 = document.getElementById('sisa3').value;
							
							var txt10 = document.getElementById('stok4').value;
							var txt11 = document.getElementById('jml4').value;
							var txt12 = document.getElementById('sisa4').value;
							
							var txt13 = document.getElementById('stok5').value;
							var txt14 = document.getElementById('jml5').value;
							var txt15 = document.getElementById('sisa5').value;
							
							var txt16 = document.getElementById('stok6').value;
							var txt17 = document.getElementById('jml6').value;
							var txt18 = document.getElementById('sisa6').value;
							
							var txt19 = document.getElementById('stok7').value;
							var txt20 = document.getElementById('jml7').value;
							var txt21 = document.getElementById('sisa7').value;
														
							var txt22 = document.getElementById('stok8').value;
							var txt23 = document.getElementById('jml8').value;
							var txt24 = document.getElementById('sisa8').value;
							
							var txt25 = document.getElementById('stok9').value;
							var txt26 = document.getElementById('jml9').value;
							var txt27 = document.getElementById('sisa9').value;
														
														
							
							var result1 = (parseFloat(txt1)-parseFloat(txt2)) ;
      						if (!isNaN(result1)) {
         					document.getElementById('sisat').value = result1;
							}
							
							var result2 = (parseFloat(txt4)-parseFloat(txt5)) ;
      						if (!isNaN(result2)) {
         					document.getElementById('sisa2').value = result2;
							}
							
							var result3 = (parseFloat(txt7)-parseFloat(txt8)) ;
      						if (!isNaN(result3)) {
         					document.getElementById('sisa3').value = result3;
							}
							
							var result4 = (parseFloat(txt10)-parseFloat(txt11)) ;
      						if (!isNaN(result4)) {
         					document.getElementById('sisa4').value = result4;
							}
							
							var result5 = (parseFloat(txt13)-parseFloat(txt14)) ;
      						if (!isNaN(result5)) {
         					document.getElementById('sisa5').value = result5;
							}
							
							var result6 = (parseFloat(txt16)-parseFloat(txt17)) ;
      						if (!isNaN(result6)) {
         					document.getElementById('sisa6').value = result6;
							}
							
							var result7 = (parseFloat(txt19)-parseFloat(txt20)) ;
      						if (!isNaN(result7)) {
         					document.getElementById('sisa7').value = result7;
							}
							
							var result8 = (parseFloat(txt22)-parseFloat(txt23)) ;
      						if (!isNaN(result8)) {
         					document.getElementById('sisa8').value = result8;
							}
							
							
							var result9 = (parseFloat(txt25)-parseFloat(txt26)) ;
      						if (!isNaN(result9)) {
         					document.getElementById('sisa9').value = result9;
							}
							
							
						}
						
						
</script> 						
					  			
					  
					
				  <!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info" onclick="return confirm('Apakah anda yakin sudah Menghitung Jumlah Barang Masuk?');">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  
				                  </form>
				                  </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

<?php
break;  
      case 'view1':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>Verifikasi Data Premix</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Premix</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
		
    <div class="box-header">
  
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="200" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%">
                    <thead>
                                    <tr>
                                      <th width="65">No</th>
                       				  <th width="507">Tgl Produksi</th>
						              <th width="349">Nama Premix</th>
						          
									 
									     <th width="647">Cetak Premix</th>
									  
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php	
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM premixcut order by no asc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td><?php echo "$no"?></td>
										<td><?php echo TanggalIndo($r['tgl'])?></td>
										<td><?php echo "$r[nm_rm]"?></td>
                        		
										
										<td><a href="cetak_premixcut.php?no=<?php echo $r['no']?>"> <button type="button" class="btn bg-orange">
						<i class="fa fa-print" target=_blank></i></button></a></td>
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