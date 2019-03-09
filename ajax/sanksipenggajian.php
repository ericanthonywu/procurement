<?php
require_once "../class/connection.php";
session_start();
if(isset($_SESSION['token_procurement'])){
    $karyawans = $_POST['karyawan'];
    $explode1 = explode("-",$karyawans);
    $karyawan = $explode1[0];

    $tgl = $_POST['tgl'];

    $meledak = explode("-",$tgl);
    $tahun = $meledak[0];
    $bulan = $meledak[1];

    $toko = $_SESSION['token_toko'];

    $sql_sanksi = mysqli_query($procurement,"select sum(nominal) as nominal from sanksi where MONTH(created_date)='$bulan' AND YEAR(created_date)='$tahun' AND toko = '$toko' and karyawan = '$karyawan'") or die(mysqli_error($procurement));
    $re_sanksi = mysqli_fetch_array($sql_sanksi);
    echo $re_sanksi['nominal'];
}
?>