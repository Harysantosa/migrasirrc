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
        <h1>Data Verifikasi WIP</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Verifikasi WIP</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
      <a href="?pg=verfwip&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Verifikasi Data</i></button> </a>
	  
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="966" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <th width="41" style="text-align: center">No</th>
                        <th width="194" style="text-align: center">NO Lap Produksi</th>
						<th width="112" style="text-align: center">Tanggal Drying</th>
						<th width="89" style="text-align: center">Shift Drying</th>
						<th width="259" style="text-align: center">WIP Prod</th>
						<th width="158" style="text-align: center">Jumlah</th>
						<th width="136" style="text-align: center">Convert TO</th> 
						<th width="73" style="text-align: center">Final FG</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM vrfwip GROUP by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
						
						<td style="text-align: center"><?php echo "$r[no_lap]"?></td>
						<td style="text-align: center"><?php echo TanggalIndo($r['tgl_drying'])?></td>
                        <td style="text-align: center"><?php echo "$r[shift_drying]"?></td>
                        <td style="text-align: center"><?php echo "$r[nm_fg]"?></td>
						<td style="text-align: center"><?php echo "$r[wip_jml]"?> KG</td>
						<td style="text-align: center"><?php echo "$r[ubah]"?></td>
						<td style="text-align: center"><?php echo "$r[jml]"?> SAK</td>
                        
					
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

    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

      <?php
      break;
      // PROSES TAMBAH DATA PRODUK //
      case 'add':
      if (isset($_POST['add'])) {
		  
                $query = mysql_query("INSERT INTO vrfwip VALUES ('','$_POST[no_lap]','$_POST[tgl_drying]','$_POST[shift_drying]','$_POST[nm_fg]','$_POST[wip_jml]','$_POST[ubah]','$_POST[jml]')");
		  		 		
                echo "<script>window.location='home.php?pg=verfwip&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Mixing</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing</a></li>
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
                      <label for="exampleInputEmail1">NO Verifikasi</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_lap" id="no_lap" onchange="changeValue(this.value)" >
					<option value=''>-Pilih formula-</option>
					<?php 
					$result = mysql_query("select * from wip ");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_wip'] . '">' . $row['no_wip'] . '</option>';    
$jsArray .= "frm['" . $row['no_wip'] . "'] = {

no_lap:'" . addslashes($row['no_lap']) . "',
tgl_drying:'" . addslashes($row['tgl_drying']) . "',
shift_drying:'".addslashes($row['shift_drying'])."',
nm_fg:'".addslashes($row['nm_fg'])."',
wip_jml:'".addslashes($row['wip_jml'])."',
ubah:'".addslashes($row['ubah'])."',
jml:'".addslashes($row['jml'])."'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					
					  <input type="hidden"class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>"/>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Drying</label>
                      <input readonly class="form-control" id="tgl_drying" name="tgl_drying"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  					  
					  <div class="form-group">Shift Drying
                    <input readonly class="form-control" id="shift_drying" name="shift_drying"  >
					</div>	
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Produk WIP</label>
                      <input type="type" class="form-control" id="wip_jml" name="wip_jml" required data-fv-notempty-message="Tidak boleh kosong" />
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Convert Product To</label>
                      <input type="type" class="form-control" id="ubah" name="ubah" required data-fv-notempty-message="Tidak boleh kosong" />
                    </div>
					
					
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Finish Good</label>
                      <input type="type" class="form-control" id="jml" name="jml" required data-fv-notempty-message="Tidak boleh kosong" />
                    </div>
					 					  
					
					  
                 
				<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		document.getElementById('tgl_drying').value = frm[no_form].tgl_drying; 
		document.getElementById('shift_drying').value = frm[no_form].shift_drying; 
		document.getElementById('nm_fg').value = frm[no_form].nm_fg;
		document.getElementById('wip_jml').value = frm[no_form].wip_jml;
		document.getElementById('ubah').value = frm[no_form].ubah;
		document.getElementById('jml').value = frm[no_form].jml;
		
		
		
			};  
					  
					  
						
					</script>
					  
					
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

           
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM gudang_fg WHERE no='$_GET[no]'"));
	
            if (isset($_POST['update'])) {
				
				
				mysql_query("UPDATE gudang_fg SET no_plan='$_POST[no_plan]',fg='$_POST[fg]',tgl_drying='$_POST[tgl_drying]',shift_drying='$_POST[shift_drying]',kurang='$_POST[kurang]',lebih='$_POST[lebih]',total_jumlahprod='$_POST[total_jumlahprod]',total_sisa='$_POST[total_sisa]',total_hasilfg='$_POST[total_hasilfg]',total_fg='$_POST[total_fg]' WHERE no='$_POST[no]'");
               
				mysql_query("UPDATE planprod SET fg='$_POST[fg]' WHERE no='$_POST[no]'");
				 echo "<script>window.location='home.php?pg=gudangfg&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Verifikasi Finish Good</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing Produksi</a></li>
            <li class="active">Lihat Planing Produksi</li>
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
                      <label for="exampleInputEmail1">No Plan Prod</label>
                      <input readonly class="form-control" id="no_plan" name="no_plan" value= "<?php echo $d['no_plan'];?>">
					  </div>
					  
					 <input type="hidden" class="form-control" id="no" name="no" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no'];?>">
					  
                    <label for="exampleInputEmail1">Shift Drying</label> 
                      <select class="form-control select2" name="shift_drying" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div> 
               
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Drying</label>
                      <input readonly class="form-control" id="date" name="tgl_drying"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl_drying'];?>" />
                    </div>
					
                  	 <div class="form-group">
                      <label for="exampleInputEmail1">Aktual drying</label>
                      <input type="text" class="form-control" id="fg" name="fg" value= "<?php echo $d['fg'];?>" onKeyUp="sum()">
                    </div>
					  
				    <div class="form-group">
                      <label for="exampleInputEmail1">Selisih Kurang (HANYA SALAH SATAU SAJA YANG DI INPUT</label>
                      <input type="text" class="form-control" id="kurang" name="kurang" value= "<?php echo $d['kurang'];?>" onKeyUp="sum()">
                    </div>
				 
					 <div class="form-group">
                      <label for="exampleInputEmail1">Selisih Lebih (HANYA SALAH SATU SAJA YANG DI INPUT)</label>
                      <input type="text" class="form-control" id="lebih" name="lebih" value= "<?php echo $d['lebih'];?>" onKeyUp="sum()">
                    </div>
                    
					
				   
					  
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Save</button>
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
      mysql_query("DELETE FROM gudang_fg WHERE no='$_GET[no]'");
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