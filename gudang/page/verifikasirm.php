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
        <h1> Verifikasi RM</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=verifikasirm&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data verifikasi</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
              <div class="box-body">
              <div class="table-responsive">
              <table width="445" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%">
              <thead>
                              <tr>
                                      <th width="72" style="text-align: center">No</th>
                                      <th  width="147" style="text-align: center">No po</th>
                                      <th  width="147" style="text-align: center">Nama Vendor</th>
                                     
									<th  width="147" style="text-align: center">Nama Bahan Baku</th>
										<th  width="296" style="text-align: center">Nama Jumlah Masuk(SAK)</th>
									 <th  width="150" style="text-align: center">Jumlah Masuk (KG)</th> 
                                      <th width="162" style="text-align: center">Tanggal Kedatangan</th>
									    <th width="115" style="text-align: center">Hapus</th>
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM verifikasi_prodrm order by id_produk asc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td style="text-align: center"><?php echo "$no"?></td>
							          <td style="text-align: center"><?php echo "$r[no_po]"?></td>
                                      <td align="left" style="text-align: center"><?php echo "$r[nama]"?></td>
                                     
                                      <td align="center" style="text-align: center"><?php echo "$r[nama_rm1]"?></td>
									<td align="center" style="text-align: center"><?php echo "$r[jumlah_barangdatang1]"?> Sak</td>
									<td align="center" style="text-align: center"><?php echo "$r[total_beratdatang1]"?> KG</td>
									<td align="center" style="text-align: center"><?php echo "$r[tgl_datang1]"?></td>
									  <td><a href="?pg=verifikasirm&act=delete&id_produk=<?php echo $r[id_produk]?>"><button type="button" class="btn btn-danger" onClick="return confirm('Mohon Verifikasi Terlebih dahulu ke bagian gudang jika anda ingin menghapus data planing Produksi <?php echo $r['no_po']?>');"><i class = "fa fa-trash-o"></i></button></i></button></a></td>
							
                        			
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
                $query = mysql_query("INSERT INTO verifikasi_prodrm VALUES ('','$_POST[no_po]','$_POST[nama]','$_POST[nama_rm1]','$_POST[jumlah_barang1]','$_POST[sisajumlah_barang1]','$_POST[jumlah_perkilo1]','$_POST[sisajumlah_perkilo1]','$_POST[jumlah_kg1]','$_POST[jumlah_barangdatang1]','$_POST[total_beratdatang1]','$_POST[tgl_datang1]','$_POST[nama_rm2]','$_POST[jumlah_barang2]','$_POST[sisajumlah_barang2]','$_POST[jumlah_perkilo2]','$_POST[sisajumlah_perkilo2]','$_POST[jumlah_kg2]','$_POST[jumlah_barangdatang2]','$_POST[total_beratdatang2]','$_POST[tgl_datang2]','$_POST[nama_rm3]','$_POST[jumlah_barang3]','$_POST[sisajumlah_barang3]','$_POST[jumlah_perkilo3]','$_POST[sisajumlah_perkilo3]','$_POST[jumlah_kg3]','$_POST[jumlah_barangdatang3]','$_POST[total_beratdatang3]','$_POST[tgl_datang3]')");
		  		 		
                echo "<script>window.location='home.php?pg=verifikasirm&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Verifikasi RM In</h1>
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
                      <label for="exampleInputEmail1">No PO</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_po" id="no_po" onchange="changeValue(this.value)" >
					<option value=''>-Pilih PO-</option>
					<?php 
					$result = mysql_query("select * from produk order by id_produk DESC");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_po'] . '">' . $row['no_po'] . '</option>';    
$jsArray .= "frm['" . $row['no_po'] . "'] = {
nama:'" . addslashes($row['nama']) . "',
nama_rm1:'".addslashes($row['nama_rm1'])."',
jumlah_barang1:'".addslashes($row['jumlah_barang1'])."',
sisajumlah_barang1:'".addslashes($row['sisajumlah_barang1'])."',
jumlah_kg1:'".addslashes($row['jumlah_kg1'])."',
sisajumlah_perkilo1:'".addslashes($row['sisajumlah_perkilo1'])."',
jumlah_perkilo1:'".addslashes($row['jumlah_perkilo1'])."',

nama_rm2:'".addslashes($row['nama_rm2'])."',
jumlah_barang2:'".addslashes($row['jumlah_barang2'])."',
sisajumlah_barang2:'".addslashes($row['sisajumlah_barang2'])."',
jumlah_kg2:'".addslashes($row['jumlah_kg2'])."',
sisajumlah_perkilo2:'".addslashes($row['sisajumlah_perkilo2'])."',
jumlah_perkilo2:'".addslashes($row['jumlah_perkilo2'])."',

nama_rm3:'".addslashes($row['nama_rm3'])."',
jumlah_barang3:'".addslashes($row['jumlah_barang3'])."',
sisajumlah_barang3:'".addslashes($row['sisajumlah_barang3'])."',
jumlah_kg3:'".addslashes($row['jumlah_kg3'])."',
sisajumlah_perkilo3:'".addslashes($row['sisajumlah_perkilo3'])."',
jumlah_perkilo3:'".addslashes($row['jumlah_perkilo3'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					<div class="form-group">Nama Vendor
                      <input readonly class="form-control" id="nama" name="nama" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					
                    
					    <div><label> Jumlah Barang yang dibeli (SAK)1</label>
						<input readonly class="form-control" id="nama_rm1" name="nama_rm1" required data-fv-notempty-message="Tidak boleh kosong">
						
            <input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
						
					  <label>Jumlah Barang yang belum di terima(SAK)1</label>
					  <input readonly class="form-control" id="sisajumlah_barang1" name="sisajumlah_barang1"  required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
						
					  <label>Jumlah Barang yang dibeli (KG)1</label>
					  <input readonly class="form-control" id="jumlah_kg1" name="jumlah_kg1"   required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
						
					  <label>Jumlah Barang yang belum diterima (KG)1</label>
					  <input readonly class="form-control" id="sisajumlah_perkilo1" name="sisajumlah_perkilo1"   required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
						
					  <label>Berat Per Barang1</label>
					  <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1"   required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
					</div>
					<div>
					  <input type="text"  class="form-control" id="jumlah_barangdatang1" name="jumlah_barangdatang1"  placeholder="input jumlah barang kedatangan (SAK)" onKeyUp="sum();"> 
					  <input readonly  class="form-control" id="total_beratdatang1" name="total_beratdatang1" onKeyUp="sum();" placeholder="Jumlah Berat Kedatanagn (KG)">
					<input type="date" class="form-control" id="tgl_datang1" name="tgl_datang1" placeholder="yymmdd">
					  </div>
					</div>
					<p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					
					  <div class="form-group">
					<div><label> Jumlah Barang yang dibeli (SAK)2</label>
					  <input readonly class="form-control" id="nama_rm2" name="nama_rm2" >
                      <input readonly class="form-control" id="jumlah_barang2" name="jumlah_barang2" onKeyUp="sum2();">
					  <label>Jumlah Barang yang belum di terima(SAK)2</label>
					  <input readonly class="form-control" id="sisajumlah_barang2" name="sisajumlah_barang2" onKeyUp="sum2();">
					  <label>Jumlah Barang yang dibeli (KG)2</label>
					  <input readonly class="form-control" id="jumlah_kg2" name="jumlah_kg2" onKeyUp="sum2();">
					  <label>Jumlah Barang yang belum diterima (KG)2</label>
					  <input readonly class="form-control" id="sisajumlah_perkilo2" name="sisajumlah_perkilo2"   onKeyUp="sum2();">
					  <label>Berat Per Barang2</label>
					  <input readonly class="form-control" id="jumlah_perkilo2" name="jumlah_perkilo2" onKeyUp="sum2();">
					<input type="text"  class="form-control" id="jumlah_barangdatang2" name="jumlah_barangdatang2"  onKeyUp="sum2();" placeholder="input jumlah barang kedatangan (SAK)">
					  <input readonly  class="form-control" id="total_beratdatang2" name="total_beratdatang2"     onKeyUp="sum2();" placeholder="Jumlah Berat Kedatanagn (KG)">
					<input type="date" class="form-control" id="tgl_datang2" name="tgl_datang2" placeholder="Input Tanggal Kedatangan">
					  </div>
					  </div>
					  <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					
					<div><label> Jumlah Barang yang dibeli (SAK)3</label>
						<input readonly class="form-control" id="nama_rm3" name="nama_rm3">
            <input readonly class="form-control" id="jumlah_barang3" name="jumlah_barang3" onKeyUp="sum3();">
					  <label>Jumlah Barang yang belum di terima(SAK)3</label>
					  <input readonly class="form-control" id="sisajumlah_barang3" name="sisajumlah_barang3" onKeyUp="sum3();">
					  <label>Jumlah Barang yang dibeli (KG)3</label>
					  <input readonly class="form-control" id="jumlah_kg3" name="jumlah_kg3" onKeyUp="sum3();">
					  <label>Jumlah Barang yang belum diterima (KG)3</label>
					  <input readonly class="form-control" id="sisajumlah_perkilo3" name="sisajumlah_perkilo3" onKeyUp="sum3();">
					  <label>Berat Per Barang3</label>
					  <input readonly class="form-control" id="jumlah_perkilo3" name="jumlah_perkilo3"  onKeyUp="sum3();">
					  <input type="text"  class="form-control" id="jumlah_barangdatang3" name="jumlah_barangdatang3" onKeyUp="sum3();" placeholder="input jumlah barang kedatangan (SAK)">
					  <input readonly  class="form-control" id="total_beratdatang3" name="total_beratdatang3"     onKeyUp="sum3();" placeholder="Jumlah Berat Kedatanagn (KG)">
					<input type="date" class="form-control" id="tgl_datang3" name="tgl_datang3" placeholder="yymmdd" >
					  </div>
          

					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('nama').value = frm[no_form].nama;  
		document.getElementById('nama_rm1').value = frm[no_form].nama_rm1; 
		document.getElementById('jumlah_barang1').value = frm[no_form].jumlah_barang1;
		document.getElementById('sisajumlah_barang1').value = frm[no_form].sisajumlah_barang1;
		document.getElementById('jumlah_kg1').value = frm[no_form].jumlah_kg1;
		document.getElementById('sisajumlah_perkilo1').value = frm[no_form].sisajumlah_perkilo1;
		document.getElementById('jumlah_perkilo1').value = frm[no_form].jumlah_perkilo1;
		
		document.getElementById('nama_rm2').value = frm[no_form].nama_rm2; 
		document.getElementById('jumlah_barang2').value = frm[no_form].jumlah_barang2;
		document.getElementById('sisajumlah_barang2').value = frm[no_form].sisajumlah_barang2;
		document.getElementById('jumlah_kg2').value = frm[no_form].jumlah_kg2;
		document.getElementById('sisajumlah_perkilo2').value = frm[no_form].sisajumlah_perkilo2;
		document.getElementById('jumlah_perkilo2').value = frm[no_form].jumlah_perkilo2;
		
		document.getElementById('nama_rm3').value = frm[no_form].nama_rm3; 
		document.getElementById('jumlah_barang3').value = frm[no_form].jumlah_barang3;
		document.getElementById('sisajumlah_barang3').value = frm[no_form].sisajumlah_barang3;
		document.getElementById('jumlah_kg3').value = frm[no_form].jumlah_kg3;
		document.getElementById('sisajumlah_perkilo3').value = frm[no_form].sisajumlah_perkilo3;
		document.getElementById('jumlah_perkilo3').value = frm[no_form].jumlah_perkilo3;
		
			};  
					  </script>
					  				  
                      <script>
						  function sum() {
							var txt1  = document.getElementById('jumlah_barang1').value;
							var txt2  = document.getElementById('jumlah_barangdatang1').value;
							var txt3  = document.getElementById('sisajumlah_barang1').value;
              var txt4  = document.getElementById('jumlah_perkilo1').value;
              var txt5  = document.getElementById('jumlah_kg1').value;
							var txt6  = document.getElementById('sisajumlah_perkilo1').value;
              var txt7  = document.getElementById('total_beratdatang1').value;
              
              var result1 = (txt1)-(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisajumlah_barang1').value = result1;
							}
              var result2 = (txt5)-((txt2)*(txt4));
      						if (!isNaN(result2)) {
         					document.getElementById('sisajumlah_perkilo1').value = result2;
							}
              var result3 = (txt2)*(txt4);
      						if (!isNaN(result3)) {
         					document.getElementById('total_beratdatang1').value = result3;
							}
              }
            </script>

            <script>
						  function sum2() {
              var txt8  = document.getElementById('jumlah_barang2').value;
							var txt9  = document.getElementById('jumlah_barangdatang2').value;
							var txt10 = document.getElementById('sisajumlah_barang2').value;
              var txt11 = document.getElementById('jumlah_perkilo2').value;
              var txt12 = document.getElementById('jumlah_kg2').value;
							var txt13 = document.getElementById('sisajumlah_perkilo2').value;
              var txt14 = document.getElementById('total_beratdatang2').value;

							var result4 = (txt8)-(txt9);
      						if (!isNaN(result4)) {
         					document.getElementById('sisajumlah_barang2').value = result4;
							}
              var result5 = (txt12)-((txt9)*(txt11));
      						if (!isNaN(result5)) {
         					document.getElementById('sisajumlah_perkilo2').value = result5;
							}
              var result6 = (txt9)*(txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('total_beratdatang2').value = result6;
							}
              }
							</script>	

              <script>
						  function sum3() {
              var txt15  = document.getElementById('jumlah_barang3').value;
							var txt16  = document.getElementById('jumlah_barangdatang3').value;
							var txt17 = document.getElementById('sisajumlah_barang3').value;
              var txt18 = document.getElementById('jumlah_perkilo3').value;
              var txt19 = document.getElementById('jumlah_kg3').value;
							var txt20 = document.getElementById('sisajumlah_perkilo3').value;
              var txt21 = document.getElementById('total_beratdatang3').value;

							var result7 = (txt15)-(txt16);
      						if (!isNaN(result7)) {
         					document.getElementById('sisajumlah_barang3').value = result7;
							}
              var result8 = (txt19)-((txt16)*(txt18));
      						if (!isNaN(result8)) {
         					document.getElementById('sisajumlah_perkilo3').value = result8;
							}
              var result9 = (txt16)*(txt18);
      						if (!isNaN(result9)) {
         					document.getElementById('total_beratdatang3').value = result9;
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
        </div>


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