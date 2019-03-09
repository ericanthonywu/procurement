<?
session_start();
require_once('../class/connection.php');
$toko = $_SESSION['token_toko'];
$bulan=date('m');
$tahun=date('Y');
$sql= mysqli_query($procurement,"SELECT * FROM v_dashboard WHERE bulan ='$bulan' AND tahun = '$tahun' AND toko='$toko'");
$prefix = '';
echo "[";
while($row = mysqli_fetch_assoc($sql)){
echo $prefix . " {";
echo '  "gross_profit": "' . $row['gross_profit'] . '",' . "";
echo '  "total_produk": "' . $row['total_produk'] . '",' . "";
echo '  "hari": "' . $row['hari'] . '"' . "";
echo " }";
$prefix = ",";
}
echo "]";
?>