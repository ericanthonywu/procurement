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
					<i class="fa fa-money font-dark"></i>
					<span class="caption-subject bold uppercase">Bonus</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>Bonus Order</th>
							<th>Bonus Sales</th>
							<th>Bonus Konversi</th>
							<th>Total Bonus</th>
						</tr>
					</thead>
					<tbody>
						<?
						$total=0;
						$sql_ads = mysqli_query($procurement,"
						SELECT 
						created_date,
						created_by,
						toko,
						sum(bonus_order) as bonus_order,
						sum(bonus_sales) as bonus_sales,
						sum(bonus_konversi) as bonus_konversi
						FROM bonus WHERE toko ='$toko' AND created_by='$id_tokennya' GROUP BY created_date");
						while($data_ads = mysqli_fetch_array($sql_ads)){
							$bonus_order = $data_ads['bonus_order'];
							$bonus_sales = $data_ads['bonus_sales'];
							$bonus_konversi = $data_ads['bonus_konversi'];
							$total=$bonus_order+$bonus_sales+$bonus_konversi;
						?>
						<tr>
							<td><?= TanggalIndo($data_ads['created_date']); ?></td>
							<td>Rp. <?= number_format($bonus_order); ?></td>
							<td>Rp. <?= number_format($bonus_sales); ?></td>
							<td>Rp. <?= number_format($bonus_konversi); ?></td>
							<td>Rp. <?= number_format($total); ?></td>
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