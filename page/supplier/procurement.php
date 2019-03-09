<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/supplier/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/supplier/perbarui.php');
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
					<i class="icon-present font-dark"></i>
					<span class="caption-subject bold uppercase">Data Supplier</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>supplier/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Supplier"><i class="fa fa-plus"></i></button>
				</div>
			</div>
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Nama Supplier</th>
							<th>Asal Pengiriman</th>
							<th>Telepon</th>
							<th>Alamat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						$token_toko = $_SESSION['token_toko'];
						$sql_user = mysqli_query($procurement,"SELECT * FROM supplier WHERE toko = '$token_toko'");
						while($data_user = mysqli_fetch_array($sql_user)){
						?>
						<tr>
							<td><?=$data_user['nama']?></td>
							<td><?=$data_user['kota']?></td>
							<td><?=$data_user['telp']?></td>
							<td><?=$data_user['alamat']?></td>
							<td>
							<button onclick="window.location.href='<?=$url?>supplier/perbarui/<?=$data_user['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Perbarui Data <?=$data_user['nama'];?>"><i class="icon-note"></i></button>
							<button onclick="window.location.href='<?=$url?>supplier/hapus-supplier/<?=$data_user['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Data <?=$data_user['nama'];?>"><i class="icon-trash"></i></button>
							</td>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
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