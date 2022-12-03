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
        <h1> Verifikasi FG OUT</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=verifikasifgout&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data verifikasi</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                                    <tr>
                                      <th width="72" style="text-align: left">No</th>
                                      <th  width="147" style="text-align: left">Nomor Surat Jalan</th>
                                      <th  width="147" style="text-align: left">Nama Customer</th>
                                     
									<th  width="147" style="text-align: left">Tanggal Kirim</th>
										<th  width="296" style="text-align: left">Nama Produk</th>
									 <th  width="150" style="text-align: left">Qty</th> 
										<th  width="296" style="text-align: left">Nama Produk</th>
									 <th  width="150" style="text-align: left">Qty</th> 
										<th  width="296" style="text-align: left">Nama Produk</th>
									 <th  width="150" style="text-align: left">Qty</th> 
										<th  width="296" style="text-align: left">Nama Produk</th>
									 <th  width="150" style="text-align: left">Qty</th> 
                                      
									    <th width="115" style="text-align: left">Hapus</th>
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM verifikasifgout group by id desc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					out
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td style="text-align: left"><?php echo "$no"?></td>
							          <td style="text-align: left"><?php echo "$r[do1]"?></td>
                                      <td align="left" style="text-align: left"><?php echo "$r[nm_cust]"?></td>
                                     
                                      <td align="center" style="text-align: left"><?php echo TanggalIndo($r['tgl'])?></td>
									<td align="center" style="text-align: left"><?php echo "$r[nm_fg1]"?></td>
									<td align="center" style="text-align: left"><?php echo "$r[qty1]"?></td>
										
										<td align="center" style="text-align: left"><?php echo "$r[nm_fg2]"?></td>
									<td align="center" style="text-align: left"><?php echo "$r[qty2]"?></td>
										
										<td align="center" style="text-align: left"><?php echo "$r[nm_fg3]"?></td>
									<td align="center" style="text-align: left"><?php echo "$r[qty3]"?></td>
										
										<td align="center" style="text-align: left"><?php echo "$r[nm_fg4]"?></td>
									<td align="center" style="text-align: left"><?php echo "$r[qty4]"?></td>
									
								      <td style="text-align: left"><a href="?pg=verifikasifgout&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							
                        			<td width="16">&nbsp;</td>
                                    </tr>
                                    <?php
                         $no++;
					}
				
						?>
						
						
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
              $query = mysql_query("INSERT INTO verifikasifgout VALUES ('','$_POST[do1]','$_POST[nm_cust]','$_POST[tgl]','$_POST[mobil]','$_POST[supir]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[exp1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[exp2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[exp3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[exp4]')");
		  
                echo "<script>window.location='home.php?pg=verifikasifgout&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Verifikasi FG Out</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing</a></li>
            <li class="active">Tambah Data Verifikasi FG out</li>
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
                      <label for="exampleInputEmail1">No DO</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="do1" id="do1" onchange="changeValue(this.value)" >
					<option value=''>-Pilih PO-</option>
					<?php 
					$result = mysql_query("select * from so");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['do1'] . '">' . $row['do1'] . '</option>';    
$jsArray .= "frm['" . $row['do1'] . "'] = {
nm_cust:'" . addslashes($row['nm_cust']) . "',
tgl:'".addslashes($row['tgl'])."',
mobil:'".addslashes($row['mobil'])."',
supir:'".addslashes($row['supir'])."',

nm_fg1:'".addslashes($row['nm_fg1'])."',
qty1:'".addslashes($row['qty1'])."',
exp1:'".addslashes($row['exp1'])."',

nm_fg2:'".addslashes($row['nm_fg2'])."',
qty2:'".addslashes($row['qty2'])."',
exp2:'".addslashes($row['exp2'])."',

nm_fg3:'".addslashes($row['nm_fg3'])."',
qty3:'".addslashes($row['qty3'])."',
exp3:'".addslashes($row['exp3'])."',

nm_fg4:'".addslashes($row['nm_fg4'])."',
qty4:'".addslashes($row['qty4'])."',
exp4:'".addslashes($row['exp4'])."'



};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					<div class="form-group">Nama Vendor
                      <input readonly class="form-control" id="nm_cust" name="nm_cust" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					
                    
					 <div><label> Tanggal Kirim</label>
						<input readonly class="form-control" id="tgl" name="tgl" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					 <div><label> Nama Mobil</label>	
                      <input readonly class="form-control" id="mobil" name="mobil"  required data-fv-notempty-message="Tidak boleh kosong">
						</div>
					<div><label> Nama Supir</label>
					 <input readonly class="form-control" id="supir" name="supir"  required data-fv-notempty-message="Tidak boleh kosong" >
					</div>
					
					 <div> <label>Nama Finish Good item 1</label>
					  <input readonly class="form-control" id="nm_fg1" name="nm_fg1"   required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
					</div>
					 <div> <label>Quantity item 1</label>
					  <input readonly class="form-control" id="qty1" name="qty1"   required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
					</div>
					<div>
					  <label>Exp Item 1</label>
					  <input readonly class="form-control" id="exp1" name="exp1"   required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
					</div>
					<p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					 <div> <label>Nama Finish Good item 2</label>
					  <input readonly class="form-control" id="nm_fg2" name="nm_fg2"   onKeyUp="sum();">
					</div>
					 <div> <label>Quantity item 2</label>
					  <input readonly class="form-control" id="qty2" name="qty2"  onKeyUp="sum();">
					</div>
					<div>
					  <label>Exp Item 2</label>
					  <input readonly class="form-control" id="exp2" name="exp2" onKeyUp="sum();">
					</div>
					
					<p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					 <div> <label>Nama Finish Good item 3</label>
					  <input readonly class="form-control" id="nm_fg3" name="nm_fg3"    onKeyUp="sum();">
					</div>
					 <div> <label>Quantity item 3</label>
					  <input readonly class="form-control" id="qty3" name="qty3" onKeyUp="sum();">
					</div>
					<div>
					  <label>Exp Item 3</label>
					  <input readonly class="form-control" id="exp3" name="exp3" onKeyUp="sum();">
					</div>
					<p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					<div> <label>Nama Finish Good item 4</label>
					  <input readonly class="form-control" id="nm_fg4" name="nm_fg4"  onKeyUp="sum();">
					</div>
					 <div> <label>Quantity item 4</label>
					  <input readonly class="form-control" id="qty4" name="qty4"  onKeyUp="sum();">
					</div>
					<div>
					  <label>Exp Item 4</label>
					  <input readonly class="form-control" id="exp4" name="exp4" onKeyUp="sum();">
					</div>
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('nm_cust').value = frm[no_form].nm_cust;  
		document.getElementById('tgl').value = frm[no_form].tgl; 
		document.getElementById('mobil').value = frm[no_form].mobil;
		document.getElementById('supir').value = frm[no_form].supir;
		
		document.getElementById('nm_fg1').value = frm[no_form].nm_fg1;
		document.getElementById('qty1').value = frm[no_form].qty1;
		document.getElementById('exp1').value = frm[no_form].exp1;
		
		document.getElementById('nm_fg2').value = frm[no_form].nm_fg2;
		document.getElementById('qty2').value = frm[no_form].qty2;
		document.getElementById('exp2').value = frm[no_form].exp2;
		
		document.getElementById('nm_fg3').value = frm[no_form].nm_fg3;
		document.getElementById('qty3').value = frm[no_form].qty3;
		document.getElementById('exp3').value = frm[no_form].exp3;
		
		document.getElementById('nm_fg4').value = frm[no_form].nm_fg4;
		document.getElementById('qty4').value = frm[no_form].qty4;
		document.getElementById('exp4').value = frm[no_form].exp4;
		
	
			};  
					  </script>
					  				  
								
				  <script>
						function sum() {
							var txt1 = document.getElementById('jumlah_barangdatang1').value;
      						var txt2 = document.getElementById('total_beratdatang1').value;
							var txt3 = document.getElementById('jumlah_perkilo1').value;
							
							var txt4 = document.getElementById('jumlah_barangdatang2').value;
      						var txt5 = document.getElementById('total_beratdatang2').value;
							var txt6 = document.getElementById('jumlah_perkilo2').value;
							
							var txt7 = document.getElementById('jumlah_barangdatang3').value;
      						var txt8 = document.getElementById('total_beratdatang3').value;
							var txt9 = document.getElementById('jumlah_perkilo3').value;
													
							var result1 = (txt1)*(txt3);
      						if (!isNaN(result1)) {
         					document.getElementById('total_beratdatang1').value = result1;
							}
							
							var result2 = (txt4)*(txt6);
      						if (!isNaN(result2)) {
         					document.getElementById('total_beratdatang2').value = result2;
							}
							
							var result3 = (txt7)*(txt9);
      						if (!isNaN(result3)) {
         					document.getElementById('total_beratdatang3').value = result3;
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
      mysql_query("DELETE FROM verifikasifgout WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=verifikasifgout&act=view'</script>";
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