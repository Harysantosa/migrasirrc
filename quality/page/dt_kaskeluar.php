<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA kaskeluar //      
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kas keluar </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Kas keluar</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=keluar&act=add"> <button type="button" class="btn btn-primary"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kas keluar</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM tblkaskeluar order by id_kaskeluar asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$r[nama]"?></td>
                       <!-- <td><?php echo "Rp.". number_format("$r[harga]",'0','.','.')?></td> -->
                        <td><a href="?pg=keluar&act=edit&id=<?php echo $r['id_kaskeluar']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=keluar&act=delete&id=<?php echo $r['id_kaskeluar']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
      // PROSES TAMBAH DATA kaskeluar //
      case 'add':
      if (isset($_POST['add'])) {
                $query = mysql_query("INSERT INTO tblkaskeluar VALUES ('','$_POST[nama]')");
                echo "<script>window.location='home.php?pg=keluar&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kas keluar </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=keluar&act=view">Data Kas keluar</a></li>
            <li class="active"><a href="#">Tambah Data Kas keluar</a></li>
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
                      <label for="exampleInputEmail1">Nama Kas keluar</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kas keluar" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Kas keluar" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    -->
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-primary">Simpan</button>
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
      // PROSES EDIT DATA kaskeluar //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM tblkaskeluar WHERE id_kaskeluar='$_GET[id]'"));
            if (isset($_POST['update'])) {

                mysql_query("UPDATE tblkaskeluar SET nama='$_POST[nama]' WHERE id_kaskeluar='$_POST[id]'");
                echo "<script>window.location='home.php?pg=keluar&act=view'</script>";
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kas keluar </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=keluar&act=view">Data Kas keluar</a></li>
            <li class="active">Update Data Kas keluar</li>
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
                      <label for="exampleInputEmail1">Nama Kas keluar</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kas keluar" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nama_kaskeluar'];?>">
                    </div>
                  <!--  <div class="form-group">
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Kas keluar" value= "<?php echo $d['harga'];?>">
                      <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id_kaskeluar'];?>">
                    </div> -->
                    
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

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM tblkaskeluar WHERE id_kaskeluar='$_GET[id]'");
      echo "<script>window.location='home.php?pg=keluar&act=view'</script>";
      break;

    }
    ?>