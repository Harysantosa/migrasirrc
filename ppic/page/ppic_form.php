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
        <h1>Data PPIC </h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pggna&act=view">PPIC Produks  
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="cetak_laporanpremix.php" target="_blank"> <button type="button" class="btn btn-info" ><i class="fa fa-print" target=_blank>Print Data Laporan Produksi Premix</i></button> 
		</a>
		</a>
	   </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  
            <table width="78%" height="73" class="table table-bordered table-striped" id="example1" style="width: 100%;">
<thead>
                                    <tr>
                                      
                  <th width="29">No</th>
                       				  
                  <th width="180">Nama Premix</th>
						              
                  <th width="647">Input Planing PPIC</th>
						            
									  
									
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
					include("indo.php");
                    $tampil=mysql_query("SELECT * FROM formula_new order by no");
					   $no++;
			        while ($r=mysql_fetch_array($tampil))
					{
					
					
                   
			       
                    ?>
                                    <tr align="left">
                                      <td><?php echo "$no"?></td>
									<td><?php echo "$r[nm_fg]"?></td>
									  <td><a href="?pg=ppicform&act=add&no=<?php echo $r['no']?>" target="_blank" ><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"> INPUT PLANING PPIC</i></button></a></td>
                        
                                    </tr>
                                    <?php
                         $no++;
					}
				
						?>
						
						
                                    
						
                                  </tbody>
                                </table>
                                  <span style="font-weight:bold"></span></td>
                              </tr>
                            </tbody>
                          </table>                            <span style="font-weight:bold"></span></td>
                        </tr>
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
	$d = mysql_fetch_array(mysql_query("SELECT * FROM formula_new WHERE no='$_GET[no]'"));
	
      if (isset($_POST['add'])) {		  
                $query = mysql_query("INSERT INTO ppic_plan VALUES ('','$_POST[ppic_id]','$_POST[no_form]',
				'$_POST[plan_prod]','$_POST[nm_fg]','$_POST[tgl]','$_POST[shift]','$_POST[leader]','$_POST[lot]',
				'$_POST[jumlah]','$_POST[screen]','$_POST[nm_cust]','$_POST[terigua]','$_POST[jmlt1]',
				'$_POST[terigub]','$_POST[jmlt2]','$_POST[r1]','$_POST[jml1]','$_POST[r2]','$_POST[jml2]',
				'$_POST[r3]','$_POST[jml3]','$_POST[r4]','$_POST[jml4]','$_POST[r5]','$_POST[jml5]','$_POST[r6]',
				'$_POST[jml6]','$_POST[r7]','$_POST[jml7]','$_POST[r8]','$_POST[jml8]','$_POST[r9]','$_POST[jml9]',
				'$_POST[r10]','$_POST[jml10]','$_POST[r11]','$_POST[jml11]','$_POST[r12]','$_POST[jml12]','$_POST[r13]',
				'$_POST[jml13]','$_POST[r14]','$_POST[jml14]','$_POST[r15]','$_POST[jml15]','$_POST[r16]',
				'$_POST[jml16]','$_POST[r17]','$_POST[jml17]','$_POST[r18]','$_POST[rm18]','$_POST[r19]','$_POST[rm19]',
				'$_POST[r20]','$_POST[rm20]','$_POST[status]')");
		  		 		
                echo "<script>window.location='home.php?pg=ppic&act=view'</script>";
              }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data PPIC</h1>
            <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="">Data Planing PPIC</a></li>
            <li class="active">Tambah Data PPIC</li>
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
			    <?php
                      //memulai mengambil datanya
                      $sql = mysql_query("select * from ppic_plan");
                      
                      $num = mysql_num_rows($sql);
                      
                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }
                      
                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 5, "0", STR_PAD_LEFT);
                      $tahun = date('m/Y');
					  $tahun2 = date('mY');
                      $kode_jadi = "PPICPLAN/$tahun/$bikin_kode";
					  $kode_jadi2 = "PLANPROD$tahun2$bikin_kode";

                      ?>
			</div>
			
				  
				
                      
				  
				
                       <div class="form-group">Kode Planing PPIC
					   <input type="text" class="form-control" id="ppic_id" name="ppic_id" placeholder="Nomor planing" value= "<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                       <input type="hidden" class="form-control" id="ppic_id" name="ppic_id" placeholder="Nomor Planing" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                  </div>

				 
				  <div class="form-group">Kode Planing Produksi
                      <input type="text" class="form-control" id="plan_prod" name="plan_prod" placeholder="Nomor planing" value= "<?php echo $kode_jadi2?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                       <input type="hidden" class="form-control" id="plan_prod" name="plan_prod" placeholder="Nomor Planing" value="<?php echo $kode_jadi2?>" required data-fv-notempty-message="Tidak boleh kosong">
					
                  </div>
                
                
					
							
					
					<div class="form-group">Nama Produk Premix
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" value="<?php echo $d['nm_fg'];?>">
					
                  </div>

				  <div class="form-group">No Form
                      <input readonly class="form-control" id="no_form" name="no_form" value="<?php echo $d['no_form'];?>">
					
                  </div>
					
						<div class="form-group">Tanggal Planing Produksi
                    <input type="date" class="form-control" id="tgl" name="tgl"  placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong"/>
					</div>
					
					
					
					<div class="form-group" required data-fv-notempty-message="Tidak boleh kosong">Shift Produksi <br>
                    <input name="shift" type="radio" value="1"> Shift 1 <br>
					 <input name="shift" type="radio" value="2"> Shift 2 <br>
					  <input name="shift" type="radio" value="3"> Shift 3<br>
					</div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Leader</label> <br>
                     <select class="form-control select2" id="leader" name="leader"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  >
                      <option value="" >--- Leader ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM leader order by id asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nama']; ?>">
                        <?php echo $row['nama'] ; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
							
							</select>
							</div>
					
					
					
					 <div class="form-group"> Jenis Screen
					<input type="text" class="form-control" id="screen" name="screen" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();" maxlength="4">
                      			  
					  </div>
					  
					   <div class="form-group">
                      <label for="exampleInputEmail1">Nama Customer</label> <br>
                     <select class="form-control select2" id="nm_cust" name="nm_cust"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  >
                      <option value="" >--- Customer ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM customer order by id asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nama']; ?>">
                        <?php echo $row['nama'] ; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
							
							</select>
							</div>
					
					 <div class="form-group"> Jumlah Batch
					<input type="text" class="form-control" id="lot" name="lot" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
                      			  
					  </div>
					  
					  
					
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Terigu Standart</label> <br>
                     <select class="form-control select2" id="terigua" name="terigua"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  >
                      <option value="" >--- Choose a Floor ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_rm order by no asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm'] ; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					<input readonly class="form-control" id="terigu1" name="terigu1" value="<?php echo $d['terigu1'];?>" onKeyUp="sum();" >
					<div class="form-group">Total Kebutuhan Terigu Standart
					 <input readonly class="form-control"   id="jmlt1" name="jmlt1" onKeyUp="sum();" >
					  </div>
					  </div>
					  
					  	 <div class="form-group">
                      <label for="exampleInputEmail1">Terigu Premium</label> <br>
                     <select class="form-control select2" id="terigub" name="terigub"  style="width: 100%;" >
                      <option value="" >--- Choose a Floor ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_rm order by no asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nm_rm']; ?>">
                        <?php echo $row['nm_rm']; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					 <input readonly class="form-control" id="terigu2" name="terigu2" value="<?php echo $d['terigu2'];?>" onKeyUp="sum();" >
					 <div class="form-group">Total Kebutuhan Terigu Premium 
					 <input readonly class="form-control"   id="jmlt2" name="jmlt2" onKeyUp="sum();" >
					  </div>
					  
		
				  <div class="form-group">
					<input readonly class="form-control" id="r1" name="r1" value="<?php echo $d['r1'];?>">
                      <input readonly class="form-control" id="rm1" name="rm1" value="<?php echo $d['rm1'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r1'];?>
					 <input readonly class="form-control"   id="jml1" name="jml1" onKeyUp="sum();" >
					  
					  </div>
					  
				 <div class="form-group">
					<input readonly class="form-control" id="r2" name="r2" value="<?php echo $d['r2'];?>">
                      <input readonly class="form-control" id="rm2" name="rm2" value="<?php echo $d['rm2'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r2'];?>
					 <input readonly class="form-control"   id="jml2" name="jml2" onKeyUp="sum();" >
					  
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r3" name="r3" value="<?php echo $d['r3'];?>">
                      <input readonly class="form-control" id="rm3" name="rm3" value="<?php echo $d['rm3'];?>" onKeyUp="sum();">
					   <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r3'];?>
					 <input readonly class="form-control"   id="jml3" name="jml3" onKeyUp="sum();" >
					   
					  </div>
						
						<div class="form-group">
					<input readonly class="form-control" id="r4" name="r4" value="<?php echo $d['r4'];?>">
                     <input readonly class="form-control" id="rm4" name="rm4" value="<?php echo $d['rm4'];?>" onKeyUp="sum();">
					 <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r4'];?>
					 <input readonly class="form-control" id="jml4" name="jml4" onKeyUp="sum();" >
					 
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r5" name="r5" value="<?php echo $d['r5'];?>">
                     <input readonly class="form-control" id="rm5" name="rm5" value="<?php echo $d['rm5'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r5'];?>
					 <input readonly class="form-control" id="jml5" name="jml5" onKeyUp="sum();" >
					
					  </div>
					
				 <div class="form-group">
					<input readonly class="form-control" id="r6" name="r6" value="<?php echo $d['r6'];?>">
                     <input readonly class="form-control" id="rm6" name="rm6" value="<?php echo $d['rm6'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r6'];?>
					 <input readonly class="form-control" id="jml6" name="jml6" onKeyUp="sum();" >
					
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r7" name="r7" value="<?php echo $d['r7'];?>">
                     <input readonly class="form-control" id="rm7" name="rm7" value="<?php echo $d['rm7'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r7'];?>
					 <input readonly class="form-control" id="jml7" name="jml7" onKeyUp="sum();" >
					
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r8" name="r8" value="<?php echo $d['r8'];?>">
                     <input readonly class="form-control" id="rm8" name="rm8" value="<?php echo $d['rm8'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r8'];?>
					 <input readonly class="form-control" id="jml8" name="jml8" onKeyUp="sum();" >
					
					  </div>
					
					<div class="form-group">
					<input readonly class="form-control" id="r9" name="r9" value="<?php echo $d['r9'];?>">
                     <input readonly class="form-control" id="rm9" name="rm9" value="<?php echo $d['rm9'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r9'];?>
					 <input readonly class="form-control" id="jml9" name="jml9" onKeyUp="sum();" >
					
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r10" name="r10" value="<?php echo $d['r10'];?>">
                     <input readonly class="form-control" id="rm10" name="rm10" value="<?php echo $d['rm10'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r10'];?>
					 <input readonly class="form-control" id="jml10" name="jml10" onKeyUp="sum();" >
					
					  </div>
					  
					  <div class="form-group">
					<input readonly class="form-control" id="r11" name="r11" value="<?php echo $d['r11'];?>">
                     <input readonly class="form-control" id="rm11" name="rm11" value="<?php echo $d['rm11'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r11'];?>
					 <input readonly class="form-control" id="jml11" name="jml11" onKeyUp="sum();" >
					
					  </div>
					  
					    <div class="form-group">
					<input readonly class="form-control" id="r12" name="r12" value="<?php echo $d['r12'];?>">
                     <input readonly class="form-control" id="rm12" name="rm12" value="<?php echo $d['rm12'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r12'];?>
					 <input readonly class="form-control" id="jml12" name="jml12" onKeyUp="sum();" >
					
					  </div>
					  
					   <div class="form-group">
					<input readonly class="form-control" id="r13" name="r13" value="<?php echo $d['r13'];?>">
                     <input readonly class="form-control" id="rm13" name="rm13" value="<?php echo $d['rm13'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r13'];?>
					 <input readonly class="form-control" id="jml13" name="jml13" onKeyUp="sum();" >
					
					  </div>
					  
					    <div class="form-group">
					<input readonly class="form-control" id="r14" name="r14" value="<?php echo $d['r14'];?>">
                     <input readonly class="form-control" id="rm14" name="rm14" value="<?php echo $d['rm14'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r14'];?>
					 <input readonly class="form-control" id="jml14" name="jml14" onKeyUp="sum();" >
					
					  </div>

					  <div class="form-group">
					<input readonly class="form-control" id="r15" name="r15" value="<?php echo $d['r15'];?>">
                     <input readonly class="form-control" id="rm15" name="rm15" value="<?php echo $d['rm15'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r15'];?>
					 <input readonly class="form-control" id="jml15" name="jml15" onKeyUp="sum();" >
					
					  </div>
							
						
								 
					<div class="form-group">
					<input readonly class="form-control" id="r16" name="r16" value="<?php echo $d['r16'];?>">
                     <input readonly class="form-control" id="rm16" name="rm16" value="<?php echo $d['rm16'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r16'];?>
					 <input readonly class="form-control" id="jml16" name="jml16" onKeyUp="sum();" >
					
					  </div>

					  <div class="form-group">
					<input readonly class="form-control" id="r17" name="r17" value="<?php echo $d['r17'];?>">
                     <input readonly class="form-control" id="rm17" name="rm17" value="<?php echo $d['rm17'];?>" onKeyUp="sum();">
					  <div class="form-group">Total Kebutuhan Bahan Baku <?php echo $d['r17'];?>
					 <input readonly class="form-control" id="jml17" name="jml17" onKeyUp="sum();" >
					
					  </div>
					  
					  
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">label</label> <br>
                     <select class="form-control select2" id="r18" name="r18"  style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong"  >
                      <option value="" >--- Choose a Label ---</option>
                     <?php
                $query = mysql_query("SELECT * FROM stok_label order by id asc");
                while ($row = mysql_fetch_array($query)) 
				{
                ?>
                    <option value="<?php echo $row['nm_label']; ?>">
                        <?php echo $row['nm_label'] ; ?>
                    </option>
                <?php
                }
                ?>
						    </optgroup>
                      </select>
					<input type="text" class="form-control" id="rm18" name="rm18" onKeyUp="sum();" >
					
					</div>
					   
					
					  
				  <div class="form-group">Plastik Luar
				  <select class="form-control select2" id="r19" name="r19" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--- Pilih ---</option>
                       	<option value="hd polos 80x50x70m">HD Polos 80x50x70m</option>
						<option value="kemasan wooven">WOOVEN</option>
						
					<!--<input readonly class="form-control" id="r17" name="r17" value="hd polos 80x50x70m">-->
                     <input type="text" class="form-control" id="rm19" name="rm19" onKeyUp="sum();">
					 
					  </div>
					  
						<div class="form-group">Plastik Kemasan   
					    <select class="form-control select2" id="r20" name="r20" style="width: 100%;" required data-fv-notempty-message="Tidak boleh kosong" >
                        <option value="">--- Pilih Plastik ---</option>
                       	<option value="pe kuning 49x79x60m">pe kuning 49x79x60m</option>
						<option value="pe biru 49x79x70m">pe biru 49x79x70m</option>
						   <option value="kemasan wooven">WOOVEN</option>
						
                      </select>
                      <input type="text" class="form-control" id="rm20" name="rm20"  onKeyUp="sum();" >
                    </div>	

					 <div class="form-group">Jumlah Premix                
                      <input readonly class="form-control" id="jumlah" name="jumlah" placeholder="Hasil akam muncul otomatis" required data-fv-notempty-message="Tidak boleh kosong" onKeyUp="sum();">
                    </div>

					<script type="text/javascript">    
	
					  				  
								
			
						 function sum() {
							
							var txta= document.getElementById('terigu1').value;
							var txtb= document.getElementById('terigu2').value;
							var txtc= document.getElementById('jmlt1').value;
							var txtd= document.getElementById('jmlt2').value;							
							var txt1 = document.getElementById('rm1').value;
							var txt1a = document.getElementById('jml1').value;	
							var txt2 = document.getElementById('rm2').value;
							var txt2a = document.getElementById('jml2').value;
							var txt3 = document.getElementById('rm3').value;
							var txt3a = document.getElementById('jml3').value;
							var txt4= document.getElementById('rm4').value;
							var txt4a= document.getElementById('jml4').value;
							var txt5= document.getElementById('rm5').value;
							var txt5a= document.getElementById('jml5').value;
							var txt6= document.getElementById('rm6').value;
							var txt6a= document.getElementById('jml6').value;
							var txt7= document.getElementById('rm7').value;
							var txt7a= document.getElementById('jml7').value;
							var txt8= document.getElementById('rm8').value;
							var txt8a= document.getElementById('jml8').value;
							var txt9= document.getElementById('rm9').value;
							var txt9a= document.getElementById('jml9').value;
							var txt10= document.getElementById('rm10').value;
							var txt10a= document.getElementById('jml10').value;
							var txt11= document.getElementById('rm11').value;
							var txt11a= document.getElementById('jml11').value;
							var txt12= document.getElementById('rm12').value;
							var txt12a= document.getElementById('jml12').value;
							var txt13= document.getElementById('rm13').value;
							var txt13a= document.getElementById('jml13').value;
							var txt14= document.getElementById('rm14').value;
							var txt14a= document.getElementById('jml14').value;
							 var txt15= document.getElementById('lot').value;
							var txt15a= document.getElementById('rm15').value;
							var txt15b= document.getElementById('jml15').value;
							var txt16= document.getElementById('rm16').value;
							var txt16a= document.getElementById('jml16').value;
							var txt17= document.getElementById('rm17').value;
							var txt17a= document.getElementById('jml17').value;
							var txt18= document.getElementById('rm18').value;
							var txt19= document.getElementById('rm19').value;
							var txt20= document.getElementById('rm20').value;




							   
							
							// 		    var txt20= document.getElementById('rm15').value;
										 
							// 			   var txt22= document.getElementById('rm16').value;
							// 			 var txt23= document.getElementById('rm17').value;
							//  var txt24= document.getElementById('rm18').value;
							//  var txt25= document.getElementById('jml18').value;
										  
							
							var resulta = (parseFloat(txta)*parseFloat(txt15)) ;
      						if (!isNaN(resulta)) {
         					document.getElementById('jmlt1').value = resulta.toFixed(2);
							}
							
							var resultb = (parseFloat(txtb)*parseFloat(txt15)) ;
      						if (!isNaN(resultb)) {
         					document.getElementById('jmlt2').value = resultb.toFixed(2);
							}

							var result1 =parseInt(txt15)*3.3 ;
      						if (!isNaN(result1)) {
         					document.getElementById('jumlah').value = result1.toFixed(2);
							}
							
							var result2 = (parseFloat(txt1)*parseFloat(txt15)) ;
      						if (!isNaN(result2)) {
         					document.getElementById('jml1').value = result2.toFixed(2);
							}
							
							var result3 = (parseFloat(txt2)*parseFloat(txt15)) ;
      						if (!isNaN(result3)) {
         					document.getElementById('jml2').value = result3.toFixed(2);
							}
							
							var result4 = (parseFloat(txt3)*parseFloat(txt15)) ;
      						if (!isNaN(result4)) {
         					document.getElementById('jml3').value = result4.toFixed(2);
							}
							
							var result5 = (parseFloat(txt4)*parseFloat(txt15)) ;
      						if (!isNaN(result5)) {
         					document.getElementById('jml4').value = result5.toFixed(2);
							}						
							
							var result6 = (parseFloat(txt5)*parseFloat(txt15)) ;
      						if (!isNaN(result6)) {
         					document.getElementById('jml5').value = result6.toFixed(2);
							}

							// PRX 01

							var result7 = (parseFloat(txt6)*parseFloat(txt15)) ;
      						if (!isNaN(result7)) {
         					document.getElementById('jml6').value = result7.toFixed(2);
							}

							// PRX 02
							
							var result8 = (parseFloat(txt7)*parseFloat(txt15)) ;
      						if (!isNaN(result8)) {
         					document.getElementById('jml7').value = result8.toFixed(2);
							}

							// PRX 03
							
							var result9 = (parseFloat(txt8)*parseFloat(txt15)) ;
      						if (!isNaN(result9)) {
         					document.getElementById('jml8').value = result9.toFixed(2);
							}

							// PRX 04
							
							var result10 = (parseFloat(txt9)*parseFloat(txt15)) ;
      						if (!isNaN(result10)) {
         					document.getElementById('jml9').value = result10.toFixed(2);
							}

							// PRX 05
							
							var result11 = (parseFloat(txt10)*parseFloat(txt15)) ;
      						if (!isNaN(result11)) {
         					document.getElementById('jml10').value = result11.toFixed(2);
							}

							// PRX 06
							
							var result12 = (parseFloat(txt11)*parseFloat(txt15)) ;
      						if (!isNaN(result12)) {
         					document.getElementById('jml11').value = result12.toFixed(2);
							}

							// PRX 07
							
							var result13 = (parseFloat(txt12)*parseFloat(txt15)) ;
      						if (!isNaN(result13)) {
         					document.getElementById('jml12').value = result13.toFixed(2);
							}

							// PRX 08
							
							var result14 = (parseFloat(txt13)*parseFloat(txt15)) ;
      						if (!isNaN(result14)) {
         					document.getElementById('jml13').value = result14.toFixed(2);
							}

							// RAGI
							
							var result15 = (parseFloat(txt14)*parseFloat(txt15)) ;
      						if (!isNaN(result15)) {
         					document.getElementById('jml14').value = result15.toFixed(2);
							}

							// SHORTENING

							var result16 = (parseFloat(txt15a)*parseFloat(txt15)) ;
      						if (!isNaN(result16)) {
         					document.getElementById('jml15').value = result16.toFixed(2);
							}

							// MARGARINE	

							var result17 = (parseFloat(txt16)*parseFloat(txt15)) ;
      						if (!isNaN(result17)) {
         					document.getElementById('jml16').value = result17.toFixed(2);
							}

							//PRX 09
							var result18 = (parseFloat(txt17)*parseFloat(txt15)) ;
      						if (!isNaN(result18)) {
         					document.getElementById('jml17').value = result18.toFixed(2);
							}
							
							// label
							var result19 =parseInt(txt15)*3.3 ;
      						if (!isNaN(result19)) {
         					document.getElementById('rm18').value = result19.toFixed(2);
							}

							// plastik luar
							var result20 =parseInt(txt15)*3.3 ;
      						if (!isNaN(result20)) {
         					document.getElementById('rm19').value = result20.toFixed(2);
							}

							// plastik kemasan
							var result21 =parseInt(txt15)*3.3 ;
      						if (!isNaN(result21)) {
         					document.getElementById('rm20').value = result21.toFixed(2);
							}



							
							
												
							
						}
						
						
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
                  </div><!-- /.box-body --><!-- /.box --><!-- /.col --><!-- /
				  .content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
</div>


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
      mysql_query("DELETE FROM verifikasi_prodrm WHERE id_produk='$_GET[id_produk]'");
      echo "<script>window.location='home.php?pg=verifikasirm&act=view'</script>";
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