
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/ms-excel");
	header("Content-Disposition: attachment; filename=Data.xls");
	?>

	<left>
		<h1>Report Sales PT Raja Roti Cemerlang</h1>
	</center>

	<table width="1490" height="73" border="1" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr align="top align">
                        <th width="23">No</th>
                        <th width="71">Nomor INV</th>
						<th width="84">Nomor DO</th>
                        <th width="136">Nomor SO</th>
						<th width="82">nama Customer</th>
						<th width="68">Jtanggal</th>  
						<th width="89">Tempo</th>
						<th width="103">Mobil</th>
						<th width="82">Supir</th>
						<th width="126">Nama FG1</th>
						<th width="126">Qty1</th>
                        <th width="107">plan sak1</th>
                        <th width="111">plan kg 1</th>
						 <th width="110">realisasi sak 1</th>
						 <th width="110">realisasi kg 1</th>
						<th width="126">Nama FG2</th>
						<th width="126">Qty2</th>
                        <th width="107">plan sak2</th>
                        <th width="111">plan kg 2</th>
						 <th width="110">realisasi sak 2</th>
						 <th width="110">realisasi kg 2</th>
						<th width="126">Nama FG3</th>
						<th width="126">Qty3</th>
                        <th width="107">plan sak3</th>
                        <th width="111">plan kg 3</th>
						 <th width="110">realisasi sak 3</th>
						 <th width="110">realisasi kg 3</th>
						<th width="126">Nama FG4</th>
						<th width="126">Qty4</th>
                        <th width="107">plan sak4</th>
                        <th width="111">plan kg 4</th>
						 <th width="110">realisasi sak 4</th>
						 <th width="110">realisasi kg 4</th>
						  <th width="110">retur</th>
						
						 
						  
                      </tr>
                    </thead>
			
	

		 <tbody>
			 <?php
error_reporting(0);
include "../config/koneksi.php";
session_start();
?>
			 
                    <?php
                    $tampil=mysql_query("SELECT * FROM rekap order by id asc");
                    $no = 1;
                    while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr align="center">
                        <td><?php echo $no++ ?></td>
						<td><?php echo $r[no_inv]?></td>
						<td><?php echo $r[do1]?></td>
						<td><?php echo $r[no_so]?></td>
                        <td><?php echo $r[nm_cust]?></td>
                        <td><?php echo $r[tgl]?></td>
                        <td><?php echo $r[tempo]?></td>
						<td><?php echo $r[mobil]?></td>
						<td><?php echo $r[supir]?></td>
                        <td><?php echo $r[nm_fg1]?></td>
                        <td><?php echo $r[qty1]?></td>
                        <td><?php echo $r[plan_sak1]?></td>
						<td><?php echo $r[plan_kg1]?></td>
                        <td><?php echo $r[realisasi_sak1]?></td>
						<td><?php echo $r[realisasi_kg1]?></td>
						<td><?php echo $r[nm_fg2]?></td>
                        <td><?php echo $r[qty2]?></td>
                        <td><?php echo $r[plan_sak2]?></td>
						<td><?php echo $r[plan_kg2]?></td>
                        <td><?php echo $r[realisasi_sak2]?></td>
						<td><?php echo $r[realisasi_kg2]?></td>
						<td><?php echo $r[nm_fg3]?></td>
                        <td><?php echo $r[qty3]?></td>
                        <td><?php echo $r[plan_sak3]?></td>
						<td><?php echo $r[plan_kg3]?></td>
                        <td><?php echo $r[realisasi_sak3]?></td>
						<td><?php echo $r[realisasi_kg3]?></td>		
						<td><?php echo $r[nm_fg4]?></td>
                        <td><?php echo $r[qty4]?></td>
                        <td><?php echo $r[plan_sak4]?></td>
						<td><?php echo $r[plan_kg4]?></td>
                        <td><?php echo $r[realisasi_sak4]?></td>
						<td><?php echo $r[realisasi_kg4]?></td>	
						<td><?php echo $r[retur]?></td>	
						
                        
						<?php
                    
                    }
                    ?>
					
			
               </tbody>
	</table>
</body>
</html>