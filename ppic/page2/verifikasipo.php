
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
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Barang   
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=verifikasipo&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
	
		
		<a href="produk_excel.php"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Ambil Report Excel</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="1041" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="25">No</th>
						<th width="250">Tanggal</th>
                        <th width="214">Nomor PO</th>
						<th width="314">Nama Vendor</th>
                        <th width="70">Edit</th>
						<th width="140">Hapus Data</th>
						<th width="140">CetaK PO</th>
						 
						
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM verifikasipo order by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo TanggalIndo($r['tglmasuk'])?></td>
						<td><?php echo "$r[no_po]"?></td>
						<td><?php echo "$r[nama_vendor]"?></td>
                       
							
                        <td><a href=""><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
											
                        <td><a href="?pg=verifikasipo&act=delete&id_produk=<?php echo $r['id_produk']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
						
						<td><a href="cetak_po.php?id_produk=<?php echo $r['id_produk']?>"> <button type="button" class="btn bg-orange">
						<i class="fa fa-print" target=_blank></i></button></a></td>
						  
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
                $query = mysql_query("INSERT INTO verifikasipo VALUES ('','$_POST[idvrf]','$_POST[no_po]','$_POST[no_inv]','$_POST[tempo]','$_POST[nama_vendor]','$_POST[alamat]','$_POST[kota]','$_POST[telepon]','$_POST[pic]','$_POST[nama_rm1]','$_POST[jumlah_barang1]','$_POST[jumlah_kg1]','$_POST[jumlah_perkilo1]','$_POST[harga_perbarang1]','$_POST[sisajumlah_barang1]','$_POST[sisajumlah_perkilo1]','$_POST[nama_rm2]','$_POST[jumlah_barang2]','$_POST[jumlah_kg2]','$_POST[jumlah_perkilo2]','$_POST[harga_perbarang2]','$_POST[sisajumlah_barang2]','$_POST[sisajumlah_perkilo2]','$_POST[nama_rm3]','$_POST[jumlah_barang3]','$_POST[jumlah_kg3]','$_POST[jumlah_perkilo3]','$_POST[harga_perbarang3]','$_POST[sisajumlah_barang3]','$_POST[sisajumlah_perkilo3]','$_POST[total_harga]','$_POST[ppn]','$_POST[grand_total]','$_POST[jumlah_bayar]','$_POST[sisa_hutang]','$_POST[tglmasuk]')");
		  
		  
		  		 $query = mysql_query("INSERT INTO hutang VALUES ('','$_POST[tglmasuk]','$_POST[no_inv]','$_POST[sisa_hutang]','$_POST[tempo]','$_POST[nama_vendor]')");
		  	
		  
		       echo "<script>window.location='home.php?pg=verifikasipo&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Produk</a></li>
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
					   <div class="form-group">
					 <?php $kd_trans= kd_vrfpo_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="idvrf" value="<?php echo $kd_trans;?>" name="idvrf"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="idvrf" value="<?php echo $kd_trans;?>" name="idvrf"   required data-fv-notempty-message="Tidak boleh kosong">
					 <input type="hidden" class="form-control" id="id" name="id"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
				  	
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input readonly class="form-control" required data-fv-notempty-message="Tidak boleh kosong" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" >
                    </div>
						
				   <div class="form-group">
                      <label for="exampleInputEmail1">NO INV</label>
                      <input type="text" class="form-control" id="no_inv" name="no_inv" placeholder="no INV" required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					
						 <div class="form-group">Batas Jatuh Tempo
                     <input type="number" class="form-control" id="tempo" name="tempo" placeholder="Masukan Jumlah Hari" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nomor PO</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="no_po" id="no_po" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result = mysql_query("select * from produk order by id_produk");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_po'] . '">' . $row['no_po'] . '</option>';    
$jsArray .= "frm['" . $row['no_po'] . "'] = {
nama_vendor:'" . addslashes($row['nama_vendor']) . "',
alamat:'".addslashes($row['alamat'])."',
kota:'".addslashes($row['kota'])."',
telepon:'".addslashes($row['telepon'])."',
pic:'".addslashes($row['pic'])."',
tglmasuk:'".addslashes($row['tglmasuk'])."',
no_inv:'".addslashes($row['no_inv'])."',

nama_rm1:'" . addslashes($row['nama_rm1']) . "',
jumlah_barang1:'".addslashes($row['jumlah_barang1'])."',
jumlah_perkilo1:'".addslashes($row['jumlah_perkilo1'])."',
jumlah_kg1:'".addslashes($row['jumlah_kg1'])."',


nama_rm2:'" . addslashes($row['nama_rm2']) . "',
jumlah_barang2:'".addslashes($row['jumlah_barang2'])."',
jumlah_perkilo2:'".addslashes($row['jumlah_perkilo2'])."',
jumlah_kg2:'".addslashes($row['jumlah_kg2'])."',


nama_rm3:'" . addslashes($row['nama_rm3']) . "',
jumlah_barang3:'".addslashes($row['jumlah_barang3'])."',
jumlah_perkilo3:'".addslashes($row['jumlah_perkilo3'])."',
jumlah_kg3:'".addslashes($row['jumlah_kg3'])."'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label>
                      <input type="text" class="form-control" id="nama_vendor" name="nama_vendor"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kota</label>
                       <input type="text" class="form-control" id="kota" name="kota" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">NO Telepon</label>
                       <input type="text"  class="form-control" id="telepon" name="telepon" placeholder="Jumlah Barang"  onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PIC</label>
                     <input type="text"  class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					 					  					  
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama RM1</label>
                     <input readonly class="form-control" id="nama_rm1" name="nama_rm1" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  <div>
					  <input type="text" class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Jumlah Barang" >
					 				 
                      <input type="text" class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();">
                   
						<input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)"  onKeyUp="sum();" >
					  					  
                      <input type="text" class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" >
                  
					   <input type="hidden"class="form-control" id="sisajumlah_perkilo1" name="sisajumlah_perkilo1" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();" >
					  
					   <input type="hidden"class="form-control" id="sisajumlah_barang1" name="sisajumlah_barang1" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();" >
					  </div>
				  
				  
				  		<div class="form-group">
                      <label for="exampleInputEmail1">Nama RM2</label>
                     <input type="text"  class="form-control" id="nama_rm2" name="nama_rm2" placeholder="Jumlah Barang" onkeyup="sum();">
                    </div>
					  <div>
					  <input type="text" class="form-control" id="jumlah_barang2" name="jumlah_barang2"  placeholder="Jumlah Barang"  >
					 				 
                      <input type="text" class="form-control" id="jumlah_perkilo2" name="jumlah_perkilo2" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();">
					 				 
                      <input readonly class="form-control" id="jumlah_kg2"name="jumlah_kg2"   placeholder="Total (KG)" onKeyUp="sum();" >
					  					  
                      <input type="text" class="form-control" id="harga_perbarang2" name="harga_perbarang2" placeholder="Harga Satuan Barang"  >
                  
					   <input type="hidden"class="form-control" id="sisajumlah_perkilo2" name="sisajumlah_perkilo2" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();" >
					  
					   <input type="hidden"class="form-control" id="sisajumlah_barang2" name="sisajumlah_barang2" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();" >
					  </div>
		
		 			<div class="form-group">
                      <label for="exampleInputEmail1">Nama RM3</label>
                     <input type="text"  class="form-control" id="nama_rm3" name="nama_rm3" placeholder="Jumlah Barang" onkeyup="sum();">
                    </div>
		<div>
						 <input type="text" class="form-control" id="jumlah_barang3" name="jumlah_barang3"  placeholder="Jumlah Barang" >
					 				 
                      <input type="text" class="form-control" id="jumlah_perkilo3" name="jumlah_perkilo3" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();">
					 				 
                      <input readonly class="form-control" id="jumlah_kg3"name="jumlah_kg3"   placeholder="Total (KG)" onKeyUp="sum();" >
					  					  
                      <input type="text" class="form-control" id="harga_perbarang3" name="harga_perbarang3" placeholder="Harga Satuan Barang" >
                  
					   <input type="hidden"class="form-control" id="sisajumlah_perkilo3" name="sisajumlah_perkilo3" placeholder="Jumlah Berat Satuan Barang"onKeyUp="sum();" >
					  
					   <input type="hidden"class="form-control" id="sisajumlah_barang3" name="sisajumlah_barang3" placeholder="Jumlah Berat Satuan Barang" onKeyUp="sum();" >
					  </div>
						
						
				   	   <div class="form-group">
                       <label for="exampleInputEmail1">Total Harga</label>
                       <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum();">
                       </div>
				  		
				  		<div class="form-group">
                       <label for="exampleInputEmail1">PPN</label>
                       <input type="text" class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum();">
                       </div>
				  
				  		<div class="form-group">
                       <label for="exampleInputEmail1">Grand Total</label>
                       <input type="text" class="form-control" id="grand_total" name="grand_total" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum();">
                       </div>
				  
	 					 <div class="form-group">
                       <label for="exampleInputEmail1">Jumlah Bayar</label>
                       <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum();">
                       </div>
	  
	  					 <div class="form-group">
                       <label for="exampleInputEmail1">Sisa Hutang</label>
  					   <input type="text" class="form-control" id="sisa_hutang" name="sisa_hutang" required data-fv-notempty-message="Tidak boleh kosong"  placeholder="Jumlah Barang" onClick="sum();">
                       </div>
				  
				  
					 	<script>
					  	<?php 
						echo 
						$jsArray; 
						?>  
						function changeValue(no_form){ 
	
						document.getElementById('nama_vendor').value = frm[no_form].nama_vendor;
						document.getElementById('alamat').value = frm[no_form].alamat;
						document.getElementById('kota').value = frm[no_form].kota;
						document.getElementById('telepon').value = frm[no_form].telepon;
						document.getElementById('pic').value = frm[no_form].pic;
						document.getElementById('tglmasuk').value = frm[no_form].tglmasuk;
						document.getElementById('no_inv').value = frm[no_form].no_inv;	
						document.getElementById('nama_rm1').value = frm[no_form].nama_rm1;
						document.getElementById('jumlah_barang1').value = frm[no_form].jumlah_barang1;
						document.getElementById('jumlah_perkilo1').value = frm[no_form].jumlah_perkilo1;
						document.getElementById('jumlah_kg1').value = frm[no_form].jumlah_kg1;
						
						document.getElementById('nama_rm2').value = frm[no_form].nama_rm2;
						document.getElementById('jumlah_barang2').value = frm[no_form].jumlah_barang2;
						document.getElementById('jumlah_perkilo2').value = frm[no_form].jumlah_perkilo2;
						document.getElementById('jumlah_kg2').value = frm[no_form].jumlah_kg2;
							
						document.getElementById('nama_rm3').value = frm[no_form].nama_rm3;
						document.getElementById('jumlah_barang3').value = frm[no_form].jumlah_barang3;
						document.getElementById('jumlah_perkilo3').value = frm[no_form].jumlah_perkilo3;
						document.getElementById('jumlah_kg3').value = frm[no_form].jumlah_kg3;
						
						};  
	  					</script>
					  
					  
					  <script>
						  function sum() {
						var txt1 = document.getElementById('jumlah_barang1').value;
						var txt3a= document.getElementById('harga_perbarang1').value;
						
						var txt6  = document.getElementById('jumlah_barang2').value;
						var txt8a  = document.getElementById('harga_perbarang2').value;
							
						
						var txt11 = document.getElementById('jumlah_barang3').value;
						var txt13a = document.getElementById('harga_perbarang3').value;	
												  
					    var txt16 = document.getElementById('total_harga').value;
						var txt17 = document.getElementById('ppn').value;
						var txt18 = document.getElementById('grand_total').value;
						var txt19 = document.getElementById('jumlah_bayar').value;
						var txt20 = document.getElementById('sisa_hutang').value;						
						
						  var result4 = ((txt3a) * (txt1))+((txt8a) * (txt6))+((txt13a) * (txt11));
      					if (!isNaN(result4)) {
         				document.getElementById('total_harga').value = result4;
						}
																			
						var result5 =(parseInt (txt18) -parseInt(txt19))+(0);
      					if (!isNaN(result5)) {
         				document.getElementById('sisa_hutang').value = result5;
						}
						
						var result6 =parseInt (txt16) *(0.1);
      					if (!isNaN(result6)) {
         				document.getElementById('ppn').value = result6;
						}
						
						var result7 =(parseInt(txt16) + parseInt(txt17))+(0);
      					if (!isNaN(result7)) {
         				document.getElementById('grand_total').value = result7;
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

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
			   &nbsp;
				  <button input class="btn btn-success" type="button" onClick="sum1()">Hitung</button>
                  
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE produk SET no_po='$_POST[no_po]',no_inv='$_POST[no_inv]',nama_vendor='$_POST[nama_vendor]',alamat='$_POST[alamat]',kota='$_POST[kota]',telepon='$_POST[telepon]',pic='$_POST[pic]',nama_rm1='$_POST[nama_rm1]',jumlah_barang1='$_POST[jumlah_barang1]',jumlah_kg1='$_POST[jumlah_kg1]',jumlah_perkilo1='$_POST[jumlah_perkilo1]',harga_perbarang1='$_POST[harga_perbarang1]',sisajumlah_barang1='$_POST[sisajumlah_barang1]',sisajumlah_perkilo1='$_POST[sisajumlah_perkilo1]',nama_rm2='$_POST[nama_rm2]',jumlah_barang2='$_POST[jumlah_barang2]',jumlah_kg2='$_POST[jumlah_kg2]',jumlah_perkilo2='$_POST[jumlah_perkilo2]',harga_perbarang2='$_POST[harga_perbarang2]',sisajumlah_barang2='$_POST[sisajumlah_barang2]',sisajumlah_perkilo2='$_POST[sisajumlah_perkilo2]',nama_rm3='$_POST[nama_rm3]',jumlah_barang3='$_POST[jumlah_barang3]',jumlah_kg3='$_POST[jumlah_kg3]',jumlah_perkilo3='$_POST[jumlah_perkilo3]',harga_perbarang3='$_POST[harga_perbarang3]',sisajumlah_barang3='$_POST[sisajumlah_barang3]',sisajumlah_perkilo3='$_POST[sisajumlah_perkilo3]',total_harga='$_POST[total_harga]',ppn='$_POST[ppn]',grand_total='$_POST[grand_total]',jumlah_bayar='$_POST[jumlah_bayar]',sisa_hutang='$_POST[sisa_hutang]',tglmasuk='$_POST[tglmasuk]' WHERE id_produk='$_POST[id_produk]'");
                echo "<script>window.location='home.php?pg=produk&act=view'</script>";
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
                      <label for="exampleInputEmail1">Nomor PO</label>
                      <input readonly class="form-control" id="no_po" name="no_po" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_po'];?>">
					  <input type="hidden" class="form-control" id="id_produk" name="id_produk" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_produk'];?>">
                    </div>
					
                     <div class="form-group">
                      <label for="exampleInputEmail1">No Inv</label>
                      <input readonly class="form-control" id="no_inv" name="no_inv" placeholder="nomor Invoice" 
					  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_inv'];?>">
                    </div>
						 
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input readonly class="form-control" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tglmasuk'];?>">
                    </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label>
                      <input readonly class="form-control" id="nama_vendor" name="nama_vendor"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_vendor'];?>">
                    </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input readonly class="form-control" id="alamat" name="alamat"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kota</label>
                       <input readonly class="form-control" id="kota" name="kota" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['kota'];?>">
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">NO Telepon</label>
                       <input readonly  class="form-control" id="telepon" name="telepon" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['telepon'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PIC</label>
                     <input readonly  class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['pic'];?>">
                    </div>
					  					  
                  
                 		<div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                     <input readonly  class="form-control" id="nama_rm1" name="nama_rm1" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_rm1'];?>">
                    	</div>
					  <input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Jumlah Barang" value= "<?php echo $d['jumlah_barang1'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Jumlah Berat Satuan Barang" value= "<?php echo $d['jumlah_perkilo1'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)" value= "<?php echo $d['jumlah_kg1'];?>">
					  					  
                      <input readonly class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" value= "<?php echo $d['harga_perbarang1'];?>">
                  	  </div>
				  
				  
				  		<div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                     <input readonly  class="form-control" id="nama_rm2" name="nama_rm2" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_rm2'];?>">
                    	</div>
					  <input readonly class="form-control" id="jumlah_barang2" name="jumlah_barang2"  placeholder="Jumlah Barang" value= "<?php echo $d['jumlah_barang2'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_perkilo2" name="jumlah_perkilo2" placeholder="Jumlah Berat Satuan Barang" value= "<?php echo $d['jumlah_perkilo2'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_kg2"name="jumlah_kg2"   placeholder="Total (KG)" value= "<?php echo $d['jumlah_kg2'];?>">
					  					  
                      <input readonly class="form-control" id="harga_perbarang2" name="harga_perbarang2" placeholder="Harga Satuan Barang" value= "<?php echo $d['harga_perbarang2'];?>">
                  	  </div>
		
		 			 <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                     <input readonly  class="form-control" id="nama_rm3" name="nama_rm3" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_rm3'];?>">
                    	</div>
					  <input readonly class="form-control" id="jumlah_barang3" name="jumlah_barang3"  placeholder="Jumlah Barang" value= "<?php echo $d['jumlah_barang3'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_perkilo3" name="jumlah_perkilo3" placeholder="Jumlah Berat Satuan Barang" value= "<?php echo $d['jumlah_perkilo3'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_kg3"name="jumlah_kg3"   placeholder="Total (KG)" value= "<?php echo $d['jumlah_kg3'];?>">
					  					  
                      <input readonly class="form-control" id="harga_perbarang3" name="harga_perbarang3" placeholder="Harga Satuan Barang" value= "<?php echo $d['harga_perbarang3'];?>">
                  	  </div>
						
				   	   <div class="form-group">
                       <label for="exampleInputEmail1">Total Harga</label>
                       <input readonly class="form-control" id="total_harga" name="total_harga" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['total_harga'];?>">
                       </div>
				  		
				  		<div class="form-group">
                       <label for="exampleInputEmail1">PPN</label>
                       <input readonly class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['ppn'];?>">
                       </div>
				  
				  		<div class="form-group">
                       <label for="exampleInputEmail1">Grand Total</label>
                       <input readonly class="form-control" id="grand_total" name="grand_total" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['grand_total'];?>">
                       </div>
				  
	 					 <div class="form-group">
                       <label for="exampleInputEmail1">Jumlah Bayar</label>
                       <input readonly class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"value= "<?php echo $d['jumlah_bayar'];?>">
                       </div>
	  
	  					 <div class="form-group">
                       <label for="exampleInputEmail1">Sisa Hutang</label>
                       <input readonly class="form-control" id="sisa_hutang" name="sisa_hutang" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['sisa_hutang'];?>">
                       </div>
				  
					  
					   <script>
						function sum() {
							var txtFirstNumberValue = document.getElementById('jumlah_barang').value;
      						var txtSecondNumberValue = document.getElementById('jumlah_perkilo').value;
							var txt4=document.getElementById('harga_perbarang').value;
							var txt5=document.getElementById('total_harga').value;
							var txt6=document.getElementById('grand_total').value;
							var txt7=document.getElementById('ppn').value;
							var txt8=document.getElementById('jumlah_bayar').value;
							var txt9=document.getElementById('sisa_hutang').value;
							
							var result1 = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah_kg').value = result1;
							}
							
							var result2 = parseInt(txtFirstNumberValue) * parseInt(txt4);
      						if (!isNaN(result2)) {
         					document.getElementById('total_harga').value = result2;
							}
							
							var result3 = parseInt(txt5) * 0.1;
      						if (!isNaN(result3)) {
         					document.getElementById('ppn').value = result3;
							}
							
							var result4 = parseInt(txt5) + parseInt(txt7);
      						if (!isNaN(result4)) {
         					document.getElementById('grand_total').value = result4;
							}
							
							var result5 = parseInt(txt6) - parseInt(txt8);
      						if (!isNaN(result5)) {
         					document.getElementById('sisa_hutang').value = result5;
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

              <button type="submit" name = 'update' class="btn btn-info">Update</button>
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
      // PROSES EDIT DATA PRODUK //
      case 'edit1':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE produk SET no_po='$_POST[no_po]',no_inv='$_POST[no_inv]',jumlah_barang='$_POST[jumlah_barang]',jumlah_perkilo='$_POST[jumlah_perkilo]',jumlah_kg='$_POST[jumlah_kg]',harga_perbarang='$_POST[harga_perbarang]',total_harga='$_POST[total_harga]',ppn='$_POST[ppn]',grand_total='$_POST[grand_total]',jumlah_bayar='$_POST[jumlah_bayar]',sisa_hutang='$_POST[sisa_hutang]',tglmasuk='$_POST[tglmasuk]'WHERE id_produk='$_POST[id_produk]'");
                echo "<script>window.location='home.php?pg=produk&act=view'</script>";
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
                      <label for="exampleInputEmail1">Nomor PO</label>
                      <input readonly class="form-control" id="no_po" name="no_po" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_po'];?>">
                    </div>
					
                     <div class="form-group">
                      <label for="exampleInputEmail1">No Inv</label>
                      <input readonly class="form-control" id="no_inv" name="no_inv" placeholder="nomor Invoice" 
					  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_inv'];?>">
                    </div>
						 
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input readonly class="form-control" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tglmasuk'];?>">
                    </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label>
                      <input readonly class="form-control" id="nama" name="nama"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_vendor'];?>">
                    </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input readonly class="form-control" id="alamat" name="alamat"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kota</label>
                       <input readonly class="form-control" id="kota" name="kota" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['kota'];?>">
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">NO Telepon</label>
                       <input readonly  class="form-control" id="telepon" name="telepon" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['telepon'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PIC</label>
                     <input readonly  class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['pic'];?>">
                    </div>
					  					  
                  
                 		<div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                     <input readonly  class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_rm1'];?>">
                    	</div>
					  <input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Jumlah Barang" value= "<?php echo $d['jumlah_barang1'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Jumlah Berat Satuan Barang" value= "<?php echo $d['jumlah_perkilo1'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)" value= "<?php echo $d['jumlah_kg1'];?>">
					  					  
                      <input readonly class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" value= "<?php echo $d['jumlah_perbarang1'];?>">
                  	  </div>
				  
				  
				  		<div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                     <input readonly  class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_rm2'];?>">
                    	</div>
					  <input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Jumlah Barang" value= "<?php echo $d['jumlah_barang2'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Jumlah Berat Satuan Barang" value= "<?php echo $d['jumlah_perkilo2'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)" value= "<?php echo $d['jumlah_kg2'];?>">
					  					  
                      <input readonly class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" value= "<?php echo $d['jumlah_perbarang2'];?>">
                  	  </div>
		
		 			 <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                     <input readonly  class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_rm3'];?>">
                    	</div>
					  <input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Jumlah Barang" value= "<?php echo $d['jumlah_barang3'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Jumlah Berat Satuan Barang" value= "<?php echo $d['jumlah_perkilo3'];?>">
					 				 
                      <input readonly class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)" value= "<?php echo $d['jumlah_kg3'];?>">
					  					  
                      <input readonly class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" value= "<?php echo $d['jumlah_perbarang3'];?>">
                  	  </div>
						
				   	   <div class="form-group">
                       <label for="exampleInputEmail1">Total Harga</label>
                       <input readonly class="form-control" id="total_harga" name="total_harga" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['total_harga'];?>">
                       </div>
				  		
				  		<div class="form-group">
                       <label for="exampleInputEmail1">PPN</label>
                       <input readonly class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['ppn'];?>">
                       </div>
				  
				  		<div class="form-group">
                       <label for="exampleInputEmail1">Grand Total</label>
                       <input type="text" class="form-control" id="grand_total" name="grand_total" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['grand_total'];?>">
                       </div>
				  
	 					 <div class="form-group">
                       <label for="exampleInputEmail1">Jumlah Bayar</label>
                       <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"value= "<?php echo $d['jumlah_bayar'];?>">
                       </div>
	  
	  					 <div class="form-group">
                       <label for="exampleInputEmail1">Sisa Hutang</label>
                       <input type="text" class="form-control" id="sisa_hutang" name="sisa_hutang" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['sisa_hutang'];?>">
                       </div>
				  
  
					   </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->
	</section>
</div>


   
    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM verifikasipo WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=verifikasipo&act=view'</script>";
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