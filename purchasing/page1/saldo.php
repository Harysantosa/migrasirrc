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
        <h1> Data Mutasi Transaksi</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Mutasi Transaksi</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=saldo&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Transaksi</i></button> </a>
	 <a href="cetak_mutasi.php"> <button type="button" class="btn btn-info"><i class = "fa fa-print"> Cetak Laporan Produksi</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="891" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>No rek</th>
                        <th>Saldo Awal</th>
						<th>Jenis Kas</th>
                        <th>Kas Masuk</th>
                        <th>Kas Keluar</th>
                        <th>Keterangan</th>
                        <th>Nominal/Jumlah</th>
						<th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT saldo.*,tblkasmasuk.*,tblkasmasuk.nama as namamasuk, tblkaskeluar.*,
                    tblkaskeluar.nama as namakeluar, tbljeniskas.* FROM saldo LEFT  join tblkasmasuk  on saldo.id_kasmasuk=tblkasmasuk.id_kasmasuk LEFT join tblkaskeluar ON tblkaskeluar.id_kaskeluar=saldo.id_kaskeluar INNER JOIN
                    tbljeniskas ON saldo.id_jeniskas=tbljeniskas.id_jeniskas GROUP BY saldo.no_trans");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){

                        if($r[namamasuk]=='0'){
                          $kasmasuk= " - ";
                        } else{
                          $kasmasuk=$r[namamasuk];
                        }
                        if($r[namakeluar]=='0'){
                          $kaskeluar=" - ";  
                        } else{
                         $kaskeluar=$r[namakeluar];
                         }                         
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$r[no_trans]"?></td>
						 <td><?php echo "$r[no_rek]"?></td>
						<td><?php echo "Rp. ". number_format("$r[saldo]",'0','.','.')?></td>
                        <td><?php echo "$r[namajeniskas]"?></td>
                        <td><?php echo "$kasmasuk"?></td>
                        <td><?php echo "$kaskeluar"?></td>
                        <td><?php echo "$r[ket]"?></td>
                        <td><?php echo "Rp. ". number_format("$r[nominal]",'0','.','.')?></td>
						<td><a href="?pg=saldo&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=saldo&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
                 $query = mysql_query ("INSERT INTO saldo (id,no_trans,nama_bank,no_rek,saldo,id_jeniskas,id_kasmasuk,id_kaskeluar,ket,nominal)
                 VALUES ('','$_POST[no_trans]','$_POST[nama_bank]','$_POST[no_rek]','$_POST[saldo]','$_POST[id_jeniskas]','$_POST[id_kasmasuk]','$_POST[id_kaskeluar]','$_POST[ket]','$_POST[nominal]')");
		  
                echo "<script>window.location='home.php?pg=saldo&act=view'</script>";
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
					     <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from saldo");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 2, "0", STR_PAD_LEFT);
                      $tahun = date('Y/m');
                      $kode_jadi = "TRANS$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Kode Premix</label>
                      <input type="text" class="form-control" id="no_trans" name="no_trans" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_trans" name="no_trans" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					 <input type="hidden" class="form-control" id="id" name="id" placeholder="Nomor Planing"  required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
				
					
					
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Pilih Data Bank</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_rek" id="no_rek" onchange="changeValue(this.value)" >
					<option value=''>-Pilih Nomor Rekening-</option>
					<?php 
					$result = mysql_query("select * from bank");    
					$jsArray = "var frm = new Array();
";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
<option value="' . $row['no_rek'] . '">' . $row['no_rek'] . '</option>';    
$jsArray .= "frm['" . $row['no_rek'] . "'] = {
nama_bank:'" . addslashes($row['nama_bank']) . "',
saldo:'".addslashes($row['saldo'])."'
};
";    
					}      
					?>    
						    </optgroup>
                      </select>
					</div>
					
					<div class="form-group">Nama Bank
                      <input readonly class="form-control" id="nama_bank" name="nama_bank" required data-fv-notempty-message="Tidak boleh kosong">
					</div>	
					
                    <div class="form-group">Saldo Awal
                      <input readonly class="form-control" id="saldo" name="saldo" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
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
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Uang Masuk</label>
                      <input type="number" class="form-control" id="nominal"  name="nominal" placeholder="Jumlah Uang Masuk" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
                    </div>
					
                    
					
					
					<script type="text/javascript">    
	<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_form){ 
		
		document.getElementById('nama_bank').value = frm[no_form].nama_bank;  
		document.getElementById('saldo').value = frm[no_form].saldo; 
		
		
			};  
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
      mysql_query("DELETE FROM saldo WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=saldo&act=view'</script>";
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