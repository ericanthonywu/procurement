<?
if(isset($_SESSION['token_procurement'])){
    $toko = $_SESSION['token_toko'];
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/reward/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/reward/perbarui.php');
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
					<span class="caption-subject bold uppercase">Reward</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>reward/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Reward"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
                            <td>Jenis Reward</td>
                            <td>Bonus</td>
                            <td>Bonus Sales</td>
                            <td></td>
						</tr>
					</thead>
					<tbody>
						<?

						$sql_reward = mysqli_query($procurement,"SELECT * FROM reward WHERE toko ='$toko'") or die(mysqli_error());
                            while($data_reward = mysqli_fetch_array($sql_reward)){
						    $id = $data_reward['id'];
						    $jenis_reward= $data_reward['jenis_reward'];
						    $bonus = $data_reward['bonus'];
						    $bonus_sales = $data_reward['bonus_sales'];
						?>
						<tr>
                            <td><?=$jenis_reward?></td>
                            <td>Rp. <?=number_format($bonus)?></td>
                            <td>Rp. <?=number_format($bonus_sales)?></td>
							<td>
							<button onclick="window.location.href='<?=$url?>reward/perbarui/<?=$data_reward['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Edit Reward <?= TanggalIndo($data_reward['created_date']); ?>"><i class="icon-note"></i></button>
							<button onclick="window.location.href='<?=$url?>reward/hapus-reward/<?=$data_reward['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Reward <?= TanggalIndo($data_reward['created_date']); ?>"><i class="icon-trash"></i></button>
							</td>
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