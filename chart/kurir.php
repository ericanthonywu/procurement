<?
session_start();
require_once('../class/connection.php');
$toko = $_SESSION['token_toko'];

if(isset($_GET['hari'])){
	$hari = $_GET['hari'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_kurir WHERE tanggal = '$hari' AND toko = '$toko' GROUP BY expedisi");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_ongkir": "' . $row['total_ongkir'] . '",' . "";
	  echo '  "expedisi": "' . $row['expedisi'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
elseif(isset($_GET['dari'])){
	$dari = $_GET['dari'];
	$sampai = $_GET['sampai'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_kurir WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko = '$toko' GROUP BY expedisi");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_ongkir": "' . $row['total_ongkir'] . '",' . "";
	  echo '  "expedisi": "' . $row['expedisi'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
elseif(isset($_GET['bulan'])){
	$bulan = $_GET['bulan'];
	$tahun = $_GET['tahun'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_kurir WHERE bulan ='$bulan' AND tahun = '$tahun' AND toko='$toko' GROUP BY expedisi");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_ongkir": "' . $row['total_ongkir'] . '",' . "";
	  echo '  "expedisi": "' . $row['expedisi'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
elseif(isset($_GET['tahun'])){
	$tahun = $_GET['tahun'];
	$sql = mysqli_query($procurement,"SELECT * FROM v_kurir WHERE tahun = '$tahun' AND toko='$toko' GROUP BY expedisi");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_ongkir": "' . $row['total_ongkir'] . '",' . "";
	  echo '  "expedisi": "' . $row['expedisi'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}else{
	$bulan=date('m');
	$tahun=date('Y');
	$sql= mysqli_query($procurement,"SELECT * FROM v_kurir WHERE bulan ='$bulan' AND tahun = '$tahun' AND toko='$toko' GROUP BY expedisi");
	$prefix = '';
	echo "[";
	while($row = mysqli_fetch_assoc($sql)){
	  echo $prefix . " {";
	  echo '  "total_ongkir": "' . $row['total_ongkir'] . '",' . "";
	  echo '  "expedisi": "' . $row['expedisi'] . '",' . "";
	  echo '  "hari": ' . $row['hari'] . '' . "";
	  echo " }";
	  $prefix = ",";
	}
	echo "]";
}
?>