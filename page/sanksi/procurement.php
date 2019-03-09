<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/sanksi/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/sanksi/perbarui.php');
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
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">Sanksi</span>
				</div>
                <div class="tools" style="padding-bottom:50px">
					<?
					if($level<3){
					?>
                    <button onclick="window.location.href='<?=$url?>sanksi/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Sanksi"><i class="fa fa-plus"></i></button>
					<?
					}
					?>
                </div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Karyawan</th>
                            <th>Punishment</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
							<?
							if($level<3){
							?>
							<th></th>
							<?
							}
							?>
						</tr>
					</thead>
					<tbody>
                    <?
					if($level==4){
						$sql_sanksi = mysqli_query($procurement,"select * from v_sanksi where toko = '$toko' AND username = '$token'");
					}else{
						$sql_sanksi = mysqli_query($procurement,"select * from v_sanksi where toko = '$toko'");
					}
                    while($re_sanksi = mysqli_fetch_array($sql_sanksi)){
                        $punishment = $re_sanksi['keterangan'];
                        $karyawan = $re_sanksi['nama'];
                        $bulan = $re_sanksi['bulan'];
                        $tahun = $re_sanksi['tahun'];
                        $nominal = $re_sanksi['nominal'];
                        ?>
                        <tr>
                            <td><?=$karyawan?></td>
                            <td><?=$punishment?></td>
                            <td><?=$bulan?></td>
                            <td><?=$tahun?></td>
                            <td>Rp. <?=number_format($nominal)?></td>
							<?
							if($level<3){
							?>
                            <td>
                                <button onclick="window.location.href='<?=$url?>sanksi/perbarui/<?=$re_sanksi['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Edit sanksi <?=$re_sanksi['id']?>"><i class="icon-note"></i></button>
                                <button onclick="window.location.href='<?=$url?>sanksi/hapus-sanksi/<?=$re_sanksi['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus sanksi <?=$re_sanksi['id']?>"><i class="icon-trash"></i></button>
                            </td>
							<?
							}
							?>
                        </tr>
                        <?php
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