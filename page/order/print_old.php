<?
if(isset($_SESSION['token_procurement'])){
?>
<div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet-body">
                    <?
                    $sql_order = mysqli_query($procurement,"select * from v_order where toko = '$toko'")or die(mysqli_error());
                    $x=0;
                    while($data_order = mysqli_fetch_array($sql_order)){
                        $x=$x+1;
                        $kepada = $data_order['kepada'];
                        $sql_kepada = mysqli_query($procurement,"SELECT * FROM customer WHERE id = '$kepada' AND toko ='$toko'");
                        $data_kepada = mysqli_fetch_array($sql_kepada);
                        ?>
                        <div class="invoice-content-2 bordered" id="invoice<?=$x?>">
                            <div class="row invoice-head">
                                <div class="col-md-3">
                                    <p class="h4" style="margin-top:0;"><a><?=$data_order['inv']?></a>
                                    </p>
                                    <small>Pemesan</small>
                                    <p><span class="customer-pop tooltips" style="cursor: pointer;" data-original-title="
                                            Alamat
											<?=$data_order['alamat_pemesan']?>,<?=$data_order['kecamatan_pemesan']?>,<?=$data_order['prov_pemesan']?>
												Kode Pos <?=$data_order['kode_pos_pemesan']?>
												<?
                                        if(isset($data_order['bbm_pemesan'])) {
                                            ?>
												BBM: <?= $data_order['bbm_pemesan'] ?>
												<?
                                        }
                                        if(isset($data_order['line_pemesan'])){
                                            ?>
										        LINE: <?=$data_order['line_pemesan']?>
										        <?
                                        }
                                        if(isset($data_order['notelp_pemesan'])) {
                                            ?>
										        Phone: <?= $data_order['telp_pemesan'] ?>
										        <?
                                        }
                                        ?>
											" title="">
											<strong><?=$data_order['nama_pemesan']?></strong><br></span></p>
                                    <small>Dikirim kepada</small><br>
                                    <p><span class="customer-pop tooltips" style="cursor: pointer;" data-original-title="
											Alamat
											<?=$data_kepada['alamat']?>,<?=$data_kepada['nama_kecamatan']?>,<?=$data_kepada['nama_prov']?>
												Kode Pos <?=$data_kepada['kode_pos']?>
												BBM: <?=$data_kepada['bbm']?>
										        LINE: <?=$data_kepada['line']?>
										        Phone: <?=$data_kepada['hp']?>
											" title="">
											<strong><?=$data_kepada['nama']?></strong></span></p>
                                    <p><small style="color:rgba(0,0,0,.35)">Tgl pemesanan</small><br><?=TanggalIndo($data_order['created_date'])?></p>
                                </div>

                                <div class="col-md-3">
                                    <p class="order-items"><small>Barang</small><br>

                                    </p>


                                    <div id="stagihan13671276" class="alert alert-danger">

                                        <a href="#responsivee"  data-toggle="modal" class="btn btn-xs btn-success sudahBayar pull-right" id="13671276-634-S"><span class="fa fa-check-circle"></span> Bayar</a>
                                        <div id="responsivee" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Pembayaran PO#634</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4>Tanggal Pembayaran</h4>
                                                                    <p>
                                                                        <input type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" class="col-md-12 form-control"> </p><br>
                                                                    <h4>Bank Pembayaran</h4>
                                                                    <p>
                                                                        <select name="pil_bank_modal" title="" class="form-control">
                                                                            <option value="">Pilih Bank</option>
                                                                            <option value="mandiri">Mandiri</option>
                                                                            <option value="BNI">BNI</option>
                                                                            <option value="BRI">BRI</option>
                                                                            <option value="CIMBNIAGA">CIMB NIAGA</option>
                                                                            <option value="BCA">BCA</option>
                                                                            <option value="CASH">Cash/Tunai</option>
                                                                        </select>
                                                                    </p>
                                                                    <h4 class="cicilan_modal" style="display: none">Nominal</h4>
                                                                    <p class="cicilan_modal" style="display: none;"><input type="number" name="nominal_modal" class="form-control" title=""><span class="help-block small">Nominal Cicilan</span> </p>
                                                                </div>
                                                                <div class="col-md-4 pull-right">
                                                                    <h4>Aktifkan Cicilan</h4>
                                                                    <p><input type="checkbox" id="cicilan_modal" class="checkbox checked"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                        <button type="button" class="btn green">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p><small>Tagihan</small><br>



                                        </p><h3 class="bold"><span class="fa fa-ban"></span> Rp829.535</h3>
                                        <br>

                                        <p></p>

                                    </div>
                                </div>
                                <style>
                                    .statustransaksi{
                                        border-radius: 50%;border: 2px solid #ddd;display: inline-block
                                    }
                                    .statustransaksi i{
                                        color: #ddd;
                                    }
                                    .statustransaksi .active{
                                        color: black;
                                    }
                                </style>
                                <div class="col-md-3">
                                    <p class="mbtm-10"><small>Status Transaksi</small></p>  <div class="tr-status">
                                        <ul>
                                            <li class="statustransaksi tooltips" data-original-title="Belum Bayar"><i class="fa fa-dollar active"></i></li>
                                            <li class="statustransaksi tooltips" data-original-title="Belum Diproses"><i class="fa fa-archive"></i></li>
                                            <li class="statustransaksi tooltips" data-original-title="Belum Dikirim"><i class="fa fa-truck"></i></li>
                                            <li class="statustransaksi tooltips" data-original-title="Truck-onprocess"><i class="flaticon-deliverytruck"></i> </li>
                                            <li class="statustransaksi tooltips" data-original-title="Package Delivered"></li>
                                        </ul>
                                    </div>
                                    <p class="mbtm-10"><small>Expedisi</small></p>
                                    <span class="label label-gray-blank"></span>
                                    <img src="https://app.ngorder.id/assets/img/jne.png " style="margin-right:10px;" class="tooltips" data-toggle="tooltip" title="" data-original-title="JNE-OKE">
                                    <p class="mtop-20"><small>No. Resi</small>
                                    </p>
                                </div>

                                <div class="col-md-2">
                                    <p class="mbtm-10"><small>Note</small></p>
                                    <span class="fa fa-envelope" style="font-size:24px;color: rgba(0,0,0,.35)"></span>
                                </div>
                                <style>
                                    .edit-inv{
                                        transition: .5s;
                                        cursor: pointer;
                                    }
                                    .edit-inv:hover{
                                        color: red;
                                    }
                                </style>
                                <div class="col-md-1">
                                    <i class="icon-note edit-inv tooltips" data-original-title="Edit"></i>
                                    <a href="<?=$url?>order/hapus-order/<?=$data_order['id']?>"><i class="icon-close edit-inv tooltips" data-original-title="Cancel Order"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
                                    <?
                                    /*
                                    <a href="#print<?=$x?>" data-toggle="modal" class="btn btn-lg green-haze hidden-print uppercase print-btn">Print</a>
                                    */
                                    ?>
                                    ?>
                                    <div id="print<?=$x?>" class="modal fade" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" style="width: 1200px;">
                                            <div class="modal-content" style="height: 600px">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Pembayaran <?=$inv?></h4>
                                                </div>
                                                <div class="modal-body" style="height: 600px">
                                                    <div class="scroller" style="height:600px" data-always-visible="1" data-rail-visible1="1">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" data-id="dataprint<?=$x?>" class="btn btn-success btn-outline pull-right printinv">Print</button>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h4><b>Cetak</b></h4>
                                                                        <input type="radio" title="" checked id="shippinglabel">Shipping Label<br>
                                                                        <input type="radio" title="" id="shippinglabelv2">Shipping Label (v2)<br>
                                                                        <input type="radio" title="" id="invoice">Invoice<br>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h4><b>Pengaturan</b></h4>
                                                                        <input type="checkbox" title="" checked class="chk_detailorder">Detail Order<br>
                                                                        <input type="checkbox" title="" checked class="chk_fragilesign">Fragile Sign<br>
                                                                        <input type="checkbox" title="" checked class="chk_shoplogo">Shop Logo<br>
                                                                        <input type="checkbox" title="" checked class="chk_shopinfo">Shop info<br>
                                                                        <input type="checkbox" title="" checked class="chk_expedisi">Expedisi<br>
                                                                        <input type="checkbox" title="" checked class="chk_nopo">No. PO<br>
                                                                        <input type="checkbox" title="" checked class="chk_tanggalorder">Tanggal Order<br>
                                                                        <input type="checkbox" title="" checked class="chk_noresi">No Resi<br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                &nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div id="dataprint<?=$x?>" style="border: 1px solid black">
                                                                <div class="col-md-4">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-responsive">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Kepada:</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <?=$kepada?><br>
                                                                                    <?=$alamat_kepada?><br>
                                                                                    Kec. <?=$kecamatan_kepada?>,<?=$kodepos_kepada?><br>
                                                                                    Provinsi <?=$prov_kepada?><br>
                                                                                    Telp : <?=$notelp_kepada?><br>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table><br>
                                                                        <table class="table table-responsive">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Pengirim:</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <?=$pengirim?><br>
                                                                                    <?=$notelp_pengirim?>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-responsive detailorder">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Order <span class="print_invoice"><?=$inv?></span><span class="tgl_print">(<?=$tanggal?>)</span></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table><br>
                                                                        <table border="0" class="table table-responsive expedisis">
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div style="display: inline;border: 1px solid black;width: fit-content;padding: 10px">
                                                                                        <?=strtoupper($expedisi)?>-<?=$paket?> (<?=$berat?>KG)
                                                                                    </div>&nbsp;
                                                                                    <div class="print_noresi" style="display: inline;border: 1px solid black;width: fit-content;padding: 10px">
                                                                                        NO RESI : <?=$no_resi?>
                                                                                    </div></td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="table-responsive fragile" >
                                                                        <table style="border-left: 2px solid black">
                                                                            <tr>
                                                                                <td>
                                                                                    <CENTER><img class="img" src="https://app.ngorder.id/assets/img/fragile.png " alt=""></CENTER>
                                                                                    <h1><CENTER>FRAGILE</CENTER></h1>
                                                                                    <H3><CENTER>JANGAN DIBANTING!!!</CENTER></H3>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
<?
}else{
    echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>