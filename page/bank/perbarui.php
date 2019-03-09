<?
if(isset($_SESSION['token_procurement'])){
    $id = $_GET['bank'];
    $toko = $_SESSION['token_toko'];
    $sql_bank = mysqli_query("select * from bank where id = '$id' and toko = '$toko'");
    $re_bank = mysqli_fetch_array($sql_bank);
    ?>
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="flaticon-007-customer font-dark"></i>
                        <span class="caption-subject bold uppercase">bank</span>
                    </div>
                    <div class="tools">
                        <button onclick="window.location.href='<?=$url?>bank'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form method="post" autocomplete="off" class="horizontal-form">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Rekening</label>
                                        <input type="text" id="rekening" name="rekening" value="<?=$re_bank['rekening']?>" class="form-control regexnumber" required>
                                        <span class="help-block small">Masukkan No Rekening</span>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-user" style="color: #0b94ea"></i>&nbsp;Nama</label>
                                        <input type="text" id="nama" name="nama" value="<?=$re_bank['nama']?>" class="form-control" required>
                                        <span class="help-block small">Masukkan Nama</span>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-bar" style="color: #0b94ea"></i>&nbsp;Bank</label>
                                        <select title="" class="form-control" id="bank" name="bank" required>
                                            <?php ?>
                                            <option value="" SELECTED>Pilih Bank</option>
                                            <option value="Mandiri" <?php if($re_bank['bank'] == "Mandiri") echo "selected"?>>Mandiri</option>
                                            <option value="BRI" <?php if($re_bank['bank'] == "BRI") echo "selected"?>>Bank Rakyat Indonesia</option>
                                            <option value="BCA" <?php if($re_bank['bank'] == "BCA") echo "selected"?>>Bank Central Asia</option>
                                            <option value="BNI" <?php if($re_bank['bank'] == "BNI") echo "selected"?>>Bank Negara Indonesia</option>
                                            <option value="CIMB_Niaga" <?php if($re_bank['bank'] == "CIMB_Niaga") echo "selected"?>>CIMB Niaga</option>
                                            <option value="Danamon" <?php if($re_bank['bank'] == "Danamon") echo "selected"?>>Danamon</option>
                                            <option value="Permata" <?php if($re_bank['bank'] == "Permata") echo "selected"?>>Permata</option>
                                            <option value="Panin" <?php if($re_bank['bank'] == "Panin") echo "selected"?>>Panin</option>
                                            <option value="BII" <?php if($re_bank['bank'] == "BII") echo "selected"?>>Bank Internasional Indonesia</option>
                                            <option value="BTN" <?php if($re_bank['bank'] == "BTN") echo "selected"?>>Bank Tabungan Negara</option>
                                        </select>
                                        <span class="help-block small">Pilih Bank</span>
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
                            <button name="perbarui-bank" class="btn blue">
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