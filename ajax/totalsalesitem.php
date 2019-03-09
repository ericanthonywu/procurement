<?php
require_once "../class/connection.php";
error_reporting(0);
session_start();
if(isset($_SESSION['token_procurement'])){
    $toko = $_SESSION['token_toko'];
    $karyawans = $_POST['karyawan'];
    $explode1 = explode("-",$karyawans);
    $karyawan = $explode1[1];
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
    echo $total_produk_sql3;
}