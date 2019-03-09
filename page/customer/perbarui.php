<?
if(isset($_SESSION['token_procurement'])){
$keyword = $_GET['customer'];
$sql_customer = mysqli_query($procurement,"SELECT * FROM customer WHERE id = '$keyword'");
$data_customer = mysqli_fetch_array($sql_customer);
$provinsi = $data_customer['provinsi'];
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
										<option value="1" <? if($data_customer['tipe'] == '1'){ echo "SELECTED"; } ?>> Pelanggan </option>
										<option value="2" <? if($data_customer['tipe'] == '2'){ echo "SELECTED"; } ?>> Reseller </option>
										<option value="3" <? if($data_customer['tipe'] == '3'){ echo "SELECTED"; } ?>> Dropshipper </option>
										<option value="4" <? if($data_customer['tipe'] == '4'){ echo "SELECTED"; } ?>> Dropship </option>
										<option value="5" <? if($data_customer['tipe'] == '5'){ echo "SELECTED"; } ?>> Agen Khusus </option>
										<option value="6" <? if($data_customer['tipe'] == '6'){ echo "SELECTED"; } ?>> Pasukan </option>
									</select>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label class="control-label">Nama Customer</label>
									<input type="hidden" name="id" id="nama_customer" value="<?=$data_customer['id']?>" class="form-control" required>
									<input type="text" name="nama" id="nama_customer" value="<?=$data_customer['nama']?>" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4 ilang" style="display: none">
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
											$provinsis = $data['rajaongkir']['results'][$i]['province_id'];
											if($provinsi==$provinsis){
												echo "<option id='data_provinsi' value='".$data['rajaongkir']['results'][$i]['province_id']."-".$data['rajaongkir']['results'][$i]['province']."' SELECTED>".$data['rajaongkir']['results'][$i]['province']."</option>";
											}else{
												echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."-".$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
											}
										}
										?>
									</select>
								</div>
							</div>
                            <div class="col-md-4 muncul">
                                <div class="form-group">
                                    <label class="control-label">Provinsi</label>
                                    <input type="hidden" id="edit_provinsi" name="provinsis" title="" class="form-control" value="<?=$data_customer['provinsi']?>" readonly>
                                    <input type="text" id="edit_provinsi" name="nmprovinsi" title="" class="form-control" value="<?=$data_customer['nama_prov']?>" readonly>
                                </div>
                            </div>
							<div class="col-md-4 ilang" style="display: none">
								<div class="form-group">
									<label class="control-label">Kota / Kabupaten</label>
									<select title="" id="pilih_kota" name="kota" class="form-control">
									</select>
								</div>
							</div>
                            <div class="col-md-4 muncul">
                                <div class="form-group">
                                    <label class="control-label">Kota / Kabupaten</label>
                                    <input type="hidden" id="edit_kotakab" name="kotas" class="form-control" value="<?=$data_customer['kota']?>" readonly>
                                    <input type="text" id="edit_kotakab" name="nmkota" class="form-control" value="<?=$data_customer['nama_kota']?>" readonly>
                                </div>
                            </div>
							<div class="col-md-4 ilang" style="display: none">
								<div class="form-group">
									<label class="control-label">Kecamatan</label>
									<select id="pilih_kecamatan" name="kecamatan" class="form-control">
									</select>
								</div>
							</div>
                            <div class="col-md-4 muncul">
                                <div class="form-group">
                                    <label class="control-label">Kecamatan</label>
                                    <input type="hidden" class="form-control" value="<?=$data_customer['kecamatan']?>" name="kecamatans" id="edit_kecamatan" readonly>
                                    <input type="text" class="form-control" value="<?=$data_customer['nama_kecamatan']?>" name="nmkecamatan" id="edit_kecamatan" readonly>
                                </div>
                            </div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Kode Pos</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="kode_pos" value="<?=$data_customer['kode_pos']?>" id="kode_pos" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">No. Handphone / Telepon</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="hp" value="<?=$data_customer['hp']?>" id="telp_customer" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Email</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="email" value="<?=$data_customer['email']?>" id="email_customer" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">ID Line</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="line" value="<?=$data_customer['line']?>" id="line" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">PIN BBM</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="bbm" value="<?=$data_customer['bbm']?>" id="bbm" required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<textarea type="text" name="alamat" id="alamat" class="form-control" required><?=$data_customer['alamat']?></textarea>
								</div>
							</div>
                            <div class="col-md-12">
                                <div class="form-group pull-right">
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <input title="" type="checkbox" id="edit" name="edit" class="edit">&nbsp;Edit Lokasi
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!--/span-->
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default tooltips" data-container="body" data-placement="top" data-original-title="Ulangi"><i class="icon-refresh"></i></button>
						<button name="perbarui-customer" class="btn blue tooltips" data-container="body" data-placement="top" data-original-title="Simpan">
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