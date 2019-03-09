<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/user/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/user/perbarui.php');
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
					<i class="icon-user font-dark"></i>
					<span class="caption-subject bold uppercase">Data User</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>user/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data User"><i class="fa fa-plus"></i></button>
				</div>
			</div>
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Username</th>
							<th>Email</th>
							<th>Role</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						if($level>1){
							$sql_user = mysqli_query($procurement,"SELECT * FROM auth WHERE toko = '$toko' AND lv>'1'");
						}else{
							$sql_user = mysqli_query($procurement,"SELECT * FROM auth WHERE toko = '$toko'");
						}
						while($data_user = mysqli_fetch_array($sql_user)){
							$lv = $data_user['lv'];
							if($lv == 1){
								$lv = "<span class='badge bg-green'> Owner </span>";
							}elseif($lv == 2){
								$lv = "<span class='badge bg-yellow'> Admin </span>";
							}elseif($lv == 3){
								$lv = "<span class='badge bg-red-mint'> Advertiser </span>";
							}elseif($lv == 4){
								$lv = "<span class='badge bg-purple-medium'> Customer Service </span>";
							}
						?>
						<tr>
							<td><?=$data_user['nama']?></td>
							<td><?=$data_user['username']?></td>
							<td><?=$data_user['email']?></td>
							<td><?=$lv?></td>
							<td>
							<button onclick="window.location.href='<?=$url?>user/perbarui/<?=$data_user['username']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Perbarui Data <?=$data_user['nama'];?>"><i class="icon-note"></i></button>
							<button onclick="window.location.href='<?=$url?>user/hapus-user/<?=$data_user['username']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Data <?=$data_user['nama'];?>"><i class="icon-trash"></i></button>
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