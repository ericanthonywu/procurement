<?
if(isset($_SESSION['token_procurement'])){
// $toko=$_SESSION['token_toko'];
?>
<form method="post">
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-bar-chart font-dark"></i>
					<span class="caption-subject bold uppercase">Cari Report</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button name="cari_report" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Cari Report"><i class="icon-magnifier"></i></button>
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
if(isset($_POST['cari_report'])){
	if($_POST['opsi']=="hari"){
		$hari = $_POST['hari'];
		
		$sql_count_report = mysqli_query($procurement,"SELECT tanggal,
	nama_hari,
	nama_hari_indo,
	hari,
	bulan,
	tahun,
	SUM(gross_sales) AS gross_sales,
	SUM(net_sales) AS net_sales,
	SUM(expenses) AS expenses,
	SUM(transaksi) AS transaksi,
	SUM(total_produk) AS total_produk,
	SUM(ongkir) AS ongkir,
	SUM(diskon) AS diskon,
	SUM(harga_beli) AS harga_beli,
	SUM(net_sales) - SUM(harga_beli) AS gross_profit,
	SUM(net_sales) - SUM(harga_beli) - SUM(expenses) AS net_profit,
	toko FROM v_report WHERE tanggal = '$hari' AND toko='$toko'");
		$data_count_report = mysqli_fetch_array($sql_count_report);
	
	}elseif($_POST['opsi']=="periodic"){
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
		
		$sql_count_report = mysqli_query($procurement,"SELECT tanggal,
	nama_hari,
	nama_hari_indo,
	hari,
	bulan,
	tahun,
	SUM(gross_sales) AS gross_sales,
	SUM(net_sales) AS net_sales,
	SUM(expenses) AS expenses,
	SUM(transaksi) AS transaksi,
	SUM(total_produk) AS total_produk,
	SUM(ongkir) AS ongkir,
	SUM(diskon) AS diskon,
	SUM(harga_beli) AS harga_beli,
	SUM(net_sales) - SUM(harga_beli) AS gross_profit,
	SUM(net_sales) - SUM(harga_beli) - SUM(expenses) AS net_profit,
	toko FROM v_report WHERE tanggal between '$dari' AND '$sampai' AND toko='$toko'");
		$data_count_report = mysqli_fetch_array($sql_count_report);
	
	}elseif($_POST['opsi']=="bulan"){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		
		$sql_count_report = mysqli_query($procurement,"SELECT tanggal,
	nama_hari,
	nama_hari_indo,
	hari,
	bulan,
	tahun,
	SUM(gross_sales) AS gross_sales,
	SUM(net_sales) AS net_sales,
	SUM(expenses) AS expenses,
	SUM(transaksi) AS transaksi,
	SUM(total_produk) AS total_produk,
	SUM(ongkir) AS ongkir,
	SUM(diskon) AS diskon,
	SUM(harga_beli) AS harga_beli,
	SUM(net_sales) - SUM(harga_beli) AS gross_profit,
	SUM(net_sales) - SUM(harga_beli) - SUM(expenses) AS net_profit,
	toko FROM v_report WHERE bulan = '$bulan' AND tahun = '$tahun' AND toko='$toko'");
		$data_count_report = mysqli_fetch_array($sql_count_report);
	
	}elseif($_POST['opsi']=="tahun"){
		$tahun = $_POST['tahun'];
		
		$sql_count_report = mysqli_query($procurement,"SELECT tanggal,
	nama_hari,
	nama_hari_indo,
	hari,
	bulan,
	tahun,
	SUM(gross_sales) AS gross_sales,
	SUM(net_sales) AS net_sales,
	SUM(expenses) AS expenses,
	SUM(transaksi) AS transaksi,
	SUM(total_produk) AS total_produk,
	SUM(ongkir) AS ongkir,
	SUM(diskon) AS diskon,
	SUM(harga_beli) AS harga_beli,
	SUM(net_sales) - SUM(harga_beli) AS gross_profit,
	SUM(net_sales) - SUM(harga_beli) - SUM(expenses) AS net_profit,
	toko FROM v_report WHERE tahun = '$tahun' AND toko='$toko'");
		$data_count_report = mysqli_fetch_array($sql_count_report);

	}
}else{
	$tanggal_sekarang = date("Y-m-d");
	$bulan=date('m');
	$tahun=date('Y');
	$sql_count_report = mysqli_query($procurement,"SELECT tanggal,
	nama_hari,
	nama_hari_indo,
	hari,
	bulan,
	tahun,
	SUM(gross_sales) AS gross_sales,
	SUM(net_sales) AS net_sales,
	SUM(expenses) AS expenses,
	SUM(transaksi) AS transaksi,
	SUM(total_produk) AS total_produk,
	SUM(ongkir) AS ongkir,
	SUM(diskon) AS diskon,
	SUM(harga_beli) AS harga_beli,
	SUM(net_sales) - SUM(harga_beli) AS gross_profit,
	SUM(net_sales) - SUM(harga_beli) - SUM(expenses) AS net_profit,
	toko FROM v_report WHERE bulan = '$bulan' AND tahun = '$tahun' AND toko='$toko'");
	$data_count_report = mysqli_fetch_array($sql_count_report);
}
$sql_count_stok = mysqli_query($procurement,"SELECT SUM(stock) as total_stok FROM produk WHERE toko='$toko'");
$data_count_stok = mysqli_fetch_array($sql_count_stok);
?>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">
						<small class="font-green-sharp">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['gross_sales'])?>">0</span>
					</h3>
					<small>Gross Sales</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-red-haze">
						<small class="font-red-haze">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['net_sales'])?>">0</span>
					</h3>
					<small>Net Sales</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-blue-sharp">
						<small class="font-blue-sharp">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['expenses'])?>">0</span>
					</h3>
					<small>Expenses</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-purple-soft">
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['transaksi'])?>">0</span>
					</h3>
					<small>Transaksi</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['total_produk'])?>">0</span>
					</h3>
					<small>Item Terjual</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-red-haze">
						<small class="font-red-haze">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['ongkir'])?>">0</span>
					</h3>
					<small>Ongkir</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-blue-sharp">
						<small class="font-blue-sharp">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['diskon'])?>">0</span>
					</h3>
					<small>Diskon</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-purple-soft">
						<small class="font-purple-soft">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['gross_profit'])?>">0</span>
					</h3>
					<small>Gross Profit</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">
						<small class="font-green-sharp">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_report['net_profit'])?>">0</span>
					</h3>
					<small>Net Profit</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-red-haze">
						<span data-counter="counterup" data-value="<?=$data_count_stok['total_stok']?>">0</span>
					</h3>
					<small>Sisa Produk</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>order">
				<div class="status">
					<div class="status-title"> Lihat Detil </div>
					<div class="status-number"> <i class="icon-arrow-right"></i> </div>
				</div>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase font-dark">Grafik Penjualan Periode Bulan <?=date("m")?> <?=date("Y")?></span>
					<span class="caption-helper"></span>
				</div>
				<div class="actions">
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="grafik_penjualan" class="CSSAnimationChart"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase font-dark">Grafik Keuntungan Periode Bulan <?=date("m")?> <?=date("Y")?></span>
					<span class="caption-helper"></span>
				</div>
				<div class="actions">
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="grafik_keuntungan" class="CSSAnimationChart"></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase">Transaksi<br>Per Bank</span>
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover nosearch" id="table-vbank">
					<thead>
						<tr>
							<th>Nama Bank</th>
							<th>Nominal</th>
						</tr>
					</thead>
					<tbody>
						<?
						if(isset($_POST['cari_report'])){
							if($_POST['opsi']=="hari"){
								$hari = $_POST['hari'];
								$sql_report_bank = mysqli_query($procurement,"SELECT SUM(total_order) AS total_order, nama FROM v_bank WHERE tanggal='$hari' AND toko='$toko' GROUP BY nama");
							}elseif($_POST['opsi']=="periodic"){
								$dari = $_POST['dari'];
								$sampai = $_POST['sampai'];
								$sql_report_bank = mysqli_query($procurement,"SELECT SUM(total_order) AS total_order, nama FROM v_bank WHERE tanggal BETWEEN '$dari' AND '$sampai' AND toko='$toko' GROUP BY nama");
							}elseif($_POST['opsi']=="bulan"){
								$bulan = $_POST['bulan'];
								$tahun = $_POST['tahun'];
								$sql_report_bank = mysqli_query($procurement,"SELECT SUM(total_order) AS total_order, nama FROM v_bank WHERE bulan='$bulan' AND tahun='$tahun' AND toko='$toko' GROUP BY nama");
							}elseif($_POST['opsi']=="tahun"){
								$tahun = $_POST['tahun'];
								$sql_report_bank = mysqli_query($procurement,"SELECT SUM(total_order) AS total_order, nama FROM v_bank WHERE tahun='$tahun' AND toko='$toko' GROUP BY nama");
							}
						}else{
							$sql_report_bank = mysqli_query($procurement,"SELECT SUM(total_order) AS total_order, nama FROM v_bank WHERE toko='$toko' GROUP BY nama");
						}
						while($data_report_bank = mysqli_fetch_array($sql_report_bank)){
						?>
						<tr>
							<td><?=$data_report_bank['nama']?></td>
							<td>Rp. <?=number_format($data_report_bank['total_order'])?></td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
	<div class="col-lg-6 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase font-dark">Ekspedisi</span>
					<span class="caption-helper"></span>
				</div>
				<div class="actions">
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="kurir" class="CSSAnimationChart"></div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>