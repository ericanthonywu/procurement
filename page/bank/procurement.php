<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/bank/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/bank/perbarui.php');
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
					<span class="caption-subject bold uppercase">bank</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>bank/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data bank"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Rekening</th>
                            <th>Nama</th>
                            <th>Bank</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						$toko = $_SESSION['token_toko'];
						$sql_bank = mysqli_query($procurement,"SELECT * FROM bank WHERE toko ='$toko' GROUP BY created_date");
						while($data_bank = mysqli_fetch_array($sql_bank)){
						$rekening = $data_bank['rekening'];
						$nama = $data_bank['nama'];
						$bank = $data_bank['bank'];
						?>
						<tr>
							<td><?=$rekening?></td>
                            <td><?=$nama?></td>
                            <td><?=$bank?></td>
							<td>
							<button onclick="window.location.href='<?=$url?>bank/perbarui/<?=$data_bank['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Edit bank <?=$data_bank['id']?>"><i class="icon-note"></i></button>
							<button onclick="window.location.href='<?=$url?>bank/hapus-bank/<?=$data_bank['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus bank <?=$data_bank['id']?>"><i class="icon-trash"></i></button>
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