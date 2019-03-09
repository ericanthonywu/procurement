<?
if(isset($_SESSION['token_procurement'])){
?>
<form method="post">
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-bar-chart font-dark"></i>
					<span class="caption-subject bold uppercase">Cari Analyzer</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button name="cari_analyzer" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Cari Analyzer"><i class="icon-magnifier"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Opsi</label>
							<select title="" name="opsi" id="pilih_opsi" class="form-control" required>
								<option SELECTED> Pilih Opsi</option>
								<option value="hari"> Hari</option>
								<option value="periodic"> Periodic</option>
								<option value="bulan"> Bulan</option>
								<option value="tahun"> Tahun</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 hari" style="display: none">
						<div class="form-group">
							<label class="control-label">Tanggal</label>
							<input title="" type="text" class="form-control" readonly id="tanggal_report" data-date-end-date="+0" name="hari" required>
						</div>
					</div>
					<div class="col-md-4 periodic" style="display: none">
						<div class="form-group">
							<label class="control-label">Dari Tanggal</label>
							<input title="" type="text" class="form-control" readonly id="dari_tanggal_report" data-date-end-date="+0" name="dari" required>
						</div>
					</div>
					<div class="col-md-4 periodic" style="display: none">
						<div class="form-group">
							<label class="control-label">Sampai Tanggal</label>
							<input title="" type="text" class="form-control" readonly id="sampai_tanggal_report" data-date-end-date="+0" name="sampai" required>
						</div>
					</div>
					<div class="col-md-4 bulan" style="display: none">
						<div class="form-group">
							<label class="control-label">Bulan</label>
							<select title="" name="bulan" id="pilih_bulan" class="form-control" required>
								<option SELECTED> Pilih Bulan</option>
								<option value="01"> Januari</option>
								<option value="02"> Februari</option>
								<option value="03"> Maret</option>
								<option value="04"> April</option>
								<option value="05"> Mei</option>
								<option value="06"> Juni</option>
								<option value="07"> Juli</option>
								<option value="08"> Agustus</option>
								<option value="09"> September</option>
								<option value="10"> Oktober</option>
								<option value="11"> November</option>
								<option value="12"> Desember</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 tahun" style="display: none">
						<div class="form-group">
							<label class="control-label">Tahun</label>
							<input title="" type="text" class="form-control" readonly id="tahun_tanggal_report" name="tahun" required>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<?
if(isset($_POST['cari_analyzer'])){
	if($_POST['opsi']=="hari"){
		$hari = $_POST['hari'];
		$sql_ads = mysqli_query($procurement,"SELECT SUM(best_produk) AS best_produk, nama FROM v_best_produk WHERE tanggal='$hari' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads2 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama_kota FROM v_best_customer_location WHERE tanggal='$hari' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads3 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer WHERE tanggal='$hari' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads4 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer_service WHERE tanggal='$hari' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
	}elseif($_POST['opsi']=="periodic"){
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
		$sql_ads = mysqli_query($procurement,"SELECT SUM(best_produk) AS best_produk, nama FROM v_best_produk WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads2 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama_kota FROM v_best_customer_location WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads3 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads4 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer_service WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
	}elseif($_POST['opsi']=="bulan"){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$sql_ads = mysqli_query($procurement,"SELECT SUM(best_produk) AS best_produk, nama FROM v_best_produk WHERE bulan='$bulan' AND tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads2 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama_kota FROM v_best_customer_location WHERE bulan='$bulan' AND tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads3 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer WHERE bulan='$bulan' AND tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads4 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer_service WHERE bulan='$bulan' AND tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
	}elseif($_POST['opsi']=="tahun"){
		$tahun = $_POST['tahun'];
		$sql_ads = mysqli_query($procurement,"SELECT SUM(best_produk) AS best_produk, nama FROM v_best_produk WHERE tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads2 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama_kota FROM v_best_customer_location WHERE tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads3 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer WHERE tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
		$sql_ads4 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer_service WHERE tahun='$tahun' AND toko='$toko' GROUP BY nama")or die(mysqli_error());
	}
}else{
	$sql_ads = mysqli_query($procurement,"SELECT SUM(best_produk) AS best_produk, nama FROM v_best_produk WHERE toko ='$toko' GROUP BY nama")or die(mysqli_error());
	$sql_ads2 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama_kota FROM v_best_customer_location WHERE toko ='$toko' GROUP BY nama")or die(mysqli_error());
	$sql_ads3 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer WHERE toko ='$toko' GROUP BY nama")or die(mysqli_error());
	$sql_ads4 = mysqli_query($procurement,"SELECT SUM(jumlah) AS jumlah,SUM(total_order) AS total_order, nama FROM v_best_customer_service WHERE toko ='$toko' GROUP BY nama")or die(mysqli_error());
}
?>
<div class="row">
	<div class="col-lg-6 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title tabbable-line">
				<div class="caption">
					<i class="icon-bag font-dark"></i>
					<span class="caption-subject font-dark bold uppercase">Best Seller</span>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN: Comments -->
				<table class="table table-striped table-bordered table-hover" id="best_seller">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Total Terjual</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						while($data_ads = mysqli_fetch_array($sql_ads)){
						?>
						<tr>
							<td><?= $data_ads['nama']; ?></td>
							<td><?= number_format($data_ads['best_produk']); ?> Item</td>
							<td>
							<button onclick="window.location.href=''" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Lihat Detil <?= $data_ads['nama']; ?>"><i class="icon-magnifier"></i></button>
							</td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
				<!-- END: Comments -->
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title tabbable-line">
				<div class="caption">
					<i class="icon-map font-dark"></i>
					<span class="caption-subject font-dark bold uppercase">Customer Location</span>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN: Comments -->
				<table class="table table-striped table-bordered table-hover" id="best_customer_location">
					<thead>
						<tr>
							<th>Kota</th>
							<th>Total Terjual</th>
							<th>Total Order</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						while($data_ads2 = mysqli_fetch_array($sql_ads2)){
						?>
						<tr>
							<td><?= $data_ads2['nama_kota']; ?></td>
							<td><?= number_format($data_ads2['jumlah']); ?> Item</td>
							<td><?= number_format($data_ads2['total_order']); ?> Order</td>
							<td>
							<button onclick="window.location.href=''" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Lihat Detil <?= $data_ads2['nama_kota']; ?>"><i class="icon-magnifier"></i></button>
							</td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
				<!-- END: Comments -->
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title tabbable-line">
				<div class="caption">
					<i class="icon-user font-dark"></i>
					<span class="caption-subject font-dark bold uppercase">Best Customer</span>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN: Comments -->
				<table class="table table-striped table-bordered table-hover" id="best_customer">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Total Terjual</th>
							<th>Total Order</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						while($data_ads3 = mysqli_fetch_array($sql_ads3)){
						?>
						<tr>
							<td><?= $data_ads3['nama']; ?></td>
							<td><?= number_format($data_ads3['jumlah']); ?> Item</td>
							<td><?= number_format($data_ads3['total_order']); ?> Order</td>
							<td>
							<button onclick="window.location.href=''" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Lihat Detil <?= $data_ads3['nama']; ?>"><i class="icon-magnifier"></i></button>
							</td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
				<!-- END: Comments -->
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title tabbable-line">
				<div class="caption">
					<i class="icon-emoticon-smile font-dark"></i>
					<span class="caption-subject font-dark bold uppercase">Best Customer Service</span>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN: Comments -->
				<table class="table table-striped table-bordered table-hover" id="best_customer_service">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Total Terjual</th>
							<th>Total Order</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						while($data_ads4 = mysqli_fetch_array($sql_ads4)){
						?>
						<tr>
							<td><?= $data_ads4['nama']; ?></td>
							<td><?= number_format($data_ads4['jumlah']); ?> Item</td>
							<td><?= number_format($data_ads4['total_order']); ?> Order</td>
							<td>
							<button onclick="window.location.href=''" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Lihat Detil <?= $data_ads4['nama']; ?>"><i class="icon-magnifier"></i></button>
							</td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
				<!-- END: Comments -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase font-dark">Grafik Penjualan Berdasarkan Hari</span>
					<span class="caption-helper"></span>
				</div>
				<div class="actions">
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="grafik_hari" class="CSSAnimationChart"></div>
			</div>
		</div>
	</div>
</div>
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>