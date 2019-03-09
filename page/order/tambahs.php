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
					<span class="caption-subject bold uppercase">order</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>order'" class="btn green">Kembali</button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="POST" " class="horizontal-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Nama Pemesan</label>
									<select name="nampes" class="form-control" required>
										<option> - Pilih Pemesan - </option>
										<?php
   		 									$sqll = mysqli_query($procurement,"SELECT * FROM cust ORDER BY nama ASC");
   		 									if(mysqli_num_rows($sqll) != 0){
										        while($dataa = mysqli_fetch_assoc($sqll)){
										            echo '<option>'.$dataa['nama'].'</option>';
										        }
										    }
										?>
									</select>
								</div>
							<!--/span-->
								<div class="form-group">
									<label class="control-label">Dikirim Kepada</label>
									<select name="dikpad" class="form-control" required>
										<option> - Pilih Penerima - </option>
										<?php
			 									$sqll = mysqli_query($procurement,"SELECT * FROM cust ORDER BY nama ASC");
			 									if(mysqli_num_rows($sqll) != 0){
										        while($dataa = mysqli_fetch_assoc($sqll)){
										            echo '<option>'.$dataa['nama'].'</option>';
										        }
										    }
										?>
									</select>
								</div>
							<!--/span-->
								<div class="form-group">
									<label class="control-label">Pengiriman Dari</label>
									<select name="pengdar" class="form-control" required>
										<option> - Pilih Kota - </option>
										<?php
			 									$sqll = mysqli_query($procurement,"SELECT * FROM _kota_ ORDER BY nm_kota ASC");
			 									if(mysqli_num_rows($sqll) != 0){
										        while($dataa = mysqli_fetch_assoc($sqll)){
										            echo '<option>'.$dataa['nm_kota'].'</option>';
										        }
										    }
										?>
									</select>
								</div>
							<!--/span-->
								<div class="form-group">
									<label class="control-label">Tanggal Order</label>
									<input type="text" class="form-control" placeholder="yyyy-mm-dd" name="tgl" required> 
								</div>
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Produk</label>
									<select name="produk" class="form-control" required>
										<option value=""> - Pilih Produk- </option>
										<?php
   		 									$sql = mysqli_query($procurement,"SELECT * FROM produk WHERE stock > 0 ORDER BY nama ASC");
   		 									if(mysqli_num_rows($sql) != 0){
										        while($data = mysqli_fetch_assoc($sql)){
										            echo '<option>'.$data['nama'].'</option>';
										        }
										    }
										?>
									</select>
								</div>

								<div class="form-group">
									<label class="control-label">Jumlah Barang</label>
									<input type="number" class="form-control" name="jumbar" required> 
								</div>
								<div class="form-group">
									<label class="control-label">Diskon</label>
									<input type="text" class="form-control" placeholder="Dalam Rupiah" name="diskon" required> 
								</div>
							</div>
							<!--/span-->
							</div>
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">Cancel</button>
						<button name="simpan-order" class="btn blue">
							<i class="fa fa-check"></i> Save</button>
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