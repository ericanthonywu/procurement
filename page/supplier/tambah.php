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
					<i class="icon-present font-dark"></i>
					<span class="caption-subject bold uppercase">Supplier</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>supplier'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="post" class="horizontal-form" autocomplete="off">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Nama Supplier</label>
									<input type="text" name="nama" id="nama_supplier" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<?
									$curl = curl_init();
									curl_setopt_array($curl, array(
										CURLOPT_URL => "https://pro.rajaongkir.com/api/city",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
											"key:8a0b8807233f478f338cc3e4c148d473"
										),
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);

									curl_close($curl);
									?>
									<label class="control-label">Lokasi Kota Pengiriman</label>
									<select id="pilih_kota" name="asal" class="form-control">
										<?
										echo "<option>Pilih Kota Asal</option>";
										$data = json_decode($response, true);
										for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
											echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."-".$data['rajaongkir']['results'][$i]['city_name']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">No. Handphone / Telepon</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="telp" id="telp_supplier" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<input type="text" name="alamat" id="alamat" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Keterangan</label>
									<input type="text" name="keterangan" id="keterangan" class="form-control" required>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default tooltips" data-container="body" data-placement="top" data-original-title="Ulangi"><i class="icon-refresh"></i></button>
						<button name="simpan-supplier" class="btn blue tooltips" data-container="body" data-placement="top" data-original-title="Simpan">
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