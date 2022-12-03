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
        <h1>DATA PREMIX IN</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Premix</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
  		<a href="cetak_inprx.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Rekap Masuk PRX</i></button> 
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
										  <td><a href="?pg=premixin&act=add&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
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
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
	$d = mysql_fetch_array(mysql_query("SELECT * FROM premix WHERE no='$_GET[no]'"));
      if (isset($_POST['add'])) {		 
	   
               $query = mysql_query("INSERT INTO premixin VALUES ('','$_POST[planprx]','$_POST[tgl]','$_POST[lot]',
			   '$_POST[nm_rm]','$_POST[jumlah]','$_POST[berat]','$_POST[total]','$_POST[aktual]','$_POST[prosentase]')");
		  		 		
                echo "<script>window.location='home.php?pg=premixin&act=view'</script>";
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
                     <input readonly class="form-control" id="aktual" name="aktual" onKeyUp="sum();"placeholder="klik disinin" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['aktual'];?>">
                    </div>
					
					<div class="form-group">Prosentase %            
                     <input readonly class="form-control" id="prosentase" name="prosentase" onKeyUp="sum();" placeholder="klik disinin" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['prosentase'];?>">
                    </div>
					
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Save</button>
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