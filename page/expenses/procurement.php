<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/expenses/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/expenses/perbarui.php');
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
					<i class="icon-tag font-dark"></i>
					<span class="caption-subject bold uppercase">Expenses</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>expenses/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Expenses"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>Nama Pengeluaran</th>
							<th>Harga/Biaya</th>
							<th>Jumlah</th>
							<th>Note</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						$sql_expense = mysqli_query($procurement,"SELECT * FROM expenses");
						while($data_expense = mysqli_fetch_array($sql_expense)){
						?>
						<tr>
							<td><?=TanggalIndo($data_expense['created_date'])?></td>
							<td><?=$data_expense['nama']?></td>
							<td>Rp. <?=number_format($data_expense['harga'])?></td>
							<td><?=number_format($data_expense['jumlah'])?></td>
							<td><?=$data_expense['note']?></td>
							<td>
								<button onclick="window.location.href='<?=$url?>expenses/perbarui/<?=$data_expense['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Perbarui Data <?=$data_expense['nama'];?>"><i class="icon-note"></i></button>
							<button onclick="window.location.href='<?=$url?>expenses/hapus-expenses/<?=$data_expense['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Data <?=$data_expense['nama'];?>"><i class="icon-trash"></i></button>
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