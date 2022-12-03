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
        <h1> Data Drying</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Drying</ol>
        </section>


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box-header">
       <a href="?pg=laporan_drying&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Laporan Produksi</i>
    </button> </a>   
     <a href="cetaklapprod.php"> <button type="button" class="btn btn-info"><i class = "fa fa-print"> Cetak Detail Laporan Produksi</i>
    </button> </a>   
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                 <table width="445" height="73" class=" table-bordered "  id="example1" style="width: 100%;">
                    <thead>
                      <tr>
            <th width="66">NO</th>
            <th width="161">No Planing Produksi</th>
            <th width="169">Tanggal Produksi</th>
            <th width="161">Nama Produk</th>
            <th width="212">Shift</th>
            <th width="115">Target Drying</th>
            <th width="141">Aktual Drying</th>
            <th width="114">Input Drying</th>
              <th width="113">Cetak</th>
                      </tr>
                    </thead>
          
                    <tbody>
                   <?php
                   include("indo.php");
                    $tampil=mysql_query("SELECT * FROM lapdry order by id");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
            <td height="49"><?php echo "$no"?></td>
                        <td><?php echo "$r[no_lap]"?></td>
            <td><?php echo "$r[plan_prod]"?></td>
            <td><?php echo TanggalIndo($r['tgl'])?></td>
            
            <td><?php echo "$r[nm_fg]"?></td>
            <td><?php echo "$r[lot]"?></td>
            <td><?php echo "$r[jumlah]"?></td>
           
          
            <td style="text-align: center"><a href="?pg=laporan_drying&act=edit&id=<?php echo $r['id']?>">
                         <button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button>
                        </a></td>
              <td><a href="?pg=laporan_drying&act=delete&id=<?php echo $r['id']?>"><button  type="button" class="btn btn-danger" onKeyUp="return confirm('Anda akan menghapus data planing Poduksi <?php echo $r['id']?>');"><i class = "fa fa-trash-o"></i></button></i></button></a></td>
                        
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
if  ($_POST['sisa']>='0'){ 
      $query = mysql_query("INSERT INTO lapdry VALUES ('','$_POST[no_lap]','$_POST[plan_prod]','$_POST[tgl]','$_POST[shift_drying]','$_POST[nm_fg]','$_POST[lot]','$_POST[jumlah]','$_POST[tgl_drying]','$_POST[berita]')");
      
          $query .= mysql_query("INSERT INTO sisadrying VALUES ('','$_POST[no_lap]','$_POST[plan_prod]','$_POST[tgl]','$_POST[shift]','$_POST[nm_fg]','$_POST[lot]','$_POST[aktualroti]','$_POST[sisa]','$_POST[keterangan]')");
        
      
          echo "<script> alert('data berhasil disimpan dan stok terpotong !');window.location='home.php?pg=laporan_drying&act=view'</script>";
      }else {
         echo "<script type='text/javascript'>  alert('Gagal Disimpan, Karna Aktual Produksi melebihi Target Produksi !');</script>";
         }
         
         }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Data Mixing</h1>
            <ol class="breadcrumb">
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
            <div class="form-group">
           <?php $kd_trans= kd_dry_auto(); //untuk kode otomatis dng fungsi?> 
                      <label for="exampleInputEmail1">Kode Planing PPIC</label>
                      <input type="text" class="form-control" id="no_lap" value="<?php echo $kd_trans;?>" name="no_lap"   required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="no_lap" value="<?php echo $kd_trans;?>" name="no_lap"   required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
            
          <div class="form-group">
                      <label for="exampleInputEmail1">Planing Produksi</label> <br>
                    <select class="form-control select2" style="width: 100%;" name="plan_prod" id="plan_prod" onchange="changeValue(this.value)" >
          <option value=''>-Pilih formula-</option>
          <?php 
          $result = mysql_query("select * from planingprod ");    
          $jsArray = "var frm = new Array();
";        
          while ($row = mysql_fetch_array($result)) {    
          echo '
<option value="' . $row['plan_prod'] . '">' . $row['plan_prod'].  '</option>';    
$jsArray .= "frm['" . $row['plan_prod'] . "'] = {
jumlah:'".addslashes($row['jumlah'])."',
tgl:'".addslashes($row['tgl'])."',
nm_fg:'".addslashes($row['nm_fg'])."'
};
";    
          }      
          ?>    
                </optgroup>
                      </select>
          </div>

          <div class="form-group">Tanggal produksi roti
                      <input readonly class="form-control" id="tgl" name="tgl" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
          </div>
          <div class="form-group">Tanggal Drying
                      <input type="date" class="form-control" id="tgl_drying" name="tgl_drying" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong">
          </div>  
          
             <div class="form-group">
                    <label for="exampleInputEmail1">Shift Drying</label> 
                      <select class="form-control select2" name="shift_drying" id="shift_drying" style="width: 100%;" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div>
                    
          <div class="form-group">Nama Produk
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" >
                    </div>
           
           <div class="form-group">Target Drying
                      <input readonly class="form-control" id="jumlah" name="jumlah" onKeyUp="sum();"  >
                    </div>
          
          
          
          
            
            <div class="form-group">Aktual Drying
            <input type="text" class="form-control" id="lot" name="lot" onKeyUp="sum();">
                      </div>
      

            <div class="form-group">Sisa
            <input readonly class="form-control" id="sisa" name="sisa" onKeyUp="sum();">
                      </div>
            
            
          <div class="form-group">Keteranagn
                    <input class="form-control" id="berita" name="berita"  placeholder="keterangan" type="text">
          </div>  
          
          <div class="form-group"></div>
<script>
                    
  <?php 
  echo 
    $jsArray; 
  ?>  
  function changeValue(no_plan){ 
    
  
    document.getElementById('nm_fg').value = frm[no_plan].nm_fg;
    document.getElementById('tgl').value = frm[no_plan].tgl;
    document.getElementById('jumlah').value = frm[no_plan].jumlah;
    
    
    
      };  
          </script>
    
          
          <script>
            function sum() {
var txt11=document.getElementById('jumlah').value;
var txt13=document.getElementById('lot').value;
var txt14=document.getElementById('sisa').value;




var result8 = parseInt(txt11)-parseInt(txt13);
  if (!isNaN(result8)) {
document.getElementById('sisa').value = result8;
}

}
            
            
            
          </script>
            
          
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
      $d = mysql_fetch_array(mysql_query("SELECT * FROM lapprod WHERE id='$_GET[id]'"));
  
            
        if (isset($_POST['update'])) {
    
        
        mysql_query("UPDATE lapdry SET no_lap='$_POST[no_lap]', plan_prod='$_POST[plan_prod]', tgl='$_POST[tgl]', 
        shift='$_POST[shift]', nm_fg='$_POST[nm_fg]', lot='$_POST[lot]',  aktualroti='$_POST[aktualroti]',
         sisa='$_POST[sisa]', jumlah='$_POST[jumlah]', fg='$_POST[fg]', prosentase='$_POST[prosentase]',  
         tgl_drying='$_POST[tgl_drying]', shift_drying='$_POST[shift_drying]', berita='$_POST[berita]' WHERE id='$_POST[id]'");
         echo "<script> alert('data berhasil disimpan dan stok terpotong !');window.location='home.php?pg=dataprod&act=view'</script>";
     
         
         }
              ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Tambah Planing Produksi</h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Berada</a></li>
            <li class="active"><a href="?pg=produk&act=view">Data Planing</a></li>
            <li class="active"><a href="#">Tambah Data Planing</a></li>
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
                      <label for="exampleInputEmail1">No Plan Prod</label>
             <input  readonly class="form-control" id="no_lap" name="no_lap" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['no_lap'];?>"/>
                      <input readonly class="form-control" id="plan_prod" name="plan_prod" value= "<?php echo $d['plan_prod'];?>">
             <input type="hidden"class="form-control" id="id" name="id" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['id'];?>"/>
            </div>
           
            
           <div class="form-group">Tanggal Rekap
                      <input readonly class="form-control" id="tgl" name="tgl" placeholder="MM/DD/YYY" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['tgl'];?>"/>
          </div>  
          
           <div class="form-group">Shift mixing
                      <input readonly class="form-control" id="shift" name="shift"  value= "<?php echo $d['shift'];?>"/>
                    </div>
                    
          <div class="form-group">Nama Produk
                      <input readonly class="form-control" id="nm_fg" name="nm_fg" value= "<?php echo $d['nm_fg'];?>"/>
                    </div>
           
           <div class="form-group">Target Perhari
                      <input readonly class="form-control" id="lot" name="lot" onKeyUp="sum();"  value= "<?php echo $d['lot'];?>"/>
                    </div>
          
           <div class="form-group">Actual Produksi Roti
            <input readonly class="form-control" id="aktualroti" name="aktualroti" onKeyUp="sum();" value= "<?php echo $d['aktualroti'];?>"/>
                  </div>
          
           <div class="form-group">Sisa Racikan (batch)
            <input readonly class="form-control" id="sisa" name="sisa" onKeyUp="sum();" value= "<?php echo $d['sisa'];?>"/>
                  </div>
            
            <div class="form-group">Target Drying
            <input readonly class="form-control" id="jumlah" name="jumlah" onKeyUp="sum();" value= "<?php echo $d['jumlah'];?>"/>
                      </div>
      
                      
             <div class="form-group">Actual Drying
            <input type="text" class="form-control" id="fg" name="fg" onKeyUp="sum();" value= "<?php echo $d['fg'];?>"/>
                      </div>
                                  
            
            <div class="form-group">Prosentase
            <input type="text" class="form-control" id="prosentase" name="prosentase" onKeyUp="sum();" value= "<?php echo $d['prosentase'];?>"/>
                     </div>
            
          <div class="form-group">Tanggal Drying
                    <input class="form-control" id="date" name="tgl_drying"  placeholder="MM/DD/YYY" type="text">
          </div>  
            
                      
           
          
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shift Drying</label> 
                      <select class="form-control select2" name="shift_drying" id="shift_drying" style="width: 100%;" >
                        <option value="">--SIlahkan Pilih--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      </div>
            
            <div class="form-group">Berita
                    <input class="form-control" id="berita" name="berita"  type="text">
          </div>            
            
           <script language="JavaScript" type="text/javascript">
            
            function sum() {
var txt10=document.getElementById('fg').value;            
var txt11=document.getElementById('jumlah').value;
var txt12=document.getElementById('prosentase').value;


  
var result6 = parseInt(txt10) / parseInt(txt11)*100;
if (!isNaN(result6)) {
document.getElementById('prosentase').value = result6.toFixed(1);
}



}
            
            
            
          </script>
            
    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info" >Save</button>

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
      mysql_query("DELETE FROM lapdry WHERE id='$_GET[id]'");
      echo "<script>window.location='home.php?pg=laporan_drying&act=view'</script>";
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