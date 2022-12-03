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
        <h1>LAPORAN Data Premix</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Premix</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href=""> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Verifikasi Data Masuk Premix</i></button> </a>
		<a href="cetak_laporanpremix.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Data Laporan Produksi Premix</i></button> 
		</a>
		<a href="cetak_cutrmpremix.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Data Cut RM untuk Premix</i></button> 
		</a>
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
						              <th width="351">Target Produksi</th>
									   <th width="351">Aktual Produksi </th>
									    <th width="351">Prosentase</th>
									  <th width="351">Input Laporan</th>
									     <th width="647">Cetak Premix</th>
									  
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM premix order by no asc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td><?php echo "$no"?></td>
										<td><?php echo TanggalIndo($r['tgl'])?></td>
										<td><?php echo "$r[nm_rm]"?></td>
                        				<td><?php echo "$r[total]"?> Pck</td>
										<td><?php echo "$r[aktual]"?> Pck</td>
										<td><?php echo "$r[prosentase]"?>%</td>
										<td><a href="?pg=laporanpremix&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-check"></i></button></a></td>
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM premix WHERE no='$_GET[no]'"));
	
            if (isset($_POST['update'])) {
				
				
				mysql_query("UPDATE premix SET planprx='$_POST[planprx]',tgl='$_POST[tgl]',lot='$_POST[lot]',nm_rm='$_POST[nm_rm]',r1='$_POST[r1]',jml1='$_POST[jml1]',r2='$_POST[r2]',jml2='$_POST[jml2]',r3='$_POST[r3]',jml3='$_POST[jml3]',r4='$_POST[r4]',jml4='$_POST[jml4]',r5='$_POST[r5]',jml5='$_POST[jml5]',r6='$_POST[r6]',jml6='$_POST[jml6]',r7='$_POST[r7]',jml7='$_POST[jml7]',r8='$_POST[r8]',jml8='$_POST[jml8]',r9='$_POST[r9]',jml9='$_POST[jml9]',r10='$_POST[r10]',rm10='$_POST[rm10]',jumlah='$_POST[jumlah]',berat='$_POST[berat]',total='$_POST[total]',aktual='$_POST[aktual]',prosentase='$_POST[prosentase]' WHERE no='$_POST[no]'");
               
				
				 echo "<script>window.location='home.php?pg=laporanpremix&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Buat Laporan Premix</h1>
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
                    <input type readonly class="form-control" id="nm_rm" name="nm_rm"   required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_rm'];?>">
					</div>
                   
					
						<div class="form-group">Tanggal Planing
                    <input type="date" class="form-control" id="" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>">
					</div>
					
			<div class="form-group">Jumlah Lot
						<input readonly class="form-control" id="lot" name="lot" onKeyUp="sum();" placeholder="input dalam satuan KG"required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['lot'];?>">
                  </div>
					
		
						<div>
						<input type="hidden" class="form-control" id="r1" name="r1" onKeyUp="sum();" placeholder="input dalam satuan KG"required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['r1'];?>">
                 	
           			  <input type="hidden" class="form-control" id="jml1" name="jml1" onKeyUp="sum();" value="<?php echo $d['jml1'];?>">
					</div>
					  
					
					
					<div class="form-group">
					<input type="hidden" class="form-control" id="r2" name="r2" value="<?php echo $d['r2'];?>">
                   	 <input type="hidden" class="form-control"   id="jml2" name="jml2" onKeyUp="sum();" value="<?php echo $d['jml2'];?>">
					  
					  </div>
					  
					  <div class="form-group">
					 <input type="hidden" class="form-control" id="r3" name="r3" value="<?php echo $d['r3'];?>">
                    
					 <input type="hidden" class="form-control"   id="jml3" name="jml3" onKeyUp="sum();" value="<?php echo $d['jml3'];?>">
					  
					  </div>
						
						<div class="form-group">
					 <input type="hidden" class="form-control" id="r4" name="r4" value="<?php echo $d['r4'];?>">
                   
					 <input type="hidden" class="form-control" id="jml4" name="jml4" onKeyUp="sum();" value="<?php echo $d['jml4'];?>">
					 
					  </div>
					  
					  <div class="form-group">
					 <input type="hidden" class="form-control" id="r5" name="r5" value="<?php echo $d['r5'];?>">
             
					 <input type="hidden" class="form-control" id="jml5" name="jml5" onKeyUp="sum();" value="<?php echo $d['jml5'];?>">
					
					  </div>
					
				<div class="form-group">
					 <input type="hidden" class="form-control" id="r6" name="r6" value="<?php echo $d['r6'];?>">
                  
					 <input type="hidden" class="form-control" id="jml6" name="jml6" onKeyUp="sum();" value="<?php echo $d['jml6'];?>">
					
					  </div>
					
					<div class="form-group">
					 <input type="hidden" class="form-control" id="r7" name="r7" value="<?php echo $d['r7'];?>">
                    
					 <input type="hidden" class="form-control" id="jml7" name="jml7" onKeyUp="sum();" value="<?php echo $d['jml7'];?>">
				
					 
					  </div>
					
					<div class="form-group">
					 <input type="hidden" class="form-control" id="r8" name="r8" value="<?php echo $d['r8'];?>">
                    
					 <input type="hidden" class="form-control" id="jml8" name="jml8" onKeyUp="sum();" value="<?php echo $d['jml8'];?>">
				
					  </div>
					
					<div class="form-group">
					 <input type="hidden" class="form-control" id="r9" name="r9" value="<?php echo $d['r9'];?>">

					 <input type="hidden" class="form-control" id="jml9" name="jml9" onKeyUp="sum();" value="<?php echo $d['jml9'];?>">
					
					  </div>
					  					 
					  
					<div class="form-group">
					 <input type="hidden" class="form-control" id="r10" name="r10" value="<?php echo $d['r10'];?>">

					 <input type="hidden" class="form-control" id="rm10" name="rm10" onKeyUp="sum();" value="<?php echo $d['jml10'];?>">
					
					  </div>	
					
									  
					 
					
					 <div class="form-group">              
                  <input type="hidden" input class="form-control" id="jumlah" name="jumlah" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();" value="<?php echo $d['jumlah'];?>" > 
                    </div>
					
					<div class="form-group">          
                  <input type="hidden" class="form-control" id="berat" name="berat" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['berat'];?>" onKeyUp="sum();"> 
                    </div>
					
					 <div class="form-group">Jumlah Premix Per-Pack               
                      <input readonly class="form-control" id="total" name="total" onKeyUp="sum();" placeholder="klik disinin" required data-fv-notempty-message="Tidak boleh kosong"  value="<?php echo $d['total'];?>" > 
                    </div>
					
					<div class="form-group">aktual Produksi (Pack)              
                      <input  type="text" class="form-control" id="aktual" name="aktual" onKeyUp="sum();"placeholder="klik disinin" required data-fv-notempty-message="Tidak boleh kosong"  > 
                    </div>
					
					<div class="form-group">Prosentase %            
                      <input readonly class="form-control" id="prosentase" name="prosentase" onKeyUp="sum();" placeholder="klik disinin" required data-fv-notempty-message="Tidak boleh kosong"  > 
                    </div>
					
					<script>
					 function sum() {
							
							var txt1 = document.getElementById('total').value;
							var txt2 = document.getElementById('aktual').value;
							
							var result1 = parseInt(txt2) / parseInt(txt1)*100;
							if (!isNaN(result1)) {
							document.getElementById('prosentase').value = result1.toFixed();
}
}
							
							
					</script>
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