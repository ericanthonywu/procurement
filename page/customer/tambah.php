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
					<i class="icon-user font-dark"></i>
					<span class="caption-subject bold uppercase">Customer</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>customer'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="post" class="horizontal-form" autocomplete="off">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Kategori Customer</label>
									<select id="pilih_kategori_customer" name="tipe" class="form-control">
										<option SELECTED> Pilih Kategori Customer</option>
										<option value="1"> Pelanggan </option>
										<option value="2"> Reseller </option>
										<option value="3"> Dropshipper </option>
										<option value="4"> Dropship </option>
										<option value="5"> Agen Khusus </option>
										<option value="6"> Pasukan </option>
									</select>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label class="control-label">Nama Customer</label>
									<input type="text" name="nama" id="nama_customer" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<?
									$curl = curl_init();

									curl_setopt_array($curl, array(
									  CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
									  CURLOPT_RETURNTRANSFER => true,
									  CURLOPT_ENCODING => "",
									  CURLOPT_MAXREDIRS => 10,
									  CURLOPT_TIMEOUT => 30,
									  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									  CURLOPT_CUSTOMREQUEST => "GET",
									  CURLOPT_HTTPHEADER => array(
										"key: 8a0b8807233f478f338cc3e4c148d473"
									  ),
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);

									curl_close($curl);
									?>
									<label class="control-label">Provinsi</label>
									<select id="pilih_provinsi" name="provinsi" class="form-control">
										<?
										echo "<option>Pilih Provinsi</option>";
										$data = json_decode($response, true);
										for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
											echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."-".$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Kota / Kabupaten</label>
									<select id="pilih_kota" name="kota" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Kecamatan</label>
									<select id="pilih_kecamatan" name="kecamatan" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Kode Pos</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="kode_pos" id="kode_pos" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">No. Handphone / Telepon</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="hp" id="telp_customer" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Email</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="email" id="email_customer" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">ID Line</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="line" id="line" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">PIN BBM</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="bbm" id="bbm" required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<textarea type="text" name="alamat" id="alamat" class="form-control" required></textarea>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default tooltips" data-container="body" data-placement="top" data-original-title="Ulangi"><i class="icon-refresh"></i></button>
						<button name="simpan-customer" class="btn blue tooltips" data-container="body" data-placement="top" data-original-title="Simpan">
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