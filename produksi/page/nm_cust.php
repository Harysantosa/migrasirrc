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
        <h1> Data Customer</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Customer</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href=""> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data Customer</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="424" height="73" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="22">No</th>
                        <th width="64">Id Customer</th>
                        <th width="94">Nama Customer</th>
						<th width="99">Alamat Customer</th>
						<th width="66">Harga</th>
						<th width="51">Lihat Formula</th>
						<th width="51">Hapus</th>
						<th width="51">Cetak</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM planprod GROUP by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[no_plan]"?></td>
						<td><?php echo TanggalIndo($r['tgl'])?></td>
                        <td><?php echo "$r[shift]"?></td>
                        <td><?php echo "$r[prod1]"?></td>
                        
						<td><a href=""><button type="button" class="btn bg-orange"><i class="fa fa-circle-o"></i></button></a></td>
							
						 <td><a href=""><button type="button" class="btn bg-orange"><i class="fa fa-trash-o"></i></button></a></td>
							
						 <td><a href="cetak_formula.php?id=<?php echo $r['id']?>"> <button type="button" class="btn print">
						<i class="fa print" target=_blank></i></button></a></td>
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
                $query = mysql_query("INSERT INTO planprod VALUES ('','$_POST[no_plan]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[prod1]','$_POST[terigu]','$_POST[gula]','$_POST[calcium]','$_POST[instant_plus]','$_POST[ragi]','$_POST[softening]','$_POST[titanium]','$_POST[sunset_yellow]','$_POST[margarine]','$_POST[premix1]','$_POST[premix2]','$_POST[premix3]','$_POST[premix4]','$_POST[premix5]')");
		              	  
		  
		  		$query .= mysql_query("INSERT INTO gudang_rm1 VALUES ('','$_POST[no_plan]','$_POST[tgl]','$_POST[prod1]','$_POST[batch]','$_POST[r1]','$_POST[terigu]','$_POST[r2]','$_POST[gula]','$_POST[r3]','$_POST[calcium]','$_POST[r4]','$_POST[instant_plus]','$_POST[r5]','$_POST[ragi]','$_POST[r6]','$_POST[softening]','$_POST[r7]','$_POST[titanium]','$_POST[r8]','$_POST[sunset_yellow]','$_POST[r9]','$_POST[margarine]','$_POST[r10]','$_POST[premix1]','$_POST[r11]','$_POST[premix2]','$_POST[r12]','$_POST[premix3]','$_POST[r13]','$_POST[premix4]','$_POST[r14]','$_POST[premix5]')");
                echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing</a></li>
            <li class="active">Tambah Data Planing</li>
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
					  
					   <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from planprod");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 3, "0", STR_PAD_LEFT);
                      $tahun = date('Y/m');
                      $kode_jadi = "SPS/PROD/$tahun/$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Plan Produksi</label>
                      <input type="text" class="form-control" id="no_plan" name="no_plan" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_plan" name="no_plan" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
						
					<div class="form-group">Tanggal Planing
                     <input type="date" class="form-control" id="tgl" name="tgl" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shift</label> 
                      <select class="form-control select2" name="shift" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div>
					  
                    <div class="form-group">Batch planing 1                    
                      <input type="text" class="form-control" id="batch1" name="batch1" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum">
                    </div>
					
					   <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Produk</label> <br>
                      <select class="form-control select2" name="prod1" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">--SIlahkan Pilih--</option>
					    <option value="Sapu Jagat Mix">Sapu Jagat Mix</option>
						<option value="Sapu Jagat White">sapu jagat white</option>
						<option value="Eco Royal Mix">Eco Royal Mix</option>
						<option value="Eco Royal White">Eco Royal White</option>
						<option value="Royal Mix">Royal Mix</option>
						<option value="Royal White">Royal White</option>
						<option value="Eco Raja Orange">Eco Raja Orange</option>
						<option value="Raja Mix">Raj Mix</option>
						<option value="Raja Orange"> Raja Orange</option>
						<option value="RYL BC 07">Royal BreadChrumb 07</option>
						<option value="RJ BC 01">Raja Breadchrumb 01</option>
						  
					  </select>
				    </div>
					 					  
					<div class="form-group">
                      <label for="exampleInputEmail1">Pilih Tepung</label> <br>
                      <select class="form-control select2" name="r1" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">--SIlahkan Pilih--</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						<option value="terigu tambang">terigu tambang</optio
					  ></select>
				    </div>
													
					<div class="form-group">Terigu
					<input readonly class="form-control" id="terigu" name="terigu" >
                    </div>
					
					<div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" value="gula pasir" >
						<input readonly class="form-control" id="gula" name="gula" >
                    </div>
					
					  <div class="form-group">
					 <input readonly class="form-control" id="r3" name="r3" value="calcium" >
                      <input readonly class="form-control" id="calcium" name="calcium" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r4" name="r4" value="instant plus" >
                      <input readonly class="form-control" id="instant_plus" name="instant_plus" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r5" name="r5" value="ragi" >
                        <input readonly class="form-control" id="ragi" name="ragi">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6" value="softening" >
                        <input readonly class="form-control" id="softening" name="softening">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r7" name="r7" value="titanium" >
                      <input readonly class="form-control" id="titanium" name="titanium" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8" value="sunset yellow" >
						  <input readonly class="form-control" id="sunset_yellow" name="sunset_yellow" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r9" name="r9" value="margarine" >
                      <input readonly class="form-control" id="margarine" name="margarine" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r10" name="r10" value="premix1" >
                    <input readonly class="form-control" id="premix1" name="premix1" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" value="premix2" >
                      <input readonly class="form-control" id="premix2" name="premix2" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r12" name="r12" value="premix3" >
                      <input readonly class="form-control" id="premix3" name="premix3" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r13" name="r13" value="premix4" >
                      <input readonly class="form-control" id="premix4" name="premix4" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14" value="premix5" >
                      <input readonly class="form-control" id="premix5" name="premix5" >
				  </div>
					  
				  <script language="JavaScript" type="text/javascript">
						function hitung(){

var myForm = document.form1;
var batch1=eval(myForm.batch1.value);
var pil= myForm.prod1.value;
							
if (pil == "Sapu Jagat Mix") {
var a  = 35 * batch1;
var b = 0.2 * batch1;
var c = 0.06 * batch1;
var d = 0.02* batch1;
var e = 0.5 * batch1;
var f = 0.18 * batch1;
var g = 0.2 * batch1;
var h = 0.2 * batch1;
var i = (0 * batch1)+2.5;
var j = 0.2 * batch1;
var k= 2.5;
var l= 2.5+batch1;
var m= (0.5*batch1)*0.4;
var n= 2.5+batch1;
 }
else if (pil == "Sapu Jagat White") {
var a  = 35 * batch1;
var b = 0.2 * batch1;
var c = 0.06 * batch1;
var d = 0.02* batch1;
var e = 0.5 * batch1;
var f = 0.18 * batch1;
var g = 0.2 * batch1;
var g = 0.2 * batch1;
var g = 0.2 * batch1;
var g = 0.2 * batch1;
var g = 0.2 * batch1;
var g = 0.2 * batch1;
}
else if (pil == "Royal White") {
var a = 35 * batch1;
var b = 60 * batch1;
 }
else if (pil == "Royal Mix") {
var a = 35 * batch1;
var b = 60 * batch1;
 }
else if (pil == "Eco Royal Mix") {
var a = 35 * batch1;
var b = 60 * batch1;
 }
else if (pil == "Eco Royal White") {
var a = 35 * batch1;
var b = 60 * batch1;
 }
else if (pil == "Eco Raja Orange") {
var a = 35 * batch1;
var b = 60 * batch1;
 }
 myForm.terigu.value = a;
 myForm.gula.value = b.toFixed(1);
 myForm.calcium.value  = c.toFixed(1);
 myForm.instant_plus.value = d.toFixed(1);
 myForm.ragi.value = e.toFixed(1);
 myForm.softening.value= f.toFixed(1);						
 myForm.titanium.value= g.toFixed(1);
 myForm.sunset_yellow.value= h.toFixed(1);
 myForm.margarine.value = i.toFixed(1);							
 myForm.premix1.value = j.toFixed(1);
 myForm.premix2.value = k.toFixed(1);
 myForm.premix3.value = l.toFixed(1);
 myForm.premix4.value = m.toFixed(1);
 myForm.premix5.value = n.toFixed(1);
 }
function resetForm(){
document.form1.reset();
}
					</script>
					  
					
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  <button input class="btn btn-success" type="button" onClick="hitung()">Hitung</button>
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
		include("indo.php");				  
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM planprod WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE planprod SET no_plan='$_POST[no_plan]',tgl='$_POST[tgl]',shift='$_POST[shift]',batch1='$_POST[batch1]',prod1='$_POST[prod1]',terigu='$_POST[terigu]',gula='$_POST[gula]',calcium='$_POST[calcium]',instant_plus='$_POST[instant_plus]',ragi='$_POST[ragi]',softening='$_POST[softening]',titanium='$_POST[titanium]',sunset_yellow='$_POST[sunset_yellow]',margarine='$_POST[margarine]',premix1='$_POST[premix1]',premix2='$_POST[premix2]',premix3='$_POST[premix3]',premix4='$_POST[premix4]',premix5='$_POST[premix5]'WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Lihat Planing Produksi</h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Tambah Data Planing</a></li>
            <li class="active"> Data Planing</li>
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
                      <p>
                        <label for="exampleInputEmail1">No Plan Prod</label>
                        <input readonly class="form-control" id="no_plan" name="no_plan" value= "<?php echo $d['no_plan'];?>">
                      </p>
                      <p>
                        <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
                        
                        <label for="exampleInputEmail2">Tanggal Produksi</label>
                        <input readonly class="form-control" id="tgl" name="tgl"  value= "<?php echo$d['tgl'];?>">
                        
                        
                        <label for="exampleInputEmail2">Shift</label>
                        <input readonly class="form-control" id="shift" name="shift" value= "<?php echo $d['shift'];?>">
                        
                        <label for="exampleInputEmail3">Nama Produk</label>
                        <input readonly class="form-control" id=prod1 name="prod1" value= "<?php echo $d['prod1'];?>">
                      </p>
                    </div>
					<div class="form-group"></div>
					
					<div class="form-group"></div> 
					 	
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Batch</label>
                      <input type="text" class="form-control" id="batch1" name="batch1" value= "<?php echo $d['batch1'];?>">
                    </div>
						
                    <div class="form-group">
                      <label for="exampleInputEmail1">Terigu</label>
                      <input readonly class="form-control" id="terigu" name="terigu" value= "<?php echo $d['terigu'];?>">
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Gula</label>
                      <input readonly class="form-control" id="gula" name="gula" value= "<?php echo $d['gula'];?>">
                    </div>
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Calcium</label>
                      <input readonly class="form-control" id="calcium" name="calcium" value= "<?php echo $d['calcium'];?>">
                    </div>
					 
					  <div class="form-group">
                      <label for="exampleInputEmail1">Instant Plus</label>
                      <input readonly class="form-control" id="instant_plus" name="instant_plus" value= "<?php echo $d['instant_plus'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Ragi</label>
                      <input readonly  class="form-control"  id="ragi" name="ragi" value= "<?php echo $d['ragi'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Softening</label>
                      <input readonly class="form-control" id="softening" name="softening" value= "<?php echo $d['softening'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Titanium</label>
                      <input readonly  class="form-control"  id="titanium" name="titanium" value= "<?php echo $d['titanium'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Sunset Yellow</label>
                      <input readonly  class="form-control"  id="sunset_yellow" name=sunset_yellow value= "<?php echo $d['sunset_yellow'];?>">             
				    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Margarine</label>
                      <input readonly class="form-control" id="margarine" name="margarine" value= "<?php echo $d['margarine'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Premix 01</label>
                      <input readonly class="form-control" id="premix1" name="premix1" value= "<?php echo $d['premix1'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Premix 02</label>
                      <input readonly class="form-control" id="premix2" name="premix2" value= "<?php echo $d['premix2'];?>">
                    </div>
					  
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Premix 03</label>
                      <input readonly class="form-control" id="premix3" name="premix3" value= "<?php echo $d['premix3'];?>">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Premix 04</label>
                      <input readonly class="form-control" id="premix4" name="premix4" value= "<?php echo $d['premix4'];?>">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Premix 05</label>
                      <input readonly class="form-control" id="premix5" name="premix5" value= "<?php echo $d['premix5'];?>">
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

              <button type="submit" name = 'update' class="btn btn-info">Print Formula</button>
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
      mysql_query("DELETE FROM planprod WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
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