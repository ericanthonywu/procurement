<?
require_once "class/connection.php";
if(isset($_SESSION['token_procurement'])){
    $perbarui = $_GET['penggajian'];
    $toko = $_SESSION['token_toko'];
    $sql = mysqli_query($procurement,"select * from gaji where id = '$perbarui' and toko = '$toko'");
    $re = mysqli_fetch_array($sql);
    ?>
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-wallet font-dark"></i>
                        <span class="caption-subject bold uppercase">Penggajian</span>
                    </div>
                    <div class="tools">
                        <button onclick="window.location.href='<?=$url?>penggajian'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form method="POST" class="horizontal-form" autocomplete="off">
                        <input type="hidden" name="id" value="<?=$perbarui?>">
                        <div class="form-body">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Nama Karyawan</label>
                                                <select title="" id="pilih_karyawan" name="karyawan" class="form-control" required>
                                                    <?
                                                    $getSpesialis = mysqli_query($procurement,"
                                                SELECT
                                                    *
                                                FROM
                                                    auth
                                                WHERE
                                                    lv != '1'
                                                AND
                                                    toko = '$toko'
                                                ");
                                                    echo "<option value='' SELECTED>Pilih Karyawan</option>";
                                                    while($dtspesialis = mysqli_fetch_array($getSpesialis)){
                                                        if($dtspesialis['lv']==2){
                                                            $lv = "Admin";
                                                        }
                                                        if($dtspesialis['lv']==3){
                                                            $lv = "Advertiser";
                                                        }
                                                        if($dtspesialis['lv']==4){
                                                            $lv = "Customer Service";
                                                        }
                                                        $selected = '';
                                                        if($re['karyawan'] == $dtspesialis['id']){
                                                            $selected = 'selected';
                                                        }
                                                        echo "<option value='$dtspesialis[id]-$dtspesialis[username]' $selected>$lv - $dtspesialis[nama]</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <span class="help-block small">Edit Karyawan</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Gajian</label>
                                                <input title="" type="text" class="form-control" value="<?=$re['tanggal']?>" readonly id="tanggal_gajian" data-date-end-date="+0" name="tanggal" required>
                                                <span class="help-block small">Edit Tanggal Gajian</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">SLIP GAJI</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                $tgl = $re['tanggal'];
                                                $explodetgl = explode("-",$tgl);
                                                $getbulan = $explodetgl[1];
                                                $bulan = '';
                                                if($getbulan == 1){
                                                    $bulan = 'Jan';
                                                }else if($getbulan == 2){
                                                    $bulan = 'Feb';
                                                }else if($getbulan == 3){
                                                    $bulan = 'Mar';
                                                }else if($getbulan == 4){
                                                    $bulan = 'Apr';
                                                }else if($getbulan == 5){
                                                    $bulan = 'Mei';
                                                }else if($getbulan == 6){
                                                    $bulan = 'Jun';
                                                }else if($getbulan == 7){
                                                    $bulan = 'Jul';
                                                }else if($getbulan == 8){
                                                    $bulan = 'Agt';
                                                }else if($getbulan == 9){
                                                    $bulan = 'Sep';
                                                }else if($getbulan == 10){
                                                    $bulan = 'Okt';
                                                }else if($getbulan == 11){
                                                    $bulan = 'Nov';
                                                }else if($getbulan == 12){
                                                    $bulan = 'Des';
                                                }
                                                $tahun = $explodetgl[0];
                                                ?>
                                                <label class="control-label"><?=$bulan." ".$tahun?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">TOTAL SALES ITEM</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <b><label class="control-label" id="totalsalesitem"></label></b>
                                                <input type="hidden" name="totalsalesitem" id="valtotalsalesitem">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-money"></i> Penerimaan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Gaji Pokok</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" name="gajipokok" id="gajipokok" value="<?=$re['gaji_pokok']?>" title="" class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Gaji Pokok</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Uang Makan</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" name="uangmakan" value="<?=$re['uang_makan']?>" id="uangmakan" title="" class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Uang Makan</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Tunjangan</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" name="tunjangan" value="<?=$re['tunjangan']?>" id="tunjangan" title="" class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Tunjangan</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Total Bonus</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" value="<?=$re['totalbonus']?>" id="totalbonus"  name="totalbonus" title="" readonly class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Bonus</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Minus / Plus Ongkir</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" id="minusplusongkir" value="<?=$re['ongkir']?>" name="minplusongkir" title="" class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Minus / Plus Ongkir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet box red">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-money"></i> Potongan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Sanksi</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" name="sanksi" value="<?=$re['sanksi']?>" id="sanksi" title="" class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Sanksi</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Pinjaman</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"> Rp. </div>
                                                    <input type="text" name="pinjaman" id="pinjaman" value="<?=$re['pinjaman']?>" title="" class="form-control regexnumber">
                                                </div>
                                                <span class="help-block small">Edit Pinjaman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Total Penerimaan</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"> Rp. </div>
                                            <span class="form-control" id="totalpenerimaan"></span>
                                            <input type="hidden" id="valtotalpenerimaan" name="valtotalpenerimaan" title="" class="form-control">
                                        </div>
                                        <span class="help-block small">Total Penerimaan</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Total Potongan</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"> Rp. </div>
                                            <span class="form-control" id="totalpotongan"></span>
                                            <input type="hidden" id="valtotalpotongan" name="valtotalpotongan" title="" class="form-control">
                                        </div>
                                        <span class="help-block small">Total Potongan</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                    <div class="dashboard-stat2 text-center">
                                        <h1>GAJI BERSIH </h1>
                                    </div>
                                </div>
                                <div class="col-md-6 bold">
                                    <div class="dashboard-stat2 text-center" style="border: 1px solid black">
                                        <h1>Rp. <span id="gajibersih"></span></h1>
                                        <input type="hidden" name="valgajibersih" id="valgajibersih">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="reset" class="btn default tooltips" data-container="body" data-placement="top" data-original-title="Ulangi"><i class="icon-refresh"></i></button>
                            <button name="perbarui-penggajian" class="btn blue tooltips" data-container="body" data-placement="top" data-original-title="Simpan">
                                <i class="fa fa-check"></i></button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
    <?
}else{
    echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>