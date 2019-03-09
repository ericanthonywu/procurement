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
					<span class="caption-subject bold uppercase">Punishment</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>punishment'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="post" autocomplete="off" class="horizontal-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" title=""></textarea>
                                    <span class="help-block small">Masukkan Keterangan</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Sanksi</label>
                                <input type="text" name="sanksi" id="sanksi" title="" class="form-control">
                                <span class="help-block small">Masukkan Sanksi</span>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Jumlah Waktu Sanksi</label>
                                <input type="text" name="waktusanksi" id="waktusanksi" title="" class="form-control regexnumber" value="1">
                                <span class="help-block small">Jumlah Waktu Sanksi (default : 1)</span>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Satuan Waktu</label>
                                <select name="satuanwaktu" id="satuanwaktu" title="" class="form-control">
                                    <option value="detik">Detik</option>
                                    <option value="menit">Menit</option>
                                    <option value="jam">Jam</option>
                                    <option value="hari">Hari</option>
                                    <option value="minggu">Minggu</option>
                                    <option value="bulan">Bulan</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                                <span class="help-block small">Satuan Waktu Sanksi (contoh: 20000 / hari atau 20000 / 2hari)</span>
                            </div>
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">
							<i class="icon-refresh"></i>
						</button>
						<button name="simpan-sanksi" class="btn blue">
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