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
        <h1>Data PPIC</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data PPIC</ol>
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
                  <table width="995" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="63">No</th>
                        <th width="166">PPIC ID</th>
                        <th width="406">Nama Produk</th>
						<th width="181">Tanggal</th>
						<th width="34">Shift</th>
						<th width="43">Batch</th>
						
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM ppic_plan GROUP by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[ppic_id]"?></td>
						<td><?php echo "$r[nm_fg]"?></td>	
						<td><?php echo TanggalIndo($r['tgl'])?></td>
                        <td><?php echo "$r[shift]"?></td>
                       	<td><?php echo "$r[batch1]"?></td>
                        
						
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
              $query = mysql_query("INSERT INTO ppic_plan VALUES ('','$_POST[ppic_id]','$_POST[nm_fg]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[r1]','$_POST[rm1]','$_POST[r1a]','$_POST[rm1a]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]','$_POST[r19]','$_POST[rm19]','$_POST[r20]','$_POST[rm20]','$_POST[r21]','$_POST[rm21]','$_POST[r22]','$_POST[rm22]')");
		  
		  	  $query .= mysql_query("INSERT INTO ppic_jml VALUES ('','$_POST[ppic_id]','$_POST[batch1]','$_POST[tgl]','$_POST[r1]','$_POST[rm1]','$_POST[r1a]','$_POST[rm1a]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]','$_POST[r19]','$_POST[rm19]','$_POST[r20]','$_POST[rm20]','$_POST[r21]','$_POST[rm21]','$_POST[r22]','$_POST[rm22]')");
		  		  		  
		      

		  		  
		  		
                echo "<script>window.location='home.php?pg=ppic&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Planing PPIC</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing PPIC</a></li>
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
                 <div class="form-group">
					  
					 <?php $kd_trans= kd_ppic2_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="ppic_id"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="ppic_id" value="<?php echo $kd_trans;?>" name="ppic_id"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
						
					<div class="form-group">Tanggal Planing
                    <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong"/>
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
					  
                    <div class="form-group">Batch planing                   
                      <input type="text" class="form-control" id="batch1" name="batch1" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Formula Produksi</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nm_fg" id="nm_fg" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from ppic_form");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray .= "frm['" . $row['nm_fg'] . "'] = {
r1:'" . addslashes($row['r1']) . "',
rm1:'".addslashes($row['rm1'])."',

r1a:'" . addslashes($row['r1a']) . "',
rm1a:'".addslashes($row['rm1a'])."',

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
rm18:'".addslashes($row['rm18'])."',

r19:'".addslashes($row['r19'])."',
rm19:'".addslashes($row['rm19'])."',

r20:'".addslashes($row['r20'])."',
rm20:'".addslashes($row['rm20'])."',

r21:'".addslashes($row['r21'])."',
rm21:'".addslashes($row['rm21'])."',

r22:'".addslashes($row['r22'])."',
rm22:'".addslashes($row['rm22'])."',
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					  
					<div class="form-group">
					 <input readonly class="form-control" id="r1" name="r1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					
					  <div class="form-group">
					  <input readonly class="form-control" id="r1a" name="r1a" >
				    <input readonly class="form-control" id="rm1a" name="rm1a" >
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
						  <input readonly class="form-control" id="r14" name="r14"  >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r16" name="r16"  >
                      <input readonly  class="form-control" id="rm16" name="rm16" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r17" name="r17"  >
                      <input readonly  class="form-control" id="rm17" name="rm17" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r18" name="r18"  >
                      <input readonly  class="form-control" id="rm18" name="rm18" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r19" name="r19"  >
                      <input readonly  class="form-control" id="rm19" name="rm19" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r20" name="r20"  >
                      <input readonly  class="form-control" id="rm20" name="rm20" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r21" name="r21"  >
                      <input readonly  class="form-control" id="rm21" name="rm21" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r22" name="r22"  >
                      <input readonly  class="form-control" id="rm22" name="rm22" > 
                    </div>
					  
					  
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('r1').value = frm[no_form].r1;  
		document.getElementById('rm1').value = frm[no_form].rm1; 
		document.getElementById('r1a').value = frm[no_form].r1a;  
		document.getElementById('rm1a').value = frm[no_form].rm1a; 
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
		document.getElementById('r19').value = frm[no_form].r19;  
		document.getElementById('rm19').value = frm[no_form].rm19; 
		document.getElementById('r20').value = frm[no_form].r20;  
		document.getElementById('rm20').value = frm[no_form].rm20; 
		document.getElementById('r21').value = frm[no_form].r21;  
		document.getElementById('rm21').value = frm[no_form].rm21; 
		document.getElementById('r22').value = frm[no_form].r22;  
		document.getElementById('rm22').value = frm[no_form].rm22; 
		
		
		
		
		
			};  
					
						function sum() {
							var txt11 = document.getElementById('batch1').value;
							var txt1 = document.getElementById('rm1').value;
						   var txt1a = document.getElementById('rm1a').value;
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
							var txt16=document.getElementById('rm16').value;
							var txt17=document.getElementById('rm17').value;
							var txt18=document.getElementById('rm18').value;
							var txt19=document.getElementById('rm19').value;
							var txt20=document.getElementById('rm20').value;
							var txt21=document.getElementById('rm21').value;
							var txt22=document.getElementById('rm22').value;
							
							
							var result1 =(txt1) * (txt11);
      						if (!isNaN(result1)) {
         					document.getElementById('rm1').value = result1;
							}
							
							var result1a =(txt1a) * (txt11);
      						if (!isNaN(result1a)) {
         					document.getElementById('rm1a').value = result1a;
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
							
							var result16 = (txt16) * (txt11);
      						if (!isNaN(result16)) {
         					document.getElementById('rm16').value = result16.toFixed(1);
							}
							
							var result17 = (txt17) * (txt11);
      						if (!isNaN(result17)) {
         					document.getElementById('rm17').value = result17.toFixed(1);
							}
							
							var result18 = (txt18) * (txt11);
      						if (!isNaN(result18)) {
         					document.getElementById('rm18').value = result18.toFixed(1);
							}
							
							var result19 = (txt19) * (txt11);
      						if (!isNaN(result19)) {
         					document.getElementById('rm19').value = result19.toFixed(1);
							}
							
							var result20 = (txt20) * (txt11);
      						if (!isNaN(result20)) {
         					document.getElementById('rm20').value = result20.toFixed(1);
							}
							
							var result21 = (txt21) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm21').value = result21.toFixed(1);
							}
							
							var result22 = (txt22) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm22').value = result22.toFixed(1);
							}
							
							
							
							
						}
						
</script> 						
<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info" onClick="">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  &nbsp;
				  <button input class="btn btn-success" type="button" onClick="sum()">Hitung</button>
				</div>
				</section
                ></form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
	  
	  
 <?php
      break;
      // PROSES TAMBAH DATA PRODUK //
      case 'add2':
      if (isset($_POST['add2'])) {
		  
             $query = mysql_query("INSERT INTO ppic_plan VALUES ('','$_POST[ppic_id]','$_POST[nm_fg]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[r1]','$_POST[rm1]','$_POST[r1a]','$_POST[rm1a]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]','$_POST[r19]','$_POST[rm19]','$_POST[r20]','$_POST[rm20]','$_POST[r21]','$_POST[rm21]','$_POST[r22]','$_POST[rm22]')");
		  
		  	 		  		  
		      

		  		  
		  		
                echo "<script>window.location='home.php?pg=ppic&act=view'</script>";
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
					  
					      <div class="form-group">
                      <label for="exampleInputEmail1">Pilih PPIC ID</label> <br>
                      <select class="form-control select2" id="rm" name="ppic_id" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">Pilih Kode Planing yang ingin di tambah</option>
                     <?php
                $query = mysql_query("SELECT * FROM ppic_jml ORDER BY id desc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['ppic_id']; ?>">
                        <?php echo $row['ppic_id']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					</div>
					
					
					
					<div class="form-group">
					 <input type="hidden" class="form-control" id="id" name="id" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
						
					<div class="form-group">Tanggal Planing
                    <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong"/>
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
					  
                    <div class="form-group">Batch planing                   
                      <input type="text" class="form-control" id="batch1" name="batch1" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
					
					  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Formula Produksi</label> <br>
					
                    <select class="form-control select2" style="width: 100%;" name="nm_fg" id="nm_fg" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from ppic_form");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray .= "frm['" . $row['nm_fg'] . "'] = {
r1:'" . addslashes($row['r1']) . "',
rm1:'".addslashes($row['rm1'])."',

r1a:'" . addslashes($row['r1a']) . "',
rm1a:'".addslashes($row['rm1a'])."',

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
rm18:'".addslashes($row['rm18'])."',

r19:'".addslashes($row['r19'])."',
rm19:'".addslashes($row['rm19'])."',

r20:'".addslashes($row['r20'])."',
rm20:'".addslashes($row['rm20'])."',

r21:'".addslashes($row['r21'])."',
rm21:'".addslashes($row['rm21'])."',

r22:'".addslashes($row['r22'])."',
rm22:'".addslashes($row['rm22'])."',
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					<div class="form-group">
					 <input readonly class="form-control" id="r1" name="r1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					  <div class="form-group">
					  <input readonly class="form-control" id="r1a" name="r1a" >
				    <input readonly class="form-control" id="rm1a" name="rm1a" >
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
						  <input readonly class="form-control" id="r14" name="r14"  >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r16" name="r16"  >
                      <input readonly  class="form-control" id="rm16" name="rm16" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r17" name="r17"  >
                      <input readonly  class="form-control" id="rm17" name="rm17" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r18" name="r18"  >
                      <input readonly  class="form-control" id="rm18" name="rm18" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r19" name="r19"  >
                      <input readonly  class="form-control" id="rm19" name="rm19" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r20" name="r20"  >
                      <input readonly  class="form-control" id="rm20" name="rm20" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r21" name="r21"  >
                      <input readonly  class="form-control" id="rm21" name="rm21" > 
                    </div>
					  
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r22" name="r22"  >
                      <input readonly  class="form-control" id="rm22" name="rm22" > 
                    </div>
					  
					  
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('r1').value = frm[no_form].r1;  
		document.getElementById('rm1').value = frm[no_form].rm1; 
		document.getElementById('r1a').value = frm[no_form].r1a;  
		document.getElementById('rm1a').value = frm[no_form].rm1a; 
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
		document.getElementById('r19').value = frm[no_form].r19;  
		document.getElementById('rm19').value = frm[no_form].rm19; 
		document.getElementById('r20').value = frm[no_form].r20;  
		document.getElementById('rm20').value = frm[no_form].rm20; 
		document.getElementById('r21').value = frm[no_form].r21;  
		document.getElementById('rm21').value = frm[no_form].rm21; 
		document.getElementById('r22').value = frm[no_form].r22;  
		document.getElementById('rm22').value = frm[no_form].rm22; 
		
		
		
		
		
			};  
					
						function sum() {
							var txt11 = document.getElementById('batch1').value;
							var txt1 = document.getElementById('rm1').value;
						   var txt1a = document.getElementById('rm1a').value;
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
							var txt16=document.getElementById('rm16').value;
							var txt17=document.getElementById('rm17').value;
							var txt18=document.getElementById('rm18').value;
							var txt19=document.getElementById('rm19').value;
							var txt20=document.getElementById('rm20').value;
							var txt21=document.getElementById('rm21').value;
							var txt22=document.getElementById('rm22').value;
							
							
							var result1 =(txt1) * (txt11);
      						if (!isNaN(result1)) {
         					document.getElementById('rm1').value = result1;
							}
							
							var result1a =(txt1a) * (txt11);
      						if (!isNaN(result1a)) {
         					document.getElementById('rm1a').value = result1a;

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
							
							var result16 = (txt16) * (txt11);
      						if (!isNaN(result16)) {
         					document.getElementById('rm16').value = result16.toFixed(1);
							}
							
							var result17 = (txt17) * (txt11);
      						if (!isNaN(result17)) {
         					document.getElementById('rm17').value = result17.toFixed(1);
							}
							
							var result18 = (txt18) * (txt11);
      						if (!isNaN(result18)) {
         					document.getElementById('rm18').value = result18.toFixed(1);
							}
							
							var result19 = (txt19) * (txt11);
      						if (!isNaN(result19)) {
         					document.getElementById('rm19').value = result19.toFixed(1);
							}
							
							var result20 = (txt20) * (txt11);
      						if (!isNaN(result20)) {
         					document.getElementById('rm20').value = result20.toFixed(1);
							}
							
							var result21 = (txt21) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm21').value = result21.toFixed(1);
							}
							
							var result22 = (txt22) * (txt11);
      						if (!isNaN(result14)) {
         					document.getElementById('rm22').value = result22.toFixed(1);
							}
							
							
							
							
						}
						
</script> 							  

		  <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add2' class="btn btn-info" onClick="">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
				  &nbsp;
				  <button input class="btn btn-success" type="button" onClick="sum()">Hitung</button>
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
		
  <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM planprod WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
              		
				 mysql_query("UPDATE planprod SET no_plan='$_POST[no_plan]', tgl='$_POST[tgl]', shift='$_POST[shift]', batch1='$_POST[batch1]', nm_fg='$_POST[nm_fg]', jumlahprod='$_POST[jumlahprod]', fg='$_POST[fg]', tepung1='$_POST[tepung1]', r1='$_POST[r1]', rm1='$_POST[rm1]', tepung2='$_POST[tepung2]', r2='$_POST[r2]', rm2='$_POST[rm2]', r3='$_POST[r3]', rm3='$_POST[rm3]', r4='$_POST[r4]', rm4='$_POST[rm4]', r5='$_POST[r5]', rm5='$_POST[rm5]', r6='$_POST[r6]', rm6='$_POST[rm6]', r7='$_POST[r7]', rm7='$_POST[rm7]', r8='$_POST[r8]', rm8='$_POST[rm8]', r9='$_POST[r9]', rm9='$_POST[rm9]', r10='$_POST[r10]', rm10='$_POST[rm10]', r11='$_POST[r11]', rm11='$_POST[rm11]', r12='$_POST[r12]', rm12='$_POST[rm12]', r13='$_POST[r13]', rm13='$_POST[rm13]', r14='$_POST[r14]', rm14='$_POST[rm14]', r15='$_POST[r15]',rm15='$_POST[rm15]' WHERE id='$_POST[id]'");
				
                echo "<script>window.location='home.php?pg=planingprod&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Verifikasi Data Raw Material</h1>
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
					  
					
                  	 <div class="form-group">
                      <label for="exampleInputEmail1">No Plan Prod</label>
                      <input readonly class="form-control" id="no_plan" name="no_plan" value= "<?php echo $d['no_plan'];?>" >
                    </div>
					  
					  <input hidden class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					  
					  
                  	 <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Produksi</label>
                      <input readonly class="form-control" id="date" name="tgl" value= "<?php echo $d['tgl'];?>" >
                    </div>
					  
					  
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Shift Produksi</label>
                      <input readonly class="form-control" id="shift" name="shift" value= "<?php echo $d['shift'];?>" >
                    </div>
					  
					  				  
                  	 					  					  
				 <div class="form-group">
                      <label for="exampleInputEmail1">Data Formula</label> <br>
					 
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
r13:'".addslashes($row['r13'])."',
rm13:'".addslashes($row['rm13'])."',
r14:'".addslashes($row['r14'])."',
rm14:'".addslashes($row['rm14'])."',
r15:'".addslashes($row['r15'])."',
rm15:'".addslashes($row['rm15'])."'
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Aktual Mixing(Batch)</label>
                      <input type="text" class="form-control" id="batch1" name="batch1" value= "<?php echo $d['batch1'];?>" >
                    </div>
						
										                    
					<div class="form-group">                  
                     <div class="form-group">
                      <select class="form-control select2" id="tepung1" name="tepung1" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">Pilih Tepung</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						  <option value="terigu tambang">terigu tambang</option>
					  </select>
					 <input readonly class="form-control" id="r1" name="r1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					
			 	   		<div class="form-group">                  
                     <div class="form-group">
                      <select class="form-control select2" id="tepung2" name="tepung2" style="width: 100%;" onKeyUp="sum"  >
                      <option value="">Pilih Tepung</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						  <option value="terigu tambang">terigu tambang</option>
					  </select>
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
						  <input readonly class="form-control" id="r14" name="r14"  >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					
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
		document.getElementById('r14').value = frm[no_form].r14;  
		document.getElementById('rm14').value = frm[no_form].rm14; 
		document.getElementById('r15').value = frm[no_form].r15;  
		document.getElementById('rm15').value = frm[no_form].rm15; 
		
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

              <button type="submit" name = 'update' class="btn btn-info">Edit</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
			&nbsp;
              <button input class="btn btn-success" type="button" id="btn"  onClick="sum();">Hitung</button> 
				 
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
      mysql_query("DELETE FROM ppic_plan WHERE id='$_GET[id]'");
	   mysql_query("DELETE FROM ppic_jml WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=ppic&act=view'</script>";
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