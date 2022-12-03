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
        <h1> Verifikasi RM IN</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Verifikasi RM IN
          </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=verifikasirm&act=view"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data verifikasi</i></button> </a>
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
						<th width="43">Edit</th>
						<th width="43">Hapus Data</th>
						 
						
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
include("indo.php");
                    $tampil=mysql_query("SELECT * FROM produk order by id_produk asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo TanggalIndo($r['tglmasuk'])?></td>
						<td><?php echo "$r[no_po]"?></td>
						<td><?php echo "$r[nama]"?></td>
					    <td><a href="?pg=verifikasirm&act=edit&id_produk=<?php echo $r['id_produk']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
						
                        <td><a href="?pg=verifikasirm&act=delete&id_produk=<?php echo $r['id_produk']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
						  
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk where id_produk='$_GET[id_produk]'"));
            if (isset($_POST['update'])) {
			
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
               
			    $query .= mysql_query("INSERT INTO rmin VALUES ('','$_POST[no_po]','$_POST[nama]','$_POST[nama_rm1]','$_POST[jumlah_barang1]','$_POST[jumlah_kg1]',
				'$_POST[sisajumlah_barang1]','$_POST[sisajumlah_perkilo1]','$_POST[terima_kg1]','$_POST[terima_barang1]','$_POST[nama_rm2]','$_POST[jumlah_barang2]',
				'$_POST[jumlah_kg2]','$_POST[sisajumlah_barang2]','$_POST[sisajumlah_perkilo2]','$_POST[terima_kg2]','$_POST[terima_barang2]','$_POST[nama_rm3]',
				'$_POST[jumlah_barang3]','$_POST[jumlah_kg3]','$_POST[sisajumlah_barang3]','$_POST[sisajumlah_perkilo3]','$_POST[terima_kg3]','$_POST[terima_barang3]',
				'$_POST[tglmasuk]','$_POST[tgldatang]')");
				
				
			    echo "<script> alert('data berhasil disimpan !');window.location='home.php?pg=verifikasirm&act=view'</script>";
             
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
                      <label for="exampleInputEmail1">Tanggal PO</label>
                      <input readonly class="form-control" required data-fv-notempty-message="Tidak boleh kosong" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" value="<?php echo $d['tglmasuk'];?>" >
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Datang Barang</label>
                      <input readonly class="form-control" required data-fv-notempty-message="Tidak boleh kosong" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY" value="<?php echo $d['tglmasuk'];?>" >
                    </div>
					
				   <div class="form-group">
				   <label for="exampleInputEmail1">Nama Vendor</label>
				  	 <input readonly class="form-control" id="nama" name="nama"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();" value="<?php echo $d['nama'];?>" >
                      <input type="hidden" class="form-control" id="alamat" name="alamat"  placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();" value="<?php echo $d['alamat'];?>" >
                      <input type="hidden" class="form-control" id="kota" name="kota" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();" value="<?php echo $d['kota'];?>" >
                      <input type="hidden"  class="form-control" id="telepon" name="telepon" placeholder="Jumlah Barang"  onkeyup="sum();" value="<?php echo $d['telepon'];?>" >
                     <input type="hidden" class="form-control" id="pic" name="pic" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();" value="<?php echo $d['pic'];?>" >
                    </div>
					  					  
                  
                 		<div class="form-group">
                        <label for="exampleInputEmail1">Jenis Barang ke-1</label> <br>
						<input readonly class="form-control" id="nama_rm1" name="nama_rm1" placeholder="Harga Satuan Barang" onKeyUp="sum1();" value="<?php echo $d['nama_rm1'];?>" >
                        <input type="hidden" class="form-control" id="harga_perbarang1" name="harga_perbarang1" placeholder="Harga Satuan Barang" onKeyUp="sum1();" value="<?php echo $d['harga_perbarang1'];?>" >
					  	
					    <input type="hidden"  class="form-control" id="jumlah_perkilo1" name="jumlah_perkilo1" placeholder="Harga Satuan Barang" onKeyUp="sum1();" value="<?php echo $d['jumlah_perkilo1'];?>" >
					    <input type="hidden" class="form-control" id="total1" name="total1" placeholder="Harga Satuan Barang" onKeyUp="sum1();" value="<?php echo $d['total1'];?>" >
						<label for="exampleInputEmail1">Jumlah Barang yang dipesan</label> <br>
						<input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  placeholder="Input Jumlah Barang" onKeyUp="sum1();" value="<?php echo $d['jumlah_barang1'];?>" >
						<input readonly  class="form-control" id="jumlah_kg1"name="jumlah_kg1"   placeholder="Total (KG)"  onChange="sum1();"  value="<?php echo $d['jumlah_kg1'];?>" >
						<label for="exampleInputEmail1">Outstanding PO</label> <br>
						<input readonly class="form-control" id="sisajumlah_barang1" name="sisajumlah_barang1"  placeholder="Input Jumlah Barang" onKeyUp="sum1();"  >
						<input readonly class="form-control" id="sisajumlah_perkilo1"name="sisajumlah_perkilo1" placeholder="Total (KG)"  onChange="sum1();"  >
						<input readonly class="form-control" id="terima_kg1" name="terima_kg1"  placeholder="Input Jumlah Barang" onKeyUp="sum1();">
					    <input type="text" class="form-control" id="terima_barang1" name="terima_barang1"  placeholder="Input Jumlah Barang" onKeyUp="sum1();">					  
                        
					  </div>
				  
				  
				  		<div class="form-group">
                        <label for="exampleInputEmail2">Jenis Barang ke-2</label> <br>
						<input readonly class="form-control" id="nama_rm2" name="nama_rm2" placeholder="Harga Satuan Barang" onKeyUp="sum2();" value="<?php echo $d['nama_rm2'];?>" >
                        <input type="hidden" class="form-control" id="harga_perbarang2" name="harga_perbarang2" placeholder="Harga Satuan Barang" onKeyUp="sum2();" value="<?php echo $d['harga_perbarang2'];?>" >
					  	<label for="exampleInputEmail2">Berat Barang</label> <br>
					    <input readonly  class="form-control" id="jumlah_perkilo2" name="jumlah_perkilo2" placeholder="Harga Satuan Barang" onKeyUp="sum2();" value="<?php echo $d['jumlah_perkilo2'];?>" >
					    <input type="hidden" class="form-control" id="total2" name="total2" placeholder="Harga Satuan Barang" onKeyUp="sum2();" value="<?php echo $d['total2'];?>" >
						<label for="exampleInputEmail2">Jumlah Barang yang dipesan</label> <br>
						<input readonly class="form-control" id="jumlah_barang2" name="jumlah_barang2"  placeholder="Input Jumlah Barang" onKeyUp="sum2();" value="<?php echo $d['jumlah_barang2'];?>" >
						<input readonly  class="form-control" id="jumlah_kg2"name="jumlah_kg2"   placeholder="Total (KG)"  onChange="sum2();"  value="<?php echo $d['jumlah_kg2'];?>" >
						<label for="exampleInputEmail2">Outstanding PO</label> <br>
						<input readonly class="form-control" id="sisajumlah_barang2" name="sisajumlah_barang2"  placeholder="Input Jumlah Barang" onKeyUp="sum2();"  >
						<input readonly class="form-control" id="sisajumlah_perkilo2"name="sisajumlah_perkilo2" placeholder="Total (KG)"  onChange="sum2();"  >
						<input readonly class="form-control" id="terima_kg2" name="terima_kg2"  placeholder="Input Jumlah Barang" onKeyUp="sum2();">
					    <input type="text" class="form-control" id="terima_barang2" name="terima_barang2"  placeholder="Input Jumlah Barang" onKeyUp="sum2();">					  
                        
					  </div>
					  
					  	<div class="form-group">
                        <label for="exampleInputEmail3">Jenis Barang ke-3</label> <br>
						<input readonly class="form-control" id="nama_rm3" name="nama_rm3" placeholder="Harga Satuan Barang" onKeyUp="sum3();" value="<?php echo $d['nama_rm3'];?>" >
                        <input type="hidden" class="form-control" id="harga_perbarang3" name="harga_perbarang3" placeholder="Harga Satuan Barang" onKeyUp="sum3();" value="<?php echo $d['harga_perbarang3'];?>" >
					  	<label for="exampleInputEmail3">Berat Barang</label> <br>
					    <input readonly  class="form-control" id="jumlah_perkilo3" name="jumlah_perkilo3" placeholder="Harga Satuan Barang" onKeyUp="sum3();" value="<?php echo $d['jumlah_perkilo3'];?>" >
					    <input type="hidden" class="form-control" id="total3" name="total3" placeholder="Harga Satuan Barang" onKeyUp="sum3();" value="<?php echo $d['total3'];?>" >
						<label for="exampleInputEmail3">Jumlah Barang yang dipesan</label> <br>
						<input readonly class="form-control" id="jumlah_barang3" name="jumlah_barang3"  placeholder="Input Jumlah Barang" onKeyUp="sum3();" value="<?php echo $d['jumlah_barang3'];?>" >
						<input readonly  class="form-control" id="jumlah_kg3"name="jumlah_kg3"   placeholder="Total (KG)"  onChange="sum3();"  value="<?php echo $d['jumlah_kg3'];?>" >
						<label for="exampleInputEmail3">Outstanding PO</label> <br>
						<input readonly class="form-control" id="sisajumlah_barang3" name="sisajumlah_barang3"  placeholder="Input Jumlah Barang" onKeyUp="sum3();"  >
						<input readonly class="form-control" id="sisajumlah_perkilo3"name="sisajumlah_perkilo3" placeholder="Total (KG)"  onChange="sum3();"  >
						<input readonly class="form-control" id="terima_kg3" name="terima_kg3"  placeholder="Input Jumlah Barang" onKeyUp="sum3();">
					    <input type="text" class="form-control" id="terima_barang3" name="terima_barang3"  placeholder="Input Jumlah Barang" onKeyUp="sum3();">					  
                        
					  </div>


  						<div class="form-group">
                    
                        <input type="hidden" class="form-control" id="harga" name="harga" placeholder="Double klik disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum4();" value="<?php echo $d['harga'];?>" >
                       </div>
				  
				     	<div class="form-group">
                       
                       <input type="hidden" class="form-control" id="diskon" name="diskon" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum4();" value="<?php echo $d['diskon'];?>" > 
                       </div>
					   
					    <div class="form-group">
                     
                       <input type="hidden"  class="form-control" id="jml_pajak" name="jml_pajak" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" value="<?php echo $d['jml_pajak'];?>" >
                       </div> 
					   
					   	<div class="form-group">
                      
                        <input type="hidden" class="form-control" id="total_harga" name="total_harga" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum4();" value="<?php echo $d['total_harga'];?>" >
                       </div>
				  			   	   	 
				  		
				       <div class="form-group">
                      
                        <input type="hidden" class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" value="<?php echo $d['ppn'];?>" >
                       </div>
				  
					 				  
				  		<div class="form-group">
                    
                        <input type="hidden" class="form-control" id="grand_total" name="grand_total" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" value="<?php echo $d['grand_total'];?>" >
                       </div>
				  
					  
					  
	 					 <div class="form-group">
                     
                       <input type="hidden" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum4();" value="<?php echo $d['jumlah_bayar'];?>" >
                       </div>
	  
					  
	 					
	  					 <div class="form-group">
                       
  					   <input type="hidden" class="form-control" id="sisa_hutang" name="sisa_hutang" required data-fv-notempty-message="Tidak boleh kosong"  placeholder="Jumlah Barang" onKeyUp="sum4();" value="<?php echo $d['sisa_hutang'];?>" >
                       </div>
					  <script>
						  function sum1() {
							var txt1 = document.getElementById('jumlah_perkilo1').value;
							var txt2 = document.getElementById('jumlah_barang1').value;
							var txt3 = document.getElementById('jumlah_kg1').value;
							var txt4 = document.getElementById('sisajumlah_barang1').value;
							var txt5 = document.getElementById('sisajumlah_perkilo1').value;
							var txt6 = document.getElementById('terima_barang1').value;
							var txt7 = document.getElementById('terima_kg1').value;
							
							var result1 = (txt2)-(txt6);
      						if (!isNaN(result1)) {
         					document.getElementById('sisajumlah_barang1').value = result1;
							}
							
							var result2 =(txt3)- ((txt6)*(txt1));
      						if (!isNaN(result2)) {
         					document.getElementById('sisajumlah_perkilo1').value = result2;
							}
							
							var result3 =(txt6)* (txt1);
      						if (!isNaN(result3)) {
         					document.getElementById('terima_kg1').value = result3;
							}
							
							}
							</script>
							
						<script>
						  function sum2() {
							var txt1 = document.getElementById('jumlah_perkilo2').value;
							var txt2 = document.getElementById('jumlah_barang2').value;
							var txt3 = document.getElementById('jumlah_kg2').value;
							var txt4 = document.getElementById('sisajumlah_barang2').value;
							var txt5 = document.getElementById('sisajumlah_perkilo2').value;
							var txt6 = document.getElementById('terima_barang2').value;
							var txt7 = document.getElementById('terima_kg2').value;
							
							var result1 = (txt2)-(txt6);
      						if (!isNaN(result1)) {
         					document.getElementById('sisajumlah_barang2').value = result1;
							}
							
							var result2 =(txt3)- ((txt6)*(txt1));
      						if (!isNaN(result2)) {
         					document.getElementById('sisajumlah_perkilo2').value = result2;
							}
							
							var result3 =(txt6)* (txt1);
      						if (!isNaN(result3)) {
         					document.getElementById('terima_kg2').value = result3;
							}
							
							}
							</script>

							<script>
						  function sum3() {
							var txt1 = document.getElementById('jumlah_perkilo3').value;
							var txt2 = document.getElementById('jumlah_barang3').value;
							var txt3 = document.getElementById('jumlah_kg3').value;
							var txt4 = document.getElementById('sisajumlah_barang3').value;
							var txt5 = document.getElementById('sisajumlah_perkilo3').value;
							var txt6 = document.getElementById('terima_barang3').value;
							var txt7 = document.getElementById('terima_kg3').value;
							
							var result1 = (txt2)-(txt6);
      						if (!isNaN(result1)) {
         					document.getElementById('sisajumlah_barang3').value = result1;
							}
							
							var result2 =(txt3)- ((txt6)*(txt1));
      						if (!isNaN(result2)) {
         					document.getElementById('sisajumlah_perkilo3').value = result2;
							}
							
							var result3 =(txt6)* (txt1);
      						if (!isNaN(result3)) {
         					document.getElementById('terima_kg3').value = result3;
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