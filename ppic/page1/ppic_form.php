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
        <h1> Data Formula PPIC</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Formula PPIC</ol>
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
                  <table width="316" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%">
                    <thead>
                      <tr>
                        <th width="22">No</th>
                        <th width="64">ID PPIC Form</th>
                        <th width="94">Nama Produk</th>
						<th width="51">Edit</th>
						<th width="51">Hapus</th>
						<th width="51">Cetak</th>
					  </tr>
                    </thead>
					
                    <tbody>
                    <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM ppic_form GROUP by id asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
						<td><?php echo "$r[ppic_id]"?></td>
						<td><?php echo  "$r[nm_fg]"?></td>
							
                      
						<td><a href="?pg=ppicform&act=edit&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-circle-o"></i></button></a></td>
							
						<td><a href="?pg=ppicform&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-trash-o"></i></button></a></td>
							
						<td><a href="cetakppic2.php?id=<?php echo $r['id']?>"> <button type="button" class="btn bg-blue">
						<i class="fa fa-print" target=_blank></i></button></a></td>
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
                $query = mysql_query("INSERT INTO ppic_form VALUES ('','$_POST[ppic_id]','$_POST[nm_fg]','$_POST[r1]','$_POST[rm1]','$_POST[r1a]','$_POST[rm1a]','$_POST[r2]','$_POST[rm2]','$_POST[r3]','$_POST[rm3]','$_POST[r4]','$_POST[rm4]','$_POST[r5]','$_POST[rm5]','$_POST[r6]','$_POST[rm6]','$_POST[r7]','$_POST[rm7]','$_POST[r8]','$_POST[rm8]','$_POST[r9]','$_POST[rm9]','$_POST[r10]','$_POST[rm10]','$_POST[r11]','$_POST[rm11]','$_POST[r12]','$_POST[rm12]','$_POST[r13]','$_POST[rm13]')");
		              	  
		        echo "<script>window.location='home.php?pg=ppicform&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Formula PPIC</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Index Data Formula PPIC</a></li>
            <li class="active">Tambah Data Formula PPIC</li>
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
                <form  role="form" method = "POST" action="">
                  <div class="box-body">
					  
					   <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from ppic_form");
                      
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
                      $kode_jadi = "PPIC/FORM/$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Plan Produksi</label>
                      <input type="text" class="form-control" id="ppic_id" name="ppic_id" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled> 
                         <input type="hidden" class="form-control" id="ppic_id" name="ppic_id" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
						
					
					
					   <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Produk</label> <br>
                      <select class="form-control select2" name="nm_fg" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">--SIlahkan Pilih--</option>
					  <option value="Sapu Jagat Mix">Sapu Jagat Mix</option>
					  <option value="Sapu Jagat White">sapu jagat white</option>
						<option value="Eco Royal Mix">Eco Royal Mix</option>
						<option value="Eco Royal White">Eco Royal White</option>
						<option value="Royal Mix">Royal Mix</option>
						<option value="Royal White">Royal White</option>
						<option value="Eco Raja Orange">Eco Raja Orange</option>
						<option value="Raja Mix">Raj Mix</option>
						<option value="Raja Orange"> Raja Orange</option>
						<option value="RYL BC 07">Royal BreadChrumb 07</option>
						<option value="RJ BC 01">Raja Breadchrumb 01</option>
						  
					  </select>
				    </div>
					 					  
																		
					<div class="form-group">
					 <label for="exampleInputEmail1">Pilih Tepung</label> <br>
                      <select class="form-control select2" name="r1" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">--SIlahkan Pilih--</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						<option value="terigu tambang">terigu tambang</option>					  
						</select>
					<input type="text" class="form-control" id="rm1" name="rm1" >
					  </div>
					  
                      <div class="form-group">
					 <label for="exampleInputEmail1">Pilih Tepung</label> <br>
                      <select class="form-control select2" name="r1a" style="width: 100%;" onKeyUp="sum" >
                      <option value="">--SIlahkan Pilih--</option>
						<option value="terigu dragonfly">terigu dragonfly</option>
						<option value="terigu f06">terigu f06</option>
						<option value="terigu f02">terigu f02</option>
						<option value="terigu hikari">terigu hikari</option>
						<option value="terigu white bear">terigu white bear</option>
						<option value="terigu gelang berlian">terigu gelang berlian</option>
						  <option value="terigu tambang">terigu tambang</option>					  
						</select>
					<input type="text" class="form-control" id="rm1a" name="rm1a" >
					  </div>
					
															
					<div class="form-group">
                      <input readonly class="form-control" id="r2" name="r2" value="gula pasir" >
						<input type="text" class="form-control" id="rm2" name="rm2" >
                    </div>
					
					  <div class="form-group">
					 <input readonly class="form-control" id="r3" name="r3" value="calcium" >
                    <input type="text" class="form-control" id="rm3" name="rm3" >
                    </div>
					  
					  <div class="form-group">
					   <input readonly class="form-control" id="r4" name="r4" value="instant plus" >
                      <input type="text" class="form-control" id="rm4" name="rm4" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r5" name="r5" value="ragi" >
                        <input type="text" class="form-control" id="rm5" name="rm5" >
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6" value="softening" >
                       <input type="text" class="form-control" id="rm6" name="rm6" >
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r7" name="r7" value="titanium" >
                     <input type="text" class="form-control" id="rm7" name="rm7" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8" value="sunset yellow" >
						  <input type="text" class="form-control" id="rm8" name="rm8" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r9" name="r9" value="margarine" >
                     <input type="text" class="form-control" id="rm9" name="rm9" >
                    </div>
					 					 				  
				  <div class="form-group">
					  <input readonly class="form-control" id="r10" name="r10" value="premix01" >
                    <input type="text" class="form-control" id="rm10" name="rm10" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11" value="premix02" >
                      <input type="text" class="form-control" id="rm11" name="rm11" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r12" name="r12" value="premix03" >
                      <input type="text" class="form-control" id="rm12" name="rm12" >
                    </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r13" name="r13" value="premix04" >
                     <input type="text" class="form-control" id="rm13" name="rm13" >
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM ppic_form WHERE id='$_GET[id]'"));
            if (isset($_POST['update'])) {
				
			 mysql_query("UPDATE ppic_form SET ppic_id='$_POST[ppic_id]', nm_fg='$_POST[nm_fg]',vendor1='$_POST[vendor1]', r1='$_POST[r1]', kode1='$_POST[kode1]', rm1='$_POST[rm1]',vendor2='$_POST[vendor2]',r2='$_POST[r2]', kode2='$_POST[kode2]', rm2='$_POST[rm2]', r3='$_POST[r3]',kode3='$_POST[kode3]', rm3='$_POST[rm3]', r4='$_POST[r4]',kode4='$_POST[kode4]', rm4='$_POST[rm4]', r5='$_POST[r5]',kode5='$_POST[kode5]', rm5='$_POST[rm5]', r6='$_POST[r6]',kode6='$_POST[kode6]', rm6='$_POST[rm6]', r7='$_POST[r7]',kode7='$_POST[kode7]', rm7='$_POST[rm7]', r8='$_POST[r8]',kode8='$_POST[kode8]', rm8='$_POST[rm8]', r9='$_POST[r9]',kode9='$_POST[kode9]', rm9='$_POST[rm9]', r10='$_POST[r10]',kode10='$_POST[kode10]', rm10='$_POST[rm10]', r11='$_POST[r11]',kode11='$_POST[kode11]', rm11='$_POST[rm11]', r12='$_POST[r12]',kode12='$_POST[kode12]', rm12='$_POST[rm12]', r13='$_POST[r13]',kode13='$_POST[kode13]', rm13='$_POST[rm13]',r14='$_POST[r14]',kode14='$_POST[kode14]', rm14='$_POST[rm14]',r15='$_POST[r15]',kode15='$_POST[kode15]', rm15='$_POST[rm15]',r16='$_POST[r16]', rm16='$_POST[rm16]',r17='$_POST[r17]', rm17='$_POST[rm17]',r18='$_POST[r18]', rm18='$_POST[rm18]' WHERE id='$_POST[id]'");
			 echo "<script>window.location='home.php?pg=ppicform&act=view'</script>";
          }
              ?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Edit Data Formula PPIC</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Index Data Formula PPIC</a></li>
            <li class="active">Edit Data Formula PPIC</li>
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
                <form  role="form" method = "POST" action="">
                  <div class="box-body">
                        <label for="exampleInputEmail1">No Plan Prod</label>
                        <input readonly class="form-control" id="ppic_id" name="ppic_id" value= "<?php echo $d['ppic_id'];?>">
                      </p>
                      <p>
                        <input type="hidden" class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>">
                        <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label>
                     <input type="text" class="form-control" id="nm_fg" name="nm_fg" value= "<?php echo $d['nm_fg'];?>">
                    </div>
					 	
                   
                    <div class="form-group">
                    
					 <label for="exampleInputEmail1">Data Tepung Ke-1</label>
                      <input readonly class="form-control" id="r1" name="r1" value= "<?php echo $d['r1'];?>" >
					<input readonly class="form-control" id="kode1" name="kode1" value= "<?php echo $d['kode1'];?>" >
					  <input type="text" class="form-control" id="rm1" name="rm1" value= "<?php echo $d['rm1'];?>" >
                    </div>
					
					
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Data Tepung Ke-2</label> 
					 <input readonly class="form-control" id="r2" name="r2" value= "<?php echo $d['r2'];?>" >
					<input readonly class="form-control" id="kode2" name="kode2" value= "<?php echo $d['kode2'];?>" >
					  <input type="text" class="form-control" id="rm2" name="rm2" value= "<?php echo $d['rm2'];?>" >
                    </div>
					  
                    <div class="form-group">
                     
					 <input readonly class="form-control" id="r3" name="r3" value= "<?php echo $d['r3'];?>" > 
						  <input readonly class="form-control" id="kode3" name="kode3" value= "<?php echo $d['kode3'];?>" >
                      <input type="text" class="form-control" id="rm3" name="rm3" value= "<?php echo $d['rm3'];?>">
                    </div>
					 
					  <div class="form-group">
                    <input readonly class="form-control" id="r4" name="r4"  value= "<?php echo $d['r4'];?>" >
						  <input readonly class="form-control" id="kode4" name="kode4" value= "<?php echo $d['kode4'];?>" >  
                      <input type="text" class="form-control" id="rm4" name="rm4" value= "<?php echo $d['rm4'];?>">
                    </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r5" name="r5"  value= "<?php echo $d['r5'];?>" >
						  <input readonly class="form-control" id="kode5" name="kode5" value= "<?php echo $d['kode5'];?>" >
                        <input type="text" class="form-control" id="rm5" name="rm5" value= "<?php echo $d['rm5'];?>" >
					  </div>
					  
					  <div class="form-group">
						 <input readonly class="form-control" id="r6" name="r6"  value= "<?php echo $d['r6'];?>" >
						  <input readonly class="form-control" id="kode6" name="kode6" value= "<?php echo $d['kode6'];?>" >
                      <input type="text" class="form-control" id="rm6" name="rm6"  value= "<?php echo $d['rm6'];?>" >
					  </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r7" name="r7"  value= "<?php echo $d['r7'];?>" >
						  <input readonly class="form-control" id="kode7" name="kode7" value= "<?php echo $d['kode7'];?>" >
						   <input type="text" class="form-control" id="rm7" name="rm7"  value= "<?php echo $d['rm7'];?>" >
					  </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r8" name="r8" value= "<?php echo $d['r8'];?>" >
						  <input readonly class="form-control" id="kode8" name="kode8" value= "<?php echo $d['kode8'];?>" >
                      <input type="text" class="form-control" id="rm8" name="rm8" value= "<?php echo $d['rm8'];?>" >
					  </div>
					  
				  <div class="form-group">
					  <input readonly class="form-control" id="r9" name="r9"  value= "<?php echo $d['r9'];?>" >
					  <input readonly class="form-control" id="kode9" name="kode9" value= "<?php echo $d['kode9'];?>" >
                    <input type="text"class="form-control" id="rm9" name="rm9" value= "<?php echo $d['rm9'];?>" >
                    </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r10" name="r10"   value= "<?php echo $d['r10'];?>" >
						  <input readonly class="form-control" id="kode10" name="kode10" value= "<?php echo $d['kode10'];?>" >
                      <input type="text" class="form-control" id="rm10" name="rm10" value= "<?php echo $d['rm10'];?>" >
					  </div>
					  
					  <div class="form-group">
						  <input readonly class="form-control" id="r11" name="r11"  value= "<?php echo $d['r11'];?>" >
						  <input readonly class="form-control" id="kode11" name="kode11" value= "<?php echo $d['kode11'];?>" >
                       <input type="text" class="form-control" id="rm11" name="rm11"  value= "<?php echo $d['rm11'];?>" >
					  </div>
					  
					  <div class="form-group">
					 <input readonly class="form-control" id="r12" name="r12"  value= "<?php echo $d['r12'];?>" >
						  <input readonly class="form-control" id="kode12" name="kode12" value= "<?php echo $d['kode12'];?>" >
                      <input type="text" class="form-control" id="rm12" name="rm12"  value= "<?php echo $d['rm12'];?>" >
					  </div>
				  
					<div class="form-group">
						  <input readonly class="form-control" id="r13" name="r13" value= "<?php echo $d['r13'];?>" >
						<input readonly class="form-control" id="kode13" name="kode13" value= "<?php echo $d['kode13'];?>" >
                      <input type="text" class="form-control" id="rm13" name="rm13" value= "<?php echo $d['rm13'];?>" >
				  </div>
					 
					   <div class="form-group">
						  <input readonly class="form-control" id="r14" name="r14" value= "<?php echo $d['r14'];?>" >
						   <input readonly class="form-control" id="kode14" name="kode14" value= "<?php echo $d['kode14'];?>" >
                      <input type="text" class="form-control" id="rm14" name="rm14" value= "<?php echo $d['rm14'];?>" >
				  </div>
					 
					  
					   <div class="form-group">
						  <input readonly class="form-control" id="r15" name="r15" value= "<?php echo $d['r15'];?>" >
						   <input readonly class="form-control" id="kode15" name="kode15" value= "<?php echo $d['kode15'];?>" >
                       <input type="text" class="form-control" id="rm15" name="rm15" value= "<?php echo $d['rm15'];?>" >
				  </div>
						 
					<label for="exampleInputEmail1">Nama Label</label>
						  <div class="form-group">
						  <input readonly class="form-control" id="r16" name="r16" value= "<?php echo $d['r16'];?>">
                      <input type="text" class="form-control" id="rm16" name="rm16" value= "<?php echo $d['rm16'];?>">
				  </div>
					
					<label for="exampleInputEmail1">Plastik HD</label>
					<div class="form-group">  							  
					<input type="text" class="form-control" id="r17" name="r17" value= "<?php echo $d['r17'];?>">
						   <input type="text" class="form-control" id="rm17" name="rm17" value= "<?php echo $d['rm17'];?>">
				  </div>
						  
					<label for="exampleInputEmail1">Plastik PE</label>
						  <div class="form-group">
						<input type="text" class="form-control" id="r18" name="r18" value= "<?php echo $d['r18'];?>">
						<input type="text" class="form-control" id="rm18" name="rm18" value= "<?php echo $d['rm18'];?>">
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
      mysql_query("DELETE FROM ppic_form WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=ppicform&act=view'</script>";
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