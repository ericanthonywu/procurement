<?php
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
?>
<td width="60%" colspan="3"><strong>Subtotal</strong></td>
<td width="10%"><p id="totalqty" style="font-weight:700;text-align:center;">
        <?php
        $sql_sub = mysqli_query($procurement,"select
			sum(jumlah) as subtotal,
			sum(harga_beli) as total_harga_asli,
			sum(subtotal) as total
		from
			detail_order
		where
			inv = '$kode'");
        $re_sub = mysqli_fetch_array($sql_sub);
        echo $re_sub['subtotal'];
        ?>
        <input type="hidden" name="subtotal" id="subtotal" value="<?=$re_sub['subtotal']?>">
		<input type="hidden" name="total_harga_asli" id="total_harga_asli" value="<?=$re_sub['total_harga_asli']?>">
    </p></td>
<td width="30%">
    <p style="font-weight:700;">Rp<span id="totalharga"> <?php
            echo $re_sub['total'];
            ?></span></p>
    <input type="hidden" name="totalPrice" id="totalPrice" value="<?=$re_sub['total']?>">
</td>