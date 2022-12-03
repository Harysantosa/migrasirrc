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
        <h1> Data Produksir</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Produksi</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
       <a href="?pg=dataprod&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Laporan Produksi</i>
		</button> </a>   
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped" id="example1" border="6" style="width: 100%;">
                    <thead>
                      <tr>
                                      <th colspan="6" style="text-align: center">DATA MIXING</th>
                                      <th colspan="7" style="text-align: center">DATA DRYING</th>
						                
			       
                 
                                  
						
                      <tr>
                        <th width="24" style="text-align: center">No</th>
						<th width="99" style="text-align: center">No Laporan</th>
                        <th width="99" style="text-align: center">No Planing Produksi</th>
                        <th width="99" style="text-align: center">Tanggal Produksi</th>
                        <th width="70" style="text-align: center">Nama Produk</th>
                        <th width="45" style="text-align: center">Shift</th>
                        <th width="75" style="text-align: center">Target Pershift</th>
                        <th width="97" style="text-align: center">Jumlah Produksi</th>
                        <th width="95" style="text-align: center">Aktual Drying</th>
						<th width="95" style="text-align: center">Target Drying</th>
						<th width="95" style="text-align: center">Prosentase</th>
						<th width="48" style="text-align: center">Tgl Drying</th>
                        <th width="80" style="text-align: center">Shift Drying</th>
                     	<th width="66" style="text-align: center">Ket</th>
                          <th width="66" style="text-align: center">Input Data Drying</th>
                      </tr>
					  </thead>
					  		    </tr>
						  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM mixing order by id");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					?>
					
                      <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						 <td style="text-align: center"><?php echo "$r[no_lap]"?></td> 
                        <td style="text-align: center"><?php echo "$r[no_plan]"?></td>
                        <td align="left" style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
                        <td align="left" style="text-align: center"><?php echo "$r[nm_fg]"?></td>
                        <td align="left" style="text-align: center"><?php echo "$r[shift]"?></td>
                        <td align="center" style="text-align: center"><?php echo "$r[batch1]"?> Batch</td>
						<td align="center" style="text-align: center"><?php echo "$r[jumlahprod]"?> Batch</td>
						<td align="center" style="text-align: center"><?php echo "$r[fg]"?> Sak</td>
                        <td align="center" style="text-align: center"><?php echo "$r[target_dry]"?> Sak</td>
                        <td align="center" style="text-align: center"><?php echo "$r[prosentase]"?> %</td>
						<td align="center" style="text-align: center"><?php echo TanggalIndo($r['tgl_drying'])?></td>
                        <td align="center" style="text-align: center"><?php echo "$r[shift_drying]"?></td>
						   <td align="center" style="text-align: center"><?php echo "$r[berita]"?></td>
                        <td style="text-align: center"><a href="?pg=dataprod&act=edit&id=<?php echo $r['id']?>">
                         <button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button>
                        </a></td>
                        
                      </tr>
                                 
                                </tbody>
						 <?php
                         $no++;
					}
				
						?>
                                    <tr>
                                      <td align = "left" bordercolor="#F81115" colspan="6" col><span style="font-weight:bold">TOTAL</span></td>
										
										<?php
			
                               $liatHarga=mysql_fetch_array(mysql_query("SELECT sum(jumlahprod) as total_jumlahprod,sum(fg) as total_fg FROM mixing id"));
                        ?>
						
						
                                  <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold"><?php echo "". number_format("$liatHarga[total_jumlahprod]",'0','.','.')?> Batch</span></td>
                              <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold"><?php echo number_format("$liatHarga[total_fg]",'0','.','.')?> Sak</span></td>
								
                                </tr>
						 
                                  
                                </table>
                                  <span style="font-weight:bold"></span></td>
                              </tr>
                            </tbody>
                          </table>                            <span style="font-weight:bold"></span></td>
                        </tr>
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
		  
                $query = mysql_query("INSERT INTO mixing VALUES ('','$_POST[no_lap]','$_POST[no_plan]','$_POST[tgl]','$_POST[shift]','$_POST[batch1]','$_POST[nm_fg]','$_POST[jumlahprod]','$_POST[target_dry]','$_POST[prosentase]','$_POST[fg]','$_POST[tgl_drying]','$_POST[shift_drying]','$_POST[total_jumlahprod]','$_POST[berita]')");
		  
		  		$query .= mysql_query("INSERT INTO planprod VALUES ('','$_POST[jumlahprod]')");
		 		
		  
		  	    echo "<script>window.location='home.php?pg=dataprod&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Mixing</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=dataprod&act=view">Data Planing</a></li>
            <li class="active">Tambah Data Produksi</li>
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
					 <?php $kd_trans= kd_lp_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="no_lap" value="<?php echo $kd_trans;?>" name="no_lap"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_lap" value="<?php echo $kd_trans;?>" name="no_lap"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
					<div class="form-group">
                      <label for="exampleInputEmail1">Planing Produksi</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_plan" id="no_plan" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from planprod ");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_plan'] . '">' . $row['no_plan'] . '</option>';    
$jsArray .= "frm['" . $row['no_plan'] . "'] = {
tgl:'" . addslashes($row['tgl']). "',
shift:'".addslashes($row['shift'])."',
batch1:'".addslashes($row['batch1'])."',
nm_fg:'".addslashes($row['nm_fg'])."'
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					<div class="form-group">Tanggal Rekap
                      <input readonly class="form-control" id="tgl" name="tgl" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					
					 <div class="form-group">Shift mixing
                      <input readonly class="form-control" id="shift" name="shift"  >
                    </div>
										  																	
					<div class="form-group">Target Perhari
                      <input readonly class="form-control" id="batch1" name="batch1"  >
                    </div>
					
					<div class="form-group">Nama Produk
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" >
                    </div>
					 
					
					 <div class="form-group">Actual Produksi Roti
					  <input type="text" class="form-control" id="jumlahprod" name="jumlahprod" onClick="sum();">
                  </div>
					  
					  <div class="form-group">Target Drying
					  <input readonly class="form-control" id="target_dry" name="target_dry" onKeyUp="sum();">
                      </div>
					 					  
					   <div class="form-group">Actual Drying
					  <input type="text" class="form-control" id="fg" name="fg" onKeyUp="sum();">
                      </div>
					  					  				  
					  
					  <div class="form-group">Prosentase
					  <input type="text" class="form-control" id="prosentase" name="prosentase" onKeyUp="sum();">
                     </div>
					  
					<div class="form-group">Tanggal Drying
                    <input class="form-control" id="date" name="tgl_drying"  placeholder="MM/DD/YYY" type="text">
					</div>	
					  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shift Drying</label> 
                      <select class="form-control select2" name="shift_drying" style="width: 100%;" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div>
					  
					  
					<div class="form-group">Keteranagn
                    <input class="form-control" id="berita" name="berita"  placeholder="keterangan" type="text">
					</div>	
					
					<div class="form-group"></div>
<script>
					  				
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_plan){ 
		
		document.getElementById('tgl').value = frm[no_plan].tgl;  
		document.getElementById('nm_fg').value = frm[no_plan].nm_fg;
		document.getElementById('shift').value = frm[no_plan].shift; 
		document.getElementById('batch1').value = frm[no_plan].batch1;
		
		
		
			};  
				  </script>
		
					
				  <script>
						function sum() {
var txt10=document.getElementById('fg').value;
var txt11=document.getElementById('target_dry').value;
var txt12=document.getElementById('prosentase').value;
var txt13=document.getElementById('jumlahprod').value;

	
var result6 = parseInt(txt10) / parseInt(txt11)*100;
if (!isNaN(result6)) {
document.getElementById('prosentase').value = result6.toFixed(1);
}

var result7 = parseInt(txt13)*3.2;
	if (!isNaN(result7)) {
document.getElementById('target_dry').value = result7.toFixed(1);
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


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM mixing WHERE id='$_GET[id]'"));
	
            if (isset($_POST['update'])) {
				
				
				mysql_query("UPDATE mixing SET no_plan='$_POST[no_plan]', tgl='$_POST[tgl]', shift='$_POST[shift]', batch1='$_POST[batch1]', nm_fg='$_POST[nm_fg]', jumlahprod='$_POST[jumlahprod]', target_dry='$_POST[target_dry]', prosentase='$_POST[prosentase]', fg='$_POST[fg]', tgl_drying='$_POST[tgl_drying]', shift_drying='$_POST[shift_drying]', total_jumlahprod='$_POST[total_jumlahprod]' WHERE id='$_POST[id]'");
				
                
				
				 echo "<script>window.location='home.php?pg=dataprod&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Planing</a></li>
            <li class="active"><a href="#">Tambah Data Planing</a></li>
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
                      <input readonly class="form-control" id="no_plan" name="no_plan" value= "<?php echo $d['no_plan'];?>">
				    </div>
					  <input type="hidden"class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>"/>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Produksi Roti</label>
                      <input readonly class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>" />
                    </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Shift Mixing</label>
                      <input readonly class="form-control" id="shift" name="shift"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['shift'];?>" >
                    </div>
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Target Produksi Roti</label>
                      <input readonly class="form-control" id="batch1" name="batch1"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['batch1'];?>" onClick="sum();">
                    </div>
					  
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_fg'];?>" />
                    </div>
					  
					
					 <div class="form-group">Actual Produksi Roti
					  <input type="text" class="form-control" id="jumlahprod" name="jumlahprod" value= "<?php echo $d['jumlahprod'];?>" onClick="sum();">
                  </div>
					  
					  <div class="form-group">Target Drying
					  <input readonly class="form-control" id="target_dry" name="target_dry" value= "<?php echo $d['target_dry'];?>"  onKeyUp="sum();">
                      </div>
					 					  
					   <div class="form-group">Actual Drying
					  <input type="text" class="form-control" id="fg" name="fg" value= "<?php echo $d['fg'];?>"  onKeyUp="sum();">
                      </div>
					  
					  				  
					  
					  <div class="form-group">Prosentase
					  <input type="text" class="form-control" id="prosentase" name="prosentase" value= "<?php echo $d['prosentase'];?>"  onKeyUp="sum();">
                     </div>
					  
					<div class="form-group">Tanggal Drying
                    <input class="form-control" id="date" name="tgl_drying"  placeholder="MM/DD/YYY" type="text" value= "<?php echo $d['tgl_drying'];?>">
					</div>	
					  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shift Drying</label> 
                      <select class="form-control select2" name="shift_drying" style="width: 100%;" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div>
					  
					  					  
					  
					 <script language="JavaScript" type="text/javascript">
						function hitung(){
							
var myForm = document.form1;
var jumlahprod=eval(myForm.jumlahprod.value);
var pil= myForm.nm_fg.value;
							
if (pil == "SAPU JAGAT BREADCRUMB MIX(001)BIRU") {

var a  = (jumlahprod*5)*3.2;

 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(002)") {
var a  = 16 * 3.2;

}
else if (pil == "SAPU JAGAT BREADCRUMB MIX(003)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(004)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(005)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(006)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(007)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(008)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(009)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(010)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(011)") {
var a  = 16 * 3.2;
 }
else if (pil == "SAPU JAGAT BREADCRUMB MIX(012)") {
var a  = 16 * 3.2;
 }		
else if (pil== "ROYAL WHITE (014)") {
var a  = 10 * 3.2;
 }
 myForm.target_dry.value = a;
 
}
function resetForm(){
document.form1.reset();
}
			
function sum() {
var txt10=document.getElementById('fg').value;
var txt11=document.getElementById('target_dry').value;
var txt12=document.getElementById('prosentase').value;
var txt13=document.getElementById('jumlahprod').value;

	
var result6 = parseInt(txt10) / parseInt(txt11)*100;
if (!isNaN(result6)) {
document.getElementById('prosentase').value = result6.toFixed(1);
}

var result7 = parseInt(txt13)*3.2;
	if (!isNaN(result7)) {
document.getElementById('target_dry').value = result7.toFixed(1);
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

              <button type="submit" name = 'update' class="btn btn-info" >Save</button>

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
      mysql_query("DELETE FROM mixing WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=dataprod&act=view'</script>";
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