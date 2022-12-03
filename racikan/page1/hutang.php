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
        <h1> Data Hutang</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Kas keluar</a></li>
             </ol>
			
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
      
		
		<?php
			 $d = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='1'"));
			?>
			
			<h2 align="left">Saldo Bank BCA <?php echo "Rp. ". number_format("$d[saldo]",'0','.','.')?></h2>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                          <th>Tanggal Kirim Produk</th>
						  <th>No Inv</th>
						  <th>Jumlah Hutang</th>
						  <th>Jatuh Tempo</th>
											  <th>Nama Customer</th>
                        <th>Pembayaran Hutang</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					
					include("indo.php");
                     $tampil=mysql_query("SELECT *,DATE_ADD(tglmasuk,interval jatuh_tempo DAY) as jatuh_tempo FROM hutang group by id");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
                        <td style="text-align: center"><?php echo TanggalIndo($r['tglmasuk'])?></td>
						 <td style="text-align: center"><?php echo "$r[no_inv]"?></td>
						 <td style="text-align: center"><?php echo "Rp. ". number_format("$r[sisa_hutang]",'0','.','.')?></td>
						 <td style="text-align: center"><?php echo TanggalIndo($r['jatuh_tempo'])?></td>
				
						 <td style="text-align: center"><?php echo "$r[nama_vendor]"?></td>
                         <td style="text-align: center"><a href="?pg=hutang&act=add1&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td style="text-align: center"><a href=""><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>

                    <?php
                    $no++;
                    }
                    ?>
				    </tbody>
                     <tr>
                                      <td align = "left" bordercolor="#F81115" colspan="3" col><span style="font-weight:bold">TOTAL HUTANG</span></td>
										
										<?php
			
                               $liatHarga=mysql_fetch_array(mysql_query("SELECT sum(sisa_hutang) as total_hutang FROM hutang where id")); ?>
						
						
                                  <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold">Rp. <?php echo "". number_format("$liatHarga[total_hutang]",'0','.','.')?> </span></td>
                             
								
                                </tr>
						 
                                  
                                </table>
                                  <span style="font-weight:bold"></span></td>
                              </tr>
                       
                          </table>                            <span style="font-weight:bold"></span></td>
                        </tr>
                  
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
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Kas keluar</a></li>
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
      case 'add1':
      $d = mysql_fetch_array(mysql_query("SELECT * FROM hutang WHERE id='$_GET[id]'"));
            if (isset($_POST['add1'])) {

                $query = mysql_query("INSERT INTO pembayaran_hutang VALUES ('','$_POST[no_byr]','$_POST[tglmasuk]','$_POST[tgl_byr]','$_POST[nama_vendor]','$_POST[sisa_hutang]','$_POST[sisa1_hutang]','$_POST[no_inv]','$_POST[jatuh_tempo]','$_POST[no_rek]','$_POST[nama_bank]','$_POST[saldo]','$_POST[nominal]')");
				
                echo "<script>window.location='home.php?pg=hutang&act=view'</script>";
          }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Kas keluar </h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Kas keluar</a></li>
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
					  
					  
					    <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from pembayaran_hutang");
                      
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
                      $tahun = date('m/Y');
                      $kode_jadi = "PAYMENT/HUTANG/$tahun/$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Plan Produksi</label>
                      <input type="text" class="form-control" id="no_byr" name="no_byr" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_byr" name="no_byr" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
						  <input type="hidden" class="form-control" id="id" name="id"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pembayaran Hutang</label>
                      <input class="form-control" id="date" name="tgl_byr"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong"/>
                    </div>
					  
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Detail Hutang</label>
					<?php
					include("indo.php");
					?>
                      <input readonly class="form-control" id="tglmasuk" name="tglmasuk" placeholder="Nama Kas keluar" value= "<?php echo TanggalIndo($d['tglmasuk'])?>">
						
						 <div class="form-group">
                      <label for="exampleInputEmail1">No Invoice</label>
                      <input readonly class="form-control" id="no_inv" name="no_inv" placeholder="Nama Kas keluar" value= "<?php echo $d['no_inv'];?>">
						
						 <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Hutang</label>
<input readonly class="form-control" id="sisa_hutang" name="sisa_hutang" placeholder="Nama Kas keluar" value= "<?php echo $d['sisa_hutang'];?>" onChange="sum();"> 
					 
					<div class="form-group">
                      <label for="exampleInputEmail1">Jatuh Tempo</label>
					 <input readonly class="form-control" id="jatuh_tempo" name="jatuh_tempo" placeholder="Nama Kas keluar" value= "<?php echo $d['jatuh_tempo'];?>">
						
						
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Vendor</label>	 
					 <input readonly class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Nama Kas keluar"  value= "<?php echo $d['nama_vendor'];?>">
						
					<div class="form-group">
                      <label for="exampleInputEmail1">Sisa Hutang</label>	 
					 <input readonly class="form-control" id="sisa1_hutang" name="sisa1_hutang" value="sisa hutang akan muncul otomatis" onChange="sum();">
                    </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Rekening</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="no_rek" id="no_rek" onchange="changeValue(this.value)" >
					<option value=''>-Pilih No Rekening-</option>
					<?php 
					$result = mysql_query("select * from bank order by id ");    
					$jsArray = "var bc= new Array();
					";        
					while ($row = mysql_fetch_array($result)) {    
					echo '
					<option value="' . $row['no_rek'] . '">' . $row['no_rek'] . '</option>';    
					$jsArray .= "bc['" . $row['no_rek'] . "'] = {
					nama_bank:'".addslashes($row['nama_bank'])."',
					
					saldo:'" . addslashes($row['saldo']). "'
					};
					";    
					}      
					?>    
					  </optgroup>
                      </select>
					   <input readonly class="form-control" id="nama_bank" name="nama_bank"> 
					   <input readonly class="form-control" id="saldo" name="saldo" onChange="sum();">
					   <input type="number" class="form-control" id="nominal"  name="nominal" placeholder="masukan jumlah nilai yang ingin di trasnfer" onChange="sum();"> 
					</div>
		           
					
					  </div>
				
					
				   
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add1' class="btn btn-primary">Tambah</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>
                  
            </form>
				
					<script>
				<?php 
	echo 
		$jsArray; 
	?>  
	function changeValue(no_plan){ 
		
		
		document.getElementById('nama_bank').value = bc[no_plan].nama_bank;
		document.getElementById('saldo').value = bc[no_plan].saldo; 
		
		
			};  
						
						function sum() {
							var txt1 = document.getElementById('sisa_hutang').value;
							var txt2 = document.getElementById('nominal').value;
							var txt3 = document.getElementById('sisa1_hutang').value;
							
						   var result1 =parseInt(txt1) - parseInt(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa1_hutang').value = result1;
							}

							}
		
				  </script>
				
				
			
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
      mysql_query("DELETE FROM  WHERE kd_transaksi='$_GET[id]'");
      echo "<script>window.location='home.php?pg=transaksi&act=view'</script>";
      break;

    }
    ?>