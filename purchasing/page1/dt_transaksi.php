
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
			 $d = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='3'"));
			?>
			
			<h2 align="left">Jumlah Saldo <?php echo "Rp. ". number_format("$d[saldo]",'0','.','.')?></h2>
    <a href="?pg=transaksi&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
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
                    $tampil=mysql_query("SELECT tbltransaksi.*,tblkasmasuk.*,tblkasmasuk.nama as namamasuk, tblkaskeluar.*,
                    tblkaskeluar.nama as namakeluar, tbljeniskas.* FROM tbltransaksi LEFT  join tblkasmasuk  on tbltransaksi.id_kasmasuk=tblkasmasuk.id_kasmasuk LEFT join tblkaskeluar ON tblkaskeluar.id_kaskeluar=tbltransaksi.id_kaskeluar INNER JOIN
                    tbljeniskas ON tbltransaksi.id_jeniskas=tbljeniskas.id_jeniskas GROUP BY tbltransaksi.kd_transaksi");
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

                        <?php 
                        $tgl=tgl_indo($r['tgl']);?>
                        <td><?php echo "$r[kd_transaksi]"?></td>
                        <td><?php echo "$tgl"?></td>
                        <td><?php echo "$r[namajeniskas]"?></td>
                        <td><?php echo "$kasmasuk"?></td>
                        <td><?php echo "$kaskeluar"?></td>
                        <td><?php echo "$r[ket]"?></td>
                        <td><?php echo "Rp. ". number_format("$r[nominal]",'0','.','.')?></td>
                        <td><a href="?pg=transaksi&act=edit&id=<?php echo $r['kd_transaksi']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=transaksi&act=delete&id=<?php echo $r['kd_transaksi']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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

                $query = mysql_query("INSERT INTO tbltransaksi (kd_transaksi,tgl,id_jeniskas,id_kasmasuk,id_kaskeluar,ket,nominal)
                 VALUES ('$_POST[kd_transaksi]',
                '$_POST[tgl]','$_POST[id_jeniskas]','$_POST[id_kasmasuk]','$_POST[id_kaskeluar]',
                '$_POST[ket]','$_POST[nominal]')");
                echo "<script>window.location='home.php?pg=transaksi&act=view'</script>";
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
                      <label for="exampleInputEmail1">Masukan Nomor Rekening</label> <br>
                  <select class="form-control select2" id= "rek" name="rek" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong">
                      <option value="">--- Silahkan Pilih ---</option>
                      <?php
                      $tampil=mysql_query("SELECT * FROM bank ");
                      while($r=mysql_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['no_rek']?>"><?php echo $r['no_rek'] ?></option>
                      <?php
                    }
                    ?>


						    </optgroup>
                      </select>
					</div>			
					
					
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Uang Masuk</label>
                      <input type="number" class="form-control" id="nominal"  name="nominal" placeholder="Jumlah Uang Masuk" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    
                    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name ='add' class="btn btn-primary">Simpan</button>
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
      // PROSES EDIT DATA KARYAWAN //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT tbltransaksi.*,tblkasmasuk.*,tblkasmasuk.nama as namamasuk, tblkaskeluar.*,
                    tblkaskeluar.nama as namakeluar, tbljeniskas.* FROM tbltransaksi LEFT  join tblkasmasuk  on tbltransaksi.id_kasmasuk=tblkasmasuk.id_kasmasuk LEFT join tblkaskeluar ON tblkaskeluar.id_kaskeluar=tbltransaksi.id_kaskeluar INNER JOIN
                    tbljeniskas ON tbltransaksi.id_jeniskas=tbljeniskas.id_jeniskas WHERE tbltransaksi.kd_transaksi='$_GET[id]'"));
            if (isset($_POST['update'])) {
              mysql_query("UPDATE tbltransaksi SET tgl='$_POST[tgl]',id_jeniskas='$_POST[id_jeniskas]',
               id_kaskeluar='$_POST[id_kaskeluar]', id_kasmasuk='$_POST[id_kasmasuk]', nominal='$_POST[nominal]',ket='$_POST[ket]' 
                WHERE kd_transaksi='$_POST[kd_transaksi]'");
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
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Transaksi Kas Masuk</label>
                      <input type="text" class="form-control" id="kd_transaksi" name="kd_transaksi"  value= "<?php echo $d[kd_transaksi];?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="kd_transaksi" name="kd_transaksi"  value= "<?php echo $d[kd_transaksi];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Transaksi</label>
                      <input class="form-control" id="date" name="tgl"  value= "<?php echo $d[tgl];?>" placeholder="MM/DD/YYY" type="text"/>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kas</label>
                      <select class="form-control" id="id_jeniskas" name="id_jeniskas" style="width: 100%;">      
                       <?php
                       combo_jeniskas(null);
                       ?>
                    </optgroup>
                      </select>
                    </div>
<!--/////////////////////////////////// kas masuk ///////////////////////////////// -->
                    <div class="form-group" style='display:none;' id="kasmasuk">
                      <label for="exampleInputEmail1">Jenis Kas Masuk</label>
                      <select class="form-control select2" id="id_kasmasuk" name="id_kasmasuk" style="width: 100%;">     
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
                      <input class="form-control" id="ket" name="ket"  value= "<?php echo $d[ket];?>" placeholder="Keterangan Lengkap tentang transaksi kas masuk" type="text"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Uang Masuk</label>
                      <input type="number" class="form-control" id="nominal"  name="nominal" value= "<?php echo $d[nominal];?>" placeholder="Jumlah Uang Masuk" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    
                    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
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
      mysql_query("DELETE FROM tbltransaksi WHERE kd_transaksi='$_GET[id]'");
      echo "<script>window.location='home.php?pg=transaksi&act=view'</script>";
      break;

    }
    ?>