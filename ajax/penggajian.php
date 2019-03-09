<?php
require_once "../class/connection.php";
session_start();
if(isset($_SESSION['token_procurement'])){
	$tanggal = date("Y-m-d");
    error_reporting(0);
    $toko = $_SESSION['token_toko'];
    $karyawans = $_POST['karyawan'];
    $explode1 = explode("-",$karyawans);
    $karyawan = $explode1[1];
    $karyawann = $explode1[0];
    $tgl = $_POST['tgl'];

    $meledak = explode("-",$tgl);
    $tahun = $meledak[0];
    $bulan = $meledak[1];

    $total_transaksi = 0;
    $total_produk = 0;
    $total_leads = 0;
    $bonus_rating_order=0;
    $bonus_sales=0;
    $bonus_rating_konversi=0;
    $bonusnya=0;
    $total_produk_sql3=0;

    $sql_leads = mysqli_query($procurement,"SELECT * FROM v_ads WHERE created_by = '$karyawan' AND MONTH(created_date) = $bulan AND YEAR(created_date) = $tahun AND toko = $toko") or die(mysqli_error()." sqlleads");
    $data_leads = mysqli_fetch_array($sql_leads);
    $wa = $data_leads['total_wa'];
    $email = $data_leads['total_email'];
    $total_leads = $wa + $email;

    $sql_bonus_sales = mysqli_query($procurement,"SELECT * FROM reward WHERE jenis_reward = 'Sales dari Iklan'");
    $data_bonus_sales = mysqli_fetch_array($sql_bonus_sales);
    $bonus_iklansales = $data_bonus_sales['bonus'];
    $bonus_sales_iklansales = $data_bonus_sales['bonus_sales'];

    $sql_bonus_konversi = mysqli_query($procurement,"SELECT * FROM reward WHERE jenis_reward = 'Rating Konversi >= 30%'");
    $data_bonus_konversi = mysqli_fetch_array($sql_bonus_konversi);
    $bonus_konversi = $data_bonus_konversi['bonus'];
    $bonus_sales_konversi = $data_bonus_konversi['bonus_sales'];
	
	$sql_bonus_order = mysqli_query($procurement,"SELECT * FROM reward WHERE jenis_reward = 'Rating Order >= 1,5'");
    $data_bonus_order = mysqli_fetch_array($sql_bonus_order);
    $bonus_rating_ordernya = $data_bonus_order['bonus'];
    $bonus_rating_orders = $data_bonus_order['bonus_sales'];

	// $sql_bonus = mysqli_query("SELECT * FROM bonus WHERE cs='$karyawann' AND MONTH(tanggal) = $bulan AND YEAR(tanggal)=$tahun AND toko = $toko");
	// $data_bonus = mysqli_query("");
    $sql1 = mysqli_query($procurement,"SELECT count(id) as total_transaksi FROM orders WHERE cs = '$karyawan' AND MONTH(tanggal) = $bulan AND YEAR(tanggal)=$tahun AND toko = $toko");
    $re_sql1 = mysqli_fetch_array($sql1);
    $total_transaksi_sql1 = $re_sql1['total_transaksi'];

    $sql2 = mysqli_query($procurement,"SELECT * FROM orders WHERE cs = '$karyawan' AND MONTH(tanggal) = $bulan AND YEAR(tanggal)=$tahun AND toko =$toko");
    while($re_sql2 = mysqli_fetch_array($sql2)) {
        $inv = $re_sql2['inv'];
        $total_transaksi = $total_transaksi + $total_transaksi_sql1;

        $sql3 = mysqli_query($procurement,"SELECT SUM(jumlah) as total_produk FROM detail_order WHERE inv = '$inv' AND toko =$toko");
        while($re_sql3 = mysqli_fetch_array($sql3)){
            $total_produk_sql3 = $total_produk_sql3+$re_sql3['total_produk'];
        }
    }
    $rating_konversi = $total_transaksi / $total_leads;
    $rating_order = $total_transaksi / $total_produk_sql3;
    if ($total_produk_sql3 <= 149) {
        if ($rating_order >= 1.5) {
            $bonus_rating_order = $bonus_rating_orders;
        }
        $bonus_sales = $total_produk_sql3 * $bonus_iklansales;
        if ($rating_konversi >= 30 / 100) {
            $bonus_rating_konversi = $bonus_konversi;
        }
        $bonusnya = $bonus_rating_order + $bonus_sales + $bonus_rating_konversi;
    } else {
        if ($rating_order >= 1.5) {
            $bonus_rating_order = $bonus_rating_ordernya;
        }
        $bonus_sales = $total_produk_sql3 * $bonus_sales_iklansales;
        if ($rating_konversi >= 30 / 100) {
            $bonus_rating_konversi = $bonus_sales_konversi;
        }
        $bonusnya = $bonus_rating_order + $bonus_sales + $bonus_rating_konversi;
		//mysqli_query("INSERT INTO bonus SET tanggal= '$tgl',karyawan = '$karyawann', bonus_order = '$bonus_rating_order', bonus_sales = '$bonus_sales', bonus_konversi = '$bonus_rating_konversi', created_by = '$karyawan', created_date='$tanggal'");
    }
	echo $bonus_rating_order.",".$bonus_sales.",".$bonus_rating_konversi.",".$bonusnya;
}