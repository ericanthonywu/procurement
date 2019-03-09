<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/penggajian/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/penggajian/perbarui.php');
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
					<i class="icon-wallet font-dark"></i>
					<span class="caption-subject bold uppercase">Penggajian</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>penggajian/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Penggajian"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
					<thead>
						<tr>
							<th>Karyawan</th>
							<th>Tanggal</th>
							<th>Gaji Pokok</th>
							<th>Uang Makan</th>
							<th>Tunjangan</th>
                            <th>Bonus</th>
                            <th>Ongkir</th>
                            <th>Total Penerimaan</th>
                            <th>Sanksi</th>
                            <th>Pinjaman</th>
                            <th>Total Potongan</th>
                            <th>Gaji Bersih</th>
                            <th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?
						$sql_gaji = mysqli_query($procurement,"SELECT * FROM v_gaji where toko = '$toko'");
						while($data_gaji = mysqli_fetch_array($sql_gaji)){
						?>
						<tr>
							<td><?=$data_gaji['nama']?></td>
							<td><?=TanggalIndo($data_gaji['tanggal'])?></td>
							<td>Rp. <?=number_format($data_gaji['gaji_pokok'])?></td>
							<td>Rp. <?=number_format($data_gaji['uang_makan'])?></td>
							<td>Rp. <?=number_format($data_gaji['tunjangan'])?></td>
                            <td>Rp. <?=number_format($data_gaji['bonus'])?></td>
                            <td>Rp. <?=number_format($data_gaji['ongkir'])?></td>
                            <td>Rp. <?=number_format($data_gaji['totalpenerimaan'])?></td>
                            <?php if(!empty($data_gaji['sanksi'])) {?>
                            <td>Rp. <?=number_format($data_gaji['sanksi'])?></td>
                            <?php }else{
                                echo "<td>Rp. 0</td>";
                            }
                                if(!empty($data_gaji['pinjaman'])) {?>
                            <td>Rp. <?=number_format($data_gaji['pinjaman'])?></td>
                            <?php }else{ echo "<td>Rp. 0</td>";} if(!empty($data_gaji['totalpotongan'])) {?>
                            <td>Rp. <?=number_format($data_gaji['totalpotongan'])?></td>
                            <?php }else{ echo "<td>Rp. 0</td>";}?>
                            <td>Rp. <?=number_format($data_gaji['gaji_bersih'])?></td>
							<td>
								<button onclick="window.location.href='<?=$url?>penggajian/perbarui/<?=$data_gaji['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Perbarui Data"><i class="icon-note"></i></button>
								<button onclick="window.location.href='<?=$url?>penggajian/hapus-penggajian/<?=$data_gaji['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Data"><i class="icon-trash"></i></button>
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