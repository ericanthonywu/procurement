<?
if(isset($_GET['search']))
{
  $aksi=@$_GET['search'];
  switch($aksi){
	  case 'tambah':
		require_once('page/jenis/tambah.php');
	  break;
	  case 'perbarui':
		require_once('page/jenis/perbarui.php');
	  break;
	  default:
	  echo "<script>window.location.href='../error/error.html'</script>";
  }
}else{
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- Begin: life time stats -->
		<div class="portlet light portlet-fit portlet-datatable bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-handbag font-green"></i>
					<span class="caption-subject font-green sbold uppercase">Data Jenis Barang</span>
				</div>
				<div class="actions">
					<div class="btn-group btn-group-devided">
						<a href="<?$admin_url?>jenis/tambah"><label class="btn btn-transparent green btn-outline btn-circle btn-sm">
							Tambah Jenis Barang</label><a/>
					</div>
					<div class="btn-group">
						<a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
							<i class="fa fa-share"></i>
							<span class="hidden-xs">Tools </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right" id="sample_3_tools">
							<li>
								<a href="javascript:;" data-action="0" class="tool-action">
									<i class="icon-printer"></i> Print</a>
							</li>
							<li>
								<a href="javascript:;" data-action="1" class="tool-action">
									<i class="icon-check"></i> Copy</a>
							</li>
							<li>
								<a href="javascript:;" data-action="2" class="tool-action">
									<i class="icon-doc"></i> PDF</a>
							</li>
							<li>
								<a href="javascript:;" data-action="3" class="tool-action">
									<i class="icon-paper-clip"></i> Excel</a>
							</li>
							<li>
								<a href="javascript:;" data-action="4" class="tool-action">
									<i class="icon-cloud-upload"></i> CSV</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<table class="table table-striped table-bordered table-hover" id="sample_3">
						<thead>
							<tr>
								<th>
									No.
								</th>
								<th>
									Jenis Barang
								</th>
								<th>
									
								</th>
							</tr>
						</thead>
						<tbody>
							<?
							$no = 0;
							$query=mysqli_query($procurement,"
							SELECT
								*
							FROM
								jenis
							",$vapor_exotic);
							
							if($query === FALSE) { 
							die(mysqli_error()); // TODO: better error handling
							}
							while($djb=mysqli_fetch_array($query)){
							$no++;
							?>
							<tr>
								<td><?=$no?></td>
								<td><?=$djb['jenis'];?></td>
								<td>
								<a href="<?=$admin_url?>jenis/perbarui&keyword=<?=$djb['kode']?>" class="btn yellow btn-outline">Perbarui</a>
								<a href="<?=$admin_url?>jenis/hapus-jenis&keyword=<?=$djb['kode']?>" class="delete-btn btn red btn-outline">Hapus</a>
								</td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
}
?>