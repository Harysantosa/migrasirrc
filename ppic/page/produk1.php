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
        <h1>Data Kedatangan Barang</h1>
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
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="1253" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="22">No</th>
                        <th width="63">Nomor PO</th>
						 <th width="92">Nomor INV</th>
                        <th width="92">Nama Vendor</th>
						<th width="97">Jenis Barang</th>
						<th width="65">Merek Barang</th>
						<th width="96">Jumlah Barang</th>  
						<th width="52">Jumlah (KG)</th>
						<th width="155">Harga Perbarang</th>
						<th width="82">Total Harga</th>
						<th width="32">PPN</th>
						<th width="87">Grand Total</th>
                        <th width="70">Jml Bayar</th>
                        <th width="95">Sisa Hutang</th>
						 <th width="93">Tanggal</th>
						  <th width="28">Edit</th>
						  <th width="56">Hapus</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM produk order by id_produk asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[no_po]"?></td>
						<td><?php echo "$r[no_inv]"?></td>
						<td><?php echo "$r[nama_vendor]"?></td>
                        <td><?php echo "$r[nama_rm]"?></td>
                        <td><?php echo "$r[nama_merek]"?></td>
                        <td><?php echo "$r[jumlah_barang]"?></td>
                        <td><?php echo "$r[jumlah_kg]"?></td>
                        <td><?php echo "Rp.". number_format("$r[harga_perbarang]",'0','.','.')?></td>
						<td><?php echo "Rp.". number_format("$r[total_harga]",'0','.','.')?></td>
                        <td><?php echo "Rp.". number_format("$r[ppn]",'0','.','.')?></td>
                        <td><?php echo "Rp.". number_format("$r[grand_total]",'0','.','.')?></td>
                        <td><?php echo "Rp.". number_format("$r[jumlah_bayar]",'0','.','.')?></td>
                        <td><?php echo "Rp.". number_format("$r[sisa_hutang]",'0','.','.')?></td>
                        <td><?php echo "$r[tglmasuk]"?></td>
                        <td><a href="?pg=produk&act=edit&id=<?php echo $r['id_produk']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=produk&act=delete&id=<?php echo $r['id_produk']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>
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
                $query = mysql_query("INSERT INTO produk VALUES ('','$_POST[no_po]','$_POST[no_inv]','$_POST[nama_vendor]','$_POST[nama_rm]','$_POST[nama_merek]','$_POST[jumlah_barang]','$_POST[jumlah_perkilo]','$_POST[jumlah_kg]','$_POST[harga_perbarang]','$_POST[total_harga]','$_POST[ppn]','$_POST[grand_total]','$_POST[jumlah_bayar]','$_POST[sisa_hutang]','$_POST[tglmasuk]')");
                echo "<script>window.location='home.php?pg=produk&act=view'</script>";
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
                      <label for="exampleInputEmail1">No Invoice</label>
                      <input type="text" class="form-control" id="no_inv"  name="no_inv" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
                     <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label> <br>
                      <select class="form-control select2" id= "nama_vendor" name="nama_vendor" style="width: 100%;">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM vendor ORDER BY id");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['id']?>"><?php echo $r['nama'] ?></option>
                      <?php
                    }
                    ?>
						    </optgroup>
                      </select>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang</label> <br>
                      <select class="form-control select2" id="rm" name="nama_rm" style="width: 100%;">
                      <option value="">--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM rm ORDER BY nama_rm");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['id_rm']; ?>">
                        <?php echo $row['nama_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Merek Barang</label> <br>
                      <select class="form-control select2" id="merek" name="nama_merek" style="width: 100%;">
                      <option value="">--- Silahkan Pilih ---</option>
                 <?php
                $query = mysql_query("SELECT
                                    *
                                  FROM
                                    merek
                                    INNER JOIN rm ON merek.id_rm_fk = rm.id_rm ORDER BY nama_rm");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option id="kota" class="<?php echo $row['id_rm']; ?>" value="<?php echo $row['id_merek']; ?>">
                        <?php echo $row['nama_merek']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					  
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Barang</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Berat Per Barang</label>
                      <input type="text" class="form-control" id="jumlah_perkilo" name="jumlah_perkilo" placeholder="Jumlah Berat Satuan Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Total KG</label>
                      <input readonly class="form-control" id="jumlah_kg" name="jumlah_kg" placeholder="Total (KG)" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Harga Perbarang</label>
                      <input type="text" class="form-control" id="harga_perbarang" name="harga_perbarang" placeholder="Harga" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Total Harga Barang</label>
                      <input readonly class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PPN</label>
                      <input readonly class="form-control" id="ppn" name="ppn" placeholder="Pajak" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Grand Total</label>
                      <input readonly class="form-control" id="grand_total" name="grand_total" placeholder="Grand Total" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah dibayar</label>
                      <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Sisa Hutang</label>
                      <input readonly class="form-control" id="sisa_hutang" name="sisa_hutang" placeholder="Sisa Hutang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum();">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input type=date input class="form-control" id="date" name="tglmasuk" placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
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

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
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
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE produk SET no_inv='$_POST[no_inv]',nama_vendor='$_POST[nama_vendor]',jenis_barang='$_POST[jenis_barang]',merk_barang='$_POST[merk_barang]',jumlah_barang='$_POST[jumlah_barang]',berat_kg='$_POST[berat_kg]',jumlah_kg='$_POST[jumlah_kg]',harga_perbarang='$_POST[harga_perbarang]',total_harga='$_POST[total_harga]',ppn='$_POST[ppn]',grand_total='$_POST[grand_total]',jumlah_bayar='$_POST[jumlah_bayar]',sisa_hutang='$_POST[sisa_hutang]',tglmasuk='$_POST[tglmasuk]'WHERE id_produk='$_POST[id]'");
                echo "<script>window.location='home.php?pg=produk&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kedatangan Barang</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Produk</a></li>
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
                      <label for="exampleInputEmail1">Nomor Inv</label>
                      <input type="text" class="form-control" id="no_inv" name="no_inv" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_inv'];?>">
                    </div>
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_produk'];?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label>
                      <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Nama Vendor" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_vendor'];?>">
                    </div>
					
					<div class="form-group">Jenis Barang
					  <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" placeholder="Jenis Barang" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['jenis_barang'];?>">
                    </div>  
						
                    <div class="form-group">
                      <label for="exampleInputEmail1">Merek Barang</label>
                      <input type="text" class="form-control" id="merk_barang" name="merk_barang" placeholder="Merek Barang" value= "<?php echo $d['merk_barang'];?>" onKeyUp="sum();">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Barang</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" 
					  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['jumlah_barang'];?>" onKeyUp="sum();">
                    </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Berat Per Barang</label>
                      <input type="text" class="form-control" id="berat_kg" name="berat_kg" placeholder="Berat Per Kilo"  value= "<?php echo $d['berat_kg'];?>" onKeyUp="sum();">
                    </div>
					 
					  <div class="form-group">
                      <label for="exampleInputEmail1">Total KG</label>
                      <input type readonly class="form-control" id="jumlah_kg" name="jumlah_kg" placeholder="Total KG"  value= "<?php echo $d['jumlah_kg'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Harga Perbarang</label>
                      <input type="text" class="form-control" id="harga_perbarang" name="harga_perbarang" placeholder="Harga Perbarang"  value= "<?php echo $d['harga_perbarang'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Total Harga Barang</label>
                      <input type readonly class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga"  value= "<?php echo $d['total_harga'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PPN</label>
                      <input type readonly  class="form-control" id="ppn" name="ppn" placeholder="Pajak 10%"  value= "<?php echo $d['ppn'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Grand Total</label>
                      <input type readonly class="form-control" id="grand_total" name=grand_total placeholder="Grand Total"  value= "<?php echo $d['grand_total'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Dibayar</label>
                      <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar"  value= "<?php echo $d['jumlah_bayar'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Sisa Hutang</label>
                      <input type="text" class="form-control" id="sisa_hutang" name="sisa_hutang" placeholder="Sisa Hutang"  value= "<?php echo $d['sisa_hutang'];?>" onKeyUp="sum();">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Inputan</label>
                      <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" placeholder="MM/DD/YYY"  value= "<?php echo $d['tglmasuk'];?>">
                    </div>
					  
					  <script>
						function sum() {
							var txt10=document.getElementById('jumlah_barang').value;
      						var txt11=document.getElementById('berat_kg').value;
							var txt12=document.getElementById('harga_perbarang').value;
							var txt13=document.getElementById('total_harga').value;
							var txt14=document.getElementById('grand_total').value;
							var txt15=document.getElementById('ppn').value;
							var txt16=document.getElementById('jumlah_bayar').value;
							var txt17=document.getElementById('sisa_hutang').value;
							
							var result6 = parseInt(txt10) * parseInt(txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('jumlah_kg').value = result6;
							}
							
							var result7 = parseInt(txt10) * parseInt(txt12);
      						if (!isNaN(result7)) {
         					document.getElementById('total_harga').value = result7;
							}
							
							var result8 = parseInt(txt13) * 0.1;
      						if (!isNaN(result8)) {
         					document.getElementById('ppn').value = result8;
							}
							
							var result9 = parseInt(txt13) + parseInt(txt15);
      						if (!isNaN(result9)) {
         					document.getElementById('grand_total').value = result9;
							}
							
							var result10 = parseInt(txt14) - parseInt(txt16);
      						if (!isNaN(result10)) {
         					document.getElementById('sisa_hutang').value = result10;
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

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
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