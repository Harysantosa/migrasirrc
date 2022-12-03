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
        <h1>Data Verifikasi Penggunaan RM</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Verifikasi RM</ol>
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
                  <table width="966" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="57">No</th>
                        <th width="242">NO Planing</th>
  						<th width="127">Nama Produk</th>
						<th width="127">Rilis</th>
						
			
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM gudangrm order by id desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[plan_prod]"?></td>
				        <td><?php echo "$r[nm_fg]"?></td>
            			 <td><a href="?pg=gudangrm&act=add&id=<?php echo $r['id']?>" target="_blank" ><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"> POTONG STOK</i></button></a></td>
						
						
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
	  $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_rm WHERE id='$_GET[id]'"));
	  $b = mysql_fetch_array(mysql_query("SELECT * FROM stok_label WHERE id='$_GET[id]'"));
	  $d = mysql_fetch_array(mysql_query("SELECT * FROM gudangrm WHERE id='$_GET[id]'"));
	  
      	if  (isset($_POST['add'])){
		 if  ($_POST['sisat1']>='0'&&$_POST['sisat2']>= '0'&&$_POST['sisa1']>= '0'&&$_POST['sisa2']>= '0'&&$_POST['sisa3']>= '0'&&$_POST['sisa4']>= '0'&&$_POST['sisa5']>= '0'
		 &&$_POST['sisa6']>= '0'&&$_POST['sisa7']>= '0'&&$_POST['sisa8']>= '0'&&$_POST['sisa9']>= '0'&&$_POST['sisa10']>= '0'&&$_POST['sisa11']>= '0'&&$_POST['sisa12']>= '0'
		 &&$_POST['sisa13']>= '0'&&$_POST['sisa14']>= '0'&&$_POST['sisa15']>= '0'&&$_POST['sisa16']>= '0'&&$_POST['sisa17']>= '0'){
	  
	   
	   
	   		  	 mysql_query("INSERT INTO rekapcutrm VALUES ('','$_POST[plan_prod]','$_POST[nm_fg]'
				,'$_POST[tgl]','$_POST[shift]','$_POST[lot]','$_POST[terigua]','$_POST[jmlt1]','$_POST[terigub]','$_POST[jmlt2]','$_POST[r1]'
				,'$_POST[jml1]','$_POST[r2]','$_POST[jml2]','$_POST[r3]','$_POST[jml3]','$_POST[r4]','$_POST[jml4]','$_POST[r5]'
				,'$_POST[jml5]','$_POST[r6]','$_POST[jml6]','$_POST[r7]','$_POST[jml7]','$_POST[r8]','$_POST[jml8]','$_POST[r9]'
				,'$_POST[jml9]','$_POST[r10]','$_POST[jml10]','$_POST[r11]','$_POST[jml11]','$_POST[r12]','$_POST[jml12]','$_POST[r13]'
				,'$_POST[jml13]','$_POST[r14]','$_POST[jml14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]'
				,'$_POST[rm17]','$_POST[r18]','$_POST[rm18]','$_POST[status]')");
		  
		  		mysql_query("DELETE FROM gudangrm WHERE id='$_GET[id]'");
		        echo "<script> alert('data berhasil disimpan dan stok terpotong !');window.location='home.php?pg=gudangrm&act=view'</script>";
              }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Karna Beberapa Stok Kurang !');</script>";
			   }
			   
			   }
              ?>

   
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Verifikasi RM OUT</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Planing</a></li>
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

  
					
                  
					 
                  
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">No Plan Produksi</label>
                      <input readonly class="form-control" id="plan_prod" name="plan_prod" value= "<?php echo $d['plan_prod'];?>" >
					   <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					 
                    </div>
				
					 <div class="form-group"> Nama produk
					<input readonly class="form-control" id="nm_fg" name="nm_fg" value="<?php echo $d['nm_fg'];?>">
					</div>
					
					 <div class="form-group"> Tanggal Produksi
					<input readonly class="form-control" id="tgl" name="tgl" value="<?php echo $d['tgl'];?>">
					</div>
					
					 <div class="form-group"> Shift
					<input readonly class="form-control" id="shift" name="shift" value="<?php echo $d['shift'];?>">
					</div>
					
					 <div class="form-group"> Jumlah Batch
					<input readonly class="form-control" id="lot" name="lot" value="<?php echo $d['lot'];?>">
					</div>
					
					 
					<div class="form-group">
                      <label for="exampleInputEmail1">Terigu Standart</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="terigua" id="terigua" onchange="changeid(this.value)" >
					<option value=''>-Pilih Terigu-</option>
					<?php 
					$result = mysql_query("select * from stok_rm");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray .= "frm['" . $row['nm_rm'] . "'] = {
stok:'" . addslashes($row['stok']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					  
					    <input readonly class="form-control" id="stok" name="stok" onKeyUp="sum();" > 
						 <input readonly class="form-control"   id="jmlt1" name="jmlt1" value="<?php echo $d['jmlt1'];?>" onKeyUp="sum();" >
						  <input readonly class="form-control"   id="sisat1" name="sisat1" onClick="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					   </div>
					   
					   
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Terigu Premium</label> <br>
					   <select class="form-control select2" style="width: 100%;" name="terigub" id="terigub" onchange="changetrf(this.value)" >
					<option value=''>-Pilih Terigu-</option>
					<?php 
					$result2 = mysql_query("select * from stok_rm");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['nm_rm'] . '">' . $row['nm_rm'] . '</option>';    
$jsArray2 .= "frm2['" . $row['nm_rm'] . "'] = {
stok:'" . addslashes($row['stok']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					  
					
					  <input readonly class="form-control" id="stok1" name="stok" onKeyUp="sum();" >
					   <input readonly class="form-control"   id="jmlt2" name="jmlt2" value="<?php echo $d['jmlt2'];?>"  onKeyUp="sum();" >
					    <input readonly class="form-control"   id="sisat2" name="sisat2" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					</div>
							
							 
					 	<div class="form-group">
                      <label for="exampleInputEmail1">Pilih Label</label> <br>
					   <select class="form-control select2" style="width: 100%;" name="r15" id="r15" onchange="changelabel(this.value)" >
					<option value=''>-Pilih Label-</option>
					<?php 
					$result1 = mysql_query("select * from stok_label");    
					$jsArray1 = "var frm1 = new Array();
";        
					while ($row = mysql_fetch_array($result1)) {    
					echo '
<option value="' . $row['nm_label'] . '">' . $row['nm_label'] . '</option>';    
$jsArray1 .= "frm1['" . $row['nm_label'] . "'] = {
stok:'" . addslashes($row['stok']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					  <input readonly class="form-control" id="stok3" name="stok" >
					 <input readonly class="form-control"   id="rm15" name="rm15" value="<?php echo $d['rm15'];?>" onKeyUp="sum();" >
						  <input readonly class="form-control"   id="sisa15" name="sisa15" onClick="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					   </div>	
					
					 <div class="form-group">
					<input readonly class="form-control" id="r1" name="r1" value="<?php echo $d['r1'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='1'"));
					   ?>
					  <input readonly class="form-control"   id="prxa" name="prxa" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                     <input readonly class="form-control"   id="jml1" name="jml1" value="<?php echo $d['jml1'];?>" onKeyUp="sum();" >
					 <input readonly class="form-control"   id="sisa1" name="sisa1" onKeyUp="sum();" placeholder="tekan tombol tab" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
				 	<div class="form-group">
					<input readonly class="form-control" id="r2" name="r2" value="<?php echo $d['r2'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='2'"));
					   ?>
					  <input readonly class="form-control"   id="prxb" name="prxb" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
					  <input readonly class="form-control"   id="jml2" name="jml2" value="<?php echo $d['jml2'];?>" onKeyUp="sum();" >
                    
					  <input readonly class="form-control"   id="sisa2" name="sisa2" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r3" name="r3" value="<?php echo $d['r3'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='3'"));
					   ?>
					  <input readonly class="form-control"   id="prxc" name="prxc" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control"   id="jml3" name="jml3" value="<?php echo $d['jml3'];?>" onKeyUp="sum();" >
					   
					  <input readonly class="form-control"   id="sisa3" name="sisa3" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
			
						
						<div class="form-group">
					<input readonly class="form-control" id="r4" name="r4" value="<?php echo $d['r4'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='4'"));
					   ?>
					  <input readonly class="form-control"   id="prxd" name="prxd" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml4" name="jml4" value="<?php echo $d['jml4'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa4" name="sisa4" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
				
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r5" name="r5" value="<?php echo $d['r5'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='5'"));
					   ?>
					  <input readonly class="form-control"   id="prxe" name="prxe" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml5" name="jml5" value="<?php echo $d['jml5'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa5" name="sisa5" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					
				   <div class="form-group">
					<input readonly class="form-control" id="r6" name="r6" value="<?php echo $d['r6'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='6'"));
					   ?>
					  <input readonly class="form-control"   id="prx1" name="prx1" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml6" name="jml6" value="<?php echo $d['jml6'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa6" name="sisa6" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r7" name="r7" value="<?php echo $d['r7'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='7'"));
					   ?>
					  <input readonly class="form-control"   id="prx2" name="prx2" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml7" name="jml7" value="<?php echo $d['jml7'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa7" name="sisa7" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r8" name="r8" value="<?php echo $d['r8'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='8'"));
					   ?>
					  <input readonly class="form-control"   id="prx3" name="prx3" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml8" name="jml8" value="<?php echo $d['jml8'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa8" name="sisa8" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r9" name="r9" value="<?php echo $d['r9'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='9'"));
					   ?>
					  <input readonly class="form-control"   id="prx4" name="prx4" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml9" name="jml9" value="<?php echo $d['jml9'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa9" name="sisa9" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r10" name="r10" value="<?php echo $d['r10'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='10'"));
					   ?>
					  <input readonly class="form-control"   id="prx5" name="prx5" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml10" name="jml10" value="<?php echo $d['jml10'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa10" name="sisa10" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r11" name="r11" value="<?php echo $d['r11'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='11'"));
					   ?>
					  <input readonly class="form-control"   id="prx6" name="prx6" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml11" name="jml11" value="<?php echo $d['jml11'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa11" name="sisa11" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					    <div class="form-group">
					<input readonly class="form-control" id="r12" name="r12" value="<?php echo $d['r12'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='12'"));
					   ?>
					  <input readonly class="form-control"   id="ragi" name="ragi" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml12" name="jml12" value="<?php echo $d['jml12'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa12" name="sisa12" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					   <div class="form-group">SH
					<input readonly class="form-control" id="r13" name="r13" value="<?php echo $d['r13'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='13'"));
					   ?>
					  <input readonly class="form-control"   id="short" name="short" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml13" name="jml13" value="<?php echo $d['jml13'];?>" onKeyUp="sum();" >
					
					  <input readonly class="form-control"   id="sisa13" name="sisa13" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					    <div class="form-group">
					<input readonly class="form-control" id="r14" name="r14" value="<?php echo $d['r14'];?>">
					<?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_fgpremix WHERE id='14'"));
					   ?>
					  <input readonly class="form-control"   id="marg" name="marg" value="<?php echo $a['stok'];?>" onKeyUp="sum();" >
                    <input readonly class="form-control" id="jml14" name="jml14" value="<?php echo $d['jml14'];?>" onKeyUp="sum();" >
					 
					  <input readonly class="form-control"   id="sisa14" name="sisa14" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					  
					 
					  
		
					
					 <div class="form-group">
					<input readonly class="form-control" id="r16" name="r16" value="<?php echo $d['r16'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_label WHERE id='12'"));
					   ?>
					  <input readonly class="form-control"   id="tnj" name="tnj" value="<?php echo $a['stok'];?>"  onKeyUp="sum();">
                    <input readonly class="form-control" id="rm16" name="rm16" value="<?php echo $d['rm16'];?>"  onKeyUp="sum();">
					
					  <input readonly class="form-control"   id="sisa16" name="sisa16" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					
		
					
					<div class="form-group">F
					<input readonly class="form-control" id="r17" name="r17" value="<?php echo $d['r17'];?>">
					 <?php
					   $a = mysql_fetch_array(mysql_query("SELECT * FROM stok_label WHERE id='13'"));
					   ?>
					  <input readonly class="form-control"   id="polos" name="polos" value="<?php echo $a['stok'];?>" onKeyUp="sum();">
                    <input readonly class="form-control" id="rm17" name="rm17" value="<?php echo $d['rm17'];?>" onKeyUp="sum();">
					
					  <input readonly class="form-control"   id="sisa17" name="sisa17" onKeyUp="sum();" placeholder="klik untuk kolom dijumlah" required data-fv-notempty-message="Tidak boleh kosong">
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r18" name="r18" value="<?php echo $d['r18'];?>">
                    <input readonly class="form-control" id="rm18" name="rm18" value="<?php echo $d['rm18'];?>">
					</div>
					  
					  
					 <div class="form-group"> Status Proses
					<input type readonly class="form-control" id="status" name="status" value="Berhasil Dipotong">
                    </div>			
					
					
									 <script> 
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeid(fgh){ 
		
		document.getElementById('stok').value = frm[fgh].stok;
	  
		
		
			}; 
			</script>
			
			 <script> 
	<?php 
	echo 
		$jsArray2; 
	?>  	
			
			function changetrf(value){ 
		
		document.getElementById('stok1').value = frm2[value].stok;
	  
		
		
			}; 
			
			
			</script> 
			
			<script>
			<?php 
	echo 
		$jsArray1; 
	?>  
	function changelabel(label){ 
		
		document.getElementById('stok3').value = frm1[label].stok;
	  
		
		
			}; 
			</script>
			
			
			
			
			
			
				<script>
			
					 
						function sum() {
							var txt1 = document.getElementById('stok').value;
      						var txt2 = document.getElementById('jmlt1').value;
							var txt3 = document.getElementById('sisat1').value;
							
							var txt4 = document.getElementById('stok1').value;
							var txt5 = document.getElementById('jmlt2').value;
							var txt6 = document.getElementById('sisat2').value;
							
							var txt7 = document.getElementById('prxa').value;
							var txt8 = document.getElementById('jml1').value;
							var txt9 = document.getElementById('sisa1').value;
							
							var txt10 = document.getElementById('prxb').value;
							var txt11 = document.getElementById('jml2').value;
							var txt12 = document.getElementById('sisa2').value;
							
							var txt13 = document.getElementById('prxc').value;
							var txt14 = document.getElementById('jml3').value;
							var txt15 = document.getElementById('sisa3').value;
							
							var txt16 = document.getElementById('prxd').value;
							var txt17 = document.getElementById('jml4').value;
							var txt18 = document.getElementById('sisa4').value;
							
							var txt19 = document.getElementById('prxe').value;
							var txt20 = document.getElementById('jml5').value;
							var txt21 = document.getElementById('sisa5').value;
							
							var txt22 = document.getElementById('prx1').value;
							var txt23 = document.getElementById('jml6').value;
							var txt24 = document.getElementById('sisa6').value;
							
							var txt25 = document.getElementById('prx2').value;
							var txt26 = document.getElementById('jml7').value;
							var txt27 = document.getElementById('sisa7').value;
							
							var txt28= document.getElementById('prx3').value;
							var txt29 = document.getElementById('jml8').value;
							var txt30 = document.getElementById('sisa8').value;
							
							var txt31= document.getElementById('prx4').value;
							var txt32 = document.getElementById('jml9').value;
							var txt33 = document.getElementById('sisa9').value;
							
							var txt34= document.getElementById('prx5').value;
							var txt35 = document.getElementById('jml10').value;
							var txt36 = document.getElementById('sisa10').value;
							
							var txt37= document.getElementById('prx6').value;
							var txt38 = document.getElementById('jml11').value;
							var txt39 = document.getElementById('sisa11').value;
							
							var txt40= document.getElementById('ragi').value;
							var txt41 = document.getElementById('jml12').value;
							var txt42 = document.getElementById('sisa12').value;
																	
							var txt43= document.getElementById('short').value;
							var txt44 = document.getElementById('jml13').value;
							var txt45 = document.getElementById('sisa13').value;
							
							var txt46= document.getElementById('marg').value;
							var txt47 = document.getElementById('jml14').value;
							var txt48 = document.getElementById('sisa14').value;
												
							var txt49= document.getElementById('tnj').value;
							var txt50 = document.getElementById('rm16').value;
							var txt51 = document.getElementById('sisa16').value;
							
							var txt52= document.getElementById('polos').value;
							var txt53 = document.getElementById('rm17').value;
							var txt54 = document.getElementById('sisa17').value;
							
							var txt55= document.getElementById('stok3').value;
							var txt56 = document.getElementById('rm15').value;
							var txt57 = document.getElementById('sisa15').value;
							
							
							var result1 = (txt1)-(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisat1').value = result1;
							}
							
							var result2 = (txt4)-(txt5);
      						if (!isNaN(result2)) {
         					document.getElementById('sisat2').value = result2;
							}
							
							var result3 = (txt7)-(txt8);
      						if (!isNaN(result3)) {
         					document.getElementById('sisa1').value = result3;
							}
							
							var result4 = (txt10)-(txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('sisa2').value = result4;
							}
							
							var result5 = (txt13)-(txt14);
      						if (!isNaN(result5)) {
         					document.getElementById('sisa3').value = result5;
							}
							
							var result6 = (txt16)-(txt17);
      						if (!isNaN(result6)) {
         					document.getElementById('sisa4').value = result6.toFixed(1);
							}
							
							var result7 = (txt19)-(txt20);
      						if (!isNaN(result7)) {
         					document.getElementById('sisa5').value = result7;
							}
							
							
							var result8 = (txt22)-(txt23);
      						if (!isNaN(result8)) {
         					document.getElementById('sisa6').value = result8;
							}
							
							var result9 = (txt25)-(txt26);
      						if (!isNaN(result9)) {
         					document.getElementById('sisa7').value = result9.toFixed(1);
							}
							
							var result10 = (txt28)-(txt29);
      						if (!isNaN(result10)) {
         					document.getElementById('sisa8').value = result10;
							}
							
							var result11 = (txt31)-(txt32);
      						if (!isNaN(result11)) {
         					document.getElementById('sisa9').value = result11.toFixed(1);
							}
							
							var result12 = (txt34)-(txt35);
      						if (!isNaN(result12)) {
         					document.getElementById('sisa10').value = result12;
							}
							
							var result13= (txt37)-(txt38);
      						if (!isNaN(result13)) {
         					document.getElementById('sisa11').value = result13;
							}
							
							var result14= (txt40)-(txt41);
      						if (!isNaN(result14)) {
         					document.getElementById('sisa12').value = result14;
							}
														
							var result15= (txt43)-(txt44);
      						if (!isNaN(result15)) {
         					document.getElementById('sisa13').value = result15;
							}
							
							var result16= (txt46)-(txt47);
      						if (!isNaN(result16)) {
         					document.getElementById('sisa14').value = result16;
							}
							
							var result17= (txt49)-(txt50);
      						if (!isNaN(result17)) {
         					document.getElementById('sisa16').value = result17;
							}
							
							var result18= (txt52)-(txt53);
      						if (!isNaN(result18)) {
         					document.getElementById('sisa17').value = result18;
							}
							
							var result19= (txt55)-(txt56);
      						if (!isNaN(result19)) {
         					document.getElementById('sisa15').value = result19;
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

              <button type="submit" name = 'add' class="btn btn-info">VERIFY RM OUT</button>
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

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM gudang_rm WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=gudangrm&act=view'</script>";
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