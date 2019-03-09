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
					<i class="icon-user font-dark"></i>
					<span class="caption-subject bold uppercase">User</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>user'" class="btn purple tooltips" data-container="body" data-placement="top" data-original-title="Kembali"><i class="icon-close"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="post" class="horizontal-form" autocomplete="off">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Nama User</label>
									<input type="text" name="nama" id="nama_user" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Username</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="username" id="username" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Email</label>
									<div class="input-icon right">
										<i class="icon-exclamation-sign"></i>
										<input type="text" class="form-control" name="email" id="email" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Role</label>
									<select id="pilih_role" name="role" class="form-control">
										<?
										$getRole = mysqli_query($procurement,"
										SELECT
											*
										FROM
											role
										");
										echo "<option SELECTED>Pilih Role</option>";
										while($data_role = mysqli_fetch_array($getRole)){
											echo "<option value='$data_role[id]'>$data_role[level]</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Masukkan Kembali Password</label>
									<input type="password" name="repassword" id="repassword" class="form-control" required>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default tooltips" data-container="body" data-placement="top" data-original-title="Ulangi"><i class="icon-refresh"></i></button>
						<button name="simpan-user" class="btn blue tooltips" data-container="body" data-placement="top" data-original-title="Simpan">
							<i class="fa fa-check"></i></button>
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