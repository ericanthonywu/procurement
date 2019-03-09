<?
if(isset($_SESSION['token_procurement'])){
    $toko = $_SESSION['token_toko'];
    ?>
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="flaticon-007-customer font-dark"></i>
                        <span class="caption-subject bold uppercase">kategori-produk</span>
                    </div>
                    <div class="tools">
                        <button onclick="window.location.href='<?=$url?>kategori-produk'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form method="post" autocomplete="off" class="horizontal-form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Karyawan</label>
                                        <select title="" name="karyawan" id="karyawan" class="form-control">
                                            <?php
                                            $sql_customer = mysqli_query($procurement,"select * from auth WHERE toko ='$toko' AND lv='4'")or die(mysqli_error());
                                            echo "<option value='' selected>Pilih karyawan</option>";
                                            while($re_customer = mysqli_fetch_array($sql_customer)){
                                                echo "<option value='$re_customer[id]'>$re_customer[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block small">Masukkan karyawan</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Punishment</label>
                                        <select title="" name="punishment" id="punishment" class="form-control">
                                            <option value="" selected>Pilih Punishment</option>
                                            <?php
                                            $sql_punishment = mysqli_query($procurement,"select * from punishment where toko = '$toko'");
                                            while($re_punishment = mysqli_fetch_array($sql_punishment)){
                                                $sanksi =  number_format($re_punishment['sanksi']);
                                                $jumlahwaktusanksis = $re_punishment['jumlahwaktusanksi'];
                                                $satuanwaktu = $re_punishment['satuanwaktu'];
                                                if($jumlahwaktusanksis == 1){
                                                    $jumlahwaktusanksis = "";
                                                }else{
                                                    $jumlahwaktusanksi = $jumlahwaktusanksis;
                                                }
                                                echo "<option value='$re_punishment[id]-$sanksi'>$re_punishment[keterangan] - Rp. $sanksi / $jumlahwaktusanksi $satuanwaktu</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block small">Masukkan punishment</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Waktu</label>
                                        <div class="input-group">
                                            <input title="" type="text" id="waktu" name="waktu" class="form-control regexnumber" value="0" required>
                                            <div class="input-group-addon" id="satuan"></div>
                                        </div>
                                        <span class="help-block small">Masukkan Waktu</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Nominal</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Rp. </div>
                                            <input title="" type="text" id="nominal" name="nominal" value="0" readonly class="form-control regexnumber" required>
                                        </div>
                                        <span class="help-block small">Masukkan nominal</span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions right">
                            <button type="reset" class="btn default">
                                <i class="icon-refresh"></i>
                            </button>
                            <button name="simpan-sanksikaryawan" class="btn blue">
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