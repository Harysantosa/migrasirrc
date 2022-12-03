div class="form-group">
                      <label for="exampleInputEmail1">Data Customer</label> <br><?php 
/**
 * Aplikasi Insentif
 * 
 * 
 * 
 * @author B.E.
 */
if (!isset($_GET['pg'])) {
	include 'dashboard.php';
} else {
	switch ($_GET['pg']) {
		case 'ppicform':
			include 'ppic_form.php';
			break;
			case 'harga':
			include 'harga.php';
			break;
			case 'sjpremixout':
			include 'sjpremixout.php';
			break;
		case 'ppic':
			include 'ppic.php';
			break;
			case 'sjpremix':
			include 'sjpremix.php';
			break;
			case 'verfwip':
			include 'verifikasiwip.php';
			break;
		case 'hutang':
			include 'hutang.php';
			break;
		case 'pembayaran_hutang':
			include 'rekap_pembayaran_hutang.php';
			break;
		case 'cetakppic':
			include 'cetak_ppic.php';
			break;
		case 'rekappiutang':
			include 'rekap_pembayaran_cust.php';
			break;
		case 'rekaphutang':
			include 'rekap_pembayaran_hutang.php';
			break;
		case 'pettycash':
			include 'pettycash.php';
			break;
	  case 'wip':
			include 'wip.php';
			break;
	   case 'verifikasifgout':
			include 'verifikasifgout.php';
			break;
	   case 'saldopettycash':
			include 'saldopettycash.php';
			break;
		case 'dashboard':
			include 'dashboard.php';
			break;
		case 'gudangfg':
			include 'gudangfg.php';
			break;
    	case 'admin':
			include 'admin.php';
			break;
		case 'produk':
			include 'produk.php';
			break;
		case 'daftarharga':
			include 'daftar_harga.php';
			break;
		case 'datavendor':
			include 'data_vendor.php';
			break;
		case 'penjualan':
			include 'penjualan.php';
			break;
		case 'lappj':
			include 'lap_penjualan.php';
			break;
		case 'cetak':
			include 'cetak_pdf.php';
			break;
		case 'datavendor':
			include 'data_vendor.php';
			break;
		case 'databarang':
			include 'data_barang.php';
			break;
		case 'planingprod':
			include 'planingprod.php';
			break;
		case 'dataprod':
			include 'data_produksi.php';
			break;
	   	case 'cust':
			include 'cust.php';
			break;
		case 'salesorder':
			include 'salesorder.php';
			break;
		case 'plastik':
			include 'plastik.php';
			break;
		case 'label':
			include 'label.php';
			break;
		case 'rm':
			include 'data_rawmaterial.php';
		case 'stokfg':
			include 'stok_fg.php';
			break;
		case 'stokrm':
			include 'stok_rm.php';
			break;
		case 'gudangrm':
			include 'gudangrm.php';
			break;
			case 'rmin':
			include 'rmin.php';
			break;
		case 'merek':
			include 'data_merek.php';
			break;
		case 'verifikasirm':
			include 'verifikasirm.php';
			break;
		case 'so':
			include 'so.php';
			break;
		case 'verifikasipo':
			include 'verifikasipo.php';
			break;
		case 'masuk':
			include 'dt_kasmasuk.php';
			break;
		case 'keluar':
			include 'dt_kaskeluar.php';
			break;
		case 'transkeluar':
			include 'dt_transkeluar.php';
			break;
		case 'transmasuk':
			include 'dt_transmasuk.php';
			break;
		case 'transaksi':
			include 'dt_transaksi.php';
			break;
		case 'piutang':
			include 'dt_piutang.php';
			break;
		case 'formula':
			include 'formula.php';
			break;
		case 'premix':
			include 'premix.php';
			break;
		case 'saldo':
			include 'saldo.php';
			break;
		case 'bank':
			include 'bank.php';
			break;
		case 'tambahcust':
			include 'tambah_cust.php';
			break;
		case 'verifikasipremix':
			include 'verifikasipremix.php';
			break;
		case 'inv':
			include 'inv.php';
			break;
		case 'rekap':
			include 'rekapsales.php';
			break;
		case 'ppic2':
			include 'ppic2.php';
			break;
		case 'notfound':
			include 'not_found.php';
			break;
		default:	        
	    	echo "<label>404 Halaman tidak ditemukan</label>";
	    break;
		
	}
}

?>