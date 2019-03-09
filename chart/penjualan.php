<?
session_start();
require_once('../class/connection.php');
$toko = $_SESSION['token_toko'];

if(isset($_GET['hari'])){
	$hari = $_GET['hari'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_report WHERE tanggal = '$hari' AND toko = '$toko'");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_produk": "' . $row['total_produk'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
elseif(isset($_GET['dari'])){
	$dari = $_GET['dari'];
	$sampai = $_GET['sampai'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_report WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko = '$toko'");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_produk": "' . $row['total_produk'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
elseif(isset($_GET['bulan'])){
	$bulan = $_GET['bulan'];
	$tahun = $_GET['tahun'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_report WHERE bulan ='$bulan' AND tahun = '$tahun' AND toko='$toko'");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_produk": "' . $row['total_produk'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
elseif(isset($_GET['tahun'])){
	$tahun = $_GET['tahun'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_report WHERE tahun = '$tahun' AND toko='$toko'");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_produk": "' . $row['total_produk'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}else{
	$bulan=date('m');
	$tahun=date('Y');
	$sql= mysqli_query($procurement,"SELECT * FROM v_report WHERE bulan ='$bulan' AND tahun = '$tahun' AND toko='$toko'");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_produk": "' . $row['total_produk'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
?>