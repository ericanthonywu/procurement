<?
if(isset($_SESSION['token_procurement'])){
$tanggal_sekarang = date("Y-m-d");
$bulan=date('m');
$tahun=date('Y');
$sql_count_order = mysqli_query($procurement,"SELECT COUNT(id) as total_order FROM orders WHERE tanggal = '$tanggal_sekarang' AND toko = '$toko'");
$count_data_order = mysqli_fetch_array($sql_count_order);
$total_count_order = $count_data_order['total_order'];

$sql_count_proses = mysqli_query($procurement,"SELECT COUNT(id) as total_proses FROM orders WHERE status_resi = '2' AND toko = '$toko'");
$count_data_proses = mysqli_fetch_array($sql_count_proses);
$total_count_proses = $count_data_proses['total_proses'];

$sql_count_dashboard = mysqli_query($procurement,"SELECT SUM(gross_profit) AS gross_profit,SUM(total_produk) AS total_produk FROM v_dashboard WHERE bulan = '$bulan' AND tahun = '$tahun' AND toko='$toko'");
$data_count_dashboard = mysqli_fetch_array($sql_count_dashboard);
if($level<3){
?>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2 bordered">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">
						<span data-counter="counterup" data-value="<?=number_format($total_count_order)?>">0</span>
						<small class="font-green-sharp"></small>
					</h3>
					<small>ORDER HARI INI</small>
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
						<span data-counter="counterup" data-value="<?=$total_count_proses?>">0</span>
					</h3>
					<small>BELUM DIPROSES</small>
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
						<span data-counter="counterup" data-value="<?=number_format($data_count_dashboard['total_produk'])?>"></span>
					</h3>
					<small>PRODUK TERJUAL</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>report">
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
						<small class="font-purple-soft">Rp.</small>
						<span data-counter="counterup" data-value="<?=number_format($data_count_dashboard['gross_profit'])?>"></span>
					</h3>
					<small>GROSS PROFIT</small>
				</div>
			</div>
			<div class="progress-info">
				<a href="<?=$url?>report">
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
					<span class="caption-subject bold uppercase font-dark">Grafik Penjualan Bulan <?=date("m")?> <?=date("Y")?></span>
					<span class="caption-helper">Total Gross Profit Rp. <?=number_format($data_count_dashboard['gross_profit'])?> (<?=number_format($data_count_dashboard['total_produk'])?> Produk Terjual)</span>
				</div>
				<div class="actions">
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="grafik_dashboard" class="CSSAnimationChart"></div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
}else{
?>
<div class="row">
	<div class="col-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-emoticon-smile font-dark"></i>
					<span class="caption-subject bold uppercase">Selamat Datang <?=$nama_tokennya?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<?
}
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>