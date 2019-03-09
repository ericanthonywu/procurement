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
					<span class="caption-subject bold uppercase">reward</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>reward'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="post" autocomplete="off" class="horizontal-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Jenis Reward</label>
									<input title="" type="text" id="jenisreward" name="jenisreward" class="form-control">
									<span class="help-block small">Masukan Jumlah Reward</span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Bonus</label>
									<input title="" type="text" id="bonus" name="bonus" class="form-control regexnumber" required>
									<span class="help-block small">Masukan Bonus</span>
								</div>
							</div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Bonus Sales</label>
                                    <input title="" type="text" class="form-control regexnumber" name="bonussales" id="bonussales">
                                    <span class="help-block small">Masukan Bonus Sales</span>
                                </div>
                            </div>
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">
							<i class="icon-refresh"></i>
						</button>
						<button name="simpan-reward" class="btn blue">
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