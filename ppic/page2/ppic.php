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
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
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
                        <th width="60">No</th>
                        <th width="157">PPIC ID</th>
                        <th width="382">Nama Produk</th>
						<th width="172">Tanggal</th>
						<th width="172">Jenis Oven</th>  
						<th width="33">Shift</th>
						<th width="42">Batch</th>
						 <th width="103">Jumlah</th>
						<th width="66">Edit</th>
						<th width="66">Hapus</th>
						<th width="66">Cetak</th>

					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECt * FROM ppic_plan GROUP by id desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[ppic_id]"?></td>
						<td><?php echo "$r[nm_fg]"?></td>	
						<td><?php echo TanggalIndo($r['tgl'])?></td>
						<td><?php echo "$r[oven]"?></td>
                        <td><?php echo "$r[shift]"?></td>
						<td><?php echo "$r[lot]"?></td>
						<td><?php echo "$r[jumlah]"?></td>
                       
                      
							
						<td><a href="?pg=ppic&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-circle-o"></i></button></a></td>
						
					
							
						<td><a href="?pg=ppic&act=delete&id=<?php echo $r['id']?>"><button  type="button" class="btn btn-danger" onClick="return confirm('Anda akan menghapus data planing PPIC <?php echo $r['ppic_id']?>');"><i class = "fa fa-trash-o"></i></button></i></button></a></td>
						 <td><a href="cetakppic.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-blue">
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
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM ppic_plan WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
              	
				mysql_query("UPDATE ppic_plan SET ppic_id='$_POST[ppic_id]',plan_prod='$_POST[plan_prod]', nm_fg='$_POST[nm_fg]', 
				tgl='$_POST[tgl]',mixer='$_POST[mixer]',oven='$_POST[oven]',dd='$_POST[dd]',shift='$_POST[shift]',leader='$_POST[leader]',
				lot='$_POST[lot]',jumlah='$_POST[jumlah]',screen='$_POST[screen]',nm_cust='$_POST[nm_cust]',terigua='$_POST[terigua]',
				jmlt1='$_POST[jmlt1]',terigub='$_POST[terigub]',jmlt2='$_POST[jmlt2]', r1='$_POST[r1]',jml1='$_POST[jml1]',r2='$_POST[r2]', 
				jml2='$_POST[jml2]', r3='$_POST[r3]',jml3='$_POST[jml3]', r4='$_POST[r4]',jml4='$_POST[jml4]', r5='$_POST[r5]',jml5='$_POST[jml5]',
				r6='$_POST[r6]',jml6='$_POST[jml6]', r7='$_POST[r7]',jml7='$_POST[jml7]', r8='$_POST[r8]',jml8='$_POST[jml8]', r9='$_POST[r9]',
				jml9='$_POST[jml9]',r10='$_POST[r10]',jml10='$_POST[jml10]', r11='$_POST[r11]',jml11='$_POST[jml11]', r12='$_POST[r12]',jml12='$_POST[jml12]', 
				r13='$_POST[r13]',jml13='$_POST[jml13]',r14='$_POST[r14]',jml14='$_POST[jml14]',r15='$_POST[r15]',rm15='$_POST[rm15]',r16='$_POST[r16]', 
				rm16='$_POST[rm16]',r17='$_POST[r17]', rm17='$_POST[rm17]',r18='$_POST[r18]', rm18='$_POST[rm18]',status='$_POST[status]' WHERE id='$_POST[id]'");
									 
				
				 echo "<script>window.location='home.php?pg=ppic&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit PPIC</h1>
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
                      <label for="exampleInputEmail1">No Plan PPPIC</label>
                      <input readonly class="form-control" id="ppic_id" name="ppic_id" value= "<?php echo $d['ppic_id'];?>" >
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">No Plan Produksi</label>
                      <input readonly class="form-control" id="plan_prod" name="plan_prod" value= "<?php echo $d['plan_prod'];?>" >
					 
                    </div>
					 			  
                  	<div class="form-group">Tanggal Planing
                    <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>" >
					</div>	
					
					<div class="form-group" required data-fv-notempty-message="Tidak boleh kosong">Mixer <br>
                    <input name="mixer" type="radio" value="1"> Mixer 1 
					 <input name="mixer" type="radio" value="2"> Mixer 2 
					  <input name="mixer" type="radio" value="3"> Mixer 3
					</div>
					
					<div class="form-group" required data-fv-notempty-message="Tidak boleh kosong">Oven <br>
                    <input name="oven" type="radio" value="OB1"> OB1 
					 <input name="oven" type="radio" value="OB2"> OB2 
					  <input name="oven" type="radio" value="OB3"> OB3
					   <input name="oven" type="radio" value="EB1"> EB1
					    <input name="oven" type="radio" value="EB2"> EB2
					</div>
					
					<div class="form-group" required data-fv-notempty-message="Tidak boleh kosong">Drum Dryer <br>
                    <input name="dd" type="radio" value="1"> DD 1 
					 <input name="dd" type="radio" value="2"> DD 2 
					
					</div>
					
					<div class="form-group" required data-fv-notempty-message="Tidak boleh kosong">Shift Produksi <br>
                    <input name="shift" type="radio" value="1"> Shift 1 <br>
					 <input name="shift" type="radio" value="2"> Shift 2 <br>
					  <input name="shift" type="radio" value="3"> Shift 3<br>
					</div>
					
					<div class="form-group" required data-fv-notempty-message="Tidak boleh kosong">Nama Leader <br>
                    <input name="leader" type="radio" value="ahr"> Achyar <br>
					 <input name="leader" type="radio" value="aan">Aan <br>
					  <input name="leader" type="radio" value="gtl"> Gathul <br>
					</div>
					
					 <div class="form-group"> Jenis Screen
					<input type="text" class="form-control" id="screen" name="screen" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();" maxlength="4" value= "<?php echo $d['screen'];?>" >			  
					  </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Masukan Nama Customer</label> <br>
                     <select class="form-control select2" id="nm_cust" name="nm_cust" style="width: 100%;" s>
                      <option value="" >--- Silahkan Pilih ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM customer order by id asc");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nama']; ?>">
                        <?php echo $row['nama']; ?>
                    </option>
                <?php
                }
                ?>
						 
						    </optgroup>
                      </select>
						</div>
						
						 <div class="form-group">
                      <label for="exampleInputEmail1">Data Formula</label> <br>
					 
                    <select class="form-control select2" style="width: 100%;" name="nm_fg" id="nm_fg" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from formula_new");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray .= "frm['" . $row['nm_fg'] . "'] = {
terigu1:'" . addslashes($row['terigu1']) . "',
terigu2:'" . addslashes($row['terigu2']) . "',

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
rm14:'".addslashes($row['rm14'])."'
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					   
					  
                   <div class="form-group">Batch planing                   
                      <input type="text" class="form-control" id="lot" name="lot" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();"  >
                    </div>
					
					 <div class="form-group">Target Produksi                  
                      <input type readonly class="form-control" id="jumlah" name="jumlah" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();"  >
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Terigu Standart</label> <br>
                     <select class="form-control select2" id="terigua" name="terigua"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  >
                      <option value="" >--- Choose a Floor ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_rm order by no asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm'] ; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="terigu1" name="terigu1" value="<?php echo $d['terigu1'];?>" onKeyUp="sum();" >
					<div class="form-group">Total Kebutuhan Terigu Standart
					 <input readonly class="form-control"   id="jmlt1" name="jmlt1" onKeyUp="sum();" >
					  </div>
					  </div>
					  
					  	 <div class="form-group">
                      <label for="exampleInputEmail1">Terigu Premium</label> <br>
                     <select class="form-control select2" id="terigub" name="terigub"  style="width: 100%;" >
                      <option value="" >--- Choose a Floor ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_rm order by no asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					 <input readonly class="form-control" id="terigu2" name="terigu2" value="<?php echo $d['terigu2'];?>" onKeyUp="sum();" >
					 <div class="form-group">Total Kebutuhan Terigu Premium 
					 <input readonly class="form-control"   id="jmlt2" name="jmlt2" onKeyUp="sum();" >
					  </div>
					   

					<div class="form-group">
					 <input readonly class="form-control" id="r1" name="r1" >
					<input readonly class="form-control" id="rm1" name="rm1" onKeyUp="sum();" >
					<input readonly class="form-control" id="jml1" name="jml1" onKeyUp="sum();" >
                  </div>
					
			 	  <div class="form-group">
                       
					 <input readonly class="form-control" id="r2" name="r2" >
					 <input readonly class="form-control" id="rm2" name="rm2" onKeyUp="sum();" >
					 <input readonly class="form-control" id="jml2" name="jml2" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r3" name="r3"  >
					  <input readonly class="form-control" id="rm3" name="rm3" onKeyUp="sum();" >
					  <input readonly class="form-control" id="jml3" name="jml3" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r4" name="r4" >
					 <input readonly class="form-control" id="rm4" name="rm4" onKeyUp="sum();" >
					 <input readonly class="form-control" id="jml4" name="jml4" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r5" name="r5"  >
					     <input readonly class="form-control" id="rm5" name="rm5" onKeyUp="sum();" >
						 <input readonly class="form-control" id="jml5" name="jml5" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6"  >
						<input readonly class="form-control" id="rm6" name="rm6" onKeyUp="sum();" >
						<input readonly class="form-control" id="jml6" name="jml6" onKeyUp="sum();" >

                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r7" name="r7"  >
						<input readonly class="form-control" id="rm7" name="rm7" onKeyUp="sum();" >
						<input readonly class="form-control" id="jml7" name="jml7" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8"  >
						  <input readonly class="form-control" id="rm8" name="rm8" onKeyUp="sum();" >
						  <input readonly class="form-control" id="jml8" name="jml8" onKeyUp="sum();" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r9" name="r9"  >
					  <input readonly class="form-control" id="rm9" name="rm9" onKeyUp="sum();" >
					  <input readonly class="form-control" id="jml9" name="jml9" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r10" name="r10"  >
						  <input readonly class="form-control" id="rm10" name="rm10" onKeyUp="sum();" >
						  <input readonly class="form-control" id="jml10" name="jml10" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" >
						  <input readonly class="form-control" id="rm11" name="rm11" onKeyUp="sum();" >
						  <input readonly class="form-control" id="jml11" name="jml11" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r12" name="r12"  >
					 <input readonly class="form-control" id="rm12" name="rm12" onKeyUp="sum();" >
					 <input readonly class="form-control" id="jml12" name="jml12" onKeyUp="sum();" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r13" name="r13"  >
						  <input readonly class="form-control" id="rm13" name="rm13" onKeyUp="sum();" >
						  <input readonly class="form-control" id="jml13" name="jml13" onKeyUp="sum();" >
				  </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14"  >
		                  <input readonly class="form-control" id="rm14" name="rm14" onKeyUp="sum();" >
						  <input readonly class="form-control" id="jml14" name="jml14" onKeyUp="sum();" >
				  </div>
					  
					 
					  <div class="form-group">
                      <label for="exampleInputEmail1">label</label> <br>
                     <select class="form-control select2" id="r15" name="r15"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  >
                      <option value="" >--- Choose a Label ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_label order by no asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nm_label']; ?>">
                        <?php echo $row['nm_label'] ; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="rm15" name="rm15" onKeyUp="sum();" >
					
					</div>
					  
					  
					  
					   <div class="form-group">Plastik HD
					<input readonly class="form-control" id="r17" name="r17" value="hd polos 80x50x70m">
                     <input readonly class="form-control" id="rm17" name="rm17" onKeyUp="sum();">
					 
					  </div>
					  
					  <div class="form-group"> Masukan Jenis Plastik
						
					   <select class="form-control select2" id="r18" name="r18" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">pilih bahan baku</option>
                       	<option value="pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="pe biru 49x79x70m">pe biru 49x79x70m</option>
						   <option value="plastik woven">plastik woven</option>
						
                      </select>
                      <input type readonly class="form-control" id="rm18" name="rm18"  onKeyUp="sum();" >
                    </div>			
					  
					  
					  
					<script type="text/javascript">    
	
	
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('terigu1').value = frm[no_form].terigu1; 
		
		document.getElementById('terigu2').value = frm[no_form].terigu2; 
		
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
		
		
		
		
			};  
						 function sum() {
							
							var txt1 = document.getElementById('rm1').value;
							var txt1a = document.getElementById('jml1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt2a = document.getElementById('jml2').value;
							var txt3 = document.getElementById('rm3').value;
							var txt3a = document.getElementById('jml3').value;
							var txt4= document.getElementById('rm4').value;
							var txt4a= document.getElementById('jml4').value;
							var txt5= document.getElementById('rm5').value;
							var txt5a= document.getElementById('jml5').value;
							
							var txt6= document.getElementById('rm6').value;
							var txt6a= document.getElementById('jml6').value;
							  var txt7= document.getElementById('rm7').value;
							   var txt7a= document.getElementById('jml7').value;
							  var txt8= document.getElementById('rm8').value;
							   var txt8a= document.getElementById('jml8').value;
							  var txt9= document.getElementById('rm9').value;
							   var txt9a= document.getElementById('jml9').value;
							    var txt10= document.getElementById('rm10').value;
							   var txt10a= document.getElementById('jml10').value;
							     var txt11= document.getElementById('rm11').value;
							   var txt11a= document.getElementById('jml11').value;
							   var txt12= document.getElementById('rm12').value;
							   var txt12a= document.getElementById('jml12').value;
							   var txt13= document.getElementById('rm13').value;
							   var txt13a= document.getElementById('jml13').value;
							   var txt14= document.getElementById('rm14').value;
							   var txt14a= document.getElementById('jml14').value;
							   var txt15= document.getElementById('lot').value;
							     var txt16= document.getElementById('terigu1').value;
								   var txt17= document.getElementById('terigu2').value;
								     var txt18= document.getElementById('jmlt1').value;
									   var txt19= document.getElementById('jmlt2').value;
									    var txt20= document.getElementById('rm15').value;
										 var txt21= document.getElementById('rm16').value;
										  var txt22= document.getElementById('rm17').value;
										 var txt23= document.getElementById('rm18').value;
										  
							
							
							var result1 =parseInt(txt15)*3.2 ;
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah').value = result1.toFixed(1);
							}
							
							var result2 = (parseFloat(txt1)*parseFloat(txt15)) ;
      						if (!isNaN(result2)) {
         					document.getElementById('jml1').value = result2.toFixed(1);
							}
							
							var result3 = (parseFloat(txt2)*parseFloat(txt15)) ;
      						if (!isNaN(result3)) {
         					document.getElementById('jml2').value = result3.toFixed(1);
							}
							
							var result4 = (parseFloat(txt3)*parseFloat(txt15)) ;
      						if (!isNaN(result4)) {
         					document.getElementById('jml3').value = result4.toFixed(1);
							}
							
							var result5 = (parseFloat(txt4)*parseFloat(txt15)) ;
      						if (!isNaN(result5)) {
         					document.getElementById('jml4').value = result5.toFixed(1);
							}						
							
							var result6 = (parseFloat(txt5)*parseFloat(txt15)) ;
      						if (!isNaN(result6)) {
         					document.getElementById('jml5').value = result6.toFixed(1);
							}
							
							var result7 = (parseFloat(txt6)*parseFloat(txt15)) ;
      						if (!isNaN(result7)) {
         					document.getElementById('jml6').value = result7.toFixed(1);
							}
							
							var result8 = (parseFloat(txt7)*parseFloat(txt15)) ;
      						if (!isNaN(result8)) {
         					document.getElementById('jml7').value = result8.toFixed(1);
							}
							
							var result9 = (parseFloat(txt8)*parseFloat(txt15)) ;
      						if (!isNaN(result9)) {
         					document.getElementById('jml8').value = result9.toFixed(1);
							}
							
							var result10 = (parseFloat(txt9)*parseFloat(txt15)) ;
      						if (!isNaN(result10)) {
         					document.getElementById('jml9').value = result10.toFixed(1);
							}
							
							var result11 = (parseFloat(txt10)*parseFloat(txt15)) ;
      						if (!isNaN(result11)) {
         					document.getElementById('jml10').value = result11.toFixed(1);
							}
							
							var result12 = (parseFloat(txt11)*parseFloat(txt15)) ;
      						if (!isNaN(result12)) {
         					document.getElementById('jml11').value = result12.toFixed(1);
							}
							
							var result13 = (parseFloat(txt12)*parseFloat(txt15)) ;
      						if (!isNaN(result13)) {
         					document.getElementById('jml12').value = result13.toFixed(1);
							}
							
							var result14 = (parseFloat(txt13)*parseFloat(txt15)) ;
      						if (!isNaN(result14)) {
         					document.getElementById('jml13').value = result14.toFixed(1);
							}
							
							var result15 = (parseFloat(txt14)*parseFloat(txt15)) ;
      						if (!isNaN(result15)) {
         					document.getElementById('jml14').value = result15.toFixed(1);
							}
							
							
							var result16 = (parseFloat(txt16)*parseFloat(txt15)) ;
      						if (!isNaN(result16)) {
         					document.getElementById('jmlt1').value = result16.toFixed(1);
							}
							
							var result17 = (parseFloat(txt17)*parseFloat(txt15)) ;
      						if (!isNaN(result17)) {
         					document.getElementById('jmlt2').value = result17.toFixed(1);
							}
							
							var result18 = (parseFloat(txt15)*3.2) ;
      						if (!isNaN(result18)) {
         					document.getElementById('rm15').value = result18.toFixed(1);
							}
							
							var result19 = (parseFloat(txt15)*3.2) ;
      						if (!isNaN(result19)) {
         					document.getElementById('rm16').value = result19.toFixed(1);
							}
							
							var result20 = (parseFloat(txt15)*3.2) ;
      						if (!isNaN(result20)) {
         					document.getElementById('rm17').value = result20.toFixed(1);
							}
							
							var result21 = (parseFloat(txt15)*3.2) ;
      						if (!isNaN(result21)) {
         					document.getElementById('rm18').value = result21.toFixed(1);
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
	  mysql_query("DELETE FROM planingprod WHERE id='$_GET[id]'");
	 mysql_query("DELETE FROM gudangrm  WHERE id='$_GET[id]'"); 
	
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
	</script><?php
error_reporting
?>
