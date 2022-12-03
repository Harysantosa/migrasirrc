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
     
        <h1>Data Piutang</h1>
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
       <a href="cetak_laporanpiutang.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Data Laporan Produksi</i></button> 
		</a>
		
		<?php
			 $d = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='2'"));
			?>
			
			<h2 align="left">Saldo Bank BCA <?php echo "Rp. ". number_format("$d[saldo]",'0','.','.')?></h2>
		
		<?php
			 $d = mysql_fetch_array(mysql_query("SELECT saldo FROM bank WHERE id='3'"));
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
                        <th style="text-align: center">No</th>
                          <th style="text-align: center">Tanggal Kirim Produk</th>
						  <th style="text-align: center">Nama Customer</th>
						  <th style="text-align: center">Jumlah Piutang</th>
						  <th style="text-align: center">No Inv</th>
						  <th style="text-align: center">Tgl Jatuh Tempo</th>
						  
                        <th style="text-align: center">Pembayaran Customer</th>
                        <th style="text-align: center">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
				    include("indo.php");
                    $tampil=mysql_query("SELECT *,DATE_ADD(tgl,interval tempo DAY) as jatuh_tempo FROM piutang group by id");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td style="text-align: center"><?php echo "$no"?></td>
                        <td style="text-align: center"><?php echo TanggalIndo($r['tgl'])?></td>
						 <td style="text-align: center"><?php echo "$r[nm_cust]"?></td>
						 <td style="text-align: center"><?php echo "Rp. ". number_format("$r[piutang]",'0','.','.')?></td>
						 <td style="text-align: center"><?php echo "$r[no_inv]"?></td>
						 <td style="text-align: center"><?php echo TanggalIndo($r['jatuh_tempo'])?></td>
						 
                         <td style="text-align: center"><a href="?pg=piutang&act=add1&id=<?php echo $r['id']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td style="text-align: center"><a href="?pg=piutang&act=delete&id=<?php echo $r['id']?>"><button type="button" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>

                    <?php
                    $no++;
                    }
                    ?>
				    </tbody>
                     <tr>
                                      <td align = "left" bordercolor="#F81115" colspan="3" col><span style="font-weight:bold">TOTAL PIUTANG</span></td>
										
										<?php
			
                               $liatHarga=mysql_fetch_array(mysql_query("SELECT sum(piutang) as total_piutang FROM piutang where id")); ?>
						
						
                                  <td bgcolor="#1E9BEB" align = "center"><span style="font-weight:bold">Rp. <?php echo "". number_format("$liatHarga[total_piutang]",'0','.','.')?> </span></td>
                             
								
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM piutang WHERE id='$_GET[id]'"));
            if (isset($_POST['add1'])) {

                $query = mysql_query("INSERT INTO pembayaran_piutang VALUES ('','$_POST[no_byr]','$_POST[tgl_byr]','$_POST[tgl]','$_POST[nm_cust]','$_POST[piutang]','$_POST[sisa_piutang]','$_POST[no_inv]','$_POST[tempo]','$_POST[no_rek]','$_POST[nama_bank]','$_POST[nominal]','$_POST[saldo]','$_POST[metode_pembayaran]')");
				
				
				
                echo "<script>window.location='home.php?pg=rekappiutang&act=view'</script>";
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
                      $sql = mysql_query("select * from pembayaran_piutang");
                      
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
                      $kode_jadi = "PAYMENT/PIUTANG/$tahun/$bikin_kode";

                      ?>
					  <div class="form-group">				  
                   <label for="exampleInputEmail1">Nomor Plan Produksi</label>
                      <input type="text" class="form-control" id="no_byr" name="no_byr" placeholder="Nomor planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_byr" name="no_byr" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
					  
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Penerimaan Piutang</label>
                      <input class="form-control" id="date" name="tgl_byr"  placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong"/>
                    </div>
					  
					 <div class="form-group">
                      <label for="exampleInputEmail1">Detail Piutang</label>
					<?php
					include("indo.php");
					?>
						<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Kirim</label>
                      <input readonly class="form-control" id="tgl" name="tgl" placeholder="Nama Kas keluar" value= "<?php echo TanggalIndo($d['tgl'])?>">
						 </div>
						<div class="form-group">
                      <label for="exampleInputEmail1">NAma Customer</label> 
					  <input readonly class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Kas keluar" value= "<?php echo $d['nm_cust'];?>">
						</div> 
						 
						 
						<div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Piutang</label> 
					  <input readonly class="form-control" id="piutang" name="piutang" placeholder="Nama Kas keluar" value= "<?php echo $d['piutang'];?>" onChange="sum();">
					  </div>
						 
						<div class="form-group">
                      <label for="exampleInputEmail1">NO Inv</label> 
					
					 <input readonly class="form-control" id="no_inv" name="no_inv" placeholder="Nama Kas keluar" value= "<?php echo $d['no_inv'];?>">
						 </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Tempo</label> 
					 <input readonly class="form-control" id="tempo" name="tempo" placeholder="Nama Kas keluar" value= "<?php echo TanggalIndo($d['tempo'])?>">
						 </div>
					   <input readonly class="form-control" id="sisa_piutang" name="sisa_piutang" placeholder="sisa piutang"  onChange="sum();" value="Jumlah sisa hutang akan mucul otomatis">
                    </div>
					
					  <div class="form-group">
                      <label for="exampleInputEmail1">Momor Rekening</label> <br>
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
					   <input readonly class="form-control" id="saldo" name="saldo">
					   <input type="number" class="form-control" id="nominal"  name="nominal" placeholder="masukan jumlah nilai yang masuk kerekening"  onChange="sum();">
					</div>
		           				          
                     <div class="form-group">
                      <select class="form-control select2" id="metode_pembayaran" name="metode_pembayaran" style="width: 100%;" onKeyUp="sum" required data-fv-notempty-message="Tidak boleh kosong" >
                      <option value="">Pilih Metode Pembayaran</option>
						<option value="cash"> cash</option>
						<option value="transfer">Transfer</option>
						<option value="cek dan giro">Cek Dan Giro</option>
						
						
					  </select>
						 </optgroup>
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
							var txt1 = document.getElementById('piutang').value;
							var txt2 = document.getElementById('nominal').value;
							var txt3 = document.getElementById('sisa_piutang').value;
							
						   var result1 =parseInt(txt1) - parseInt(txt2);
      						if (!isNaN(result1)) {
         					document.getElementById('sisa_piutang').value = result1;
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
      mysql_query("DELETE FROM tbltransaksi WHERE kd_transaksi='$_GET[id]'");
      echo "<script>window.location='home.php?pg=transaksi&act=view'</script>";
      break;

    }
    ?>