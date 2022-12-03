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
        <h1>Data Sisa Drying</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Sisa Drying</ol>
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
                        <tr>
                        <th width="24" style="text-align: center">No</th>
						<th width="99" style="text-align: center">No Laporan</th>
                        <th width="99" style="text-align: center">No Planing Produksi</th>
                        <th width="99" style="text-align: center">Tanggal Produksi</th>
                        <th width="70" style="text-align: center">Nama Produk</th>
                        <th width="45" style="text-align: center">Shift</th>
                        <th width="75" style="text-align: center">Target Drying</th>
                       
						           	<th width="66" style="text-align: center">Adjust</th>
				
                      </tr>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM sisadrying where jumlah>0");
            		 $no = 1;
			        while ($r=mysql_fetch_array($tampil)){
					?>
					
                      <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						 <td style="text-align: center"><?php echo "$r[no_lap]"?></td> 
                        <td style="text-align: center"><?php echo "$r[plan_prod]"?></td>
                        <td align="left" style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
                        <td align="left" style="text-align: center"><?php echo "$r[nm_fg]"?></td>
                        <td align="left" style="text-align: center"><?php echo "$r[shift]"?></td>
                        <td align="center" style="text-align: center"><?php echo "$r[sisa_drying]"?> Sak</td>
					
								
                        <td style="text-align: center"><a href="?pg=sisadrying&act=add&id=<?php echo $r['id']?>">
                         <button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button>
                        </a></td>
						
                      </tr>
                                 
                                </tbody>
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
	   $d = mysql_fetch_array(mysql_query("SELECT * FROM sisadrying WHERE id='$_GET[id]'"));
      if (isset($_POST['add'])) {
	 	  	   
        mysql_query("UPDATE sisadrying SET no_lap='$_POST[no_lap]',plan_prod='$_POST[plan_prod]', shift_drying='$_POST[shift_drying]', nm_fg='$_POST[nm_fg]', jumlah='$_POST[jumlah]', fg='$_POST[fg]', sisa_drying='$_POST[sisa_drying]', aktual_drying='$_POST[aktual_drying]' ,prosentase='$_POST[prosentase]',tgl_drying='$_POST[tgl_drying]', berita='$_POST[berita]' WHERE id='$_POST[id]'");
		        
           
        $query = mysql_query("INSERT INTO lapprod VALUES ('','$_POST[no_lap]','$_POST[plan_prod]','$_POST[tgl]'
        ,'$_POST[shift]','$_POST[nm_fg]','$_POST[lot]','$_POST[aktualroti]','$_POST[sisa]','$_POST[jumlah]'
        ,'$_POST[fg]','$_POST[sisa_drying]','$_POST[prosentase]','$_POST[tgl_drying]','$_POST[shift_drying]','$_POST[berita]')");
       echo "<script> alert('data berhasil disimpan dan Sisa Racikan Terpotong !');window.location='home.php?pg=dataprod&act=view'</script>";
        }
           
                ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Adjust Drying</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=dataprod&act=view">Data Drying</a></li>
            <li class="active">Adjust Data Drying</li>
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
				  <div>
			   
					 
                   <div class="form-group">
                      <label for="exampleInputEmail1">No Lap Produksi</label>
                      <input readonly class="form-control" id="no_lap" name="no_lap" value= "Sisa Drying <?php echo $d['no_lap'];?>" >
					  
					</div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">No Plan Produksi</label>
                      <input readonly class="form-control" id="plan_prod" name="plan_prod" value= "Sisa Drying <?php echo $d['plan_prod'];?>" >
					   <input type="hidden" class="form-control" id="id" name="id" value= "<?php echo $d['id'];?>" >
					 
                    </div>
					
                    <div class="form-group">Nama Produk
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" value= "<?php echo $d['nm_fg'];?>"/>
                    </div>
					 
					 <div class="form-group">Target Perhari
                      <input readonly class="form-control" id="sisa_drying" name="sisa_drying" onKeyUp="sum();"  value= "<?php echo $d['sisa_drying'];?>"/>
                    </div>
										 					  
					   <div class="form-group">Actual Drying
					  <input type="text" class="form-control" id="fg" name="fg" onKeyUp="sum();">
                      </div>

                      <div class="form-group">Sisa hasil
					  <input type="text" class="form-control" id="sisa_hasil" name="sisa_hasil" onKeyUp="sum();">
                      </div>

                   		  
					  
					  <div class="form-group">Prosentase
					  <input type="text" class="form-control" id="prosentase" name="prosentase" onKeyUp="sum();">
                     </div>
					  
					<div class="form-group">Tanggal Drying
                    <input class="form-control" id="date" name="tgl_drying"  placeholder="MM/DD/YYY" type="text">
					</div>	

          <div class="form-group">Shift Drying
                    <input class="form-control" id="shift_drying" name="shift_drying"  type="text" value= "<?php echo $d['shift_drying'];?>"/>
					</div>	
					  
					  
					 	
          



					  <div class="form-group">Berita
                    <input class="form-control" id="berita" name="berita"  type="text">
					</div>					  
					  
					 <script language="JavaScript" type="text/javascript">
						
						function sum() {
var txt10=document.getElementById('fg').value;						
var txt11=document.getElementById('sisa_drying').value;
var txt12=document.getElementById('prosentase').value;
var txt13=document.getElementById('sisa_hasil').value;



	
var result6 = parseInt(txt10) / parseInt(txt11)*100;
if (!isNaN(result6)) {
document.getElementById('prosentase').value = result6.toFixed(1);
}

var result7 = parseInt(txt11) - parseInt(txt10);
if (!isNaN(result7)) {
document.getElementById('sisa_hasil').value = result7;
}



}
						
						
						
					</script>
					  
					
				  <!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info" onclick="return confirm('Apakah anda yakin sudah Menghitung Jumlah Barang Masuk?');">Simpan</button>
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
                      <input readonly class="form-control" id="batch1" name="batch1"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['batch1'];?>" onKeyUp="sum();">
                    </div>
					  
					  
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nm_fg'];?>" />
                    </div>
					  
					
					 <div class="form-group">Actual Produksi Roti
					  <input type="text" class="form-control" id="jumlahprod" name="jumlahprod" value= "<?php echo $d['jumlahprod'];?>" onKeyUp="sum();">
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