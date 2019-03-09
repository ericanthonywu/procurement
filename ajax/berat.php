<?php
session_start();
if(isset($_SESSION['token_procurement'])) {
    require_once('../class/connection.php');
    $query_kode=mysqli_query($procurement,"SELECT inv FROM orders ORDER BY id DESC LIMIT 1");
    $num_urut_kode = mysqli_num_rows($query_kode);
    $data_urut_kode = mysqli_fetch_array($query_kode);
    $thn=date('y');
    $bln=date('m');
    $awal_kode = substr($data_urut_kode['inv'],0-4);
    $next_kode = (int)$awal_kode + 1;
    $jnim_kode = strlen($next_kode);
    if (!$data_urut_kode['inv']){
        $no_kode = "0001";
    }
    elseif($jnim_kode == 1){
        $no_kode = "000";
    }
    elseif($jnim_kode == 2){
        $no_kode = "00";
    }
    elseif($jnim_kode == 3){
        $no_kode = "0";
    }
    elseif($jnim_kode == 4){
        $no_kode = "";
    }
    if ($num_urut_kode == 0){
        $kode = "PO-".$thn.$bln.$no_kode;
    }
    else{
        $kode = "PO-".$thn.$bln.$no_kode.$next_kode;
    }
    if($query_kode === FALSE) {
        die(mysqli_error($procurement)); // TODO: better error handling
    }
    //cek
    $totalberat = 0;
    $sqlmuncul = mysqli_query($procurement,"select * from detail_order where inv = '$kode'");
    while($reproduk = mysqli_fetch_array($sqlmuncul)) {
        $produkmuncul = $reproduk['produk'];
        $jumlah = $reproduk['jumlah'];
        $sql_cekproduk = mysqli_query($procurement,"select * from produk where id = '$produkmuncul'") or die(mysqli_error());
        $re_cekproduk = mysqli_fetch_array($sql_cekproduk);
        $produk = $re_cekproduk['nama'];
        $berat = $re_cekproduk['berat'];
        $totalberat = (int)$totalberat+(int)$berat*(int)$jumlah;
		// echo $berat;
		echo $totalberat;
    }
}
?>
