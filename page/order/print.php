<?
if(isset($_SESSION['token_procurement'])) {
    $toko = $_SESSION['token_toko'];
    $po = $_GET['order'];
    $sql = mysqli_query($procurement,"select * from v_order where inv='$po' and toko ='$toko'");
    $data_order =mysqli_fetch_array($sql);
    ?>
    <div class="invoice-content-2 bordered">
        <div class="row invoice-head">
            <div class="col-md-7 col-xs-6">
                <div class="invoice-logo">
                    <h1 class="uppercase">Invoice <?=$data_order['inv']?></h1>
                </div>
            </div>
        </div>
        <div class="row invoice-cust-add">
            <div class="col-xs-3">
                <h2 class="invoice-title uppercase">Customer</h2>
                <p class="invoice-desc"><?=$data_order['nama_pemesan']?></p>
            </div>
            <div class="col-xs-3">
                <h2 class="invoice-title uppercase">Date</h2>
                <p class="invoice-desc"><?= TanggalIndo($data_order['tanggal_order']) ?></p>
            </div>
            <div class="col-xs-6">
                <h2 class="invoice-title uppercase">Address</h2>
                <p class="invoice-desc inv-address"><?=$data_order['alamat_pemesan'].", ".$data_order['kota_pemesan'].", ".$data_order['kecamatan_pemesan'].", ".$data_order['kode_pos_pemesan']?></p>
            </div>
        </div>
        <div class="row invoice-body">
            <div class="col-xs-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="invoice-title uppercase text-center">Expedisi</th>
                        <th class="invoice-title uppercase text-center">Paket</th>
                        <th class="invoice-title uppercase text-center">Berat</th>
                        <th class="invoice-title uppercase text-center">Total</th>
                        <th class="invoice-title uppercase text-center">Catatan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center sbold"><?= strtoupper($data_order['ekspedisi_order'])?></td>
                        <td class="text-center sbold"><?=$data_order['paket_order']?></td>
                        <td class="text-center sbold"><?=$data_order['berat_order']?> Kg</td>
                        <td class="text-center sbold">Rp. <?=number_format($data_order['ongkir_order'])?></td>
                        <td>
                            <?=$data_order['note_order']?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row invoice-subtotal">
            <div class="col-xs-3">
                <h2 class="invoice-title uppercase">Asuransi</h2>
                <p class="invoice-desc">
                    <?php
                    if(!empty($data_order['asuransi_order'])) {
                        echo"Rp. ".number_format($data_order['asuransi_order']);
                    }else{
                        echo "Rp. -";
                    }
                    ?>
                </p>
                <span class="help-block small"><?=$data_order['keterangan_order']?></span>
            </div>
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">Diskon Order</h2>
                    <p class="invoice-desc">
                        <?php
                        if(!empty($data_order['diskon_order'])) {
                        echo"Rp. ".number_format($data_order['diskon_order']);
                        }else{
                            echo "Rp. -";
                        }
                        ?>
                    </p>
                </div>
            <div class="col-xs-6">
                <h2 class="invoice-title uppercase">Total</h2>
                <p class="invoice-desc grand-total">Rp. <?=number_format($data_order['totalorder'])?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="https://s2.bukalapak.com/img/7469203562/w-1000/Sticker_Fragile_Stiker_Awas_Barang_Pecah_Belah_DIE_CUT.png" class="logo-image" width="43%">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
            </div>
        </div>
    </div>
    <?
}
?>