<?
if(isset($_SESSION['token_procurement'])){
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Kategori Produk</label>
                                        <input type="text" id="kategoriproduk" name="kategoriproduk" class="form-control" required>
                                        <span class="help-block small">Masukkan kategori produk</span>
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
                            <button name="simpan-kategori-produk" class="btn blue">
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