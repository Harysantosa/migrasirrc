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
      <a href="?pg=gudangrm&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Verifikasi Data</i></button> </a>
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
                        <th width="201">Tgl Produksi</th>
						<th width="127">Nama Produk</th>
						<th width="71">Batch</th>
						<th width="125">Cetak RM Out</th>
						<th width="125">Rool Back Stok RM</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM gudang_rm GROUP by id desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[no_plan]"?></td>
						<td><?php echo TanggalIndo($r['tgl'])?></td>
                        <td><?php echo "$r[nm_fg]"?></td>
                        <td><?php echo "$r[batch1]"?></td>
						<td><a href="cetak_gudangrm.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-blue">
						<i class="fa fa-print" target=_blank></i></button></a></td>
						<td><a href="?pg=gudangrm&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-primary" onclick="return confirm('apakah anda yakin ingin mengembalikan stok RM?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
      case 'add1':
			 $d = mysql_fetch_array(mysql_query("SELECT * FROM stok_rm WHERE nm_rm='$_GET[nm_rm]'"));
			
      if (isset($_POST['add1'])) {
              		      
		  	  $query .= mysql_query("INSERT INTO gudang_rm VALUES ('','$_POST[no_plan]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[nm_fg]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]')");
		  		  
		  		
                echo "<script>window.location='home.php?pg=gudangrm&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Verifikasi Data Raw Material</h1>
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
                <form name="form1" role="form" method = "POST" action="cekbarang.php">
                  <div class="box-body">
					  
									  
					  
				<div class="form-group">
                      <label for="exampleInputEmail1">Planing Produksi</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_plan" id="no_plan" onchange="changeValue(this.value)" >
					<option value=''>-Pilih Planing Produksi-</option>
					<?php 
					$result = mysql_query("select * from planprod order by id desc ");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_plan'] . '">' . $row['no_plan'] . '</option>';    
$jsArray .= "frm['" . $row['no_plan'] . "'] = {
tgl:'".addslashes($row['tgl'])."',
shift:'".addslashes($row['shift'])."',
batch1:'".addslashes($row['batch1'])."',
nm_fg:'".addslashes($row['nm_fg'])."',

r1:'" . addslashes($row['r1']) . "',
rm1:'".addslashes($row['rm1'])."',


r2:'".addslashes($row['r2'])."',
rm2:'".addslashes($row['rm2'])."',

r3:'".addslashes($row['r3'])."',
rm3:'".addslashes($row['rm3'])."',

r4:'".addslashes($row['r4'])."',
rm4:'".addslashes($row['rm4'])."',

r5:'".addslashes($row['r5'])."',
rm5:'".addslashes($row['rm5'])."',

r6:'".addslashes($row['r6'])."',
rm6:'".addslashes($row['rm6'])."',

r7:'".addslashes($row['r7'])."',
rm7:'".addslashes($row['rm7'])."',

r8:'".addslashes($row['r8'])."',
rm8:'".addslashes($row['rm8'])."',

r9:'".addslashes($row['r9'])."',
rm9:'".addslashes($row['rm9'])."',

r10:'".addslashes($row['r10'])."',
rm10:'".addslashes($row['rm10'])."',
r11:'".addslashes($row['r11'])."',
rm11:'".addslashes($row['rm11'])."',
r12:'".addslashes($row['r12'])."',
rm12:'".addslashes($row['rm12'])."',
r12:'".addslashes($row['r12'])."',
rm12:'".addslashes($row['rm12'])."',
r13:'".addslashes($row['r13'])."',
rm13:'".addslashes($row['rm13'])."',

r14:'".addslashes($row['r14'])."',
rm14:'".addslashes($row['rm14'])."',

r15:'".addslashes($row['r15'])."',
rm15:'".addslashes($row['rm15'])."',

r16:'".addslashes($row['r16'])."',
rm16:'".addslashes($row['rm16'])."',

r17:'".addslashes($row['r17'])."',
rm17:'".addslashes($row['rm17'])."',

r18:'".addslashes($row['r18'])."',
rm18:'".addslashes($row['rm18'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
																			
					<div class="form-group">
                      <input type="hidden" class="form-control" id="no" name="no" placeholder="Nomor Planing" equired data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
					
										                    
					<div class="form-group">                  
                    
					 <input readonly class="form-control" id="r1" name="r1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					
			 	   		<div class="form-group">                  
                   
					 <input readonly class="form-control" id="r2" name="r2" >
				    <input readonly class="form-control" id="rm2" name="rm2" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r3" name="r3"  >
                      <input readonly class="form-control" id="rm3" name="rm3" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r4" name="r4" >
                        <input readonly class="form-control" id="rm4" name="rm4">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r5" name="r5"  >
                        <input readonly class="form-control" id="rm5" name="rm5">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6"  >
                      <input readonly class="form-control" id="rm6" name="rm6" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r7" name="r7"  >
						  <input readonly class="form-control" id="rm7" name="rm7" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8"  >
                      <input readonly class="form-control" id="rm8" name="rm8" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r9" name="r9"  >
                    <input readonly class="form-control" id="rm9" name="rm9" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r10" name="r10"  >
                      <input readonly class="form-control" id="rm10" name="rm10" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" >
                      <input readonly class="form-control" id="rm11" name="rm11" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r12" name="r12"  >
                      <input readonly class="form-control" id="rm12" name="rm12" >
                    </div>
					  
					    <div class="form-group">
					 <input readonly class="form-control" id="r13" name="r13"  >
                      <input readonly class="form-control" id="rm13" name="rm13" >
                    </div>
					   <div class="form-group">
						  <input readonly class="form-control" id="r13" name="r13"  >
                      <input readonly class="form-control" id="rm13" name="rm13" >
				  </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14"  >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r16" name="r16"  >
                      <input readonly class="form-control" id="rm16" name="rm16" >
				  </div>
					
					  
					<div class="form-group">
						  <input readonly class="form-control" id="r17" name="r17" >
                      <input readonly class="form-control" id="rm17" name="rm17" >
				  </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r18" name="r18"   >
                      <input readonly class="form-control" id="rm18" name="rm18"  >
				  </div>
					
					
					
					
					
                    </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.row -->

					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('r1').value = frm[no_form].r1;
		document.getElementById('rm1').value = frm[no_form].rm1; 
		document.getElementById('r2').value = frm[no_form].r2;  
		document.getElementById('rm2').value = frm[no_form].rm2; 
		document.getElementById('r3').value = frm[no_form].r3;  
		document.getElementById('rm3').value = frm[no_form].rm3; 
		document.getElementById('r4').value = frm[no_form].r4;  
		document.getElementById('rm4').value = frm[no_form].rm4; 
		document.getElementById('r5').value = frm[no_form].r5;  
		document.getElementById('rm5').value = frm[no_form].rm5; 
		document.getElementById('r6').value = frm[no_form].r6;  
		document.getElementById('rm6').value = frm[no_form].rm6; 
		document.getElementById('r7').value = frm[no_form].r7;  
		document.getElementById('rm7').value = frm[no_form].rm7; 
		document.getElementById('r8').value = frm[no_form].r8;  
		document.getElementById('rm8').value = frm[no_form].rm8; 
		document.getElementById('r9').value = frm[no_form].r9;  
		document.getElementById('rm9').value = frm[no_form].rm9; 
		document.getElementById('r10').value = frm[no_form].r10;  
		document.getElementById('rm10').value = frm[no_form].rm10; 
		document.getElementById('r11').value = frm[no_form].r11;  
		document.getElementById('rm11').value = frm[no_form].rm11; 
		document.getElementById('r12').value = frm[no_form].r12;  
		document.getElementById('rm12').value = frm[no_form].rm12;
		document.getElementById('r13').value = frm[no_form].r13;  
		document.getElementById('rm13').value = frm[no_form].rm13;
		document.getElementById('pck1').value = frm[no_form].pck1;  
		document.getElementById('pck1a').value = frm[no_form].pck1a;
		document.getElementById('pck2').value = frm[no_form].pck2;  
		document.getElementById('pck2a').value = frm[no_form].pck2a;
		
			};  
					
						function sum() {
							var txt11 = document.getElementById('batch1').value;
							var txt1 = document.getElementById('rm1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt3=document.getElementById('rm3').value;
							var txt4=document.getElementById('rm4').value;
							var txt5=document.getElementById('rm5').value;
							var txt6=document.getElementById('rm6').value;
							var txt7=document.getElementById('rm7').value;
							var txt8=document.getElementById('rm8').value;
							var txt9=document.getElementById('rm9').value;
							var txt10=document.getElementById('rm10').value;
							var txt11a=document.getElementById('rm11').value;
							var txt12=document.getElementById('rm12').value;
							var txt13=document.getElementById('rm13').value;
							var txt14=document.getElementById('rm14').value;
							var txt15=document.getElementById('rm15').value;
							
							
							var result1 =(txt1) * (txt11);
      						if (!isNaN(result1)) {
         					document.getElementById('rm1').value = result1;
							}
							
							var result2 = (txt2) * (txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('rm2').value =result2;
							}
							
							var result2 = (txt3) * (txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('rm3').value = result2.toFixed(1);
							}
							
														
							var result4 = (txt4) * (txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('rm4').value = result4.toFixed(1);
							}
							
							var result5 = (txt5) * (txt11);
      						if (!isNaN(result5)) {
         					document.getElementById('rm5').value = result5.toFixed(1);
							}
							
							var result6 = (txt6) * (txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('rm6').value = result6.toFixed(1);
							}
							
							var result7 = (txt7) * (txt11);
      						if (!isNaN(result7)) {
         					document.getElementById('rm7').value = result7.toFixed(1);
							}
							
							var result8 = (txt8) * (txt11);
      						if (!isNaN(result8)) {
         					document.getElementById('rm8').value = result8.toFixed(1);
							}
							
							var result9 = (txt9) * (txt11);
      						if (!isNaN(result9)) {
         					document.getElementById('rm9').value = result9.toFixed(1);
							}
							
							var result10 = (txt10) * (txt11);
      						if (!isNaN(result10)) {
         					document.getElementById('rm10').value = result10.toFixed(1);
							}
							
							var result11 = (txt11a) * (txt11);
      						if (!isNaN(result11)) {
         					document.getElementById('rm11').value = result11.toFixed(1);
							}
							
							var result12 = (txt12) * (txt11);
      						if (!isNaN(result12)) {
         					document.getElementById('rm12').value = result12.toFixed(1);
							}
							
							var result13 = (txt13) * (txt11);
      						if (!isNaN(result13)) {
         					document.getElementById('rm13').value = result13.toFixed(1);
							}
							
							var result14 = (txt14) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm14').value = result14.toFixed(1);
							}
							
							var result15 = (txt15) * (txt11);
      						if (!isNaN(result15)) {
         					document.getElementById('rm15').value = result15.toFixed(1);
							}
							
							
							
							
							
						}
						
</script> 											  
					
				<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">
 &nbsp;
              <button type="submit"  class="btn btn-info" >Simpan</button>
			
              &nbsp;
				   &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


     
      <?php
      break;
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
			 if (isset($_POST['add'])) {
               $d = mysql_fetch_array(mysql_query("SELECT * FROM stok_rm "));		     
 $query .= mysql_query("INSERT INTO gudang_rm VALUES ('','$_POST[no_plan]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[nm_fg]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]')");
				  echo "<script>window.location='home.php?pg=gudangrm&act=view'</script>";
          }
			
              ?>
				
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Verifikasi Data Raw Material</h1>
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
                      <label for="exampleInputEmail1">Planing Produksi</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_plan" id="no_plan" onchange="changeValue(this.value)" >
					<option value=''>-Pilih Planing Prod-</option>
					<?php 
					$result = mysql_query("select * from planprod order by id desc ");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_plan'] . '">' . $row['no_plan'] . '</option>';    
$jsArray .= "frm['" . $row['no_plan'] . "'] = {
tgl:'".addslashes($row['tgl'])."',
shift:'".addslashes($row['shift'])."',
batch1:'".addslashes($row['batch1'])."',
nm_fg:'".addslashes($row['nm_fg'])."',

r1:'" . addslashes($row['r1']) . "',
rm1:'".addslashes($row['rm1'])."',


r2:'".addslashes($row['r2'])."',
rm2:'".addslashes($row['rm2'])."',

r3:'".addslashes($row['r3'])."',
rm3:'".addslashes($row['rm3'])."',

r4:'".addslashes($row['r4'])."',
rm4:'".addslashes($row['rm4'])."',

r5:'".addslashes($row['r5'])."',
rm5:'".addslashes($row['rm5'])."',

r6:'".addslashes($row['r6'])."',
rm6:'".addslashes($row['rm6'])."',

r7:'".addslashes($row['r7'])."',
rm7:'".addslashes($row['rm7'])."',

r8:'".addslashes($row['r8'])."',
rm8:'".addslashes($row['rm8'])."',

r9:'".addslashes($row['r9'])."',
rm9:'".addslashes($row['rm9'])."',

r10:'".addslashes($row['r10'])."',
rm10:'".addslashes($row['rm10'])."',
r11:'".addslashes($row['r11'])."',
rm11:'".addslashes($row['rm11'])."',
r12:'".addslashes($row['r12'])."',
rm12:'".addslashes($row['rm12'])."',
r12:'".addslashes($row['r12'])."',
rm12:'".addslashes($row['rm12'])."',
r13:'".addslashes($row['r13'])."',
rm13:'".addslashes($row['rm13'])."',

r14:'".addslashes($row['r14'])."',
rm14:'".addslashes($row['rm14'])."',

r15:'".addslashes($row['r15'])."',
rm15:'".addslashes($row['rm15'])."',

r16:'".addslashes($row['r16'])."',
rm16:'".addslashes($row['rm16'])."',

r17:'".addslashes($row['r17'])."',
rm17:'".addslashes($row['rm17'])."',

r18:'".addslashes($row['r18'])."',
rm18:'".addslashes($row['rm18'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
                      <input type="hidden" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					  </div>
					  
                  	 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Produksi</label>
                      <input readonly class="form-control" id="tgl" name="tgl"  >
                    </div>
					  
					  
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Shift Produksi</label>
                      <input readonly class="form-control" id="shift" name="shift" >
                    </div>
					 
					  
					  
					<div class="form-group">
                      <label for="exampleInputEmail1">Aktual Mixing(Batch)</label>
                      <input readonly class="form-control" id="batch1" name="batch1"  >
                    </div><strong></strong>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk </label>
                      <input readonly class="form-control" id="nm_fg" name="nm_fg"  >
                    </div><strong></strong>
                  	 			                    
					                 
                     <div class="form-group">
					
                     <input readonly class="form-control" id="r1" name="r1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					
			 	   		<div class="form-group">                  
                     <div class="form-group">
                     <input readonly class="form-control" id="r2" name="r2" >
				    <input readonly class="form-control" id="rm2" name="rm2" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r3" name="r3"  >
                      <input readonly class="form-control" id="rm3" name="rm3" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r4" name="r4" >
                        <input readonly class="form-control" id="rm4" name="rm4">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r5" name="r5"  >
                        <input readonly class="form-control" id="rm5" name="rm5">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6"  >
                      <input readonly class="form-control" id="rm6" name="rm6" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r7" name="r7"  >
						  <input readonly class="form-control" id="rm7" name="rm7" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8" >
                      <input readonly class="form-control" id="rm8" name="rm8" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r9" name="r9"  >
                    <input readonly class="form-control" id="rm9" name="rm9" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r10" name="r10"  >
                      <input readonly class="form-control" id="rm10" name="rm10" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" >
                      <input readonly class="form-control" id="rm11" name="rm11" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r12" name="r12"  >
                      <input readonly class="form-control" id="rm12" name="rm12" >
                    </div>
							
					<div class="form-group">
						  <input readonly class="form-control" id="r13" name="r13"  >
                      <input readonly class="form-control" id="rm13" name="rm13" >
				  </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14"  >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r16" name="r16"  >
                      <input readonly class="form-control" id="rm16" name="rm16" >
				  </div>
					 
					 <div class="form-group">
						  <input readonly class="form-control" id="r17" name="r17"  >
                      <input readonly class="form-control" id="rm17" name="rm17" >
				  </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r18" name="r18"  >
                      <input readonly class="form-control" id="rm18" name="rm18" >
				  </div>
					 
                    </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.row -->
					
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		document.getElementById('tgl').value = frm[no_form].tgl;
		document.getElementById('shift').value = frm[no_form].shift; 
		document.getElementById('batch1').value = frm[no_form].batch1;  
		document.getElementById('nm_fg').value = frm[no_form].nm_fg; 
		document.getElementById('r1').value = frm[no_form].r1;
		document.getElementById('rm1').value = frm[no_form].rm1; 
		document.getElementById('r2').value = frm[no_form].r2;  
		document.getElementById('rm2').value = frm[no_form].rm2; 
		document.getElementById('r3').value = frm[no_form].r3;  
		document.getElementById('rm3').value = frm[no_form].rm3; 
		document.getElementById('r4').value = frm[no_form].r4;  
		document.getElementById('rm4').value = frm[no_form].rm4; 
		document.getElementById('r5').value = frm[no_form].r5;  
		document.getElementById('rm5').value = frm[no_form].rm5; 
		document.getElementById('r6').value = frm[no_form].r6;  
		document.getElementById('rm6').value = frm[no_form].rm6; 
		document.getElementById('r7').value = frm[no_form].r7;  
		document.getElementById('rm7').value = frm[no_form].rm7; 
		document.getElementById('r8').value = frm[no_form].r8;  
		document.getElementById('rm8').value = frm[no_form].rm8; 
		document.getElementById('r9').value = frm[no_form].r9;  
		document.getElementById('rm9').value = frm[no_form].rm9; 
		document.getElementById('r10').value = frm[no_form].r10;  
		document.getElementById('rm10').value = frm[no_form].rm10; 
		document.getElementById('r11').value = frm[no_form].r11;  
		document.getElementById('rm11').value = frm[no_form].rm11; 
		document.getElementById('r12').value = frm[no_form].r12;  
		document.getElementById('rm12').value = frm[no_form].rm12;
		document.getElementById('r13').value = frm[no_form].r13;  
		document.getElementById('rm13').value = frm[no_form].rm13;
		document.getElementById('r14').value = frm[no_form].r14;  
		document.getElementById('rm14').value = frm[no_form].rm14;
		document.getElementById('r15').value = frm[no_form].r15;  
		document.getElementById('rm15').value = frm[no_form].rm15;
		document.getElementById('r16').value = frm[no_form].r16;  
		document.getElementById('rm16').value = frm[no_form].rm16;
		document.getElementById('r17').value = frm[no_form].r17;  
		document.getElementById('rm17').value = frm[no_form].rm17;
		document.getElementById('r18').value = frm[no_form].r18;  
		document.getElementById('rm18').value = frm[no_form].rm18;
		
		
		
			};  
						function sum() {
							var txt11 = document.getElementById('batch1').value;
							var txt1 = document.getElementById('rm1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt3=document.getElementById('rm3').value;
							var txt4=document.getElementById('rm4').value;
							var txt5=document.getElementById('rm5').value;
							var txt6=document.getElementById('rm6').value;
							var txt7=document.getElementById('rm7').value;
							var txt8=document.getElementById('rm8').value;
							var txt9=document.getElementById('rm9').value;
							var txt10=document.getElementById('rm10').value;
							var txt11a=document.getElementById('rm11').value;
							var txt12=document.getElementById('rm12').value;
							var txt13=document.getElementById('rm13').value;
							var txt14=document.getElementById('rm14').value;
							var txt15=document.getElementById('rm15').value;
							
							
							var result1 =(txt1) * (txt11);
      						if (!isNaN(result1)) {
         					document.getElementById('rm1').value = result1;
							}
							
							var result2 = (txt2) * (txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('rm2').value =result2;
							}
							
							var result2 = (txt3) * (txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('rm3').value = result2.toFixed(1);
							}
							
														
							var result4 = (txt4) * (txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('rm4').value = result4.toFixed(1);
							}
							
							var result5 = (txt5) * (txt11);
      						if (!isNaN(result5)) {
         					document.getElementById('rm5').value = result5.toFixed(1);
							}
							
							var result6 = (txt6) * (txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('rm6').value = result6.toFixed(1);
							}
							
							var result7 = (txt7) * (txt11);
      						if (!isNaN(result7)) {
         					document.getElementById('rm7').value = result7.toFixed(1);
							}
							
							var result8 = (txt8) * (txt11);
      						if (!isNaN(result8)) {
         					document.getElementById('rm8').value = result8.toFixed(1);
							}
							
							var result9 = (txt9) * (txt11);
      						if (!isNaN(result9)) {
         					document.getElementById('rm9').value = result9.toFixed(1);
							}
							
							var result10 = (txt10) * (txt11);
      						if (!isNaN(result10)) {
         					document.getElementById('rm10').value = result10.toFixed(1);
							}
							
							var result11 = (txt11a) * (txt11);
      						if (!isNaN(result11)) {
         					document.getElementById('rm11').value = result11.toFixed(1);
							}
							
							var result12 = (txt12) * (txt11);
      						if (!isNaN(result12)) {
         					document.getElementById('rm12').value = result12.toFixed(1);
							}
							
							var result13 = (txt13) * (txt11);
      						if (!isNaN(result13)) {
         					document.getElementById('rm13').value = result13.toFixed(1);
							}
							
							var result14 = (txt14) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm14').value = result14.toFixed(1);
							}
							
							var result14 = (txt15) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm15').value = result14.toFixed(1);
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

              <button type="submit" name="add"  class="btn btn-info">Simpan </button>
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