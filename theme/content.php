<?
	if(isset($_GET['halaman'])){
		$modul=$_GET['halaman'];
		switch($modul){
			case 'dashboard':
				require_once('page/dashboard/procurement.php');
			break;
			case 'bonus':
				require_once('page/bonus/procurement.php');
			break;
			case 'sanksi':
				require_once('page/sanksi/procurement.php');
			break;
			case 'order':
				require_once('page/order/procurement.php');
			break;
			case 'produk':
				require_once('page/produk/procurement.php');
			break;
			case 'jenis-produk':
				require_once('page/jenisproduk/procurement.php');
			break;
			case 'kategori-produk':
				require_once('page/kategoriproduk/procurement.php');
			break;
			case 'expenses':
				require_once('page/expenses/procurement.php');
			break;
			case 'customer':
				require_once('page/customer/procurement.php');
			break;
			case 'report':
				require_once('page/report/procurement.php');
			break;
			case 'analyzer':
				require_once('page/analyzer/procurement.php');
			break;
			case 'addons':
				require_once('page/addons/procurement.php');
			break;
			case 'ads':
				require_once('page/ads/procurement.php');
			break;
			case 'penggajian':
				require_once('page/penggajian/procurement.php');
			break;
			case 'user':
				require_once('page/user/procurement.php');
			break;
			case 'toko':
				require_once('page/toko/procurement.php');
			break;
			case 'supplier':
				require_once('page/supplier/procurement.php');
			break;
			case 'bank':
				require_once('page/bank/procurement.php');
			break;
			case 'punishment':
				require_once('page/punishment/procurement.php');
			break;
			case 'reward':
				require_once('page/reward/procurement.php');
			break;
			case 'not-found':
				require_once('page/not-found.php');
			break;
		}
	}elseif(isset($_GET['session'])){
		$modul=$_GET['session'];
		switch($modul){
			case 'auth':
				require_once('page/auth/procurement.php');
			break;
			case 'profile':
				require_once('page/auth/profile.php');
			break;
		}
	}
?>