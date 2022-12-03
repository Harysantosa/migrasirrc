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
        <h1>Data Rekening Bank</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Bank</ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=bank&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data Bank</i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="98%" height="73" class="table table-bordered table-striped"  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="150">No</th>
                        <th width="399">Nama Bank</th>
                        <th width="405">NO Rekening</th>
                        <th width="290">Saldo</th>
                        <th width="405">Edit</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM bank GROUP by id ");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[nama_bank]"?></td>
						<td><?php echo "$r[no_rek]"?></td>
						 <td><?php echo "Rp.". number_format("$r[saldo]",'0','.','.')?></td>
             <td style="text-align: center"><a href="?pg=bank&act=edit&id=<?php echo $r['id']?>">
                         <button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button>
                        </a></td>
                      
                        
						
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
              $query .= mysql_query("INSERT INTO bank VALUES ('','$_POST[nama_bank]','$_POST[no_rek]','$_POST[saldo]')");
		     
		  		  
		  		
                echo "<script>window.location='home.php?pg=bank&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Bank</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing</a></li>
            <li class="active">Tambah Data Bank</li>
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
                   	<input type="text" class="form-control" id="nama_bank" name="nama_bank" onKeyUp="sum();" placeholder="Input Nama Bank">
                    </div>
					  
					  <div class="form-group">
                      <input type="text" class="form-control" id="no_rek" name="no_rek" onKeyUp="sum();" placeholder="input no rekening bank">
                    </div>
					  
					  <div class="form-group">
                    <input type="text" class="form-control" id="saldo" name="saldo" onKeyUp="sum();" placeholder="input saldo bank">
                    </div>
					  
					 				  
					 
					
									
					<!-- /.box --><!-- /.col --><!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
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
        
        $d = mysql_fetch_array(mysql_query("SELECT * FROM bank where id='$_GET[id]'"));
        if (isset($_POST['update'])) {
        mysql_query("UPDATE bank SET nama_bank='$_POST[nama_bank]',no_rek='$_POST[no_rek]',saldo='$_POST[saldo]' WHERE id='$_POST[id]'");
       echo "<script> alert('data berhasil diupdate !');window.location='home.php?pg=bank&act=view'</script>";
      
        }
           
                ?>
  
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          <h1> Adjust Racikan</h1>
              <ol class="breadcrumb">l
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
            <div>
           
             
                     <div class="form-group">
                        <label for="exampleInputEmail1">nama_bank</label>
                        <input  type="text" class="form-control" id="nama_bank" name="nama_bank" value= "<?php echo $d['nama_bank'];?>" >
             
            </div>
            
             <div class="form-group">
                        <label for="exampleInputEmail1">No Rekening</label>
                        <input type="text" class="form-control" id="no_rek" name="no_rek" value= "<?php echo $d['no_rek'];?>" >
               <input type="hidden" class="form-control" id="id" name="id" value= "<?php echo $d['id'];?>" >
             
                      </div>
            
                      <div class="form-group">Saldo
                        <input readonly class="form-control" id="saldo" name="saldo"  required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['saldo'];?>" >
                      </div>	
            
             
            
            <!-- /.box --><!-- /.col --><!-- /.row -->
  
            
              <!-- Tombol Bagian Bawah -->
  
              <div class="row">
              <!-- left column -->
                <div class="col-md-4 col-md-offset-5">
  
                <button type="submit" name = 'update' class="btn btn-info" onclick="return confirm('Apakah anda yakin dengan perubahan data?');">Simpan</button>
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
      mysql_query("DELETE FROM premix WHERE no='$_GET[no]'");
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