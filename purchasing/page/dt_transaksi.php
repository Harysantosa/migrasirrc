
<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {

    switch ($_GET['act']) {
    // PROSES VIEW DATA transaksi //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data transaksi </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=transaksi&act=view">Data transaksi</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
		<?php
			 $d = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='1'"));
			  $e = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='2'"));
			   $f = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='3'"));
			   $h = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='4'"));
			?>
			
			<h2 align="left">Jumlah Saldo <?php echo "Rp. ". number_format("$d[saldo]",'0','.','.')?></h2>
			<h2 align="left">Jumlah Saldo <?php echo "Rp. ". number_format("$e[saldo]",'0','.','.')?></h2>
			<h2 align="left">Jumlah Saldo <?php echo "Rp. ". number_format("$f[saldo]",'0','.','.')?></h2>
			<h2 align="left">Jumlah Saldo <?php echo "Rp. ". number_format("$h[saldo]",'0','.','.')?></h2>
    <a href="?pg=transaksi&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="1143" height="52" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th width="29">No</th>
                        <th width="153">Kode Transaksi</th>
                        <th width="77">Tanggal</th>
                        <th width="113">Kas Masuk</th>
                        <th width="110">Kas Keluar</th>
                        <th width="159">Nominal Kas Masuk</th>
						<th width="199">Nominal Kas Keluar</th>
						<th width="148">Keterangan</th>
                       
                        <th width="72">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT tbltransaksi.*,tblkasmasuk.*,tblkasmasuk.nama as namamasuk, tblkaskeluar.*,
                    tblkaskeluar.nama as namakeluar, tbljeniskas.* FROM tbltransaksi LEFT  join tblkasmasuk  on tbltransaksi.id_kasmasuk=tblkasmasuk.id_kasmasuk LEFT join tblkaskeluar ON tblkaskeluar.id_kaskeluar=tbltransaksi.id_kaskeluar INNER JOIN
                    tbljeniskas ON tbltransaksi.id_jeniskas=tbljeniskas.id_jeniskas GROUP BY tbltransaksi.kd_transaksi");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){

                        if($r['namamasuk']=='0'){
                          $kasmasuk= " - ";
                        } else{
                          $kasmasuk=$r['namamasuk'];
                        }
                        if($r['namakeluar']=='0'){
                          $kaskeluar=" - ";  
                        } else{
                         $kaskeluar=$r['namakeluar'];
                         }                         
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>

                        <?php 
                        $tgl=tgl_indo($r['tgl']);?>
                        <td><?php echo "$r[kd_transaksi]"?></td>
                        <td><?php echo "$tgl"?></td>
                        <td><?php echo "$kasmasuk"?></td>
                        <td><?php echo "$kaskeluar"?></td>
                        <td><?php echo "Rp. ". number_format("$r[nominal]",'0','.','.')?></td>
						<td><?php echo "Rp. ". number_format("$r[nominal1]",'0','.','.')?></td>
						<td><?php echo "$r[ket]"?></td>
                        
                        <td><a href="?pg=transaksi&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
      // PROSES TAMBAH DATA transaksi //
      case 'add':


      if (isset($_POST['add'])) {
	 

                $query = mysql_query("INSERT INTO tbltransaksi VALUES ('','$_POST[kd_transaksi]','$_POST[tgl]',
				'$_POST[id_jeniskas]','$_POST[id_kasmasuk]','$_POST[id_kaskeluar]','$_POST[ket]','$_POST[nominal]',
				'$_POST[nominal1]','$_POST[nama_bank4]','$_POST[nama_bank3]')");
              
               echo "<script> alert('data berhasil disimpan');window.location='home.php?pg=transaksi&act=view'</script>";
             
			   
			   }
              ?>


<div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data transaksi  </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=transaksi&act=view">Data transaksi </a></li>
            
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
                <form role="form" method = "POST" action="" enctype ="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                  <?php $kd_trans= kd_trs_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Transaksi</label>
                      <input type="text" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans;?>" name="kd_transaksi"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans;?>" name="kd_transaksi"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Transaksi</label>
                      <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong"/>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kas</label>
                      <select class="form-control" id="id_jeniskas" name="id_jeniskas" style="width: 100%; required data-fv-notempty-message="Tidak boleh kosong"">      
                       <?php
                       combo_jeniskas(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
<!--/////////////////////////////////// kas masuk ///////////////////////////////// -->
                    <div class="form-group" style='display:none;' id="kasmasuk">
							
					
				 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis </label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_bank4" id="nama_bank4" onchange="changerm3(this.value)" >
					<option value=''>-Pilih Nama Bank -</option>
					<?php 
					$result3 = mysql_query("select * from bank order by id");    
					$jsArray3 = "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['no_rek'] . '">' . $row['no_rek'] . '</option>';    
$jsArray3 .= "frm3['" . $row['no_rek'] . "'] = {
nama_bank1:'" . addslashes($row['nama_bank']) . "',
saldo1:'" . addslashes($row['saldo']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
						<input readonly class="form-control" id="saldo1" name="saldo" onKeyUp="sum();">
					<input readonly class="form-control" id="nama_bank1" name="nama_bank" onKeyUp="sum();">
					<input readonly class="form-control" id="sisa1" name="sisa" onKeyUp="sum();">
					
					<input type="number" class="form-control" id="nominal1"  name="nominal" placeholder="Jumlah Uang " onKeyUp="sum();">
					  </div>
                      <label for="exampleInputEmail1">Jenis Kas Masuk</label>
                      <select class="form-control select2" id="id_kasmasuk" name="id_kasmasuk" style="width: 100%; ">
                     
                     <?php
                     combo_kasmasuk(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
                    <!--/////////////////////////////////// kas keluar ///////////////////////////////// -->
                    <div class="form-group" style='display:none;' id="kaskeluar">
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_bank3" id="nama_bank3" onchange="changerm2(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result2 = mysql_query("select * from bank order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['no_rek'] . '">' . $row['no_rek'] . '</option>';    
$jsArray2 .= "frm2['" . $row['no_rek'] . "'] = {
nama_bank2:'" . addslashes($row['nama_bank']) . "',
saldo2:'" . addslashes($row['saldo']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
						<input readonly class="form-control" id="saldo2" name="saldo" onKeyUp="sum();">
					<input readonly class="form-control" id="nama_bank2" name="nama_bank" onKeyUp="sum();">
					<input readonly class="form-control" id="sisa2" name="sisa" onKeyUp="sum();">
					
					<input type="number" class="form-control" id="nominal2"  name="nominal1" placeholder="Jumlah Uang "  onKeyUp="sum();">
					  </div>
                      <label for="exampleInputEmail1">Jenis Kas Keluar</label>
                      <select class="form-control select2" id="id_kaskeluar" name="id_kaskeluar" style="width: 100%;">
                     
                     <?php
                     combo_kaskeluar(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan/Detail</label>
                      <input class="form-control" id="ket" name="ket"  placeholder="Keterangan Lengkap tentang transaksi kas masuk" required data-fv-notempty-message="Tidak boleh kosong" type="text"/>
                    </div>
			
                   
                  
                    
					<script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changerm3(value){ 
	
						document.getElementById('nama_bank1').value = frm3[value].nama_bank1;
						document.getElementById('saldo1').value = frm3[value].saldo1;
						
						
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changerm2(value){ 
	
						document.getElementById('nama_bank2').value = frm2[value].nama_bank2;
						document.getElementById('saldo2').value = frm2[value].saldo2;
						
						
						};  
	  					</script>
						
						<script>
						 function sum() {
							var txt1 = document.getElementById('saldo2').value;
							var txt2 = document.getElementById('nominal2').value;
							var txt4 = document.getElementById('sisa2').value;
							
							var txt6 = document.getElementById('saldo1').value;
							var txt7 = document.getElementById('nominal1').value;
							var txt8 = document.getElementById('sisa1').value;
							
							
							
							var result3 =(parseInt(txt6)+parseInt(txt7));
      						if (!isNaN(result3)) {
         					document.getElementById('sisa1').value = result3;
							}
							
							var result1 = (parseInt(txt1)-parseInt(txt2));
      						if (!isNaN(result1)) {
         					document.getElementById('sisa2').value = result1;
							}
							
							
							}
							</script>
							
							
                     <button type="submit" name ='add' class="btn btn-primary">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  </form>    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              
                  
          
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
      // PROSES EDIT DATA KARYAWAN //
      case 'edit':
     $d = mysql_fetch_array(mysql_query("SELECT * FROM tbltransaksi where id='$_GET[id]'"));
            if (isset($_POST['update'])) {
              mysql_query("UPDATE tbltransaksi SET kd_transaksi= '$_POST[kd_transaksi]',tgl='$_POST[tgl]',
				id_jeniskas='$_POST[id_jeniskas]',id_kasmasuk='$_POST[id_kasmasuk]',id_kaskeluar='$_POST[id_kaskeluar]',ket='$_POST[ket]',nominal='$_POST[nominal]',
				nominal1='$_POST[nominal1]',nama_bank4='$_POST[nama_bank4]',nama_bank3='$_POST[nama_bank3]' WHERE id='$_POST[id]'");
                echo "<script>window.location='home.php?pg=transaksi&act=view'</script>";            
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data transaksi kas masuk </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=transaksi&act=view">Data transaksi</a></li>
            <li class="active">Update Data transaksi</li>
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
                <form role="form" method = "POST" action="">
                  <div class="form-group">
                
                      <label for="exampleInputEmail1">Kode Transaksi</label>
                      <input readonlyclass="form-control" id="kd_transaksi" value="<?php echo $d['kd_transaksi'];?>"name="kd_transaksi"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                     <input type="hidden" class="form-control" id="id" value="<?php echo $d['id'];?>"  name="id"   required data-fv-notempty-message="Tidak boleh kosong">
					  
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Transaksi</label>
                      <input class="form-control" id="date" name="tgl"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong"/>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kas</label>
                      <select class="form-control" id="id_jeniskas" name="id_jeniskas" style="width: 100%; required data-fv-notempty-message="Tidak boleh kosong"">      
                       <?php
                       combo_jeniskas(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
<!--/////////////////////////////////// kas masuk ///////////////////////////////// -->
                    <div class="form-group" style='display:none;' id="kasmasuk">
							
					
				 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis </label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_bank4" id="nama_bank4" onchange="changerm3(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result3 = mysql_query("select * from bank order by id");    
					$jsArray3 = "var frm3 = new Array();
";        
					while ($row = mysql_fetch_array($result3)) {    
					echo '
<option value="' . $row['no_rek'] . '">' . $row['no_rek'] . '</option>';    
$jsArray3 .= "frm3['" . $row['no_rek'] . "'] = {
nama_bank1:'" . addslashes($row['nama_bank']) . "',
saldo1:'" . addslashes($row['saldo']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
						<input readonly class="form-control" id="saldo1" name="saldo" onKeyUp="sum();">
					<input readonly class="form-control" id="nama_bank1" name="nama_bank" onKeyUp="sum();">
					<input readonly class="form-control" id="sisa1" name="sisa" onKeyUp="sum();">
					
					<input type="number" class="form-control" id="nominal1"  name="nominal" placeholder="Jumlah Uang " onKeyUp="sum();">
					  </div>
                      <label for="exampleInputEmail1">Jenis Kas Masuk</label>
                      <select class="form-control select2" id="id_kasmasuk" name="id_kasmasuk" style="width: 100%; ">
                     
                     <?php
                     combo_kasmasuk(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
                    <!--/////////////////////////////////// kas keluar ///////////////////////////////// -->
                    <div class="form-group" style='display:none;' id="kaskeluar">
					 <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang ke-3</label> <br>
                       <select class="form-control select2" style="width: 100%;" name="nama_bank3" id="nama_bank3" onchange="changerm2(this.value)" >
					<option value=''>-Pilih NO SO-</option>
					<?php 
					$result2 = mysql_query("select * from bank order by id");    
					$jsArray2 = "var frm2 = new Array();
";        
					while ($row = mysql_fetch_array($result2)) {    
					echo '
<option value="' . $row['no_rek'] . '">' . $row['no_rek'] . '</option>';    
$jsArray2 .= "frm2['" . $row['no_rek'] . "'] = {
nama_bank2:'" . addslashes($row['nama_bank']) . "',
saldo2:'" . addslashes($row['saldo']) . "'

};
";    
					}      
					?>    
						    </optgroup>
                      </select>
						<input readonly class="form-control" id="saldo2" name="saldo" onKeyUp="sum();">
					<input readonly class="form-control" id="nama_bank2" name="nama_bank" onKeyUp="sum();">
					<input readonly class="form-control" id="sisa2" name="sisa" onKeyUp="sum();">
					
					<input type="number" class="form-control" id="nominal2"  name="nominal1" placeholder="Jumlah Uang "  onKeyUp="sum();">
					  </div>
                      <label for="exampleInputEmail1">Jenis Kas Keluar</label>
                      <select class="form-control select2" id="id_kaskeluar" name="id_kaskeluar" style="width: 100%;">
                     
                     <?php
                     combo_kaskeluar(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan/Detail</label>
                      <input class="form-control" id="ket" name="ket"  placeholder="Keterangan Lengkap tentang transaksi kas masuk" required data-fv-notempty-message="Tidak boleh kosong" type="text"/>
                    </div>
			
                   
                  
                    
					<script>
					  	<?php 
						echo 
						$jsArray3; 
						?>  
						 
						function changerm3(value){ 
	
						document.getElementById('nama_bank1').value = frm3[value].nama_bank1;
						document.getElementById('saldo1').value = frm3[value].saldo1;
						
						
						};  
	  					</script>
						
						<script>
					  	<?php 
						echo 
						$jsArray2; 
						?>  
						 
						function changerm2(value){ 
	
						document.getElementById('nama_bank2').value = frm2[value].nama_bank2;
						document.getElementById('saldo2').value = frm2[value].saldo2;
						
						
						};  
	  					</script>
						
						<script>
						 function sum() {
							var txt1 = document.getElementById('saldo2').value;
							var txt2 = document.getElementById('nominal2').value;
							var txt4 = document.getElementById('sisa2').value;
							
							var txt6 = document.getElementById('saldo1').value;
							var txt7 = document.getElementById('nominal1').value;
							var txt8 = document.getElementById('sisa1').value;
							
							
							
							var result3 =(parseInt(txt6)+parseInt(txt7));
      						if (!isNaN(result3)) {
         					document.getElementById('sisa1').value = result3;
							}
							
							var result1 = (parseInt(txt1)-parseInt(txt2));
      						if (!isNaN(result1)) {
         					document.getElementById('sisa2').value = result1;
							}
							
							
							}
							</script>
							
          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-primary">Update</button>
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

    // PROSES HAPUS DATA transaksi //
      case 'delete':
      mysql_query("DELETE FROM tbltransaksi WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=transaksi&act=view'</script>";
      break;

    }
    ?>