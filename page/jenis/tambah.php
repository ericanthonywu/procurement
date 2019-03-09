<?
$query_kodeinstansi=mysqli_query("
SELECT kode FROM jenis  ORDER BY id DESC LIMIT 1
",$vapor_exotic);
$num_urut_kodeinstansi = mysqli_num_rows($query_kodeinstansi);
$data_urut_kodeinstansi = mysqli_fetch_array($query_kodeinstansi);
$thn=date('y');
$awal_kodeinstansi = substr($data_urut_kodeinstansi['kode'],0-4);
$next_kodeinstansi = $awal_kodeinstansi + 1;
$jnim_kodeinstansi = strlen($next_kodeinstansi);
if (!$data_urut_kodeinstansi['kode']){
	$no_kodeinstansi = "0001";
}
elseif($jnim_kodeinstansi == 1){
	$no_kodeinstansi = "000";
} 
elseif($jnim_kodeinstansi == 2){
	$no_kodeinstansi = "00";
}
elseif($jnim_kodeinstansi == 3){
	$no_kodeinstansi = "0";
}
elseif($jnim_kodeinstansi == 4){
	$no_kodeinstansi = "";
}
if ($num_urut_kodeinstansi == 0){
	$kodeinstansi = "J".$thn.$no_kodeinstansi;
}
else{
	$kodeinstansi = "J".$thn.$no_kodeinstansi.$next_kodeinstansi;
}
if($query_kodeinstansi === FALSE) { 
die(mysqli_error()); // TODO: better error handling
}
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-handbag"></i>Form Tambah Jenis Barang </div>
		<div class="tools">
			<a href="javascript:;" class="collapse"> </a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form method="post" class="horizontal-form">
			<div class="form-body">
				<h3 class="form-section">Info Jenis Barang</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Kode Jenis Barang</label>
							<input type="text" id="kode" name="kode" class="form-control" value="<?=$kodeinstansi?>"readonly="readonly">
							<span class="help-block"> Kode Jenis Barang Otomatis Dari Sistem </span>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nama Jenis Barang</label>
							<input type="text" id="jenis" name="jenis" class="form-control" placeholder="Nama Jenis Barang" required />
							<span class="help-block"> Harap Isi Nama Jenis Barang. </span>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					
					<!--/span-->
					<!--/span-->
				</div>
				<!--/row-->
			</div>
			<div class="form-actions right">
				<a href="<?=$base_url;?>jenis" class="btn green">Kembali</a>
				<button type="button" class="btn default">Ulangi</button>
				<button name="add-jenis" class="btn blue">
					<i class="fa fa-check"></i> Save</button>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>