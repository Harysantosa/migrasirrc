
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
        <h1>Data Pembelian Barang</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Barang   
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=produk&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
	
		
		<a href="produk_excel.php"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Ambil Report Excel</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="589" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%">
                    <thead>
                      <tr>
                        <th width="23">No</th>
						<th width="110">Tanggal</th>
                        <th width="71">Nomor PO</th>
						<th width="136">Nama Vendor</th>
						<th width="27">Cetak PO</th>
						<th width="43">Edit</th>
						<th width="43">Hapus Data</th>
						 
						
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
include("indo.php");
                    $tampil=mysql_query("SELECT * FROM produk order by id_produk desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo TanggalIndo($r['tglmasuk'])?></td>
						<td><?php echo "$r[no_po]"?></td>
						<td><?php echo "$r[nama]"?></td>
						<td><a href="cetak_po.php?id_produk=<?php echo $r['id_produk']?>"> <button type="button" class="btn bg-orange">
						<i class="fa fa-print" target=_blank></i></button></a></td>
                        <td><a href="?pg=produk&act=edit&id_produk=<?php echo $r['id_produk']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
						
                        <td><a href="?pg=produk&act=delete&id_produk=<?php echo $r['id_produk']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
						  
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
	   if  ($_POST['grand_total']>='0'){	
	 
                $query = mysql_query("INSERT INTO produk VALUES ('','$_POST[no_po]','$_POST[no_inv]','$_POST[nama]','$_POST[alamat]','$_POST[kota]'
				,'$_POST[telepon]','$_POST[pic]','$_POST[nama_rm1]','$_POST[jumlah_barang1]','$_POST[jumlah_kg1]','$_POST[jumlah_perkilo1]','$_POST[sisajumlah_barang1]'
				,'$_POST[sisajumlah_perkilo1]','$_POST[harga_perbarang1]','$_POST[total1]','$_POST[nama_rm2]','$_POST[jumlah_barang2]','$_POST[jumlah_kg2]','$_POST[jumlah_perkilo2]'
				,'$_POST[sisajumlah_barang2]','$_POST[sisajumlah_perkilo2]','$_POST[harga_perbarang2]','$_POST[total2]','$_POST[nama_rm3]','$_POST[jumlah_barang3]','$_POST[jumlah_kg3]'
				,'$_POST[jumlah_perkilo3]','$_POST[sisajumlah_barang3]','$_POST[sisajumlah_perkilo3]','$_POST[harga_perbarang3]','$_POST[total3]','$_POST[total_harga]','$_POST[ppn]'
				,'$_POST[diskon]','$_POST[grand_total]','$_POST[jumlah_bayar]','$_POST[sisa_hutang]','$_POST[tglmasuk]','$_POST[jatuh_tempo]','$_POST[metode]')");
		  		
				 $query .= mysql_query("INSERT INTO hutang VALUES ('','$_POST[tglmasuk]','$_POST[no_inv]','$_POST[sisa_hutang]','$_POST[jatuh_tempo]','$_POST[nama]')");
		  
               echo "<script> alert('data berhasil disimpan');window.location='home.php?pg=produk&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Karna Beberapa Stok Kurang !');</script>";
			 }
			   
			   }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Produk</a></li>
            <li class="active"><a href="#">Tambah Data Produk</a></li>
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
					 <?php $kd_trans= kd_po_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">No Po</label>
                      <input type="text" class="form-control" id="no_po" value="<?php echo $kd_trans;?>" name="no_po"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_po" value="<?php echo $kd_trans;?>" name="no_po"   required data-fv-notempty-message="Tidak boleh kosong">
					  
                    </div>
					
														  	
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input type="date" class="form-control" required data-fv-notempty-message="Tidak boleh kosong" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" >
                    </div>
					
						  <div class="form-group">
                      <label for="exampleInputEmail1">Nama_vendor</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama" id="nama" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result = mysql_query("select * from vendor order by id");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';    
$jsArray .= "frm['" . $row['nama'] . "'] = {
nama:'" . addslashes($row['nama']) . "',
alamat:'".addslashes($row['alamat'])."',
kota:'".addslashes($row['kota'])."',
telepon:'".addslashes($row['telepon'])."',
pic:'".addslashes($row['pic'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
				 
                      <input readonly class="form-control" id="alamat" name="alamat"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                      <input readonly class="form-control" id="kota" name="kota" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                      <input readonly  class="form-control" id="telepon" name="telepon" placeholder="Jumlah Barang"  onkeyup="sum();">
                     <input readonly class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  					  
                  
                 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-1</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama_rm1" id="nama_rm1" onchange="changerm1(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result1 = mysql_query("select * from harga_rm order by id");    
					$jsArray1 = "var frm1 = new Array();
";        
					while ($row = mysql_fetch_array($result1)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray1 .= "frm1['" . $row['nm_fg'] . "'] = {
harga_perbarang1:'" . addslashes($row['harga']) . "',
jumlah_perkilo1:'" . addslashes($row['berat']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
				
					  <input readonly class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					  
					   <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					  
					  			 				 
                      <input readonly class="form-control" id="total1" name="total1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
                   
					 <input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)"  onChange="sum1();"  > 
					 
					   <input type="text" class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Input Jumlah Barang" onKeyUp="sum1();">					  
                    
					  </div>
				  
				  
				  		 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-2</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_rm2" id="nama_rm2" onchange="changerm2(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result2 = mysql_query("select * from harga_rm order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray2 .= "frm2['" . $row['nm_fg'] . "'] = {
harga_perbarang2:'" . addslashes($row['harga']) . "',
jumlah_perkilo2:'" . addslashes($row['berat']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="harga_perbarang2" name="harga_perbarang2" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
					  
					   <input readonly class="form-control" id="jumlah_perkilo2" name="jumlah_perkilo2" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
					  
					  			 				 
                      <input readonly class="form-control" id="total2" name="total2" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
                   
					 <input readonly class="form-control" id="jumlah_kg2"name="jumlah_kg2"   placeholder="Total (KG)"  onChange="sum2();" >
					 
					   <input type="text" class="form-control" id="jumlah_barang2" name="jumlah_barang2"  placeholder="Input Jumlah Barang" onKeyUp="sum2();">					  
                    
					  </div>
		
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_rm3" id="nama_rm3" onchange="changerm3(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result3 = mysql_query("select * from harga_rm order by id");    
					$jsArray3= "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray3 .= "frm3['" . $row['nm_fg'] . "'] = {
harga_perbarang3:'" . addslashes($row['harga']) . "',
jumlah_perkilo3:'" . addslashes($row['berat']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>

						<input readonly class="form-control" id="harga_perbarang3" name="harga_perbarang3" placeholder="Harga Satuan Barang" onKeyUp="sum3();">
					  
					   <input readonly class="form-control" id="jumlah_perkilo3" name="jumlah_perkilo3" placeholder="Harga Satuan Barang" onKeyUp="sum3();">
					  
					  			 				 
                      <input readonly class="form-control" id="total3" name="total3" placeholder="Harga Satuan Barang" onKeyUp="sum3();">
                   
					 <input readonly class="form-control" id="jumlah_kg3"name="jumlah_kg3"   placeholder="Total (KG)"  onChange="sum3();" >
					 
					   <input type="text" class="form-control" id="jumlah_barang3" name="jumlah_barang3"  placeholder="Input Jumlah Barang" onKeyUp="sum3();">					  
                    
					  </div>
					  
					  
				   	    <div class="form-group">
                       <label for="exampleInputEmail1">Metode Pembayaran</label>
                      <select class="form-control select2" name="metode" id="metode" style="width: 100%;">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Giro/Cek">Giro / Cek</option>
		  				
		  </select></optgroup>
                       </div>
						
				   	    <div class="form-group">
                       <label for="exampleInputEmail1">Total Harga</label>
                       <input readonly class="form-control" id="harga" name="harga" placeholder="Double klik disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum4();">
                       </div>
				  
				     	<div class="form-group">
                       <label for="exampleInputEmail1">Diskon</label>
                       <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum4();" >
                       </div>
					   
					    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Prosentase Pajak</label>
                       <input type="text"  class="form-control" id="jml_pajak" name="jml_pajak" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div> 
					   
					   	<div class="form-group">
                       <label for="exampleInputEmail1">Total Setelah Diskon</label>
                       <input readonly class="form-control" id="total_harga" name="total_harga" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum4();" >
                       </div>
				  			   	   	 
				  		
				       <div class="form-group">
                       <label for="exampleInputEmail1">PPN</label>
                       <input readonly class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div>
				  
					 				  
				  		<div class="form-group">
                       <label for="exampleInputEmail1">Grand Total</label>
                       <input type="text" class="form-control" id="grand_total" name="grand_total" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div>
				  
					  
					  
	 					 <div class="form-group">
                       <label for="exampleInputEmail1">Jumlah Bayar</label>
                       <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div>
	  
					  
	 					
	  					 <div class="form-group">
                       <label for="exampleInputEmail1">Sisa Hutang</label>
  					   <input type="text" class="form-control" id="sisa_hutang" name="sisa_hutang" required data-fv-notempty-message="Tidak boleh kosong"  placeholder="Jumlah Barang" onKeyUp="sum4();" >
                       </div>
					   
					   <div class="form-group">
                       <label for="exampleInputEmail1">Jatuh Tempo</label>
  					   <input type="text" class="form-control" id="jatuh_tempo" name="jatuh_tempo" required data-fv-notempty-message="Tidak boleh kosong"  placeholder="Jumlah Barang" onKeyUp="sum4();" >
                       </div>

                     
				  
					
	<script>
					  	<?php 
						echo 
						$jsArray; 
						?>  
						function changeValue(no_form){ 
	
						document.getElementById('nama').value = frm[no_form].nama;
						document.getElementById('alamat').value = frm[no_form].alamat;
						document.getElementById('kota').value = frm[no_form].kota;
						document.getElementById('telepon').value = frm[no_form].telepon;
						document.getElementById('pic').value = frm[no_form].pic;
	  
		
		
			}; </script>
			
			<script>
					  	<?php 
						echo 
						$jsArray1; 
						?>  
						 
						function changerm1(value){ 
	
						document.getElementById('harga_perbarang1').value = frm1[value].harga_perbarang1;
						document.getElementById('jumlah_perkilo1').value = frm1[value].jumlah_perkilo1;
						
						
						
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changerm2(value){ 
	
						document.getElementById('harga_perbarang2').value = frm2[value].harga_perbarang2;
						document.getElementById('jumlah_perkilo2').value = frm2[value].jumlah_perkilo2;
						
						
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changerm3(value){ 
	
						document.getElementById('harga_perbarang3').value = frm3[value].harga_perbarang3;
						document.getElementById('jumlah_perkilo3').value = frm3[value].jumlah_perkilo3;
						
						
						};  
	  					</script>
					  
					  
					  <script>
						  function sum1() {
							var txt1 = document.getElementById('harga_perbarang1').value;
							var txt2 = document.getElementById('jumlah_barang1').value;
							var txt3 = document.getElementById('total1').value;
							var txt4 = document.getElementById('jumlah_kg1').value;
							var txt5 = document.getElementById('jumlah_perkilo1').value;
							
							var result1 = (txt1)*(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('total1').value = result1;
							}
							
							var result2 = (txt5)*(txt2);
      						if (!isNaN(result2)) {
         					document.getElementById('jumlah_kg1').value = result2;
							}
							
							}
							</script>
							
							  <script>
						  function sum2() {
							
							var txt6 = document.getElementById('harga_perbarang2').value;
							var txt7 = document.getElementById('jumlah_barang2').value;
							var txt8 = document.getElementById('total2').value;
							var txt9 = document.getElementById('jumlah_kg2').value;
							var txt10 = document.getElementById('jumlah_perkilo2').value;
												
							var result3 = (txt6)*(txt7);
      						if (!isNaN(result3)) {
         					document.getElementById('total2').value = result3;
							}
							
							var result4 = (txt10)*(txt7);
      						if (!isNaN(result4)) {
         					document.getElementById('jumlah_kg2').value = result4;
							}
							}
							</script>
							
							
							  <script>
						  function sum3() {
							
							var txt11 = document.getElementById('harga_perbarang3').value;
							var txt12 = document.getElementById('jumlah_barang3').value;
							var txt13 = document.getElementById('total3').value;
							var txt14 = document.getElementById('jumlah_kg3').value;
							var txt15 = document.getElementById('jumlah_perkilo3').value;
						
											
							var result5 = (txt11)*(txt12);
      						if (!isNaN(result5)) {
         					document.getElementById('total3').value = result5;
							}
							
							var result6 = (txt15)*(txt12);
      						if (!isNaN(result6)) {
         					document.getElementById('jumlah_kg3').value = result6;
							}											
						
					  
							  
						  }
					  </script>
					 
					 
					  <script>
						  function sum4() {
						  var txt1 = document.getElementById('total1').value;
						  var txt2 = document.getElementById('total2').value;
						  var txt3 = document.getElementById('total3').value;
						  var txt4 = document.getElementById('harga').value;
						  var txt5 = document.getElementById('diskon').value;
						  var txt6 = document.getElementById('total_harga').value;
						  var txt7 = document.getElementById('jml_pajak').value;
						  var txt8 = document.getElementById('ppn').value;
						  var txt9 = document.getElementById('grand_total').value;
						  var txt10 = document.getElementById('jumlah_bayar').value;
						  var txt11 = document.getElementById('sisa_hutang').value;
      
		     				var result1 =parseInt(txt1);
      						if (!isNaN(result1)) {
         					document.getElementById('harga').value = result1;
							}
							
							var result2 =(parseInt(txt1)+parseInt(txt2));
      						if (!isNaN(result2)) {
         					document.getElementById('harga').value = result2;
							}
							
							var result3 =(parseInt(txt1)+parseInt(txt2)+parseInt(txt3));
      						if (!isNaN(result3)) {
         					document.getElementById('harga').value = result3;
							}											
						
							var result4 =(parseInt(txt4)-parseInt(txt5));
      						if (!isNaN(result4)) {
         					document.getElementById('total_harga').value = result4;
							}
							
							var result5 =((parseInt(txt7)/100)*parseInt(txt6));
      						if (!isNaN(result5)) {
         					document.getElementById('ppn').value = result5;
							}
							
							var result6 =(parseInt(txt6)+parseInt(txt8));
      						if (!isNaN(result6)) {
         					document.getElementById('grand_total').value = result6;
							}
							
							var result7 =(parseInt(txt9)-parseInt(txt10));
      						if (!isNaN(result7)) {
         					document.getElementById('sisa_hutang').value = result7;
							}
							
							
						
						
						
							}
						  </script>
					  <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'"));
            if (isset($_POST['update'])) {
			 if  ($_POST['grand_total']>='0'){	
				
                mysql_query("UPDATE produk SET no_po='$_POST[no_po]',no_inv='$_POST[no_inv]',nama='$_POST[nama]',alamat='$_POST[alamat]'
				,kota='$_POST[kota]',telepon='$_POST[telepon]',pic='$_POST[pic]',nama_rm1='$_POST[nama_rm1]',jumlah_barang1='$_POST[jumlah_barang1]'
				,jumlah_kg1='$_POST[jumlah_kg1]',jumlah_perkilo1='$_POST[jumlah_perkilo1]',sisajumlah_barang1='$_POST[sisajumlah_barang1]'
				,sisajumlah_perkilo1='$_POST[sisajumlah_perkilo1]',harga_perbarang1='$_POST[harga_perbarang1]',total1='$_POST[total1]'
				,nama_rm2='$_POST[nama_rm2]',jumlah_barang2='$_POST[jumlah_barang2]',jumlah_kg2='$_POST[jumlah_kg2]',jumlah_perkilo2='$_POST[jumlah_perkilo2]'
				,sisajumlah_barang2='$_POST[sisajumlah_barang2]',sisajumlah_perkilo2='$_POST[sisajumlah_perkilo2]',harga_perbarang2='$_POST[harga_perbarang2]'
				,total2='$_POST[total2]',nama_rm3='$_POST[nama_rm3]',jumlah_barang3='$_POST[jumlah_barang3]',jumlah_kg3='$_POST[jumlah_kg3]'
				,jumlah_perkilo3='$_POST[jumlah_perkilo3]',sisajumlah_barang3='$_POST[sisajumlah_barang3]',sisajumlah_perkilo3='$_POST[sisajumlah_perkilo3]'
				,harga_perbarang3='$_POST[harga_perbarang3]',total3='$_POST[total3]',total_harga='$_POST[total_harga]',ppn='$_POST[ppn]',diskon='$_POST[diskon]'
				,grand_total='$_POST[grand_total]',jumlah_bayar='$_POST[jumlah_bayar]',sisa_hutang='$_POST[sisa_hutang]',tglmasuk='$_POST[tglmasuk]' WHERE id_produk='$_POST[id_produk]'");
               
			    echo "<script> alert('data berhasil diubah');window.location='home.php?pg=produk&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Jumlah Minus !');</script>";
			   }
			   
			   }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Produk</a></li>
            <li class="active">Update Data Produk</li>
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
					 <?php $kd_trans= kd_po_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">No Po</label>
                      <input type="text" class="form-control" id="no_po"  name="no_po"  value="<?php echo $d['no_po'];?>"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_po" name="no_po"  value="<?php echo $d['no_po'];?>"    required data-fv-notempty-message="Tidak boleh kosong">
					   <input type="hidden" class="form-control" id="id_produk" name="id_produk"  value="<?php echo $d['id_produk'];?>"    required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
														  	
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input type="date" class="form-control" required data-fv-notempty-message="Tidak boleh kosong" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" >
                    </div>
					
						  <div class="form-group">
                      <label for="exampleInputEmail1">Nama_vendor</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama" id="nama" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result = mysql_query("select * from vendor order by id");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';    
$jsArray .= "frm['" . $row['nama'] . "'] = {
nama:'" . addslashes($row['nama']) . "',
alamat:'".addslashes($row['alamat'])."',
kota:'".addslashes($row['kota'])."',
telepon:'".addslashes($row['telepon'])."',
pic:'".addslashes($row['pic'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
				 
                      <input readonly class="form-control" id="alamat" name="alamat"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                      <input readonly class="form-control" id="kota" name="kota" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                      <input readonly  class="form-control" id="telepon" name="telepon" placeholder="Jumlah Barang"  onkeyup="sum();">
                     <input readonly class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  					  
                  
                 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-1</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nama_rm1" id="nama_rm1" onchange="changerm1(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result1 = mysql_query("select * from harga_rm order by id");    
					$jsArray1 = "var frm1 = new Array();
";        
					while ($row = mysql_fetch_array($result1)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray1 .= "frm1['" . $row['nm_fg'] . "'] = {
harga_perbarang1:'" . addslashes($row['harga']) . "',
jumlah_perkilo1:'" . addslashes($row['berat']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
				
					  <input readonly class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					  
					   <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
					  
					  			 				 
                      <input readonly class="form-control" id="total1" name="total1" placeholder="Harga Satuan Barang" onKeyUp="sum1();">
                   
					 <input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)"  onChange="sum1();"  > 
					 
					   <input type="text" class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Input Jumlah Barang" onKeyUp="sum1();">					  
                    
					  </div>
				  
				  
				  		 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-2</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_rm2" id="nama_rm2" onchange="changerm2(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result2 = mysql_query("select * from harga_rm order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray2 .= "frm2['" . $row['nm_fg'] . "'] = {
harga_perbarang2:'" . addslashes($row['harga']) . "',
jumlah_perkilo2:'" . addslashes($row['berat']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="harga_perbarang2" name="harga_perbarang2" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
					  
					   <input readonly class="form-control" id="jumlah_perkilo2" name="jumlah_perkilo2" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
					  
					  			 				 
                      <input readonly class="form-control" id="total2" name="total2" placeholder="Harga Satuan Barang" onKeyUp="sum2();">
                   
					 <input readonly class="form-control" id="jumlah_kg2"name="jumlah_kg2"   placeholder="Total (KG)"  onChange="sum2();" >
					 
					   <input type="text" class="form-control" id="jumlah_barang2" name="jumlah_barang2"  placeholder="Input Jumlah Barang" onKeyUp="sum2();">					  
                    
					  </div>
		
				 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_rm3" id="nama_rm3" onchange="changerm3(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result3 = mysql_query("select * from harga_rm order by id");    
					$jsArray3 = "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray3 .= "frm3['" . $row['nm_fg'] . "'] = {
harga_perbarang3:'" . addslashes($row['harga']) . "',
jumlah_perkilo3:'" . addslashes($row['berat']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
						<input readonly class="form-control" id="harga_perbarang3" name="harga_perbarang3" placeholder="Harga Satuan Barang" onKeyUp="sum3();">
					  
					   <input readonly class="form-control" id="jumlah_perkilo3" name="jumlah_perkilo3" placeholder="Harga Satuan Barang" onKeyUp="sum3();">
					  
					  			 				 
                      <input readonly class="form-control" id="total3" name="total3" placeholder="Harga Satuan Barang" onKeyUp="sum3();">
                   
					 <input readonly class="form-control" id="jumlah_kg3"name="jumlah_kg3"   placeholder="Total (KG)"  onChange="sum3();" >
					 
					   <input type="text" class="form-control" id="jumlah_barang3" name="jumlah_barang3"  placeholder="Input Jumlah Barang" onKeyUp="sum3();">					  
                    
					  </div>
						
				   	    <div class="form-group">
                       <label for="exampleInputEmail1">Total Harga</label>
                       <input readonly class="form-control" id="harga" name="harga" placeholder="Double klik disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum4();">
                       </div>
				  
				     	<div class="form-group">
                       <label for="exampleInputEmail1">Diskon</label>
                       <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum4();" >
                       </div>
					   
					    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Prosentase Pajak</label>
                       <input type="text"  class="form-control" id="jml_pajak" name="jml_pajak" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div> 
					   
					   	<div class="form-group">
                       <label for="exampleInputEmail1">Total Setelah Diskon</label>
                       <input readonly class="form-control" id="total_harga" name="total_harga" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum4();" >
                       </div>
				  			   	   	 
				  		
				       <div class="form-group">
                       <label for="exampleInputEmail1">PPN</label>
                       <input readonly class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div>
				  
					 				  
				  		<div class="form-group">
                       <label for="exampleInputEmail1">Grand Total</label>
                       <input type="text" class="form-control" id="grand_total" name="grand_total" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div>
				  
					  
					  
	 					 <div class="form-group">
                       <label for="exampleInputEmail1">Jumlah Bayar</label>
                       <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" >
                       </div>
	  
					  
	 					
	  					 <div class="form-group">
                       <label for="exampleInputEmail1">Sisa Hutang</label>
  					   <input type="text" class="form-control" id="sisa_hutang" name="sisa_hutang" required data-fv-notempty-message="Tidak boleh kosong"  placeholder="Jumlah Barang" onKeyUp="sum4();" >
                       </div>
				 
				  
					
	<script> 
	<?php echo 
						$jsArray;  ?> 
						function changeValue(no_form){ 
	
						document.getElementById('nama').value = frm[no_form].nama;
						document.getElementById('alamat').value = frm[no_form].alamat;
						document.getElementById('kota').value = frm[no_form].kota;
						document.getElementById('telepon').value = frm[no_form].telepon;
						document.getElementById('pic').value = frm[no_form].pic;
	  
		
		
			}; </script>
			
			<script>
					  	<?php 
						echo 
						$jsArray1; 
						?>  
						 
						function changerm1(value){ 
	
						document.getElementById('harga_perbarang1').value = frm1[value].harga_perbarang1;
						document.getElementById('jumlah_perkilo1').value = frm1[value].jumlah_perkilo1;
						
						
						
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changerm2(value){ 
	
						document.getElementById('harga_perbarang2').value = frm2[value].harga_perbarang2;
						document.getElementById('jumlah_perkilo2').value = frm2[value].jumlah_perkilo2;
						
						
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changerm3(value){ 
	
						document.getElementById('harga_perbarang3').value = frm3[value].harga_perbarang3;
						document.getElementById('jumlah_perkilo3').value = frm3[value].jumlah_perkilo3;
						
						
						};  
	  					</script>
					  
					  
					  <script>
						  function sum1() {
							var txt1 = document.getElementById('harga_perbarang1').value;
							var txt2 = document.getElementById('jumlah_barang1').value;
							var txt3 = document.getElementById('total1').value;
							var txt4 = document.getElementById('jumlah_kg1').value;
							var txt5 = document.getElementById('jumlah_perkilo1').value;
							
							var result1 = (txt1)*(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('total1').value = result1;
							}
							
							var result2 = (txt5)*(txt2);
      						if (!isNaN(result2)) {
         					document.getElementById('jumlah_kg1').value = result2;
							}
							
							}
							</script>
							
							  <script>
						  function sum2() {
							
							var txt6 = document.getElementById('harga_perbarang2').value;
							var txt7 = document.getElementById('jumlah_barang2').value;
							var txt8 = document.getElementById('total2').value;
							var txt9 = document.getElementById('jumlah_kg2').value;
							var txt10 = document.getElementById('jumlah_perkilo2').value;
												
							var result3 = (txt6)*(txt7);
      						if (!isNaN(result3)) {
         					document.getElementById('total2').value = result3;
							}
							
							var result4 = (txt10)*(txt7);
      						if (!isNaN(result4)) {
         					document.getElementById('jumlah_kg2').value = result4;
							}
							}
							</script>
							
							
							  <script>
						  function sum3() {
							
							var txt11 = document.getElementById('harga_perbarang3').value;
							var txt12 = document.getElementById('jumlah_barang3').value;
							var txt13 = document.getElementById('total3').value;
							var txt14 = document.getElementById('jumlah_kg3').value;
							var txt15 = document.getElementById('jumlah_perkilo3').value;
						
											
							var result5 = (txt11)*(txt12);
      						if (!isNaN(result5)) {
         					document.getElementById('total3').value = result5;
							}
							
							var result6 = (txt15)*(txt12);
      						if (!isNaN(result6)) {
         					document.getElementById('jumlah_kg3').value = result6;
							}											
						
					  
							  
						  }
					  </script>
					 
					 
					  <script>
						  function sum4() {
						  var txt1 = document.getElementById('total1').value;
						  var txt2 = document.getElementById('total2').value;
						  var txt3 = document.getElementById('total3').value;
						  var txt4 = document.getElementById('harga').value;
						  var txt5 = document.getElementById('diskon').value;
						  var txt6 = document.getElementById('total_harga').value;
						  var txt7 = document.getElementById('jml_pajak').value;
						  var txt8 = document.getElementById('ppn').value;
						  var txt9 = document.getElementById('grand_total').value;
						  var txt10 = document.getElementById('jumlah_bayar').value;
						  var txt11 = document.getElementById('sisa_hutang').value;
      
		     				var result1 =parseInt(txt1);
      						if (!isNaN(result1)) {
         					document.getElementById('harga').value = result1;
							}
							
							var result2 =(parseInt(txt1)+parseInt(txt2));
      						if (!isNaN(result2)) {
         					document.getElementById('harga').value = result2;
							}
							
							var result3 =(parseInt(txt1)+parseInt(txt2)+parseInt(txt3));
      						if (!isNaN(result3)) {
         					document.getElementById('harga').value = result3;
							}											
						
							var result4 =(parseInt(txt4)-parseInt(txt5));
      						if (!isNaN(result4)) {
         					document.getElementById('total_harga').value = result4;
							}
							
							var result5 =((parseInt(txt7)/100)*parseInt(txt6));
      						if (!isNaN(result5)) {
         					document.getElementById('ppn').value = result5;
							}
							
							var result6 =(parseInt(txt6)+parseInt(txt8));
      						if (!isNaN(result6)) {
         					document.getElementById('grand_total').value = result6;
							}
							
							var result7 =(parseInt(txt9)-parseInt(txt10));
      						if (!isNaN(result7)) {
         					document.getElementById('sisa_hutang').value = result7;
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

              <button type="submit" name = 'update' class="btn btn-info">Simpan</button>
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
      mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=produk&act=view'</script>";
      break;
			
     case 'delete1':
      mysql_query("DELETE FROM produkrm WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=produk&act=view'</script>";
      break;
    }
    ?>



  <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#merek").chained("#rm");
         
        </script>

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
	</script>