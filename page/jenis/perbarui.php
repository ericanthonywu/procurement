<?
$id = $_GET['keyword'];
$sql = mysqli_query($procurement,"SELECT * FROM jenis WHERE kode = '$id'",$vapor_exotic);
$data = mysqli_fetch_array($sql);
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
							<input type="text" id="kode" name="kode" class="form-control" value="<?=$data['kode']?>" readonly="readonly">
							<span class="help-block"> Kode Jenis Barang Otomatis Dari Sistem </span>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nama Jenis Barang</label>
							<input type="text" id="jenis" name="jenis" class="form-control" value="<?=$data['jenis']?>" placeholder="Nama Jenis Barang" required />
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
				<button name="update-jenis" class="btn blue">
					<i class="fa fa-check"></i> Save</button>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>