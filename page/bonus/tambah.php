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
					<span class="caption-subject bold uppercase">Ads</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>ads'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="post" autocomplete="off" class="horizontal-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;Email</label>
									<input type="text" id="email" name="email" class="form-control regexnumber" required>
									<span class="help-block small">Jumlah Email</span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-envelope" style="color: #0b94ea"></i>&nbsp;SMS</label>
									<input type="text" id="sms" name="sms" class="form-control regexnumber" required>
									<span class="help-block small">Jumlah SMS</span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-call-end" style="color: #0b94ea"></i>&nbsp;WA</label>
									<input type="text" id="wa" name="wa" class="form-control regexnumber" required>
									<span class="help-block small">Jumlah WA</span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-call-end" style="color: #0b94ea"></i>&nbsp;Telp</label>
									<input type="text" name="telp" id="telp" class="form-control regexnumber" required>
									<span class="help-block small">Jumlah Telp</span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="fa fa-dollar" style="color: #0b94ea;border-radius:50%;padding:2px"></i>&nbsp;Sales</label>
									<input type="text" name="sales" id="sales" class="form-control regexnumber" required>
									<span class="help-block small">Jumlah Sales</span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label"><i class="icon-call-end" style="color: #0b94ea"></i>&nbsp;Transfer</label>
									<input type="text" name="transfer" id="transfer" class="form-control regexnumber" required>
									<span class="help-block small">Jumlah Transfer</span>
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
						<button name="simpan-ads" class="btn blue">
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