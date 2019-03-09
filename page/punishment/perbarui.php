<?
if(isset($_SESSION['token_procurement'])){
$key = $_GET['punishment'];
$sql_perbarui_punishment = mysqli_query($procurement,"SELECT * FROM punishment WHERE id = '$key'");
$data_punishment = mysqli_fetch_array($sql_perbarui_punishment);
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
                    <input type="hidden" name="id" id="id" value="<?=$key?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" title=""><?=$data_punishment['keterangan']?></textarea>
                                    <span class="help-block small">Edit Keterangan</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Sanksi</label>
                                <input type="text" name="sanksi" id="sanksi" title="" class="form-control" value="<?=$data_punishment['sanksi']?>">
                                <span class="help-block small">Edit Sanksi</span>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Jumlah Waktu Sanksi</label>
                                <input type="text" name="waktusanksi" id="waktusanksi" title="" class="form-control regexnumber" value="<?=$data_punishment['jumlahwaktusanksi']?>">
                                <span class="help-block small">Edit Waktu Sanksi (default : 1)</span>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Satuan Waktu</label>
                                <select name="satuanwaktu" id="satuanwaktu" title="" class="form-control">
                                    <option value="detik" <?php if($data_punishment['satuanwaktu'] == 'detik') echo "selected"?>>Detik</option>
                                    <option value="menit" <?php if($data_punishment['satuanwaktu'] == 'menit') echo "selected"?>>Menit</option>
                                    <option value="jam" <?php if($data_punishment['satuanwaktu'] == 'jam') echo "selected"?>>Jam</option>
                                    <option value="hari" <?php if($data_punishment['satuanwaktu'] == 'hari') echo "selected"?>>Hari</option>
                                    <option value="minggu" <?php if($data_punishment['satuanwaktu'] == 'minggu') echo "selected"?>>Minggu</option>
                                    <option value="bulan" <?php if($data_punishment['satuanwaktu'] == 'bulan') echo "selected"?>>Bulan</option>
                                    <option value="tahun" <?php if($data_punishment['satuanwaktu'] == 'tahun') echo "selected"?>>Tahun</option>
                                </select>
                                <span class="help-block small">Edit Satuan Waktu Sanksi (contoh: 20000 / hari atau 20000 / 2hari)</span>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">
                            <i class="icon-refresh"></i>
                        </button>
                        <button name="edit-sanksi" class="btn blue">
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