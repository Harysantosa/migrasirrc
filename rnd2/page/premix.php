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
        <h1>Master Formula Premix</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Vendor</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=premix&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Produk Premix</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="445" height="73" class="table table-bordered table-striped"  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="22">No</th>
                        <th width="64">Nama Premix</th>
                       	<th width="50">Edit</th>
						<th width="50">Hapus</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM form_premix GROUP by no asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[nm_rm]"?></td>
						                      
						<td><a href="?pg=premix&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-circle-o"></i></button></a></td>
						<td><a href="?pg=premix&act=delete&no=<?php echo $r['no']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                                    </tr>
						
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
              $query = mysql_query("INSERT INTO form_premix VALUES ('','$_POST[nm_rm]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]')");
		     
		  		  
		  		
                echo "<script>window.location='home.php?pg=premix&act=view'</script>";
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
                   <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk </label>
                      <input "text" class="form-control" id="nm_rm" name="nm_rm" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div> 
					                   
             
						 
                        <div class="form-group">
						<label for="exampleInputEmail1">Input Jumlah Terigu yang dibutuhkan </label>
                     
					  <input "text" class="form-control" id="rm1" name="rm1" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					
                    
                     	 <div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-03 gula" >
					  <input "text" class="form-control" id="rm2" name="rm2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					 
					 <div class="form-group">
                      <input readonly class="form-control" id="r3" name="r3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-05 instant plus" >
					  <input "text" class="form-control" id="rm3" name="rm3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					 <div class="form-group">
                      <input readonly class="form-control" id="r4" name="r4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-47 sunset yellow" >
					  <input "text" class="form-control" id="rm4" name="rm4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r5" name="r5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-53 ponceau" >
					  <input "text" class="form-control" id="rm5" name="rm5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r6" name="r6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-04 calcium" >
					  <input "text" class="form-control" id="rm6" name="rm6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r7" name="r7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-54 tartazine" >
					  <input "text" class="form-control" id="rm7" name="rm7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r8" name="r8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-27 garam halus" >
					  <input "text" class="form-control" id="rm8" name="rm8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r9" name="r9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="rm-51 titanium" >
					  <input "text" class="form-control" id="rm9" name="rm9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					 		
					  
					  
					 
					
									
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM form_premix WHERE no='$_GET[no]'"));
            if (isset($_POST['update'])) {				
                mysql_query("UPDATE form_premix SET nm_rm='$_POST[nm_rm]',rm1='$_POST[rm1]',r2='$_POST[r2]',rm2='$_POST[rm2]',r3='$_POST[r3]',rm3='$_POST[rm3]',r4='$_POST[r4]',rm4='$_POST[rm4]',r5='$_POST[r5]',rm5='$_POST[rm5]',r6='$_POST[r6]',rm6='$_POST[rm6]',r7='$_POST[r7]',rm7='$_POST[rm7]',r8='$_POST[r8]',rm8='$_POST[rm8]',r9='$_POST[r9]',rm9='$_POST[rm9]' WHERE no='$_POST[no]'");
              echo "<script>window.location='home.php?pg=premix&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Ubah Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing Produksi</a></li>
            <li class="active">Edit Planing Produksi</li>
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
               <form ="form" method="post" action="">
                  <div class="box-body">
				  
                         <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk </label>
                      <input "text" class="form-control" id="nm_rm" name="nm_rm" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong"  value="<?php echo $d['nm_rm'];?>" >
                  </div> 
					     <div class="form-group">
					 <input type="hidden" class="form-control" id="no" name="no" placeholder="Nomor Planing" value="<?php echo $d['no'];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    	</div               
             
						 
                        ><div class="form-group">
						<label for="exampleInputEmail1">Input Jumlah Terigu yang dibutuhkan </label>
                     
					  <input "text" class="form-control" id="rm1" name="rm1" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm1'];?>" >
                  </div>
				  
					
                    
                     	 <div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="<?php echo $d['r2'];?>" > 
					  <input "text" class="form-control" id="rm2" name="rm2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong"
					  value="<?php echo $d['rm2'];?>" > 
                  </div>
				  
					 
					 <div class="form-group">
                      <input readonly class="form-control" id="r3" name="r3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="<?php echo $d['r3'];?>" > 
					  <input "text" class="form-control" id="rm3" name="rm3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong"  value="<?php echo $d['rm3'];?>" >  
                  </div>
				  
					 <div class="form-group">
                      <input readonly class="form-control" id="r4" name="r4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="<?php echo $d['r4'];?>" > 
					  <input "text" class="form-control" id="rm4" name="rm4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong"  value="<?php echo $d['rm4'];?>" >  
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r5" name="r5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					   value="<?php echo $d['r5'];?>" > 
					  <input "text" class="form-control" id="rm5" name="rm5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong"  value="<?php echo $d['rm5'];?>" > 
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r6" name="r6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					   value="<?php echo $d['r6'];?>" > 
					  <input "text" class="form-control" id="rm6" name="rm6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong"  value="<?php echo $d['rm6'];?>" > 
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r7" name="r7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="<?php echo $d['r7'];?>" > 
					  <input "text" class="form-control" id="rm7" name="rm7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm7'];?>" >
                  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r8" name="r8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="<?php echo $d['r8'];?>" >
					  <input "text" class="form-control" id="rm8" name="rm8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm8'];?>" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r9" name="r9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="<?php echo $d['r9'];?>" >
					  <input "text" class="form-control" id="rm9" name="rm9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm9'];?>" >
                  </div>
					  
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
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


    <?php
    break;

    // PROSES HAPUS DATA PENGGUNA //
      case 'delete':
      mysql_query("DELETE FROM form_premix WHERE no='$_GET[no]'");
      echo "<script>window.location='home.php?pg=premix&act=view'</script>";
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