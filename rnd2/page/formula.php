
<?php
error_reporting(0);
unset($_POST[no_prod]);
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
        <h1>Data Formula </h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">Data Formula   
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=formula&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
	   </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table width="771" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
                    <thead>
                      <tr>
                        <th width="66">No</th>
                        <th width="136">ID Formula</th>
						<th width="305">Nama Produk</th>
						<th width="50">Edit</th>
						  <th width="89">Hapus Data</th>
						 <th width="97">Cetak</th>
						  </tr>
                    </thead>
					
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM formula_new order by no asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						
				
				<td><?php echo "$r[no_form]"?></td>
						<td style="text-transform: uppercase"><?php echo "$r[nm_fg]"?></td>
							
						<td><a href="?pg=formula&act=edit&no=<?php echo $r['no']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
						 <td><a href="?pg=formula&act=delete&no=<?php echo $r['no']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Jika Anda Menghapusnya maka nama <?php echo "$r[nm_fg]"?>  di data stok Finish good akan terhapus juga. Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
							<td><a href="cetak_dataformula.php?no=<?php echo $r['no']?>"> <button type="button" class="btn bg-blue">
						<i class="fa fa-print" target=_blank></i></button></a></td>
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
     
	  if  (isset($_POST['add'])){
	 if  ($_POST['rm1']>= '0'&&$_POST['rm2']>= '0'){
                mysql_query ("INSERT INTO formula_new VALUES ('','$_POST[no_form]',(UPPER('$_POST[nm_fg]')),'$_POST[tgl]','$_POST[r1]','$_POST[rm1]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]','$_POST[r14]','$_POST[rm14]')");
		         echo "<script> alert('berhasil disimpan !');window.location='home.php?pg=formula&act=view'</script>";
             }else {
			   echo "<script type='text/javascript'>  alert('Gagal, Stok Kurang !');</script>";
			   }
			   
			   }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Formula</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Formula</a></li>
            <li class="active">Tambah Data Formula</li>
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
					
					<div>	
					 <?php
			
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from formula_new");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 3, "0", STR_PAD_LEFT);
                      $tahun = date('Y/m');
                      $kode_jadi = "RND-$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">Kode RND</label>
                      <input type="text" class="form-control" id="no_form" name="no_form" placeholder="Nomor Penjualan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                    </div>
					 <input type="hidden" class="form-control" id="no_form" name="no_form" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                  </div>
					
					
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk </label>
                      <input "text" class="form-control" id="nm_fg" name="nm_fg" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Dibuat </label>
                    <input readonly class="form-control" id="tgl" name="tgl" value=" <?php $tgl=date('l, d-m-Y');
echo $tgl;?> ">
                  </div>
					
					                   
                      <div class="form-group">
						 
                        <div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="PRX 02A" >
					  <input "text" class="form-control" id="rm1" name="rm1" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					
                    
                     	 <div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02B" >
					  <input "text" class="form-control" id="rm2" name="rm2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					 
					 <div class="form-group">
                      <input readonly class="form-control" id="r3" name="r3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02C" >
					  <input "text" class="form-control" id="rm3" name="rm3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					 <div class="form-group">
                      <input readonly class="form-control" id="r4" name="r4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02D" >
					  <input "text" class="form-control" id="rm4" name="rm4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r5" name="r5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02E" >
					  <input "text" class="form-control" id="rm5" name="rm5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r6" name="r6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 01" >
					  <input "text" class="form-control" id="rm6" name="rm6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r7" name="r7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02" >
					  <input "text" class="form-control" id="rm7" name="rm7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r8" name="r8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 03" >
					  <input "text" class="form-control" id="rm8" name="rm8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r9" name="r9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 04" >
					  <input "text" class="form-control" id="rm9" name="rm9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					   <div class="form-group">
                      <input readonly class="form-control" id="r10" name="r10" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 05" >
					  <input "text" class="form-control" id="rm10" name="rm10" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					    <div class="form-group">
                      <input readonly class="form-control" id="r11" name="r11" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 06" >
					  <input "text" class="form-control" id="rm11" name="rm11" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					     <div class="form-group">
                      <input readonly class="form-control" id="r12" name="r12" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="RAGI" >
					  <input "text" class="form-control" id="rm12" name="rm12" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
				  
					     <div class="form-group">
                      <input readonly class="form-control" id="r13" name="r13" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="SHORTENING" >
					  <input "text" class="form-control" id="rm13" name="rm13" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
					   <div class="form-group">
                      <input readonly class="form-control" id="r14" name="r14" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="MARGARINE" >
					  <input "text" class="form-control" id="rm14" name="rm14" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" >
                  </div>
					  
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form><!-- /.box-body --><!-- /.box --><!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;
      // PROSES EDIT DATA PRODUK //
      case 'edit':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM formula_new where no='$_GET[no]'"));
            if (isset($_POST['update'])) {	
				
                mysql_query("UPDATE formula_new SET no_form='$_POST[no_form]',nm_fg='$_POST[nm_fg]',tgl='$_POST[tgl]',r1='$_POST[r1]',rm1='$_POST[rm1]',r2='$_POST[r2]',rm2='$_POST[rm2]',r3='$_POST[r3]',rm3='$_POST[rm3]',r4='$_POST[r4]',rm4='$_POST[rm4]',r5='$_POST[r5]',rm5='$_POST[rm5]',r6='$_POST[r6]',rm6='$_POST[rm6]',r7='$_POST[r7]',rm7='$_POST[rm7]',r8='$_POST[r8]',rm8='$_POST[rm8]',r9='$_POST[r9]',rm9='$_POST[rm9]',r10='$_POST[r10]',rm10='$_POST[rm10]',r11='$_POST[r11]',rm11='$_POST[rm11]',r12='$_POST[r12]',rm12='$_POST[rm12]',r13='$_POST[r13]',rm13='$_POST[rm13]',rm14='$_POST[rm14]' WHERE no='$_POST[no]'");
                echo "<script>window.location='home.php?pg=formula&act=view'</script>";
				
				 mysql_query("UPDATE stok_fg SET no_form='$_POST[no_form]',nm_fg='$_POST[nm_fg]' WHERE no='$_POST[no]'");
                echo "<script>window.location='home.php?pg=formula&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Formuala</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Produk</a></li>
            <li class="active">Update Data Produk</li>
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
                      <label for="exampleInputEmail1">Nomor Formula</label>
                      <input readonly class="form-control" id="no_form" name="no_form" placeholder="Nomor Invoice" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_form'];?>">
                    </div>
					  <div class="form-group">
					 <input type="hidden" class="form-control" id="no" name="no" placeholder="Nomor Planing" value="<?php echo $d['no'];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    	</div				 
						
					    ><div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk </label>
                      <input "text" class="form-control" id="nm_fg" name="nm_fg"  value="<?php echo $d['nm_fg'];?>" >
					   <input "text" class="form-control" id="jmlt1" name="jmlt1"  >
                    </div>
					  
					  
					    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal </label>
                      <input "text" class="form-control" id="tgl" name="tgl"  style="text-transform:uppercase" value=" <?php $tgl=date('l, d-m-Y');
echo $tgl;?> ">
                    </div>
					  
			 <div class="form-group">
                      <input readonly class="form-control" id="r1" name="r1" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="PRX 02A" >
					  <input "text" class="form-control" id="rm1" name="rm1" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm1'];?>" >
                  </div>
					  
					<div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02B" >
					  <input "text" class="form-control" id="rm2" name="rm2" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm2'];?>" >
                  </div>
				  
					 
					 <div class="form-group">
                      <input readonly class="form-control" id="r3" name="r3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02C" >
					  <input "text" class="form-control" id="rm3" name="rm3" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm3'];?>" >
                  </div>
				  
					 <div class="form-group">
                      <input readonly class="form-control" id="r4" name="r4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02D" >
					  <input "text" class="form-control" id="rm4" name="rm4" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm4'];?>" >
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r5" name="r5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02E" >
					  <input "text" class="form-control" id="rm5" name="rm5" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm5'];?>" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r6" name="r6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 01" >
					  <input "text" class="form-control" id="rm6" name="rm6" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm6'];?>" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r7" name="r7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 02" >
					  <input "text" class="form-control" id="rm7" name="rm7" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm7'];?>" >
                  </div>
					  
					  <div class="form-group">
                      <input readonly class="form-control" id="r8" name="r8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 03" >
					  <input "text" class="form-control" id="rm8" name="rm8" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm8'];?>" >
                  </div>
					  
					 <div class="form-group">
                      <input readonly class="form-control" id="r9" name="r9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 04" >
					  <input "text" class="form-control" id="rm9" name="rm9" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm9'];?>" >
                  </div>
					  
					   <div class="form-group">
                      <input readonly class="form-control" id="r10" name="r10" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 05" >
					  <input "text" class="form-control" id="rm10" name="rm10" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm10'];?>" >
                  </div>
					  
					    <div class="form-group">
                      <input readonly class="form-control" id="r11" name="r11" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="PRX 06" >
					  <input "text" class="form-control" id="rm11" name="rm11" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm11'];?>" >
                  </div>
					  
					     <div class="form-group">
                      <input readonly class="form-control" id="r12" name="r12" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="RAGI" >
					  <input "text" class="form-control" id="rm12" name="rm12" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm12'];?>" >
                  </div>
				  
					     <div class="form-group">
                      <input readonly class="form-control" id="r13" name="r13" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="SHORTENING" >
					  <input "text" class="form-control" id="rm13" name="rm13" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm13'];?>" >
                  </div>
					  
					   <div class="form-group">
                      <input readonly class="form-control" id="r14" name="r14" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" 
					  value="MARGARINE" >
					  <input "text" class="form-control" id="rm14" name="rm14" style="text-transform:uppercase" required data-fv-notempty-message="Tidak boleh kosong" value="<?php echo $d['rm14'];?>" >
                  </div>
					  
					  
					   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Update</button>
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
      mysql_query("DELETE FROM formula WHERE no='$_GET[no]'");
	  mysql_query("DELETE FROM stok_fg WHERE no='$_GET[no]'");
      echo "<script>window.location='home.php?pg=formula&act=view'</script>";
      break;
			
        }
    ?>



  <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#merek").chained("#rm");
         
        </script>

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