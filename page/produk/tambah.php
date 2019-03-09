<?
if(isset($_SESSION['token_procurement'])){
    $toko = $_SESSION['token_toko'];
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
				<form method="POST" class="horizontal-form" enctype="multipart/form-data" autocomplete="off">
					<div class="form-body">
						<div class="row">
							<div class="col-md-9">
                                <div class="dashboard-stat2 bordered">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Nama Produk</label>
											<input title="" type="text" name="nama" class="form-control">
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Jenis Produk</label>
											<select title="" name="jenis" id="jenisproduk" class="form-control">
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
											<select name="kategori" class="form-control">
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
											<textarea title="" name="keterangan" class="col-md-12" style="height:150px;"></textarea>
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
											<input type="text" name="berat" class="form-control regexnumber" placeholder="Dalam gram">
							 			</div>
									</div>
                                    <div class="col-md-4 diskon">
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <input type="text" name="diskon" id="inputdiskon" class="form-control regexnumber" min="0" max="100" placeholder="Diskon (%)">
                                        </div>
                                    </div>
								</div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Foto Produk</label>
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
                                    </div>
                                    <div class="col-md-2">
                                        <label>Spesifikasi</label>
                                        <div class="form-group">
                                            <label class="control-label"><h6 style="padding: 0px; margin: 0px;">SKU</h6></label>
                                            <input type="text" name="sku" class="form-control regexnumber">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Harga Beli</label>
                                        <div class="form-group">
                                            <input type="text" id="hargabeli" name="harga-beli" class="form-control regexnumber">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Harga Jual</label>
                                        <div class="form-group">
                                            <label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Normal</h6></label>
                                            <input type="text" name="harnor" class="form-control regexnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Reseller</h6></label>
                                            <input type="text" name="harres" class="form-control regexnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Dropship</h6></label>
                                            <input type="text" name="hardro" class="form-control regexnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Agen Khusus</h6></label>
                                            <input type="text" name="haagkh" class="form-control regexnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><h6 style="padding: 0px; margin: 0px;">Harga Pasukan</h6></label>
                                            <input type="text" name="harpas" class="form-control regexnumber">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Stok</label>
                                        <div class="form-group">
                                            <input type="text" id="stok" name="stok" class="form-control regexnumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row grosir">
                                    <div class="col-md-6">
                                        <label>Harga Grosir</label>
                                        <div class="form-group">
                                            <table class="table table-responsive">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <td colspan="2">Rentang</td>
                                                        <td>Harga Satuan</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="input-group">
                                                                <input title="" type="text" class="form-control regexnumber" name="rentang_awal">
                                                                <div class="input-group-addon" style="border-right: none;">—</div>
                                                                <input title="" type="text" class="form-control regexnumber" name="rentang_akhir">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control regexnumber" name="harga_satuan" title="">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Keterangan: <br>
                                            <small>Rentang jumlah item dimulai dari 2</small>
                                        </p>
                                        <p> Contoh: <br>
                                            <small>Rentang: 2 - 10, Harga: 10000 <br>
                                                Rentang: 11 - 20, Harga: 9500
                                            </small>
                                        </p>
                                    </div>
                                </div>
							</div>
                            </div>
							<div class="col-md-3">
                                <div class="dashboard-stat2 bordered">
                                    <div class="form-group">
                                        <label><h4>Diskon</h4></label>
                                        <label class="switch pull-right">
                                          <input type="checkbox" checked id="diskon" name="diskon_chk">
                                          <span class="slider round" style="height: 100%; width: 100%;"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label><h4>Harga Grosir</h4></label>
                                        <label class="switch pull-right">
                                          <input type="checkbox" checked id="grosir" name="grosir_chk">
                                          <span class="slider round" style="height: 100%; width: 100%;"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label><h4>Publish</h4></label>
                                        <label class="switch pull-right">
                                          <input type="checkbox" checked name="publish_chk">
                                          <span class="slider round" style="height: 100%; width: 100%;"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label><h4>Tampilkan Stock</h4></label>
                                        <label class="switch pull-right">
                                          <input type="checkbox" checked name="stok_chk">
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