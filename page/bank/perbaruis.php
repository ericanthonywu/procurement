<?
if(isset($_SESSION['token_procurement'])){
$key = $_GET['ads'];
$sql_perbarui_ads = mysqli_query("SELECT * FROM ads WHERE id = '$key'");
$data_ads = mysqli_fetch_array($sql_perbarui_ads);
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="flaticon-007-customer font-dark"></i>
					<span class="caption-subject bold uppercase">Ads Tanggal <?=TanggalIndo($data_ads['created_date'])?></span>
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
									<label class="control-label">Email</label>
									<input type="text" id="email" name="email" class="form-control" required>
									<span class="help-block"> This is inline help </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">SMS</label>
									<input type="text" id="sms" name="sms" class="form-control" required>
									<span class="help-block"> This field has error. </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">WA</label>
									<input type="text" id="wa" name="wa" class="form-control" required>
									<span class="help-block"> Select your gender </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Telp</label>
									<input type="text" name="telp" id="telp" class="form-control" required>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Sales</label>
									<input type="text" name="sales" id="sales" class="form-control" required>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Transfer</label>
									<input type="text" name="transfer" id="transfer" class="form-control" required>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">Cancel</button>
						<button name="simpan-ads" class="btn blue">
							<i class="fa fa-check"></i> Save</button>
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