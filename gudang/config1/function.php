<?php
/* Candralab Ecommerce v2.0
 * http://www.candra.web.id/
 * Candra adi putra <candraadiputra@gmail.com>
 * last edit: 15 okt 2013
 */
function kd_trans_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_po,5)) AS notrans
							FROM produk WHERE tgl = '".date('Y-m-d')."'");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "PO".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "PO".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "PO".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "PO".date('dmy')."0".$kd;
			}
			else {
				$no = "PO".date('dmy').$kd;
			}
		}
		else
		{
			$no = "PO".date('dmy')."00001";
		}

		return $no;
	}


function kd_wip()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_wip,5)) AS notrans
							FROM wip WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "WIP_FORM".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "WIP_FORM".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "WIP_FORM".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "WIP_FORM".date('dmy')."0".$kd;
			}
			else {
				$no = "WIP_FORM".date('dmy').$kd;
			}
		}
		else
		{
			$no = "WIP_FORM".date('dmy')."00001";
		}

		return $no;
	}

function kd_lp_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_lap,5)) AS notrans
							FROM mixing WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "LAP-PROD".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "LAP-PROD".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "LAP-PROD".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "LAP-PROD".date('dmy')."0".$kd;
			}
			else {
				$no = "LAP-PROD".date('dmy').$kd;
			}
		}
		else
		{
			$no = "LAP-PROD".date('dmy')."00001";
		}

		return $no;
	}

function kd_trs_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(kd_transaksi,5)) AS notrans
							FROM tbltransaksi WHERE tgl = '".date('Y-m-d')."'");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "TRANS".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "TRANS".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "TRANS".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "TRANS".date('dmy')."0".$kd;
			}
			else {
				$no = "TRANS".date('dmy').$kd;
			}
		}
		else
		{
			$no = "TRANS".date('dmy')."00001";
		}

		return $no;
	}

function kd_sj_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(do1,5)) AS notrans
							FROM so WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "SJ".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "SJ".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "SJ".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "SJ".date('dmy')."0".$kd;
			}
			else {
				$no = "SJ".date('dmy').$kd;
			}
		}
		else
		{
			$no = "SJ".date('dmy')."00001";
		}

		return $no;
	}

function kd_ppic_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(ppic_id,5)) AS notrans
							FROM ppic_form WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "FRMPPIC".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "FRMPPIC".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "FRMPPIC".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "FRMPPIC".date('dmy')."0".$kd;
			}
			else {
				$no = "FRMPPIC".date('dmy').$kd;
			}
		}
		else
		{
			$no = "FRMPPIC".date('dmy')."00001";
		}

		return $no;
	}


function kd_ppic2_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(ppic_id,5)) AS notrans
							FROM ppic_plan WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "PLANPPIC".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "PLANPPIC".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "PLANPPIC".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "PLANPPIC".date('dmy')."0".$kd;
			}
			else {
				$no = "PLANPPIC".date('dmy').$kd;
			}
		}
		else
		{
			$no = "PLANPPIC".date('dmy')."00001";
		}

		return $no;
	}


function kd_planprod2_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_plan,5)) AS notrans
							FROM planprod WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "PLANPROD".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "PLANPROD".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "PLANPROD".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "PLANPROD".date('dmy')."0".$kd;
			}
			else {
				$no = "PLANPROD".date('dmy').$kd;
			}
		}
		else
		{
			$no = "PLANPROD".date('dmy')."00001";
		}

		return $no;
	}


function kd_trans1_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(id_fg,5)) AS notrans
							FROM stok_fg WHERE no");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "BRG"."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "BRG"."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "BRG"."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "BRG"."0".$kd;
			}
			else {
				$no = "BRG".$kd;
			}
		}
		else
		{
			$no = "BRG"."00001";
		}

		return $no;
	}

function kd_formula_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_form,5)) AS notrans
							FROM formula WHERE no");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "FORM".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "FORM".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "FORM".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "FORM".date('dmy')."0".$kd;
			}
			else {
				$no = "FORM".date('dmy').$kd;
			}
		}
		else
		{
			$no = "FORM".date('dmy')."00001";
		}

		return $no;
	}


	
function kd_so2_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_so,5)) AS notrans
							FROM salesorder WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "SO".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "SO".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "SO".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "SO".date('dmy')."0".$kd;
			}
			else {
				$no = "SO".date('dmy').$kd;
			}
		}
		else
		{
			$no = "SO".date('dmy')."00001";
		}

		return $no;
	}



function kd_po_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_po,5)) AS notrans
							FROM produk WHERE id_produk");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "PO".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "PO".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "PO".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "PO".date('dmy')."0".$kd;
			}
			else {
				$no = "PO".date('dmy').$kd;
			}
		}
		else
		{
			$no = "PO".date('dmy')."00001";
		}

		return $no;
	}


function kd_vrfpo_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(idvrf,5)) AS notrans
							FROM verifikasipo WHERE id_produk");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "VRFPO".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "VRFPO".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "VRFPO".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "VRFPO".date('dmy')."0".$kd;
			}
			else {
				$no = "VRFPO".date('dmy').$kd;
			}
		}
		else
		{
			$no = "VRFPO".date('dmy')."00001";
		}

		return $no;
	}





function kd_trans3_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(id_cust,5)) AS notrans
							FROM customer WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "CUST"."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "CUST"."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "CUST"."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "CUST"."0".$kd;
			}
			else {
				$no = "CUST".$kd;
			}
		}
		else
		{
			$no = "CUST"."00001";
		}

		return $no;
	}

function kd_trans4_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(do1,5)) AS notrans
							FROM so WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no ="0000".$kd."DO".date('dmy');
			}
			elseif (strlen($kd) == 2) {
				$no ="0000".$kd."DO".date('dmy');
			}
			elseif (strlen($kd) == 3) {
				$no ="0000".$kd."DO".date('dmy');
			}
			elseif (strlen($kd) == 4) {
				$no ="0000".$kd."DO".date('dmy');
			}
			else {
				$no ="0000".$kd."DO".date('dmy');
			}
		}
		else
		{
			$no = "DO"."00001";
		}

		return $no;
	}

function kd_trans5_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(no_inv,5)) AS notrans
							from inv WHERE id");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "INV".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "INV".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "INV".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "INV".date('dmy')."0".$kd;
			}
			else {
				$no = "INV".date('dmy').$kd;
			}
		}
		else
		{
			$no = "INV".date('dmy')."00001";
		}

		return $no;
	}

function kd_trans6_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(pembayaran_piutang,5)) AS notrans
							FROM no_byr WHERE tgl = '".date('Y-m-d')."'");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "PAYMENT".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "PAYMENT".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "PAYMENT".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "PAYMENT".date('dmy')."0".$kd;
			}
			else {
				$no = "PAYMENT".date('dmy').$kd;
			}
		}
		else
		{
			$no = "PAYMENT".date('dmy')."00001";
		}

		return $no;
	}









 	function kd_transmasuk_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(kd_transmasuk,5)) AS notrans
							FROM transmasuk WHERE tgl = '".date('Y-m-d')."'");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "MSK".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "MSK".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "MSK".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "MSK".date('dmy')."0".$kd;
			}
			else {
				$no = "MSK".date('dmy').$kd;
			}
		}
		else
		{
			$no = "MSK".date('dmy')."00001";
		}

		return $no;
	}
	function kd_transkeluar_auto()
	{
		$sql = mysql_query("SELECT MAX(RIGHT(kd_transkeluar,5)) AS notrans
							FROM transkeluar WHERE tgl = '".date('Y-m-d')."'");
		$m = mysql_fetch_assoc($sql);

		$no = 0;
		if($m['notrans'] <> NULL)
		{
			$kd = number_format($m['notrans'],0) + 1;
			if(strlen($kd) == 1)
			{
				$no = "KLR".date('dmy')."0000".$kd;
			}
			elseif (strlen($kd) == 2) {
				$no = "KLR".date('dmy')."000".$kd;
			}
			elseif (strlen($kd) == 3) {
				$no = "KLR".date('dmy')."00".$kd;
			}
			elseif (strlen($kd) == 4) {
				$no = "KLR".date('dmy')."0".$kd;
			}
			else {
				$no = "KLR".date('dmy').$kd;
			}
		}
		else
		{
			$no = "KLR".date('dmy')."00001";
		}

		return $no;
	}
function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}
function tglkirim($tgl)	{	
				if(!empty($tgl)){
				return  tampil_tanggal($tgl);
				}else{
					echo "belum dikirim";
				}
			}
function get_status_invoice($id) {

	  if ($id == '0') {
		echo  'belum bayar';
	} else if ($id == '1') {
		echo  'Sudah lunas';
	}
}
function cek_akses_langsung(){
	if(!isset($_GET['pg'])){
		echo "<p style='color:red'>Maaf, akses langsung tidak diperbolehkan</p>";
		exit();
	}
}
function cek_status_login($param){
//	cek_akses_langsung();
	if(empty($param)){
			echo "<p style='color:red'>Maaf, Anda Belum login</p>";
		exit();
		
	}
}
function list_jurusan() {
	
		
	$query = query("SELECT id_jurusan, nama_jurusan FROM data_jurusan ");
	while ($row = mysql_fetch_row($query)) {
	
			echo "<li><a href='index.php?mod=page&pg=users&id_jurusan=".$row[0]."'>" . ucwords($row[1]) . "</a> </li>";
		
	}
}
function list_news($jumlah) {
	
		
	$query = query("SELECT idberita,judul FROM berita order by tanggal desc limit $jumlah");
	while ($row = mysql_fetch_row($query)) {
	
			echo "<li><a href='index.php?mod=page&pg=berita&idberita=".$row[0]."'>" . ucwords($row[1]) . "</a> </li>";
		
	}
}
function get_status_stok($jumlah) {

	  if ($jumlah == '0') {
		return 'habis';
	} else  {
		return $jumlah;
	}
}
/* fungsi bantu style*/
function get_style($no){
	if($no%2==1){
		echo "odd";
	}else if($no%2==0){
		echo "even";
	}
}
function list_merek() {
	
		echo "	<li class=\"nav-header\">merek </li>";
	$query = query("SELECT idmerek, nama_merek FROM merek");
	while ($row = mysql_fetch_row($query)) {
	
			echo "<li><a href='index.php?mod=katalog*pg=katalog_list&idmerek=".$row[0]."'><i class='icon-list'></i>" . ucwords($row[1]) . "</a> </li>";
		
	}
}

function update_status_login($status,$idpelanggan) {
	
	query("update pelanggan set status='$status' where idpelanggan='$idpelanggan'");
}
function count_stat(){
	if(get_today_stat()<1){
		query("insert counter(tanggal,jumlah) values(curdate(),'1')");
	}else{
		query("update  counter set jumlah=jumlah+1 where tanggal=curdate()");
	}
}
function get_today_stat(){
	$hasil=fetch_row("select jumlah from counter where tanggal=curdate()");
	return $hasil;
}
function get_month_stat(){
	$hasil=fetch_row("select sum(jumlah) from counter where month(tanggal)= month(now()) 
	and year(tanggal)=year(now())");
	return $hasil;
}
function get_total_stat(){
	$hasil=fetch_row("select sum(jumlah) from counter");
	return $hasil;
}

function arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = arrayToObject($value);
         }
      }
      return $object;
    }
    else {
      return FALSE;
    }
}


function pagination($halaman, $jumlah_halaman, $tabel) {
	$baselink = "index.php?mod=" . $tabel . "&pg=" . $tabel . "_view&halaman=";
	if($halaman > 1) {
		$previous = $halaman - 1;
		echo "<li><a href='" . $baselink . "1'><i class='icon-fast-backward'></i></a></li>";
		echo "<li><a href='" . $baselink . $previous . "'><i class='icon-step-backward'></i></a></li>";
	} else {
		echo "<li><a href=''><i class='icon-fast-backward'></i></a></li><li><a href=''><i class='icon-step-backward'></i></a></li>";
	}
	
	$angka = ($halaman > 3) ? "<li><a href=''>...</a></li>" : " ";
	for($i = $halaman - 2; $i < $halaman; $i++) {
		if($i < 1)
			continue ;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= "<li> <a href='' class='btn btn-primary'>".$halaman."</a></li>";
	for($i = $halaman + 1; $i < $halaman + 3; $i++) {
		if($i > $jumlah_halaman)
			break;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= ($halaman + 2 < $jumlah_halaman ? "<li><a href=''>...</a></li>
	<li><a href='" . $baselink . $jumlah_halaman . "'>$jumlah_halaman</a></li>" : "");
	echo $angka;
	
	/*
	 for($i = 1; $i <= $jumlah_halaman; $i++) {
	 if($halaman != $i) {
	 echo "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	 } else {
	 echo "<li><a href='' class='btn btn-primary'><b>$i</b></a></li>";
	 }
	 }
	 *
	 */

	if($halaman < $jumlah_halaman) {
		$next = $halaman + 1;
		echo "<li><a href='" . $baselink . $next . "'><i class='icon-step-forward'></i></a></li>";
		echo "<li><a href='" . $baselink . $jumlah_halaman . "'><i class='icon-fast-forward'></i></a></li>";
	} else {
		echo "<li>	<a href=''><i class='icon-step-forward'></i></a></li><li><a href=''> <i class='icon-fast-forward'></i></a></li>";
	}

}

function combo_jeniskas($kode) {
	echo "<option value='' selected>- Pilih Jenis Kas -</option>";
	$query = query("SELECT id_jeniskas,namajeniskas   FROM tbljeniskas");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_kasmasuk($kode) {
	echo "<option value='' selected>- Pilih Jenis Kas Masuk-</option>";
	$query = query("SELECT id_kasmasuk,nama  FROM tblkasmasuk");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_kaskeluar($kode) {
	echo "<option value='' selected>- Pilih Jenis Kas Keluar-</option>";
	$query = query("SELECT id_kaskeluar,nama  FROM tblkaskeluar");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function get_today() {
	$today = date("Y-m-d");
	return $today;
}

function format_rupiah($rp) {
	$hasil = "<b>Rp." . number_format($rp, 0, "", ".") . ",00</b>";
	return $hasil;
}

function num_rows($qry) {
	$tmp = query($qry);
	$jum = mysql_num_rows($tmp);
	return $jum;
}

function valid($tmp) {
	return htmlentities(addslashes($tmp));
}

//fungsi untuk meremove koma didepan dan dibelakang
function rm_koma($data) {
	$ret = substr($data, 0, -1);

	return $ret;
}



function combo_hari($kode) {
	echo "<option value='0' selected>-  hari -</option>";
	$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
	foreach($hari as $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}

function combo_bulan($kode) {
	echo "<option value='' selected>Bulan</option>";
	$hari = array('Januari', 'Febuari', 'maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	foreach($hari as $key => $value) {
		if($kode == "")
			echo "<option value='$key'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$key'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function combo_tahun($kode) {
	echo "<option value='' selected>Tahun</option>";
	$tahun = array('2006', '2007', '2008','2009', '2010', '2011');
	foreach($tahun as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function konversi_bulan($bln) {
	switch($bln) {
		case "1" :

		case "01" :
			$bulan = "Januari";
			break;
		case "2" :

		case "02" :
			$bulan = "Februari";
			break;
		case "3" :

		case "03" :
			$bulan = "Maret";
			break;
		case "4" :

		case "04" :
			$bulan = "April";
			break;
		case "5" :

		case "05" :
			$bulan = "Mei";
			break;
		case "6" :

		case "06" :
			$bulan = "Juni";
			break;
		case "7" :

		case "07" :
			$bulan = "Juli";
			break;
		case "8" :

		case "08" :
			$bulan = "Agustus";
			break;
		case "9" :

		case "09" :
			$bulan = "September";
			break;
		case "10" :
			$bulan = "Oktober";
			break;
		case "11" :
			$bulan = "November";
			break;
		case "12" :
			$bulan = "Desember";
			break;
		default :
			$bulan = "Nooooooot..!!";
	}
	return $bulan;
}

function konversi_tanggal($time) {
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time) {
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

function selected($t1, $t2) {
	if(trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function get_date($tgl = '') {
	if($tgl == "")
		$now = date("d");
	else
		$now = $tgl;
	$jum_hr = date("t");
	for($i = 1; $i <= $jum_hr; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">$i</option>";
	}
}

function get_month($bln = '') {
	if($bln == "")
		$now = date("m");
	else
		$now = $bln;
	$jum_bl = 12;
	for($i = 1; $i <= $jum_bl; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">" . konversi_bulan($i) . "</option>";
	}
}

function get_year($thn = '') {
	if($thn == "") {
		$now = date("Y");
		$thn = date("Y");
	} else {
		$now = date("Y");
		$thn = $thn;
	}
	$jum_th = 3;
	for($i = 1; $i <= $jum_th; $i++) {
		echo "<option value='$now' " . selected($thn, $now) . ">" . $now . "</option>";
		$now--;
	}
}?>
