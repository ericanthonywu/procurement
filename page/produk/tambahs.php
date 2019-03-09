<?
if(isset($_SESSION['token_procurement'])){
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">Form Tambah Produk</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>produk'" class="btn green">Kembali</button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="POST" class="horizontal-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Nama Produk</label>
											<input type="text" name="nama" class="form-control">
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Jenis Produk</label>
											<select title="" name="jenis" class="form-control">
												<option value="0"> - Pilih Jenis- </option>
												<?php
		   		 									$sql = mysqli_query($procurement,"SELECT * FROM jenis_produk ORDER BY jenis ASC");
		   		 									if(mysqli_num_rows($sql) != 0){
												        while($data = mysqli_fetch_assoc($sql)){
												            echo '<option value='.$data['id'].'>'.$data['jenis'].'</option>';
												        }
												    }
												?>
											</select>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Kategori Produk</label>
											<select title="" name="kategori" class="form-control">
												<option value="0"> - Pilih Jenis- </option>
												<?php
		   		 									$sql = mysqli_query($procurement,"SELECT * FROM kategori_produk ORDER BY kategori ASC");
		   		 									if(mysqli_num_rows($sql) != 0){
												        while($data = mysqli_fetch_assoc($sql)){
												            echo '<option value='.$data['id'].'>'.$data['kategori'].'</option>';
												        }
												    }
												?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
									</div>	
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Keterangan Produk</label><br>
											<textarea name="keterangan" class="col-md-12" style="height:150px;"></textarea>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<br>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Berat</label>
											<input type="number" name="berat" class="form-control" placeholder="Dalam gram"> 
										</div>
									</div>
								</div>

								<table class="table">
									<thead>
										<tr>
											<th class="col-md-2">Foto Produk</th>
											<th style="width:120px;">Spesifikasi</th>
											<th style="width:120px;">Harga Beli</th>
											<th style="width:120px;">Harga Jual</th>
											<th class="col-md-2">Stok</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="form-group">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
															<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
														<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
														<div>
															<span class="btn default btn-file">
																<span class="fileinput-new"> Select image </span>
																<span class="fileinput-exists"> Change </span>
																<input type="file" name="foto"> </span>
															<a href="javascript:;" style="margin-top: 10px;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="form-group">
													<label class="control-label"><h6 style="padding: 0px; margin: 0px;">SKU</h6></label>
													<input type="text" name="sku" class="form-control">
												</div>
											</td>
											<td>
												<div class="form-group">
													<input type="number" name="harga-beli" class="form-control">
												</div>
											</td>
											<td>
												<div class="form-group">
													<label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Normal</h6></label>
													<input type="number" name="harnor" class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Reseller</h6></label>
													<input type="number" name="harres" class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Dropship</h6></label>
													<input type="number" name="hardro" class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Agen Khusus</h6></label>
													<input type="number" name="haagkh" class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Pasukan</h6></label>
													<input type="number" name="harpas" class="form-control">
												</div>
											</td>
											<td>
												<div class="form-group">
													<input type="number" name="stok" class="form-control">
												</div>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><h4>Diskon</h4></label>
									<label class="switch">
									  <input type="checkbox" name="diskon">
									  <span class="slider round" style="height: 100%; width: 100%;"></span>
									</label>
								</div>
								<div class="form-group">
									<label><h4>Harga Grosir</h4></label>
									<label class="switch">
									  <input type="checkbox" name="grosir">
									  <span class="slider round" style="height: 100%; width: 100%;"></span>
									</label>
								</div>
								<div class="form-group">
									<label><h4>Publish</h4></label>
									<label class="switch">
									  <input type="checkbox" checked name="publish">
									  <span class="slider round" style="height: 100%; width: 100%;"></span>
									</label>
								</div>	
								<div class="form-group">
									<label><h4>Tampilkan Stock</h4></label>
									<label class="switch">
									  <input type="checkbox" checked name="tampil">
									  <span class="slider round" style="height: 100%; width: 100%;"></span>
									</label>
								</div>
								<!-- <div class="form-actions right">
									<button name="simpan-produk" class="btn blue col-md-12">
									<i class="fa fa-check"></i> Save</button>
								</div>	 -->
							</div>
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">Batal</button>
						<button name="simpan-produk" class="btn blue">
							<i class="fa fa-check"></i> Simpan</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>