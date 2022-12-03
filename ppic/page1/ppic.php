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
    <a href="?pg=ppic&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Master Plan PPIC</i></button> </a>
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
						 <th width="103">Edit</th>
						<th width="66">Hapus</th>
						<th width="66">Cetak</th>

					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM ppic_plan GROUP by id desc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[ppic_id]"?></td>
						<td><?php echo "$r[nm_fg]"?></td>	
						<td><?php echo TanggalIndo($r['tgl'])?></td>
						<td><?php echo "$r[jenis_oven]"?></td>
                        <td><?php echo "$r[shift]"?></td>
                       	<td><?php echo "$r[batch1]"?></td>
                      
							
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
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
      if (isset($_POST['add'])) {
              $query = mysql_query("INSERT INTO ppic_plan VALUES ('','$_POST[ppic_id]','$_POST[nm_fg]','$_POST[tgl]','$_POST[mixer]','$_POST[oven]','$_POST[dd]','$_POST[shift]','$_POST[leader]','$_POST[batch1]','$_POST[vendor1]','$_POST[r1]','$_POST[kode1]','$_POST[rm1]','$_POST[vendor2]','$_POST[r2]','$_POST[kode2]','$_POST[rm2]','$_POST[r3]','$_POST[kode3]','$_POST[rm3]','$_POST[r4]','$_POST[kode4]','$_POST[rm4]','$_POST[r5]','$_POST[kode5]','$_POST[rm5]','$_POST[r6]','$_POST[kode6]','$_POST[rm6]','$_POST[r7]','$_POST[kode7]','$_POST[rm7]','$_POST[r8]','$_POST[kode8]','$_POST[rm8]','$_POST[r9]','$_POST[kode9]','$_POST[rm9]','$_POST[r10]','$_POST[kode10]','$_POST[rm10]','$_POST[r11]','$_POST[kode11]','$_POST[rm11]','$_POST[r12]','$_POST[kode12]','$_POST[rm12]','$_POST[r13]','$_POST[kode13]','$_POST[rm13]','$_POST[r14]','$_POST[kode14]','$_POST[rm14]','$_POST[r15]','$_POST[kode15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]','$_POST[jenis_oven]','$_POST[target_drying]','$_POST[screen]','$_POST[nm_cust]')");
		  
		  		  
		  	  
		  	  $query .= mysql_query("INSERT INTO ppic_jml VALUES ('','$_POST[ppic_id]','$_POST[nm_fg]','$_POST[batch1]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]','$_POST[r15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]')");
		  
		 	  
		   $query .= mysql_query("INSERT INTO planprod VALUES ('','$_POST[ppic_id]','$_POST[no_plan]','$_POST[tgl]','$_POST[mixer]','$_POST[oven]','$_POST[dd]','$_POST[shift]','$_POST[leader]','$_POST[batch1]','$_POST[nm_fg]','$_POST[jumlahprod]','$_POST[fg]','$_POST[r1]','$_POST[kode1]','$_POST[rm1]','$_POST[r2]','$_POST[kode2]','$_POST[rm2]','$_POST[r3]','$_POST[kode3]','$_POST[rm3]','$_POST[r4]','$_POST[kode4]','$_POST[rm4]','$_POST[r5]','$_POST[kode5]','$_POST[rm5]','$_POST[r6]','$_POST[kode6]','$_POST[rm6]','$_POST[r7]','$_POST[kode7]','$_POST[rm7]','$_POST[r8]','$_POST[kode8]','$_POST[rm8]','$_POST[r9]','$_POST[kode9]','$_POST[rm9]','$_POST[r10]','$_POST[kode10]','$_POST[rm10]','$_POST[r11]','$_POST[kode11]','$_POST[rm11]','$_POST[r12]','$_POST[kode12]','$_POST[rm12]','$_POST[r13]','$_POST[kode13]','$_POST[rm13]','$_POST[r14]','$_POST[kode14]','$_POST[rm14]','$_POST[r15]','$_POST[kode15]','$_POST[rm15]','$_POST[r16]','$_POST[rm16]','$_POST[r17]','$_POST[rm17]','$_POST[r18]','$_POST[rm18]','$_POST[status]','$_POST[kanban]','$_POST[jenis_oven]','$_POST[target_drying]','$_POST[limbah]','$_POST[screen]','$_POST[nm_cust]')");
		      

		  		  
		  		
                echo "<script>window.location='home.php?pg=ppic&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Planing PPIC</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Planing PPIC</a></li>
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
                    <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" >
					</div>	
					
					<div class="form-group">
                    <label for="exampleInputEmail1">mixer number</label> 
                      <select class="form-control select2" name="mixer" style="width: 100%;"  onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="M1">1</option>
                        <option value="M2">2</option>
                        <option value="M3">3</option>
                      </select>
                
					
					<div class="form-group">
                    <label for="exampleInputEmail1">OB Number</label> 
                      <select class="form-control select2" name="oven" style="width: 100%;" onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="OB1">1</option>
                        <option value="OB2">2</option>
                        <option value="OB3">3</option>
                      </select>
						</div>
               
					
					<div class="form-group">
                    <label for="exampleInputEmail1">DD Number</label> 
                      <select class="form-control select2" name="dd" style="width: 100%;"  onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="DD1">1</option>
                        <option value="DD2">2</option>
                       
                      </select>
                  </div>
					
					
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shift</label> 
                      <select class="form-control select2" name="shift" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                  </div>
					
					<div class="form-group">
                    <label for="exampleInputEmail1">Nama leader</label> 
                      <select class="form-control select2" name="leader" style="width: 100%;"   onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="A">RAHMANTO</option>
                        <option value="B">AAN</option>
                        <option value="C">GATUL</option>
						  <option value="D">SAMAD</option>
                      </select>
                  </div>
					  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Batch Planing</label>                  
                      <input type="text" class="form-control" id="batch1" name="batch1" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();"  >
                    </div>
							
					
					<div class="form-group">
                    <label for="exampleInputEmail1">Target Drying</label>                 
                      <input type="text" class="form-control" id="target_drying" name="target_drying" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();"  >
                    </div>
					
					  <div class="form-group">
                    <label for="exampleInputEmail1">Masukan Jenis Oven</label> 
                      <select class="form-control select2" name="jenis_oven" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="OB">OB</option>
                        <option value="EB">EB</option>
                      
                      </select>
                  </div>
					
						   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Screen</label>                 
                      <input type="text" class="form-control" id="screen" name="screen" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();" maxlength="4"  >
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
kode1:'".addslashes($row['kode1'])."',
rm1:'".addslashes($row['rm1'])."',

r2:'".addslashes($row['r2'])."',
kode2:'".addslashes($row['kode2'])."',
rm2:'".addslashes($row['rm2'])."',

r3:'".addslashes($row['r3'])."',
kode3:'".addslashes($row['kode3'])."',
rm3:'".addslashes($row['rm3'])."',

r4:'".addslashes($row['r4'])."',
kode4:'".addslashes($row['kode4'])."',
rm4:'".addslashes($row['rm4'])."',

r5:'".addslashes($row['r5'])."',
kode5:'".addslashes($row['kode5'])."',
rm5:'".addslashes($row['rm5'])."',

r6:'".addslashes($row['r6'])."',
kode6:'".addslashes($row['kode6'])."',
rm6:'".addslashes($row['rm6'])."',

r7:'".addslashes($row['r7'])."',
kode7:'".addslashes($row['kode7'])."',
rm7:'".addslashes($row['rm7'])."',

r8:'".addslashes($row['r8'])."',
kode8:'".addslashes($row['kode8'])."',
rm8:'".addslashes($row['rm8'])."',

r9:'".addslashes($row['r9'])."',
kode9:'".addslashes($row['kode9'])."',
rm9:'".addslashes($row['rm9'])."',


r10:'".addslashes($row['r10'])."',
kode10:'".addslashes($row['kode10'])."',
rm10:'".addslashes($row['rm10'])."',

r11:'".addslashes($row['r11'])."',
kode11:'".addslashes($row['kode11'])."',
rm11:'".addslashes($row['rm11'])."',

r12:'".addslashes($row['r12'])."',
kode12:'".addslashes($row['kode12'])."',
rm12:'".addslashes($row['rm12'])."',

r13:'".addslashes($row['r13'])."',
kode13:'".addslashes($row['kode13'])."',
rm13:'".addslashes($row['rm13'])."',

r14:'".addslashes($row['r14'])."',
kode14:'".addslashes($row['kode14'])."',
rm14:'".addslashes($row['rm14'])."',

r15:'".addslashes($row['r15'])."',
kode15:'".addslashes($row['kode15'])."',
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
					 <input readonly class="form-control" id="r1" name="r1" >
					<input readonly class="form-control" id="kode1" name="kode1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					
			 	  <div class="form-group">
                       
					 <input readonly class="form-control" id="r2" name="r2" >
					  <input readonly class="form-control" id="kode2" name="kode2" >
				    <input readonly class="form-control" id="rm2" name="rm2" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r3" name="r3"  >
						  <input readonly class="form-control" id="kode3" name="kode3" >
                      <input readonly class="form-control" id="rm3" name="rm3" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r4" name="r4" >
						  <input readonly class="form-control" id="kode4" name="kode4" >
                        <input readonly class="form-control" id="rm4" name="rm4">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r5" name="r5"  >
						  <input readonly class="form-control" id="kode5" name="kode5" >
                        <input readonly class="form-control" id="rm5" name="rm5">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6"  >
						  <input readonly class="form-control" id="kode6" name="kode6" >
                      <input readonly class="form-control" id="rm6" name="rm6" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r7" name="r7"  >
						  <input readonly class="form-control" id="kode7" name="kode7" >
						  <input readonly class="form-control" id="rm7" name="rm7" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8"  >
						  <input readonly class="form-control" id="kode8" name="kode8" >
                      <input readonly class="form-control" id="rm8" name="rm8" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r9" name="r9"  >
					  <input readonly class="form-control" id="kode9" name="kode9" >
                    <input readonly class="form-control" id="rm9" name="rm9" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r10" name="r10"  >
						  <input readonly class="form-control" id="kode10" name="kode10" >
                      <input readonly class="form-control" id="rm10" name="rm10" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" >
						  <input readonly class="form-control" id="kode11" name="kode11" >
                      <input readonly class="form-control" id="rm11" name="rm11" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r12" name="r12"  >
						  <input readonly class="form-control" id="kode12" name="kode12" >
                      <input readonly class="form-control" id="rm12" name="rm12" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r13" name="r13"  >
						  <input readonly class="form-control" id="kode13" name="kode13" >
                      <input readonly class="form-control" id="rm13" name="rm13" >
				  </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14"  >
						   <input readonly class="form-control" id="kode14" name="kode14" >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
						  <input readonly class="form-control" id="kode15" name="kode15" >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r16" name="r16"  >
                      <input readonly class="form-control" id="rm16" name="rm16" >
				  </div>
					 
					  
					 <div class="form-group"> Masukan Jenis Plastik-2
						
					   <select class="form-control select2" id="r17" name="r17" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">pilih bahan baku</option>
                        
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						
                      </select>
                      <input "text" class="form-control" id="rm17" name="rm17"  >
                    </div>
					  
					   <div class="form-group"> Masukan Jenis Plastik-1 
						
					   <select class="form-control select2" id="r18" name="r18" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">pilih bahan baku</option>
                        <option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
												
                      </select>
                      <input "text" class="form-control" id="rm18" name="rm18"  >
                    </div>
					 
					  
					  				 
					  
					 
					<script type="text/javascript">    
	
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('r1').value = frm[no_form].r1; 
		document.getElementById('kode1').value = frm[no_form].kode1; 
		document.getElementById('rm1').value = frm[no_form].rm1;
		
		document.getElementById('r2').value = frm[no_form].r2;  
		document.getElementById('kode2').value = frm[no_form].kode2; 
		document.getElementById('rm2').value = frm[no_form].rm2; 
		
		document.getElementById('r3').value = frm[no_form].r3; 
		document.getElementById('kode3').value = frm[no_form].kode3; 
		document.getElementById('rm3').value = frm[no_form].rm3; 
		
		document.getElementById('r4').value = frm[no_form].r4;
		document.getElementById('kode4').value = frm[no_form].kode4; 
		document.getElementById('rm4').value = frm[no_form].rm4; 
		
		document.getElementById('r5').value = frm[no_form].r5;  
		document.getElementById('kode5').value = frm[no_form].kode5; 
		document.getElementById('rm5').value = frm[no_form].rm5; 
		
		document.getElementById('r6').value = frm[no_form].r6;  
		document.getElementById('kode6').value = frm[no_form].kode6; 
		document.getElementById('rm6').value = frm[no_form].rm6; 
		
		document.getElementById('r7').value = frm[no_form].r7;
		document.getElementById('kode7').value = frm[no_form].kode7; 
		document.getElementById('rm7').value = frm[no_form].rm7; 
		
		document.getElementById('r8').value = frm[no_form].r8;
		document.getElementById('kode8').value = frm[no_form].kode8; 
		document.getElementById('rm8').value = frm[no_form].rm8; 
		
		document.getElementById('r9').value = frm[no_form].r9; 
		document.getElementById('kode9').value = frm[no_form].kode9; 
		document.getElementById('rm9').value = frm[no_form].rm9; 
		
		document.getElementById('r10').value = frm[no_form].r10;
		document.getElementById('kode10').value = frm[no_form].kode10; 
		document.getElementById('rm10').value = frm[no_form].rm10; 
		
		document.getElementById('r11').value = frm[no_form].r11;
		document.getElementById('kode11').value = frm[no_form].kode11; 
		document.getElementById('rm11').value = frm[no_form].rm11; 
		
		document.getElementById('r12').value = frm[no_form].r12;
		document.getElementById('kode12').value = frm[no_form].kode12; 
		document.getElementById('rm12').value = frm[no_form].rm12; 
		
		document.getElementById('r13').value = frm[no_form].r13;  
		document.getElementById('kode13').value = frm[no_form].kode13; 
		document.getElementById('rm13').value = frm[no_form].rm13;
		
		document.getElementById('r14').value = frm[no_form].r14;
		document.getElementById('kode14').value = frm[no_form].kode14; 
		document.getElementById('rm14').value = frm[no_form].rm14;
		
		document.getElementById('r15').value = frm[no_form].r15;  
		document.getElementById('kode15').value = frm[no_form].kode15; 
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
							var txt16=document.getElementById('rm16').value;
							var txt17=document.getElementById('rm17').value;
							var txt18=document.getElementById('rm18').value;
							var txt19=document.getElementById('target_drying').value;
							
							
							var result19 = parseInt(txt11)*3.2;
							if (!isNaN(result19)) {
							document.getElementById('target_drying').value = result19;
							}
							
							
							var result1 =(txt1) *(txt11) ;
      						if (!isNaN(result1)) {
         					document.getElementById('rm1').value = result1;
							}
							
							var result1a =(txt2) *(txt11) ;
      						if (!isNaN(result1a)) {
         					document.getElementById('rm2').value = result1a;
							}
							
							var result2 = (txt3)  *(txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('rm3').value = result2.toFixed(2);
							}
							
														
							var result4 = (txt4)*(txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('rm4').value = result4.toFixed(2);
							}
							
							var result5 = (txt5) *(txt11);
      						if (!isNaN(result5)) {
         					document.getElementById('rm5').value = result5.toFixed(2);
							}
							
							var result6 = (txt6) *(txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('rm6').value = result6.toFixed(2);
							}
							
							var result7 = (txt7) *(txt11)/10;
      						if (!isNaN(result7)) {
         					document.getElementById('rm7').value = result7.toFixed(2);
							}
							
							var result8 = (txt8) *(txt11);
      						if (!isNaN(result8)) {
         					document.getElementById('rm8').value = result8.toFixed(2);
							}
							
							var result9 = (txt9) *(txt11);
      						if (!isNaN(result9)) {
         					document.getElementById('rm9').value = result9.toFixed(2);
							}
							
							var result10 = (txt10) *(txt11)/10;
      						if (!isNaN(result10)) {
         					document.getElementById('rm10').value = result10.toFixed(2);
							}
							
							var result11 = (txt11a) * (txt11)/10;
      						if (!isNaN(result11)) {
         					document.getElementById('rm11').value = result11.toFixed(2);
							}
							
							var result12 = (txt12) *  (txt11)/10;
      						if (!isNaN(result12)) {
         					document.getElementById('rm12').value = result12.toFixed(2);
							}
							
							var result13 = (txt13) *  (txt11)/10;
      						if (!isNaN(result13)) {
         					document.getElementById('rm13').value = result13.toFixed(2);
							}
							
							var result14 = (txt14) *(txt11)/10;
      						if (!isNaN(result14)) {
         					document.getElementById('rm14').value = result14.toFixed(2);
							}
							
							var result15 = (txt15) * (txt11)/10;
      						if (!isNaN(result15)) {
         					document.getElementById('rm15').value = result15.toFixed(2);
							}
							
							var result16 = (txt16) *(txt11);
							if (!isNaN(result15)) {
         					document.getElementById('rm16').value = result16.toFixed(1);
							}
							
							var result17 =(txt17)*(txt11);
      						if (!isNaN(result17)) {
         					document.getElementById('rm17').value = result17.toFixed(1);
							}
							
							var result18 = (txt18) *(txt11);
      						if (!isNaN(result18)) {
         					document.getElementById('rm18').value = result18.toFixed(1);
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
	 
                </form>
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

		
  <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM ppic_plan WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
				
              	
				mysql_query("UPDATE ppic_plan SET ppic_id='$_POST[ppic_id]', nm_fg='$_POST[nm_fg]', tgl='$_POST[tgl]',mixer='$_POST[mixer]',oven='$_POST[oven]',dd='$_POST[dd]',shift='$_POST[shift]',batch1='$_POST[batch1]',vendor1='$_POST[vendor1]', r1='$_POST[r1]', kode1='$_POST[kode1]',rm1='$_POST[rm1]', vendor2='$_POST[vendor2]',r2='$_POST[r2]', kode2='$_POST[kode2]', rm2='$_POST[rm2]', r3='$_POST[r3]',kode3='$_POST[kode3]', rm3='$_POST[rm3]', r4='$_POST[r4]',kode4='$_POST[kode4]', rm4='$_POST[rm4]', r5='$_POST[r5]',kode5='$_POST[kode5]', rm5='$_POST[rm5]', r6='$_POST[r6]',kode6='$_POST[kode6]', rm6='$_POST[rm6]', r7='$_POST[r7]',kode7='$_POST[kode7]', rm7='$_POST[rm7]', r8='$_POST[r8]',kode8='$_POST[kode8]', rm8='$_POST[rm8]', r9='$_POST[r9]',kode9='$_POST[kode9]', rm9='$_POST[rm9]', r10='$_POST[r10]',kode10='$_POST[kode10]', rm10='$_POST[rm10]', r11='$_POST[r11]',kode11='$_POST[kode11]', rm11='$_POST[rm11]', r12='$_POST[r12]',kode12='$_POST[kode12]', rm12='$_POST[rm12]', r13='$_POST[r13]',kode13='$_POST[kode13]', rm13='$_POST[rm13]',r14='$_POST[r14]',kode14='$_POST[kode14]', rm14='$_POST[rm14]',r15='$_POST[r15]',kode15='$_POST[kode15]', rm15='$_POST[rm15]',r16='$_POST[r16]', rm16='$_POST[rm16]',r17='$_POST[r17]', rm17='$_POST[rm17]',r18='$_POST[r18]', rm18='$_POST[rm18]',screen='$_POST[screen]',nm_cust='$_POST[nm_cust]' WHERE id='$_POST[id]'");
									 
				
				mysql_query("UPDATE planprod SET tgl='$_POST[tgl]',shift='$_POST[shift]', batch1='$_POST[batch1]', nm_fg='$_POST[nm_fg]', jumlahprod='$_POST[jumlahprod]', fg='$_POST[fg]', r1='$_POST[r1]', kode1='$_POST[kode1]',rm1='$_POST[rm1]',r2='$_POST[r2]', kode2='$_POST[kode2]', rm2='$_POST[rm2]', r3='$_POST[r3]',kode3='$_POST[kode3]', rm3='$_POST[rm3]', r4='$_POST[r4]',kode4='$_POST[kode4]', rm4='$_POST[rm4]', r5='$_POST[r5]',kode5='$_POST[kode5]', rm5='$_POST[rm5]', r6='$_POST[r6]',kode6='$_POST[kode6]', rm6='$_POST[rm6]', r7='$_POST[r7]',kode7='$_POST[kode7]', rm7='$_POST[rm7]', r8='$_POST[r8]',kode8='$_POST[kode8]', rm8='$_POST[rm8]', r9='$_POST[r9]',kode9='$_POST[kode9]', rm9='$_POST[rm9]', r10='$_POST[r10]',kode10='$_POST[kode10]', rm10='$_POST[rm10]', r11='$_POST[r11]',kode11='$_POST[kode11]', rm11='$_POST[rm11]', r12='$_POST[r12]',kode12='$_POST[kode12]', rm12='$_POST[rm12]', r13='$_POST[r13]',kode13='$_POST[kode13]', rm13='$_POST[rm13]',r14='$_POST[r14]',kode14='$_POST[kode14]', rm14='$_POST[rm14]',r15='$_POST[r15]',kode15='$_POST[kode15]', rm15='$_POST[rm15]',r16='$_POST[r16]', rm16='$_POST[rm16]',r17='$_POST[r17]', rm17='$_POST[rm17]',r18='$_POST[r18]', rm18='$_POST[rm18]',status='$_POST[status]' ,kanban='$_POST[kanban]',jenis_oven='$_POST[jenis_oven]',target_drying='$_POST[target_drying]',limbah='$_POST[limbah]',screen='$_POST[screen]',nm_cust='$_POST[nm_cust]' WHERE id='$_POST[id]'");
				
				
			
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
                      <label for="exampleInputEmail1">No Plan Prod</label>
                      <input readonly class="form-control" id="ppic_id" name="ppic_id" value= "<?php echo $d['ppic_id'];?>" >
                    </div>
					  
					  <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
					  
					  
                  	<div class="form-group">Tanggal Planing
                    <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" >
					</div>	
					
					<div class="form-group">
                    <label for="exampleInputEmail1">mixer number</label> 
                      <select class="form-control select2" name="mixer" style="width: 100%;"  onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="M1">1</option>
                        <option value="M2">2</option>
                        <option value="M3">3</option>
                      </select>
                
					
					<div class="form-group">
                    <label for="exampleInputEmail1">OB Number</label> 
                      <select class="form-control select2" name="oven" style="width: 100%;" onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="OB1">1</option>
                        <option value="OB2">2</option>
                        <option value="OB3">3</option>
                      </select>
               
					
					<div class="form-group">
                    <label for="exampleInputEmail1">DD Number</label> 
                      <select class="form-control select2" name="dd" style="width: 100%;"  onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="DD1">1</option>
                        <option value="DD2">2</option>
                       
                      </select>
                  </div>
					
					
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shift</label> 
                      <select class="form-control select2" name="shift" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                  </div>
					
					<div class="form-group">
                    <label for="exampleInputEmail1">Nama leader</label> 
                      <select class="form-control select2" name="leader" style="width: 100%;"   onKeyUp="sum();">
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="A">RAHMANTO</option>
                        <option value="B">AAN</option>
                        <option value="C">GATUL</option>
						<option value="D">SAMAD</option>
                      </select>
                  </div>
					  
                   <div class="form-group">Batch planing                   
                      <input type="text" class="form-control" id="batch1" name="batch1" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();"  >
                    </div>
							
					
					<div class="form-group">Target Drying                   
                      <input type="text" class="form-control" id="target_drying" name="target_drying" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();"  >
                    </div>
					
					  <div class="form-group">
                    <label for="exampleInputEmail1">Masukan Jenis Oven</label> 
                      <select class="form-control select2" name="jenis_oven" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="OB">OB</option>
                        <option value="EB">EB</option>
                      
                      </select>
                  </div>
                  	
						 <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Screen</label>                 
                      <input type="text" class="form-control" id="screen" name="screen" placeholder="Input Jumlah Batch" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();" maxlength="4"  >
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
					$result = mysql_query("select * from ppic_form");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['nm_fg'] . '">' . $row['nm_fg'] . '</option>';    
$jsArray .= "frm['" . $row['nm_fg'] . "'] = {
r1:'" . addslashes($row['r1']) . "',
kode1:'".addslashes($row['kode1'])."',
rm1:'".addslashes($row['rm1'])."',

r2:'".addslashes($row['r2'])."',
kode2:'".addslashes($row['kode2'])."',
rm2:'".addslashes($row['rm2'])."',

r3:'".addslashes($row['r3'])."',
kode3:'".addslashes($row['kode3'])."',
rm3:'".addslashes($row['rm3'])."',

r4:'".addslashes($row['r4'])."',
kode4:'".addslashes($row['kode4'])."',
rm4:'".addslashes($row['rm4'])."',

r5:'".addslashes($row['r5'])."',
kode5:'".addslashes($row['kode5'])."',
rm5:'".addslashes($row['rm5'])."',

r6:'".addslashes($row['r6'])."',
kode6:'".addslashes($row['kode6'])."',
rm6:'".addslashes($row['rm6'])."',

r7:'".addslashes($row['r7'])."',
kode7:'".addslashes($row['kode7'])."',
rm7:'".addslashes($row['rm7'])."',

r8:'".addslashes($row['r8'])."',
kode8:'".addslashes($row['kode8'])."',
rm8:'".addslashes($row['rm8'])."',

r9:'".addslashes($row['r9'])."',
kode9:'".addslashes($row['kode9'])."',
rm9:'".addslashes($row['rm9'])."',


r10:'".addslashes($row['r10'])."',
kode10:'".addslashes($row['kode10'])."',
rm10:'".addslashes($row['rm10'])."',

r11:'".addslashes($row['r11'])."',
kode11:'".addslashes($row['kode11'])."',
rm11:'".addslashes($row['rm11'])."',

r12:'".addslashes($row['r12'])."',
kode12:'".addslashes($row['kode12'])."',
rm12:'".addslashes($row['rm12'])."',

r13:'".addslashes($row['r13'])."',
kode13:'".addslashes($row['kode13'])."',
rm13:'".addslashes($row['rm13'])."',

r14:'".addslashes($row['r14'])."',
kode14:'".addslashes($row['kode14'])."',
rm14:'".addslashes($row['rm14'])."',

r15:'".addslashes($row['r15'])."',
kode15:'".addslashes($row['kode15'])."',
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
					 <input readonly class="form-control" id="r1" name="r1" >
					<input readonly class="form-control" id="kode1" name="kode1" >
				    <input readonly class="form-control" id="rm1" name="rm1" >
                  </div>
					
			 	  <div class="form-group">
                       
					 <input readonly class="form-control" id="r2" name="r2" >
					  <input readonly class="form-control" id="kode2" name="kode2" >
				    <input readonly class="form-control" id="rm2" name="rm2" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r3" name="r3"  >
						  <input readonly class="form-control" id="kode3" name="kode3" >
                      <input readonly class="form-control" id="rm3" name="rm3" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r4" name="r4" >
						  <input readonly class="form-control" id="kode4" name="kode4" >
                        <input readonly class="form-control" id="rm4" name="rm4">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r5" name="r5"  >
						  <input readonly class="form-control" id="kode5" name="kode5" >
                        <input readonly class="form-control" id="rm5" name="rm5">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6"  >
						  <input readonly class="form-control" id="kode6" name="kode6" >
                      <input readonly class="form-control" id="rm6" name="rm6" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r7" name="r7"  >
						  <input readonly class="form-control" id="kode7" name="kode7" >
						  <input readonly class="form-control" id="rm7" name="rm7" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8"  >
						  <input readonly class="form-control" id="kode8" name="kode8" >
                      <input readonly class="form-control" id="rm8" name="rm8" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r9" name="r9"  >
					  <input readonly class="form-control" id="kode9" name="kode9" >
                    <input readonly class="form-control" id="rm9" name="rm9" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r10" name="r10"  >
						  <input readonly class="form-control" id="kode10" name="kode10" >
                      <input readonly class="form-control" id="rm10" name="rm10" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" >
						  <input readonly class="form-control" id="kode11" name="kode11" >
                      <input readonly class="form-control" id="rm11" name="rm11" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r12" name="r12"  >
						  <input readonly class="form-control" id="kode12" name="kode12" >
                      <input readonly class="form-control" id="rm12" name="rm12" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r13" name="r13"  >
						  <input readonly class="form-control" id="kode13" name="kode13" >
                      <input readonly class="form-control" id="rm13" name="rm13" >
				  </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14"  >
						   <input readonly class="form-control" id="kode14" name="kode14" >
                      <input readonly class="form-control" id="rm14" name="rm14" >
				  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r15" name="r15"  >
						  <input readonly class="form-control" id="kode15" name="kode15" >
                      <input readonly  class="form-control" id="rm15" name="rm15" > 
                    </div>
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r16" name="r16"  >
                      <input readonly class="form-control" id="rm16" name="rm16" >
				  </div>
					 
					  
					 <div class="form-group"> Masukan Jenis Plastik-2
						
					   <select class="form-control select2" id="r17" name="r17" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">pilih bahan baku</option>
                        <option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						
                      </select>
                      <input "text" class="form-control" id="rm17" name="rm17"  >
                    </div>
					  
					   <div class="form-group"> Masukan Jenis Plastik-1 
						
					   <select class="form-control select2" id="r18" name="r18" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">pilih bahan baku</option>
                        <option value="rm-17 hd polos 80x50x70m">hd polos 80x50x70m</option>
						<option value="rm-19 pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="rm-21 pe biru 49x79x70m">pe biru 49x79x70m</option>
						
                      </select>
                      <input "text" class="form-control" id="rm18" name="rm18"  >
                    </div>
					 
					 
					<script type="text/javascript">    
	
	
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('r1').value = frm[no_form].r1; 
		document.getElementById('kode1').value = frm[no_form].kode1; 
		document.getElementById('rm1').value = frm[no_form].rm1;
		
		document.getElementById('r2').value = frm[no_form].r2;  
		document.getElementById('kode2').value = frm[no_form].kode2; 
		document.getElementById('rm2').value = frm[no_form].rm2; 
		
		document.getElementById('r3').value = frm[no_form].r3; 
		document.getElementById('kode3').value = frm[no_form].kode3; 
		document.getElementById('rm3').value = frm[no_form].rm3; 
		
		document.getElementById('r4').value = frm[no_form].r4;
		document.getElementById('kode4').value = frm[no_form].kode4; 
		document.getElementById('rm4').value = frm[no_form].rm4; 
		
		document.getElementById('r5').value = frm[no_form].r5;  
		document.getElementById('kode5').value = frm[no_form].kode5; 
		document.getElementById('rm5').value = frm[no_form].rm5; 
		
		document.getElementById('r6').value = frm[no_form].r6;  
		document.getElementById('kode6').value = frm[no_form].kode6; 
		document.getElementById('rm6').value = frm[no_form].rm6; 
		
		document.getElementById('r7').value = frm[no_form].r7;
		document.getElementById('kode7').value = frm[no_form].kode7; 
		document.getElementById('rm7').value = frm[no_form].rm7; 
		
		document.getElementById('r8').value = frm[no_form].r8;
		document.getElementById('kode8').value = frm[no_form].kode8; 
		document.getElementById('rm8').value = frm[no_form].rm8; 
		
		document.getElementById('r9').value = frm[no_form].r9; 
		document.getElementById('kode9').value = frm[no_form].kode9; 
		document.getElementById('rm9').value = frm[no_form].rm9; 
		
		document.getElementById('r10').value = frm[no_form].r10;
		document.getElementById('kode10').value = frm[no_form].kode10; 
		document.getElementById('rm10').value = frm[no_form].rm10; 
		
		document.getElementById('r11').value = frm[no_form].r11;
		document.getElementById('kode11').value = frm[no_form].kode11; 
		document.getElementById('rm11').value = frm[no_form].rm11; 
		
		document.getElementById('r12').value = frm[no_form].r12;
		document.getElementById('kode12').value = frm[no_form].kode12; 
		document.getElementById('rm12').value = frm[no_form].rm12; 
		
		document.getElementById('r13').value = frm[no_form].r13;  
		document.getElementById('kode13').value = frm[no_form].kode13; 
		document.getElementById('rm13').value = frm[no_form].rm13;
		
		document.getElementById('r14').value = frm[no_form].r14;
		document.getElementById('kode14').value = frm[no_form].kode14; 
		document.getElementById('rm14').value = frm[no_form].rm14;
		
		document.getElementById('r15').value = frm[no_form].r15;  
		document.getElementById('kode15').value = frm[no_form].kode15; 
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
							var txt16=document.getElementById('rm16').value;
							var txt17=document.getElementById('rm17').value;
							var txt18=document.getElementById('rm18').value;
							var txt19=document.getElementById('target_drying').value;
							
							
							var result19 = parseInt(txt11)*3.2;
							if (!isNaN(result19)) {
							document.getElementById('target_drying').value = result19;
							}
							
							
							var result1 =(txt1) *(txt11) ;
      						if (!isNaN(result1)) {
         					document.getElementById('rm1').value = result1;
							}
							
							var result1a =(txt2) *(txt11) ;
      						if (!isNaN(result1a)) {
         					document.getElementById('rm2').value = result1a;
							}
							
							var result2 = (txt3)  *(txt11);
      						if (!isNaN(result2)) {
         					document.getElementById('rm3').value = result2.toFixed(2);
							}
							
														
							var result4 = (txt4)*(txt11);
      						if (!isNaN(result4)) {
         					document.getElementById('rm4').value = result4.toFixed(2);
							}
							
							var result5 = (txt5) *(txt11);
      						if (!isNaN(result5)) {
         					document.getElementById('rm5').value = result5.toFixed(2);
							}
							
							var result6 = (txt6) *(txt11);
      						if (!isNaN(result6)) {
         					document.getElementById('rm6').value = result6.toFixed(2);
							}
							
							var result7 = (txt7) *(txt11)/10;
      						if (!isNaN(result7)) {
         					document.getElementById('rm7').value = result7.toFixed(2);
							}
							
							var result8 = (txt8) *(txt11);
      						if (!isNaN(result8)) {
         					document.getElementById('rm8').value = result8.toFixed(2);
							}
							
							var result9 = (txt9) *(txt11);
      						if (!isNaN(result9)) {
         					document.getElementById('rm9').value = result9.toFixed(2);
							}
							
							var result10 = (txt10) *(txt11)/10;
      						if (!isNaN(result10)) {
         					document.getElementById('rm10').value = result10.toFixed(2);
							}
							
							var result11 = (txt11a) * (txt11)/10;
      						if (!isNaN(result11)) {
         					document.getElementById('rm11').value = result11.toFixed(2);
							}
							
							var result12 = (txt12) *  (txt11)/10;
      						if (!isNaN(result12)) {
         					document.getElementById('rm12').value = result12.toFixed(2);
							}
							
							var result13 = (txt13) *  (txt11)/10;
      						if (!isNaN(result13)) {
         					document.getElementById('rm13').value = result13.toFixed(2);
							}
							
							var result14 = (txt14) *(txt11)/10;
      						if (!isNaN(result14)) {
         					document.getElementById('rm14').value = result14.toFixed(2);
							}
							
							var result15 = (txt15) * (txt11)/10;
      						if (!isNaN(result15)) {
         					document.getElementById('rm15').value = result15.toFixed(2);
							}
							
							var result16 = (txt16) *(txt11);
							if (!isNaN(result15)) {
         					document.getElementById('rm16').value = result16.toFixed(1);
							}
							
							var result17 =(txt17)*(txt11);
      						if (!isNaN(result17)) {
         					document.getElementById('rm17').value = result17.toFixed(1);
							}
							
							var result18 = (txt18) *(txt11);
      						if (!isNaN(result18)) {
         					document.getElementById('rm18').value = result18.toFixed(1);
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
	  mysql_query("DELETE FROM planprod  WHERE id='$_GET[id]'");
	 mysql_query("DELETE FROM mixing  WHERE id='$_GET[id]'"); 
	
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
