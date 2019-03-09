<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/punishment/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/punishment/perbarui.php');
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
					<span class="caption-subject bold uppercase">Punishment</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>punishment/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data sanksi"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Keterangan</th>
                            <th>Sanksi</th>
                            <th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?
						$toko = $_SESSION['token_toko'];
						$sql_punishment = mysqli_query($procurement,"SELECT * FROM punishment WHERE toko ='$toko'");
						while($data_punishment = mysqli_fetch_array($sql_punishment)){
                            $keterangan = $data_punishment['keterangan'];
                            $sanksi = $data_punishment['sanksi'];
                            $jumlahwaktusanksi = $data_punishment['jumlahwaktusanksi'];
                            if($jumlahwaktusanksi == 1){
                                $jumlahwaktusanksi = "";
                            }
                            $satuanwaktu = $data_punishment['satuanwaktu'];
						?>
						<tr>
							<td><?=$keterangan?></td>
                            <td>Rp. <?=number_format($sanksi)." / ".$jumlahwaktusanksi." ".$satuanwaktu?></td>
							<td>
							<button onclick="window.location.href='<?=$url?>punishment/perbarui/<?=$data_punishment['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Edit Punishment <?= TanggalIndo($data_punishment['created_date']); ?>"><i class="icon-note"></i></button>
							<button onclick="window.location.href='<?=$url?>punishment/hapus-sanksi/<?=$data_punishment['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Punishment <?= TanggalIndo($data_punishment['created_date']); ?>"><i class="icon-trash"></i></button>
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