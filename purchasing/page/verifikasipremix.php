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
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=verifikasipremix&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Verifikasi Data Masuk Premix</i></button> </a>
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
									  
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM verifikasi_premix order by no asc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td><?php echo "$no"?></td>
										<td><?php echo TanggalIndo($r['tgl'])?></td>
										<td><?php echo "$r[nm_rm]"?></td>
                        				<td><?php echo "$r[jumlah]"?></td>
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
	
      if (isset($_POST['add'])) {		  
                $query = mysql_query("INSERT INTO verifikasi_premix VALUES ('','$_POST[tgl]','$_POST[nm_rm]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[jumlah]')");
		  		 		
                echo "<script>window.location='home.php?pg=verifikasipremix&act=view'</script>";
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
                      <label for="exampleInputEmail1">Nama Premix</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="nm_rm" id="nama" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from premix");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray .= "frm['" . $row['nm_rm'] . "'] = {
rm1:'" . addslashes($row['rm1']) . "',
rm2:'".addslashes($row['rm2'])."',
rm3:'".addslashes($row['rm3'])."',
rm4:'".addslashes($row['rm4'])."',
rm5:'".addslashes($row['rm5'])."',
jumlah:'".addslashes($row['jumlah'])."'
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
						<div class="form-group">Tanggal Planing
                    <input type="date" class="form-control" id="" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong"/>
					</div>	
										
			<div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" value="terigu" >
						<input type="text" class="form-control" id="rm1" name="rm1" onKeyUp="sum();" placeholder="input dalam satuan KG">
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
					  
					  
			   			
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('rm1').value = frm[no_form].rm1;  
		document.getElementById('rm2').value = frm[no_form].rm2; 
		document.getElementById('rm3').value = frm[no_form].rm3;
		document.getElementById('rm4').value = frm[no_form].rm4;
		document.getElementById('rm5').value = frm[no_form].rm5;
		document.getElementById('jumlah').value = frm[no_form].jumlah;
		
			};  
					  </script>
					  				  
								
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

              <button type="submit" name = 'add' class="btn btn-info" onclick="return confirm('Apakah anda yakin sudah Menghitung Jumlah Barang Masuk?');">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  
				                  </form>
				                  </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
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