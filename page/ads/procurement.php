<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/ads/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/ads/perbarui.php');
		  break;
		  default:
		  // echo "<script>window.location.href='../error/error.html'</script>";
	  }
	}else{
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-screen-desktop font-dark"></i>
					<span class="caption-subject bold uppercase">Ads</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<?
					if($level!=3){
					?>
					<button onclick="window.location.href='<?=$url?>ads/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Ads"><i class="fa fa-plus"></i></button>
					<?
					}
					?>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>WA</th>
							<th>Email</th>
							<th>Total</th>
							<th>Sales</th>
							<?
							if($level<4){
							?>
							<th>Gross Profit</th>
							<th>Biaya Iklan</th>
							<th>Cost Per Leads</th>
							<th>Net Profit</th>
							<th></th>
							<?
							}
							?>
						</tr>
					</thead>
					<tbody>
						<?
						if($level==4){
							$sql_ads = mysqli_query($procurement,"SELECT * FROM v_ads_cs WHERE toko ='$toko' AND created_by='$token' GROUP BY created_date");
						}else{
							$sql_ads = mysqli_query($procurement,"SELECT * FROM v_ads WHERE toko ='$toko' GROUP BY created_date");
						}
						while($data_ads = mysqli_fetch_array($sql_ads)){
						$wa = $data_ads['total_wa'];
						$email = $data_ads['total_email'];
						$total = $wa + $email;
						$cpl = $data_ads['total_bi'] / $total;
						$np = $data_ads['total_gp']-$data_ads['total_bi'];
						?>
						<tr>
							<td><?= TanggalIndo($data_ads['created_date']); ?></td>
							<td><?= $data_ads['total_wa']; ?></td>
							<td><?= $data_ads['total_email']; ?></td>
							<td><?= $total; ?></td>
							<td><?= $data_ads['total_sales']; ?></td>
							<?
							if($level<4){
							?>
							<td>Rp. <?= number_format($data_ads['total_gp']); ?></td>
							<td>Rp. <?= number_format($data_ads['total_bi']); ?></td>
							<td>Rp. <?= number_format($cpl); ?></td>
							<td>Rp. <?= number_format($np); ?></td>
							<td>
							<button onclick="window.location.href='<?=$url?>ads/perbarui/<?=$data_ads['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Masukkan Biaya Iklan  Ads <?= TanggalIndo($data_ads['created_date']); ?>"><i class="icon-note"></i></button>
							<?
							if($level<3){
							?>
							<button onclick="window.location.href='<?=$url?>ads/hapus-ads/<?=$data_ads['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Ads <?= TanggalIndo($data_ads['created_date']); ?>"><i class="icon-trash"></i></button>
							<?
							}
							?>
							</td>
							<?
							}
							?>
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
</div>
<!-- END PAGE BASE CONTENT -->
<?
	}
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>