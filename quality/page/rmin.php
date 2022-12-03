
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
        <h1>Checking RM </h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Checking RM   
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=rmin&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
	   </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="771" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="66">No</th>
                        <th width="136">ID Formula</th>
						<th width="305">Nama Produk</th>
						<th width="305">Nama Tepung</th>
                          <th width="50">Edit</th>
						  <th width="89">Hapus Data</th>
						 <th width="97">Cetak</th>
						  </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM approval_rm order by no asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						
				
				<td><?php echo "$r[no_form]"?></td>
						<td style="text-transform: uppercase"><?php echo "$r[nm_fg]"?></td>
							<td><?php echo "$r[r1]"?></td>
						<td><a href="?pg=rmin&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
						 <td><a href="?pg=rmin&act=delete&no=<?php echo $r['no']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Jika Anda Menghapusnya maka nama <?php echo "$r[nm_fg]"?>  di data stok Finish good akan terhapus juga. Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							<td><a href="cetak_dataformula.php?no=<?php echo $r['no']?>"> <button type="button" class="btn bg-blue">
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
                $query = mysql_query("INSERT INTO approval_rm VALUES ('','$_POST[kode]','$_POST[tgl]','$_POST[no_po]','$_POST[nama_rm1]','$_POST[jumlah_barang1]','$_POST[berita1]','$_POST[status1]','$_POST[nama_rm2]','$_POST[jumlah_barang2]','$_POST[berita2]','$_POST[status2]','$_POST[nama_rm3]','$_POST[jumlah_barang3]','$_POST[berita3]','$_POST[status3]')");
		  
		      
		  		
		  	
		        echo "<script>window.location='home.php?pg=rmin&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Checking RM</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Checking RM</a></li>
            <li class="active">Tambah Data Checking</li>
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
					     <?php $kd_trans= kd_qa_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Transaksi</label>
                      <input type="text" class="form-control" id="kode" value="<?php echo $kd_trans;?>" name="kode"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="kode" value="<?php echo $kd_trans;?>" name="kode"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   
						
					
					  
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Periksa </label>
                    <input type="date" class="form-control id="tgl" name="tgl" placeholder="Input Tanggal" required data-fv-notempty-message="Tidak boleh kosong">
                  </div>
					
					                   
                      <div class="form-group">
                      <label for="exampleInputEmail1">No PO</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_po" id="no_po" onchange="changeValue(this.value)" >
					<option value=''>-Pilih PO-</option>
					<?php 
					$result = mysql_query("select * from produk");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_po'] . '">' . $row['no_po'] . '</option>';    
$jsArray .= "frm['" . $row['no_po'] . "'] = {

nama_rm1:'".addslashes($row['nama_rm1'])."',
jumlah_barang1:'".addslashes($row['jumlah_barang1'])."',


nama_rm2:'".addslashes($row['nama_rm2'])."',
jumlah_barang2:'".addslashes($row['jumlah_barang2'])."',


nama_rm3:'".addslashes($row['nama_rm3'])."',
jumlah_barang3:'".addslashes($row['jumlah_barang3'])."',


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					
					
                    
					    <div><label> Jumlah Barang yang dibeli (SAK)1</label>
						<input readonly class="form-control" id="nama_rm1" name="nama_rm1" required data-fv-notempty-message="Tidak boleh kosong">
						
                      <input readonly class="form-control" id="jumlah_barang1" name="jumlah_barang1"  required data-fv-notempty-message="Tidak boleh kosong">

                      <input type="text" class="form-control" id="berita1" name="berita1" placeholder="keterangan">
					
					<div class="form-group">
                    
                      <select class="form-control select2" name="status1" style="width: 100%;"  >
                        <option value="">--Status Barang--</option>
                        <option value="1">Accept</option>
                        <option value="0">Reject</option>
                      </select>
                  </div>
					  </div>
				
					<p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					
					  <div class="form-group">
					<div><label> Jumlah Barang yang dibeli (SAK)2</label>
					  <input readonly class="form-control" id="nama_rm2" name="nama_rm2" >
                      <input readonly class="form-control" id="jumlah_barang2" name="jumlah_barang2">
					 
                      <input type="text" class="form-control" id="berita2" name="berita2" placeholder="keterangan">
					
					<div class="form-group">
                    
                      <select class="form-control select2" name="status2" style="width: 100%;">
                        <option value="">--Status Barang--</option>
                        <option value="1">Accept</option>
                        <option value="0">Reject</option>
                      </select>
                  </div>
					  </div>
					  
					  <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
					
					<div><label> Jumlah Barang yang dibeli (SAK)3</label>
						<input readonly class="form-control" id="nama_rm3" name="nama_rm3">
                      <input readonly class="form-control" id="jumlah_barang3" name="jumlah_barang3">
					  
                      <input type="text" class="form-control" id="berita3" name="berita3" placeholder="keterangan">
					
					<div class="form-group">
                    
                      <select class="form-control select2" name="status3" style="width: 100%;" >
                        <option value="">--Status Barang--</option>
                        <option value="1">Accept</option>
                        <option value="0">Reject</option>
                      </select>
                  </div>
					  </div>
					 
					  </div>
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		
		document.getElementById('nama_rm1').value = frm[no_form].nama_rm1; 
		document.getElementById('jumlah_barang1').value = frm[no_form].jumlah_barang1;
		
		
		document.getElementById('nama_rm2').value = frm[no_form].nama_rm2; 
		document.getElementById('jumlah_barang2').value = frm[no_form].jumlah_barang2;
		
		
		document.getElementById('nama_rm3').value = frm[no_form].nama_rm3; 
		document.getElementById('jumlah_barang3').value = frm[no_form].jumlah_barang3;
		
		
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM formula where no='$_GET[no]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE formula SET no_form='$_POST[no_form]',nm_fg='$_POST[nm_fg]',tgl='$_POST[tgl]',r1='$_POST[r1]',rm1='$_POST[rm1]',r2='$_POST[r2]',rm2='$_POST[rm2]',r3='$_POST[r3]',rm3='$_POST[rm3]',r4='$_POST[r4]',rm4='$_POST[rm4]',r5='$_POST[r5]',rm5='$_POST[rm5]',r6='$_POST[r6]',rm6='$_POST[rm6]',r7='$_POST[r7]',rm7='$_POST[rm7]',r8='$_POST[r8]',rm8='$_POST[rm8]',r9='$_POST[r9]',rm9='$_POST[rm9]',r10='$_POST[r10]',rm10='$_POST[rm10]',r11='$_POST[r11]',rm11='$_POST[rm11]',r12='$_POST[r12]',rm12='$_POST[rm12]',r13='$_POST[r13]',rm13='$_POST[rm13]' WHERE no='$_POST[no]'");
                echo "<script>window.location='home.php?pg=rmin&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Checking RM</h1>
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
                      <label for="exampleInputEmail1">Nomor Formula</label>
                      <input readonly class="form-control" id="no_form" name="no_form" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_form'];?>">
                    </div>
					  <div class="form-group">
					 <input type="hidden" class="form-control" id="no" name="no" placeholder="Nomor Planing" value="<?php echo $d['no'];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    	</div				 
						
					    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk </label>
                      <input "text" class="form-control" id="nm_fg" name="nm_fg"  style="text-transform:uppercase" value="<?php echo $d['nm_fg'];?>" >
                    </div>
					  
					  
					    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal </label>
                      <input "text" class="form-control" id="tgl" name="tgl"  style="text-transform:uppercase" value=" <?php $tgl=date('l, d-m-Y');
echo $tgl;?> ">
                    </div>
					  
					 
                      <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r1'];?>" >
					  <div class="form-group">
					    <select class="form-control select2" name="r1" id="r1" style="width: 100%;" value="<?php echo $d['r1'];?>" required data-fv-notempty-message="Tidak boleh kosong" >
						 <option value="">pilih bahan baku</option> 
                        <option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu f10">terigu f10</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						<option value="terigu tambang">terigu tambang</option>
						<option value="terigu falcon kuning">terigu falcon kuning</option>
						<option value="terigu serdadu kuning">terigu serdadu kuning</option>
						<option value="terigu serdadu jingga">terigu serdadu jingga</option>
						<option value="terigu roket">terigu roket</option>
						<option value="terigu jawara">terigu jawara</option>
						<option value="terigu payung">terigu payung</option>
					  </select>
                      <input "text" class="form-control" id="rm1" name="rm1" value="<?php echo $d['rm1'];?>" placeholder="hanya untuk terigu 1"  >
                    </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r2'];?>" >
                      <select class="form-control select2" name="r2" id="r2" style="width: 100%;" value="<?php echo $d['r2'];?>"  > <option value="">pilih bahan baku</option> 
                         <option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu f10">terigu f10</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						<option value="terigu tambang">terigu tambang</option>
						<option value="terigu falcon kuning">terigu falcon kuning</option>
						<option value="terigu serdadu kuning">terigu serdadu kuning</option>
						<option value="terigu serdadu jingga">terigu serdadu jingga</option>
						<option value="terigu roket">terigu roket</option>
						<option value="terigu jawara">terigu jawara</option>
						<option value="terigu payung">terigu payung</option>
						 </select>
                      <input "text" class="form-control" id="rm2" name="rm2" value="<?php echo $d['rm2'];?>" placeholder="hanya untuk terigu2" >
                    </div>
					 
					<div class="form-group">
					  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r3'];?>" >
                    <select class="form-control select2" name="r3"id="r3" value="<?php echo $d['r3'];?>" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                       <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm3" name="rm3" value="<?php echo $d['rm3'];?>" >
                    </div>
					 
					<div class="form-group">
					  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r4'];?>" >
					   <select class="form-control select2" name="r4" id="r4" style="width: 100%;" value="<?php echo $d['r4'];?>" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm4" name="rm4" value="<?php echo $d['rm4'];?>"  >
                    </div>
					  
					<div class="form-group">
					  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r5'];?>" >
					  <select class="form-control select2" name="r5" id="r5" value="<?php echo $d['r5'];?>" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                       <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm5" name="rm5" value="<?php echo $d['rm5'];?>"  >
                    </div>
					  
					<div class="form-group">
						  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r6'];?>" >
					   <select class="form-control select2" name="r6" id="r6" value="<?php echo $d['r6'];?>" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                       <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm6" name="rm6"  value="<?php echo $d['rm6'];?>" >
                    </div>
					  
					<div class="form-group">
					  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r7'];?>" >
					   <select class="form-control select2" name="r7" id="r7" value="<?php echo $d['r7'];?>" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">pilih bahan baku</option> 
						<option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm7" name="rm7" value="<?php echo $d['rm7'];?>"  >
                    </div>
					  
					  <div class="form-group">
						   <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r8'];?>" >
					  <select class="form-control select2" name="r8" id="r8" value="<?php echo $d['r8'];?>" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                     <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm8" name="rm8" value="<?php echo $d['rm8'];?>"  >
                    </div>
					  
					<div class="form-group">
					  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r9'];?>" >
					   <select class="form-control select2" name="r9" id="r9" style="width: 100%;" value="<?php echo $d['r9'];?>"  >
                        <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm9" name="rm9" value="<?php echo $d['rm9'];?>"  >
                    </div>
					  
					  <div class="form-group">
						   <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r10'];?>" >
					   <select class="form-control select2" name="r10" id="r10" style="width: 100%;"  value="<?php echo $d['r10'];?>" >
                      <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm10" name="rm10" value="<?php echo $d['rm10'];?>"  >
                    </div>
					  
					    <div class="form-group">
						  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r11'];?>" >
					   <select class="form-control select2" name="r11" id="r11" style="width: 100%;" value="<?php echo $d['r11'];?>"  >
                        <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm11" name="rm11"  value="<?php echo $d['rm11'];?>" >
                    </div>
					  
					     <div class="form-group">
						  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r12'];?>" >
					   <select class="form-control select2" name="r12" id="r12" style="width: 100%;" value="<?php echo $d['r12'];?>" >
                      <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm12" name="rm12" value="<?php echo $d['rm12'];?>"  >
                    </div>
					  
					     <div class="form-group">
						  <input readonly class="form-control"value="Data Sebelumnya adalah <?php echo $d['r13'];?>" >
					   <select class="form-control select2" name="r13" id="r13" style="width: 100%;" value="<?php echo $d['r13'];?>"  >
                       <option value="">pilih bahan baku</option> <option value="rm-03 gula">gula</option>
                        <option value="rm-04 calcium">calcium</option>
						<option value="rm-05 instant plus">instant plus</option>
						<option value="rm-06 ragi">ragi</option>
						<option value="rm-07 softening">softening</option>
						<option value="rm-08 titanium">titanium</option>
						<option value="rm-09 rj/wrn/02b">rj/wrn/02b</option>
						<option value="rm-10 margarine">margarine</option>
						<option value="rm-11 premix1">premix1</option>
						<option value="rm-12 premix2">premix2</option>
						<option value="rm-13 premix3">premix3</option>
						<option value="rm-14 premix4">premix4</option>
						<option value="rm-15 premix5">premix5</option>
						<option value="rm-16 premix6">premix6</option>
						<option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-18 hd polos 46x69x50m">hd polos 47x70x50m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-20 pe kuning 46x69x30m">pe kuning 46x69x30m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						<option value="rm-22 pe biru 46x69x30m">pe biru 46x69x30m</option>
						<option value="rm-23 label">label</option>
						<option value="rm-24 benang">benang</option></select>
                      <input "text" class="form-control" id="rm13" name="rm13" value="<?php echo $d['rm13'];?>"  >
                    </div>
					  
					   
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

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM approval_rm WHERE id='$_GET[id]'");
	 
      echo "<script>window.location='home.php?pg=rmin&act=view'</script>";
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