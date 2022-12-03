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
      ?><body bgcolor="#000000" text="#339933" link="#33FF00" vlink="#666666" alink="#666600">

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
    <a href="?pg=verifikasifgout&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-database"> Rekap Potong Stok</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                         <th width="72" style="text-align: left">No</th>
                         <th  width="147" style="text-align: left">Nomor Sales Order</th>
                         <th  width="147" style="text-align: left">Nama Customer</th>
                         <th  width="147" style="text-align: left">Tanggal SO</th>
						 <th width="115" style="text-align: left">Verifikasi Data</th>
									
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM salesorder group by id desc");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					out
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td style="text-align: left"><?php echo "$no"?></td>
							          <td style="text-align: left"><?php echo "$r[no_so]"?></td>
                                      <td align="left" style="text-align: left"><?php echo "$r[nm_cust]"?></td>
                                      <td align="center" style="text-align: left"><?php echo TanggalIndo($r['tgl'])?></td>
									  <td style="text-align: left"><a href="?pg=verifikasifgout&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange" onclick="return confirm('Anda Akan Memotong Stok Finish Good?');"><i class="fa fa-check"></i></button></a></td>
									  
									  			
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
	  
      $d = mysql_fetch_array(mysql_query("SELECT * FROM salesorder WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
			 if  ($_POST['sisastok1']>='0'&&$_POST['nm_fg']==$_POST['nm_fg1']&&$_POST['sisastok2']>='0'
			 &&$_POST['nm_fg2a']==$_POST['nm_fg2']&&$_POST['sisastok3']>='0'&&$_POST['nm_fg3a']==$_POST['nm_fg3']
			 &&$_POST['sisastok4']>='0'&&$_POST['nm_fg4a']==$_POST['nm_fg4']){	
	  		mysql_query("UPDATE salesorder SET no_so='$_POST[no_so]', so_ext='$_POST[so_ext]',tgl='$_POST[tgl]'
			,nm_cust='$_POST[nm_cust]',alamat='$_POST[alamat]',pic='$_POST[pic]',nm_fg1='$_POST[nm_fg1]'
			,qty1='$_POST[qty1]',undeliv1='$_POST[undeliv1]',sisa1='$_POST[sisa1]',nm_fg2='$_POST[nm_fg2]'
			,qty2='$_POST[qty2]',undeliv2='$_POST[undeliv2]',sisa2='$_POST[sisa2]',nm_fg3='$_POST[nm_fg3]'
			,qty3='$_POST[qty3]',undeliv3='$_POST[undeliv3]',sisa3='$_POST[sisa3]',nm_fg4='$_POST[nm_fg4]'
			,qty4='$_POST[qty4]',undeliv4='$_POST[undeliv4]',sisa4='$_POST[sisa4]' WHERE id='$_POST[id]'");
			
			 $query .= mysql_query("INSERT INTO so VALUES ('','$_POST[do1]','$_POST[time]','$_POST[no_so]'
			 ,'$_POST[so_ext]','$_POST[nm_cust]','$_POST[alamat]','$_POST[tlp]','$_POST[tgl]','$_POST[mobil]'
			 ,'$_POST[supir]','$_POST[nm_fg1]','$_POST[qty1]','$_POST[exp1]','$_POST[nm_fg2]','$_POST[qty2]'
			 ,'$_POST[exp2]','$_POST[nm_fg3]','$_POST[qty3]','$_POST[exp3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[exp4]','$_POST[segel]')");
			 
			   $query .= mysql_query("INSERT INTO verifikasifgout VALUES ('','$_POST[no_so]','$_POST[so_ext]','$_POST[nm_cust]','$_POST[tgl]'
			  ,'$_POST[nm_fg1]','$_POST[qty1]','$_POST[exp1]','$_POST[nm_fg2]','$_POST[qty2]','$_POST[exp2]','$_POST[nm_fg3]','$_POST[qty3]'
			  ,'$_POST[exp3]','$_POST[nm_fg4]','$_POST[qty4]','$_POST[exp4]')");
			 
			 echo "<script> alert('Stok Telah Berhasil Dipotong');window.location='home.php?pg=verifikasifgout&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal Potong Stok, Karna Beberapa Stok Kurang atau nama Produk salah !');</script>";
			 }
			   
			   }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Ubah Sales Order</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Sales Order</a></li>
            <li class="active">Edit Sales Order</li>
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
					  <label for="exampleInputEmail1">Nomor Surat Jalan</label> 
					<?php $kd_trans= kd_sj_auto(); //untuk kode otomatis dng fungsi?> 
                     
                      <input type="text" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="do1"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					
                    	<div class="form-group">
                        <label for="exampleInputEmail1">No Sales Order</label>
                        <input readonly class="form-control" id="no_so" name="no_so" value= "<?php echo $d['no_so'];?>">
					  </div>
					  
					  <div class="form-group">
                        <label for="exampleInputEmail1">No PO External</label>
                        <input readonly class="form-control" id="so_ext" name="so_ext" value= "<?php echo $d['so_ext'];?>">
					  </div>
					  
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 
					  
					   <div class="form-group">
                        <label for="exampleInputEmail2">Tanggal Pemesanan</label>
                        <input readonly class="form-control" id="tgl" name="tgl" required data-fv-notempty-message="Tidak boleh kosong"  value= "<?php echo $d['tgl'];?>">
						   
					  </div>
					  
					   <div class="form-group">Waktu Kirim
						   
                     <input readonly="" class="form-control" id="time" name="time" placeholder="Nama Customer" required data-fv-notempty-message="Tidak boleh kosong" value=" <?php date_default_timezone_set('Asia/Jakarta'); echo date(date("H:i:s"));?> ">
						  </div>
					  
					  <div class="form-group">Nama Customer
                     <input readonly class="form-control" id=nm_cust name="nm_cust" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_cust'];?>">
					</div>
					  
					  
					   <div class="form-group">Alamat Customer
                     <input readonly class="form-control" id=alamat name="alamat" placeholder="Alamat Customer" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['alamat'];?>">
					</div>
					  
					  <div class="form-group">PIC
                     <input readonly class="form-control" id="pic" name="pic" placeholder="Nomor Telepon" value= "<?php echo $d['pic'];?>">
					</div>	
					  
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-1</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg" id="nm_fg" onchange="changefg1(this.value)" >
					<option value=''></option>
					
					<?php 
					$result1 = mysql_query("select * from stok_fg order by id");    
					$jsArray1 = "var frm1 = new Array();
";        
					while ($row = mysql_fetch_array($result1)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray1 .= "frm1['" . $row['nm_fg'] . "'] = {
stok1:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					   <input readonly class="form-control" id="nm_fg1" name="nm_fg1"  value= "<?php echo $d['nm_fg1'];?>" placeholder="input dalam satuan Sak" >
					   <input readonly class="form-control" id="stok1" name="stok1" placeholder="Stok Finish Good" onKeyUp="sum();">
					   <input type="hidden" class="form-control" id="qty1" name="qty1"  value= "<?php echo $d['qty1'];?>" placeholder="input dalam satuan Sak" onKeyUp="sum();">
					    <input type="hidden" class="form-control" id="undeliv1" name="undeliv1"  placeholder="input dalam satuan Sak" onKeyUp="sum();">
					     <input type="hidden" class="form-control" id="undeliva" name="undeliva" value= "<?php echo $d['undeliv1'];?>"  placeholder="input dalam satuan Sak" onKeyUp="sum();">
					    <input type="text" class="form-control" id="kirim1" name="kirim1"  placeholder="Masukan Jumlah yang akan dikirim" onKeyUp="sum();">
						 <label for="exampleInputEmail1">Sisa SO Ke-1</label>
						   <input readonly class="form-control" id="sisa1" name="sisa1"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
						   <input type="hidden" class="form-control" id="sisaa" name="sisaa" value= "<?php echo $d['sisa1'];?>"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
						 <label for="exampleInputEmail1">Sisa Stok</label>
						 <input readonly class="form-control" id="sisastok1" name="sisastok1"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();" value="0">	
						    <label for="exampleInputEmail2">Expierd Date Product1</label>
                        <input type="date" class="form-control" id="exp1" name="exp1"  >  
                      </div>
					  
					    <br>
					  <br>
					  <br>
					   <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-2</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg2a" id="nm_fg2a" onchange="changefg2(this.value)" >
					<option value=''></option>
					<?php 
					$result2 = mysql_query("select * from stok_fg order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray2 .= "frm2['" . $row['nm_fg'] . "'] = {
stok2:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
							</select>
                        <input readonly class="form-control" id="nm_fg2" name="nm_fg2"  value= "<?php echo $d['nm_fg2'];?>" placeholder="input dalam satuan Sak" >
					   <input readonly class="form-control" id="stok2" name="stok2" placeholder="Stok Finish Good" onClick="sum1();">
					    <input type="hidden"  class="form-control" id="qty2" name="qty2"  value= "<?php echo $d['qty2'];?>" placeholder="input dalam satuan Sak" onClick="sum1();">
					    <input type="hidden"  class="form-control" id="undeliv2" name="undeliv2"  placeholder="input dalam satuan Sak" onClick="sum1();" >
					     <input type="hidden"  class="form-control" id="undelivb" name="undelivb"  value= "<?php echo $d['undeliv2'];?>" placeholder="input dalam satuan Sak" onClick="sum1();" >
						  <input type="text" class="form-control" id="kirim2" name="kirim2"  placeholder="Masukan Jumlah yang akan dikirim" onKeyUp="sum();">
						 <label for="exampleInputEmail2">Sisa SO Ke-2</label>
						 <input readonly class="form-control" id="sisa2" name="sisa2"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum1();" >
						   <input type="hidden"  class="form-control" id="sisab" name="sisab" value= "<?php echo $d['sisa2'];?>"   placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum1();" >
						 <label for="exampleInputEmail2">Sisa Stok</label>
						 <input readonly class="form-control" id="sisastok2" name="sisastok2"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum1();" value="0" >		
						    <label for="exampleInputEmail2">Expierd Date Product2</label>
                        <input type="date" class="form-control" id="exp2" name="exp2"  >  
                      </div> 

					   
					     
					    <br>
					  <br>
					  <br>
					    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg3a" id="nm_fg3a" onchange="changefg3(this.value)" >
					<option value=''></option>
					<?php 
					$result3 = mysql_query("select * from stok_fg order by id");    
					$jsArray3 = "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray3 .= "frm3['" . $row['nm_fg'] . "'] = {
stok3:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					  <input readonly class="form-control" id="nm_fg3" name="nm_fg3"  value= "<?php echo $d['nm_fg3'];?>" placeholder="input dalam satuan Sak" >
					   <input readonly class="form-control" id="stok3" name="stok3" placeholder="Stok Finish Good" onClick="sum2();">
					    <input type="hidden"  class="form-control" id="qty3" name="qty3"  value= "<?php echo $d['qty3'];?>" placeholder="input dalam satuan Sak" onClick="sum2();">
					  <input type="hidden"  class="form-control" id="undeliv3" name="undeliv3"   placeholder="input dalam satuan Sak" onClick="sum2();" >
						<input type="hidden"  class="form-control" id="undelivc" name="undelivc"  value= "<?php echo $d['undeliv3'];?>" placeholder="input dalam satuan Sak" onClick="sum2();" >
						<input type="text"class="form-control" id="kirim3" name="kirim3"  placeholder="Masukan Jumlah yang akan dikirim" onKeyUp="sum2();">
						 <label for="exampleInputEmail3">Sisa SO Ke-3</label>
						  <input readonly class="form-control" id="sisa3" name="sisa3"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum2();" >
						   <input type="hidden"  class="form-control" id="sisac" name="sisac"  value= "<?php echo $d['sisa3'];?>"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum2();" >
						 <label for="exampleInputEmail3">Sisa Stok</label>
						 <input readonly class="form-control" id="sisastok3" name="sisastok3"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum2();" value="0" >		
						    <label for="exampleInputEmail3">Expierd Date Product3</label>
                        <input type="date" class="form-control" id="exp3" name="exp3"  >  
                      </div>  
  
					    <br>
					  <br>
					  <br>
					    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-4</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nm_fg4a" id="nm_fg4a" onchange="changefg4(this.value)" >
					<option value=''></option>
					<?php 
					$result4 = mysql_query("select * from stok_fg order by id");    
					$jsArray4 = "var frm4 = new Array();
";        
					while ($row = mysql_fetch_array($result4)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray4 .= "frm4['" . $row['nm_fg'] . "'] = {
stok4:'" . addslashes($row['stok']) . "'


};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					   <input readonly class="form-control" id="nm_fg4" name="nm_fg4"  value= "<?php echo $d['nm_fg4'];?>" placeholder="input dalam satuan Sak" >
					   <input readonly class="form-control" id="stok4" name="stok4" placeholder="Stok Finish Good" onClick="sum3();">
					   <input type="hidden"  class="form-control" id="qty4" name="qty4"  value= "<?php echo $d['qty4'];?>" placeholder="input dalam satuan Sak" onClick="sum3();">
					    <input type="hidden"  class="form-control" id="undeliv4" name="undeliv4"  placeholder="input dalam satuan Sak" onClick="sum3();" >
					     <input type="hidden"  class="form-control" id="undelivd" name="undelivd"  value= "<?php echo $d['undeliv4'];?>" placeholder="input dalam satuan Sak" onClick="sum3();" >
					   <input type="text" class="form-control" id="kirim4" name="kirim4"  placeholder="Masukan Jumlah yang akan dikirim" onKeyUp="sum3();">
						 <label for="exampleInputEmail4">Sisa SO Ke-4</label>
						 <input readonly class="form-control" id="sisa4" name="sisa4"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum3();" >
						  <input type="hidden"  class="form-control" id="sisad" name="sisad" value= "<?php echo $d['sisa4'];?>"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum3();" >
						 <label for="exampleInputEmail4">Sisa Stok</label>
						 <input readonly class="form-control" id="sisastok4" name="sisastok4"  placeholder="Klik Disini" required data-fv-notempty-message="Tidak boleh kosong" onClick="sum3();" value="0" >		
						    <label for="exampleInputEmail4">Expierd Date Product4</label>
                        <input type="date" class="form-control" id="exp4" name="exp4"  >  
                      </div>   

					
		  
	  			
						<script>
					  	<?php 
						echo 
						$jsArray1; 
						?>  
						 
						function changefg1(value){ 
	
						document.getElementById('stok1').value = frm1[value].stok1;
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changefg2(value){ 
	
						document.getElementById('stok2').value = frm2[value].stok2;
						
						
						
						
						};  
	  					</script>
					  
					  <script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changefg3(value){ 
	
						document.getElementById('stok3').value = frm3[value].stok3;
						
						
						
						
						};  
	  					</script>
						
						  <script>
					  	<?php 
						echo 
						$jsArray4; 
						?>  
						 
						function changefg4(value){ 
	
						document.getElementById('stok4').value = frm4[value].stok4;
						
						
						
						
						};  
	  					</script>
					  
					  
					    <script>
						  function sum() {
							var txt1 = document.getElementById('stok1').value;
							var txt2 = document.getElementById('undeliv1').value;
							var txt3 = document.getElementById('sisa1').value;
							var txt4 = document.getElementById('sisastok1').value;
							var txt5 = document.getElementById('qty1').value;
							var txt6 = document.getElementById('kirim1').value;
							var txt7 = document.getElementById('undeliva').value;
							var txt8 = document.getElementById('sisaa').value;
							
							var result1 = parseInt(txt6)+parseInt(txt8);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa1').value = result1;
							}
							
							var result2 = parseInt(txt6)+parseInt(txt7) ;
      						if (!isNaN(result2)) {
         					document.getElementById('undeliv1').value = result2;
							}
							
							var result3 = parseInt(txt1)-parseInt(txt6);
      						if (!isNaN(result3)) {
         					document.getElementById('sisastok1').value = result3;
							}
							}
							</script>
							
							
							  <script>
						  function sum1() {
							var txt1 = document.getElementById('stok2').value;
							var txt2 = document.getElementById('undeliv2').value;
							var txt3 = document.getElementById('sisa2').value;
							var txt4 = document.getElementById('sisastok2').value;
							var txt5 = document.getElementById('qty2').value;
							var txt6 = document.getElementById('kirim2').value;
							var txt7 = document.getElementById('undelivb').value;
							var txt8 = document.getElementById('sisab').value;
							
							var result1 = parseInt(txt6)+parseInt(txt8);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa2').value = result1;
							}
							
							var result2 = parseInt(txt6)+parseInt(txt7) ;
      						if (!isNaN(result2)) {
         					document.getElementById('undeliv2').value = result2;
							}
							
							var result3 = parseInt(txt1)+0-parseInt(txt6);
      						if (!isNaN(result3)) {
         					document.getElementById('sisastok2').value = result3;
							}
							}
							</script>
							
							 <script>
						  function sum2() {
							var txt1 = document.getElementById('stok3').value;
							var txt2 = document.getElementById('undeliv3').value;
							var txt3 = document.getElementById('sisa3').value;
							var txt4 = document.getElementById('sisastok3').value;
							var txt5 = document.getElementById('qty3').value;
							var txt6 = document.getElementById('kirim3').value;
							var txt7 = document.getElementById('undelivc').value;
							var txt8 = document.getElementById('sisac').value;
							
							var result1 = parseInt(txt6)+parseInt(txt8);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa3').value = result1;
							}
							
							var result2 = parseInt(txt6)+parseInt(txt7) ;
      						if (!isNaN(result2)) {
         					document.getElementById('undeliv3').value = result2;
							}
							
							var result3 = parseInt(txt1)-parseInt(txt6);
      						if (!isNaN(result3)) {
         					document.getElementById('sisastok3').value = result3;
							}
							}
							</script>
							
							 <script>
						  function sum3() {
							var txt1 = document.getElementById('stok4').value;
							var txt2 = document.getElementById('undeliv4').value;
							var txt3 = document.getElementById('sisa4').value;
							var txt4 = document.getElementById('sisastok4').value;
							var txt5 = document.getElementById('qty4').value;
							var txt6 = document.getElementById('kirim4').value;
							var txt7 = document.getElementById('undelivd').value;
							var txt8 = document.getElementById('sisad').value;
							
							var result1 = parseInt(txt6)+parseInt(txt8);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa4').value = result1;
							}
							
							var result2 = parseInt(txt6)+parseInt(txt7) ;
      						if (!isNaN(result2)) {
         					document.getElementById('undeliv4').value = result2;
							}
							
							var result3 = parseInt(txt1)-parseInt(txt6);
      						if (!isNaN(result3)) {
         					document.getElementById('sisastok4').value = result3;
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
      case 'add':
      ?><body bgcolor="#000000" text="#339933" link="#33FF00" vlink="#666666" alink="#666600">

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
   
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                         <th width="72" style="text-align: left">No</th>
                         <th  width="147" style="text-align: left">Nomor Sales Order</th>
                         <th  width="147" style="text-align: left">Nama Customer</th>
                         <th  width="147" style="text-align: left">Tanggal SO</th>
						 <th width="115" style="text-align: left">cetak Bukti Potong</th>
									
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
							          <td style="text-align: left"><?php echo "$r[no_so]"?></td>
                                      <td align="left" style="text-align: left"><?php echo "$r[nm_cust]"?></td>
                                      <td align="center" style="text-align: left"><?php echo TanggalIndo($r['tgl'])?></td>
									    <td><a href="cetak_fgout.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-blue">
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
