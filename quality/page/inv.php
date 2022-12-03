<?php
error_reporting
?>
<script src="jquery.min.js" type="text/javascript"></script>
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
        <h1> Data Invoice</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=inv&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data</i></button></a>
    <p>&nbsp;</p>
    <p><a href="?pg=inv&act=add"> </a></p>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                 <table width="445" height="73" class="table table-bordered table-striped"  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
						<th width="66">NO</th>
						<th width="161">No Inv</th>
                        <th width="169">Nama Customer</th>
						<th width="161">Tanggal Kirim</th>
						<th width="212">Tanggal Jatuh Tempo</th>
						<th width="115">Status</th>
						<th width="141">Update Status Pelunasan</th>
						<th width="114">Hapus</th>
					    <th width="113">Cetak</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    <?php
			include("indo.php");
                    $tampil=mysql_query("SELECT *,DATE_ADD(tgl,interval tempo DAY) as jatuh_tempo FROM inv group by id desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
						<td height="49"><?php echo "$no"?></td>
                       	<td><?php echo "$r[no_inv]"?></td>
						<td><?php echo "$r[nm_cust]"?></td>
						<td><?php echo TanggalIndo($r['tgl'])?></td>
						<td><?php echo TanggalIndo($r['jatuh_tempo'])?></td>
						<td><?php echo "$r[status]"?></td>
						<td><a href="?pg=inv&act=edit1&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
							
						 <td><a href="?pg=inv&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							
													
						<td><a href="cetak_inv.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-orange">
						<i class="fa fa-print" target=_blank></i></button></a></td>
                        
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
                $query = mysql_query("INSERT INTO inv VALUES ('','$_POST[no_inv]','$_POST[do1]','$_POST[no_so]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[tgl]','$_POST[tempo]','$_POST[tempodate]','$_POST[no_rek]','$_POST[mobil]','$_POST[supir]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[retur1]','$_POST[fix1]','$_POST[harga1]','$_POST[total1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[retur2]','$_POST[fix2]','$_POST[harga2]','$_POST[total2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[retur3]','$_POST[fix3]','$_POST[harga3]','$_POST[total3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[retur4]','$_POST[fix4]','$_POST[harga4]','$_POST[total4]','$_POST[status]','$_POST[piutang]','$_POST[ppn]','$_POST[grand_total]')");
		  
		  
		  		 $query.= mysql_query("INSERT INTO piutang VALUES ('','$_POST[tgl]','$_POST[nm_cust]','$_POST[piutang]','$_POST[no_inv]','$_POST[tempo]'
				 ,'$_POST[metode_bayar]','$_POST[nominal]')");
		  
		  		  $query.= mysql_query("INSERT INTO rekap VALUES ('','$_POST[no_inv]','$_POST[do1]','$_POST[no_so]','$_POST[nm_cust]','$_POST[tgl]','$_POST[tempo]','$_POST[no_rek]','$_POST[mobil]','$_POST[supir]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[plan_sak1]','$_POST[plan_kg1]','$_POST[realisasi_sak1]','$_POST[realisasi_kg1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[plan_sak2]','$_POST[plan_kg2]','$_POST[realisasi_sak2]','$_POST[realisasi_kg2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[plan_sak3]','$_POST[plan_kg3]','$_POST[realisasi_sak3]','$_POST[realisasi_kg3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[plan_sak4]','$_POST[plan_kg4]','$_POST[realisasi_sak4]','$_POST[realisasi_kg4]','$_POST[retur]')");
			       
                echo "<script>window.location='home.php?pg=inv&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
	<script src="jquery.min.js" type="text/javascript"></script>
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Invoice</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Invoice</a></li>
            <li class="active"><a href="#">Tambah Data Invoice</a></li>
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
					     <?php $kd_trans= kd_trans5_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Transaksi</label>
                      <input type="text" class="form-control" id="no_inv" value="<?php echo $kd_trans;?>" name="no_inv"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_inv" value="<?php echo $kd_trans;?>" name="no_inv"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
					   <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Sales Order</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="do1" id="do1" onchange="changeValue(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result = mysql_query("select * from so order by id");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['do1'] . '">' . $row['do1'] . '</option>';    
$jsArray .= "frm['" . $row['do1'] . "'] = {
no_so:'" . addslashes($row['no_so']) . "',
nm_cust:'" . addslashes($row['nm_cust']) . "',
alamat:'".addslashes($row['alamat'])."',
tlp:'".addslashes($row['tlp'])."',
tgl:'".addslashes($row['tgl'])."',
supir:'".addslashes($row['supir'])."',
mobil:'".addslashes($row['mobil'])."',
nm_fg1:'".addslashes($row['nm_fg1'])."',
qty1:'".addslashes($row['qty1'])."',
nm_fg2:'".addslashes($row['nm_fg2'])."',
qty2:'".addslashes($row['qty2'])."',
nm_fg3:'".addslashes($row['nm_fg3'])."',
qty3:'".addslashes($row['qty3'])."',
nm_fg4:'".addslashes($row['nm_fg4'])."',
qty4:'".addslashes($row['qty4'])."'



};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
                     <input type="hidden" class="form-control" id="no_so" name="no_so" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
				
					  
					
                     <input type="hidden" class="form-control" id="supir" name="supir" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
					
					 		
					
                     <input type="hidden" class="form-control" id="mobil" name="mobil" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
				
					
					  
                     <input type="hidden" class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong">
				
					  
					 
                     <input type="hidden" class="form-control" id="alamat" name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong">
					
					
					
                     <input type="hidden" class="form-control" id="tlp" name="tlp" placeholder="No telepon">
					
					
					 <div class="form-group">Tanggal Kirim
                     <input readonly class="form-control" id="tgl" name="tgl" placeholder="Tanggal Kirim" required data-fv-notempty-message="Tidak boleh kosong" onclick="sum1();">						
                     <input type="number" class="form-control" id="tempo" name="tempo" placeholder="Masukan Jumlah Hari" required data-fv-notempty-message="Tidak boleh kosong" onclick="sum1();">
</div>
	
						    
					 <div class="form-group">
                    <label for="exampleInputEmail1">No Rekening</label> 
                      <select class="form-control select2" name="no_rek" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="066 303 5433 a/n Ari Sudarsono">Retail</option>
                        <option value="521 082 3800 a/n Raja Roti Cemerlang PT">Corporate</option>
                      </select>
                  </div>
										 
					  <div class="form-group">Produk1
                     <input readonly class="form-control" id="nm_fg1" name="nm_fg1">
					 <input readonly id="qty1" name="qty1" onKeyUp="sum();" >
					 <input type="text" id="retur1" name="retur1" onKeyUp="sum();" placeholder="masukan jumlah sak retur" >
					 <input hidden id="fix1" name="fix1" onKeyUp="sum();" placeholder="jumlah setelah retur">
					 <input type="text" id="harga1" name="harga1" onKeyUp="sum();"  placeholder="masukan harga" >
				     <input type="text" id="total1" name="total1" onKeyUp="sum();"  placeholder="masukan harga" >
				     
					</div>
					
					<div class="form-group">Produk2
                     <input readonly class="form-control" id="nm_fg2" name="nm_fg2" >
					 <input readonly  id="qty2" name="qty2" onKeyUp="sum();" >
					 <input type="text"  id="retur2" name="retur2" onKeyUp="sum();" placeholder="masukan jumlah sak retur" >	
					 <input hidden id="fix2" name="fix2" onKeyUp="sum();">
					 <input type="text"  id="harga2" name="harga2" onKeyUp="sum();" placeholder="masukan harga" >
				     <input type="text" id="total2" name="total2" onKeyUp="sum();" placeholder="masukan harga" >
					
					</div>
					
					<div class="form-group">Produk3
                     <input readonly class="form-control" id="nm_fg3" name="nm_fg3">
					 <input readonly  id="qty3" name="qty3" onKeyUp="sum();" >
					<input type="text" id="retur3" name="retur3" onKeyUp="sum();" placeholder="masukan jumlah sak retur" >
					 <input hidden id="fix3" name="fix3" onKeyUp="sum();">
					 <input type="text"  id="harga3" name="harga3" onKeyUp="sum();" placeholder="masukan harga" >
					  <input type="text" id="total3" name="total3" onKeyUp="sum();"  placeholder="masukan harga" >
					
					</div>
					
					<div class="form-group">Produk4
                     <input readonly class="form-control" id="nm_fg4" name="nm_fg4">
					 <input readonly  id="qty4" name="qty4" onKeyUp="sum();" >
					<input type="text"  id="retur4" name="retur4" onKeyUp="sum();" placeholder="masukan jumlah sak retur" >
					 <input hidden  id="fix4" name="fix4" onKeyUp="sum();">
					 <input type="text"  id="harga4" name="harga4" onKeyUp="sum();" placeholder="masukan harga" >
					  <input type="text" id="total4" name="total4" onKeyUp="sum();" placeholder="masukan harga" >
						 
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Total </label>
 					<input type="text" class="form-control" id="grand_total" name="grand_total" onClick="sum1();" placeholder="Klik Kolom Ini"  required data-fv-notempty-message="Tidak boleh kosong">
					</div>
					  
					    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Prosentase Pajak</label>
                       <input type="text"  class="form-control" id="jml_pajak" name="jml_pajak" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum1();">
                     </div> 		
					  
					<div class="form-group">
                       <label for="exampleInputEmail1">PPN</label>
                       <input type="text" class="form-control" id="ppn" name="ppn" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum1();">
                       </div>
				  
					
				  		<div class="form-group">
                       <label for="exampleInputEmail1">Grand Total</label>
                       <input type="text" class="form-control" id="piutang" name="piutang" placeholder="Jumlah Barang" required data-fv-notempty-message="Tidak boleh kosong" onkeyup="sum1();">
                       </div>
				  
					  
					  
					 
					  
					
					
						<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
	
	
		document.getElementById('nm_cust').value = frm[no_form].nm_cust;
		document.getElementById('no_so').value = frm[no_form].no_so;
		document.getElementById('alamat').value = frm[no_form].alamat;
		document.getElementById('tlp').value = frm[no_form].tlp;
		document.getElementById('tgl').value = frm[no_form].tgl;
		document.getElementById('mobil').value = frm[no_form].mobil; 
		document.getElementById('supir').value = frm[no_form].supir; 
		document.getElementById('nm_fg1').value = frm[no_form].nm_fg1; 
		document.getElementById('qty1').value = frm[no_form].qty1; 
		document.getElementById('nm_fg2').value = frm[no_form].nm_fg2; 
		document.getElementById('qty2').value = frm[no_form].qty2; 
	    document.getElementById('nm_fg3').value = frm[no_form].nm_fg3; 
		document.getElementById('qty3').value = frm[no_form].qty3; 
		document.getElementById('nm_fg4').value = frm[no_form].nm_fg4; 
		document.getElementById('qty4').value = frm[no_form].qty4; 
		
			};  
</script>
	  <script>
		
		function sum() {
							
							var txt1 = document.getElementById('qty1').value;
							var txt1a = document.getElementById('retur1').value;
							var txt1b = document.getElementById('harga1').value;
							var txt1c = document.getElementById('total1').value;
							var txt1d = document.getElementById('fix1').value;
			
							var txt2 = document.getElementById('qty2').value;
							var txt2a = document.getElementById('retur2').value;
							var txt2b = document.getElementById('harga2').value;
							var txt2c = document.getElementById('total2').value;
							var txt2d = document.getElementById('fix2').value;
			
							var txt3 = document.getElementById('qty3').value;
							var txt3a = document.getElementById('retur3').value;
							var txt3b = document.getElementById('harga3').value;
							var txt3c = document.getElementById('total3').value;
							var txt3d = document.getElementById('fix3').value;
					
							var txt4 = document.getElementById('qty4').value;
							var txt4a = document.getElementById('retur4').value;
							var txt4b = document.getElementById('harga4').value;
							var txt4c = document.getElementById('total4').value;
							var txt4d = document.getElementById('fix4').value;
			
							var result1a = parseInt(txt1)-parseInt(txt1a);
      						if (!isNaN(result1a)) {
         					document.getElementById('fix1').value = result1a;
							}
			
							var result1b = parseInt(txt1b)*parseInt(txt1d);
      						if (!isNaN(result1b)) {
         					document.getElementById('total1').value = result1b;
							}				
							
							var result2a = (txt2)-parseInt(txt2a);
      						if (!isNaN(result2a)) {
         					document.getElementById('fix2').value = result2a;
							}
			
							var result2b = parseInt(txt2d)*parseInt(txt2b);
      						if (!isNaN(result2b)) {
         					document.getElementById('total2').value = result2b;
							}	
							
							var result3a = parseInt(txt3)-parseInt(txt3a);
      						if (!isNaN(result3a)) {
         					document.getElementById('fix3').value = result3a;
							}
			
							var result3b = parseInt(txt3d)*parseInt(txt3b);
      						if (!isNaN(result3b)) {
         					document.getElementById('total3').value = result3b;
							}	
			
							var result4a = parseInt(txt4)-parseInt(txt4a);
      						if (!isNaN(result4a)) {
         					document.getElementById('fix4').value = result4a;
							}
			
							var result4b = parseInt(txt4d)*parseInt(txt4b);
      						if (!isNaN(result4b)) {
         					document.getElementById('total4').value = result4b;
							}	

			
			
						}
		
		</script>
					
					 <script>
		
		function sum1() {
							
						
			                var txt5 = document.getElementById('total1').value;	
							var txt6 = document.getElementById('total2').value;
							var txt7 = document.getElementById('total3').value;
							var txt8 = document.getElementById('total4').value;
							var txt9 = document.getElementById('piutang').value;
			             	var txt10 = document.getElementById('jml_pajak').value;
							var txt11 = document.getElementById('ppn').value;
							var txt12 = document.getElementById('grand_total').value;
							var txt13 = document.getElementById('tgl').value;
							var txt14 = document.getElementById('tempo').value;
					
							
							var result1 = parseInt(txt5);
      						if (!isNaN(result1)) {
         					document.getElementById('grand_total').value = result1;
							}
						
							var result2 = parseInt(txt5)+parseInt(txt6);
      						if (!isNaN(result2)) {
         					document.getElementById('grand_total').value = result2;
							}
			
								var result3 = parseInt(txt5)+parseInt(txt6)+parseInt(txt7);
      						if (!isNaN(result3)) {
         					document.getElementById('grand_total').value = result3;
							}
			
							var result4 = parseInt(txt5)+parseInt(txt6)+parseInt(txt7)+parseInt(txt8);
      						if (!isNaN(result4)) {
         					document.getElementById('grand_total').value = result4;
							}
							
							var result5 = (parseInt(txt10)/100)*parseInt(txt12);
      						if (!isNaN(result5)) {
         					document.getElementById('ppn').value = result5;
							}
							
							var result6 = parseInt(txt11)+parseInt(txt12);
      						if (!isNaN(result6)) {
         					document.getElementById('piutang').value = result6;
							}

							
							
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
				  </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
				  </section>
 	
     
		<?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit1':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM inv WHERE id='$_GET[id]'"));
            if (isset($_POST['update1'])) {
	  mysql_query("UPDATE inv SET no_inv='$_POST[no_inv]',do1='$_POST[do1]',nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',tlp='$_POST[tlp]',tgl='$_POST[tgl]',tempo='$_POST[tempo]',tempodate='$_POST[tempodate]',mobil='$_POST[mobil]',supir='$_POST[supir]',nm_fg1='$_POST[nm_fg1]',qty1='$_POST[qty1]',harga1='$_POST[harga1]',total1='$_POST[total1]',nm_fg2='$_POST[nm_fg2]',qty2='$_POST[qty2]',harga2='$_POST[harga2]',total2='$_POST[total2]',nm_fg3='$_POST[nm_fg3]',qty3='$_POST[qty3]',harga3='$_POST[harga3]',total3='$_POST[total3]',nm_fg4='$_POST[nm_fg4]',qty4='$_POST[qty4]',harga4='$_POST[harga4]',total4='$_POST[total4]',status='$_POST[status]' WHERE id='$_POST[id]'");
		
				  mysql_query("UPDATE rekap SET status='$_POST[status]' WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=inv&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Lihat Sales Order</h1>
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
                <form role="form" method = "POST" action="" >
                  <div class="box-body">
					  
					  
                    	<div class="form-group">
                        <label for="exampleInputEmail1">No Sales Order</label>
                        <input readonly class="form-control" id="no_inv" name="no_inv" value= "<?php echo $d['no_inv'];?>">
					  </div>
					  
					  <div class="form-group">
                        <label for="exampleInputEmail1">No Sales Order</label>
                        <input readonly class="form-control" id="do1" name="do1" value= "<?php echo $d['do1'];?>">
					  </div>
					  
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 
					  
					  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Nama Customer</label>
                        <input readonly class="form-control" id="nm_cust" name="nm_cust" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_cust'];?>">
					  </div>
					  
					   
					   <div class="form-group">Alamat Customer
                     <input readonly class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
					</div>
					  
					 <div class="form-group">
                        <label for="exampleInputEmail2">Nomor Telepon</label>
                        <input readonly class="form-control" id="tlp" name="tlp" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_cust'];?>">
					  </div>
					  <?php
#
# Manipulasi Tanggal di PHP by SmartDevTala
#
function manipulasiTanggal($tgl,$jumlah=1,$format='days'){
	$currentDate = $tgl;
	return date('Y-m-d', strtotime($jumlah.' '.$format, strtotime($currentDate)));
}
?>
					   <div class="form-group">
                        <label for="exampleInputEmail2">Tanggal Pemesanan</label>
                        <input readonly class="form-control" id="tgl" name="tgl" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['tgl'];?>">
					  </div>
					  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Jatuh Tempo</label>
                        <input readonly class="form-control" id="tempo" name="tempo" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['tempo'];?>">
					  </div>

					   <div class="form-group">
                        <label for="exampleInputEmail2">Tanggal Tempo</label>
                        <input readonly class="form-control" id="tempodate" name="tempodate" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo manipulasiTanggal($d['tgl'],$d['tempo'],'days');?>">
					  </div>
	
					   
					   <div class="form-group">
                        <label for="exampleInputEmail2">Mobil</label>
                        <input readonly class="form-control" id="mobil" name="mobil" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['mobil'];?>">
					  </div>
					  
					  <div class="form-group">
                        <label for="exampleInputEmail2">Supir</label>
                        <input readonly class="form-control" id="supir" name="supir" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['supir'];?>">
					  </div>
					  
					
					   <div class="form-group">
                        <label for="exampleInputEmail2">Detail Pesanan</label>
                        <input readonly class="form-control" id="nm_fg1" name="nm_fg1" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_fg1'];?>" >
						<input readonly class="form-control" id="qty1" name="qty1" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['qty1'];?>"> 
						<input readonly class="form-control" id="harga1" name= "harga1" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['harga1'];?>"> 
						<input readonly class="form-control" id="total1" name= "total1" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['total1'];?>"> 
						</div>
					  
					 
						 <div class="form-group">
                        <label for="exampleInputEmail2">Detail Pesanan</label>
                        <input readonly class="form-control" id="nm_fg2" name="nm_fg2"  value= "<?php echo $d['nm_fg2'];?>">
						<input readonly class="form-control" id="qty2" name="qty2"  value= "<?php echo $d['qty2'];?>"> 
						<input readonly class="form-control" id="harga2" name= "harga2" value= "<?php echo $d['harga2'];?>"> 
						<input readonly class="form-control" id="total2" name= "total2"   value= "<?php echo $d['total2'];?>"> 
						</div>
										  
					  <div  class="form-group">
						  <label for="exampleInputEmail2">Detail Pesanan</label>
						<input readonly class="form-control" id="nm_fg3" name="nm_fg3"  value= "<?php echo $d['nm_fg3'];?>">
						<input readonly class="form-control" id="qty3" name="qty3" value= "<?php echo $d['qty3'];?>">
					   <input readonly class="form-control" id="harga3" name= "harga3" value= "<?php echo $d['harga3'];?>"> 
						<input readonly class="form-control" id="total3" name= "total3"   value= "<?php echo $d['total3'];?>"> 
					  </div>
					  
					  <div  class="form-group">
						  <label for="exampleInputEmail2">Detail Pesanan</label>
						<input readonly class="form-control" id="nm_fg4" name="nm_fg4" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['nm_fg4'];?>">
						<input readonly class="form-control" id="qty4" name="qty4" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['qty4'];?>">
					    <input readonly class="form-control" id="harga4" name= "harga4" value= "<?php echo $d['harga4'];?>"> 
						<input readonly class="form-control" id="total4" name= "total4"   value= "<?php echo $d['total4'];?>"> 
					  </div>
						  
					   <div  class="form-group">
						  <select class="form-control select2" name="status" id="status" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                        <option value="">Ganti Status Pembayaran</option>
                        <option value="lunas">Lunas</option>
                        <option value="belum lunas">Belum Lunas</option>
					     <option value="lunas sebagian">Lunas Sebagain</option>
                        </select>
					 <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update1' class="btn btn-info">Edit</button>
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
      mysql_query("DELETE FROM inv WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=inv&act=view'</script>";
      break;

    }
    ?>

