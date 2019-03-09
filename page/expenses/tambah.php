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
					<i class="icon-tag font-dark"></i>
					<span class="caption-subject bold uppercase">Form Tambah Expenses</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>expenses'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="POST" class="horizontal-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Nama Pengeluaran</label>
									<input type="text" name="nama" class="form-control" autocomplete="off" required />
									<span class="help-block"> Masukkan Nama Pengeluaran </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Harga</label>
									<input type="text" id="harga" name="harga" class="form-control" maxlength="20" autocomplete="off" required />
									<span class="help-block"> Masukkan Harga Pengeluaran</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Jumlah</label>
									<input type="text" id="jumlah" name="jumlah" class="form-control" maxlength="10" autocomplete="off" required />
									<span class="help-block"> Masukkan Jumlah Pengeluaran </span>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Note</label>
									<textarea class="form-control" name="note" autocomplete="off"></textarea>
									<span class="help-block"> Masukkan Catatan Pengeluaran </span>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">Batal</button>
						<button name="simpan-expenses" class="btn blue">
							<i class="fa fa-check"></i> Simpan</button>
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