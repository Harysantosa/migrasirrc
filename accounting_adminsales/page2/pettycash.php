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
        <h1>Data Petty Cash</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=pettycash&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data Transaksi Petty Cash</i></button> </a>
	<?php
			 $d = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='2'"));
			?>
			
			<h2 align="left">Saldo Petty Cash <?php echo "Rp. ". number_format("$d[saldo]",'0','.','.')?></h2>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="98%" height="73" class="table table-bordered table-striped"  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="150">No</th>
						 <th width="150">Kode Pembayaran</th>
                        <th width="399">Nama Account</th>
                        <th width="405">Nominal</th>
						  <th width="405">Hapus Transaksi</th>						
    					
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM petty_cash GROUP by id ");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[kd_byr]"?></td>
						<td><?php echo "$r[nama_akun]"?></td>
					   <td><?php echo "Rp. ". number_format("$r[nominal]",'0','.','.')?></td>
						 <td style="text-align: center"><a href="?pg=pettycash&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>
                        
						
                                    </tr>
						
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
              $query .= mysql_query("INSERT INTO petty_cash VALUES ('','$_POST[kd_byr]','$_POST[nama_akun]','$_POST[nominal]')");
		     
		  		  
		  		
                echo "<script>window.location='home.php?pg=pettycash&act=view'</script>";
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
                      $sql = mysql_query("select * from petty_cash");
                      
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
                      $tahun = date('m/Y');
                      $kode_jadi = "P-CASH/$tahun/$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Kode Transaksi</label>
                      <input type="text" class="form-control" id="kd_byr" name="kd_byr" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="kd_byr" name="kd_byr" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					 
					  <div class="form-group">
                   	<input type="text" class="form-control" id="nama_akun" name="nama_akun" onKeyUp="sum();" placeholder="Input Nama Transaksi">
                    </div>
					  
					  <div class="form-group">
                      <input type="text" class="form-control" id="nominal" name="nominal" onKeyUp="sum();" placeholder="input nominal">
                    </div>
					
					  
					 				  
					 
					
									
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
	
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM planprod WHERE no='$_GET[no]'"));
            if (isset($_POST['update'])) {
				
				
				
                mysql_query("UPDATE planprod SET no_plan='$_POST[no_plan]',tgl='$_POST[tgl]',nm_fg='$_POST[nm_fg]',shift='$_POST[shift]',batch1='$_POST[batch1]',terigu='$_POST[terigu]',gula='$_POST[gula]',calcium='$_POST[calcium]',instant_plus='$_POST[instant_plus]',ragi='$_POST[ragi]',softening='$_POST[softening]',titanium='$_POST[titanium]',sunset_yellow='$_POST[sunset_yellow]',margarine='$_POST[margarine]',premix1='$_POST[premix1]',premix2='$_POST[premix2]',premix3='$_POST[premix3]',premix4='$_POST[premix4]',premix5='$_POST[premix5]',polos_tebal='$_POST[polos_tebal]',polos_tipis='$_POST[polos_tipis]',kuning_tebal='$_POST[kuning_tebal]',kuning_tipis='$_POST[kuning_tipis]',biru_tebal='$_POST[biru_tebal]',biru_tipis='$_POST[biru_tipis]' WHERE no='$_POST[no]'");
				
				mysql_query("update gudang_rm1 set no_plan='$_POST[no_plan]',tgl='$_POST[tgl]',shift='$_POST[shift]',nm_fg='$_POST[nm_fg]',batch1='$_POST[batch1]',r1='$_POST[r1]',terigu='$_POST[terigu]',r2='$_POST[r2]',gula='$_POST[gula]',r3='$_POST[r3]',calcium='$_POST[calcium]',r4='$_POST[r4]',instant_plus='$_POST[instant_plus]',r5='$_POST[r5]',ragi='$_POST[ragi]',r6='$_POST[r6]',softening='$_POST[softening]',r7='$_POST[r7]',titanium='$_POST[titanium]',r8='$_POST[r8]',sunset_yellow='$_POST[sunset_yellow]',r9='$_POST[r9]',margarine='$_POST[margarine]',r10='$_POST[r10]',premix1='$_POST[premix1]',r11='$_POST[r11]',premix2='$_POST[premix2]',r12='$_POST[r12]',premix3='$_POST[premix3]',r13='$_POST[r13]',premix4='$_POST[premix4]',r14='$_POST[r14]',premix5='$_POST[premix5]',polos_tebal='$_POST[polos_tebal]',polos_tipis='$_POST[polos_tipis]',kuning_tebal='$_POST[kuning_tebal]',kuning_tipis='$_POST[kuning_tipis]',biru_tebal='$_POST[biru_tebal]',biru_tipis='$_POST[biru_tipis]' WHERE no='$_POST[no]'");
				
                echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Ubah Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing Produksi</a></li>
            <li class="active">Edit Planing Produksi</li>
             </ol>
        </section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="" enctype ="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <p>
                        <label for="exampleInputEmail1">No Plan Prod</label>
                        <input readonly class="form-control" id="no_plan" name="no_plan" value= "<?php echo $d['no_plan'];?>">
                      </p>
                      <p>
                        <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
                        
                        <label for="exampleInputEmail2">Tanggal Produksi</label>
                        <input readonly class="form-control" id="tgl" name="tgl"  value= "<?php echo $d['tgl'];?>">
                        <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
						  
						  
                       <div class="form-group">
                      <label for="exampleInputEmail1">Formula Produksi</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="nm_fg" id="nm_fg" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from formula");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['prod'] . '">' . $row['prod'] . '</option>';    
$jsArray .= "frm['" . $row['prod'] . "'] = {
terigu:'" . addslashes($row['terigu']) . "',
gula:'".addslashes($row['gula'])."',
calcium:'".addslashes($row['calcium'])."',
instant_plus:'".addslashes($row['instant_plus'])."',
ragi:'".addslashes($row['ragi'])."',
softening:'".addslashes($row['softening'])."',
titanium:'".addslashes($row['titanium'])."',
sunset_yellow:'".addslashes($row['sunset_yellow'])."',
margarine:'".addslashes($row['margarine'])."',
premix1:'".addslashes($row['premix1'])."',
premix2:'".addslashes($row['premix2'])."',
premix3:'".addslashes($row['premix3'])."',
premix4:'".addslashes($row['premix4'])."',
premix5:'".addslashes($row['premix5'])."'};
";    
					}      
					?>    
						    </optgroup>
                      </select>
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
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Batch</label>
                      <input type="text" class="form-control" id="batch1" name="batch1" value= "<?php echo $d['batch1'];?>">
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
					
					<div class="form-group">
                       <label for="exampleInputEmail1">HD Polos 80x50(tebal)</label>
                      <input type="text" class="form-control" id="polos_tebal" name="polos_tebal" value= "<?php echo $d['polos_tebal'];?>">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">HD Polos 47x70(tipis)</label>
                      <input type="text" class="form-control" id="polos_tipis" name="polos_tipis" value= "<?php echo $d['polos_tipis'];?>">
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">PE Kuning 49x79(tebal)</label>
                      <input "text"  class="form-control" id="kuning_tebal" name="kuning_tebal" value= "<?php echo $d['kuning_tebal'];?>">
                    </div>

					  

					  <div class="form-group">
                      <label for="exampleInputEmail1">PE Kuning 46x69(tipis)</label>
                      <input "text"  class="form-control" id="kuning_tipis" name="kuning_tipis" value= "<?php echo $d['kuning_tipis'];?>">
                    </div>
					 
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PE Biru 49x79(tebal)</label>
                      <input "text"  class="form-control" id="biru_tebal" name="biru_tebal" value= "<?php echo $d['biru_tebal'];?>">
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">PE Biru 46x69(tipis)</label>
                      <input "text"  class="form-control" id="biru_tipis" name="biru_tipis" value= "<?php echo $d['biru_tipis'];?>">
                    </div>
					 
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('terigu').value = frm[no_form].terigu;  
		document.getElementById('gula').value = frm[no_form].gula; 
		document.getElementById('calcium').value = frm[no_form].calcium;
		document.getElementById('instant_plus').value = frm[no_form].instant_plus;
		document.getElementById('ragi').value = frm[no_form].ragi;
		document.getElementById('softening').value = frm[no_form].softening;
		document.getElementById('titanium').value = frm[no_form].titanium;
		document.getElementById('sunset_yellow').value = frm[no_form].sunset_yellow;
		document.getElementById('margarine').value = frm[no_form].margarine;
		document.getElementById('premix1').value = frm[no_form].premix1;
		document.getElementById('premix2').value = frm[no_form].premix2;
		document.getElementById('premix3').value = frm[no_form].premix3;
		document.getElementById('premix4').value = frm[no_form].premix4;
		document.getElementById('premix5').value = frm[no_form].premix5;
			};  
					  </script>
					  				  
				    <script>
						function sum() {
							var txt11 = document.getElementById('batch1').value;
							var txt1 = document.getElementById('terigu').value;	
							var txt2 = document.getElementById('gula').value;
							var txt3=document.getElementById('calcium').value;
							var txt4=document.getElementById('instant_plus').value;
							var txt5=document.getElementById('ragi').value;
							var txt6=document.getElementById('softening').value;
							var txt7=document.getElementById('titanium').value;
							var txt8=document.getElementById('sunset_yellow').value;
							var txt9=document.getElementById('margarine').value;
							var txt10=document.getElementById('premix1').value;
							var txt11a=document.getElementById('premix2').value;
							var txt12=document.getElementById('premix3').value;
							var txt13=document.getElementById('premix4').value;
							var txt14=document.getElementById('premix5').value;
							
							var result1 =(txt1) * (txt11);
      						if (!isNaN(result1)) {
         					document.getElementById('terigu').value = result1;
							}
							
							var result2 = (txt2) * (txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('gula').value = result2;
							}
							
							var result3 = (txt3) * (txt11);
      						if (!isNaN(result3)) {
         					document.getElementById('calcium').value = result3.toFixed(1);
							}
							
							var result4 = (txt4) * (txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('instant_plus').value = result4.toFixed(1);
							}
							
							var result5 = (txt5) * (txt11);
      						if (!isNaN(result5)) {
         					document.getElementById('ragi').value = result5.toFixed(1);
							}
							
							var result6 = (txt6) * (txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('softening').value = result6.toFixed(1);
							}
							
							var result7 = (txt7) * (txt11);
      						if (!isNaN(result7)) {
         					document.getElementById('titanium').value = result7.toFixed(1);
							}
							
							var result8 = (txt8) * (txt11);
      						if (!isNaN(result8)) {
         					document.getElementById('sunset_yellow').value = result8.toFixed(1);
							}
							
							var result9 = (txt9) * (txt11);
      						if (!isNaN(result9)) {
         					document.getElementById('margarine').value = result9.toFixed(1);
							}
							
							var result10 = (txt10) * (txt11);
      						if (!isNaN(result10)) {
         					document.getElementById('premix1').value = result10.toFixed(1);
							}
							
							var result11 = (txt11a) * (txt11);
      						if (!isNaN(result11)) {
         					document.getElementById('premix2').value = result11.toFixed(1);
							}
							
							var result12 = (txt12) * (txt11);
      						if (!isNaN(result12)) {
         					document.getElementById('premix3').value = result12.toFixed(1);
							}
							
							var result13 = (txt13) * (txt11);
      						if (!isNaN(result13)) {
         					document.getElementById('premix4').value = result13.toFixed(1);
							}
							
							var result14 = (txt14) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('premix5').value = result14.toFixed(1);
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

              <button type="submit" name = 'update' class="btn btn-info">Edit</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
			&nbsp;
              <button input class="btn btn-success" type="button" id="btn"  onClick="sum();">Hitung</button> 
				 
            </form>
				
				 <script>
				function sum() {
    var x = document.getElementById("btn");
    x.disabled = true;
}
</script>
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
      mysql_query("DELETE FROM petty_cash WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=pettycash&act=view'</script>";
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